/**
 * @author Steve Higgins
 */
$(document).ready(function(){
	$("#register_form").validate({
		rules: {
			advertiser_name: "required",
			advertiser_url: "required"
		},
		messages:{
			advertiser_name: 'Advertiser Name is required',
			advertiser_url: 'Advertiser URL is required',
		}
	});
	/* STRIPING AND ROW HOVER FOR TABLES */
	$(".stripeme tr").mouseover(function(){$(this).addClass("over");}).mouseout(function(){$(this).removeClass("over");});
   	$(".stripeme tr:even").addClass("alt");
   	
   	/* REPORT MONTHLY OR PERIOD 
   	$("input:radio[name=period_month]").click(function(){
   		var formval = $(this).val();
   		var show = formval == 'month' ? '#month' : '#period';
   		var hide = formval == 'month' ? '#period' : '#month';
   		$("input[name=type]").val(show); /*sets hidden form field 'type'
   		$(show).show();
   		$(hide).hide();
   	});*/
   	
   	$("input[name=year_from]").blur(function(){
   		var fromval = $(this).val()
   		$("input[name=year_to]").val(fromval);
   	})
   	
   	/* INLINE EDIT ADVERTISERS*/
	$('.editurl').editInPlace({
    	url: "adclick/update_advertiser",
    	params: 'field=advertiser_url',
    	success: function(response){
    		$(this).text(response);
    		location.reload();
    	}
     });
	$('.editname').editInPlace({
    	url: "adclick/update_advertiser",
    	params: 'field=advertiser_name',
    	success: function(response){
    		$(this).text(response);
    		location.reload();
    	}
     });     
     
  	/* INLINE EDIT CAMPAIGNS*/
	$('.editcampaignname').editInPlace({
    	url: "adclick/update_campaign",
    	params: 'field=campaign_name',
    	success: function(response){
    		$(this).text(response);
    		location: reload();
    	}
     });
	$('.editdescription').editInPlace({
    	url: "adclick/update_campaign",
    	field_type: "textarea",
		textarea_rows: "15",
		textarea_cols: "35",
    	params: 'field=campaign_description',
    	success: function(response){
    		$(this).text(response);
    		location.reload();
    	}
     });   
     
     /* DATEPICKER */
    $("input[name=date_from]").datepicker({ dateFormat: "yy-mm-dd" });   
    $("input[name=date_to]").datepicker({ dateFormat: "yy-mm-dd" });   
});

