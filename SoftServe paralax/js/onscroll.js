
window.onload = function()
{
//adding the event listerner for Mozilla
if(window.addEventListener) document.addEventListener('DOMMouseScroll', moveObject, false);
//for IE/OPERA etc
document.onmousewheel = moveObject;
}
function moveObject(event)
{
var delta = 0;
if (!event) event = window.event;
// normalize the delta
if (event.wheelDelta)
{
// IE & Opera
delta = event.wheelDelta / 120;
}
else if (event.detail) // W3C
{
delta = -event.detail / 3;
}
var dogPos=document.getElementById('dog').offsetLeft;
var girlsPos=document.getElementById('girls').offsetLeft; //girls not moving, lazy bastards
var groundPos=document.getElementById('ground').offsetLeft;
var grandfaPos=document.getElementById('grandfa').offsetLeft;
var bigtreePos=document.getElementById('big_tree').offsetLeft;
var treeshopboyPos=document.getElementById('tree_shop_boy').offsetLeft;
var boysPos=document.getElementById('boys').offsetLeft;
var backplPos=document.getElementById('backplan').offsetLeft;
//calculating the next position of the object
dogPos=parseInt(dogPos)+(delta*100)*1.9/8;
girlsPos=parseInt(girlsPos)+delta*100/8;
groundPos=parseInt(groundPos)+(delta*100)/(8*1.05);
grandfaPos=parseInt(grandfaPos)+(delta*100)/(8*1.05);
bigtreePos=parseInt(bigtreePos)+(delta*100)/(8*2.35);
treeshopboyPos=parseInt(treeshopboyPos)+(delta*100)/(8*2.7);
boysPos=parseInt(boysPos)+(delta*100)/(8*3.5);
backplPos=parseInt(backplPos)+(delta*100)/(8*8.3);

//moving the position of the object
// var posStyleRightX1 = (960 + currPos);
// 	var posStyleLeftX1 = (960 - currPos)
	
	document.getElementById('dog').style.left = dogPos + "px ";
	document.getElementById('girls').style.left = girlsPos + "px ";
	document.getElementById('ground').style.left = groundPos + "px ";
	document.getElementById('grandfa').style.left = grandfaPos + "px ";
	document.getElementById('big_tree').style.left = bigtreePos + "px ";
	document.getElementById('tree_shop_boy').style.left = treeshopboyPos + "px ";
	document.getElementById('boys').style.left = boysPos + "px ";
	document.getElementById('backplan').style.left = backplPos + "px ";
	//document.getElementById('dog').style.MozTransform = 'rotate(-'+posStyleRightX1+'deg)';
}