<html>
<head>
<title></title>
<script type="text/javascript" src="new_sputnik/js/jquery-1.5.min.js"></script>
<script type="text/javascript">
function f()
{
	var mail = document.getElementById('email');
	mail.value = "";
	mail.style.border = '1px solid #090';
}
function openFunc()
{
	//alert("I'm here");
	var form = document.getElementById('formDiv');
	if(form.style.display == 'none')
	{
		form.style.display = 'block';
	}
	else
	{
		form.style.display = 'none';
	}
}
function changeFunc()
{
	var sel = document.getElementById('sel');
	var op = sel.selectedIndex;
	alert(op);
	var inp = document.getElementById('inp');
	inp.value = sel.options[op].text;
}
/*function human(param)
{
	this.sex = param;
	this.name = function()
	{
		alert(this.sex);
	}
}
var human1 = new human("male");
alert(human1.sex);
human1.name();
human.newParam = "One more param";
*/
function lim()
{
	//alert('here');
	var body = document.getElementById('body');
	var content = body.value;
	if(content.length > 25)
	{
		body.value = content.substr(0, 25);
	}
	var expl = document.getElementById('expl');
	var left = 25 - content.length;
	//alert(content.length);
	expl.innerHTML = "Available " + left + "symbols";
	if(left < 0)
		left = 0;
}
function help()
{
	this.show = function(text, x, y)
	{
		var div = document.createElement('div');
		div.className = "help";
		div.id = "mark";
		div.innerHTML = text;
		var koordx = x + 10;
		var koordy = y + 20;
		div.style.left = koordx + 'px';
		div.style.top = koordy + 'px';
		document.body.appendChild(div);		
	}
	this.hide = function()
	{
		var mark = document.getElementById('mark');
		mark.parentNode.removeChild(mark);
	}
}
var vsplil = new help();
//Regular verbs for email address:
function checkEmail()
{
	var reg = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
	var inp = document.getElementById("inp3");
	var right = document.getElementById("right");
	var wrong = document.getElementById("wrong");
	if(inp3.value.search(reg) !== -1)
	{
		right.style.display = "inline";
		wrong.style.display = "none";
		document.form[0].submit();
	}
	else
	{
		wrong.style.display = "inline";
		right.style.display = "none";
	}
}
function func1()
{
	var namecom = document.getElementById("namecom");
	var email1 = document.getElementById('email1');
	var site = document.getElementById('site');
	
	document.cookie = 'namecom=' + encodeURIComponent(namecom.value) + ';max-age=' + 31536000 + ';path=/;domain=.sdelaysite.com';
	document.cookie = 'email1=' + encodeURIComponent(email1.value) + ';max-age=' + 31536000 + ';path=/';
	document.cookie = 'site=' + encodeURIComponent(site.value) + '; max-age=' + 31536000 + ';path=/';
}
function opencookie(par)
{
	var allcookies = document.cookie;
	var pos = allcookies.indexOf(par);
	var dlina = par.length;
	if(pos !== -1)
	{
		var start = pos + dlina + 1;
		var end = allcookies.indexOf(';', start);
		if(end == -1)
			end = allcookies.length;
		var val = allcookies.substring(start, end);
		val = decodeURIComponent(val);
		this.cooka = val;
	}	
}
function z()
{
	alert("cookie = " + document.cookie);
	if(document.cookie !== "")
	{
		var nameCookie = new opencookie("namecom");
		alert(nameCookie.cooka);
		var emailCookie = new opencookie("email1");
		alert(emailCookie.cooka);
		var siteCookie = new opencookie("site");
		alert(siteCookie.cooka);
		var namecom = document.getElementById("namecom");
		var email1 = document.getElementById("email1");
		var site = document.getElementById("site");
		
		namecom.value = nameCookie.cooka;
		email1.value = emailCookie.cooka;
		site.value = siteCookie.cooka;
	}
}
</script>
</head>
<body onload="z()">
<input type="text" id="namecom"><br/>
<input type="text" id="email1"><br/>
<input type="text" id="site"><br/>
<input type="button" value="send" onclick="func1()"><br/>

<input type="text" id="inp3" onblur="checkEmail()">
<div style="display: none" id="right">Right</div>
<div style="display: none" id="wrong">Wrong</div>
<input type="button" value="send"/>
<p onmouseover="vsplil.show('The first paragraph', this.offsetLeft, this.offsetTop)" onmouseout="vsplil.hide()">
The paragraph text
</p>
<p id="expl">Available 25 symbols</p>
<textarea onclick="lim()" onkeyup="lim()" id="body"></textarea>
<select id="sel" onchange="changeFunc()">
<option value="hi">Hi</option>
<option value="buy">Buy</option>
</select>
<input type="text" value="??" id="inp" />
<a href="#" onclick="openFunc()"> show form </a>
<form style="display: none" onclick="openFunc()" id="formDiv">
<input type="text" value="Enter your email" onclick="f()" id="email">
<!--<input type="text" value="Enter your email" onclick="this.value = 'sdhfhdskhfksdjh'" id="email">-->
<input type="button" value="press" onclick="a()">
</form>
</body>
</html>