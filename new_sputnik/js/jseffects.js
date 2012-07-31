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
			var regular = /^\w{1,10}$/;
			if(data.id !== 0)
			{
				$("#userExists").css("display", "block");
				$("#passwordError").css("display", "none");	
				$("#captcha").css("display", "none");
				$("#wrongUser").css("display", "none");
			}
			else if($("#loginReg").val().search(regular) === -1)
				{
					$("#wrongUser").css("display", "block");
					$("#userExists").css("display", "none");
					$("#passwordError").css("display", "none");
				}
			else if(data.captcha === "captcha")
				{
					$("#captcha").css("display", "block");
					$("#userExists").css("display", "none");
					$("#passwordError").css("display", "none");
				}
			else if($("#password").val().search(/^\w{6,20}$/) === -1 || $("#password").val() !== $("#passwordCopy").val())
				{
					$("#passwordError").css("display", "block");
					$("#captcha").css("display", "none");
					$("#userExists").css("display", "none");
				}
			else if(data.fio === "" || data.address === "" || data.city === "" || data.contact === "" )
				{
					$("#emptyFields").css("display", "block");
					$("#passwordError").css("display", "none");
					$("#captcha").css("display", "none");
					$("#userExists").css("display", "none");
				}
			else window.location.href = "register.php?user=" + data.user + "&fio=" + data.fio + "&address=" + data.address + "&city=" + data.city + "&contact=" + data.contact + "&faculty=" + data.faculty + "&institute=" + data.institute + "&specialty=" + data.specialty + "&password=" + data.password;
		}
	});
});
function checkPass()
{
	if($("#newPass").val().search(/^\w{6,20}$/) === -1)
	{
		$("#wrongPass").css("display", "block");
		$("#changePassError").css("display", "none");
	}
	else if($("#newPass").val() !== $("#newPassRepeat").val())
	{
		$("#wrongPass").css("display", "none");
		$("#changePassError").css("display", "block");		
	}
	else $("#changePass").submit();
}
function newsValidation()
{	
	if($("#newsTitle").val() === "")
	{
		$("#newsTitleError").css("display", "block");
		$("#newsBodyError").css("display", "none");
	}
	else if($("#newsBody").val() === "")
	{
		$("#newsTitleError").css("display", "none");
		$("#newsBodyError").css("display", "block");
	}
	else $("#newsForm").submit();
}
function chatValidate()
{
	if($("#chatMessage").val() === "")
		$("#chatError").css("display", "block");
	else $("#chatForm").submit();
}