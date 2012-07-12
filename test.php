<html>
<head>
<title></title>
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
</script>
</head>
<body>
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