<!DOCTYPE html>
<html class="">
<?php $this->load->view('component/head'); ?>
<link rel="stylesheet" href="/public/css/bootstrap.min.css" />
</head>
  <body>

    <header>
    </header>

    <main role="main">

      <section class="jumbotron text-center banner-session">
        <div class="container">
          <h1 class="jumbotron-heading">Music App Example</h1>
          <p class="lead text-muted">Here you can add, delete or just edit any album that you like</p>
          <p>
            <button type="button" class="btn btn-secondary my-2" data-toggle="modal" data-target="#exampleModal">Add Album</button>
          </p>
        </div>
      </section>

      <div class="album py-5 bg-light">
        <div class="container">
          <div class="row">
            <?php foreach ($albuns as $key => $album) { ?>
              <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                  <img class="card-img-top" src="/public/images/vinyl.png" alt="Card image cap">
                  <div class="card-body">
                    <p class="card-text"><?php echo $album->name.' - '.$album->artist; ?></p>
                    <p class="card-text"><?php echo $album->comment; ?></p>
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="btn-group">
                        <a href="/painel/view/<?php echo $album->id; ?>" class="btn btn-sm btn-outline-secondary">Edit</a>
                        <?php if($this->session->userdata('role') == 1) { ?>
                        <button type="button" class="btn btn-sm btn-outline-secondary" onclick="deleteAlbum(<?php echo $album->id; ?>);">Delete</button>
                        <?php } ?>
                      </div>
                      <small class="text-muted"><?php echo $album->year; ?></small>
                    </div>
                  </div>
                </div>
              </div>
           <?php } ?>
          </div>
        </div>
      </div>

    </main>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <div class="form-group">
              <label for="exampleFormControlInput1">Album Name</label>
              <input type="text" class="form-control" id="album_name" placeholder="Write the Album's name">
            </div>
            <div class="form-group">
              <label for="exampleFormControlSelect1">Artist</label>
              <select class="form-control" id="artist">
                <?php foreach ($artists as $key => $artist) { ?>
                <option value="<?php echo $artist[0]->name; ?>"><?php echo $artist[0]->name; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Album Year</label>
              <input type="number" step="1" class="form-control" id="album_year" placeholder="Write the Album's year">
            </div>
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Comments</label>
              <textarea class="form-control" name="comment" id="comment" rows="3"></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" onclick="AddAlbum();">Add Album</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../../../public/js/bootstrap.min.js"></script>
  </body>
<?php $this->load->view('component/js'); ?>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
  function deleteAlbum(id) {
    var data = {
      id: id
    }
    Swal.fire({
      title: 'Are you sure you wanna delete this album?',
      text: "This action is irreversible",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#D32929',
      cancelButtonColor: '#1C3FAA',
      cancelButtonText: 'Cancel',
      confirmButtonText: 'Delete it'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
            url: "/painel/deletealbum",
            method: "POST",
            data: data,
            success: function (data) {
                Swal.fire({
                  icon: 'success',
                  title: 'Deleted!'
                })
                location.reload();
            },
            fail:  function (data) {
                Swal.fire({
                  icon: 'error',
                  title: 'Error!',
                  text: 'The album was not deleted',
                  confirmButtonColor: '#D32929',
                })
            }
        });
        
      }
    })    
}
   function AddAlbum() {
      var name = $('#album_name').val();
      var comment = $('#comment').val();
      var year = $('#year').val();
      var artist = $('#artist option:selected').val();

      var data = {
          name: name,
          artist: artist,
          year: year,
          comment: comment
      }
     $.ajax({
        url: "/painel/addAlbum",
        method: "POST",
        data: data,
        success: function (data) {
            Swal.fire({
              icon: 'success',
              title: 'Added!'
            })
            location.reload();
        },
        fail:  function (data) {
          Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: 'The album was not added',
            confirmButtonColor: '#D32929',
          })
        }
      });
}
</script>