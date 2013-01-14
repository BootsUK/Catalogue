<h3>Adecco staff check-in//out</h3>

<section>

<?php 

echo form_open('check_in/save_log');

echo validation_errors();

$data = array(
	"arrive" => "Arrive",
	"lfl" => "Leave for lunch",
	"rfl" => "Return from lunch",
	"leave" => "Leave"
	);

echo form_dropdown('action', $data, 'arrive');

$data = array(
    'name' => 'submit',
    'id' => 'submit',
    'value' => 'true',
    'type' => 'submit',
    'content' => 'Submit'
);

echo form_button($data);

echo form_close();

?>

</section>