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
            echo form_open_multipart('store_category',array('class'=>"form-horizontal m-t-20 card" ,'id' => "myForm",'name'=>"myForm"));
                      ?>
                <div class="card-body">
                  <h3 class="card-title text-uppercase font-weight-bold" style="color:green; font-size:25px;">Add a new category </h3>
                  <div class="row" align="center">
                       <input type="hidden" name="hidd" value="<?php //echo $pp ?>">
                    <div class="col-sm-6 col-md-6 mx-auto">
                      <div class="form-group">
                        <label class="form-label"> Category Name</label>
                        <input type="text" class="form-control" placeholder="Category Name" value="" name="category" required>
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