/* *********************************************

(C) 2008-2010, www.homepictures.ru

Support page: www.homepictures.ru/halyava/hpgallery.html

update 2008/12/13 (fixed of element positioning when doctype is defined)
update 2010/07/02 (removed coords attribute of A-tag; added multigallery support)

********************************************* */
hpTexts = {
initerror : 'Галерея с ID=%s уже инициализирована. Для инициализации другой галереи на странице используйте другой ID',
notitle : 'Название не указано',
noimg : 'Изображение отсутствует на сервере',
downloaderror : 'Сбой при загрузке изображения. Ошибка: ',
close : 'Закрыть',
noajax : 'Браузер не поддерживает AJAX'
}

var hpGalleries = {}; //кеш фотогалерей
function hpGallery(BondName){
	this.BondName = !BondName ? 'imgbond' : BondName;
	if(typeof hpGalleries[this.BondName] != 'undefined'){
		alert(hpTexts.initerror.replace('%s', this.BondName));
		return;
	}
	this.Dir = this.GetScriptDir();
	this.isIE = window.navigator.userAgent.indexOf("MSIE")>-1;
	this.Glass = null;
	this.imgWindow = null;
	this.imgcache = {};
	this.loadingimg = null;
	this.cururl = '';
	this.Index = 0;
	this.AltDivs = [];
	this.LinkDivs = [];
	this.bFirstShow = true;
	hpGalleries[this.BondName] = this;
	this.Init();
}
hpGallery.prototype.GetScriptDir = function(){
	var scripts = typeof(document.scripts)!='undefined' ? document.scripts : document.getElementsByTagName('SCRIPT');
	for(var i =0; i<scripts.length; i++)
		if(scripts[i].src.match(/^(.+)hpgallery\.js/i)!=null) return RegExp.$1;
	return '';
}
hpGallery.prototype.Init = function(){
	var c = document.getElementById(this.BondName);
	if(!c) return;
	var cld = c.getElementsByTagName('A');
	if(!cld || cld.length==0) return;
	this.BondImages = [];
	var n=0;
	for(var i=0; i<cld.length; i++){
		var img =  this.GetFirstImg(cld[i]);
		if(img == null) continue;
		var alt = hpTexts.notitle;
		if(typeof img.alt != 'undefined' && img.alt !='') alt = img.alt;
		else if(typeof cld[i].title !='undefined' && cld[i].title != '') alt = cld[i].title;
		cld[i].name = this.BondName+':'+n;
		this.BondImages[n]=[cld[i].href, alt];
		cld[i].onclick = function(e){
			if(this.name.match(/^(.+):(.+)$/)!==null){
				hpGalleries[RegExp.$1].Index = RegExp.$2; 
				hpGalleries[RegExp.$1].ShowImg(); 
			}
			return false;
		}
		n++;
	}
}

hpGallery.prototype.GetFirstImg = function(o){
	var cld = o.childNodes;
	for(var i=0; i<cld.length; i++) if(cld[i].tagName == 'IMG') return cld[i];
	return null;
}

hpGallery.prototype.ShowImg = function(){
	if(typeof(this.BondImages[this.Index])=='undefined') return true;
	var aImg = this.BondImages[this.Index];
	this.ShowGlassWindow(true);
	this.InitScreen();
	var url = aImg[0];
	this.cururl=url;
	if(typeof(this.imgcache[url])=='undefined'){
		this.ShowImgWindow(this.loadingimg);
		this.UploadAndShowImageSize(aImg);
	}
	else{
		this.ShowImgWindow(this.imgcache[url], true);
	}
	return false;
}

hpGallery.prototype.UploadAndShowImageSize = function(aImg) {
	var im = new Image();
	im.src = aImg[0];
	im.alt=aImg[1];
	thisgallery = this;
	im.onload = function(e){
		var img = document.createElement('IMG');
		with(img){ src=im.src; width=im.width; height=im.height; border=0; alt=im.alt; }
		thisgallery.imgcache[im.src]=img;
		if(thisgallery.cururl==im.src) thisgallery.ShowImgWindow(img);
	}
	im.error = function(e){
		if(!e) e = window.event;
		if(thisgallery.cururl==im.src) thisgallery.HideImgWindow();
		alert(hpTexts.downloaderror+e.toString());
	}
}


