<?php
require_once 'header.php';
echo form_open_multipart('Create/edit_films'); 
echo " <p> <label for='uimage'> Film Poster </label> <br/> ";
$data = array('name'=> 'image','id'=> 'uimage');
echo form_upload($data)."</p>";
echo form_label('Film Title: ')."<br>";
$data = array(
        'name'=>'strFilmTitle',
        'id'=>'title',
        'value'=>$films['strFilmTitle'],
        'size'=>'50',
        'required' => 'true'
);
echo form_input($data)."<br>";
echo form_label('Film Story: ')."<br>";
$data_textarea = array(
'name' => 'memFilmStory',
'rows' => 10,
'cols' => 50,
'value' => $films['memFilmStory'],
'required' => 'true'
);
echo form_textarea($data_textarea)."<br>";
echo form_label('Release Date: ')."<br>";
$data = array(
	'type' => 'date',
	'name' => $films['dtmFilmReleaseDate'],
	'value' => '',
	'required' => 'true'
);
echo form_input($data)."<br>";
echo form_label('Duration: ')."<br>";
$data = array(
	'name' => 'intFilmDuration',
	'value' => $films['intFilmDuration'],
	'placeholder' => 'ex: 120',
	'required'=> 'true'
);
echo form_input($data)."<br>";
echo form_label('Genre: ')."<br>";
$genre = array();
foreach($genres as $row){
	$genre[$row->lngGenreID] = $row->strGenre;
}
echo form_dropdown('lngFilmGenreID', $genre, '1')."<br>";
echo form_label('Certificate: ')."<br>";
$certs = array();
foreach($cert as $row){
	$certs[$row->lngCertificateID] = $row->strCertificate;
}
echo form_dropdown('lngFilmCertificateID', $certs, '1')."<br>";
echo form_label('Additional Info: ')."<br>";
$data_textarea = array(
'name' => 'memFilmAdditionalInfo',
'rows' => 10,
'cols' => 50,
'required' => 'true'
);
echo form_textarea($data_textarea)."<br>";
echo form_hidden('lngFilmTitleID');
echo form_submit('films_create', 'Submit');
echo form_close();
?>