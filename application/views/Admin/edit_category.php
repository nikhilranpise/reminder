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
            echo form_open_multipart('update_category',array('class'=>"form-horizontal m-t-20 card" ,'id' => "myForm",'name'=>"myForm"));
                      ?>
                <div class="card-body">
                  <h3 class="card-title text-uppercase font-weight-bold" style="color:green; font-size:25px;">Edit category </h3>
                  <div class="row" align="center">
                       <input type="hidden" name="hidd" value="<?php //echo $pp ?>">
                    <div class="col-sm-6 col-md-6 mx-auto">
                      <div class="form-group">
                        <label class="form-label"> Category Name</label>
                        <input type="text" class="form-control" placeholder="Enter Contact Person Name" value="Maintenance" name="name">
                      </div>
                    </div>
                    
                  </div>
                </div>
                <div class="card-footer text-center">
                  <button type="submit" class="btn btn-success">Submit</button>
                </div>
            
              </form>
              </div>
     

    </html>