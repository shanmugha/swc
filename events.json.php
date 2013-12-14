<?php
include(dirname(__FILE__) . "/config/connection.php");
$connect = new Connection();

$sql_events = "SELECT * FROM events";
$result = mysql_query($sql_events) or die ('Error reading database: ' . mysql_error());
?>


<?php
header('Content-type: text/json');
echo '[';
$separator = "";
$days = 16;

$i = 1;
echo $separator;
$initTime = date("Y")."-".date("m")."-".date("d")." ".date("H").":00:00";
//$initTime = date("Y-m-d H:i:00");

if($result) {
    while ($row = mysql_fetch_array($result)):
        $events   = $row['events'];
        $date   = $row['date'];
        echo '  { "date": "'; echo date("Y-m-d H:i:00",strtotime($date)); echo '", "type": "meeting", "title": "'.$events.'", "description": "Lorem Ipsum dolor set", "url": "http://www.event3.com/" },';
    endwhile;
    echo '  { "date": "'; echo date("Y-m-d H:i:00",strtotime($initTime. ' - 100 days 1 hours')); echo '", "type": "test", "title": "", "description": "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam.", "url": "http://www.event11.com/" }';


}

$separator = ",";

echo ']';
?>