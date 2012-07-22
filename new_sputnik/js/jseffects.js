$(document).ready(function()
{
	$('#myForm').ajaxForm(
	{
		dataType: "json",
		success: function(data)
		{
			if(data.typedUser !== data.user)
			{
				$("#errorLogin").css("display", "block");
				$("#errorPass").css("display", "none");
			}
			else 
				if(data.typedPass !== data.password)
				{
					$("#errorLogin").css("display", "none");
					$("#errorPass").css("display", "block");
				}
		}
	});
});