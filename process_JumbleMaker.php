<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jumble Maker
    </title>
</head>
<body>
    <?php

    function displayError($fieldName, $errorMsg) {
        echo $fieldName . $errorMsg; 
    }

    function validateWord($data, $fieldName) {
        global $errorCount; 

        if (empty($data)) {
            $msg = " is a required field. <br />\n";
            displayError($fieldName, $msg);
            ++$errorCount; 
            $retval = "";  
        }
        else {
            $retval = trim($data); 
            $retval = strtoupper($retval); 
            $retval = str_shuffle($retval); 
        }
    return($retval); 
    }

    $errorCount = 0;
    $words = array();

    $words[] = validateWord($_POST['Word1'], "Word 1");
    $words[] = validateWord($_POST['Word2'], "Word 2");
    $words[] = validateWord($_POST['Word3'], "Word 3");
    $words[] = validateWord($_POST['Word4'], "Word 4");

    if ($errorCount>0)
        echo "Please use the \"Back\" button to re-enter the data.<br />\n";
    else {
        $wordnum = 0;
        foreach ($words as $word)
            echo "Word ".++$wordnum.": $word<br />\n";
    }

    ?>
</body>
</html>