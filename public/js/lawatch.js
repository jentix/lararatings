var xhttp;
if (window.XMLHttpRequest){
   xhttp=new XMLHttpRequest();
}
else {
   xhttp=new ActiveXObject("Microsoft.XMLHTTP");
}
xhttp.open('POST','touch',true);
xhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
var data = 'id=4';
xhttp.send(data);