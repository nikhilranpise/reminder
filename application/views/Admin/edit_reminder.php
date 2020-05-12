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
            echo form_open_multipart('update_reminder',array('class'=>"form-horizontal m-t-20 card" ,'id' => "myForm",'name'=>"myForm"));
                      ?>
                <div class="card-body">
                  <h3 class="card-title text-uppercase font-weight-bold" style="color:green; font-size:25px;">Edit Reminder</h3>
                  <div class="col-md-6 mx-auto" >
                      
                    <?php if(count($rows) > 0){
                          foreach($rows as $row){
                    ?>
                       <input type="hidden" name="id" value="<?php echo $row->reminder_id; ?>">
                    
                      <div class="form-group">
                        <label class="form-label"> Title</label>
                        <input type="text" class="form-control" required="" placeholder="Title" value="<?php echo $row->title; ?>" name="title" required>
                      </div>
                      
                      <div class="form-group">
                        <label class="form-label">Category</label>
                        <select class="form-control" name="category" required="">
                          <option value="<?php echo $row->category_id;?>" ><?php echo $row->category;?></option>
                          <?php if(count($posts) > 0){
                                foreach($posts as $post){
                          ?>
                          <option value="<?php echo $post->id;?>" ><?php echo $post->category;?></option>
                          <?php } }?>
                        </select>
                      </div>

                      <div class="form-group">
                        <label class="form-label"> Description</label>
                        <textarea type="text" class="form-control" required="" placeholder="Description" value="<?php echo $row->description;?>" name="description" required><?php echo $row->description;?></textarea>
                      </div>
                      
                      <div class="form-group">
                        <label class="form-label"> Task Due Date  </label>
                        <input type="date" class="form-control" required=""  value="<?php echo $row->task_date;?>" name="task_date" required>
                      </div>
                      
                      <div class="form-group">
                        <label class="form-label"> Task Due Time  </label>
                        <?php if($row->task_time != "All Day") {?>
                        <input type="text" id="timepicker" class="form-control"  placeholder="" value="<?php  echo $row->task_time;?>" name="task_time">
                        <input type="checkbox" name="task_time" value="All Day" >&nbsp;&nbsp;&nbsp;All Day Task
                        <?php }else{ ?>
                        <input type="text" id="timepicker" class="form-control"  placeholder="" value="" name="task_time">
                        <input type="checkbox" name="task_time" <?php if($row->task_time== "All Day") { echo "checked";}?> value="All Day" >&nbsp;&nbsp;&nbsp;All Day Task
                        <?php }?>
                      </div>

                      <div class="form-group">
                        <label class="form-label"> Assign To</label>
                        <select class="test form-control" name="team_member_id[]"  required="" multiple>
                          <?php if(count($ghosts) > 0){
                                foreach($ghosts as $ghost){
                          ?>
                          <option value="<?php echo $ghost->id; ?>" <?php foreach($assigned_members as $mem){ 
                              if($ghost->id == $mem->team_member_id){ echo "selected";}
                          }
                          ?> ><?php echo $ghost->name; ?></option>
                          <?php } }?>
                        </select>
                      </div>
                      
                      <div class="form-group">
                        <label class="form-label"> Reminder Start Date  </label> 
                        <input type="date" class="form-control" required="" placeholder="" value="<?php echo $row->reminder_start_date;?>" name="reminder_start_date" required>
                      </div>
                      
                      <div class="form-group">
                        <label class="form-label"> Reminder Start Time  </label>
                        <input type="text" id="timepicker2" class="form-control" required="" value="<?php echo $row->reminder_start_time;?>" name="reminder_start_time" required>
                      </div>
                      
                      <div class="form-group">
                        <label class="form-label"> Reminder After Every </label>
                        <select name="repeat_reminder_every" class="form-control">
                          <option value="1">1 Hour</option>
                          <option value="2">2 Hour</option>
                          <option value="3">3 Hour</option>
                          <option value="4">4 Hour</option>
                          <option value="5">5 Hour</option>
                          <option value="6">6 Hour</option>
                          <option value="7">7 Hour</option>
                          <option value="8">8 Hour</option>
                          <option value="9">9 Hour</option>
                          <option value="10">10 Hour</option>
                          <option value="11">11 Hour</option>
                          <option value="12">12 Hour</option>
                          <option value="13">13 Hour</option>
                          <option value="14">14 Hour</option>
                          <option value="15">15 Hour</option>
                          <option value="16">16 Hour</option>
                          <option value="17">17 Hour</option>
                          <option value="18">18 Hour</option>
                          <option value="19">19 Hour</option>
                          <option value="20">20 Hour</option>
                          <option value="21">21 Hour</option>
                          <option value="22">22 Hour</option>
                          <option value="23">23 Hour</option>
                          <option value="24">24 Hour</option>
                        </select>
                      </div>

                      <!--<div class="form-group">
                        <label class="form-label"> Repeat Reminder </label>
                        <select name="repeat_reminder" class="form-control">
                            <option value="No Repeat" <?php if($row->repeat_reminder == "No Repeat") {echo "selected";}?>>No Repeat</option>
                          <option value="Daily" <?php if($row->repeat_reminder == "Daily") {echo "selected";}?>>Daily</option>
                          <option value="Weekly" <?php if($row->repeat_reminder == "Weekly") {echo "selected";}?>>Weekly</option>
                          <option value="Fortnightly" <?php if($row->repeat_reminder == "Fortnightly") {echo "selected";}?>>Fortnightly</option>
                          <option value="Monthly" <?php if($row->repeat_reminder == "Monthly") {echo "selected";}?>>Monthly</option>
                          <option value="Quarterly" <?php if($row->repeat_reminder == "Quarterly") {echo "selected";}?>>Quarterly</option>
                          <option value="Half Yearly" <?php if($row->repeat_reminder == "Half Yearly") {echo "selected";}?>>Half Yearly</option>
                          <option value="Yearly" <?php if($row->repeat_reminder == "Yearly") {echo "selected";}?>>Yearly</option>
                        </select>
                      </div>-->

                      <div class="form-group mx-auto">
                        <label class="form-label"> Priority</label>
                        <div class="form-inline mx-auto justify-content-center">
                        <label class="ml-4"><input type="radio" <?php if($row->priority == "High Priority") {echo "checked";}?> name="priority" value="High Priority" class="form-control mr-3" required="">High Priority</label>
                        <label class="ml-4"><input type="radio" <?php if($row->priority == "Medium Priority") {echo "checked";}?> name="priority" value="Medium Priority" class="form-control mr-3" required="">Medium Priority</label>
                        <label class="ml-4"><input type="radio" <?php if($row->priority == "Low Priority") {echo "checked";}?> name="priority" value="Low Priority" class="form-control mr-3" required="">Low Priority</label>
                      </div>
                      </div>

                      <div class="form-group mx-auto">
                        <label class="form-label"> Status</label>
                        <div class="form-inline mx-auto justify-content-center">
                        <label class="ml-4"><input type="radio" <?php if($row->status == "1") {echo "checked";}?> name="status" checked value="1" class="form-control mr-3" required="">Enable </label>
                        <label class="ml-4"><input type="radio" <?php if($row->status == "0") {echo "checked";}?> name="status" value="0" class="form-control mr-3" required="">Disable </label>
                      </div>
                      </div>
                    <?php } } ?>

                    
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