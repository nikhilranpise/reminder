
<?php include('include/headers.php'); ?>
 </head>
  <?php include('include/nav.php'); ?>
  <body>
        
<div align="center">
    <div class="col-lg-12">
        <div class="card-body">
           
            <div class="sticky-top text-center py-4">
                  <h3> </h3>
            </div>
        <div class="col-lg-10">
        
              
                <div class="card">
                  <table class="table card-table table-vcenter table-responsive" id="example">
                    <tr>
                      <th><b>Sr.No.<b></th>
                      <th><b>Category</b></th>
                      <th><b>Title</b></th>
                      <th><b>Description</b></th>
                      <th><b>Task Due Date and Time</b></th>
                      <th><b>Assigned To</b></th>
                      <th><b>Repeat Reminder</b></th>
                      <th><b>Status</b></th>
                      <th><b>Priority</b></th>
                      <!--<th><b>Actions</b></th>-->
                    </tr>
                    <tr style="color:red;">
                      <td>1</td>
                      <td>Sales</td>
                      <td>Title</td>
                      <td>Description</td>
                      <td>28/12/2018 12:24:PM</td>
                      <td>Vinit</td>
                      <td>Daily</td>
                      <td>Enable</td>
                      <td ><b>High</b></td>
                      <!--<td>
                        <a href="<?php echo base_url();?>edit_reminder" id="edit" class="on-default edit-row mr-2" title="Edit"><i class="fa fa-pencil"></i></a>

                        <a href="#" data-href="<?php echo base_url();?>delete/<?php  ?>" title="Delete" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash-o" style="color: red;"></i></a>
                      </td>-->
                    </tr>
                    <tr style="color:green;">
                      <td>2</td>
                      <td>Sales</td>
                      <td>Title</td>
                      <td>Description</td>
                      <td>28/12/2018 12:24:PM</td>
                      <td>Vinit</td>
                      <td>Daily</td>
                      <td>Enable</td>
                      <td ><b>Low</b></td>
                      <!--<td>
                        <a href="<?php echo base_url();?>edit_reminder" id="edit" class="on-default edit-row mr-2" title="Edit"><i class="fa fa-pencil"></i></a>

                        <a href="#" data-href="<?php echo base_url();?>delete/<?php  ?>" title="Delete" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash-o" style="color: red;"></i></a>
                      </td>-->
                    </tr>
                    <tr style="color:green;">
                      <td>3</td>
                      <td>Sales</td>
                      <td>Title</td>
                      <td>Description</td>
                      <td>28/12/2018 12:24:PM</td>
                      <td>Vinit</td>
                      <td>Daily</td>
                      <td>Enable</td>
                      <td ><b>Low</b></td>
                      <!--<td>
                        <a href="<?php echo base_url();?>edit_reminder" id="edit" class="on-default edit-row mr-2" title="Edit"><i class="fa fa-pencil"></i></a>

                        <a href="#" data-href="<?php echo base_url();?>delete/<?php  ?>" title="Delete" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash-o" style="color: red;"></i></a>
                      </td>-->
                    </tr>
                    <tr style="color:blue;">
                      <td>4</td>
                      <td>Sales</td>
                      <td>Title</td>
                      <td>Description</td>
                      <td>28/12/2018 12:24:PM</td>
                      <td>Vinit</td>
                      <td>Daily</td>
                      <td>Enable</td>
                      <td ><b>Medium</b></td>
                      <!--<td>
                        <a href="<?php echo base_url();?>edit_reminder" id="edit" class="on-default edit-row mr-2" title="Edit"><i class="fa fa-pencil"></i></a>

                        <a href="#" data-href="<?php echo base_url();?>delete/<?php  ?>" title="Delete" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash-o" style="color: red;"></i></a>
                      </td>-->
                    </tr>
                    <tr style="color:red;">
                      <td>6</td>
                      <td>Sales</td>
                      <td>Title</td>
                      <td>Description</td>
                      <td>28/12/2018 12:24:PM</td>
                      <td>Vinit</td>
                      <td>Daily</td>
                      <td>Enable</td>
                      <td ><b>High</b></td>
                      <!--<td>
                        <a href="<?php echo base_url();?>edit_reminder" id="edit" class="on-default edit-row mr-2" title="Edit"><i class="fa fa-pencil"></i></a>

                        <a href="#" data-href="<?php echo base_url();?>delete/<?php  ?>" title="Delete" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash-o" style="color: red;"></i></a>
                      </td>-->
                    </tr>
                      
                  </table>
                </div>
                </div>
  
    </div>
    </div>
  </div>
 </div>          
</div>

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content panel-info panel-color">
              
                  <div class="modal-header panel-info panel-color">
                    <h4 class="modal-title" id="myModalLabel">Confirm Delete</h4>
                      <button type="button" class="" data-dismiss="modal" aria-hidden="true">&times;</button>
                      
                  </div>
              
                  <div class="modal-body">
                      <p>You are about to delete one record, this procedure is irreversible.</p>
                      <p>Do you want to proceed?</p>
                      <!-- <p class="debug-url"></p>
   -->                </div>
                  
                  <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                      <a class="btn btn-danger btn-ok">Delete</a>
                  </div>
              </div>
          </div>
      </div>

</html>
        