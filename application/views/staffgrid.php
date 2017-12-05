<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Manager 
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('home/'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li>Staff Managment</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content" >
        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Staff Grid</h3>

                        <h3 style="float:right;">
                            <a href="<?php echo base_url('staff/add/'); ?>" class="btn btn-warning pull-right">Add Staff</a>
                        </h3>
                    </div>
                    <!-- /.box-header -->
                    <style>
                        @media only screen and (max-width: 600px) {
                            .newdata {
                                overflow-x:scroll !important;
                            }
                        }

                    </style>
                    <div class="box-body newdata" >

                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>

                                    <th>ID</th>
                                    <th>Manager</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Birth date</th>
                                    <th>Country</th>
                                    <th>Provience</th>
                                    <th>City</th>


                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($staff as $staff_item) { ?>
                                    <tr>

                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $staff_item['manager_name']; ?></td>
                                        <td><?php echo $staff_item['staff_name']; ?></td>
                                        <td><?php echo $staff_item['staff_phone']; ?></td>
                                        <td><?php echo $staff_item['staff_email']; ?></td>
                                        <td><?php echo $staff_item['staff_password']; ?></td>
                                        <td><?php echo $staff_item['staff_dob']; ?></td>
                                        <td><?php echo $staff_item['country_name']; ?></td>
                                        <td><?php echo $staff_item['state_name']; ?></td>
                                        <td><?php echo $staff_item['city_name']; ?></td>
                                        
                                        <td class="center">
                                            <a class="btn btn-primary" href="<?php echo base_url('staff/edit/' . $staff_item['staff_id']); ?>"><i class="fa fa-pencil fa-fw"></i></a>&nbsp;&nbsp;&nbsp;
                                            <a class="btn btn-success" href="<?php echo base_url('staff/delete/' . $staff_item['staff_id']); ?>" onclick="return confirm('Are you sure want to delete this?');"><i class="fa fa-times fa-fw"></i></a>
                                        </td>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assetsadmin/js/sweetalert.min.js"></script>
<script src="<?php echo base_url() ?>assetsadmin/js/sweetalert-dev.js"></script>
<link rel="stylesheet" href="<?php echo base_url() ?>assetsadmin/css/sweetalert.css">
<!--<script>
                                            var getinsertdata = '<?php echo $this->session->userdata('getinsertdata'); ?>';
                                            var getupdatedata = '<?php echo $this->session->userdata('getupdatedata'); ?>';
                                             var getdeletedata = '<?php echo $this->session->userdata('getdeletedata'); ?>';
                                            if (getinsertdata == 'insert') {
                                                swal("Sucess!", "User Added Sucessfully", "success");
<?php $this->session->unset_userdata('getinsertdata'); ?>
                                            }
                                            if (getupdatedata == 'update') {
                                                swal("Sucess!", "User Updated Sucessfully", "success");
<?php $this->session->unset_userdata('getupdatedata'); ?>
                                            }
                                             if (getdeletedata == 'delete') {
                                                swal("Sucess!", "User Deleted Sucessfully", "success");
<?php $this->session->unset_userdata('getupdatedata'); ?>
                                            }
</script>-->
<script type="text/javascript">
                                            $("#staff").addClass("active");

</script>