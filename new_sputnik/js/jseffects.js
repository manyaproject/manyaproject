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
			{				
				if(data.typedPass !== data.password)
				{
					$("#errorLogin").css("display", "none");
					$("#errorPass").css("display", "block");
				}
				else window.location.href = "login.php?user=" + data.user + "&id=" + data.id;
			}
		}
	});
});
$(document).ready(function()
{
	$('#registerForm').ajaxForm(
	{
		dataType: "json",
		success: function(data)
		{
			if(data.user === "" and $("#loginReg").val())
			{
				$("#userExists").css("display", "none");				
			}
			else 
			{				
				if(data.typedPass !== data.password)
				{
					$("#errorLogin").css("display", "none");
					$("#errorPass").css("display", "block");
				}
				else window.location.href = "login.php?user=" + data.user + "&id=" + data.id;
			}
		}
	});
});