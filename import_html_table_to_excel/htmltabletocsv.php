<form id="form1" name="form1" method="post" action="post.php">
    <table width="597" class="formatTblClass">
        <tr>
            <th colspan="4"></th>
        </tr>
        <tr>
            <td width="99"><span>First Name</span></td>
            <td width="217"><input class="" type="text" name="fn" id="fn" /></td>
            <td width="99"><span>Last Name</span></td>
            <td width="211"><input class="" name="ln" type="text" id="ln" /></td>
        </tr>
        <tr>
            <td>Phone</td>
            <td><input class="" type="text" name="phone" id="phone" /></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td colspan="4">Check groups that you would like to receive updates about</td>
        </tr>
        <tr>
            <td><input name="intrest[]" type="checkbox" id="1" value="Red" /></td>
            <td>Red</td>
            <td><input name="intrest[]" type="checkbox" id="4" value="Green" /></td>
            <td>Green</td>
        </tr>
        <tr>
            <td><input name="intrest[]" type="checkbox" id="2" value="Blue" /></td>
            <td>Blue</td>
            <td><input name="intrest[]" type="checkbox" id="5" value="Black" /></td>
            <td>Black</td>
        </tr>
        <tr>
            <td><input name="intrest[]" type="checkbox" id="3" value="Yellow" /></td>
            <td>Yellow</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td colspan="4">
                <div align="center">
                    <input type="submit" name="Submit" id="Submit" value="Submit" />
                    <input type="reset" name="Reset" id="button" value="Reset" />
                </div>
            </td>
        </tr>
    </table>
</form>