 

<script>
	
 $('.dels').on('click', function(){
 	var link = $(this).attr('rel');
 	

 swal({
	 
	  text: "Do you want to delete for this?",
	  icon: "warning",
	  buttons: true,
	  dangerMode: true,
	})
	.then((willDelete) => {
	  if (willDelete) {
	  	window.location.href=link;

	        
			
	  } else {
	    swal("Your action is cancel!");
	  }
 });
});

  
</script>
 