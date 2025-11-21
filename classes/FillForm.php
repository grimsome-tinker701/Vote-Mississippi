<?php
    declare(strict_types=1);
    
    namespace Classes;

    use mikehaertl\pdftk\Pdf;

    if(!defined("ACCESSCHECK")){
            die("Direct Access is Prohibited!");
        }

    class FillForm {

        public function Create($Data){
            $FileName = $Data['First Name'] . " " . $Data['Last Name'] . " " ."Voter Registration" . '.pdf';

            $pdf = new Pdf('./RegistrationForm.pdf');

            $FolderPath = dirname(__DIR__, 1) . '/Filled Forms';

            if (!is_dir($FolderPath)){
                if (mkdir($FolderPath,111,true)){
                    if (is_dir($FolderPath)){
                        echo "Folder created successfully: " . $FolderPath; 
                    }
                }
            }

            $pdf->fillForm($Data)
            ->flatten()
            ->saveAs("./Filled Forms/" . $FileName);
            return $FileName;
        }
    }
?>