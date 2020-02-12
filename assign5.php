<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="assign5.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
var y;
$(document).ready(function(){ 
    $("form").keyup(function(){
        validate();
    });
});
function validate(){
    var name_one = document.getElementById("fone_name").value;
    var password = document.getElementById("fone_password").value;
    var name_two = document.getElementById("ftwo_name").value;
    var textone = document.getElementById("fone_text").value;
    if(name_one != "" && password != "" && name_two != ""){
        $.post("assign5verify.php",
        {
            nameone: name_one,
            nametwo: name_two,
            pass: password,        
            tone: textone 
        },
        function(data, status){
            console.log(data);
            console.log(status);
            if(data == "TRUE"){
                document.getElementById("alertone").innerHTML = "Connection Successful";
                y = setInterval(function(){getmsg();},1000);
            }else{
                document.getElementById("alertone").innerHTML = "Connection Failed";
                clearInterval(y);    
            }
        }
        );         
    }
}
</script>
<script>
    function getmsg(){
            var name_two = document.getElementById("ftwo_name").value;
            $.post("assign5chat.php",
            {
                nametwo: name_two
            },
            function(data, status){
                document.getElementById("ftwo_text").innerHTML = data;
            }
            );
    }

</script>
</head>
<body>
    <h2>Text Chat</h2>
    <div id="form_one">
    <h3>Sender</h3>
        <form>
            <label>Name</label><input id="fone_name"></input><br>
            <label>Password</label><input id="fone_password"></input><br>
            <textarea id="fone_text" rows="6" cols="40"></textarea>
        </form>
    <p id="alertone"></p> 
    </div>
    <div id="list">
    <h3>List</h3>
        <?php
            include "list.php";
        ?>
    </div>
    <div id="form_two">
    <h3>Receiver</h3>
        <form>
            <label>Name</label><input id="ftwo_name"></input><br>
            <textarea readonly id="ftwo_text" rows="6" cols="40"></textarea>
        </form>
    </div>
</body>
</html>
