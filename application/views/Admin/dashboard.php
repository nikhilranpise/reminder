<?php include('include/headers.php'); ?>
 </head>
  <?php include('include/nav.php'); ?>
  <body onload="add_user()">
        
<div align="center">
    <div class="col-lg-12">
        <div class="card-body">
           
            <!-- <div class="sticky-top text-center py-4">
                  <a class="btn btn-info" style="width:160px" href="<?php echo base_url();?>add_category" >Add Categories</a>
            </div> -->
        <div class="col-lg-8">
        
              
                <div class="row" style="margin-top:35px;" align="center">
            
            <div class="col-md-6" >
                <a href="" data-toggle="modal" data-target="#expiredReminder">
                <div class="card p-3 px-4" style="height:420px;background-color:#FF0000">
                  <div style="margin-top:150px";>
                   <b style="font-size:22px">Expired/Unresolved Reminders</b>
                  </div><br>
                  <div class="py-4 m-0 text-center h1 text-white"><?php echo $expired_count; ?></div>
                  <!--<div class="d-flex">-->
                  <!--  <small class="text-muted"></small>-->
                  <!--  <div class="ml-auto">-->
                  <!--    <i class="fa fa-caret-up text-white"></i>-->
                  <!--  </div>-->
                  <!--</div>-->
                </div>
                </a>
              </div>        
                    
            <div class="col-md-6">
                <div class="row">
            	<div class="col-md-6">
            		<a href="" data-toggle="modal" data-target="#todaysReport">
                <div class="card p-3 px-4" style="background-color:#FC6208">
                  <div style="margin-top:25px" ;="">
                  <b style="font-size:22px"> Todays Reminders</b>
                  </div><br>
                  <div class="py-3 m-0 text-center h1 text-white"><?php echo $today; ?></div>
                  <!--<div class="d-flex">-->
                  <!--  <small class="text-muted"></small>-->
                  <!--  <div class="ml-auto">-->
                  <!--    <i class="fa fa-caret-up text-white"></i>-->
                  <!--  </div>-->
                  <!--</div>-->
                </div>
              </a>
            	</div>
            	<div class="col-md-6">
                <a href="" data-toggle="modal" data-target="#upcomingReminder">
                <div class="card p-3 px-4"  style="background-color:#FC607A">
                  <div style="margin-top:25px" ;="">
                   <b style="font-size:22px"> Upcoming Reminders</b>
                  </div><br>
                  <div class="py-3 m-0 text-center h1 text-white"><?php echo $upcoming_count; ?></div>
                  <!--<div class="d-flex">-->
                  <!--  <small class="text-muted"></small>-->
                  <!--  <div class="ml-auto">-->
                  <!--    <i class="fa fa-caret-up text-white"></i>-->
                  <!--  </div>-->
                  <!--</div>-->
                </div>
                </a>
              </div>
              <div class="col-md-6">
                <a href="" data-toggle="modal" data-target="#completedReminder">
                <div class="card p-3 px-4" style="background-color:#5789FD">
                  <div style="margin-top:25px" ;="">
                   <b style="font-size:22px">Completed Reminders</b>
                  </div><br>
                  <div class="py-3 m-0 text-center h1 text-white"><?php echo $completed_count; ?></div>
                  <!--<div class="d-flex">-->
                  <!--  <small class="text-muted"></small>-->
                  <!--  <div class="ml-auto">-->
                  <!--    <i class="fa fa-caret-up text-white"></i>-->
                  <!--  </div>-->
                  <!--</div>-->
                </div>
                </a>
              </div>
              </div>
              </div>  
            </div>
    </div>
    </div>
  </div>
 </div>          
</div>

