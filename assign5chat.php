<?php
    $nametwo = $_POST['nametwo'];
    $servername = "sql.njit.edu";
    $username = "dsp49";
    $password = ""; #:)
    $c = new mysqli($servername, $username, $password);
    $c->select_db("dsp49");
    $resulttwo = $c->query("SELECT CHAT_CONTENT FROM assign5 WHERE NAME=\"".$nametwo."\"");
    while($row = $resulttwo->fetch_assoc()){
        echo $row['CHAT_CONTENT'];
    }
    $c->close();
?>
