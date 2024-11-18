<!doctype html>
<html lang="en">

<head>
  <?php $this->load->view('includes/header'); ?>
  <title>Edit Post</title>
</head>

<body>

  <div class="container">
    <div class="row">

    
      <div class="col-lg-12">
            <br>
        <div class="d-flex justify-content-between ">
          <h4><?php echo $data->name; ?></h4>
          <a class="btn btn-warning" href="<?php echo base_url('Product'); ?>"> <i class="fas fa-angle-left"></i> Back</a>
        </div>
      </div>
    <div class="row">
            <div class="col-lg-4"> <img src="<?php echo base_url('/uploads/'.$data->photo)?>" width=200; height=200 />
            </div>
            <div class="col-lg-6">
                    <b><?php echo $data->title; ?></b><br>
                    <?php echo $data->description; ?>
            </div>

        <div class="col-lg-6">
            <h5 style="text-align:center" >TECHNICAL DATA</h5>
            <table class="table table-bordered table-default">
                <thead class="thead-light">
                <tr>
                    <th width="2%">#</th>
                    <th width="10%">title</th>
                    <th width="15%">Value</th>
                </tr>
                </thead>
            <tbody>
                <?php $i = 1; foreach ($technical as $tc) { ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $tc->title; ?></td>
                        <td><?php echo $tc->title_value; ?></td>
                    </tr>
                <?php $i++; } ?>
                </tbody>
            </table>
            </div>

        <div class="col-lg-6">
            <h5 style="text-align:center" >ORDERING INFORMATION</h5>
            <table class="table table-bordered table-default">
                <thead class="thead-light">
                <tr>
                    <th width="2%">#</th>
                    <th width="10%">CAT. NO.</th>
                    <th width="10%">DESCRIPTION</th>
                    <th width="15%">STD. PACK</th>
                </tr>
                </thead>
            <tbody>
                <?php $i = 1; foreach ($ordering as $tc) { ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $tc->cat_no; ?></td>
                        <td><?php echo $tc->description; ?></td>
                        <td><?php echo $tc->standar_pack; ?></td>
                    </tr>
                <?php $i++; } ?>
                </tbody>
            </table>
            </div>


            <div class="col-lg-6">
            <h5 style="text-align:center" >CONNECTION DATA</h5>
            <table class="table table-bordered table-default">
                <thead class="thead-light">
                <!-- <tr>
                    <th width="2%">#</th>
                    <th width="10%">CAT. NO.</th>
                    <th width="10%">DESCRIPTION</th>
                    <th width="15%">STD. PACK</th>
                </tr> -->
                </thead>
            <tbody>
                <?php $i = 1; foreach ($connection as $tc) { ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $tc->title; ?></td>
                        <td><?php echo $tc->title_value; ?></td>
                    </tr>
                <?php $i++; } ?>
                </tbody>
            </table>
            </div>


            <div class="col-lg-6">
            <h5 style="text-align:center" >ACCESSORIES</h5>
            <?php foreach ($product_details as $pd) { ?>
                <img src="<?php echo base_url('/uploads/'.$data->photo)?>" width=200; height=200 />
                    
                <?php  
                  $orderdetails = $this->db->query('SELECT * FROM `ordering_information` WHERE product_id = "'.$pd->id.'"')->result();
                
                ?>

            <table class="table table-bordered table-default">
                <thead class="thead-light">
                <tr>
                    <th width="2%">#</th>
                    <th width="10%">CAT. NO.</th>
                    <th width="10%">DESCRIPTION</th>
                    <th width="15%">STD. PACK</th>
                </tr>
                </thead>
            <tbody>
                <?php $i = 1; foreach ($orderdetails as $od) { ?>
                    <tr>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $od->cat_no; ?></td>
                        <td><?php echo $od->description; ?></td>
                        <td><?php echo $od->standar_pack; ?></td>
                    </tr>
                    </tr>
                <?php $i++; } ?>
                </tbody>
            </table>
        <?php } ?>
    </div>


        </div>
    </div>
</div>



  <?php $this->load->view('includes/footer'); ?>

</body>

</html>