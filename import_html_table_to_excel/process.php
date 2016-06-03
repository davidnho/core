<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-us" lang="en-us" dir="ltr">
    <head>
        <title>Beginner's Guide to Form Processing in PHP</title>
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <h1>Beginner's Guide to Form Processing in PHP</h1>
        <h2>Joseph C Dolson</h2>
        <p>
            This script is the accompaniment to an article at <a href="http://www.joedolson.com/articles/2007/02/processing-forms-with-php/">Joe Dolson Accessible Web Design</a>.
        </p>
        <?php
//        if (isset($_POST['submit'])) {
//            echo "<p style='padding: .5em; border: 2px solid red;'>Thanks for submitting this form! I've processed this form with $mode!</p>";
//        }
        ?>
        <div class='container'>

            <form method="post" action="process_action.php">
                <p>
                    <fieldset>
                        <legend>Why are you contacting us?</legend>
                        <div>
                            <input type="radio" name="q1_why" id="q1a" value="Technical Support" /><label for="q1a">Technical Support</label><br />
                            <input type="radio" name="q1_why" id="q1b" value="Applying for Work" /><label for="q1b">Applying for Work</label><br />
                            <input type="radio" name="q1_why" id="q1c" value="Wanted to Hire You" /><label for="q1c">Wanted to Hire You</label><br />
                            <input type="radio" name="q1_why" id="q1d" value="Other" /><label for="q1d">Other</label><br />
                        </div>
                    </fieldset>

                    <fieldset>
                        <legend>Where are you from?</legend>
                        <div>
                            <label for="q3">Pick your state:</label>
                            <select id="q3" name="q3_state">
                                <option value="none">Choose One</option>
                                <option value="MN">Minnesota</option>
                                <option value="MT">Montana</option>
                                <option value="NY">New York</option>
                            </select>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Comments</legend>
                        <div>
                            <label for="q4">Please provide additional comments about our services.</label><br />
                            <textarea id="q4" name="q4_comments" rows="4" cols="40"></textarea>
                        </div>
                    </fieldset>
                    <fieldset>
                        <div>
                            <label for="submit">Submit the form</label>
                            <input type="submit" name="submit" id="submit" value="Send your Input" />
                        </div>
                        </form>
                        </div>

                        </body>
                        </html>