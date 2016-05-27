<?php

while(true){  
$file_path = "/var/log/httpd/access_log";
$file_pre_size = "/var/www/pre_size_file";

$file_open = fopen($file_pre_size, "a+")or die("no");

$file_size = filesize($file_path)."\n";

$file_content = fread($file_open, filesize($file_pre_size)); 

$ary_file = explode("\n", $file_content);

$final_line = count($ary_file) - 2;

$pre_size = print_r($ary_file[$final_line], true);

fwrite($file_open, $file_size);

fclose($file_open);

$new_size = filesize($file_path);
if($pre_size > $new_size){
    $pre_size = 0;   
}
$add_size = $new_size - $pre_size;

$add_log = shell_exec("tail -c $add_size /var/log/httpd/access_log");

$ary_add_log = explode("\n", $add_log);

$ary_add_log = array_filter($ary_add_log);//escape null

foreach($ary_add_log as $log){
   $aslog = $log;
$conn = new mysqli('localhost', 'siaopei', '/Aa0921365127', 'aslog');

if(!$conn){
    echo 'cannot use';
}

$in = "INSERT INTO logdata(log) values ('$aslog')";



if (!$conn->query($in)){
    break ;
}

$conn->close();
}

}































