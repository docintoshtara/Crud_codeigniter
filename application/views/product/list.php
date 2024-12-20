<!doctype html>
<html lang="en">

<head>
  <?php $this->load->view('includes/header'); ?>
  <title>Crud Application</title>
</head>

<body>

  <div class="container">
    <div class="row">

      <div class="col-lg-12 my-5">
        <h2 class="text-center mb-3">Crud Application</h2>
      </div>

      <div class="col-lg-12">

        <?php echo $this->session->flashdata('message'); ?>

        <div class="d-flex justify-content-between mb-3">
          <h4>Manage Product</h4>
          <a href="<?= base_url('Product/create') ?>" class="btn btn-success"> <i class="fas fa-plus"></i> Add New Post</a>
        </div>

        <table class="table table-bordered table-default">

          <thead class="thead-light">
            <tr>
              <th width="2%">#</th>
              <th width="10%">Name</th>
              <th width="15%">Title</th>
              <th width="26%">Photo</th>
              <th width="27%">Description</th>
              <th width="20%">Action</th>
            </tr>
          </thead>

          <tbody>

            <?php $i = 1; foreach ($data as $post) { ?>

              <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $post->name; ?></td>
                <td><?php echo $post->title; ?></td>
                <td> <img src="<?php echo base_url('/uploads/'.$post->photo)?>" width=100; height=100 /> </td>
                <td><?php echo $post->description; ?></td>

                <td>
                  <a href="<?= base_url('Product/edit/' . $post->id) ?>" class="btn btn-primary"> <i class="fas fa-edit"></i> Edit </a>
                  <a href="<?= base_url('Product/delete/' . $post->id) ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this record?')"> <i class="fas fa-trash"></i> Delete </a>
                  <a href="<?= base_url('Product/view/' . $post->id) ?>" class="btn btn-success"> <i class="fas fa-edit"></i> View </a>
                </td>

              </tr>

            <?php $i++; } ?>

          </tbody>

        </table>

      </div>
    </div>
  </div>



  <?php $this->load->view('includes/footer'); ?>

</body>

</html>