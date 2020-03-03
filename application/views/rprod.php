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
		      <th scope="col">Name</th>
		      <th scope="col">Email</th>
		      <th scope="col">Website</th>
		      <th scope="col">Edit</th>
		      <th scope="col">Remove</th>
		    </tr>
		  </thead>
		  <tbody>
		    <tr>		    	
		    	<?php
		    	$i = 1;
		    		foreach($prod as $row)
		    		{
		    	?>		
		      <th scope="row"><?php echo $i; ?></th>
		      <td><?php  echo $row->strProducerName; ?></td>
		      <td><?php echo $row->hypContactEmailAddress; ?></td>
		      <td><?php echo anchor("http://$row->hypWebsite" , $row->hypWebsite, 'name="hypWebsite"');?></td>
		      <td><?php echo anchor("Create/edit_prod/$row->lngProducerID" , '<i class="fa fa-edit"></i>', 'name="prod_id"');?></td>
		      <td><?php echo anchor("Create/del_prod/$row->lngProducerID" , '<i class="fa fa-trash"></i>', 'name="prod_id"');?></td>
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