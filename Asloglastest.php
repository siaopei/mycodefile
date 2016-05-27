<?php

//$conn = new mysqli('localhost', 'siaopei', '/Aa0921365127', 'aslog');

while(true){
    $file_path_access_log = "/var/log/httpd/access_log";
    $file_path_pre_size = "/var/www/sizefile";

    $old_log_file_size = file_get_contents($file_path_pre_size);
    //echo $old_log_file_size."\n";
    file_put_contents($file_path_pre_size, $old_log_file_size);
    $new_log_file_size = filesize($file_path_access_log);
    clearstatcache();
    //echo $new_log_file_size."\n";
    file_put_contents($file_path_pre_size, $new_log_file_size);
    $added_size = $new_log_file_size - $old_log_file_size;
    //echo $added_size;
    /*
       $ary_file = explode("\n", $file_content);

       $final_line = count($ary_file) - 2;

       $pre_size = print_r($ary_file[$final_line], true);
       fwrite($file_open_pre_size, $new_file_size);
       fclose($file_open_pre_size);
       $new_size = filesize($file_path_access_log);
       if($pre_size > $new_size){
       $pre_size = 0;   
       }
       $add_size = $new_size - $pre_size;
     */
    
    $new_log_content = shell_exec("tail -c {$added_size} {$file_path_access_log}");

    $ary_new_logs = explode("\n", $new_log_content);

    $ary_new_logs = array_filter($ary_new_logs);//escape null

    $conn = new mysqli('localhost', 'siaopei', '/Aa0921365127', 'aslog');
      
    foreach ($ary_new_logs as $log) {
        echo $log;
        
        $conn = new mysqli('localhost', 'siaopei', '/Aa0921365127', 'aslog');
        if (!$conn) {
            echo 'cannot use';
        }

        $query = "INSERT INTO logdata(log,see) values ('{$log}','0')";

        if ($conn->query($query)) {
            echo "\n log inserted!";
        } else {
            echo "\n query failed: {$query}";
        }
    }
    
    $conn->close();
    sleep(1);
}  
//$conn->close();
?>
