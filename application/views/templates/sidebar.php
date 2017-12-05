<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel" style="height:60px;">
            <!--        <div class="pull-left image">
                      <img src="<?php echo base_url('assets/'); ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    </div>-->
            <div class="pull-left info">
                <?php if ($this->session->userdata('username') != "") { ?>
                    <p>Hi, <?php echo $this->session->userdata('username'); ?></p>
                <?php }elseif($this->session->userdata('staff_id')!="") { ?>
                        <p>Hi, <?php echo $this->session->userdata('staff_name'); ?></p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    <?php }else{ ?>
                        <p>Hi, <?php echo $this->session->userdata('manager_name'); ?></p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        <?php } ?>

                </div>
            </div>
            <!-- search form -->
            <!-- <form action="#" method="get" class="sidebar-form">
              <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                      <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                      </button>
                    </span>
              </div>
            </form> -->
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN NAVIGATION</li>
                 <!--<li id="dashboard"><a href="<?php echo base_url(); ?>home/"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>-->
                <?php
                 $id=$this->session->userdata('uid');
                 if($id!=""){
                ?>
                <li id="manager"><a href="<?php echo base_url(); ?>manager/"><i class="fa fa-user"></i> <span>Manager Management</span></a></li>
                 <?php } ?>
                <?php if($this->session->userdata('staff_id')==""){ ?>
                <li id="staff"><a href="<?php echo base_url(); ?>staff/"><i class="fa fa-users"></i> <span>Staff Management</span></a></li>
                <li id="report"><a href="<?php echo base_url(); ?>report/"><i class="fa fa-list-ol"></i> <span>Staff Report Management</span></a></li>
                <li id="changepassword"><a href="<?php echo base_url(); ?>changepassword/"><i class="fa fa-key"></i> <span>Change Password</span></a></li>
                <?php } ?>
                <li id="Logout"><a href="<?php echo base_url(); ?>login_controller/makeout/"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