hpGallery.prototype.ShowImgWindow = function(img){
	var bShowTitle = this.loadingimg != img;
	with(img.style){
		width = this.gu(img.width);
		height = this.gu(img.height);
		marginLeft = this.gu(-Math.round(img.width/2));
		marginTop = this.gu(-Math.round(img.height/2));
		position = 'absolute';
		left = top = '50%';
	}
	if(this.bFirstShow || bShowTitle)
	with(this.imgWindow.style){
		var w = Math.round(img.width*1.20);
		var h = img.height+120;
		if(w<300) w = 300;
		if(h<300) h = 300;
		width = this.gu(w); height = this.gu(h);
		marginLeft = this.gu(-Math.round(w/2));
		marginTop = this.gu(-Math.round(h/2));
		this.bFirstShow = false;
	}
	while(this.imgWindow.childNodes.length>0) this.imgWindow.removeChild(this.imgWindow.childNodes[0]);
	if(bShowTitle){
		thisgallery = this;
		if(typeof(this.AltDivs[this.Index])!='object'){
			this.AltDivs[this.Index] = document.createElement('h3');
			this.AltDivs[this.Index].innerHTML = img.alt;
			with(this.AltDivs[this.Index].style) {
				fontSize="10pt";
				textAlign = 'center'; position = 'absolute'; width = '100%';
				top = this.gu(Math.round(img.height*0.025));
				padding = margin = 0;
			}
		}
		if(typeof(this.LinkDivs[this.Index])!='object'){
			this.LinkDivs[this.Index] = document.createElement('DIV');
			with(this.LinkDivs[this.Index].style) {
				textAlign = 'center'; position = 'absolute';
				top = this.gu(Math.round(img.height+70));
				padding = '3pt'; margin = 0; width = '100%';
			}
			if(this.BondImages.length<11){
				var fistindex = 0;
				var lastindex = this.BondImages.length-1;
			}
			else{
				var fistindex = this.Index-4;
				if(fistindex<0) fistindex = 0;
				var lastindex = fistindex + 8;
				if(lastindex > this.BondImages.length-1){
					lastindex = this.BondImages.length-1;
					var t = lastindex-8;
					if(t>=0) fistindex = t;
				}
			}
			for(var ispan=0; ispan<this.BondImages.length; ispan++){
				if(ispan<fistindex) continue;
				if(ispan>lastindex) break;
				var Page = document.createElement('SPAN');
				Page.innerHTML = (ispan+1);
				with(Page.style){ fontSize="9pt"; padding = "3pt 5pt 3pt 5pt"; marginLeft = "2pt"; width = "20pt"; } 
				if(ispan==this.Index){
					with(Page.style){
						border = "1px solid #000";
						backgroundColor = "#CCC";
						cursor = "auto";
					}
				}
				else{
					with(Page.style){
						border = "1px solid #CCC";
						backgroundColor = "#FFF";
						cursor = "pointer";
					}
					Page.onclick = function(){
						thisgallery.Index = parseInt(this.innerHTML)-1;
						thisgallery.ShowImg();
					}
				}
				this.LinkDivs[this.Index].appendChild(Page);
			}
			var Page = document.createElement('SPAN');
			Page.innerHTML = hpTexts.close;
			with(Page.style){ 
				fontSize="9pt"; 
				padding = "3pt 5pt 3pt 5pt"; marginLeft = "15pt"; 
				border = "1px solid #CCC";
				backgroundColor = "#FFF";
				cursor = "pointer";
				width = "20pt";
			} 
			Page.onclick = function(){
				thisgallery.HideImgWindow();
			}
			this.LinkDivs[this.Index].appendChild(Page);
		}
	}
	var cntr = this.clientCenter();
	with(this.imgWindow.style){
		left = this.gu(cntr[0]);
		top  = this.gu(cntr[1]);
		if(display!='block') display='block';
	}
	this.imgWindow.appendChild(img);
	if(bShowTitle){
		this.imgWindow.appendChild(this.AltDivs[this.Index]);
		this.imgWindow.appendChild(this.LinkDivs[this.Index]);
	}
}

