var g_aths_current=0
var g_aths_clipbottom=1

function g_aths_changecontent(){
msgheight=g_aths_clipbottom=crosstick.offsetHeight
crosstick.style.clip="rect("+msgheight+"px auto auto 0px)"
crosstickbg.innerHTML=g_aths_contents[g_aths_current]
crosstick.innerHTML=g_aths_contents[g_aths_current]
g_aths_highlightmsg()
}

function g_aths_highlightmsg(){
//var msgheight=crosstick.offsetHeight
if (g_aths_clipbottom>0){
g_aths_clipbottom-=g_aths_speed
crosstick.style.clip="rect("+g_aths_clipbottom+"px auto auto 0px)"
beginclip=setTimeout("g_aths_highlightmsg()",20)
}
else{
g_aths_clipbottom=msgheight
clearTimeout(beginclip)
if (g_aths_current==g_aths_contents.length-1) g_aths_current=0
else g_aths_current++
setTimeout("g_aths_changecontent()",g_aths_delay)
}
}

function g_aths_startcontent(){
crosstickbg=document.getElementById? document.getElementById("g_aths_bg") : document.all.g_aths_bg
crosstick=document.getElementById? document.getElementById("g_aths_highlighter") : document.all.g_aths_highlighter
crosstickParent=crosstick.parentNode? crosstick.parentNode : crosstick.parentElement
if (parseInt(crosstick.offsetHeight)>0)
crosstickParent.style.height=crosstick.offsetHeight+'px'
else
setTimeout("crosstickParent.style.height=crosstick.offsetHeight+'px'",100) //delay for Mozilla's sake
g_aths_changecontent()
}