/**
 * @author Steve
 */
$(document).ready(function(){
	$("#menu-advertiser").click(function(){
		$("#register").show();
		$('#report').hide()
	});
	$("#menu-report").click(function(){
		$("#report").show();
		$('#register').hide()
	});			
	$("#logout").css('cursor', 'pointer').click(function(){
		window.location = '/logout';
	});
	$("#register_form").validate({
		rules: {
			advertiser_name: "required",
			advertiser_url: "required"
		}
	});
});