<!-- <script data-ad-client="ca-pub-3103702203644363" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> -->
<style type="text/css">
body {
  height: 100%;
  width: 100%;
  background: #e9e9e9;
  font-family: 'Arimo', Arial, sans-serif;
  font-weight: 400;
  font-size: 14px;
  color: #010b26;
}

* {
  -webkit-transition: 300ms;
  transition: 300ms;
}

.intro {
  text-align: center;
}

ul {
  list-style-type: none;
}

h1, h2, h3, h4, h5, p {
  font-weight: 400;
}

a {
  text-decoration: none;
  color: inherit;
}

a:hover {
  color: #6ABCEA;
}

.container {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: wrap;
      flex-wrap: wrap;
  max-width: 100%;
  margin-top: 10vh;
  margin-left: auto;
  margin-right: auto;
  -webkit-box-pack: center;
      -ms-flex-pack: center;
          justify-content: center;
}

.movie-card {

  background: #ffffff;
  box-shadow: 0px 6px 18px rgba(0, 0, 0, 0.1);
  width: 100%;
  max-width: 315px;
  margin: 1em;
  border-radius: 10px;
  display: inline-block;
}
.header-icon-container {
  position: relative;
}

.header-icon {
  width: 100%;
  height: 367px;
  line-height: 367px;
  text-align: center;
  vertical-align: middle;
  margin: 0 auto;
  color: #ffffff;
  font-size: 54px;
  text-shadow: 0px 0px 20px #6abcea, 0px 5px 20px #6ABCEA;
  opacity: .85;
}

.header-icon:hover {
  background: rgba(0, 0, 0, 0.15);
  font-size: 74px;
  text-shadow: 0px 0px 20px #6abcea, 0px 5px 30px #6ABCEA;
  border-top-left-radius: 10px;
  border-top-right-radius: 10px;
  opacity: 1;
}

.movie-card:hover {
  -webkit-transform: scale(1.03);
          transform: scale(1.03);
  box-shadow: 0px 10px 25px rgba(0, 0, 0, 0.08);
}

.movie-content {
  /*padding: 18px 18px 24px 18px;*/
  margin: 0;
}

.movie-content-header, .movie-info {
  display: table;
  width: 100%;
}

.movie-title {
  font-size: 24px;
  margin: 0;
  display: table-cell;
}
	@media screen and (max-width: 500px) {
  .movie-card {
    width: 95%;
    max-width: 95%;
    margin: 1em;
    display: block;
  }

  .container {
    padding: 0;
    margin: 0;
    width: 100%;
  }
}
</style>
<!-- -->
<?php
$r =1;
	foreach ($films as $row) {
if($r == 3){
?>
<div class="card-deck container card-group">
<?php  } ?>
  <div class="card movie-card card-body shadow-lg p-3 mb-5 bg-white rounded">
    <a href="<?php echo base_url('Create/film/'.$row->lngFilmTitleID.'');  ?>"><img class="card-img-top" src="<?php echo base_url().$row->image;  ?>" alt="<?php echo $row->strFilmTitle;  ?>" class="img-fluid" width=285px; height=422px;></a>
    <!-- <div class="card-body movie-content"> -->
    	<?php //echo anchor('Create/film/'.$row->lngFilmTitleID.'', $row->strFilmTitle, 'class="card-text btn btn-primary"'); ?><br>
      <!-- <p class="card-text"><?php //echo $row->memFilmStory;  ?></p> -->
	  <!-- <p class="card-text"><?php //echo $row->dtmFilmReleaseDate;  ?></p> -->
	  <!-- <p class="card-text"><?php //echo $row->intFilmDuration;  ?>mins</p> -->
      <!-- <p class="card-text"><small class="text-muted">Rating : <?php //echo anchor('Create/film/'.$row->lngFilmTitleID.'', 'see', 'class="card-text text-muted"'); ?></small></p> -->
    </div>
  </div>
<?php
$r++;
if ($r == 3) {
  $r = 0;
}
}
  ?>	
<!-- </div> -->
<script src="http://code.jquery.com/jquery-2.1.3.min.js">
  
document.onload = setTimeout(function () { alert('msg'); }, 5000);