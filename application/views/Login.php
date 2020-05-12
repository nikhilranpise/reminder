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
    <link rel="icon" href="<?php echo base_url();?>images/favicon.png" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>images/favicon.png" />
     <!--Generated: 2018-04-16 09:29:05 +0200 -->
    <title>Reminder</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <script src="<?php echo base_url();?>assets/js/require.min.js"></script>
    <script>
      requirejs.config({
          baseUrl: '.'
      });
    </script>
     <!--Dashboard Core -->
    <link href="<?php echo base_url();?>assets/css/dashboard.css" rel="stylesheet" />
    <script src="<?php echo base_url();?>assets/js/dashboard.js"></script>
     <!--c3.js Charts Plugin--> 
    <link href="<?php echo base_url();?>assets/plugins/charts-c3/plugin.css" rel="stylesheet" />
    <script src="<?php echo base_url();?>assets/plugins/charts-c3/plugin.js"></script>
     <!--Google Maps Plugin -->
    <link href="<?php echo base_url();?>assets/plugins/maps-google/plugin.css" rel="stylesheet" />
    <script src="<?php echo base_url();?>assets/plugins/maps-google/plugin.js"></script>
     <!--Input Mask Plugin--> 
    <script src="<?php echo base_url();?>assets/plugins/input-mask/plugin.js"></script>
  </head>
  <body class="" onload="remove_user()">
    <div class="page">
      <div class="page-single">
        <div class="container">
          <div class="row">
            <div class="col col-login mx-auto">
              <div class="text-center mb-6">
              </div>
              <div class="invalid-form-error-message"></div>
              
               <?php
            echo form_open('isValid',array('class'=>"form-horizontal m-t-20 card" ,'id' => "demo-form",'name'=>"loginForm",'method' => 'post'));
                      ?>
                <div class="card-body p-6">
                  <div class="card-title">Login to your account</div>
                   <?php if($error = $this->session->flashdata('login_failed')): ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="alert alert-dismissible alert-danger">
                            
                            <?= $error ?>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                        
                  <div class="form-group">
                    <label class="form-label">Username</label>
                    <input type="text" class="form-control" id="" aria-describedby="emailHelp" placeholder="Username" name="username"  required>
                     <?php echo  form_error('username'); ?>
                  </div>
                  
                  <div class="form-group">
                    <label class="form-label"> Password </label> 
                    <input type="password" class="form-control" id="myInput" placeholder="Password" name="password" required>
                     <?php echo  form_error('password'); ?><br>
                     <input type="checkbox" onclick="myFunction()">&nbsp;&nbsp;&nbsp;Show Password
                  </div>
                  
                  <div class="form-footer">
                    <button type="submit" name="submit" class="btn btn-primary btn-block"  <?php echo  form_error('submit'); ?><br>Sign in</button>
                  </div>
                  
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    


<script>
function myFunction() {
    var x = document.getElementById("myInput");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
</script>
<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
<script>
  var OneSignal = window.OneSignal || [];
  OneSignal.push(function() {
    OneSignal.init({
      appId: "be37c3e5-9b85-4f74-8736-6b4fc6f9fc69",
      notifyButton: {
        enable: false,
      },
    });
  });
</script>
<script>
  function remove_user()
  {
      console.log(OneSignal.setSubscription(false));
  }
</script>

<?php
?>

  </body>
</html>