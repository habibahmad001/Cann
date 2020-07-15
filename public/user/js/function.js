$(document).ready(function(e) {
	if($("input[name='repass']").length)
	{
		$("input[name='repass']").focusout(function(e) {
			var pass = $("input[name='password']").val();
			var repass = $("input[name='repass']").val();
			if(pass != repass) 
			{
				$("#msg").css("display","block").text("Please Enter correct password !");
				//alert("Please Enter correct password !");
			}
			else
			{
				$("#msg").css("display","none");
			}
		});
	}
	
	if($("#file_upload").length)
	{
		$("#file_upload").click(function(e) {
			$("#file_upload").css("display", "none");
			$("#file_upload1").css("display", "block");
		});
	}

////////////////// Edit table show hide ////////////////
$("input#add").click(function(e) {
	var display = $("table.edit_course").css( "display" );
	if( display === "none" )
	{
		var pagename = $('#pagename').val();
		var catid = $('#catid').val();
		if( catid !== "undefined") 
		{
			$('form[name="frm"]').attr("action", pagename + "/add/" + catid);
		}
		else
		{
			$('form[name="frm"]').attr("action", pagename + "/add");
		}
		
		$("input#save").attr("value", "Add");
    	$("table.edit_course").slideDown(500);
	}
	else
	{
		var pagename = $('#pagename').val();
		var catid = $('#catid').val();
		
		if( catid !== "undefined") 
		{
			$('form[name="frm"]').attr("action", pagename + "/update/" + catid);
		}
		else
		{
			$('form[name="frm"]').attr("action", pagename + "/update");
		}
		
		$("input#save").attr("value", "Update");
		$("table.edit_course").slideUp(500);
	}
});

////////////////// Edit table show hide ////////////////
});

function frmsub()
{
	$("#frm").attr("action" , "http://localhost/adsens/user/home/user_image_upload");
	$("#frm").submit();
}

function closewindow(url)
{
	window.location.href = url;
	//$("table.edit_course").slideUp(500);
}

function confrm(url,id)
{
if(confirm("Are you sure, you want to Delete?"))
{
	 window.location.href = url+'/delete/'+id+'/'+url;
	return true;
}
else
	return false;
}