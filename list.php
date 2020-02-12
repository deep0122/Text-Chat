<?php
    $servername = "sql.njit.edu";
    $username = "dsp49";
    $password = ""; #:)
    $c = new mysqli($servername, $username, $password);
    $c->select_db("dsp49");
    $result = $c->query("SELECT NAME FROM assign5");
    $output = "<ul>";
    while($row = $result->fetch_assoc()){
        $output .= "<li>".$row["NAME"]."</li>";
    }
    $c->close();
    echo $output;
?>
