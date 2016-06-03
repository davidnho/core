<?php

$cvsData = "";   //Initialize it as empty
if (isset($_POST['intrest'])) {
    $name = $_POST['intrest'];

    echo "You chose the following color(s): <br>";
    foreach ($name as $color) {
        $cvsData .= $color . ",";      //Append the new color value
        echo $color ."<br>";
    }
}

var_dump($name);

$fn = $_POST['fn'];
$ln = $_POST['ln'];
$phone = $_POST['phone'];
$abc = (isset($_POST['1'])) ? $_POST['1'] : 'No';


if (empty($fn) || empty($ln) || empty($phone)) {
    $message = 'Fill in areas in red!';
    $aClass = 'errorClass';
}

$cvsData .= $phone . "," . $fn . "," . $ln . "," . $phone . "\n"; //Append the second line here
//Add header here
$exists = true;
if (!is_readable("formTest.csv")) {
    $exists = false;
}

$fp = fopen("formTest.csv", "a");
ftruncate($fp,0);
if ($fp) {
    if (!$exists) {
        fwrite("formTest.csv","This is my awesome header\n");
    }
    
    fwrite($fp, $cvsData);
    fclose($fp);
}
?>