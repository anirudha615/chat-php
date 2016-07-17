<?php
$query5 = "SELECT `username`,`message`,`date` FROM `chat` ORDER BY `id` DESC";
if ($query_run5 = mysql_query($query5)){
    while ($row = mysql_fetch_assoc($query_run5)){
        $name = $row['username'];
        $mess = $row['message'];
        $datea =$row['date'];
        echo $name.' '.$mess.' '.formatDate($datea).'<br><br>';
    }
}
?>