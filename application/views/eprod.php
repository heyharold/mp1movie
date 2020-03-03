<?php
require_once 'header.php'; 
echo form_open_multipart('Create/prod_edit'); 
echo form_label('Producer Name: ')."<br>";
$data = array(
'name' => 'strProducerName',
'size' => 50,
'value' => $prod->strProducerName,
'required' => 'true'
);
echo form_input($data)."<br>";
echo form_label('Email: ')."<br>";
$data = array(
	'type' => 'Email',
	'name' => 'hypContactEmailAddress',
	'value' => $prod->hypContactEmailAddress,
	'size' => 50,
	'placeholder' => 'ex: johndoe@gmail.com',
	'required' => 'true'
);
echo form_input($data)."<br>";
echo form_label('Website: ')."<br>";
$data = array(
	'name' => 'hypWebsite',
	'value' => $prod->hypWebsite,
	'size' => 50,
	'placeholder' => 'ex: domain.com',
	'required'=> 'true'
);
echo form_input($data)."<br>";
echo form_hidden('lngProducerID', $prod->lngProducerID)."<br>";
echo form_submit('prod_edit', 'Edit')."<br>";
echo form_close(); ?>