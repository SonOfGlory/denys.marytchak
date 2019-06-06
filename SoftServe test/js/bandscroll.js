window.onload = function()
{
    var x = 0;
    var band = document.getElementById("band_container");                   /*getting band*/
    if (!!band) {
        if (band.addEventListener) {
            if ('onwheel' in document) {
                band.addEventListener("wheel", move, false);                /*IE9+, FF17*/
            } else if ('onmousewheel' in document) {
                band.addEventListener("mousewheel", move, false);
            } else {
                band.addEventListener("MozMousePixelScroll", move, false);  /*FF17 - FF3.5*/
            }
        } else {
            band.attachEvent("onmousewheel", move);                         /*Less than IE9*/
        }

        band.onmousewheel = move;
    }
    function move(event) {
        event = event || window.event;
        var targ = event.target || event.srcElement;
        if (!(document.querySelector && !document.addEventListener)) {
            event.preventDefault();                                         /*Scroll prevention,*/
        }                                                                   /*while cursor is on band*/
        if (targ.id == "band") {
            var delta = event.deltaY || event.detail || event.wheelDelta;   /*wheelDelta does not return pixel quantity*/
            targ.style.background = "url('images/stripe.png')" + x + "px 0px";
            var useragent = navigator.userAgent;
            if (useragent.indexOf('Firefox') != -1)                         /*Cross-browser movement*/
            {
                x = x + delta * 10;
            }
            else {
                x = x + delta / 5;
            }

        }
    }
    enableTooltips();    
}

 function enableTooltips() {                                                 /*Check-up if DOM is supported*/
    var links, span;
    if (!document.getElementById || !document.getElementsByTagName)
        return;
    AddCss();
    span = document.createElement("span");
    span.id = "btc";
    span.setAttribute("id", "btc");
    span.style.position = "absolute";
    document.getElementsByTagName("body")[0].appendChild(span);
    links = document.getElementById("band_container");
    Prepare(links);
}

function Prepare(el) {                                                      /*Fits the text to tooltip */
    var tooltip, elbottom, eltop, textmsg;
    tooltip = CreateEl("span", "tooltip");
    eltop = CreateEl("span", "top");
    tooltip.appendChild(eltop);
    elbottom = CreateEl("b", "bottom");
    if (el) {
        textmsg = el.getAttribute("tooltiptxt");
        if (textmsg.length > 30)
            textmsg = textmsg.substr(0, 27) + "...";
        elbottom.appendChild(document.createTextNode(textmsg));
        tooltip.appendChild(elbottom);
        setOpacity(tooltip);
        el.tooltip = tooltip;
        el.onmouseover = showTooltip;
        el.onmouseout = hideTooltip;
        el.onmousemove = Locate;
    }
}

function showTooltip(e) {
    document.getElementById("btc").appendChild(this.tooltip);
    Locate(e);
}

function hideTooltip(e) {
    var d = document.getElementById("btc");
    if (d.childNodes.length > 0)
        d.removeChild(d.firstChild);
}

function setOpacity(el) {
    el.style.filter = "alpha(opacity:90)";
    el.style.KHTMLOpacity = "0.90";
    el.style.MozOpacity = "0.90";
    el.style.opacity = "0.90";
}

function CreateEl(t, c) {
    var x = document.createElement(t);
    x.className = c;
    x.style.display = "block";
    return(x);
}

function AddCss() {
    var link = CreateEl("link");
    link.setAttribute("type", "text/css");
    link.setAttribute("rel", "stylesheet");
    link.setAttribute("href", "css/tooltip.css");
    link.setAttribute("media", "screen");
    document.getElementsByTagName("head")[0].appendChild(link);
}

function Locate(e) {
    var posx = 0, posy = 0;
    if (e == null)
        e = window.event;
    if (e.pageX || e.pageY) {
        posx = e.pageX;
        posy = e.pageY;
    }
    else if (e.clientX || e.clientY) {
        if (document.documentElement.scrollTop) {
            posx = e.clientX + document.documentElement.scrollLeft;
            posy = e.clientY + document.documentElement.scrollTop;
        }
        else {
            posx = e.clientX + document.body.scrollLeft;
            posy = e.clientY + document.body.scrollTop;
        }
    }
    document.getElementById("btc").style.top = (posy + 10) + "px";
    document.getElementById("btc").style.left = (posx - 20) + "px";
}


