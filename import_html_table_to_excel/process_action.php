<?php


if (isset($_POST['submit'])) {
// This variable is to choose which type of processing you're using. 
    $mode = "mysql"; // or "csv" or "email"
// These set your initial variables.
    $q1_why = $_POST['q1_why'];
//    $q2_service = $_POST['q2_service'];
    $q3_state = $_POST['q3_state'];
    $q4_comments = $_POST['q4_comments'];
    // it's good planning to set your variables explicitly before setting them programatically.
    $error = FALSE;
    if ($q3_state == "none") {
        $error = TRUE;
    }
    if (isset($q4_comments)) {
        $q4_comments = trim($q4_comments);
        $q4_comments = strip_tags($q4_comments);
    }
    if (isset($q1_why) && isset($q3_state) && isset($q4_comments) && $error == FALSE) {
        $process = TRUE;
    } else {
        $process = FALSE;
    }
    
    if ($mode == "mysql") {
        // in order to play with this section, you will need to create your database and edit these fields to your own information
        define('DB_USER', 'root');
        define('DB_PASSWORD', '');
        define('DB_HOST', 'localhost');
        define('DB_NAME', 'dbnoel');
        $dbc = @mysql_connect(DB_HOST, DB_USER, DB_PASSWORD) or die('Failure: ' . mysql_error());
        mysql_select_db(DB_NAME) or die('Could not select database: ' . mysql_error());

        $query = "INSERT INTO survey VALUES ('','$q1_why','$q3_state','$q4_comments',NOW())";
        $q = mysql_query($query);

        if (!$q) {
            exit("<p>MySQL Insertion failure.</p>");
        } else {
            mysql_close();
            //for testing only
            echo "<p>MySQL Insertion Successful</p>";
        }
    }
        
    if ($mode == "csv") {
        $csv_file = 'survey.csv';
        if (is_writable($csv_file)) {
            if (!$csv_handle = fopen($csv_file, 'a')) {
                // this line is for troubleshooting
                // echo "<p>Cannot open file $csv_file</p>";
                exit;
            }
        }
        $csv_item = "\"$q1_why\",\"$q3_state\",\"$q4_comments\"\n";
        if (is_writable($csv_file)) {
            if (fwrite($csv_handle, $csv_item) === FALSE) {
                //for testing
                //echo "Cannot write to file";
                exit;
            }
        }
        fclose($csv_handle);
    }

    if ($mode == "email") {
        //first, define your four mail function fields
        $recipient = "you@domain.com";
        $subject = "Online Survey from Your Domain";
        $content = "Online Survey:\n
   Why are you contacting us? $q1_why\n
   Where are you from? $q3_state\n
   Your Comments:\n
   $q4_comments\n";
        $header = "From: YourSurvey <survey@domain.com>\n" . "Reply-To: survey@domain.com\n";
        //now send it off
        mail($recipient, $subject, $content, $header);
    }
}
?>