<div class="modal fade" id="todaysReport" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg ">
              <div class="modal-content panel-info panel-color">
              
                  <div class="modal-header panel-info panel-color">
                    <h4 class="modal-title" id="myModalLabel">Today's Reminders</h4>
                      <button type="button" class="" data-dismiss="modal" aria-hidden="true">&times;</button>
                      
                  </div>
              
                  <div class="modal-body">
                    <div class="card">
                        <div style="padding-top:20px;padding-right:20px;">
                           <a href="<?php echo base_url();?>showAllTodayReminder"><button class="btn btn-success pull-right">View All</button></a>
                        </div>
                  <table class="table card-table table-vcenter" id="example">
                    <tr>
                      <th><b>Category<b></th>
                      <th><b>Total Reminder<b></th>
                      <th><b>Action<b></th>
                    </tr>
                    <tr>
                    <?php if(count($categories) > 0){
                          foreach($categories as $category){
                    ?>
                      <td><?php echo $category->category; ?></td> 
                      <td><?php echo $category->reminders; ?></td>
                      <td>
                          <a href="<?php echo base_url();?>showTodaysCategoryReminder/<?php echo $category->category_id;?>" id="edit" class="on-default edit-row mr-2"><i class="fa fa-eye" style="color:blue;"></i></a>
                      </td>
                      
                    </tr>
                    <?php } }?>
                    
                      
                  </table>
                </div>
                  </div>
                  
                  <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                  </div>
              </div>
          </div>
      </div>


<div class=" modal fade" id="upcomingReminder" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg ">
              <div class="modal-content panel-info panel-color">
              
                  <div class="modal-header panel-info panel-color">
                    <h4 class="modal-title" id="myModalLabel">Upcoming Reminders</h4>
                      <button type="button" class="" data-dismiss="modal" aria-hidden="true">&times;</button>
                      
                  </div>
              
                  <div class="modal-body">
                    <div class="card">
                        <div style="padding-top:20px;padding-right:20px;">
                           <a href="<?php echo base_url();?>showAllUpcoming"><button class="btn btn-success pull-right">View All</button></a>
                        </div>
                  <table class="table card-table table-vcenter" id="example">
                    <tr>
                      <th><b>Category<b></th>
                      <th><b>Total Reminder<b></th>
                      <th><b>Action<b></th>
                    </tr>
                    <tr>
                    <?php if(count($upcoming_categories) > 0){
                          foreach($upcoming_categories as $upcoming_category){
                    ?>
                      <td><?php echo $upcoming_category->category; ?></td> 
                      <td><?php echo $upcoming_category->reminders; ?></td>
                      <td>
                          <a href="<?php echo base_url();?>showUpcomingCategoryReminder/<?php echo $upcoming_category->category_id;?>" id="edit" class="on-default edit-row mr-2"><i class="fa fa-eye" style="color:blue;"></i></a>
                      </td>
                      
                    </tr>
                    <?php } }?>
                    
                      
                  </table>
                </div>
                  </div>
                  
                  <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                  </div>
              </div>
          </div>
      </div>

<div class=" modal fade" id="completedReminder" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg ">
              <div class="modal-content panel-info panel-color">
              
                  <div class="modal-header panel-info panel-color">
                    <h4 class="modal-title" id="myModalLabel">Completed Reminders:</h4>
                      <button type="button" class="" data-dismiss="modal" aria-hidden="true">&times;</button>
                      
                  </div>
              
                  <div class="modal-body">
                    <div class="card">
                        <div style="padding-top:20px;padding-right:20px;">
                           <a href="<?php echo base_url();?>showAllCompleted"><button class="btn btn-success pull-right">View All</button></a>
                        </div>
                  <table class="table card-table table-vcenter" id="example">
                    <tr>
                      <th><b>Category<b></th>
                      <th><b>Total Reminder<b></th>
                      <th><b>Action<b></th>
                    </tr>
                    <tr>
                    <?php if(count($completed_categories) > 0){
                          foreach($completed_categories as $completed_category){
                    ?>
                      <td><?php echo $completed_category->category; ?></td> 
                      <td><?php echo $completed_category->reminders; ?></td>
                      <td>
                          <a href="<?php echo base_url();?>showCompletedCategoryReminder/<?php echo $completed_category->category_id;?>" id="edit" class="on-default edit-row mr-2"><i class="fa fa-eye" style="color:blue;"></i></a>
                      </td>
                      
                    </tr>
                    <?php } }?>
                  </table>
                </div>
                  </div>
                  
                  <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                  </div>
              </div>
          </div>
      </div>

