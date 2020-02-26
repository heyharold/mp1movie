<?php
	require_once 'header.php';
?>
<div>
	<div class="container">
  <div class="row">
    <div class="col-12">
		<table class="table table-image">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Image</th>
		      <th scope="col">Full Name</th>
		      <th scope="col">Description</th>
		      <th scope="col">Edit</th>
		      <th scope="col">Remove</th>
		    </tr>
		  </thead>
		  <tbody>
		    <tr>		    	
		    	<?php
		    	$i = 1;
		    		foreach($actors as $row)
		    		{
		    	?>		
		      <th scope="row"><?php echo $i; ?></th>
		      <td class="w-25">
			      <img src="<?php echo base_url().$row->image; ?>" class="img-fluid img-thumbnail" alt="" style="width: 100px; height: 100px;">
		      </td>
		      <td><?php  echo $row->strActorFullName; ?></td>
		      <td><?php echo $row->memActorNotes; ?></td>
		      <td><?php echo anchor("Create/edit_actor/$row->lngActorID" , '<i class="fa fa-edit"></i>', 'name="actor_id"');?></td>
		      <td><?php echo anchor("Create/del_actor/$row->lngActorID" , '<i class="fa fa-trash"></i>', 'name="actor_id"');?></td>
		    </tr>
		    <?php	
		    	$i++;	
		    		}
		    	  ?>
		    </tr>
		  </tbody>
		</table>   
    </div>
  </div>
</div>
</div>