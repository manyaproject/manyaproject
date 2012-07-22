<html>
<head>
<title></title>
<script type="text/javascript" src="new_sputnik/js/jquery-1.5.min.js"></script>
<script type="text/javascript" src="new_sputnik/js/jquery.form.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
	//alert($("#inp0").val());
	$('#myForm').ajaxForm(
	{
		dataType: "json",
		success: function(data)
		{
			if(data.typed !== data.password)
			{
				$("#error").css("display", "block");
			}
			else
			{
				$("#error").css("display", "none");
			}
		}
	});
});
</script>
</head>
<body>
<form id="myForm" action="jquery.php" method="post">
<input type="text" id="inp0" name="prev">
<p style="display: none" id="error">Wrong pass</p>
<input type="submit" id="sub">
</form>
</body>
</html>