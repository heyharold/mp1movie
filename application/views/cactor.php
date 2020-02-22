<?php

echo form_open_multipart('Create/actor_create/'); 
echo form_label('Actor name: ');
echo "<br>";
$data = array(
        'name'=>'strActorFullName',
        'id'=>'name',
        'value'=>'',
        'size'=>'50'
);
echo form_input($data)."<br>";
echo form_label('Description: ');
echo "<br>";
$data_textarea = array(
'name' => 'memActorDesc',
'rows' => 10,
'cols' => 50
);
echo form_textarea($data_textarea)."<br>";
echo " <p> <label for='uimage'> Upload Image </label> <br/> ";
$data = array('name'=> 'image','id'=> 'uimage');
echo form_upload($data) ."</p>";
echo form_submit('actor_create', 'Submit');
echo form_close( );
  ?>