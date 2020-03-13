<?php 
require_once 'header.php';  
?>
<?php echo form_open('Create/checkout');  ?>
<div>
	<div class="container">
  <div class="row">
    <div class="col-12">
		<table class="table table-image">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Title</th>
		      <th scope="col">Quantity</th>
		      <th scope="col">Remove</th>
		    </tr>
		  </thead>
		  <tbody>
		    <tr>		    	
		    	<?php
		    	$i = 1;
		    	$x = 0;
		    		foreach($carts as $row)
		    		{
		    	?>		
		      <th scope="row"><?php echo $i; ?><input type="checkbox" name="filmid[]" value="<?php echo $row['lngFilmTItleID'];  ?>"></th>
		      <td><?php  echo $row['strFilmTitle']; ?></td>
		      <td><span class="btn btn-light"><?php echo anchor('Create/addqty/'.$row['lngFilmTItleID'].'', '<i class="fa fa-plus"></i>', 'name="addqty"') ?></span><?php echo $row['qty']; ?>  <span class="btn btn-light">  <?php echo anchor('Create/reduceqty/'.$row['lngFilmTItleID'].'', '<i class="fa fa-minus"></i>', 'name="reduceqty"') ?></span></td>
		      <td><?php echo anchor('Create/removetocart/'.$row['lngFilmTItleID'].'' , '<i class="fa fa-trash"></i>', 'name="idcarts"');?></td>
		    </tr>
		    <?php	
		    	$i++;	
		    		}
		    	  ?>
		    </tr>
			<td><input type="submit" name="checkout" class="btn btn-primary" value="Checkout" <?php 
			if ($_SESSION['qty'] == 0) { echo "disabled";}?>></td>
		  </tbody>
		</table>   
    </div>
  </div>
</div>
</div>
</form>