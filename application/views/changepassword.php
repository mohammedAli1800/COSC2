<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/timepicker/bootstrap-timepicker.min.css">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Change Password
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li>Change Password</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- Horizontal Form -->
                <div class="box box-info"> 
                    <div class="box-header with-border">
                        <h3 class="box-title">Change Password Form</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    
                    <form role="form" method="post" action="<?php echo base_url('changepassword/insert/'); ?>" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input tabindex="3" required type="password" name="password" placeholder="Enter Password" id="password" class="form-control"/>
                                       
                                        <span  onclick="if (password.type == 'text')
                                                    password.type = 'password';
                                                else
                                                    password.type = 'text';" class="input-group-addon"><i class="fa fa-eye"></i></span>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input tabindex="3" required type="password" name="confim" placeholder="Enter Confim Password" id="confim" class="form-control"/>
                                        <span  onclick="if (confim.type == 'text')
                                                    confim.type = 'password';
                                                else
                                                    confim.type = 'text';" class="input-group-addon"><i class="fa fa-eye"></i></span>
                                    </div>

                                </div>
                                <!-- /.col -->

                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>

                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" onclick="return Validate();" class="btn btn-info pull-right">Update</button>
                        </div>
                        <!-- /.box-footer -->
                    </form>
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
<script src="<?php echo base_url(); ?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<script type="text/javascript">
                                $("#changepassword").addClass("active");
                                $('.select2').select2();


                                $('.timepicker').timepicker({
                                    showInputs: false
                                })
</script>
<script type="text/javascript">
    function Validate() {
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("confim").value;
        if (password != confirmPassword) {
            alert("Password and ConfirmPassword do not match.");
            return false;
        }
        return true;
    }
</script>
