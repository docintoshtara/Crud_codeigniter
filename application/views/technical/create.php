<!doctype html>
<html lang="en">

<head>
  <?php $this->load->view('includes/header'); ?>
  <title>TECHNICAL DATA</title>
</head>

<body>

  <div class="container">
    <div class="row">

      <div class="col-lg-12 my-5">
        <h2 class="text-center mb-3">Crud Application</h2>
      </div>

      <div class="col-lg-12">

        <div class="d-flex justify-content-between ">
          <h4>Add New Technical</h4>
          <a class="btn btn-warning" href="<?php echo base_url('Product'); ?>"> <i class="fas fa-angle-left"></i> Back</a>
        </div>

        <form method="post" action="<?php echo base_url('Technical/store'); ?>" enctype="multipart/form-data">
       


        <div class="form-group">
            <label>Title</label>
            <select class="form-control" name="product_id">
            <?php 
                foreach($data as $each)
                { ?><option value="<?php echo $each->id; ?>"><?php echo $each->name; ?></option>';
                <?php }
            ?>
            </select>
          </div>

          <div class="form-group">
            <label>Title</label>
            <input class="form-control" type="text" name="title">
          </div>

          <div class="form-group">
            <label>Value</label>
            <input class="form-control" type="text" name="title_value">
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