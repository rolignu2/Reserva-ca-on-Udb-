


function GetRequest(obj ,  obj2 , script )
{
	
	var data = obj2;

	if(obj == "" || obj == null)
	{
		document.getElementById(data).innerHTML = "";
		return;
	}
	
	if(window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
	}
	else
	{
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
    		{
    		   document.getElementById(data).innerHTML=xmlhttp.responseText;
    		}
	}
	
	xmlhttp.open("GET", script + obj ,true);
	xmlhttp.send();
	
}







