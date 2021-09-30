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
          <h1 class="jumbotron-heading"><?php echo $album[0]->name; ?></h1>
          <p class="lead text-muted"><?php echo $album[0]->artist; ?></p>
        </div>
      </section>

      <div class="album py-5 bg-light">
        <div class="container">
          <div>
            <div class="form-group">
              <label for="name">Album Name</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Album Name" value="<?php echo $album[0]->name; ?>">
            </div>
            <div class="form-group">
              <label for="artist">Artist</label>
              <select class="form-control" id="artist">
                <?php foreach ($artists as $key => $artist) { ?>
                <option value="<?php echo $artist[0]->name; ?>" <?php if($artist[0]->name == $album[0]->artist){ echo 'selected'; } ?>><?php echo $artist[0]->name; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label for="year">Album Year</label>
              <input type="number" step="1" class="form-control" id="year" name="year" placeholder="Album Year" value="<?php echo $album[0]->year; ?>">
            </div>
            <div class="form-group">
              <label for="comment">Comments</label>
              <textarea class="form-control" id="comment" name="comment" rows="3"><?php echo $album[0]->comment; ?></textarea>
            </div>
            <button type="button" class="btn btn-primary" onclick="EditAlbum(<?php echo $album[0]->id; ?>);">Edit Album</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="window.history.back();">Cancel</button>
          </div>
        </div>
      </div>

    </main>
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
  function EditAlbum(id) {
      var name = $('#name').val();
      var comment = $('#comment').val();
      var year = $('#year').val();
      var artist = $('#artist option:selected').val();

      var data = {
        id: id,
        name: name,
        artist: artist,
        year: year,
        comment: comment
      }

    Swal.fire({
      title: 'Are you sure you want to save this new information?',
      text: "This action is irreversible",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#D32929',
      cancelButtonColor: '#1C3FAA',
      cancelButtonText: 'Cancel',
      confirmButtonText: 'Edit it'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
            url: "/painel/editAlbum",
            method: "POST",
            data: data,
            success: function (data) {
                Swal.fire({
                  icon: 'success',
                  title: 'Edited!'
                })
                window.location.replace("/painel");
            },
            fail:  function (data) {
                Swal.fire({
                  icon: 'error',
                  title: 'Error!',
                  text: 'The album was not edited',
                  confirmButtonColor: '#D32929',
                })
            }
        });
        
      }
    })    
  }
</script>