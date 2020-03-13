<?php
require_once 'header.php';
  ?>
<style type="text/css">
    /* 
        Use :not with impossible condition so inputs are only hidden 
        if pseudo selectors are supported. Otherwise the user would see
        no inputs and no highlighted stars.
    */
    .rating input[type="radio"]:not(:nth-of-type(0)) {
        /* hide visually */    
        border: 0;
        clip: rect(0 0 0 0);
        height: 1px;
        margin: -1px;
        overflow: hidden;
        padding: 0;
        position: absolute;
        width: 1px;
    }
    .rating [type="radio"]:not(:nth-of-type(0)) + label {
        display: none;
    }
    
    label[for]:hover {
        cursor: pointer;
    }
    
    .rating .stars label:before {
        content: "★";
    }
    
    .stars label {
        color: lightgray;
    }
    
    .stars label:hover {
        text-shadow: 0 0 1px #000;
    }
    
    .rating [type="radio"]:nth-of-type(1):checked ~ .stars label:nth-of-type(-n+1),
    .rating [type="radio"]:nth-of-type(2):checked ~ .stars label:nth-of-type(-n+2),
    .rating [type="radio"]:nth-of-type(3):checked ~ .stars label:nth-of-type(-n+3),
    .rating [type="radio"]:nth-of-type(4):checked ~ .stars label:nth-of-type(-n+4),
    .rating [type="radio"]:nth-of-type(5):checked ~ .stars label:nth-of-type(-n+5) {
        color: orange;
    }
    
    .rating [type="radio"]:nth-of-type(1):focus ~ .stars label:nth-of-type(1),
    .rating [type="radio"]:nth-of-type(2):focus ~ .stars label:nth-of-type(2),
    .rating [type="radio"]:nth-of-type(3):focus ~ .stars label:nth-of-type(3),
    .rating [type="radio"]:nth-of-type(4):focus ~ .stars label:nth-of-type(4),
    .rating [type="radio"]:nth-of-type(5):focus ~ .stars label:nth-of-type(5) {
        color: darkorange;
    }
</style>
<div class="card text-center p-3 mb-2 bg-light text-dark">
  <div class="card-header alert alert-primary">
    Featured
  </div>
  <div class="card-body">
  	<span class="badge badge-pill badge-primary">Title</span>
    <h5 class="card-title"><?php echo $films['strFilmTitle'];  ?></h5>
    <img src="<?php echo "http://harlie.com/".$films['image'].""; ?>" class="card-text" alt="image"><br>
    <span class="badge badge-pill badge-secondary">Story</span>
    <p class="card-text text-center"><?php echo $films['memFilmStory'];  ?></p>
    <span class="badge badge-pill badge-info">Genre</span>
    <p class="card-text"><?php echo $films['lngFilmGenreID'];  ?></p>
    <span class="badge badge-pill badge-info">Certificate</span>
    <p class="card-text"><?php echo $films['lngFilmCertificateID'];  ?></p>
    <span class="badge badge-pill badge-info">Info</span>
    <p class="card-text"><?php echo $films['memFilmAdditionalInfo'];  ?></p>
    <span class="badge badge-pill badge-info">Ratings</span>
    <p class="card-text"><?php
    // $rate = 0;
    if($rating[0]['lngRatingID'] == null){
      echo "N/A";
    }
      else {echo $rate = number_format((1*$rating_1 + 2*$rating_2 + 3*$rating_3 + 4*$rating_4 + 5*$rating_5) / $voters['voters'], 1);
      }
      ?>/5</p>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">WATCH</button><br><br>
    <?php if (isset($_SESSION['username'])) {
      echo form_open('Create/addtocart/'.$films['lngFilmTitleID'].''); //Create/film/addtocart/'.$films['lngFilmTitleID'].'
      $data = array(
        'name'  => 'addtocart',
        'value' => 'DOWNLOAD',
        'onclick' => 'toastr.success(\'Movie added!!\')',
        'class' => 'btn btn-success'
);
      echo form_submit($data);
      echo form_close();
      // echo anchor('Create/film/'.$films['lngFilmTitleID'].'', 'DOWNLOAD', 'class="btn btn-success" onclick="toastr.success(\'Movie added to cart!!!\')"');
      // echo '<button class="btn btn-success" onclick="toastr.success(\'Movie added to cart successfully!\');" name="addtocart" formaction="'.base_url().'Create/film/'.$films['lngFilmTitleID'].'" method="POST"">DOWNLOAD</button>'; }
    }
      else { echo '<button class="btn btn-success" onclick="toastr.error(\'Cannot add to cart, Login first!.\');" name="addtocart">DOWNLOAD</button>';} ?>
    <!-- <a href="#" class="btn btn-primary">DOWNLOAD</a> -->
  </div>
  <div class="card-footer text-muted">
    <?php echo $films['dtmFilmReleaseDate']; ?>
  </div>
</div>

<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">WATCH <?php echo $films['strFilmTitle'];  ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <iframe class="modal-content modal-body" src="https://www.youtube.com/embed/?listType=search&list=<?php echo $films['strFilmTitle']." Trailer"; ?>&autoplay=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
      <div class="modal-footer">
        <div class="container">
<!--        <form action="Welcome/index" method="POST" id="rate"> -->
<?php echo form_open("Create/film/".$films["lngFilmTitleID"]); ?>
    <fieldset class="rating">
      
        <input id="demo-1" type="radio" name="demo" value="1"> 
        <label for="demo-1">1 star</label>
        <input id="demo-2" type="radio" name="demo" value="2">
        <label for="demo-2">2 stars</label>
        <input id="demo-3" type="radio" name="demo" value="3">
        <label for="demo-3">3 stars</label>
        <input id="demo-4" type="radio" name="demo" value="4">
        <label for="demo-4">4 stars</label>
        <input id="demo-5" type="radio" name="demo" value="5">
        <label for="demo-5">5 stars</label>
        
        <div class="stars">
          <?php 
          
            for($x=0; $x<=4; $x++){
              echo "<label for=\"demo-".$rates[$x]['lngRatingID']."\" aria-label=\"".$rates[$x]['strRatingDesc']."\" title=\"".$rates[$x]['strRatingDesc']."\"></label>"; 
            }
          ?>
        </div>
            </fieldset>
<?php if (!isset($_SESSION['username'])) {
  echo anchor('Create/login', 'Submit' , 'class="btn btn-primary"');
}else {echo form_submit('rate', 'Submit', 'class="btn btn-primary"');} ?>
</form>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>