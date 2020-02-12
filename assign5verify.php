<?php
    $nameone = $_POST['nameone'];
    $nametwo = $_POST['nametwo'];
    $pass = $_POST['pass'];
    $text = $_POST['tone'];
    $servername = "sql.njit.edu";
    $username = "dsp49";
    $password = ""; #:)
    $c = new mysqli($servername, $username, $password);
    $c->select_db("dsp49");
    $resultone = $c->query("SELECT * FROM assign5 WHERE NAME=\"".$nameone."\" AND PASSWORD =\"".$pass."\""); 
    $resulttwo = $c->query("SELECT * FROM assign5 WHERE NAME=\"".$nametwo."\"");
    if(($resultone->fetch_assoc() != NULL) && ($resulttwo->fetch_assoc() != NULL)){
        $c->query("UPDATE assign5 SET CHAT_CONTENT = \"".$text."\" WHERE NAME= \"".$nameone."\"");
        echo "TRUE";
    }else{
        echo "FALSE";
    }   
    $c->close();
?>
