<html>
<head>
    <meta charset="utf-8" />
    <title>demo</title>
<script type="text/javascript">
function enableTooltips(id) {
    var links,i,h;
    if (!document.getElementById || !document.getElementsByTagName) return;
    h = document.createElement("span");
    h.id = "btc";
    h.setAttribute("id", "btc");
    h.style.position = "absolute";
    document.getElementsByTagName("body")[0].appendChild(h);
    if (id == null) links = document.getElementsByTagName("a");
    else links = document.getElementById(id).getElementsByTagName("a");
    for (i = 0; i < links.length; i++) {
        Prepare(links[i]);
    }
}
function Prepare(el) {
    var tooltip,t,b,s,l;
    t = el.getAttribute("message");
    if (t == null || t.length == 0) return;
    el.removeAttribute("message");
    tooltip = CreateEl("span", "tooltip");
    s = CreateEl("span", "top");
    s.innerHTML = t;
    tooltip.appendChild(s);
    b = CreateEl("b", "bottom");
    l = el.getAttribute("href");
    if (l.length > 30) l = l.substr(0, 27) + "...";
    b.innerHTML = l;
    tooltip.appendChild(b);
    setOpacity(tooltip);
    el.tooltip = tooltip;
    el.onmouseover = showTooltip;
    el.onmouseout = hideTooltip;
    el.onmousemove = Locate;
}
function showTooltip(e) {
    document.getElementById("btc").appendChild(this.tooltip);
    Locate(e);
}
function hideTooltip(e) {
    var d = document.getElementById("btc");
    if (d.childNodes.length > 0) d.removeChild(d.firstChild);
}
function setOpacity(el) {
    el.style.filter = "alpha(opacity:95)";
    el.style.KHTMLOpacity = "0.95";
    el.style.MozOpacity = "0.95";
    el.style.opacity = "0.95";
}
function CreateEl(t, c) {
    var x = document.createElement(t);
    x.className = c;
    x.style.display = "block";
    return (x);
}
function Locate(e) {
    var posx = 0,
    posy = 0;
    if (e == null) e = window.event;
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
</script>
<script type="text/javascript">
window.onload=function(){enableTooltips()};
</script>
<style type="text/css">
.tooltip{
    width:275px;
    height:65px;
    color:#000;
    font:lighter 11px/1.3 Arial,sans-serif;
    text-decoration:none;
    text-align:center
}
.tooltip{
    width:265px;
    height:65px;
    color:#000;
    font:lighter 11px/1.3 Arial,sans-serif;
    text-decoration:none;
    text-align:center
}
.tooltip span.top{
    padding:30px 8px 0;
    background:url(bt.png) no-repeat top
}
.tooltip b.bottom{
    padding:0px 0px 0px;
    color:#548912;
    background:url(bt.png) no-repeat bottom
}
</style>
</head>
<body>
  <div class="page_right_today">
      <img style="margin-left:1px;" src="images/xiaoyou_top.jpg" width="726" height="195" />
      <div class="content_today">      
        <div class="today_left xiaoyou_d">
        <span><img src="images/nine_club.jpg" /></span>
<a  href="#">sdsdfsdf</a><a>sdfsdfs</a><a>sdfsdfsdf</a><a>sdfsdfsdf</a><a>sdfsdfsdf</a><a>sdfsdf</a><a>sdfsdf</a><a>sdfsdf</a>
 
<br /><br /><br />
<a href="#" message="<b style='font-weight:bold;'>这年头</b><br>，和尚庙的香火越烧越旺，求保佑、求发财、求治病,乃至求升官和求升学的人一窝蜂涌进庙门,简直要把门槛踏烂.不过这些见菩萨就烧香磕头的信徒中,到底知道佛门是怎么回事的，恐怕不多。今天，在下也来道个究竟。">狼跋其胡，载踬其尾。公孙硕肤，赤舄几几。</a><br /><br /><br />
<a href="#"
message="于是，就到郊外的一棵菩提树下专心致志苦思冥想起来，连树上的孔雀在他头上拉屎，也全然不觉，乃至头上积满了孔雀屎，至于虱子跳蚤恐怕也爬了不少。细心的人如果注意到佛头上许多螺旋小圆锥，切勿以为是哪位美发师的杰作，佛经上说乃孔雀屎也。 " >诗三百，一言以蔽之，思无邪。这是孔老头子说的。</a><br /><br /><br />
<a href="#" message="咱们凡夫俗子听了定会害怕，人在荒野迷路，活不了几天，脱离社会出家，不是找死吗？这可给你说对了，释迦牟尼找到彻底解脱的办法就是一个死字，但佛经里不叫死，叫灭、灭度、寂灭、圆寂、不生、无为、解脱、涅槃等等共计70多种，各有等级，真是无上妙法！">溱与洧，浏其清矣。士与女，殷其盈兮。女曰观乎，士曰既且，且往观乎。</a>
 
<p style="text-align:center;"><a href="http://www.cool80.com">酷站(Cool80.Com)收集整理</a></p>
 </div>
        <div class="today_right xiaoyou_d">
        <span><img src="images/xuexue.jpg" /></span>
        <div class="xue_title"><img src="images/xue_title.jpg" /></div>
        <div class="xue_content">
            在文泰，大家以同学相称，相互努力相互扶持，为共同的目标在奋斗；在企业，文泰的同学扮演着各行业的精英人才，掌握着各类专业知识。三人行必有我师，文泰•学学讲堂，为大家提供一个教学相长的舞台。“学学”理念出自《礼记》，：“虽有嘉肴，弗食，不知其旨也；虽有至道，弗学，不知其善也。是故学然后知不足，教然后知困；知不足，然后能自反也知困，然后能自强也。故曰，教学相长也，兑命曰，学学半，其此之谓乎”。意思是是教人和学习各占学问的一半，我们希望在文泰•学学讲堂中，你会是这间教室的老师，下次也会是其他教室的学生。
        </div>
</body>
</html>