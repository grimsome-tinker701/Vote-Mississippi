<!doctype html>
<html>
<head>
<title>Thank You!</title>
</head>
<body>
    <center>
    <?php
        try{
            session_start();
            if(!empty($_SESSION['QuestionareApproved']) && !empty($_SESSION['File'])){$link = $_SESSION['File'];} else {$link = "No";}
            if($link != "No"){
                echo "<a href=\"./Filled Forms/$link\">Open File!</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"./index.php\">Restart!</a>";
            }else{
                header("location:./Error.html");
                die("Direct Access Is Not Allowed!!!");
            }
        }catch (Exception $e){
            $MSG = <<<EOD
            <center>
                <H1>!WARNING! !WARNING! !WARNING! !WARNING! !WARNING!</H1>
                <H2 style="position:absolute; top:40%; width:100%;">!!!Error Found!!!</H2>
                <H2 style="position:absolute; top:50%; width:100%;">$e</H2>
                <H1 style="position:absolute; bottom:3%; width:100%;">!WARNING! !WARNING! !WARNING! !WARNING! !WARNING!</H1>
            </center>
            EOD;
            die($MSG);
        }finally{
            $_SESSION = array();
            session_destroy();
        }
        
        
    ?>
    </center>
</body>
</html>