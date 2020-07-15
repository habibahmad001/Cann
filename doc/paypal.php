<!--<form action="https://www.paypal.com/cgi-bin/webscr" method="post">-->
<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="seller@designerfotos.com">
<input type="hidden" name="item_name"
value="Memorex 256MB Memory Stick">
<input type="hidden" name="item_number" value="MEM32507725">
<input type="hidden" name="amount" value="0.03">
<input type="hidden" name="tax" value="0.01">
<input type="hidden" name="quantity" value="1">
<input type="hidden" name="no_note" value="1">
<input type="hidden" name="currency_code" value="USD">
<INPUT TYPE="hidden" NAME="return" value="http://localhost/can/user/dashboard/view_dashboard/1">

<!-- Enable override of buyers's address stored with PayPal . -->
<input type="hidden" name="address_override" value="1">
<!-- Set variables that override the address stored with PayPal. -->
<input type="image" name="submit" border="0" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" alt="PayPal - The safer, easier way to pay online">
</form>