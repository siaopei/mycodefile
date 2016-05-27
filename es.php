<?php

header('Content-Type: text/event-stream');
header('Cache-Control: no cache');
/*function sendMsg($id, $msg) {
    echo "id: $id" . PHP_EOL;
    echo "data: $msg" . PHP_EOL;
    echo PHP_EOL;
    ob_flush();
    flush();
}
$serverTime = time();
sendMsg($serverTime, 'server time: ' . date("h:i:s", time()));
*/
function Send()
{
$conn = new mysqli('localhost', 'siaopei', '/Aa0921365127', 'aslog');
while(1){
$aslog_data = "SELECT log FROM logdata where see ='0' order by sn desc ";

$already_look = "update logdata set see = '1' where see = '0'";

$result = $conn->query($aslog_data);
$conn->query($already_look); 

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
        $row = $row["log"];
        echo "data: $row</br>" . PHP_EOL;
        echo PHP_EOL;
        ob_flush();
        flush();
        sleep(1);
    }
}

        sleep(1);
}
$conn->close();
}
Send();
