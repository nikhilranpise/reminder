<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <?php include('include/headers.php'); ?>
  </head>
   <?php include('include/nav.php'); ?>
 <div align="center">
    <div class="col-lg-8">
        <center>
              <?php
            echo form_open_multipart('store_team_member',array('class'=>"form-horizontal m-t-20 card" ,'id' => "myForm",'name'=>"myForm"));
                      ?>
                <div class="card-body">
                  <h3 class="card-title text-uppercase font-weight-bold" style="color:green; font-size:25px;">Add a new team member </h3>
                  <div class="col-md-6 mx-auto" >
                       <input type="hidden" name="hidd" value="<?php //echo $pp ?>">
                       
                      <div class="form-group">
                        <label class="form-label">Category</label>
                        <select class="form-control" name="category" required="">
                          <option value="">Select</option>
                          <?php if(count($posts) > 0){
                          foreach($posts as $post){
                          ?>
                          <option value="<?php echo $post->id;?>"><?php echo $post->category;?></option>
                          <?php } }?>
                        </select>
                      </div>
                    
                      <div class="form-group">
                        <label class="form-label"> Full Name</label>
                        <input type="text" class="form-control" required="" placeholder="Full Name" value="" name="name" required>
                      </div>
                    

                    
                      <div class="form-group">
                        <label class="form-label"> Mobile Number</label>
                        <input type="text"  pattern="[789][0-9]{9}" title="Please Enter Valid 10 Digit Mobile Number" class="form-control" required="" placeholder="Mobile Number" value="" name="mobile" required>
                      </div>
                    

                    
                      <div class="form-group">
                        <label class="form-label"> Email Id</label>
                        <input type="text" class="form-control" required="" placeholder="Email" value="" name="email"  onkeypress="validateEmail(this.value)"  required>
                        <span id="error" style="display:none;color:red;">A valid Email address is required</span>
                      </div>
                    

                    
                      <div class="form-group">
                        <label class="form-label"> Password</label>
                        <input type="password" class="form-control" required="" placeholder="Password" id="password" value="" name="password" required>
                      </div>
                    

                    
                      <div class="form-group">
                        <label class="form-label"> Confirm Password</label>
                        <input type="password" class="form-control" required="" id="confirm_password" placeholder="Confirm Password" value="" name="cnf" required>
                      </div>
                      <span id='message'></span>
                      
                      <div class="form-group mx-auto">
                        <label class="form-label"> Authority </label>
                        <div class="form-inline mx-auto justify-content-center"> 
                        <label class="ml-4"><input type="radio" name="status" value="1" class="form-control mr-3" required="">Authorized </label>
                        <label class="ml-4"><input type="radio" name="status" value="0" class="form-control mr-3" required="">Non Authorized </label>
                      </div>
                      </div>
                    
                    
                  </div>
                </div>
                <div class="card-footer text-center">
                  <button type="submit" class="btn btn-success">Submit</button>
                </div>
            
              </form>
              </div>

<script type="text/javascript">
  $('#password, #confirm_password').on('keyup', function () {
  if ($('#password').val() == $('#confirm_password').val()) {
    $('#message').html('Matching').css('color', 'green');
  } else 
    $('#message').html('Not Matching').css('color', 'red');
});
</script>

<script>
function validateEmail(email) {
    //alert('email');pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    if (!emailReg.test(email)) {
        $('#error').show();
    } else {
       $('#error').hide();
        
    }
}
</script>
     

    </html>