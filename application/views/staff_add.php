<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/timepicker/bootstrap-timepicker.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Staff
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li>Add Staff</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- Horizontal Form -->
                <div class="box box-info"> 
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Staff Form</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="<?php echo base_url('staff/insert/'); ?>" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Select Manager</label>
                                        <select tabindex="7" required id="manager_id"  name="manager_id" class="form-control select2" style="width: 100%;">
                                            <option value="" selected disabled>Select Manager</option>
                                            <?php foreach ($manager as $manager_item) { ?>
                                                <option value="<?php echo $manager_item['manager_id']; ?>"><?php echo $manager_item['manager_name']; ?></option>   
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input tabindex="1" onchange="return finddata();" required type="text" name="staff_name" placeholder="Enter User Name" id="name" class="form-control"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input tabindex="3" required type="password" name="staff_password" placeholder="Enter Password" id="password" class="form-control"/>
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <label>Select Country</label>
                                        <select tabindex="7" required id="country" onchange="selectState(this.options[this.selectedIndex].value)" name="staff_country" class="form-control select2" style="width: 100%;">
                                            <option value="" selected disabled>Select Country</option>
                                            <?php foreach ($country as $country_item) { ?>
                                                <option value="<?php echo $country_item['c_id']; ?>"><?php echo $country_item['country_name']; ?></option>   
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Provience</label>
                                        <select tabindex="1" required id="tbl_state_dropdown"  onchange="selectCity(this.options[this.selectedIndex].value)" name="staff_state" class="form-control select2" style="width: 100%;">
                                            <option value="" selected disabled>Provience</option>
                                        </select>
                                        <span id="city_loader"></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Select City</label>
                                        <select tabindex="1" required id="tbl_city_dropdown" name="staff_city" class="form-control select2" style="width: 100%;">
                                            <option value="" selected disabled>Select City</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Mobile No</label>
                                        <input tabindex="4"  maxlength="10" required type="text" name="staff_phone" pattern="\d{10}" title="Please Enter !0 Digit Valid Mobile No" onkeypress='return (event.which >= 48 && event.which <= 57)
                                                        || event.which == 8 || event.which == 46' placeholder="Enter Mobile No" id="dmono" class="form-control"/>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input tabindex="2" required type="email" name="staff_email" placeholder="Enter Email Address" id="email" class="form-control"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input tabindex="5" required type="password" name="confimpassword" placeholder="Enter Confim Password" id="confimpassword" class="form-control"/>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Birth Date</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control pull-right" name="staff_dob" id="datepicker">
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>

                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" onclick="return Validate();" class="btn btn-info pull-right">Submit</button>
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
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript">
                                $("#staff").addClass("active");
                                $('.select2').select2();


                                $('.timepicker').timepicker({
                                    showInputs: false
                                })

                                $('#email').keyup(function () {
                                    this.value = this.value.toLowerCase();
                                });
                               var today = new Date();
                                $('#datepicker').datepicker({
                                    autoclose: true,
                                    endDate: "today",
                                    maxDate: today

                                });
</script>
<script type="text/javascript">
function finddata() {
        var name = $("#name").val();
        var dataString = 'name=' + name;
        $.ajax({
            type: "POST",
            data: dataString,
            cache: false,
            url: "<?php echo base_url(); ?>index.php/staff/finddata",
            success: function (result) {
              if(result!=""){
                  
                  window.location="<?php echo base_url('staff/edit/'); ?>"+result;
              }
            }
        });
    }
    function Validate() {
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("confimpassword").value;
        if (password != confirmPassword) {
            alert("Password and ConfirmPassword do not match.");
            return false;
        }
        if ($("#tbl_city_dropdown").val() == "-1") {
            alert("Please Select City.");
            return false;
        }
        if ($("#tbl_state_dropdown").val() == "-1") {
            alert("Please Select State.");
            return false;
        }
        if ($("#country").val() == "-1") {
            alert("Please Select Country.");
            return false;
        }
        return true;
    }
</script>
<script>
    function selectState(country_id) {
        if (country_id != "-1") {
            loadData('tbl_state', country_id);
            $("#city_dropdown").html("<option value='-1'>Select city</option>");
        } else {
            $("#state_dropdown").html("<option value='-1'>Select state</option>");
            $("#city_dropdown").html("<option value='-1'>Select city</option>");
        }
    }

    function selectCity(state_id) {
        if (state_id != "-1") {
            loadData('tbl_city', state_id);
        } else {
            $("#city_dropdown").html("<option value='-1'>Select city</option>");
        }
    }

    function loadData(loadType, loadId) {
        var dataString = 'loadType=' + loadType + '&loadId=' + loadId;
        $("#" + loadType + "_loader").show();
        $("#" + loadType + "_loader").fadeIn(400).html('Please wait... <img src="image/loading.gif" />');
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>index.php/staff/loadData",
            data: dataString,
            cache: false,
            success: function (result) {
                $("#" + loadType + "_loader").hide();
                $("#" + loadType + "_dropdown").html("<option value='-1'>Select</option>");
                $("#" + loadType + "_dropdown").append(result);
            }
        });
    }
</script>
