$(document).ready(function(){
      $('.variant').on('change', function(){
        var variantID = $(this).val();
         if(variantID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'variant='+variantID,
				dataType: 'html',
                success:function(data){
					 
					 
                    $('#subvariant').html(data);
					
                }
            }); 
        }else{
            $('#subvariant').html('<option value="">Select Main Catagory</option>'); 
        }
    });
	
	
	
	   $('#main_menu').on('change', function(){
        var menu_nameID = $(this).val();
		//alert(menu_nameID);
         if(menu_nameID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'menu_name='+ encodeURIComponent(menu_nameID),
				dataType: 'html',
                success:function(data){
					 
					 
                    $('#product_type').html(data);
					
                }
            }); 
        }else{
            $('#product_type').html('<option value="">Select Product Catagory</option>'); 
        }
    });
	
	
	
	 $('#product_type').on('change', function(){
        var collectionID = $(this).val();
		//alert(collectionID);
         if(collectionID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'collection='+encodeURIComponent(collectionID),
				dataType: 'html',
                success:function(data){
					 
					 
                    $('#collection').html(data);
					
                }
            }); 
        }else{
            $('#collection').html('<option value="">Select Product Type</option>'); 
        }
    });
  	
	  });
 
  
 
function randomPassword(length) {
	    
    var chars = "abcdefghijklmnopqrstuvwxyz!@#$%^&*()-+<>ABCDEFGHIJKLMNOP1234567890";
    var pass = "";
    for (var x = 0; x < length; x++) {
        var i = Math.floor(Math.random() * chars.length);
        pass += chars.charAt(i);
    }
    return pass;
}

function generate() {
    myform.discount_code.value = randomPassword(myform.length.value);
}


  $(".box").hide();
  $(".country_list").hide();
   $(".shiping_rate_exc").hide();
   $(".shiping_rate_exc").hide();
   
  
 $(document).ready(function(){
    $('input[type="radio"]').click(function(){
        var inputValue = $(this).attr("value");
        var targetBox = $("." + inputValue);
        $(".box").not(targetBox).hide();
        $(targetBox).show();
    });
});
    $(".circle").hide();
   
  
	$(document).ready(function(){
    $('input[type="checkbox"]').click(function(){
        var inputValue = $(this).attr("value");
		 
        $("." + inputValue).toggle();
    });
}); 	 
		 $("input:checkbox").click(function() {
    if ($(this).is(":checked")) {
        var group = "input:checkbox[name='" + $(this).attr("name") + "']";
        $(group).prop("checked", false);
        $(this).prop("checked", true);
    } else {
        $(this).prop("checked", false);
    }
});


