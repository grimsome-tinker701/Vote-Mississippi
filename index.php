<?php 
declare(strict_types=1);
session_start();

# Legend for variable names:
#   FileName = sanatized version of the current filename.
# 
#   Q# = question number whatever.
#   Q#R = question number whatever response.
#   Q#RE = question number whatever response exists.
#   
# ------------------------------------------------------------
# Task:
# 1. finish getting the autofill function disabled. Successfull test on question one i think.
# 2. reformat questions and error page to use external css for consistency and quick changes. May require php to use foreign DIR pointers.
# 3. cleanup code and simplify funcitonality.
# 4. add error code and retesability to make the site more user friendly.
# 5. add design and pizzazz to the site.
?>
<!doctype php>
<html>
  <head>
    <title>Voter Questionare</title>
  </head>
  <body>
    <style>
      .question{
        display:flex;
        justify-content: center;
        align-items:center;
        text-align:center;
      }
    </style>
    <center><H1>Voter Eligablity Questionare</H1></center>
    <?php
        function ValidateText($input){if(preg_match("/^[a-zA-Z' ']*$/",$input)){return True;}else{return False;}}
        function ValidateInt($input){if(preg_match("/^[0-9]*$/", $input)){return True;}else{return False;}}
        function Sanitize($input){return htmlspecialchars(stripslashes(trim($input)));}

        $FileName = Sanitize($_SERVER['PHP_SELF']);
        $Q1R = $Q2R = $Q3R = $Q4R = $Q4aR = $Q5R = "";
        $Q1RE = $Q2RE = $Q3RE = $Q4RE = $Q4aRE = $Q5RE = False;

        if($_SERVER['REQUEST_METHOD']=="POST"){
          if(empty($_POST['Q1'])){$Q1RE = False;$Q1R = "";}else{$Q1RE = True;$Q1R = $_POST['Q1'];}
          if(empty($_POST['Q2'])){$Q2RE = False;$Q2R = "";}else{$Q2RE = True;$Q2R = $_POST['Q2'];}
          if(empty($_POST['Q3'])){$Q3RE = False;$Q3R = "";}else{$Q3RE = True;$Q3R = $_POST['Q3'];}
          if(empty($_POST['Q4'])){$Q4RE = False;$Q4R = "";}else{$Q4RE = True;$Q4R = $_POST['Q4'];}
          if(empty($_POST['Q4a'])){if($Q4R == "Yes"){$Q4aRE = False;$Q4aR = "";}else{$Q4aRE = True;$Q4aR = "";}}else{$Q4aRE = True;$Q4aR = $_POST['Q4a'];}
          if(empty($_POST['Q5'])){$Q5RE = False;$Q5R = "";}else{$Q5RE = True;$Q5R = $_POST['Q5'];}
        }

        //should be yes
        $Q1 = <<<EOD
        <Div class="question">
        <Form method="POST" action="$FileName">
        <H2>Are you a citizen of the United States of America?</H2>
        <button type="Submit" Name="Q1" value="Yes">Yes</button>&nbsp;&nbsp;&nbsp;<button type="Submit" name="Q1" value="No">No</Button>
        </Form>
        </div>
        EOD;

        //should be yes
        $Q2 = <<<EOD
        <Div class="question">
        <Form method="POST" action="$FileName">
        <H2>Will you be 18 years of age on or before the next Presidential Election Day?</H2>
        <input type="hidden" Name="Q1" value="$Q1R">
        <button type="Submit" Name="Q2" value="Yes">Yes</button>&nbsp;&nbsp;&nbsp;<button type="Submit" name="Q2" value="No">No</Button>
        </Form>
        </div> 
        EOD;

        //should be yes
        $Q3 = <<<EOD
        <Div class="question">
        <Form method="POST" action="$FileName">
        <H2>Have you lived at your current Mississippi address for more than 30 days?</H2>
        <input type="hidden" Name="Q1" value="$Q1R">
        <input type="hidden" Name="Q2" value="$Q2R">
        <button type="Submit" Name="Q3" value="Yes">Yes</button>&nbsp;&nbsp;&nbsp;<button type="Submit" name="Q3" value="No">No</Button>
        </Form>
        </div>
        EOD;

        //should be no
        $Q4 = <<<EOD
        <Div class="question">
        <Form method="POST" action="$FileName">
        <H2>have you been convicted in a Mississippi state court of any of the following crimes:</H2>
        <H3> voter fraud, murder, rape, bribery, theft, arson, obtaining money or goods under false pretense, perjury, forgery, embezzlement, <br/>
        bigamy, armed robbery, extortion, felony bad check, felony shoplifting, larceny, receiving stolen property, robbery, timber larceny, <br/>
        unlawful taking of a motor vehicle, statutory rape, carjacking or larceny under lease or rental agreement?</H3>
        <input type="hidden" Name="Q1" value="$Q1R">
        <input type="hidden" Name="Q2" value="$Q2R">
        <input type="hidden" Name="Q3" value="$Q3R">
        <button type="Submit" Name="Q4" value="Yes">Yes</button>&nbsp;&nbsp;&nbsp;<button type="Submit" name="Q4" value="No">No</Button>
        </Form>
        </div>
        EOD;

        //should be yes
        $Q4a = <<<EOD
        <Div class="question">
        <Form method="POST" action="$FileName">
        <H2> If convicted, Have you had your voting rights restored as required by law?</H2>
        <input type="hidden" Name="Q1" value="$Q1R">
        <input type="hidden" Name="Q2" value="$Q2R">
        <input type="hidden" Name="Q3" value="$Q3R">
        <input type="hidden" Name="Q4" value="$Q4R">
        <button type="Submit" Name="Q4a" value="Yes">Yes</button>&nbsp;&nbsp;&nbsp;<button type="Submit" name="Q4a" value="No">No</Button>
        </Form>
        </div>
        EOD;

        //should be no
        $Q5 = <<<EOD
        <Div class="question">
        <Form method="POST" action="$FileName">
        <H2>Have you been deemed as mentally incompetent by a United States court, OR a Medical professional?</H2>
        <input type="hidden" Name="Q1" value="$Q1R">
        <input type="hidden" Name="Q2" value="$Q2R">
        <input type="hidden" Name="Q3" value="$Q3R">
        <input type="hidden" Name="Q4" value="$Q4R">
        <input type="hidden" Name="Q4a" value="$Q4aR">
        <button type="Submit" Name="Q5" value="Yes">Yes</button>&nbsp;&nbsp;&nbsp;<button type="Submit" name="Q5" value="No">No</Button>
        </Form>
        </div>
        EOD;

        if(!$Q1RE){echo $Q1;}
        if($Q1RE && !$Q2RE){echo $Q2;}
        if($Q1RE && $Q2RE && !$Q3RE){echo $Q3;}
        if($Q1RE && $Q2RE && $Q3RE && !$Q4RE){echo $Q4;}
        if($Q1RE && $Q2RE && $Q3RE && $Q4RE && $_POST['Q4'] == "Yes" && !$Q4aRE){echo $Q4a;}
        if($Q1RE && $Q2RE && $Q3RE && $Q4RE && $Q4aRE && !$Q5RE){echo $Q5;}
        if($Q1RE && $Q2RE && $Q3RE && $Q4RE && $Q4aRE && $Q5RE){
          //echo $Q1R, $Q2R, $Q3R, $Q4R, $Q4aR, $Q5R; 
          $Eligable = 0;
          if($Q1R == "Yes"){$Eligable ++;}
          if($Q2R == "Yes"){$Eligable ++;}
          if($Q3R == "Yes"){$Eligable ++;}
          if($Q4R == "No"){$Eligable ++;}
          if($Q4aR == "Yes"){$Eligable ++;}
          if($Q5R == "No"){$Eligable ++;}
          if($Eligable == 5){
            $_SESSION['QuestionareApproved'] = "Yes";
            echo <<<EOD
            <Div class="question">
            <Form method="POST" action="VoteForm!">
            <H2>Congradulations you are elligable to register to vote!</H2>
            <Button type="Submit">Continue</button>
            </Form>
            </Div>
            EOD;
          }else{
            echo <<<EOD
            <Div class="question">
            <Form method="GET" action="$FileName">
            <H2>Were Sorry you are not elligable to register to vote.</H2>
            <button type="Submit">Restart</button>
            </Form>
            </Div>
            EOD;
          }
        }

        
    ?>
  </body>
</html>