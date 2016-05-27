<?php 
 defined('BASEPATH') OR exit('No direct script access allowed');
/*
$title = 'Http Access Log';
//$file = "/var/log/httpd/error_log";
$file = "/etc/httpd/logs/access_log";
$openfile = fopen($file,"r")or die("Unable to open file!");
$readallcontent = fread($openfile,filesize($file));
$file_array = explode("\n", $readallcontent);
$total_item = count($file_array);
//$perpage = 20;
//$all_pages = ceil($array_count / $perpage);

if (!isset($_GET["page"])) {
    $page = 1;
 } else {
    $page = ($_GET["page"]);
}

$perpage = 20;
$url="/web/accesslog/page/"; */   
class PageItem
{
    // private $perpage=20 ;

    public function __construct($page, $perpage, $total_item, $url)
    {   
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
/*
$Page_Item = new PageItem($page, $perpage, $total_item, $url);
//$perpage = $Page_Item->setperpage(25);
$allpages = $Page_Item->allpages();

$limitstart = $Page_Item->limitstart();
 
$items = array_slice($file_array, $limitstart, $perpage);

$pagedata = sprintf("總共:%u筆-目前在%u頁-共%u頁", $total_item, $page, $allpages);
*/
/*$firstpage=first();
$prepage=pre($page);
$pagings=paging($page,$all_pages);
$nextpage=nextpage($page,$all_pages);
$lastpage=last($all_pages); 
fclose($openfile);*/
#$readstyle=fread($openstylefile,filesize($stylefile));
/*
echo "<table border =1>";
for($i=$limit_start;$i<($limit_start+$perpage);$i++){	
    echo"<tr><th>";
    echo"$i";
    echo "<td>"; 
    echo '<pre>'; echo isset($file_array[$i])?$file_array[$i]:'' ;echo'</pre>';
    echo "</td>";
    echo"</th></tr>";
}
echo"</table>";
//print_r($b);
//$c=print_r($b,true);
fclose($openfile);

echo '總共:'.count($file_array).'筆-目前在'.$page.'頁-共'.$all_pages.'頁'.'<br><br>';
echo"<body  style='text-align:center;'>";
echo"<a href=?page=1 style='text-decoration:none;' >頁首&nbsp;</a>";
if($page>1)
{
    $pre=$page-1;
    echo "<a href=?page=".$pre." style='text-decoration:none;'>&nbsp;pre&nbsp;</a>"; 
}
echo "第";
for($i=1;$i<=$all_pages;$i++){
    if($page-5<$i && $i<$page+5){
        echo "<a href=?page=".$i." style='text-decoration:none;'>[ ".$i."] </a>";
    }
}
echtyle='text-decoration:none;'>&nbsp;next&nbsp;</a>";
  }
   echo "<a href:=?page=".$all_pages." style='text-decoration:none;'>&nbsp;頁末</a>";
    echo"</body>";
   頁';
if($page<$all_pages){
    $next=$page+1;
}    echo "<a href=?page=".$next." style='text-decoration:none;'>&nbsp;next&nbsp;</a>";

echo "<a href:=?page=".$all_pages." style='text-decoration:none;'>&nbsp;頁末</a>";
echo"</body>";
*/
/*?>

<html>
    <head>
        <title><?php echo $title; ?></title>        
        <link  rel = "stylesheet" href =" /assets/css/style.css " >
    </head>
    <body  >
        <table border = 1>
        
    
        <?php foreach ($items as $key => $value) { ?> 
            <tr>
                <th><?= $key;?></th>
                <td><pre style = "text-align:left;"><?= $value;?></pre> </td>
            </tr>
        <?php } ?>
        </table>
<!--   <p ><?php echo "總共:{$total_item}筆-目前在第{$page}-共{$all_pages}頁"; ?></p> -->
        <p> <?= $pagedata ?> </p>
        <p>
        <?= $Page_Item->first(); ?>
        <?= $Page_Item->pre(); ?>在        
        <?= $Page_Item->paging(); ?>頁
        <?= $Page_Item->nextpage(); ?>    
        <?= $Page_Item->last(); ?>
        </p>
    </body>
 </html>*/
