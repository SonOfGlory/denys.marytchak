window.onmousemove = function(e) {


	var x=e.pageX;
	var y=e.pageY;
        
	move(x,y);
	return true;
}


function move(x,y) {

	var posStyleRightX1 = (960 + x);
	var posStyleLeftX1 = (960 - x)
	document.getElementById('dog').style.left = 280 + (posStyleLeftX1*1.9)/8 + "px ";
	document.getElementById('girls').style.left = 1140 + posStyleLeftX1/8 + "px ";
	document.getElementById('ground').style.left = posStyleLeftX1/(8*1.05) + "px ";
	document.getElementById('grandfa').style.left = 390 + posStyleLeftX1/(8*1.05) + "px ";
	document.getElementById('big_tree').style.left = 234 + posStyleLeftX1/(8*2.35) + "px ";
	document.getElementById('tree_shop_boy').style.left = posStyleLeftX1/(8*2.7) + "px ";
	document.getElementById('boys').style.left = 785 + posStyleLeftX1/(8*3.5) + "px ";
	document.getElementById('backplan').style.left = 148 + posStyleLeftX1/(8*8.3) + "px ";
	//document.getElementById('dog').style.MozTransform = 'rotate(-'+posStyleRightX1+'deg)';
	//document.getElementById('girls').style.MozTransform = 'rotate(-'+posStyleRightX1+'deg)';
}