hpGallery.prototype.InitScreen = function(){
	if(this.imgWindow==null){
		thisgallery = this;
		this.imgWindow = document.createElement('DIV');
		this.imgWindow.id ='imgWindow';
		this.imgWindow.onclick = function(){ /* thisgallery.HideImgWindow();*/}
		with(this.imgWindow.style){
			zIndex=2; display='none'; position='absolute'; border='1px solid #AAA'; 
			background = '#FFF url('+this.Dir+'fon.gif) repeat-x bottom';
		}
		document.body.appendChild(this.imgWindow);
		this.loadingimg = document.createElement('IMG');
		with(this.loadingimg){ src=this.Dir+'loading.gif'; width=64; height=64; border=0; alt='Загрузка'; }
	}
}

hpGallery.prototype.HideImgWindow = function(){
	this.imgWindow.style.display='none';
	this.ShowGlassWindow(false);
}

hpGallery.prototype.ShowGlassWindow = function(show){
	if(this.Glass==null){
		this.Glass=document.createElement('DIV');
		with(this.Glass.style){
			display='none'; position='absolute'; height=0; width=0; zIndex=1;
			if(this.isIE){
				backgroundColor = '#000';
				filter="progid:DXImageTransform.Microsoft.Alpha(Opacity=60, Style=0)";
			}
			else backgroundImage = 'url('+this.Dir+'alfa40.png)';
		}
		document.body.appendChild(this.Glass);
	}
	if(show){
		var sizes = this.documentSize();
		with(this.Glass.style){
			left = 0; top = 0;
			width = this.gu(sizes[0]);
			height = this.gu(sizes[1]);
		}
	}
	this.Glass.style.display = show ? 'block' : 'none';
}

hpGallery.prototype.GetAJAXLoader = function(){
	var req=null;
   	if (typeof(window.XMLHttpRequest)!='undefined') { try { req = new XMLHttpRequest(); } catch (e){ alert(hpTexts.ajaxfail); } }
   	else if (typeof(window.ActiveXObject)!='undefined') {
       	try { req = new ActiveXObject('Msxml2.XMLHTTP');} catch (e){
            try { req = new ActiveXObject('Microsoft.XMLHTTP'); } catch (e){ alert(hpTexts.ajaxfail); }
		}
	}
	else alert(hpTexts.noajax);
	return req;
}

hpGallery.prototype.clientSize = function(){
	var w = 0;
	var h = 0;
	if(document.compatMode=='CSS1Compat'/* && !window.opera*/){
		w = document.documentElement.clientWidth;
		h = document.documentElement.clientHeight;
	}
	else{
		w = document.body.clientWidth;
		h = document.body.clientHeight;
	}
	return [w, h];
}

hpGallery.prototype.documentSize = function(){
	var w = document.body.scrollWidth > document.body.offsetWidth ? document.body.scrollWidth : document.body.offsetWidth;
	var h = document.body.scrollHeight > document.body.offsetHeight ? document.body.scrollHeight : document.body.offsetHeight;
	var cs = this.clientSize();
	if(w < cs[0]) w = cs[0];
	if(h < cs[1]) h = cs[1];
	return [w, h];
}

hpGallery.prototype.documentScroll = function(){
	var l = self.pageXOffset || (document.documentElement && document.documentElement.scrollLeft) || (document.body && document.body.scrollLeft);
	var t = self.pageYOffset || (document.documentElement && document.documentElement.scrollTop) || (document.body && document.body.scrollTop);
	return [l, t];
}

hpGallery.prototype.clientCenter = function(){
	var sizes = this.clientSize();
	var scroll = this.documentScroll();
	return [parseInt(sizes[0]/2)+scroll[0], parseInt(sizes[1]/2)+scroll[1]];
}

hpGallery.prototype.gu = function(num){ return parseInt(num)+'px'; }
