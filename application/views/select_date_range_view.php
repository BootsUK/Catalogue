<?php echo form_open('interactive_team/view_by_date_range');

echo "<li>Enter start date: <br />";
echo form_input('start_date', '', 'class="datepicker"');
echo "</li>";

echo "<li>Enter end date: <br />";
echo form_input('end_date', '', 'class="datepicker"');
echo "</li>";


?>

</form>