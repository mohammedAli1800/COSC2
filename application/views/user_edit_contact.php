<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/timepicker/bootstrap-timepicker.min.css">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            User
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li>Please Contact Your Manager  <?php //echo $manager_name; ?></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content" >
        <div class="row">
            <div class="col-md-12">
                <!-- Horizontal Form -->
                <div class="box box-info"> 
                    <div class="box-header with-border" style="height:400px;" >
                        <h3 class="box-title">Please Contact Your Manager </h3><br/>
                        <a href="<?php echo base_url('user/') ?>" class="btn btn-info pull-right"><i class="fa fa-backward"></i>Go Back</a>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    
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
                                $("#user").addClass("active");
                                $('.select2').select2();
                                $('#email').keyup(function () {
                                    this.value = this.value.toLowerCase();
                                });
</script>
<script type="text/javascript">
    function Validate() {
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("confimpassword").value;
        if (password != confirmPassword) {
            alert("Password and ConfirmPassword do not match.");
            return false;
        }
        
         if($("#tbl_city_dropdown").val()=="-1"){
            alert("Please Select City.");
            return false;
        }
        if($("#tbl_state_dropdown").val()=="-1"){
            alert("Please Select State.");
            return false;
        }
        if($("#country").val()=="-1"){
            alert("Please Select Country.");
            return false;
        }
        return true;
    }
</script>
<script>
   
    selectState($("#country1").val());


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
            url: "<?php echo base_url(); ?>index.php/user/loadData",
            data: dataString,
            cache: false,
            success: function (result) {
                $("#" + loadType + "_loader").hide();
                $("#" + loadType + "_dropdown").html("<option value='-1'>Select</option>");
                $("#" + loadType + "_dropdown").append(result);
                if (loadType == 'tbl_state') {
                    document.getElementById("tbl_state_dropdown").value = "<?php echo $user['state']; ?>";
                    selectCity($("#tbl_state_dropdown").val());
                }
                if (loadType == 'tbl_city') {
                    document.getElementById("tbl_city_dropdown").value = "<?php echo $user['city']; ?>";
                }
            }
        });
    }
</script>
