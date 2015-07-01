function refreshDivs(divid,url)
{
    

// define our vars
var divid,url;

// Chequeamos que las variables no esten vacias..
if(divid == ""){ alert('Error: escribe el id del div que quieres refrescar'); return;}
else if(!document.getElementById(divid)){ alert('Error: el Div ID selectionado no esta definido: '+divid); return;}
else if(url == ""){ alert('Error: la URL del documento que quieres cargar en el div no puede estar vacia.'); return;}

// The XMLHttpRequest object

var xmlHttp;
try{
xmlHttp=new XMLHttpRequest(); // Firefox, Opera 8.0+, Safari
}
catch (e){
try{
xmlHttp=new ActiveXObject("Msxml2.XMLHTTP"); // Internet Explorer
}
catch (e){
try{
xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
}
catch (e){
alert("Tu explorador no soporta AJAX.");
return false;
}
}
}

var nocacheurl = url;
// the ajax call
xmlHttp.onreadystatechange=function(){
if(xmlHttp.readyState == 4 && xmlHttp.status == 200){
document.getElementById(divid).innerHTML=xmlHttp.responseText;
}
}
xmlHttp.open("GET",nocacheurl,true);
xmlHttp.send(null);
}

