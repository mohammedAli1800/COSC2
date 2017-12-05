<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/select2/dist/css/select2.min.css">

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Report 
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('home/'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li>Report Managment</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content" >
        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Report Grid</h3>

                        <h3 style="float:right;">

                        </h3>
                    </div>
                    <style>
                        @media only screen and (max-width: 600px) {
                            .newdata {
                                overflow-x:scroll !important;
                            }
                        }

                    </style>
                    <!-- /.box-header -->

                    <div class="box-body newdata" >
                        <form method="post" action="<?php echo base_url('report/') ?>">


                            <div class="col-lg-12" style="padding:0px !important;margin:0px !important;">
                                <div class="form-group col-lg-2" style="padding-left:0px !important;margin-left:0px !important;">
                                    <label>Select City</label>
                                    <select tabindex="7"  id="country"  name="manager_country" class=" col-lg-4 form-control select2" style="width: 100%;">
                                        <option value="" selected disabled>Select City</option>
                                        <?php foreach ($city as $city_item) { ?>
                                            <option value="<?php echo $city_item['c_id']; ?>"><?php echo $city_item['city_name']; ?></option>   
                                        <?php } ?>
                                    </select>

                                    <script>
                                        // alert(<?php echo $this->session->userdata("cc_id"); ?>);
                                        document.getElementById("country").value = "<?php echo $this->session->userdata("cc_id"); ?>";
                                    </script>
                                </div>
                                <div class="form-group col-lg-2" style="padding-left:0px !important;margin-left:0px !important;">
                                    <label>Select Age</label>
                                    <select tabindex="7"  id="age_id"  name="age_id" class="form-control" style="width: 100%;">
                                        <option value="" selected disabled>Select Age</option>
                                        <?php for ($i = 1; $i <= 30; $i++)  { ?>
                                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>   
                                        <?php } ?>
                                        </select>

                                        <script>
                                            // alert(<?php echo $this->session->userdata("cc_id"); ?>);
                                            document.getElementById("age_id").value = "<?php echo $this->session->userdata("age_id"); ?>";
                                        </script>
                                    </div>
                                    <div class="col-lg-2">
                                        <button  type="submit"  class="btn btn-info" style="margin-top:25px;">Submit</button>

                                    </div>
                                    <div class="col-lg-2"><a style="margin-top:23px;"  href="<?php echo base_url('report/clearfilter') ?>" class="btn btn-primary">Clear Filter</a></div>


                                </div>
                            </form>
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>

                                        <th>ID</th>
                                        <th>Staff Name</th>
                                        <th>Manager Name</th>
                                        <th>Email</th>
                                        <th>Phone No</th>
                                        <th>Password</th>
                                        <th>Birth Date</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($user as $user_item) { ?>
                                        <tr>

                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $user_item['staff_name']; ?></td>
                                            <td><?php echo $user_item['manager_name']; ?></td>
                                            <td><?php echo $user_item['staff_email']; ?></td>
                                            <td><?php echo $user_item['staff_phone']; ?></td>
                                            <td><?php echo $user_item['staff_password']; ?></td>
                                            <td><?php echo $user_item['staff_dob']; ?></td>

                                        </tr>
                                        <?php $i++; ?>
                                    <?php } ?>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <script src="<?php echo base_url(); ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
                                        $("#report").addClass("active");
                                        $('.select2').select2();

</script>