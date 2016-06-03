<!--source : https://www.joedolson.com/2007/02/processing-forms-with-php/-->

<html>
    <head>

    </head>
    <body>
        <form method="post" action="">
            <p>
            <fieldset>
                <legend>Why are you contacting us?</legend>
                <div>
                    <input type="radio" name="q1_why" id="q1a">
                    <label for="q1a">Technical Support</label><br />
                    <input type="radio" name="q1_why" id="q1b">
                    <label for="q1b">Applying for Work</label><br />
                    <input type="radio" name="q1_why" id="q1c">
                    <label for="q1c">Wanted to Hire You</label><br />
                    <input type="radio" name="q1_why" id="q1d">
                    <label for="q1d">Other</label><br />
                </div>
            </fieldset>
            <fieldset>
                <legend>What service are you interested in? (Check all that apply.)</legend>
                <div>
                    <input type="checkbox" name="q2_service[]" id="q2a" value="Heating" />
                    <label for="q2a">Heating</label><br />
                    <input type="checkbox" name="q2_service[]" id="q2b" value="Cooling" />
                    <label for="q2b">Cooling</label><br />
                    <input type="checkbox" name="q2_service[]" id="q2c" value="Plumbing" />
                    <label for="q2c">Plumbing</label><br />
                    <input type="checkbox" name="q2_service[]" id="q2d" value="Wiring" />
                    <label for="q2d">Wiring</label><br />
                    <input type="checkbox" name="q2_service[]" id="q2e" value="Carpentry" />
                    <label for="q2e">Carpentry</label>
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
                    <input type="submit" id="submit" name="submit" value="Send your Input" />
                </div>
            </fieldset>
        </form>
    </body>
</html>