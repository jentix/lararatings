var watcher = {}
watcher.touch = function() {
	var xhttp;
	if (window.XMLHttpRequest){
	   xhttp=new XMLHttpRequest();
	}
	else {
	   xhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xhttp.open('POST','touch.php',true);
	xhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
	var data = 'id='+(this.id ? this.id : '0');
	xhttp.send(data);
}