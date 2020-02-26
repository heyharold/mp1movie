<?php 
require_once 'header.php';
// echo "<p>".$id."</p>";
echo form_open_multipart('Create/edit_actor_data'); 
echo form_label('Actor name: ');
echo "<br>";
$data = array(
        'name'=>'strActorFullName',
        'id'=>'name',
        'value'=>$actor['strActorFullName'],
        'size'=>'50'
);
echo form_input($data)."<br>";
echo form_label('Description: ');
echo "<br>";
$data_textarea = array(
'name' => 'memActorDesc',
'rows' => 10,
'cols' => 50,
'value'=> $actor['memActorNotes']
);
echo form_textarea($data_textarea)."<br>";
echo " <p> <label for='uimage'> Upload Image </label> <br/> ";
$data = array('name'=> 'image','id'=> 'uimage');
echo form_upload($data) ."</p>";
echo form_hidden('lngActorID', $actor['lngActorID']);
echo form_submit('actor_create', 'Submit');
echo form_close( );
 ?>

</body>
</html>