<?php
require_once 'header.php';
  ?>
<div class="card text-center p-3 mb-2 bg-light text-dark">
  <div class="card-header alert alert-primary">
    Featured
  </div>
  <div class="card-body">
  	<span class="badge badge-pill badge-primary">Title</span>
    <h5 class="card-title"><?php echo $films['strFilmTitle'];  ?></h5>
    <img src="<?php echo base_url().$films['image']; ?>" class="card-text" alt="image" style="width: 50%; height: 50%; "><br>
    <span class="badge badge-pill badge-secondary">Story</span>
    <p class="card-text"><?php echo $films['memFilmStory'];  ?></p>
    <span class="badge badge-pill badge-info">Genre</span>
    <p class="card-text"><?php echo $films['lngFilmGenreID'];  ?></p>
    <span class="badge badge-pill badge-info">Certificate</span>
    <p class="card-text"><?php echo $films['lngFilmCertificateID'];  ?></p>
        <span class="badge badge-pill badge-info">Info</span>
    <p class="card-text"><?php echo $films['memFilmAdditionalInfo'];  ?></p>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">WATCH</button>
    <a href="#" class="btn btn-primary">DOWNLOAD</a>
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
         <iframe class="modal-content modal-body" src="https://www.youtube.com/embed/?listType=search&list=<?php echo $films['strFilmTitle']; ?>&autoplay=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></button>
      </div>
    </div>
  </div>
</div>
