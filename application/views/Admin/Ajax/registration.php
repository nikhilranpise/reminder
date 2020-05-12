<?php 
?>
<script>
$(document).ready(function(){
	$("#submit").click(function(e){
    	
    	e.preventDefault();
    	e.stopPropagation();

    	var formData= new FormData($("#myForm")[0]); //$("#myForm").serialize();
    	$loading = $('#formOneResults').html('<img src="<?php echo base_url();?>assets/js/ajax-loader.gif" />');

    	$.ajax({ 
    	  url: '<?php echo base_url();?>save_registraion',//change
    	  data: formData,
        //mimeType: "multipart/form-data",        
        type: 'post',
        cache: false,
        contentType: false,
		    processData: false,
        success: function(resp){
	        		if (resp === '1') {
	        		  $("#myModal").modal('show'); 
	   				    $loading.hide(); 
                        window.setTimeout(function(){
                        window.location.href = "<?php echo base_url();?>get_otp";
                     }, 2000);
	        		}else{
	        		  $("#myModalfailed").modal('show'); 
	   				    $loading.hide(); 	
	        		}   				 
   				  //document.write(resp); 				 
				}, 
		  failure:function(resp){
   				 $("#myModalfailed").modal('show'); 
   				 $loading.hide(); 				 
				}      
    	});	
 }); 
});
</script>