<div class=" modal fade" id="expiredReminder" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg ">
              <div class="modal-content panel-info panel-color">
              
                  <div class="modal-header panel-info panel-color">
                    <h4 class="modal-title" id="myModalLabel">Expired/Unresolved Reminders:</h4>
                      <button type="button" class="" data-dismiss="modal" aria-hidden="true">&times;</button>
                      
                  </div>
              
                  <div class="modal-body">
                    <div class="card">
                        <div style="padding-top:20px;padding-right:20px;">
                           <a href="<?php echo base_url();?>showAllExpiredUnresolved"><button class="btn btn-success pull-right">View All</button></a>
                        </div>
                  <table class="table card-table table-vcenter" id="example">
                    <tr>
                      <th><b>Category<b></th>
                      <th><b>Total Reminder<b></th>
                      <th><b>Action<b></th>
                    </tr>
                    <tr>
                    <?php if(count($expired_categories) > 0){
                          foreach($expired_categories as $expired_category){
                    ?>
                      <td><?php echo $expired_category->category; ?></td> 
                      <td><?php echo $expired_category->reminders; ?></td>
                      <td>
                          <a href="<?php echo base_url();?>showExpiredCategoryReminder/<?php echo $expired_category->category_id;?>" id="edit" class="on-default edit-row mr-2"><i class="fa fa-eye" style="color:blue;"></i></a>
                      </td>
                      
                    </tr>
                    <?php } }?>

                      
                  </table>
                </div>
                  </div>
                  
                  <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                  </div>
              </div>
          </div>
      </div>
      
<script>
    function add_user() {
        console.log(OneSignal.setSubscription(true));
}
</script>
      
      <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async></script>
        <script>
            var OneSignal = window.OneSignal || [];
            OneSignal.push(["init", {
                appId: "be37c3e5-9b85-4f74-8736-6b4fc6f9fc69",
                subdomainName: 'ourtutorial',
                autoRegister: true,
                promptOptions: {
                    /* These prompt options values configure both the HTTP prompt and the HTTP popup. */
                    /* actionMessage limited to 90 characters */
                    actionMessage: "We'd like to show you notifications for the latest news.",
                    /* acceptButtonText limited to 15 characters */
                    acceptButtonText: "ALLOW",
                    /* cancelButtonText limited to 15 characters */
                    cancelButtonText: "NO THANKS"
                }
            }]);
        </script>
        <script>
            function subscribe() {
                // OneSignal.push(["registerForPushNotifications"]);
                OneSignal.push(["registerForPushNotifications"]);
                event.preventDefault();
            }
            function unsubscribe(){
                OneSignal.setSubscription(true);
            }

            var OneSignal = OneSignal || [];
            OneSignal.push(function() {
                /* These examples are all valid */
                // Occurs when the user's subscription changes to a new value.
                OneSignal.on('subscriptionChange', function (isSubscribed) {
                    console.log("The user's subscription state is now:", isSubscribed);
                    var random = Math.floor(100000 + Math.random() * 900000);
                    if(random){
                        $.ajax({
                            type:'POST',
                            url:'<?php echo base_url();?>Authentication/update_admin',
                             data:'random='+random,
                            success:function(data){
                                console.log("User ID updated successfully");
                            }
                        }); 
                    }
                    OneSignal.sendTag("user_id",random, function(tagsSent)
                    {
                        // Callback called when tags have finished sending
                        console.log("Tags have finished sending!");
                    });
                });

                var isPushSupported = OneSignal.isPushNotificationsSupported();
                if (isPushSupported)
                {
                    // Push notifications are supported
                    OneSignal.isPushNotificationsEnabled().then(function(isEnabled)
                    {
                        if (isEnabled)
                        {
                            console.log("Push notifications are enabled!");

                        } else {
                            OneSignal.showHttpPrompt();
                            console.log("Push notifications are not enabled yet.");
                        }
                    });

                } else {
                    console.log("Push notifications are not supported.");
                }
            });


        </script>

</html>
        