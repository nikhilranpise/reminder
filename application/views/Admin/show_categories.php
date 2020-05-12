<?php include('include/headers.php'); ?>
 </head>
  <?php include('include/nav.php'); ?>
  <body>
        
<div align="center">
    <div class="col-lg-12">
        <div class="">
           
            <div class="sticky-top text-center py-4">
                  <a class="btn btn-info" style="width:160px" href="<?php echo base_url();?>add_category" >Add Categories</a>
            </div>
        <div class="col-lg-4">
        
              
                <div class="card">
                    <?php if($error = $this->session->flashdata('category_added')): ?>
                        <div class="row">
                            <div class="col-lg-12 text-center" >
                              <div class="alert alert-dismissible alert-success">
                              <a href="#" class="close" data-dismiss="alert" aria-label="close"></a>
                              <?= $error ?>
                              </div>
                            </div>
                         </div>
                    <?php endif; ?>
                    
                    <?php if($error = $this->session->flashdata('category_deleted')): ?>
                        <div class="row">
                            <div class="col-lg-12 text-center" >
                              <div class="alert alert-dismissible alert-danger">
                              <a href="#" class="close" data-dismiss="alert" aria-label="close"></a>
                              <?= $error ?>
                              </div>
                            </div>
                         </div>
                    <?php endif; ?>
                    
                  <table class="table card-table table-vcenter" id="example">
                    <tr>
                      <th><b>Category</b></th>
                      <th class="text-center"><b>Actions</b></th>
                    </tr>
                    <?php if(count($posts) > 0){
                          foreach($posts as $post){
                    ?>
                    <tr>
                      <td><?php echo $post->category;?></td>
                      <td class="text-center">
                        <!--<a href="<?php echo base_url();?>edit_category" id="edit" class="on-default edit-row mr-2"><i class="fa fa-pencil" title="Edit" style="color:black;"></i></a>
-->
                        <a href="#" data-href="<?php echo base_url();?>delete_category/<?php echo $post->id ?>" data-toggle="modal"  data-target="#confirm-delete"><i class="fa fa-trash-o" title="Delete" style="color: red;"></i></a>
                      </td>
                    </tr>
                      <?php } }?>
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
      
      <?php include ('Ajax/customdelete.php'); ?> 

</html>
        