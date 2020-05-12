<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <?php include('include/headers.php'); ?>
  </head>
   <?php include('include/nav.php'); ?>
 <div align="center">
    <div class="col-lg-8"><br>
        <center>
              <?php
            echo form_open_multipart('submit_notification',array('class'=>"form-horizontal m-t-20 card" ,'id' => "myForm",'name'=>"myForm"));
                      ?>
                <div class="">
                  <h3 class="card-title text-uppercase font-weight-bold" style="color:green; font-size:25px;">Send Notification </h3>
                  <div class="col-md-6 mx-auto" >
                      
                      <?php if($error = $this->session->flashdata('Message_sent')): ?>
                        <div class="row">
                            <div class="col-lg-12 text-center" >
                              <div class="alert alert-dismissible alert-success">
                              <a href="#" class="close" data-dismiss="alert" aria-label="close"></a>
                              <?= $error ?>
                              </div>
                            </div>
                         </div>
                         <?php endif; ?>  

                      <div class="form-group">
                        <label class="form-label">Select Team Member</label>
                        <select class="form-control" name="team_member_id" required="">
                          <option value="">Select</option>
                          <?php if(count($ghosts) > 0){
                                foreach($ghosts as $ghost){
                          ?>
                          <option value="<?php echo $ghost->id; ?>"><?php echo $ghost->name; ?></option>
                          <?php } } ?>
                        </select>
                      </div>

                      <div class="form-group">
                        <label class="form-label"> Message </label>
                        <textarea type="text" class="form-control" required="" placeholder="Description" value="" name="message" required></textarea>
                      </div>

                    
                  </div>
                </div>
                <div class="card-footer text-center">
                  <button type="submit" class="btn btn-success">Send</button>
                </div>
            
              </form>
              </div>
     

    </html>