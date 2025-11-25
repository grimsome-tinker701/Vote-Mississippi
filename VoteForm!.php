<?php
  declare(strict_types=1);
  session_start();
  if(!empty($_SESSION['QuestionareApproved'])){$Approved = $_SESSION['QuestionareApproved'];} else {$Approved = "No";}
  if($Approved == "Yes"){True;}else{header("Location: Error.html");die();}
  use Classes\FillForm;
  require_once __DIR__ . '\\vendor\\autoload.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Voter Questionare</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
  </head>
  <body>
    <center>
    <?PHP
        function Validate($input){if(preg_match("/^[a-zA-Z' '0-9]*$/",$input)){return True;}else{return False;}}
        function ValidateText($input){if(preg_match("/^[a-zA-Z' ']*$/",$input)){return True;}else{return False;}}
        function ValidateDOB($input){if(preg_match("/^[0-9\/]*$/",$input) && preg_match("@[/]*$@", $input)){return True;}else{return False;}}
        function ValidatePhone($input){if(preg_match("/^[0-9-]{12}$/",$input)){return True;}else{return False;}}
        function ValidateEmail($input){if(preg_match("/^[a-zA-Z0-9'@''.']*$/",$input) && preg_match('/@/',$input) && preg_match('/./', $input)){return True;}else{return False;}}
        function ValidateInt($input){if(preg_match("/^[0-9]*$/", $input)){return True;}else{return False;}}
        function Sanatize($input){return htmlspecialchars(stripslashes(trim($input)));}

        $FNameError = $MNameError = $LNameError = $MaidenNameError = $SuffixNameError = $DOBError = $StreetError = $CityError = $CountyError = $ZipError = $StreetError2 = $CityError2 = $CountyError2 = $ZipError2 = $PhoneError = $EmailError = $IDError = "";
        $FNameValue = $MNameValue = $LNameValue = $NameQuestionValue = $MaidenNameValue = $SuffixNameValue = $DOBValue = $Month = $Day = $Year = $StreetValue = $CityValue = $CountyValue = $ZipValue = $AddressQuestionValue = $StreetValue2 = $CityValue2 = $CountyValue2 = $ZipValue2 = $PhoneValue = $EmailValue = $IDValue = "";
        $FNameValueExists = $MNameValueExists = $LNameValueExists = $MaidenNameValueExists = $SuffixNameValueExists = $DOBValueExists = $StreetValueExists = $CityValueExists = $CountyValueExists = $ZipValueExists = $StreetValue2Exists = $CityValue2Exists = $CountyValue2Exists = $ZipValue2Exists = $PhoneValueExists = $EmailValueExists = $IDValueExists = False;
        $FileName = Sanatize($_SERVER['PHP_SELF']);

        $Debug = False;

        if($_SERVER['REQUEST_METHOD']=="POST"){
            if(!empty($_POST['FName'])){
                $TempValue = Sanatize($_POST['FName']);
                if(ValidateText($TempValue)){
                    $FNameValue = $TempValue;
                    $FNameValueExists = True;
                } 
                }

            if(!empty($_POST['MName'])){
                $TempValue = Sanatize($_POST['MName']);
                if(ValidateText($TempValue)){
                    $MNameValue =  $TempValue;
                    $MNameValueExists = True;
                }
                }

            if(!empty($_POST['LName'])){
                $TempValue = Sanatize($_POST['LName']);
                if(ValidateText($TempValue)){
                    $LNameValue =  $TempValue;
                    $LNameValueExists = True;
                }
                }

            if(!empty($_POST['NameQuestion'])){
                $TempValue = Sanatize($_POST['NameQuestion']);
                if(ValidateText($TempValue)){
                    $NameQuestionValue =  $TempValue;
                }
                }

            if(!empty($_POST['MaidenName'])){
                $TempValue = Sanatize($_POST['MaidenName']);
                if(ValidateText($TempValue)){
                    $MaidenNameValue =  $TempValue;
                    $MaidenNameValueExists = True;
                    
                }
                }
            
            if(!empty($_POST['Suffix'])){
                $TempValue = Sanatize($_POST['Suffix']);
                if(ValidateText($TempValue)){
                    $SuffixNameValue =  $TempValue;
                    $SuffixNameValueExists  = True;
                }
                }
                
            if(!empty($_POST['DOB'])){
                $TempValue = Sanatize($_POST['DOB']);
                if(ValidateDOB($TempValue)){
                    $DOBValue =  $TempValue;
                    $DOBValueExists = True;
                }
                }
            
            if(!empty($_POST['Street'])){
                $TempValue = Sanatize($_POST['Street']);
                if(Validate($TempValue)){
                    $StreetValue =  $TempValue;
                    $StreetValueExists = True;
                }
                }
                
            if(!empty($_POST['City'])){
                $TempValue = Sanatize($_POST['City']);
                if(ValidateText($TempValue)){
                    $CityValue =  $TempValue;
                    $CityValueExists = True;
                }
                }
                
            if(!empty($_POST['County'])){
                $TempValue = Sanatize($_POST['County']);
                if(ValidateText($TempValue)){
                    $CountyValue =  $TempValue;
                    $CountyValueExists = True;
                }
                }
                
            if(!empty($_POST['Zip'])){
                $TempValue = Sanatize($_POST['Zip']);
                if(ValidateInt($TempValue)){
                    $ZipValue =  $TempValue;
                    $ZipValueExists = True;
                }
                }
                
            if(!empty($_POST['AddressQuestion'])){
                $TempValue = Sanatize($_POST['AddressQuestion']);
                if(ValidateText($TempValue)){
                    $AddressQuestionValue =  $TempValue;
                }
                }
                
            if(!empty($_POST['Street2'])){
                $TempValue = Sanatize($_POST['Street2']);
                if(Validate($TempValue)){
                    $StreetValue2 =  $TempValue;
                    $StreetValue2Exists = True;
                }
                }
                
            if(!empty($_POST['City2'])){
                $TempValue = Sanatize($_POST['City2']);
                if(ValidateText($TempValue)){
                    $CityValue2 =  $TempValue;
                    $CityValue2Exists = True;
                }
                }
                
            if(!empty($_POST['County2'])){
                $TempValue = Sanatize($_POST['County2']);
                if(ValidateText($TempValue)){
                    $CountyValue2 =  $TempValue;
                    $CountyValue2Exists = True;
                }
                }
                
            if(!empty($_POST['Zip2'])){
                $TempValue = Sanatize($_POST['Zip2']);
                if(ValidateInt($TempValue)){
                    $ZipValue2 =  $TempValue;
                    $ZipValue2Exists = True;
                }
                }
                
            if(!empty($_POST['Phone'])){
                $TempValue = Sanatize($_POST['Phone']);
                if(ValidatePhone($TempValue)){
                    $PhoneValue =  $TempValue;
                    $PhoneValueExists = True;
                }
                }
                
            if(!empty($_POST['Email'])){
                $TempValue = Sanatize($_POST['Email']);
                if(ValidateEmail($TempValue)){
                    $EmailValue =  $TempValue;
                    $EmailValueExists = True;
                }
                }
                
            if(!empty($_POST['ID'])){
                $TempValue = Sanatize($_POST['ID']);
                if(ValidateInt($TempValue)){
                    $IDValue = $TempValue;
                    $IDValueExists = True;
                }
                }
        }

        $NameForm = <<<EOD
            <Div style="display:flex; justify-content:center; align-items:center;">
            <Form method="POST" action="$FileName">
            <H1>What is your name?</H1>
            $FNameError
            <input type="text" name="FName" placeholder="F&#8204;irst N&#8204;ame:"  required autocorrect="off" spellcheck="false" autocomplete="off" readonly onfocus="this.removeAttribute('readonly');" ><br/>
            $MNameError
            <input type="text" name="MName" placeholder="M&#8204;iddle N&#8204;ame:" required autocorrect="off" spellcheck="false" autocomplete="off" readonly onfocus="this.removeAttribute('readonly');" ><br/>
            $LNameError
            <input type="text" name="LName" placeholder="L&#8204;ast N&#8204;&#8204;ame:" required autocorrect="off" spellcheck="false" autocomplete="off" readonly onfocus="this.removeAttribute('readonly');" ><br/>
            &nbsp;&nbsp;&nbsp;<input type="submit" Value="Next">
            </form>
            </div>
            EOD;
        
        $NameQuestion = <<<EOD
            <Div class="question">
            <Form method="POST" action="$FileName">
            <H1>Do you have a maiden name or name suffix?</H1>
            
            <input type="hidden" name="FName" value="$FNameValue">
            <input type="hidden" name="MName" value="$MNameValue">
            <input type="hidden" name="LName" value="$LNameValue">
            <button type="Submit" Name="NameQuestion" value="Yes">Yes</button>&nbsp;&nbsp;&nbsp;<button type="Submit" name="NameQuestion" value="No">No</Button>
            </Form>
            </div>
            EOD;

        $NameFormAdvanced = <<<EOD
            <Div style="display:flex; justify-content:center; align-items:center;">
            <Form method="POST" action="$FileName">
            <H1>What is your name?</H1>
            $MaidenNameError
            <input type="text" name="MaidenName" placeholder="Maiden Name:" autofocus ><br/>
            $SuffixNameError
            <input type="text" name="Suffix" placeholder="Suffix:" ><br/>
            
            <input type="hidden" name="FName" value="$FNameValue">
            <input type="hidden" name="MName" value="$MNameValue">
            <input type="hidden" name="LName" value="$LNameValue">
            <input type="hidden" name="NameQuestion" value="$NameQuestionValue">
            &nbsp;&nbsp;&nbsp;<input type="submit" Value="Next">
            </form>
            </div>
            EOD;

        $DOBForm = <<<EOD
            <Div style="display:flex; justify-content:center; align-items:center;">
            <Form method="POST" action="$FileName">
            <H1>What is your Date of Birth?</H1>
            $DOBError
            <span>Format: MM/DD/YYYY</span><br/>
            <input type="text" id="DOB" name="DOB" required><br/>
            
            <input type="hidden" name="FName" value="$FNameValue">
            <input type="hidden" name="MName" value="$MNameValue">
            <input type="hidden" name="LName" value="$LNameValue">
            <input type="hidden" name="NameQuestion" value="$NameQuestionValue">
            <input type="hidden" name="MaidenName" value="$MaidenNameValue">
            <input type="hidden" name="Suffix" value="$SuffixNameValue">
            &nbsp;&nbsp;&nbsp;<input type="submit" Value="Next">
            </form>
            </div>
            EOD;

        $PhysicalAddressForm = <<<EOD
            <Div style="display:flex; justify-content:center; align-items:center;">
            <Form method="POST" action="$FileName">
            <H1>What is your Address?</H1>
            $StreetError
            <input type="text" name="Street" placeholder="Address:" autofocus required><br/>
            $CityError
            <input type="text" name="City" placeholder="City:" required><br/>
            $CountyError
            <input type="text" name="County" placeholder="County:" required><br/>
            $ZipError
            <input type="text" name="Zip" placeholder="Zip:" required><br/>

            <input type="hidden" name="FName" value="$FNameValue">
            <input type="hidden" name="MName" value="$MNameValue">
            <input type="hidden" name="LName" value="$LNameValue">
            <input type="hidden" name="NameQuestion" value="$NameQuestionValue">
            <input type="hidden" name="MaidenName" value="$MaidenNameValue">
            <input type="hidden" name="Suffix" value="$SuffixNameValue">
            <input type="hidden" name="DOB" value="$DOBValue">
            &nbsp;&nbsp;&nbsp;<input type="submit" Value="Next">
            </form>
            </div>
            EOD;

        $AddressQuestion = <<<EOD
            <Div class="question">
            <Form method="POST" action="$FileName">
            <H1>Do you receive mail at a separate address?</H1>

            <input type="hidden" name="FName" value="$FNameValue">
            <input type="hidden" name="MName" value="$MNameValue">
            <input type="hidden" name="LName" value="$LNameValue">
            <input type="hidden" name="NameQuestion" value="$NameQuestionValue">
            <input type="hidden" name="MaidenName" value="$MaidenNameValue">
            <input type="hidden" name="Suffix" value="$SuffixNameValue">
            <input type="hidden" name="DOB" value="$DOBValue">
            <input type="hidden" name="Street" value="$StreetValue">
            <input type="hidden" name="City" value="$CityValue">
            <input type="hidden" name="County" value="$CountyValue">
            <input type="hidden" name="Zip" value="$ZipValue">
            <button type="Submit" Name="AddressQuestion" value="Yes">Yes</button>&nbsp;&nbsp;&nbsp;<button type="Submit" name="AddressQuestion" value="No">No</Button>
            </Form>
            </div>
            EOD;
        
        $MailingAddressForm = <<<EOD
            <Div style="display:flex; justify-content:center; align-items:center;">
            <Form method="POST" action="$FileName">
            <H1>What is your Address?</H1>
            $StreetError2
            <input type="text" name="Street2" placeholder="Address:" autofocus required><br/>
            $CityError2
            <input type="text" name="City2" placeholder="City:" required><br/>
            $CountyError2
            <input type="text" name="County2" placeholder="County:" required><br/>\
            $ZipError2
            <input type="text" name="Zip2" placeholder="Zip:" required><br/>

            <input type="hidden" name="FName" value="$FNameValue">
            <input type="hidden" name="MName" value="$MNameValue">
            <input type="hidden" name="LName" value="$LNameValue">
            <input type="hidden" name="NameQuestion" value="$NameQuestionValue">
            <input type="hidden" name="MaidenName" value="$MaidenNameValue">
            <input type="hidden" name="Suffix" value="$SuffixNameValue">
            <input type="hidden" name="DOB" value="$DOBValue">
            <input type="hidden" name="Street" value="$StreetValue">
            <input type="hidden" name="City" value="$CityValue">
            <input type="hidden" name="County" value="$CountyValue">
            <input type="hidden" name="Zip" value="$ZipValue">
            <input type="hidden" name="AddressQuestion" value="$AddressQuestionValue">
            &nbsp;&nbsp;&nbsp;<input type="submit" Value="Next">
            </form>
            </div>
            EOD;

        $ContactForm = <<<EOD
            <Div style="display:flex; justify-content:center; align-items:center;">
            <Form method="POST" action="$FileName">
            <H1>What is your Contact Information?</H1>
            $PhoneError
            <span>Format: 601-555-1234</span><br/>
            <input type="text" name="Phone" placeholder="Phone Number" required><br/>
            $EmailError
            <input type="email" name="Email" placeholder="Email" required><br/>

            <input type="hidden" name="FName" value="$FNameValue">
            <input type="hidden" name="MName" value="$MNameValue">
            <input type="hidden" name="LName" value="$LNameValue">
            <input type="hidden" name="NameQuestion" value="$NameQuestionValue">
            <input type="hidden" name="MaidenName" value="$MaidenNameValue">
            <input type="hidden" name="Suffix" value="$SuffixNameValue">
            <input type="hidden" name="DOB" value="$DOBValue">
            <input type="hidden" name="Street" value="$StreetValue">
            <input type="hidden" name="City" value="$CityValue">
            <input type="hidden" name="County" value="$CountyValue">
            <input type="hidden" name="Zip" value="$ZipValue">
            <input type="hidden" name="AddressQuestion" value="$AddressQuestionValue">
            <input type="hidden" name="Street2" value="$StreetValue2">
            <input type="hidden" name="City2" value="$CityValue2">
            <input type="hidden" name="County2" value="$CountyValue2">
            <input type="hidden" name="Zip2" value="$ZipValue2">
            &nbsp;&nbsp;&nbsp;<input type="submit" Value="Next">
            </form>
            </div>
            EOD;
        
        $IDForm = <<<EOD
            <Div style="display:flex; justify-content:center; align-items:center;">
            <Form method="POST" action="$FileName">
            <H1>Please enter either the last four of your social security number, OR your full drivers license number.</H1>
            $IDError
            <input type="text" name="ID" placeholder="Last four of SSN, OR Drivers License Number:"><br/>

            <input type="hidden" name="FName" value="$FNameValue">
            <input type="hidden" name="MName" value="$MNameValue">
            <input type="hidden" name="LName" value="$LNameValue">
            <input type="hidden" name="NameQuestion" value="$NameQuestionValue">
            <input type="hidden" name="MaidenName" value="$MaidenNameValue">
            <input type="hidden" name="Suffix" value="$SuffixNameValue">
            <input type="hidden" name="DOB" value="$DOBValue">
            <input type="hidden" name="Street" value="$StreetValue">
            <input type="hidden" name="City" value="$CityValue">
            <input type="hidden" name="County" value="$CountyValue">
            <input type="hidden" name="Zip" value="$ZipValue">
            <input type="hidden" name="AddressQuestion" value="$AddressQuestionValue">
            <input type="hidden" name="Street2" value="$StreetValue2">
            <input type="hidden" name="City2" value="$CityValue2">
            <input type="hidden" name="County2" value="$CountyValue2">
            <input type="hidden" name="Zip2" value="$ZipValue2">
            <input type="hidden" name="Phone" value="$PhoneValue">
            <input type="hidden" name="Email" value="$EmailValue">
            &nbsp;&nbsp;&nbsp;<input type="submit" Value="Next">
            </form>
            </div>
            EOD;

        if(!$FNameValueExists OR !$LNameValueExists OR !$MNameValueExists){echo $NameForm;}
        if($FNameValueExists && $LNameValueExists && $MNameValueExists && $NameQuestionValue == ""){echo $NameQuestion;}
        if($FNameValueExists && $LNameValueExists && $MNameValueExists && $NameQuestionValue == "Yes"){echo $NameFormAdvanced;}
        if($FNameValueExists && $LNameValueExists && $MNameValueExists && $NameQuestionValue != "" && !$DOBValueExists){echo $DOBForm;}
        if($FNameValueExists && $LNameValueExists && $MNameValueExists && $NameQuestionValue != "" && $DOBValueExists && !$StreetValueExists && !$CityValueExists && !$CountyValueExists && !$ZipValueExists){echo $PhysicalAddressForm;}
        if($FNameValueExists && $LNameValueExists && $MNameValueExists && $NameQuestionValue != "" && $DOBValueExists && $StreetValueExists && $CityValueExists && $CountyValueExists && $ZipValueExists && $AddressQuestionValue == ""){echo $AddressQuestion;}
        if($FNameValueExists && $LNameValueExists && $MNameValueExists && $NameQuestionValue != "" && $DOBValueExists && $StreetValueExists && $CityValueExists && $CountyValueExists && $ZipValueExists && $AddressQuestionValue == "Yes"){echo $MailingAddressForm;}
        if($FNameValueExists && $LNameValueExists && $MNameValueExists && $NameQuestionValue != "" && $DOBValueExists && $StreetValueExists && $CityValueExists && $CountyValueExists && $ZipValueExists && $AddressQuestionValue != "" && !$PhoneValueExists && !$EmailValueExists){echo $ContactForm;}
        if($FNameValueExists && $LNameValueExists && $MNameValueExists && $NameQuestionValue != "" && $DOBValueExists && $StreetValueExists && $CityValueExists && $CountyValueExists && $ZipValueExists && $AddressQuestionValue != "" && $PhoneValueExists && $EmailValueExists && !$IDValueExists){echo $IDForm;}
        if($FNameValueExists && $LNameValueExists && $MNameValueExists && $NameQuestionValue != "" && $DOBValueExists && $StreetValueExists && $CityValueExists && $CountyValueExists && $ZipValueExists && $AddressQuestionValue != "" && $PhoneValueExists && $EmailValueExists && $IDValueExists){
            $DOBValue = date("F d Y", strtotime($DOBValue));
            list($Month, $Day, $Year) = explode(" ", $DOBValue, 3);
            $Data = [
                'New' => "On",
                'undefined' => "On",
                'undefined_3' => "On",
                'First Name' => $FNameValue,
                'Middle Name' => $MNameValue,
                'Last Name' => $LNameValue,
                'Maiden Name' => $MaidenNameValue,
                'Suffix' => $SuffixNameValue,
                'Month' => $Month,
                'Day' => $Day,
                'Year' => $Year,
                'Number and StreetRoadDormApt' => $StreetValue,
                'City' => $CityValue,
                'County' => $CountyValue,
                'Zip' => $ZipValue,
                'Street or Post Office Box' => $StreetValue2,
                'City_2' => $CityValue2,
                'County_2' => $CountyValue2,
                'Zip_2' => $ZipValue2,
                'Cell' => $PhoneValue,
                'Email' => $EmailValue,
                'Text3' => $IDValue, 
                ];
            define("ACCESSCHECK",True);
            $Build = new FillForm;
            $_SESSION['File'] = $response = $Build->Create( $Data);
            header("Location: Output.php");
        }

        if($Debug == True){
            echo <<<EOD
            <H1>$FNameValue</H1>
            <H1>$MNameValue</H1>
            <H1>$LNameValue</H1>
            <H1>$NameQuestionValue</H1>
            <H1>$MaidenNameValue</H1>
            <H1>$SuffixNameValue</H1>
            <H1>$DOBValue</H1>
            <H1>$Month</H1>
            <H1>$Day</H1>
            <H1>$Year</H1>
            <H1>$StreetValue</H1>
            <H1>$CityValue</H1>
            <H1>$CountyValue</H1>
            <H1>$ZipValue</H1>
            <H1>$AddressQuestionValue</H1>
            <H1>$StreetValue2</H1>
            <H1>$CityValue2</H1>
            <H1>$CountyValue2</H1>
            <H1>$ZipValue2</H1>
            <H1>$PhoneValue</H1>
            <H1>$EmailValue</H1>
            <H1>$IDValue</H1>
            EOD;
        }
        
        
    ?>
    </center>
    <script>
        form.attr('autocomplete', 'off');
        input.attr('autocomplete', 'off');
    </script>
  </body>
</html>