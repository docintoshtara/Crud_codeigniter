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
          <h4>Add New Accessories</h4>
          <a class="btn btn-warning" href="<?php echo base_url('Ordering'); ?>"> <i class="fas fa-angle-left"></i> Back</a>
        </div>

        <form method="post" action="<?php echo base_url('Ordering/store'); ?>" enctype="multipart/form-data">
       


        <div class="form-group">
            <label>Name</label>
            <select class="form-control" name="product_id">
            <?php 
                foreach($data as $each)
                { ?><option value="<?php echo $each->id; ?>"><?php echo $each->name; ?></option>';
                <?php }
            ?>
            </select>
          </div>

          <div class="form-group">
            <label>CAT.NO</label>
            <input class="form-control" type="text" name="cat_no">
          </div>

          <div class="form-group">
            <label>DESCRIPTION</label>
            <input class="form-control" type="text" name="description">
          </div>

          <div class="form-group">
            <label>STD. PACK</label>
            <input class="form-control" type="text" name="standar_pack">
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