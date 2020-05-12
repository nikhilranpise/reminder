<style>
    .dropdown:hover .dropdown-menu,
    .dropdown:focus .dropdown-menu{
    display: block;
    margin-top: 0; 
 }
</style>
<div class="d-lg-none pr-5 py-3" >
     <a href="#" class="header-toggler d-block bg-light ml-auto" data-toggle="collapse" data-target="#headerMenuCollapse">
        <span class="header-toggler-icon"></span>
      </a>
 </div>
 <div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-lg-1 ml-auto">
                <form class="input-icon my-3 my-lg-0">
                 <li class="nav-item dropdown">
                    <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><img  style="height:50px;width:50px;" src="<?php echo base_url(); ?>assets/images/prof.svg"  style="float-right"/></a>
                    <div class="dropdown-menu dropdown-menu-arrow">
                      <!-- <a href="<?php echo base_url();?>change_password" class="dropdown-item "> Change Password</a>
                      <a href=""  data-toggle="modal" data-target="#uploadPhoto"class="dropdown-item ">Upload Logo</a>
                      <a href="<?php echo base_url();?>privacy_policy"  class="dropdown-item ">Privacy Policy</a>
                      <a href="<?php echo base_url();?>term_and_conditions"  class="dropdown-item ">Terms and Conditions</a>
                      <a href="" data-toggle="modal" data-target="#contactUs" class="dropdown-item ">Contact Us </a> -->
                      <a href="<?php echo base_url();?>logout" class="dropdown-item ">Logout</a>
                    </div>
                  </li>
                </form>
                
              </div>
              <div class="col-lg order-lg-first">
                <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
                  <li class="nav-item">
                    <a href="<?php echo base_url();?>dashboard" style="font-size:17px;" class="nav-link"><i class="fe fe-home"></i> Dashboard</a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo base_url();?>show_categories" style="font-size:17px;" class="nav-link"><i class="fa fa-list-alt"></i>Categories</a>
                  </li>
                 <li class="nav-item">
                    <a href="<?php echo base_url();?>team_member_master" style="font-size:17px;" class="nav-link"><i class="fe fe-users"></i> Team Member Master</a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo base_url();?>reminder" style="font-size:17px;" class="nav-link"><i class="fa fa-clock-o"></i>Reminders</a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo base_url();?>send_notification" style="font-size:17px;" class="nav-link"><i class="fa fa-bell"></i>Send Notification  </a>
                  </li>
                  <!-- <li class="nav-item">
                    <a href="<?php echo base_url();?>show_repeat_reminders" style="font-size:17px;" class="nav-link"><i class="fa fa-retweet"></i>Repeated Reminders</a>
                  </li> -->
                  <li class="nav-item dropdown">
                    <a href="<?php echo base_url();?>Log" style="font-size:17px;" class="nav-link"><i class="fa fa-history"></i> LOG </a>                  
                  </li>
                  <li class="nav-item dropdown">
                    <a href="<?php echo base_url();?>adminMaster" style="font-size:17px;" class="nav-link"><i class="fa fa-user"></i> Admin Master </a>                  
                  </li>
                  <li class="nav-item dropdown">
                    <a href="<?php echo base_url();?>changePassword" style="font-size:17px;" class="nav-link"><i class="fa fa-key"></i> Change Password </a>                  
                  </li>
                  <!--<li class="nav-item dropdown">
                    <a href="<?php echo base_url();?>recurring_reminders" style="font-size:17px;" class="nav-link"><i class="fa fa-history"></i> Cron </a>                  
                  </li>-->
                  <!--<li class="nav-item dropdown">
                    <a href="<?php echo base_url();?>send_noti_cron" style="font-size:17px;" class="nav-link"><i class="fa fa-history"></i> Noti </a>                  
                  </li>-->
                  <!--<li class="nav-item dropdown">
                    <a href="<?php echo base_url();?>Cron/Web_push/show_page" style="font-size:17px;" class="nav-link"><i class="fa fa-history"></i> Push </a>                  
                  </li>-->
                </ul>
                <!-- modal start -->
                <!--upload photo-->
<div class="modal fade" id="uploadPhoto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold" style="color:orange";>Upload Your Logo</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body mx-3">
                <div class="md-form mb-5">
                    <i class="fe fe-user prefix grey-text"></i>&nbsp;<label data-error="wrong" data-success="right" for="defaultForm-email"><b>Upload Your Logo</b></label>
                    <input type="file"  class="form-control validate">
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button class="btn btn-success">Upload</button>
            </div>
        </div>
    </div>
</div>

<!--Contact Us-->
                  <div class="modal fade" id="contactUs" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold" style="color:orange";>Contact Us</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body mx-6">
                <div class="md-form mb-5">
                    <i class="fa fa-building prefix grey-text"></i>&nbsp;<label data-error="wrong" data-success="right" for="defaultForm-email"><b>Company Name</b></label>
                    <input type="text"  class="form-control validate" placeholder="Enter Company name here">
                </div>
                
                <div class="md-form mb-5">
                    <i class="fe fe-user prefix grey-text"></i>&nbsp;<label data-error="wrong" data-success="right" for="defaultForm-email"><b>Contact Person Name</b></label>
                    <input type="text"  class="form-control validate" placeholder="Enter Contact person name here">
                </div>
                
                <div class="md-form mb-5">
                    <i class="fa fa-calculator prefix grey-text"></i>&nbsp;<label data-error="wrong" data-success="right" for="defaultForm-email"><b>Mobile Number</b></label>
                    <input type="text"  placeholder="Enter Mobile Number here" class="form-control validate" spellcheck="false" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                </div>
               
                <div class="md-form mb-5">
                    <i class="fe fe-mail prefix grey-text"></i>&nbsp;<label data-error="wrong" data-success="right" for="defaultForm-email"><b>Email ID</b></label>
                    <input type="email" placeholder="Enter Email ID here"  class="form-control validate">
                </div>

                 <div class="md-form">
                    <i class="fa fa-pencil prefix grey-text"></i>&nbsp; <label data-error="wrong" data-success="right" for="form8"><b>Message</b></label>
                    <textarea type="text" id="form8" class="md-textarea form-control" rows="4" placeholder="Type.."></textarea>
                </div>

            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button class="btn btn-success">Submit</button>
            </div>
        </div>
    </div>
</div>

                <!-- modal end -->
              </div>
            </div>
          </div>
        </div>
<script>
    $('.header-toggler').click(function(){
        $('#headerMenuCollapse').toggle('show');
    })
</script>
