
<?php include('include/headers.php'); ?>

<style>
    .pagination {
	display: flex;
	align-items: center;
	font-size: 14px;
	-webkit-user-select: none;
	-moz-user-select: none;
	-ms-user-select: none;
	user-select: none;
	justify-content: center;
}

.pagination__controls {
	display: flex;
	align-items: center;
	justify-content: center;
	border: 2px solid #dadada;
	overflow: hidden;
	width: 51px;
	height: 51px;
	border-radius: 10px;
}

.pagination__control {
	display: block;
	text-decoration: none;
	color: #212121;
	border: none;
	box-sizing: border-box;
	outline: none;
	transition-duration: 0.4s;
	cursor: pointer;
	display: flex!important;
	justify-content: center!important;
	align-items: center!important;
}

.pagination__control-icon {
	display: block;
	fill: currentColor;
}

.pagination__list {
	position: relative;
	display: flex;
	align-self: stretch;
	margin: 0;
	padding: 0;
	list-style: none;
	margin: 0px 15px;
}

.pagination__item {
	display: flex;
}

.pagination__link {
	position: relative;
	display: flex;
	align-items: center;
	justify-content: center;
	padding: 8px 10px;
	text-align: center;
	color: #ababab !important;
	text-decoration: none;
	overflow: hidden;
	transition: 0.5s linear, height 0.25s;
}

.pagination__link:hover,
.pagination__link:focus,
.active .pagination__link {
	color: #ff8808 !important;
}

.pagination__item--active .pagination__link {
	cursor: default;
	pointer-events: none;
}

.pagination__slide-line {
	position: absolute;
	bottom: 0;
	height: 4px;
	background-color: #f4511e;
	transition: 0.5s linear, height 0.25s;
}
.btn-space {
    margin-left: 5px;
}
.action-space {
    text-align:center;
}
.mybutton{
    padding-left: 33px;
    padding-right: 33px;
    
}

.pagination .active a{
color: #fff;
text-decoration: none;
padding: 5px 15px;
margin: 0 5px;
text-align: center;
line-height: 2;
background: #316cbe;
font-weight: 700;
transition: 0.5s;
}
.pagination .paginate_button a{
padding: 5px 15px;
margin: 0 5px;
text-align: center;
line-height: 2;
background: #f5f7fb;
font-weight: 700;
color: #000;
text-decoration: none;
transition: 0.5s;
}

.pagination .paginate_button a:hover{
    background: #316cbe;
    color: #fff;
}
</style>

 </head>
  <?php include('include/nav.php'); ?>
  <body>
        
<div align="center">
    <div class="col-lg-12"><br>
        <div class="">
           
            
        <div class="col-lg-10">
        
              
                <div class="card">
                    
                    <?php if($error = $this->session->flashdata('reminder_added')): ?>
                        <div class="row">
                            <div class="col-lg-12 text-center" >
                              <div class="alert alert-dismissible alert-success">
                              <a href="#" class="close" data-dismiss="alert" aria-label="close"></a>
                              <?= $error ?>
                              </div>
                            </div>
                         </div>
                    <?php endif; ?>
                    
                    <?php if($error = $this->session->flashdata('reminder_updated')): ?>
                        <div class="row">
                            <div class="col-lg-12 text-center" >
                              <div class="alert alert-dismissible alert-success">
                              <a href="#" class="close" data-dismiss="alert" aria-label="close"></a>
                              <?= $error ?>
                              </div>
                            </div>
                         </div>
                    <?php endif; ?>
                    
                    <?php if($error = $this->session->flashdata('reminder_deleted')): ?>
                        <div class="row">
                            <div class="col-lg-12 text-center" >
                              <div class="alert alert-dismissible alert-danger">
                              <a href="#" class="close" data-dismiss="alert" aria-label="close"></a>
                              <?= $error ?>
                              </div>
                            </div>
                         </div>
                    <?php endif; ?>
                    
                  <table class="table card-table table-vcenter table-responsive" id="example">
                    <tr>
                      <th><b>Priority</b></th>
                      <th><b>Category</b></th>
                      <th><b>Title</b></th>
                      <th><b>Description</b></th>
                      <th><b>Frequency</b></th>
                      <th><b>Reminder Start Date</b></th>
                      <th><b>Reminder End Date</b></th>
                      <!--<th><b>Assigned To</b></th>-->
                      <!--<th><b>Status</b></th>
                      <th><b>Actions</b></th>-->
                    </tr>
                    <tr >
                    <?php if(count($posts) > 0){
                          foreach($posts as $post){
                    ?>
                      <td <?php 
                    $color = "";
                    if($post->priority == "High Priority")
                    { ?>
                    style="color :red;" 
                    <?php 
                    }elseif($post->priority == "Medium Priority"){ ?>
                    style="color :blue;"
                    <?php
                    }elseif($post->priority == "Low Priority"){ ?>
                    style="color :green;"
                    <?php
                    }?> 
                    
                    ><?php echo $post->priority;?></td>
                      <td><?php echo $post->category;?></td>
                      <td><?php echo $post->title;?></td>
                      <td><?php echo $post->description;?></td>
                      <td><?php echo $post->frequency;?></td>
                      <?php $originalDate = $post->repeat_date_start;
                            $newDate = date("d-m-Y", strtotime($originalDate));
                            $originalDate1 = $post->repeat_date_end;
                            $newDate1 = date("d-m-Y", strtotime($originalDate1));
                      ?>
                      <td><?php echo $newDate;?></td>
                      <td><?php echo $newDate1;?></td>
                      <!--<td><?php echo $post->name;?></td>-->
                      <!--<td><?php echo $post->repeat_reminder;?></td>-->
                      <!--<td>
                        <a href="<?php echo base_url();?>edit_reminder/<?php echo $post->reminder_id; ?>" id="edit" class="on-default edit-row mr-2" title="Edit"><i class="fa fa-pencil" title="Edit" style="color:black;"></i></a>

                        <a href="#" data-href="<?php echo base_url();?>delete_reminder/<?php echo $post->reminder_id; ?>" title="Delete" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash-o" title="Delete" style="color: red;"></i></a>&nbsp
                        
                        <a href="#" data-href="" title="Add Repeat" data-toggle="modal" data-target="#repeat_reminder"><i class="fa fa-plus" onclick="delete1(<?php echo $post->reminder_id;?>);" title="Add repeat reminder" style="color: green;"></i></a>
                      </td>-->
                    </tr>
                    <?php } }?>  
                  </table>
                  
                  <div><?php echo $links; ?></div>
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
      
     
      
      <script type="text/javascript"> 
 function delete1(id){
      $('#did').val(id);
    }
    </script>
       <?php include ('Ajax/customdelete.php'); ?> 
       

</html>
        