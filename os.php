<html>
<head>
<title>OS test version</title>
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<script src="jquery-3.5.1.js"></script>
<style>
body {
	background-image: url('icons/blank.png');
	background-repeat: no-repeat;
	background-attachment: fixed;
	background-size: cover;
}

.desktop {
	height:100%;
	width:100%;
	position: fixed;
}

.taskbar {
	height: 100%;
	width:5%;
	position: fixed;
	z-index: 1;
	top: 0;
	left: 0;
	background-color: #34342c;
	overflow-x: hidden;
	padding-top: 1%;
}

.taskbar-icon {
	height: 5%;
	width: 100%;
	position: absolute;
	left: 25%;
	cursor: pointer;
}

.desktop-icon {
	height: 5%;
	width: 5%;
	position: fixed;
	top: 2%;
	left: 7%;
	cursor: pointer;
}

.file {
	height: 20%;
	width: 20%;
	position: absolute;
}

.icon {
	max-width: 100%;
	max-height: 100%;
	object-fit: cover;
	padding-left: 2%;
	cursor: pointer;
}

.filename {
	position: absolute;
	top:70%;
	font-family: Impact, Charcoal, sans-serif;
	color: #34342c;
	font-weight: bold;
}
.nautilus {
	position: fixed;
	height: 30%;
	width: 40%;
	top: 20%;
	left: 20%;
	background-color: #ffffff;
	border: thick solid #34342c;
}

.nautilus_menubar {
	position: absolute;
	height: 10%;
	width: 100%;
	top: 0;
	left: 0;
	background: #34342c;
}

.window-close-icon {
	position: absolute;
	left: 96%;
	cursor: pointer;
}

img {
	max-width: 100%;
	max-height: 100%;
	object-fit: cover;
}

.nautilus_menubar:active {
	cursor: pointer;
}

@media only screen and (max-width:800px) and (min-device-width:700px) {
.taskbar {
	height: 100%;
	width:15%;
	position: fixed;
	z-index: 1;
	top: 0;
	left: 0;
	background-color: #34342c;
	overflow-x: hidden;
	padding-top: 1%;
}

.nautilus_menubar {
	position: absolute;
	height: 10%;
	width: 100%;
	top: 0;
	left: 0;
	background: #34342c;
}

.nautilus {
	position: fixed;
	height: 40%;
	width: 50%;
	top: 20%;
	left: 20%;
	background-color: #ffffff;
	border: thick solid #34342c;
}

.desktop {
	height:100%;
	width:100%;
	position: fixed;
}

.taskbar-icon {
	height: 10%;
	width: 100%;
	position: absolute;
	left:0;
	padding-left:20%;
	cursor: pointer;
}

.window-close-icon {
	position: absolute;
	left: 93%;
	cursor: pointer;
}


.icon {
	max-width: 100%;
	max-height: 100%;
	object-fit: cover;
	padding-left: 2%;
	cursor: pointer;
}

.desktop-icon {
	height: 15%;
	width: 15%;
	position: fixed;
	top: 2%;
	left: 18%;
	cursor: pointer;
}

}


@media only screen and (max-width:500px) {
.taskbar {
	height: 100%;
	width:18%;
	position: fixed;
	z-index: 1;
	top: 0;
	left: 0;
	background-color: #34342c;
	overflow-x: hidden;
	padding-top: 1%;
}

.nautilus_menubar {
	position: absolute;
	height: 10%;
	width: 100%;
	top: 0;
	left: 0;
	background: #34342c;
}

.taskbar-icon {
	height: 13%;
	width: 100%;
	position: absolute;
	left:0;
	padding-left:10%;
	cursor: pointer;
}

.nautilus {
	position: fixed;
	height: 50%;
	width: 60%;
	top: 20%;
	left: 25%;
	background-color: #ffffff;
	border: thick solid #34342c;
}


img {
	max-width: 80%;
	max-height: 80%;
	object-fit: cover;
}

.desktop {
	height:100%;
	width:100%;
	position: fixed;
}

.window-close-icon {
	position: absolute;
	left: 92%;
	cursor: pointer;
}


.icon {
	max-width: 100%;
	max-height: 100%;
	object-fit: cover;
	padding-left: 2%;
	cursor: pointer;
}

.desktop-icon {
	height: 15%;
	width: 15%;
	position: fixed;
	top: 2%;
	left: 22%;
	cursor: pointer;
}


}

</style>
</head>
<body>

<div class="desktop" id="desktop">
</div>

<div class="taskbar">
<div class="taskbar-icon"><img src="icons/nautilus.svg" id="nautilus_icon"></div>
</div>


<div class="desktop-icon"><img src="icons/user-trash.svg" id="trash"></div>

<script>
var num = 0;

var left_inc = 20;
var top_pos = 13;
var left_pos = 2;

if (window.innerWidth <= 500) {
	left_inc = 30;
	left_pos = 10;
}

var x = window.matchMedia("(max-width: 500px)");
x.addListener(file_separation500);

function file_separation500(x) {
	if (x.matches) {
		left_inc = 30;
		console.log(left_inc);
	}
	tabs = document.getElementsByClassName("nautilus");
	for (var k = 0; k < tabs.length; k++) {
		ele = tabs[k];
		var files = new Array();
		for (var i = 0; i < ele.childNodes.length; i++) {
   			if (ele.childNodes[i].className == "file") {
				files.push(i);
			}        
		}
		top_pos = 13;
		left_pos = 6;
		for (var i = 0; i < files.length; i++) {
			ele.childNodes[files[i]].style.top=top_pos.toString()+"%";
			ele.childNodes[files[i]].style.left=left_pos.toString()+"%";
			left_pos = left_pos + left_inc;
		}
		left_pos = 6;
	}
}

