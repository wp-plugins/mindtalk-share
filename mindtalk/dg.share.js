var elemList = document.getElementsByTagName('dg:share');
var base_url = 'http://mindtalk.com';
var elemCount = elemList.length;
for (var elemIt = 0; elemIt < elemCount; elemIt++) {
    var el = elemList[elemIt];
    el.onclick = function(){
        var share_url = this.getAttribute('url') || window.location.href;
        var share_text = this.getAttribute('message');
        var loc = base_url + "/mind?u=" + encodeURIComponent(share_url);
        if (share_text) {
            loc = loc + '&desc=' + encodeURIComponent(share_text);
        }
        var width = 626;
        var height = 436;
        var centeredY, centeredX;
        centeredY = (screen.height - height)/2;
        centeredX = (screen.width - width)/2;
        var windowParams =  'height=' + height +
            ',width=' + width +
            ',toolbar=0' +
            ',scrollbars=0' +
            ',status=0' +
            ',resizable=0' +
            ',location=' + loc +
            ',menuBar=0' +
            ',left=' + centeredX +
            ',top=' + centeredY;
        window.open(loc, "Digaku Share", windowParams).focus();
        return false;
    };
    var base_style = 'display:inline-block;' +
        'padding:4px 10px;' +
        'margin-bottom:0;' +
        'font-size:14px;' +
        'line-height:18px;' +
        'color:#FFF;' +
        'text-align:center;' +
        'text-shadow:0 1px 1px rgba(255,255,255,0.75);' +
        'vertical-align:middle;' +
        'background-image:-ms-linear-gradient(top,#ffffff,#e6e6e6);' +
        'background-image:-o-linear-gradient(top,#ffffff,#e6e6e6);' +
        'text-shadow:0 -1px 0 rgba(0,0,0,0.25);' +
        'border:1px solid #ccc;' +
        '-moz-border-radius:4px;' +
        '-webkit-border-radius:4px;' +
        '-o-border-radius:4px;' +
        '-khtml-border-radius:4px;' +
        'border-radius:4px;' +
        'border-top-left-radius:4px;' +
        'border-top-right-radius:4px;' +
        'border-bottom-right-radius:4px;' +
        'border-bottom-left-radius:4px;' +
        '-webkit-box-shadow:inset 0 1px 0 rgba(255,255,255,0.2),0 1px 2px rgba(0,0,0,0.05);' +
        '-moz-box-shadow:inset 0 1px 0 rgba(255,255,255,0.2),0 1px 2px rgba(0,0,0,0.05);' +
        'box-shadow:inset 0 1px 0 rgba(255,255,255,0.2),0 1px 2px rgba(0,0,0,0.05);' +
        'cursor:pointer;' +
        'filter:progid:DXImageTransform.Microsoft.gradient(enabled=false);' +
        'filter:progid:DXImageTransform.Microsoft.gradient(enabled=false);' +
        'margin-left:.3em;' +

        'background-color:#8ecd34;' +
        'background-repeat:repeat-x;' +
        'background-image:-khtml-gradient(linear,left top,left bottom,from(#b3dd4d),to(#8ecd34));' +
        'background-image:-moz-linear-gradient(top,#b3dd4d,#8ecd34);background-image:-ms-linear-gradient(top,#b3dd4d,#8ecd34);' +
        'background-image:-webkit-gradient(linear,left top,left bottom,color-stop(0%,#b3dd4d),color-stop(100%,#8ecd34));' +
        'background-image:-webkit-linear-gradient(top,#b3dd4d,#8ecd34);background-image:-o-linear-gradient(top,#b3dd4d,#8ecd34);' +
        'background-image:linear-gradient(top,#b3dd4d,#8ecd34);' +
        'filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=\'#b3dd4d\',endColorstr=\'#8ecd34\',GradientType=0);text-shadow:0 -1px 0 rgba(0,0,0,0.25);' +
        'border-color:#8ecd34 #8ecd34 #649124;' +
        'border-color:rgba(0,0,0,0.1) rgba(0,0,0,0.1) rgba(0,0,0,0.25);' +
        'filter:progid:DXImageTransform.Microsoft.gradient(enabled=false);' +
        'filter:progid:DXImageTransform.Microsoft.gradient(enabled=false);';
    el.onmouseover = function(){
        this.setAttribute('style', base_style +
            'background-color:#8ecd34;' +
            'background-color:#FFF;' +
            'color:#FFF;');
    };
    el.onmouseout = function(){
        this.setAttribute('style', base_style);
    };
    el.onmouseout();
}