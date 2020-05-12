<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <?php include('include/headers.php'); ?>
  </head>
   <?php include('include/nav.php'); ?>
  <body class="" >
        <div class="container" >
          <div class="row">
              
              <div class="col-lg-8 mx-auto">
               <?php
            echo form_open('update_password',array('class'=>"form-horizontal m-t-20 card" ,'id' => "loginForm",'name'=>"loginForm"));
                      ?>
                      
                <div class="card-body" >
                    <?php if($error = $this->session->flashdata('password_changed')): ?>
                        <div class="row">
                            <div class="col-lg-12 text-center" >
                              <div class="alert alert-dismissible alert-success">
                              <a href="#" class="close" data-dismiss="alert" aria-label="close"></a> 
                              <?= $error ?>
                              </div>
                            </div>
                         </div>
                    <?php endif; ?>
                    <?php if($error = $this->session->flashdata('wrong_password')): ?>
                        <div class="row">
                            <div class="col-lg-12 text-center" >
                              <div class="alert alert-dismissible alert-danger">
                              <a href="#" class="close" data-dismiss="alert" aria-label="close"></a> 
                              <?= $error ?>
                              </div>
                            </div>
                         </div>
                    <?php endif; ?>
                  <div class="card-title text-center"><b>Change Password</b></div>
                  
                   <div class="form-group">
                    <label class="form-label">Current Password</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder= "Enter your Current Password" name="old_password" required>
                  </div>
                  <div class="form-group">
                    <label class="form-label">New Password </label>
                    <input type="password" class="form-control" id="password" placeholder= "Enter your New Password" name="password" onkeyup='check();' required>
                  </div>
                    <div class="form-group">
                    <label class="form-label">Re-enter Password </label>
                    <input type="password" class="form-control" id="confirm_password" placeholder=" Re-enter your New Password" name="confirm_password" onkeyup='check();' required>
                     <span id='message'></span>
                  </div>
                
                  <div class="form-footer">
                    <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        
<script type="text/javascript">
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