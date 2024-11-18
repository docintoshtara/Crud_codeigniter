<!doctype html>
<html lang="en">

<head>
  <?php $this->load->view('includes/header'); ?>
  <title>Edit Post</title>
</head>

<body>

  <div class="container">
    <div class="row">

      <div class="col-lg-12 my-5">
        <h2 class="text-center mb-3">Crud Application</h2>
      </div>

      <div class="col-lg-12">

        <div class="d-flex justify-content-between ">
          <h4>Edit Post</h4>
          <a class="btn btn-warning" href="<?php echo base_url('Product'); ?>"> <i class="fas fa-angle-left"></i> Back</a>
        </div>

        <form method="post" action="<?php echo base_url('Product/update/' . $data->id); ?>" enctype="multipart/form-data">

        <div class="form-group">
            <label>Name</label>
            <input class="form-control" type="text" name="name" value="<?php echo $data->name; ?>">
          </div>


          <div class="form-group">
            <label>Title</label>
            <input class="form-control" type="text" name="title" value="<?php echo $data->title; ?>">
          </div>

          <div class="form-group">
            <label>Description</label>
            <textarea class="form-control" name="description"><?php echo $data->description; ?></textarea>
          </div>

          <div class="form-group">
            <label>Product Image</label>
            <input class="form-control" type="file" name="photo">
          </div>

          <br/>  <br/>
          
          <div class="form-group">
            <img src="<?php echo base_url('/uploads/'.$data->photo)?>" width=100; height=100 />
          </div>



          <div class="form-group">
            <button type="submit" class="btn btn-success"> <i class="fas fa-check"></i> Submit </button>
          </div>

        </form>


      </div>
    </div>
  </div>



  <?php $this->load->view('includes/footer'); ?>

</body>

</html>