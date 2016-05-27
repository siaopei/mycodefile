<?php 
class Pageitemlib{
  static function test1(){
    echo 'test1';
  }

    public function __construct($conf)#, $perpage, $total_item, $url)
    {   
        extract($conf);
        $this->page = $page;
        $this->perpage = $perpage;
        $this->total_item = $total_item;
        $this->url = $url;
    }

    /*function getperpage()
      {

      return $this->perpage;
      }
      function setperpage($newName)
      {
      $this->perpage=$newName;
      return $this->perpage;
      }
     */
    public function allpages()
    {
        $this->all_pages = ceil($this->total_item / $this->perpage);
        return $this->all_pages;
    }

    public function limitstart()
    {
        $limit_start = ($this->page-1) * $this->perpage;
        return $limit_start;


    }

    public function first()
    {
        $first =sprintf('<a href=%s1>首頁</a>',$this->url);
        return $first;

    }
    
    public function pre()
    {
        $prepage = $this->page - 1;
        if ( $this->page > 1) {
            $pre = sprintf("<a href=%s".$prepage.">pre</a>",$this->url);
            return $pre;
        }
    }

    public function paging()
    {
        $paging = '';  
        for ($i = 1; $i <= $this->all_pages; $i++) {
            if ($this->page - 5 < $i && $i < $this->page + 5){

                $paging .= sprintf("<a href=%s".$i.">[".$i."]</a>",$this->url);           

            }

        }
        return $paging;
    }
   
    public function nextpage()
    {
        $next = $this->page + 1;
        if ($this->page < $this->all_pages) {

            $nextpage = sprintf("<a href=%s".$next.">next</a>",$this->url);    
            return $nextpage;
        
        }
    }
    
    public function last()
    {
        $last = sprintf("<a href=%s".$this->all_pages.">末頁</a>",$this->url);
        return $last;
    }


}
