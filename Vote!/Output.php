<!doctype html>
<html>
<head>
<title>Thank You!</title>
</head>
<body>
    <center>
    <?php
        session_start();
        if(!empty($_SESSION['QuestionareApproved']) && !empty($_SESSION['File'])){$link = $_SESSION['File'];} else {$link = "No";}
        if($link != "No"){
            echo "<a href=\"./Filled Forms/$link\">Open File!</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"./index.html\">Restart!</a>";
        }else{die("Direct Access Is Not Allowed!!!");}
        session_write_close();
    ?>
    </center>
</body>
</html>