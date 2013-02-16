$(document).ready(function(){
	
    var oTable = $('#example').dataTable(
    	{
    	"bJQueryUI": true,
        "sPaginationType": "full_numbers"
    	}
    ); 
    
    $('#add_form').validate({
    	rules:{
    		organization: 'required',
    		address1: 'required',
    		city: 'required',
    		state: 'required',
    		country: 'required',
    		zip: 'required',
    		fname: 'required',
    		lname: 'required',
    		phone: 'required',
    		email: 'required'
    	}
    });
   
   
});

function get_province_state()
{
	var country = $('#country').val();
	$.post('get_province_state', {country: country}, function(data){
		if(data != '')
		$('#state_layer').html('<label>State / Province</label>'+ data);
	});
} 

