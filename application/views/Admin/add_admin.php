<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <?php include('include/headers.php'); ?>
  </head>
   <?php include('include/nav.php'); ?>
   <link href="<?php echo base_url()?>assets/css/fSelect.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="<?php echo base_url()?>assets/js/fSelect.js"></script>
<script>
(function($) {
    $(function() {
        window.fs_test = $('.test').fSelect();
    });
})(jQuery);
</script>
 <div align="center">
    <div class="col-lg-8">
        <center>
              <?php
            echo form_open_multipart('store_admin',array('class'=>"form-horizontal m-t-20 card" ,'id' => "myForm",'name'=>"myForm"));
                      ?>
                <div class="card-body">
                  <h3 class="card-title text-uppercase font-weight-bold" style="color:green; font-size:25px;">Add an Admin</h3>
                  <div class="col-md-6 mx-auto" >
                       
                       <div class="form-group">
                        <label class="form-label">Category</label>
                        <select class="test form-control" name="category[]" multiple required="">
                          <option value="">Select</option>
                          <?php if(count($posts) > 0){
                          foreach($posts as $post){
                          ?>
                          <option value="<?php echo $post->category;?>"><?php echo $post->category;?></option>
                          <?php } }?>
                        </select>
                       </div>
                    
                      <div class="form-group">
                        <label class="form-label"> Full Name</label>
                        <input type="text" class="form-control" required="" placeholder="Full Name" value="" name="name" required>
                      </div>
                      
                      <div class="form-group">
                        <label class="form-label"> Username</label>
                        <input type="text" class="form-control" required="" placeholder="Username" value="" name="username" required>
                      </div>
                      
                      <div class="form-group">
                        <label class="form-label"> Password</label>
                        <input type="text" class="form-control" required="" placeholder="Password" value="" name="password" required>
                      </div>
                      

                      <!--<div class="form-group mx-auto">
                        <label class="form-label"> Status</label>
                        <div class="form-inline mx-auto justify-content-center">
                        <label class="ml-4"><input type="radio" name="status" value="1" class="form-control mr-3" required="">Enable </label>
                        <label class="ml-4"><input type="radio" name="status" value="0" class="form-control mr-3" required="">Disable </label>
                      </div>
                      </div>-->
                    

                    
                  </div>
                </div>
                <div class="card-footer text-center">
                  <button type="submit" class="btn btn-success">Submit</button>
                </div>
            
              </form>
              </div>

<script src="//code.jquery.com/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/js/mdtimepicker.js"></script>
<script>
  $(document).ready(function(){
  $('#timepicker').mdtimepicker(); 
  $('#timepicker2').mdtimepicker(); 
  
  $('input:checkbox').on('click', function(){
      if($('input:checkbox').is(':checked')){
      	$('#timepicker').prop('disabled', 'disabled');
      	$('#timepicker').val('');
      }
      else{
      	$('#timepicker').prop('disabled', false);
      }
  });
});
</script>


     

    </html>