var y = window.matchMedia("(min-width: 500px) and (max-width: 800px)");
y.addListener(file_separation800);

function file_separation800(y) {
	if (y.matches) {
		left_inc = 20;
		console.log(left_inc);
	}
	tabs = document.getElementsByClassName("nautilus");
	for (var k = 0; k < tabs.length; k++) {
		ele = tabs[k];
		var files = new Array();
		for (var i = 0; i < ele.childNodes.length; i++) {
   			if (ele.childNodes[i].className == "file") {
				files.push(i);
			}        
		}
		top_pos = 13;
		left_pos = 2;
		for (var i = 0; i < files.length; i++) {
			ele.childNodes[files[i]].style.top=top_pos.toString()+"%";
			ele.childNodes[files[i]].style.left=left_pos.toString()+"%";
			left_pos = left_pos + left_inc;
		}
		left_pos = 2;
	}
}

var z = window.matchMedia("(min-width: 800px)");
z.addListener(file_separation);

function file_separation(z) {
	if (z.matches) {
		left_inc = 12;
		console.log(left_inc);
	}
	tabs = document.getElementsByClassName("nautilus");
	for (var k = 0; k < tabs.length; k++) {
		ele = tabs[k];
		var files = new Array();
		for (var i = 0; i < ele.childNodes.length; i++) {
   			if (ele.childNodes[i].className == "file") {
				files.push(i);
			}        
		}
		top_pos = 13;
		left_pos = 10;
		for (var i = 0; i < files.length; i++) {
			ele.childNodes[files[i]].style.top=top_pos.toString()+"%";
			ele.childNodes[files[i]].style.left=left_pos.toString()+"%";
			left_pos = left_pos + left_inc;
		}
		left_pos = 10;
	}
}

function onClick() {
	num = num + 1;
	document.getElementById("desktop").innerHTML += '<div class="nautilus" id="nautilus'+num.toString()+'"><div class="nautilus_menubar" id="nautilus'+num.toString()+'_menubar"><img src="icons/window-close.svg" class="window-close-icon" id="nautilus'+num.toString()+'_close"></div></div>';

	$.getJSON("request.php?filename=root", function(result) { addIcon(result, document.getElementById("nautilus"+num.toString())); });

	$(".nautilus_menubar").bind("mousedown", function(e) { dragElement(e.target.parentElement, e); });
	$(".nautilus_menubar").bind("touchstart", function(e) { dragElement(e.target.parentElement, e); });
	$(".window-close-icon").bind("click", function(e) { closeElement(e.target.parentElement.parentElement); });
	return;
}

document.getElementById("nautilus_icon").addEventListener("click", onClick);

function addIcon(result, ele) {
	var left_pos_tmp = left_pos;
	var top_pos_tmp = top_pos;
	result.forEach((item) => {
	type = "folder-teal.svg";
	name = item.file_name;
	ele.insertAdjacentHTML('beforeend', '<div class="file" id="' + ele.id + '_file' + name + '" ><img src="icons/'+type+'" class="icon" id="'+ele.id+'_'+name+'"><div class="filename"><p>'+name+'</p></div></div>');

	document.getElementById(ele.id+'_file'+name).style.top=top_pos_tmp.toString()+"%";
	document.getElementById(ele.id+'_file'+name).style.left=left_pos_tmp.toString()+"%";

	left_pos_tmp = left_pos_tmp + left_inc;

	$(".file").bind("click", function(e) { 
		var patt = /nautilus[0-9]+_([abcdefghijklmnopqrstuvwxyz_0123456789]+)/;
		var str = e.target.id;
		var result = str.match(patt)[1];
		nautilus_request(result, e.target.parentElement.parentElement); } );
	});
}

function nautilus_request(file, ele) {
	var files = new Array();
	var j = 0;
	for (var i = 0; i < ele.childNodes.length; i++) {
   		if (ele.childNodes[i].className == "file") {
			files.push(i);
		}        
	}
	for (var i = 0; i < files.length; i++) {
		ele.childNodes[files[i]-j].remove();
		j = j + 1;
	}
	$.getJSON("request.php?filename="+file, function(result) { addIcon(result, ele); });
	}

function dragElement(ele, e) {
	var pos1=0, pos2=0, pos3=0, pos4=0, close=0;
	if (document.getElementById(ele.id + "_menubar")) {
		dragMouseDown(e);
	}
	//else {
	//	ele.onmousedown = dragMouseDown;
	//	ele.ontouchstart = dragMouseDown;
	//}

	return;

	function dragMouseDown(e) {
		e = e || window.event;
		e.preventDefault();
		pos3 = e.clientX || e.targetTouches[0].clientX;
		pos4 = e.clientY || e.targetTouches[0].clientY;
		document.onmouseup = closeDragElement;
		document.ontouchend = closeDragElement;
		document.ontouchcancel = closeDragElement;
		document.onmousemove = elementDrag;
		document.ontouchmove = elementDrag;
	}

	function elementDrag(e) {
		e = e || window.event;
		e.preventDefault();
		pos1 = pos3 - (e.clientX || e.targetTouches[0].clientX);
		pos2 = pos4 - (e.clientY || e.targetTouches[0].clientY);
		pos3 = e.clientX || e.targetTouches[0].clientX;
		pos4 = e.clientY || e.targetTouches[0].clientY;
		ele.style.top = (ele.offsetTop - pos2) + "px";
		ele.style.left = (ele.offsetLeft - pos1) + "px";
	}
	
	function closeDragElement() {
		document.onmouseup = null;
		document.ontouchend = null;
		document.ontouchcancel = null;
		document.ontouchmove = null;
		document.onmousemove = null;
	}
}

function closeElement(ele) {
	ele.remove();
}
</script>

</body>
</html>



