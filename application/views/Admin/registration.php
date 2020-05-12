<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en" />
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <!--<link rel="icon" href="./favicon.ico" type="image/x-icon"/>-->
    <link rel="shortcut icon" type="image/x-icon" href="./favicon.ico" />
    <!-- Generated: 2018-04-16 09:29:05 +0200 -->
    <title>MIND</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <script src="<?php echo base_url();?>assets/js/require.min.js"></script>
    <script>
      requirejs.config({
          baseUrl: '.'
      });
    </script>
    <!-- Dashboard Core -->
    <link href="<?php echo base_url();?>assets/css/dashboard.css" rel="stylesheet" />
    <script src="<?php echo base_url();?>assets/js/dashboard.js"></script>
    <!-- c3.js Charts Plugin -->
    <link href="<?php echo base_url();?>assets/plugins/charts-c3/plugin.css" rel="stylesheet" />
    <script src="<?php echo base_url();?>assets/plugins/charts-c3/plugin.js"></script>
    <!-- Google Maps Plugin -->
    <link href="<?php echo base_url();?>assets/plugins/maps-google/plugin.css" rel="stylesheet" />
    <script src="<?php echo base_url();?>assets/plugins/maps-google/plugin.js"></script>
    <!-- Input Mask Plugin -->
    <script src="<?php echo base_url();?>assets/plugins/input-mask/plugin.js"></script>
  </head>
  <body class="">
    <div class="page">
      <div class="page-single">
        <div class="container">
          <div class="row">
            <div class="col col-login mx-auto">
              <div class="text-center mb-6">
               <!--<img src="<?php echo base_url();?>demo/brand/tabler.svg" class="h-6" alt="">-->
              </div>
               <?php
            echo form_open('save_registraion',array('class'=>"form-horizontal m-t-20 card" ,'id' => "myForm",'name'=>"myForm"));
                      ?>
                <div class="card-body p-6">
                  <div class="card-title">Registration</div>
                  
                  <div class="form-group">
                    <label class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Please enter your Email here" name="email" required>
                  </div>
                  <div class="form-group">
                    <label class="form-label">Password </label>
                    <input type="password" class="form-control" id="password" placeholder="Please enter your Password here" name="password"  onkeyup='check();' required>
                  </div>
                  <div class="form-group">
                    <label class="form-label">Re-enter Password </label>
                    <input type="password" class="form-control" id="confirm_password" placeholder="Please re-enter your Password here" name="confirm_password"  onkeyup='check();' required>
                    <span id='message'></span>
                  </div>
                    <div class="form-group">
                    <label class="form-label">Mobile No. </label>
                    <input type="text" class="form-control" id="" placeholder="Please enter your Mobile No. here" name="mobile" maxlength="10" required>
                  </div>
                
                  <div class="form-footer">
                    <button type="submit" name="submit" id="submit" class="btn btn-primary btn-block">Submit</button>
                  </div>
                </div>
              </form>
             
            </div>
          </div>
        </div>
      </div>
    </div>
    	<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;" id="myModal">
			    <div class="modal-dialog modal-sm">
			        <div class="modal-content">
			            <div class="modal-header">
			                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			                <h4 class="modal-title" id="mySmallModalLabel"></h4>
			            </div>
			            <div class="modal-body">
			              Added successfully.
			            </div>
			        </div><!-- /.modal-content -->
			    </div><!-- /.modal-dialog -->
			</div><!-- /.modal -->


			<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;" id="myModalfailed">
			    <div class="modal-dialog modal-sm">
			        <div class="modal-content">
			            <div class="modal-header">
			                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			                <h4 class="modal-title" id="mySmallModalLabel"></h4>
			            </div>
			            <div class="modal-body">
			              Sorry ! Something went wrong.
			              Please check all the fields .
			            </div>
			        </div><!-- /.modal-content -->
			    </div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
    <?php //include('Ajax/registration.php'); ?>
<script type="text/javascript">
    // $(function () {
    //     $("#Submit").click(function () {
    //         alert("hii");
    //         var password = $("#txtPassword").val();
    //         var confirmPassword = $("#txtConfirmPassword").val();
    //         if (password != confirmPassword) {
    //             alert("Passwords do not match.");
    //             return false;
    //         }
    //         return true;
    //     });
    // });
    
    var check = function() {
  if (document.getElementById('password').value ==
    document.getElementById('confirm_password').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'Password matching';
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'Password not matching';
  }
}
</script>

  </body>
</html>