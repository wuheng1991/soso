// JavaScript Document
function setTab(name,cursel,n){ 
for(i=1;i<=n;i++){ 
var menu=document.getElementById(name+i); 
var con=document.getElementById("con_"+name+"_"+i); 
menu.className=i==cursel?"hover":""; 
con.style.display=i==cursel?"block":"none"; 
} 
}


var Browser = new Object();

Browser.ua = window.navigator.userAgent.toLowerCase();
Browser.ie = /msie/.test(Browser.ua);
Browser.moz = /gecko/.test(Browser.ua);

var Position = {
	getElementLeft : function(o)

	{
		(typeof o == "string") ? o = document.getElementById(o) : "";
		var L = 0;
		while (o)
		{
			L += o.offsetLeft || 0;
			o = o.offsetParent;
		}
		return L;
	},
	getElementTop : function(o)
	{
		(typeof o == "string") ? o = document.getElementById(o) : "";
		var T = 0;
		while (o)
		{
			T += o.offsetTop || 0;
			o = o.offsetParent;
		}
		return T;
	}
};
function showTipsInfo(sID)
{
	document.getElementById("div"+sID).style.display = "block";
	if(sID != "6")
	{
	    document.getElementById("div"+sID).style.left = Position.getElementLeft('abrand'+sID) + 2+"px";
	}
	else
	{
	    document.getElementById("div"+sID).style.left = Position.getElementLeft('abrand'+sID)  - 155+ "px";
	}
	if(Browser.moz)
	{
	    document.getElementById("div"+sID).style.top = Position.getElementTop('abrand'+sID)  + 9 + "px";
	}
	else
	{
	    document.getElementById("div"+sID).style.top = Position.getElementTop('abrand'+sID)  + 37 + "px";
	}
}

function hideTipsInfo(sID)
{
	document.getElementById("div"+sID).style.display = "none";
}