<?php 

class Web extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('base');
    }

    public function accesslog() 
    {
        $title = "' Http Access Log'";
        $file = "/etc/httpd/logs/access_log";
        $openfile = fopen($file,"r")or die("Unable to open file!");
        $readallcontent = fread($openfile,filesize($file));
        $file_array = explode("\n", $readallcontent);
        $total_item = count($file_array);

        if (!isset($_GET["page"])){
            $page = 1;
        } else {
            $page = ($_GET["page"]);
        }
           
        $perpage = 20;

        //$url = "?page=";
        $url = sprintf('/%s/%s', $this->uri->segment(1), $this->uri->segment(2));

        // $Pageitem_params = compact('page', 'perpage', 'total_item', 'url');
        $Pageitem_params = array('page' => $page, 'perpage' => $perpage, 'total_item' => $total_item, 'url' => $url); 
        
        $this->load->library('Pageitem', $Pageitem_params);

        $allpages = $this->pageitem->allpages();      
        
        $limitstart = $this->pageitem->limitstart();         
        
        $items = array_slice($file_array, $limitstart, $perpage);         
        
        $pagedata = sprintf("總共:%u筆-目前在%u頁-共%u頁", $total_item, $page, $allpages);
        
        
        $first = $this->pageitem->first();
        $pre = $this->pageitem->pre();
        $paging = $this->pageitem->paging(); 
        $nextpage = $this->pageitem->nextpage(); 
        $last = $this->pageitem->last(); 
        
        //$pagevar_view = compact('title', 'file', 'openfile', 'readallcontent', 'file_array',
        //'total_item', 'page', 'perpage', 'url', 'allpages','limitstart','items','pagedata');
        $pagevar_view = array(
            'title' => $title, 
            'file' => $file,
            'openfile' =>$openfile,
            'readallcontent' => $readallcontent, 
            'file_array' => $file_array,
            'total_item' => $total_item,
            'page' => $page,
            'perpage' => $perpage,
            'url' => $url,
            'allpages' => $allpages,
            'limitstart' => $limitstart,
            'items' => $items,
            'pagedata' => $pagedata,
            'first' => $first,
            'pre' => $pre,
            'paging' => $paging,
            'nextpage' => $nextpage,
            'last' => $last
        );

        $pagevar_view = array_merge($pagevar_view, array('Page_Item' => $this->pageitem));
        
        $this->base->v->display("siaopei/Aslog.tpl", $pagevar_view);
           
    }
}
?>
