<?php
require_once 'header.php'; 
echo form_open_multipart('Create/prod_create'); 
echo form_label('Producer Name: ')."<br>";
$data = array(
'name' => 'strProducerName',
'size' => 50,
'required' => 'true'
);
echo form_input($data)."<br>";
echo form_label('Email: ')."<br>";
$data = array(
	'type' => 'Email',
	'name' => 'hypContactEmailAddress',
	'value' => '',
	'size' => 50,
	'placeholder' => 'ex: johndoe@gmail.com',
	'required' => 'true'
);
echo form_input($data)."<br>";
echo form_label('Website: ')."<br>";
$data = array(
	'name' => 'hypWebsite',
	'value' => '',
	'size' => 50,
	'placeholder' => 'ex: domain.com',
	'required'=> 'true'
);
echo form_input($data)."<br>";
echo form_submit('prod_create', 'Submit')."<br>";
echo form_close(); ?>
