<?php
include 'connectivity.php';
include 'session.php';
if (logger()){
     echo '<br><br>  <a href="logout.php">LOG OUT</a>';
     $query = "SELECT `username` FROM `chatmem` WHERE `id` = '".$_SESSION['user_id']."'";
             if($query_run = mysql_query($query)){
                 echo '<br><br>READ QUERY SUCCESS ';
                 while ($row = mysql_fetch_assoc($query_run)){
                         $username = $row['username'];
                 }
             }
             echo '<br><br>YOU ARE LOGGED IN, WELCOME  '.$username.'.<br><br>';
}


if( isset($_POST['mess'])){
    
    $mess = $_POST['mess'];
    if( !empty($mess)){
        $query = "INSERT INTO `chat`(`username`, `message`) VALUES ('".$username."','".$mess."')";
if ($query_run = mysql_query($query)){
    echo "<embed loop ='false' src = 'chat.wav' hidden = 'true' autoplay= 'true'/>";
    header('Refresh: 0');
}
    }else{
        echo "<br><br>Please enter  credentials";
    }
}
include 'chat.php';
?>
<html>
<head>

<script>
 function ajax(){
     var req = new XMLHttpRequest();
     req.onreadystatechange = function(){
         if(req.readyState == 4 && req.status == 200){
             document.getElementById('chat').innerHTML = req.responseText;
         }         
        
     }
     
     req.open('GET','chat.php',true);
     req.send();
 }
 
 $(document).ready(function(e){
     $.ajaxSetup({cache:false});
     setInterval(function(){$('#chat').load('chat.php');},2000);
 });
 </script>
 </head>
 <body>
 
<form action = "index.php" method = "POST">
<input type = "text" name = "name" value= "<?php echo $username; ?>" maxlength = "<?php echo strlen($username);?>">
<textarea name = "mess" placeholder = "enter message"></textarea>
<input type = "submit" name = "submit" value ="Send It" OnSubmit = "ajax()">
</form>
<div id = "chat"></div>
</body>
</html>