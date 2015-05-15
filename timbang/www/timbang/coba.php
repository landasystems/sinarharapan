<?xml version="1.0" encoding="UTF-8" ?>
<!DOCTYPE html>
<html b:version='2' expr:dir='data:blog.languageDirection' xmlns='http://www.w3.org/1999/xhtml' xmlns:b='http://www.google.com/2005/gml/b' xmlns:data='http://www.google.com/2005/gml/data' xmlns:expr='http://www.google.com/2005/gml/expr'>
    <head>
        <meta content='width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1' name='viewport'/>
        <meta content='text/html;charset=UTF-8' http-equiv='Content-Type'/>
        <meta content='IE=edge,chrome=1' http-equiv='X-UA-Compatible'/>
        <b:include data='blog' name='all-head-content'/>
        <!-- SEO Meta Tag -->
        <b:if cond='data:blog.homepageUrl == data:blog.url'>
            <meta expr:content='data:blog.title' name='keywords'/>
        </b:if>

        <b:if cond='data:blog.pageType == &quot;item&quot;'>
            <meta expr:content='data:blog.pageName' name='keywords'/>
        </b:if>
        <b:if cond='data:blog.pageType == &quot;index&quot;'>
            <b:if cond='data:blog.searchLabel'>
                <meta content='noindex,nofollow' name='robots'/>
            </b:if>
        </b:if>
        <b:if cond='data:blog.pageType == &quot;archive&quot;'>
            <meta content='noindex,nofollow' name='robots'/>
        </b:if>
        <b:if cond='data:blog.isMobile'>
            <meta content='noindex,nofollow' name='robots'/>
        </b:if>
        <!-- SEO Title Tag -->
        <b:if cond='data:blog.url == data:blog.homepageUrl'>
            <title>
                <data:blog.title/>
            </title>
        </b:if>
        <b:if cond='data:blog.pageType == &quot;item&quot;'>
            <title>
                <data:blog.pageName/>
                | 
                <data:blog.title/>
            </title>
        </b:if>
        <b:if cond='data:blog.pageType == &quot;archive&quot;'>
            <title>
                Archive for 
                <data:blog.pageName/>
            </title>
        </b:if>
        <b:if cond='data:blog.pageType == &quot;static_page&quot;'>
            <title>
                <data:blog.pageName/>
            </title>
        </b:if>
        <b:if cond='data:blog.pageType == &quot;index&quot;'>
            <b:if cond='data:blog.searchLabel'>
                <title>
                    <data:blog.title/>
                    - 
                    <data:blog.pageName/>
                </title>
            </b:if>
        </b:if>
        <b:if cond='data:blog.pageType == &quot;error_page&quot;'>
            <title>
                Page Not Found
            </title>
        </b:if>
        <b:if cond='data:blog.pageType == &quot;index&quot;'>
            <b:if cond='data:blog.url != data:blog.homepageUrl'>
                <title>
                    <data:blog.pageTitle/>
                    - All Post
                </title>
            </b:if>
        </b:if>
  
        <script src='http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js'/>
    &lt;style type=&quot;text/css&quot;&gt;&lt;!-- /* 

        <b:skin><![CDATA[
            
/* tab kanan */
#dte_recent-post, #random-posts {
  font:normal normal 11px/normal Helmet,Freesans,Sans-Serif;
  color:#333;
  margin:0 auto;
  padding:0;
  min-height:100px;
  }

#dte_recent-post li, #random-posts li {
  list-style:none;
  margin:0;
  padding:7px;
  border-bottom:1px solid #ddd;
}

#dte_recent-post li a img, #random-posts li a img{
  float:left;
  margin:0 10px 0 0;
  padding:0;
  border:none;
  background:none;
  outline:none;
}

#dte_recent-post li a.title, #random-posts li a.title{
  display: block;
font-size: 13px;
text-decoration: none;
color: #FFB200;
}

#dte_recent-post li a.title:hover, #random-posts li a.title:hover{
  font-size:bold;
}


            
/*custom*/
#button-count-share {
    width: 100%;
    overflow: hidden;
    background: transparent;
    margin: 0 auto;
    padding: 3px;
}
#button-count-share span {
    float: left;
    position: relative;
    font-size: 13px;
    color: #fff;
    margin: 0px 2px;
}

.ikons {
    display: block;
    float: left;
    position: relative;
    z-index: 3;
    height: 100%;
    vertical-align: top;
    width: 38px;
    text-align: center;
}
.ikons i {
    color: #fff;
    line-height: 33px;
}
.slide-share {
    z-index: 2;
    display: block;
    height: 100%;
    left: 38px;
    position: absolute;
    width: 108px;
    margin: 0;
}
.slide-share p {
    font-family: Verdana;
    font-weight: 400;
    border-left: 1px solid rgba(255,255,255,0.35);
    color: #fff;
    font-size: 14px;
    left: 0;
    position: absolute;
    text-align: center;
    top: 10px;
    width: 100%;
    margin: 0;
}
.button-share .slide-share {
    transition: all 0.4s ease-in-out;
}
.facebook .fb_iframe_widget {
    display: block;
    position: absolute;
    right: 5px;
    top: 0;
    z-index: 1;
}
.twitter iframe {
    left: 50px;
    top: 10px;
    z-index: 1;
    display: block;
    position: absolute;
}
.google #___plusone_0 {
    width: 90px!important;
    top: 10px;
    right: 5px;
    position: absolute;
    display: block;
    z-index: 1;
}
.facebook .ikons,.facebook .slide-share {
    background: #4f79bc;
}
.twitter .ikons,.twitter .slide-share {
    background: #63cef2;
}
.google .ikons,.google .slide-share {
    background: #f36261;
}
.facebook:hover .slide-share,.twitter:hover .slide-share,.google:hover .slide-share {
    
    opacity: 0.6;
}

html,body,div,span,applet,object,iframe,h1,h2,h3,h4,h5,h6,p,blockquote,pre,a,abbr,acronym,address,big,cite,code,del,dfn,em,img,ins,kbd,q,s,samp,small,strike,strong,sub,sup,tt,var,b,u,i,center,dl,dt,dd,ol,ul,li,fieldset,form,label,legend,table,caption,tbody,tfoot,thead,tr,th,td,article,aside,canvas,details,embed,figure,figcaption,footer,header,hgroup,menu,nav,output,ruby,section,summary,time,mark,audio,video{margin:0;padding:0;border:0;font-size:100%;font:inherit;vertical-align:baseline;}
/* HTML5 display-role reset for older browsers */
article,aside,details,figcaption,figure,footer,header,hgroup,menu,nav,section{display:block;}body{line-height:1;display:block;}*{margin:0;padding:0;}html{display:block;}ol,ul{list-style:none;}blockquote,q{quotes:none;}blockquote:before,blockquote:after,q:before,q:after{content:&#39;&#39;;content:none;}table{border-collapse:collapse;border-spacing:0;}


/* FRAMEWORK */
/* Message Box */

.navbar,.post-feeds,.feed-links{display:none;
}
.section,.widget{margin:0 0 0 0;padding:0 0 0 0;
}
strong,b{font-weight:bold;
}
cite,em,i{font-style:italic;
}
a:link{color:#383838;text-decoration:none;outline:none;transition:all 0.25s;-moz-transition:all 0.25s;-webkit-transition:all 0.25s;
}
a:visited{color:#333333;text-decoration:none;
}
a:hover{color:#FFB200;text-decoration:none;
}
a img{border:none;border-width:0;outline:none;
}
abbr,acronym{
}
sup,sub{vertical-align:baseline;position:relative;top:-.4em;font-size:86%;
}
sub{top:.4em;}small{font-size:86%;
}
kbd{font-size:80%;border:1px solid #999;padding:2px 5px;border-bottom-width:2px;border-radius:3px;
}
mark{background-color:#ffce00;color:black;
}
p,blockquote,pre,table,figure,hr,form,ol,dl{margin:1.5em 0;
}
hr{height:1px;border:none;background-color:#666;
}

/* heading */
h1,h2,h3,h4,h5,h6{font-weight:bold;line-height:normal;margin:0 0 0.6em;
}
h1{font-size:200%
}
h2{font-size:180%
}
h3{font-size:160%
}
h4{font-size:140%
}
h5{font-size:120%
}
h6{font-size:100%
}
/* list */

ol{list-style:decimal outside
}
ul{list-style:disc outside
}

dt{font-weight:bold
}
dd{margin:0 0 .5em 2em
}
/* form */
input,button,select,textarea{font:inherit;font-size:100%;line-height:normal;vertical-align:baseline;
}
textarea{display:block;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;
}
/* code blockquote */
pre,code{font-family:&quot;Courier New&quot;,Courier,Monospace;color:inherit;
}
pre{white-space:pre;word-wrap:normal;overflow:auto;
}
.post-body blockquote {
background: url(https://lh6.googleusercontent.com/-6UyQr7E0nTU/UVRWwhvPScI/AAAAAAAAFUU/15cIvW74xwg/s50/quote.png) no-repeat scroll left 18px transparent;
font-family: Monaco,Georgia,&quot;
font-size: 100%;
font-style: italic;
line-height: 22px;
margin: 20px 0 30px 20px;
min-height: 60px;
padding: 0 0 0 60px;
}
/* table */
.post-body table[border=&quot;1&quot;] th, .post-body table[border=&quot;1&quot;] td, .post-body table[border=&quot;1&quot;] caption{border:1px solid;padding:.2em .5em;text-align:left;vertical-align:top;
}
.post-body table.tr-caption-container {border:1px solid #e5e5e5;
}
.post-body th{font-weight:bold;
}
.post-body table[border=&quot;1&quot;] caption{border:none;font-style:italic;
}
.post-body table{
}
.post-body td, .post-body th{vertical-align:top;text-align:left;font-size:13px;padding:3px 5px;border:1px solid #e5e5e5;
}
.post-body th{background:#f0f0f0;
}
.post-body table.tr-caption-container td {border:none;padding:8px;
}
.post-body table.tr-caption-container, .post-body table.tr-caption-container img, .post-body img {max-width:100%;height:auto;
}
.post-body td.tr-caption {color:#666;font-size:80%;padding:0px 8px 8px !important;
}
img {
max-width:100%;
height:auto;
border:0;
}
table {
max-width:100%;
}


.clear {
clear:both;
}
.clear:after {
visibility:hidden;
display:block;
font-size:0;
content:" ";
clear:both;
height:0;
}


body#layout #mywrapper {
width: 65%;
}
body#layout #post-wrapper {
width: 60%;
float: left;
}
body#layout #sidebar-narrow {
width: 20%;
}
body#layout div#main {
width: 100%;
}

body#layout #outer-wrapper {
margin: 60px auto 0;
}

body {
background: url(http://subtlepatterns.com/patterns/restaurant_icons.png) ;
margin: 0 0 0 0;
padding: 0 0 0 0;
color: #333333;
font: normal normal 13px Arial, sans-serif;
text-align: left;


background-repeat: repeat-center;
background-attachment: fixed;
background-position: center top;
}
/* outer-wrapper */
#outer-wrapper {
background:#ffffff;
max-width:1220px;
margin:0px auto 0;
box-shadow: 0px 0px 5px rgba(80, 80, 80, 0.1);
overflow:hidden;
}
/* NAVIGATION MENU */
.top-menu {
font: normal normal 12px Arial, sans-serif;
margin: 0 auto;
height: 43px;
background: #3A3A3A;
overflow: hidden;
padding: 0 28px;
border-bottom: 3px solid #FFB200;
}
.top-menu1 {
font:normal normal 12px Arial, sans-serif;
margin:0 auto;
height:43px;
overflow:hidden;
padding: 11px 0px 0;
}
.menubar {
list-style-type:none;
margin:0 0 0 0;
padding:0 0 0 0;
}
.menubar li {
display:block;
float:left;
line-height:38px;
margin:0 0 0 0;
padding:0 0 0 0;
border-right:1px solid #424242;
}
.menubar li a {
background: #3A3A3A;
color: #E0E0E0;
display: block;
padding: 0 12px;
}
.menubar li a:hover {
background:#FFB200;
}
ul.socialbar {
height:38px;
margin:0 0 0 0;
padding:0 0;
float:right;
}
ul.socialbar li {
display:inline-block;
list-style-type:none;
float:right;
margin:0 0;
padding:0 0;
border-right:none;
}

/* HEADER WRAPPER */
#header-wrapper {
margin:0 auto;
overflow:hidden;
padding: 0 30px;
min-height: 150px;
background: no-repeat scroll center top transparent;
}
.header {
float:left;
width:25.7%;
max-width:400px;

margin: 28px 0 -5PX;
}
.header h1.title,.header p.title {
font:normal bold 60px Fjalla One, Arial, Helvetica, sans-serif;
margin:0 0 0 0;
text-transform:uppercase;
}
.header .description {
color:#555555;
}
.header a {
color:#333333;
}
.header a:hover {
color:#999;
}
.header img {
display:block;
padding: 9px 0 39px;
margin-top: 16px;
}
.header-right {
float: right;
padding: 0;
overflow: hidden;
margin: 31px 0px 0 0;
width: 70%;
max-width: 728px;
max-height: 90px;
}
.header-right img {
display:block;
}



/*----navi-----*/


#nav {
font: normal bold 12px Arial, sans-serif;
text-transform: uppercase;
height: 59px;
line-height: 50px;
padding: 0 28px;
background: #F4F4F4;
border-top: 1px solid #E5E5E5;
border-bottom: 1px solid #E5E5E5;
}
#main-nav {
margin: 0 auto;
width: 1160px;
height: 60px;
background: #3A3A3A;
border-bottom: 3px solid #FFB200;
}
#main-nav .menu-alert{
float:left;
padding:18px 0 0 10px ;
font-style:italic;
color:#FFF;
}
#top-menu-mob , #main-menu-mob{ display:none; }
#main-nav ul li {
text-transform: uppercase;
font-family: 'Droid Sans', sans-serif;
font-size:16px;
position: relative;
display: inline-block;
float: left;

height:60px;
}

#main-nav ul li:last-child a{border-right:0 none;}
#main-nav ul li a {

display: inline-block;
height: 60px;
line-height: 60px;
padding: 0 16px;
text-decoration: none;
color: #fff;
font-family: Oswald,sans-serif;
text-transform: uppercase;
font-size: 15px;
cursor: pointer;
font-weight: 400;
line-height: 60px;
margin: 0;
padding: 0 .9em;
}


#main-nav ul li a.active {
background: #FFB200;

}
#main-nav ul li a .sub-indicator{}
#main-nav ul li a:hover {}
#main-nav ul ul{
display: none;
padding: 0;
position: absolute;
top: 60px;
width: 180px;
z-index: 99999;
float: left;
background: #3a3a3a;
}
#main-nav ul ul li, #main-nav ul ul li:first-child {
background: none !important;
z-index: 99999;
min-width: 180px;
border: 0 none;
font-size: 15px;
height: auto;
margin: 0;
}
#main-nav ul ul li:first-child ,#main-nav ul li.current-menu-item ul li:first-child,
#main-nav ul li.current-menu-parent ul li:first-child,#main-nav ul li.current-page-ancestor ul li:first-child { border-top:0 none !important;}
#main-nav ul ul ul ,#main-nav ul li.current-menu-item ul ul, #main-nav ul li.current-menu-parent ul ul, #main-nav ul li.current-page-ancestor ul ul{right: auto;left: 100%; top: 0 !important; z-index: 99999; }
#main-nav ul.sub-menu a ,
#main-nav ul ul li.current-menu-item a,
#main-nav ul ul li.current-menu-parent a,
#main-nav ul ul li.current-page-ancestor a{
border: 0 none;
background: none !important;
height: auto !important;
line-height: 1em;
padding: 10px 10px;
width: 160px;
display: block !important;
margin-right: 0 !important;
z-index: 99999;
color: #fff !important;
}
#main-nav ul li.current-menu-item ul a,
#main-nav ul li.current-menu-parent ul a,
#main-nav ul li.current-page-ancestor ul a{ color:#eee !important; text-shadow:0 1px 1px #222 !important;}
#main-nav ul li:hover > a, #main-nav ul :hover > a { background: #FFB200 ;}
#main-nav ul ul li:hover > a,
#main-nav ul ul :hover > a {background: #FFB200 !important; padding-left:15px !important;padding-right:5px !important;}
#main-nav ul li:hover > ul {display: block;}
#main-nav ul li.current-menu-item,
#main-nav ul li.current-menu-parent,
#main-nav ul li.current-page-ancestor{
margin-top:0;
height:50px;
border-left:0 none !important;
}
#main-nav ul li.current-menu-item ul.sub-menu a, #main-nav ul li.current-menu-item ul.sub-menu a:hover,
#main-nav ul li.current-menu-parent ul.sub-menu a, #main-nav ul li.current-menu-parent ul.sub-menu a:hover
#main-nav ul li.current-page-ancestor ul.sub-menu a, #main-nav ul li.current-page-ancestor ul.sub-menu a:hover{background: none !important;}
#main-nav ul li.current-menu-item a, #main-nav ul li.current-menu-item a:hover,
#main-nav ul li.current-menu-parent a, #main-nav ul li.current-menu-parent a:hover,
#main-nav ul li.current-page-ancestor a, #main-nav ul li.current-page-ancestor a:hover{
background:$(maincolor);
text-shadow:0 1px 1px #b43300;
color:#FFF;
height:50px;
line-height:50px;
border-left:0 none !important;
}
#main-nav ul.sub-menu li.current-menu-item,#main-nav ul.sub-menu li.current-menu-item a,
#main-nav li.current-menu-item ul.sub-menu a,#main-nav ul.sub-menu li.current-menu-parent,
#main-nav ul.sub-menu li.current-menu-parent a,#main-nav li.current-menu-parent ul.sub-menu a,
#main-nav ul.sub-menu li.current-page-ancestor,#main-nav ul.sub-menu li.current-page-ancestor a,
#main-nav li.current-page-ancestor ul.sub-menu a{height:auto !important; line-height: 12px;}
#main-nav ul li.menu-item-home ul li a,
#main-nav ul ul li.menu-item-home a,
#main-nav ul li.menu-item-home ul li a:hover{
background-color:transparent !important;
text-indent:0;
background-image:none !important;
height:auto !important;
width:auto;
}
#main-menu-mob,#top-menu-mob{
background: #222;
width: 710px;
padding: 5px;
border: 1px solid #000;
color:#DDD;
height: 27px;
margin:13px 0 0 10px;
}
#top-menu-mob{
width: 350px;
margin:2px 0 0 0;
}
#main-nav.fixed-nav{
position:fixed;
top:0;
left:0;
width:100% !important;
z-index:999;
opacity:0.9;
-webkit-box-shadow: 0 5px 3px rgba(0, 0, 0, .1);
-moz-box-shadow: 0 5px 3px rgba(0, 0, 0, .1);
box-shadow: 0 5px 3px rgba(0, 0, 0, .1);
}







/* CONTENT WRAPPER */
#content-wrapper {
background-color:transparent;
margin: 0 auto;
padding: 15px 30px 0;
word-wrap:break-word;

margin-top: 1px;
}
.largebanner {
background:#fff;
border-right:1px solid #e5e5e5;
border-bottom:1px solid #e5e5e5;
border-left:1px solid #e5e5e5;
}
.largebanner .widget {
padding:15px 14px;
overflow:hidden;
}
.largebanner img, .largebanner iframe{
display:block;
max-width:100%;
border:none;
overflow:hidden;
}
/* POST WRAPPER */
#post-wrapper {
background:transparent;
float:right;
width:640px;
max-width:640px;
margin:0 0 10px;
}
.post-container {
padding:15px 0px 0 0;
}
.breadcrumbs {font-size: 90%;
height: 16px;
margin-bottom: 10px;
margin-top: 1px;
overflow: hidden;
padding: 5px;
margin-left: -15px;
border-bottom: 1px solid #ECECEC;}
.breadcrumbs > span {padding: 10px 5px 10px 10px;}
.breadcrumbs > span:last-child {background: none repeat scroll 0 0 transparent;color: #808080;}
.breadcrumbs a {color: #333333;}
.post {
background:#ffffff;
margin:0 0 15px;
padding:15px 0;
border-bottom: 1px solid #E2E2E2;
}
.post-body {
line-height:1.6em;
}
h2.post-title, h1.post-title {
font:normal normal 20px Fjalla One, Helvetica, Arial, sans-serif;
}
h2.post-title a, h1.post-title a, h2.post-title, h1.post-title {
color:#383838;
}
h2.post-title a:hover, h1.post-title a:hover {
color:#0072C6;
}
.img-thumbnail {
background:#fbfbfb url(http://3.bp.blogspot.com/-ltyYh4ysBHI/U04MKlHc6pI/AAAAAAAADQo/PFxXaGZu9PQ/w200-h140-c/no-image.png) no-repeat center center;
position:relative;
float:left;
width:200px;
height:150px;
margin:0 15px 0 0;
}
.img-thumbnail img {
width:200px;
height:150px;
}
span.rollover {
}
span.rollover:before {
content:"";
position: absolute;
width:24px;
height:24px;
margin:-12px;
top:50%;
left:50%;
}
span.rollover:hover {
opacity: .7;
-o-transition:all 1s;
-moz-transition:all 1s;
-webkit-transition:all 1s;
}
.post-info {
background: transparent;
margin: 0 0 12px;
color: #666666;
font-size: 11px;
padding: 5px 0;
border-bottom: 1px dotted #dedede;
}
.post-info a {
display:inline-block;
color:#666666;
}
.author-info, .time-info, .comment-info, .label-info, .review-info {
margin-right:12px;
display:inline;
}
a.readmore {
display:inline-block;
margin:15px 0 0;
background-color:#ffffff;
border:1px solid #dddddd;
padding:0px 10px;
line-height:26px;
color:#333333;
font-size:11px;
font-weight:bold;
text-transform:uppercase;
}
a.readmore:hover  {
border:1px solid #aaaaaa;
}
/* Page Navigation */
.pagenavi {
clear:both;
margin:-5px 0 10px;
text-align:center;
font-size:11px;
font-weight:bold;
text-transform:uppercase;
}
.pagenavi span,.pagenavi a {
padding:6px 10px;
margin-right:3px;
display:inline-block;
color:$(readmore.color);
background-color:$(readmore.background.color);
border: 1px solid $(readmore.border.color);
}
.pagenavi .current, .pagenavi .pages, .pagenavi a:hover {
border: 1px solid $(readmore.hover.color);
}
.pagenavi .pages {
display:none;
}
/* SIDEBAR WRAPPER */
#sidebar-wrapper {
background:transparent;
float:right;
width:33%;
max-width:310px;
margin:0 auto;
border-left: 1px solid #eaeaea;
padding-left: 10px;
}
.sidebar-container {
padding:0px 0;
}
.sidebar h2, .panel h2 {
font:normal bold 12px Arial, sans-serif;
color:#333333;
margin:0 0 10px 0;
padding:5px 0;
text-transform:uppercase;
position:relative;
border-bottom: 2px solid #FFB200;
background: url('http://2.bp.blogspot.com/-5feHh8DpM_k/U88bANmcxnI/AAAAAAAAB40/69FQdxpYqb0/s1600/title_pat.png') repeat scroll 0% 0% transparent;
}
#sidebar1 h2 span,#sidebar h2 span{
border-bottom: 2px solid #FFB200;
bottom: -2px;
padding: 5px;
color: #FFFFFF;
background: #FFB200;
}

#sidebar-narrow h2 span,#sidebar-narrow h2 span{
border-bottom: 2px solid #FFB200;
bottom: -2px;
padding: 5px;
color: #FFFFFF;
background: #FFB200;
}


#bottombar h2 span {
border-bottom: 2px solid #FFB200;
bottom: -2px;
padding: 6px;
color: #fff;
}
#sidebar1 h2 span:after,#related-posts h2 span:after,#sidebar h2 span:after,#bottombar h2 span:after,#sidebar-narrow h2 span:after {
content: no-close-quote;
position: absolute;
width: 0px;
height: 0px;
bottom: -6px;
left: 22px;
border-left: 6px solid rgba(0, 0, 0, 0);
border-right: 6px solid rgba(0, 0, 0, 0);
border-top: 6px solid #FFB200;
}
.sidebar h2:after, .panel h2:after {
content: " ";
width:90px;
height: 0px;
position: absolute;
left: 0;
bottom: -2px;
}
.sidebar .widget {
margin:0 0 20px;

}
.sidebar ul, .sidebar ol {
list-style-type:none;
margin:0 0 0 0;
padding:0 0 0 0;
}
.sidebar li {
margin:5px 0;
padding:0 0 0 0;
}
/* Recent Post */
.recent-post-title {
margin: 0 0 15px;
padding: 0;
position: relative;
border-bottom: 2px solid #FFB200;
background: url('http://2.bp.blogspot.com/-5feHh8DpM_k/U88bANmcxnI/AAAAAAAAB40/69FQdxpYqb0/s1600/title_pat.png') repeat scroll 0% 0% transparent;
}
div.recent-post-title:after {
content: no-close-quote;
position: absolute;
width: 0px;
height: 0px;
bottom: -6px;
left: 22px;
border-left: 6px solid rgba(0, 0, 0, 0);
border-right: 6px solid rgba(0, 0, 0, 0);
border-top: 6px solid #FFB200;
}
.recent-post-title h2 {
font: normal bold 14px Arial, sans-serif;
height: 22px;
line-height: 22px;
margin: 0 0;
padding: 0 10px;
background: #FFB200;
color: #474747;
display: inline-block;
}
.recent-post-title h2 a {
color:#fff;
}
.stylebox {
float:left;
width:50%;
margin:0 0;
}
.stylebox .widget {
padding:0 15px 15px 0;
}
.stylebox .widget-content {
background:#ffffff;
}
.stylebox ul {
list-style-type:none;
margin:0 0 0 0;
padding:0 0 0 0;
}
.stylebox1 {
float:left;
width:100%;
margin:0 0;
}
.stylebox1 .widget {
padding:0 0px 15px 0;
}
.stylebox1 .widget-content {
background:#ffffff;
}
.stylebox1  ul {
list-style-type:none;
margin:0 0 0 0;
padding:0 0 0 0;
}
/* Recent Post */
ul.xpose_thumbs {
margin:0 0 0 0;
}
ul.xpose_thumbs li {
font-size:12px;
min-height:68px;
padding-bottom: 5px;
}
ul.xpose_thumbs .xpose_thumb {
position:relative;
background:#fbfbfb;
margin:3px 0 10px 0;
width:100%;
height:50px;
padding-bottom:46%;
overflow:hidden;
}
ul.xpose_thumbs .xpose_thumb img {
height:auto;
width:100%;
}
ul.xpose_thumbs1 {
margin:0 0 0 0;
width:48%;
float:left;
}
ul.xpose_thumbs1 li {
font-size:12px;
min-height:68px;

}
ul.xpose_thumbs1 .xpose_thumb {
position:relative;
background:#fbfbfb;
margin:0px 0 10px 0;
width:100%;
overflow:hidden;
}
ul.xpose_thumbs1 .xpose_thumb img {
height:320px;
width:100%;
}
ul.xpose_thumbs2 {
font-size:13px;
}
ul.xpose_thumbs2 li {
padding:0 0;
min-height:66px;
font-size:11px;
margin: 0 0 8px;
padding: 0 0 8px;
border-bottom:1px dotted #e5e5e5;
}
ul.xpose_thumbs2 .xpose_thumb2 {
background:#fbfbfb;
float:left;
margin:3px 8px 0 0;
height:70px;
width:70px;
}
ul.xpose_thumbs2 .xpose_thumb2 img {
height:70px;
width:70px;
}
span.xpose_title {
font:normal normal 16px Fjalla One, Helvetica, Arial, sans-serif;
display:block;
margin:0 0 5px;
line-height:1.4em;
}
span.xpose_title2 {
font-size:17px;
}
span.rp_summary {
display:block;
margin:6px 0 0;
color:#666666;
}
span.xpose_meta {
background:transparent;
display:block;
font-size:11px;
color:#aaa;
}
span.xpose_meta a {
color:#aaa !important;
display:inline-block;
}
span.xpose_meta_date, span.xpose_meta_comment, span.xpose_meta_more  {
display:inline-block;
margin-right:8px;
}
span.xpose_meta_date:before {
content: "\f133";
font-family: FontAwesome;
font-style: normal;
font-weight: normal;
text-decoration: inherit;
padding-right:4px;
}
span.xpose_meta_comment:before  {
content: "\f086";
font-family: FontAwesome;
font-style: normal;
font-weight: normal;
text-decoration: inherit;
padding-right:4px;
}
span.xpose_meta_more:before {
content: "\f0a9";
font-family: FontAwesome;
font-style: normal;
font-weight: normal;
text-decoration: inherit;
padding-right:4px;
}
ul.xpose_thumbs2 li a:hover, ul.xpose_thumbs li a:hover {
color:#FFB200;
}
ul.xpose_thumbs22 {
font-size:13px;
width:50%;
float:right;
}
ul.xpose_thumbs22 li {
padding:0 0;
min-height:66px;
font-size:11px;
margin: 0 0 8px;
padding: 0 0 8px;
border-bottom:1px dotted #e5e5e5;
}
ul.xpose_thumbs22 .xpose_thumb2 {
background:#fbfbfb;
float:left;
margin:3px 8px 0 0;
height:70px;
width:70px;
}
ul.xpose_thumbs22 .xpose_thumb2 img {
height:70px;
width:70px;
}
span.xpose_title {
font:normal normal 16px Fjalla One, Helvetica, Arial, sans-serif;
display:block;
margin:0 0 5px;
line-height:1.4em;
}
span.xpose_title2 {
font-size:17px;
}
span.rp_summary {
display:block;
margin:6px 0 0;
color:#666666;
}

div#author-box {
border: 1px solid #eee;
padding: 20px;
background: #f9f9f9;
}
span.xpose_meta {
background:transparent;
display:block;
font-size:11px;
color:#aaa;
}
span.xpose_meta a {
color:#aaa !important;
display:inline-block;
}
span.xpose_meta_date, span.xpose_meta_comment, span.xpose_meta_more  {
display:inline-block;
margin-right:8px;
}
span.xpose_meta_date:before {
content: "\f133";
font-family: FontAwesome;
font-style: normal;
font-weight: normal;
text-decoration: inherit;
padding-right:4px;
}
span.xpose_meta_comment:before  {
content: "\f086";
font-family: FontAwesome;
font-style: normal;
font-weight: normal;
text-decoration: inherit;
padding-right:4px;
}
span.xpose_meta_more:before {
content: "\f0a9";
font-family: FontAwesome;
font-style: normal;
font-weight: normal;
text-decoration: inherit;
padding-right:4px;
}
ul.xpose_thumbs22 li a:hover, ul.xpose_thumbs li a:hover {
color:#FFB200;
}
/* BOTTOMBAR */
#bottombar {
background:#3A3A3A;
overflow:hidden;
margin:0 auto;
padding:15px 28px;
color:#dddddd;
border-top: 4px solid #FFB200;
}
#bottombar .left {
float:left;
width:25%;
}
#bottombar .center {
float:left;
width:25%;
}
#bottombar .center1 {
float:left;
width:25%;
}
#bottombar .right {
float:right;
width:25%;
}
#bottombar .left .widget, #bottombar .center .widget ,#bottombar .center1 .widget{
margin:0 15px 15px 0;
}
#bottombar .right .widget {
margin:0 0 15px 0;
}
#bottombar h2 {
font:normal bold 13px Arial, sans-serif;
margin:0 0 10px 0;
padding:6px 0;
text-transform:uppercase;
position:relative;
border-bottom: 2px solid #696969;
color:#eeeeee;
}
#bottombar ul, #bottombar ol {
list-style-type:none;
margin:0 0 0 0;
padding:0 0 0 0;
}
#bottombar li {
margin:5px 0;
padding:0 0 0 0;
}
#bottombar ul li:before {
color:#eeeeee !important;
}
#bottombar a {
-webkit-transition: all 0.2s ease;
transition: all 0.2s ease;
color: #fff;
}
#bottombar a:hover {
color:#ffffff;
}
/* FOOTER */
#footer-wrapper {
background:#343434;
margin:0 auto;
padding:8px 20px;
overflow:hidden;
color:#eeeeee;
font-size:12px;
}
.footer-left {
float:left;
margin:10px;
margin-top: 32px;
color: #949494;
}
.footer-right {
float:right;
margin:10px;
color: #949494;
}
#footer-wrapper a {
color:#b8b8b8;
}
#footer-wrapper a:hover {
color:#ffffff;
}

/* Tab Menu */
.set, .panel {
margin: 0 0;
}
.tabs .panel {
padding:0 0;
}
.tabs-menu {
border-bottom:3px solid #E73138;
padding: 0 0;
margin:0 0;
}
.tabs-menu li {
font:normal bold 12px Arial, sans-serif;
display: inline-block;
*display: inline;
zoom: 1;
margin: 0 3px 0 0;
padding:10px;
background:#fff;
border:1px solid #e5e5e5;
border-bottom:none !important;
color:#333333;
cursor:pointer;
position:relative;
}
.tabs-menu .active-tab {
background:#E73138;
border:1px solid #E73138;
border-bottom:none !important;
color:#fff;
}
.tabs-content {
padding:10px 0;
}
.tabs-content .widget li {
float:none !important;
margin:5px 0;
}
.tabs-content .widget ul {
overflow:visible;
}

/* Custom CSS for Blogger Popular Post Widget */
.PopularPosts ul,
.PopularPosts li,
.PopularPosts li img,
.PopularPosts li a,
.PopularPosts li a img {
margin:0 0;
padding:0 0;
list-style:none;
border:none;
background:none;
outline:none;
}
.PopularPosts ul {
margin:.5em 0;
list-style:none;
color:black;
counter-reset:num;
}
.PopularPosts ul li img {
display:block;
margin:0 .5em 0 0;
width:65px;
height:65px;
float:left;
}
.PopularPosts ul li {
margin:0 10% .4em 0 !important;
padding:.5em 0em .8em .5em !important;
counter-increment:num;
position:relative;
}
.PopularPosts ul li:before,
.PopularPosts ul li .item-title a, .PopularPosts ul li a {
font-weight:bold;
color:#3a3a3a !important;
text-decoration:none;
}

#bottombar .popular-posts li {
border-bottom: 1px solid #333;

}

#bottombar .PopularPosts ul li a {

-webkit-transition: all 0.2s ease;
transition: all 0.2s ease;
color: #fff!important;
}

/* Set color and level */
.PopularPosts ul li {margin-right:1% !important}
.PopularPosts .item-thumbnail {
margin:0 0 0 0;
}
.PopularPosts .item-snippet {
font-size:11.5px;
color: #5C5C5C;
}

#bottombar .PopularPosts .item-snippet {
color: #5C5C5C;
font-size: 12px;
line-height: 32px;
}
.profile-img{
display:inline;
opaciry:10;
margin:0 6px 3px 0;
}
/* back to top */
#back-to-top {
background:#353738;
color:#ffffff;
padding:8px 10px;
font-size:24px;
border: 1px solid #4b4b4b;
}
.back-to-top {
position:fixed !important;
position:absolute;
bottom:20px;
right:15px;
z-index:999;
}
/* ==== Related Post Widget Start ==== */
#related-posts h2 > span{
border-bottom: 2px solid #FFB200;
bottom: -2px;
padding: 4px 10px;
background: #FFB200;
}
#related-posts{
float:left;
width:100%;
margin-bottom:40px;
}
#related-posts h2{
padding: 4px 0;
font: normal normal 18px Oswald;
text-transform: uppercase;
font: normal bold 12px Arial, sans-serif;
text-align: left;
color: #fff;
margin-bottom: 5px;
border-bottom: 2px solid #FFB200;
background: url('http://2.bp.blogspot.com/-5feHh8DpM_k/U88bANmcxnI/AAAAAAAAB40/69FQdxpYqb0/s1600/title_pat.png') repeat scroll 0% 0% transparent;
}
#related-posts .related_img {
padding:0px;
width:205px;
height:150px;
}
#related-posts .related_img:hover{
opacity:.7;
filter:alpha(opacity=70);
-moz-opacity:.7;
-khtml-opacity:.7;
}
/* share buttons */
.share-buttons-box {
height: 67px;
background: url(http://3.bp.blogspot.com/-moj4-jk-UB0/U1qCkCPaGQI/AAAAAAAADTY/tixmak8NHV8/s1600/share.png) no-repeat 330px 10px;
margin:20px 0 15px;
overflow:hidden;
}
.share-buttons {
margin:0 0;
height:67px;
float:left;
}
.share-buttons .share {
float:left;
margin-right:10px;
display:inline-block;
}
/* error and search */
.status-msg-wrap {
font-size:120%;
font-weight:bold;
width:100%;
margin:20px auto;
}
.status-msg-body {
padding:20px 2%;
width:96%;
}
.status-msg-border {
border:1px solid #e5e5e5;
opacity:10;
width:auto;
}
.status-msg-bg {
background-color:#ffffff;
}
.status-msg-hidden {
padding:20px 2%;
}
#ArchiveList ul li:before {
content:"" !important;
padding-right:0px !important;
}
/* facebook comments */

.fb-comments{width: 100% !important;}
.fb-comments iframe[style]{width: 100% !important;}
.fb-like-box{width: 100% !important;}
.fb-like-box iframe[style]{width: 100% !important;}
.fb-comments span{width: 100% !important;}
.fb-comments iframe span[style]{width: 100% !important;}
.fb-like-box span{width: 100% !important;}
.fb-like-box iframe span[style]{width: 100% !important;
}
.rich-snippet {
padding:10px;
margin:15px 0 0;
border:3px solid #eee;
font-size:12px;
}
/*-------sidebar----------------*/
.sidebar-narrow{margin:0}
#sidebar-narrow .widget{margin-bottom:30px;}
#sidebar-narrow{float:right;width:160px;
border-right: 1px solid #eaeaea;
padding: 0px 9px 0 0px;}
div#main {
width: 638px;
}
div#mywrapper {
float: left;
width: 825px;
}
#sidebartab {
margin-bottom: 15px;

}
.tab-widget-menu {
height: 46px;
margin: 0;
padding: 0px 0 0 2px;
}
#sidebartab .widget {
margin-bottom: 0;
padding-bottom: 0;
}
#sidebartab .h2title {
display: none;
}
#sidebartab .h2titlesmall {
display: none;
}
#sidebartab .widget-content {
box-shadow: none;
-moz-box-shadow: none;
-webkit-box-shadow: none;
border: 0;
}
.tab-widget-menu ul, .tab-widget-menu li {
list-style: none;
padding: 0;
margin: 0;
}
.tab-widget-menu li {
background: #333;
bottom: -2px;
color: #FFF;
cursor: pointer;
float: left;
height: 38px;
line-height: 38px;
margin: -2px 0px 0 0px;
padding: 0;
position: relative;
text-align: center;
width: 33.3%;
z-index: 2;
}
.tab-widget-menu li.selected {
background: #FFB200;
border-width: 1px 1px 3px;
color: #FFF;
margin-top: -2px;
}
#sidebartab .h2title, #sidebartab h2 {
display: none;
}
#sidebartab .h2titlesmall, #sidebartab h2 {
display: none;
}
#sidebartab .widget-content img {
padding: 2px;
border: 1px solid lightGrey;
width: 75px;
height: 75px;
}
#sidebartab .popular-posts li {
background: none repeat scroll 0 0 transparent;
border-bottom: 1px solid #E9E9E9;
overflow: hidden;
padding: 10px 0;
}
.PopularPosts img:hover, #sidebartab .widget-content img:hover {
-khtml-opacity: 0.4;
-moz-opacity: 0.4;
opacity: 0.4;
}
#sidebarlab .sidebar li a:hover {
color: #fff;
background: #222;
}
.PopularPosts a {font-weight:bold;}
.showpageArea a {
clear:both;
margin:-5px 0 10px;
text-align:center;
font-size:11px;
font-weight:bold;
text-transform:uppercase;
}
.showpageNum a {
padding:6px 10px;
margin-right:3px;
display:inline-block;
color:#333333;
background-color:#ffffff;
border: 1px solid #dddddd;
}
.showpageNum a:hover {
border: 1px solid #aaaaaa;
}
.showpagePoint {
padding:6px 10px;
margin-right:3px;
display:inline-block;
color:#333333;
background-color:#ffffff;
border: 1px solid #aaaaaa;
}
.showpageOf {
display:none;
}
.showpage a {
padding:6px 10px;
margin-right:3px;
display:inline-block;
color:#333333;
background-color:#ffffff;
border: 1px solid #dddddd;
}
.showpage a:hover {
border: 1px solid #aaaaaa;
}
.showpageNum a:link,.showpage a:link {
text-decoration:none;
color:#666;
}
.button {
text-align: center;
width: 100%;
margin: 10px 0;
padding: 0;
font-size: 14px;
font-family: 'Tahoma', Geneva, Sans-serif;
color: #fff;
margin-left: 0em !important;
}
.button ul {
margin: 0;
padding: 0;
}
.button li {
display: inline-block;
margin: 10px 0;
padding: 0;
}

#Attribution1 {
height:0px; 
visibility:hidden;
display:none
}
.author-avatar img{border:1px solid #ccc;padding:4px;background:#fff;float:left;margin:0 10px 5px 0;border:50%;box-shadow:0 0 3px 0 #b5b5b5;-moz-box-shadow:0 0 3px 0 #b5b5b5;-webkit-box-shadow:0 0 3px 0 #b5b5b5}
#author-box h3 {
padding-bottom: 5px;
border-bottom: 1px solid #D7D7D7;
font-size: 18px;
font-family: Oswald,arial,Georgia,serif;
}
.share-post {
font-size: 13px;
margin-top: 15px;
}
.share-post li {
float: left;
}
.share-post a {
display: block;
margin-right: 10px;
text-indent: -9999px;
margin-left: 12px;
background: url(http://4.bp.blogspot.com/-M_utSb-nN04/U6V8Gut9dJI/AAAAAAAAAjE/6g1X58pjjcg/s1600/single-share.png) no-repeat;
-webkit-transition: opacity .2s;
-moz-transition: opacity .2s;
-o-transition: opacity .2s;
transition: opacity .2s; 
}
.share-post a:hover {
opacity: .7;
}
.share-post
.facebook a {
width: 7px;
}
.share-post
.twitter a {
width: 18px;
background-position: -47px 0;
}
.share-post
.google a {
width: 14px;
background-position: -105px 0;
}
.share-post
.pinterest a {
width: 11px;
background-position: -159px 1px;
}
/*** Share Post Styling ***/
#share-post {
width: 100%;
overflow: hidden;
margin-top: 20px;
}
#share-post a {
display: block;
height: 32px;
line-height: 32px;
color: #fff;
float: left;
padding-right: 10px;
margin-right: 10px;
margin-bottom: 25px;
}
#share-post
.facebook {
background-color: #436FC9;
}
#share-post
.twitter {
background-color: #40BEF4;
}
#share-post
.google {
background-color: #EC5F4A;
}
#share-post
span {
display: block;
width: 32px;
height: 32px;
float: left;
margin-right: 10px;
background: url(http://4.bp.blogspot.com/-M_utSb-nN04/U6V8Gut9dJI/AAAAAAAAAjE/6g1X58pjjcg/s1600/single-share.png) no-repeat;
}
#share-post
.facebook span {
background-color: #3967C6;
}
#share-post
.twitter span {
background-color: #26B5F2;
background-position: -72px 0;
}
#share-post
.google span {
background-color: #E94D36;
background-position: -144px 0;
}
/* Search Box
----------------------------------------------- */
#searchformfix
{
float:right;
overflow:hidden;
position:relative;
margin-right: 15px;
margin-top: 6px;
}
#searchform
{
margin:7px 0 0;
padding:0;
}
#searchform fieldset
{
padding:0;
border:none;
margin:0;
}
#searchform input[type="text"]{
background:#fff; border:none;
float:left; padding:0px 10px 0px 15px;
margin:0px; width:150px; height:34px;
line-height:34px;
transition:all 600ms cubic-bezier(0.215,0.61,0.355,1) 0s;
-moz-transition:all 300ms cubic-bezier(0.215,0.61,0.355,1) 0s;
-webkit-transition:all 600ms cubic-bezier(0.215,0.61,0.355,1) 0s;
-o-transition:all 600ms cubic-bezier(0.215,0.61,0.355,1) 0s; color:#585858}
#searchform input[type=text]:hover,#searchform input[type=text]:focus
{
width:200px;
}
#searchform input[type=submit]
{
background:url(http://4.bp.blogspot.com/-R8OKVUsis3s/UgZEksy0V1I/AAAAAAAAAT4/QtN9sBHMZis/s1600/icon-search.png) center 9px no-repeat;
cursor:pointer;
margin:0;
padding:0;
width:37px;
height:34px;
line-height:34px;
background-color:#FFB200;
}
input[type=submit]
{
padding:4px 17px;
color:#ffffcolor:#585858;
text-transform:uppercase;
border:none;
font-size:20px;
background:url(gradient.png) bottom repeat-x;
cursor:pointer;
margin-top:10px;
float:left;
overflow:visible;
transition:all .3s linear;
-moz-transition:all .3s linear;
-o-transition:all .3s linear;
-webkit-transition:all .3s linear;
}
#searchform input[type=submit]:hover
{
background-color:#333;
}
.selectnav {
display:none;
}
/*---Flicker Image Gallery-----*/
.flickr_plugin {
width: 100%;
}
.flickr_badge_image {
float: left;
height: 70px;
margin: 8px 5px 0px 5px;
width: 70px;
}
.flickr_badge_image a {
display: block;
}
.flickr_badge_image a img {
display: block;
width: 100%;
height: auto;
-webkit-transition: opacity 100ms linear;
-moz-transition: opacity 100ms linear;
-ms-transition: opacity 100ms linear;
-o-transition: opacity 100ms linear;
transition: opacity 100ms linear;
}
.flickr_badge_image a img:hover {
opacity: .5;
}
div#act {
display: none;
}


#sidebar-narrow .list-label-widget-content li:before {
    content: "\f02b";
    font-family: fontawesome;
    margin-right: 5px;
}
#sidebar-narrow .list-label-widget-content li {
    display: block;
    padding: 0 0 8px 0;
    position: relative;
}
#sidebar-narrow .list-label-widget-content li a {
    color: #555555;
    font-size: 13px;
    font-weight: normal;
}
#sidebar-narrow .list-label-widget-content li a:first-child {
    text-transform: capitalize;
}
#sidebar-narrow .list-label-widget-content li a:hover {
    text-decoration: underline;
}
#sidebar-narrow .list-label-widget-content li span:last-child {
    color: #949494;
    font-size: 12px;
    font-weight: bold;
    position: absolute;
    right: 0;
    top: 0;
}
#sidebar-narrow .list-label-widget-content li:hover span:last-child {
    text-decoration: underline;
}


/***** Social link*****/

ul.socialbar li,ul.socialbar li{
	float: left;
	margin-right: 0px;
	margin-bottom:0px;
	padding: 0px;
    display:block;
	width: auto;
background:#3A3A3A;
}		
ul.socialbar li a, ul.socialbar li a, a.soc-follow {
	display: block;
	float: left;
	margin: 0;
	padding: 0;
	width: 40px;
	height: 43px;
	margin-bottom:2px;
	text-indent: -9999px;
	-webkit-transition: all 0.3s ease 0s;
     -moz-transition: all 0.3s ease 0s;
      -ms-transition: all 0.3s ease 0s;
       -o-transition: all 0.3s ease 0s;
          transition: all 0.3s ease 0s;
}	

a.soc-follow.dribbble {
	background: url(http://3.bp.blogspot.com/-NmMcKECatSQ/U6V_5SbOF1I/AAAAAAAAAkM/PWAmCSVs_wA/s1600/dribbble.png) no-repeat 0 0;
}
a.soc-follow.dribbble:hover {
	background-color: #ef5b92;
}

a.soc-follow.facebook {
	background: url(http://1.bp.blogspot.com/-3ho0g-Dc4Y0/U7ZbVW1tuKI/AAAAAAAAAzE/bpGJ-s7r3Wk/s1600/facebook.png) no-repeat 0 0;
            background-color: #3b5998;
}

a.soc-follow.flickrs {
	background: url(http://3.bp.blogspot.com/-rJglRJh1WW0/U7ZbcTKQcbI/AAAAAAAAAzk/33OW1b2t1xI/s1600/flickr.png) no-repeat 0 0;
}
a.soc-follow.flickrs:hover {
	background-color: #f1628b;
}

a.soc-follow.googleplus {
	background: url(http://3.bp.blogspot.com/-RhkXdjwgEVo/U7ZbcWu-iTI/AAAAAAAAAzo/43hPWkLD5hQ/s1600/googleplus.png) no-repeat 0 0;
            background-color: #d94a39;
}



a.soc-follow.linkedin {
	background: url(http://2.bp.blogspot.com/-n0U6_fs415s/U7ZbVQ_YSRI/AAAAAAAAAzQ/wUAF46WN5oo/s1600/linkedin.png) no-repeat 0 0;
}
a.soc-follow.linkedin:hover {
	background-color: #71b2d0;
}


a.soc-follow.twitter {
	background: url(http://4.bp.blogspot.com/-sIGAQtPQHP8/U7ZbVYIZcXI/AAAAAAAAAzI/GIY14uvXhg4/s1600/twitter.png) no-repeat 0 0;
            background-color: #48c4d2;
}

a.soc-follow.vimeo {
	background: url(http://1.bp.blogspot.com/--F1xUtN_8FQ/U7ZbWG6lHdI/AAAAAAAAAzU/5GojeL_5aYc/s1600/vimeo.png) no-repeat 0 0;
}
a.soc-follow.vimeo:hover {
	background-color: #62a0ad;
}
 
ul.socicon-2 li a:hover, ul.socicon li a:hover, a.soc-follow:hover {
	background-position: 0 -40px;
}
#nav.fixed-nav{
position: fixed;
top: 0;
left: 0;
width: 100% !important;
z-index: 999;
background: #fff;
-webkit-box-shadow: 0 5px 3px rgba(0, 0, 0, .1);
-moz-box-shadow: 0 5px 3px rgba(0, 0, 0, .1);
box-shadow: 0 5px 3px rgba(0, 0, 0, .1);
padding: 0;
}
div.conty {
width: 1050px;
margin: 0 auto;
}



#beakingnews {
background:#3A3A3A;
float: left;
height: 42px;
line-height:  42px;
overflow: hidden;
width: 60.2%;
}
#recentpostbreaking li a {
padding-left: 10px;
color:#949494;
font-family: sans-serif;
font-weight: bold;
}

#recentpostbreaking li a:hover {
color:#FFB200;
}

 #beakingnews .tulisbreaking {
background:#FFB200;
}

 #beakingnews .tulisbreaking{
color:$(mainbgfontcol.background.color) !important;
}


span.tulisbreaking:after{
content: close-quote;
position: absolute;
width: 0px;
top: 15px;
right: -12px;
border-bottom: 6px solid rgba(0, 0, 0, 0);
border-left: 6px solid #FFB200;
border-top: 6px solid rgba(0, 0, 0, 0);
border-right: 6px solid rgba(0, 0, 0, 0);
}

#beakingnews .tulisbreaking {
color: #FFFFFF;
display: block;
float: left;
font-family: sans-serif;
font-weight: bold;
padding: 0 10px;
position: absolute;
border-bottom: 1px solid #FFB200;
}

#recentpostbreaking {
    float: left;
    margin-left: 85px;
}
#recentpostbreaking ul,#recentpostbreaking li{list-style:none;margin:0;padding:0}


/*-------sidebar----------------*/
.sidebar-narrow{margin:0}
#sidebar-narrow .widget{margin-bottom:30px;}
#sidebar-narrow{float:right;width:160px;margin-right: 14px;
}


#sidebar-narrow .list-label-widget-content li:before {
    content: "\f02b";
    font-family: fontawesome;
    margin-right: 5px;
}
#sidebar-narrow .list-label-widget-content li {
    display: block;
    padding: 0 0 8px 0;
    position: relative;
}
#sidebar-narrow .list-label-widget-content li a {
    color: #555555;
    font-size: 13px;
    font-weight: normal;
}
#sidebar-narrow .list-label-widget-content li a:first-child {
    text-transform: capitalize;
}
#sidebar-narrow .list-label-widget-content li a:hover {
    text-decoration: underline;
}
#sidebar-narrow .list-label-widget-content li span:last-child {
    color: #949494;
    font-size: 12px;
    font-weight: bold;
    position: absolute;
    right: 0;
    top: 0;
}
#sidebar-narrow .list-label-widget-content li:hover span:last-child {
    text-decoration: underline;
}

.large-thumb .xpose_title a {
color: #fff;
font-size: 20px;
}


.large-thumb {
position: absolute;
bottom: 15px;
z-index: 99;
padding: 20px;
color: #fff;
background: url('http://2.bp.blogspot.com/-uE-edZMYsrg/U8_-rkIg4uI/AAAAAAAAB5E/b1uFdb4pAdY/s1600/gradient.png') repeat-x scroll 0% 0% transparent;
}

span.rp_summary {
display: none;
}
.large-thumb span.xpose_meta {
background: transparent;
display: block;
font-size: 12px;
color: #dadada;
}

.large-thumb span.xpose_meta a {
color: #Dadada !important;
display: inline-block;
}

.large-thumb .xpose_meta_comment {
float: right;
}

ul.xpose_thumbs1 {
position: relative;
}

ul.xpose_thumbs {
position: relative;
}


span.more_meta .fa {
margin-right: 5px;
}

span.s_category .fa {
margin-right: 5px;
}

.featured_thumb h3 {
font: normal normal 18px Fjalla One, Helvetica, Arial, sans-serif;
display: block;
margin: 0 0 5px;
line-height: 1.4em;
}


/* TIPSY
-----------------------------------------------*/
.tipsy {
  padding: 5px;
  font-size: 10px;
  position: absolute;
  z-index: 100000;
}
.tipsy-inner {
  padding: 1px 10px 0;
  background-color: #303030;
  color: white;
  max-width: 300px;
  text-align: center;
}
.tipsy-inner {
  border-radius: 2px;
}
.tipsy-arrow {
  position: absolute;
  width: 9px;
  height: 5px;
}
.tipsy-n .tipsy-arrow {
  top: 0;
  left: 50%;
  margin-left: -4px;
}
.tipsy .tipsy-arrow:before {
  content: no-close-quote;
  position: absolute;
  width: 0;
  height: 0;
}
.tipsy-n .tipsy-arrow:before {
  bottom: -1px;
  left: -2px;
  border-left: 6px solid transparent;
  border-right: 6px solid transparent;
  border-bottom: 6px solid #303030;
}
.tipsy-nw .tipsy-arrow {
  top: 0;
  left: 10px;
}
.tipsy-ne .tipsy-arrow {
  top: 0;
  right: 10px;
}
.tipsy-s .tipsy-arrow {
  bottom: 0;
  left: 50%;
  margin-left: -4px;
}
.tipsy-s .tipsy-arrow:before {
  bottom: -1px;
  left: -2px;
  border-left: 6px solid transparent;
  border-right: 6px solid transparent;
  border-top: 6px solid #303030;
}
.tipsy-sw .tipsy-arrow {
  bottom: 0;
  left: 10px;
}
.tipsy-se .tipsy-arrow {
  bottom: 0;
  right: 10px;
}
.tipsy-e .tipsy-arrow {
  top: 50%;
  margin-top: -4px;
  right: 0;
  width: 5px;
  height: 9px;
}
.tipsy-e .tipsy-arrow:before {
  bottom: -6px;
  right: 0;
  border-right: 6px solid rgba(0, 0, 0, 0);
  border-top: 6px solid #303030;
}
.tipsy-w .tipsy-arrow {
  top: 50%;
  margin-top: -4px;
  left: 0;
  width: 5px;
  height: 9px;
}
.tipsy-w .tipsy-arrow:before {
  bottom: 6px;
  left: -1px;
  border-bottom: 6px solid rgba(0, 0, 0, 0);
  border-right: 6px solid #303030;
}


.more_posts:after {
  content: ".";
  display: block;
  clear: both;
  visibility: hidden;
  line-height: 0;
  height: 0;
}
.more_posts .item_small {
  width: 100%;
  padding: 0 0 10px;
  margin: 0 0 10px;
  border-bottom: 1px solid #333;
}
.more_posts .item_small:after {
  content: ".";
  display: block;
  clear: both;
  visibility: hidden;
  line-height: 0;
  height: 0;
}
.more_posts .item_small .featured_thumb {
  float: left;
  width: 65px;
  height: 65px;
  margin: 0 15px 0 0;
}
.more_posts .item_small .featured_thumb img {
  width: 65px;
  height: 65px;
}
.more_posts .item_small .item-details h3 {
  font-size: 13px;
  line-height: 20px;
  margin: 0 0 8px;
}
.more_posts .post_meta {
  font-size: 12px;
  line-height: 20px;
}
#bottombar .post_meta a {
  color: #969696;
}
.more_posts .post_meta i {
  font-size: 13px;
}
.more_posts .item_small:last-child {
  border-width: 0;
}

.post_meta .fa {
margin-right: 5px;
}

.more_posts {
margin-top: 14px;
}

#bottombar .popular-posts li:last-child {
  border-width: 0;
}

.social.with_color a:hover {
  -webkit-transform: translateY(-2px);
  -ms-transform: translateY(-2px);
  transform: translateY(-2px);
}
.social a {
  float: left;
  text-align: center;
  margin: 4px 0 4px 4px;
  width: 34px;
  height: 34px;
  font-size: 16px;
  color: #9E9E9E;
  -webkit-transition: all 0.1s ease;
  transition: all 0.1s ease;
}
.social a i {
  background: #F7F7F7;
  border-radius: 2px;
  border: 1px solid #EBEBEB;
  padding: 8px 0;
  display: block;
  -webkit-transition: all 0.2s ease;
  transition: all 0.2s ease;
}
.social a:hover .fa-twitter, .social a:hover .icons-social-twitter, .with_color a .fa-twitter, .with_color a .icons-social-twitter {
  background: #00abdc;
}
.social a:hover .fa-facebook, .social a:hover .icons-social-facebook, .with_color a .fa-facebook, .with_color a .icons-social-facebook {
  background: #325c94;
}
.social a:hover .fa-dribbble, .social a:hover .icons-social-dribbble, .with_color a .fa-dribbble, .with_color a .icons-social-dribbble {
  background: #fa4086;
}
.social a:hover .fa-rss, .social a:hover .icons-rss, .with_color a .fa-rss, .with_color a .icons-rss {
  background: #f1862f;
}
.social a:hover .fa-github, .social a:hover .icons-social-github, .with_color a .fa-github, .with_color a .icons-social-github {
  background: #333;
}
.social a:hover .fa-instagram, .with_color a .fa-instagram {
  background: #964b00;
}
.social a:hover .fa-linkedin, .social a:hover .icons-social-linkedin, .with_color a .fa-linkedin, .with_color a .icons-social-linkedin {
  background: #0073b2;
}
.social a:hover .fa-pinterest, .social a:hover .icons-social-pinterest, .with_color a .fa-pinterest, .with_color a .icons-social-pinterest {
  background: #d9031f;
}
.social a:hover .fa-google-plus, .social a:hover .icons-social-google-plus, .with_color a .fa-google-plus, .with_color a .icons-social-google-plus {
  background: #d9031f;
}
.social a:hover .fa-foursquare, .with_color a .fa-foursquare {
  background: #0cbadf;
}
.social a:hover .fa-skype, .social a:hover .icons-social-skype, .with_color a .fa-skype, .with_color a .icons-social-skype {
  background: #00b9e5;
}
.social a:hover .fa-cloud, .social a:hover .icons-social-soundcloud, .with_color a .fa-cloud, .with_color a .icons-social-soundcloud {
  background: #ff7700;
}
.social a:hover .fa-youtube, .social a:hover .icons-social-youtube, .with_color a .fa-youtube, .with_color a .icons-social-youtube {
  background: #d9031f;
}
.social a:hover .fa-tumblr, .social a:hover .icons-social-tumblr, .with_color a .fa-tumblr, .with_color a .icons-social-tumblr {
  background: #325c94;
}
.social a:hover .fa-star, .with_color a .fa-star {
  background: #F8AC24;
}
.social a:hover .fa-flickr, .social a:hover .icons-social-flickr, .with_color a .fa-flickr, .with_color a .icons-social-flickr {
  background: #fa4086;
}
.social a:hover .fa-random, .with_color a .fa-random, .social a:hover .fa-envelope-o, .with_color a .fa-envelope-o, .social a:hover .fa-home, .with_color a .fa-home {
  background: #1D1E20;
}
.social a:hover i, .with_color i {
  color: #fff;
}
.with_color a i {
  border: none !important;
}



#sidebartab ul.helploggercomments{list-style: none;margin: 0;padding: 0;}
#sidebartab .helploggercomments li {background: none !important;margin: 10px 0 6px !important;padding: 0 0 6px 0 !important;display: block;clear: both;overflow: hidden;list-style: none;word-break:break-all;}
#sidebartab .helploggercomments li .avatarImage {padding: 3px;
background: #fefefe;-webkit-box-shadow: 0 1px 1px #ccc;-moz-box-shadow: 0 1px 1px #ccc;box-shadow: 0 1px 1px #ccc;float: left;margin: 0 6px 0 0;position: relative;overflow: hidden;}
#sidebartab .avatarRound {-webkit-border-radius: 100px;-moz-border-radius: 100px;border-radius: 100px;}
#sidebartab .helploggercomments li img {padding: 0px;position: relative;overflow: hidden;display: block;}
#sidebartab .helploggercomments li span {margin-top: 4px;color: #666;display: block;font-size: 12px;font-style: italic;line-height: 1.4;}


#bottombar ul.helploggercomments{list-style: none;margin: 0;padding: 0;margin-top: 14px;}
#bottombar .helploggercomments li {background: none !important;display: block;
clear: both;
overflow: hidden;
list-style: none;
word-break: break-all;
padding: 0 0 12px;
margin: 0 0 12px;
border-bottom: 1px solid #333;}
#bottombar .helploggercomments li .avatarImage {float: left;margin: 0 6px 0 0;position: relative;overflow: hidden;}
#bottombar .helploggercomments li img {padding: 0px;position: relative;overflow: hidden;display: block;}
#bottombar .helploggercomments li span {margin-top: 4px;color: #666;display: block;font-size: 12px;font-style: italic;line-height: 1.4;}

#bottombar .helploggercomments  li:last-child {
  border-width: 0;
}
/* LABELED POSTS
-----------------------------------------------*/
.def_wgr {
  min-width: 248px;
  width: 46%;
  box-sizing: border-box;
  float: left;
  position: relative;
}
.equal-posts img {
  width: 248px;
  height: 273px;
}
.gallery-posts .def_wgr:first-child {
  margin: 0 10px 0 0;
}
.gallery-posts .def_wgr:first-child img {
  width: 288px;
  height: 245px;
}
.gallery-posts .def_wgr img {
  width: 75px;
  height: 75px;
}
.block-posts .item_small:first-child img {
  width: 250px;
  height: 326px;
}
.block-posts .item_small .featured_thumb a.first_A, .block-posts .item_small:first-child .featured_thumb {
  width: 250px;
  height: 326px;
  overflow: hidden;
}
.block-posts .item_small:first-child .featured_thumb .thumb-icon {
  width: 250px;
}
.block-posts .item_small:first-child .featured_thumb {
  clear: both;
  margin: 0;
}
.block-posts .item_small img {
  width: 65px;
  height: 65px;
}
.block-posts .item_small .featured_thumb a, .block-posts .item_small .featured_thumb {
  display: block;
  width: 65px;
  height: 65px;
  overflow: hidden;
}
.block-posts .item_small .featured_thumb .thumb-icon {
  width: 65px;
}
.block-posts .item_small .featured_thumb {
  float: left;
  margin: 0 15px 0 0;
}
.gallery-posts .def_wgr:first-child {
  min-width: 240px;
  width: 288px;
  height: 245px;
}
.gallery-posts .def_wgr {
  min-width: 75px;
  width: 75px;
  margin: 0 0 10px 10px;
  overflow: hidden;
}
.gallery-posts .def_wgr:first-child h3, .gallery-posts .def_wgr:first-child .details, .block-posts .item_small:first-child .featured_thumb a h3, .block-posts .item_small .details h3, .block-posts .item_small:first-child .details .s_category {
  display: block;
}
.gallery-posts .def_wgr h3, .gallery-posts .def_wgr .details, .block-posts .item_small .featured_thumb a h3, .block-posts .item_small:first-child .details h3, .block-posts .item_small .details .s_category {
  display: none;
}
.gallery-posts .def_wgr:first-child a.first_A {
  height: 245px;
}
.gallery-posts .def_wgr a.first_A {
  display: block;
  height: 75px;
}
.block-posts .item_small {
  float: left;
  width: 49%;
  box-sizing: border-box;
  padding: 0 0 10px;
  margin: 0 0 10px;
  border-bottom: 1px solid #F1F1F1;
}
.block-posts .item_small:first-child {
  width: 51%;
  margin-right: 15px;
  padding: 0;
  margin: 0;
  border-width: 0;
}
.block-posts .item_small:last-child {
  padding: 0;
  margin: 0;
  border-width: 0;
}
.block-posts .item_small:first-child .featured_thumb a h3 {
  font-size: 17px;
  position: absolute;
  bottom: 40px;
  left: 0;
  padding: 0 20px;
  margin: 0 0 10px !important;
  color: #FFF;
  z-index: 98;
}
.block-posts .item_small:first-child .details {
  color: #B4B4B4;
  position: absolute;
  bottom: 40px;
  left: 21px;
  width: 250px;
  z-index: 98;
}
.block-posts .item_small:first-child .post_meta {
  padding: 0 20px 0 20px;
  font-size: 11px;
}
.block-posts .item_small:first-child .post_meta a {
  color: #B4B4B4;
}
.block-posts .item_small:first-child .post_meta a:hover {
  color: #fff !important;
}
.block-posts .item_small:first-child .post_meta a:nth-child(2) {
  font-size: 13px;
  float: right;
}
.gallery-posts .def_wgr:first-child a.first_A:after {
  width: 100%;
  height: 151px;
  background: url(&#39;http://2.bp.blogspot.com/-uE-edZMYsrg/U8_-rkIg4uI/AAAAAAAAB5E/b1uFdb4pAdY/s1600/gradient.png&#39;) repeat-x scroll 0% 0% transparent;
}
.gallery-posts .def_wgr a.first_A:after {
  background: none repeat scroll 0% 0% transparent;
  height: 80px;
  width: 80px;
}
.gallery-posts .def_wgr:first-child .featured_thumb .thumb-icon i {
  top: -36px;
  left: 20px;
  font-size: 30px;
}
.gallery-posts .featured_thumb .thumb-icon i {
  top: 20px;
  left: 29px;
  font-size: 18px;
}
.gallery-posts .def_wgr:first-child .featured_thumb:hover .thumb-icon i {
  top: 20px;
}
.gallery-posts .featured_thumb:hover .thumb-icon i {
  top: 30px;
}
.block-posts .item_small a.first_A:after, .def_wgr a.first_A:after {
  content: no-close-quote;
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 151px;
  background: url(&#39;http://2.bp.blogspot.com/-uE-edZMYsrg/U8_-rkIg4uI/AAAAAAAAB5E/b1uFdb4pAdY/s1600/gradient.png&#39;) repeat-x scroll 0% 0% transparent;
}
.equal-posts .def_wgr:first-child, .equal-posts .def_wgr:nth-child(3), .equal-posts .def_wgr:nth-child(5), .equal-posts .def_wgr:nth-child(7), .equal-posts .def_wgr:nth-child(9), .equal-posts .def_wgr:nth-child(11), .equal-posts .def_wgr:nth-child(13), .equal-posts .def_wgr:nth-child(15), .equal-posts .def_wgr:nth-child(17) {
  margin: 0 20px 0 0;
}
.def_wgr h3 {
  position: absolute;
  bottom: 40px;
  left: 0;
  padding: 0 20px;
  margin: 0 0 10px !important;
  color: #FFF;
  z-index: 98;
  font-size: 17px;
}
.def_wgr .details {
  position: absolute;
  bottom: 20px;
  left: 0;
  width: 100%;
  color: #FFF;
  z-index: 98;
}
.def_wgr .s_category {
  padding: 0 0 0 20px;
  font-size: 11px;
}
.def_wgr .s_category a {
  margin: 0 12px 0 0;
}
.def_wgr .details a, .def_wgr .details {
  color: #B4B4B4;
}
.def_wgr .more_meta a {
  margin: 0 20px 0 10px;
font-size: 13px;
float: right;
}
.wgr .details a:hover, .def_wgr .details a:hover {
  color: #FFF;
}
.block-posts .item_small .details h3 {
  font-size: 14px;
  line-height: 20px;
  margin: 0 0 8px;
}
.block-posts .item_small .details .post_meta a {
  color: #C2C2C2;
  margin: 0 12px 0 0;
  transition: all 0.2s ease 0s;
  font-size: 12px;
  line-height: 20px;
}
.block-posts .item_small:first-child .details .post_meta a:nth-child(2) {
  display: block;
}
.block-posts .item_small .details .post_meta a:nth-child(2) {
  display: none;
}
.block-posts .item_small .featured_thumb .thumb-icon i {
  font-size: 18px;
}
.block-posts .item_small:first-child .featured_thumb .thumb-icon i {
  font-size: 30px;
}

#block_carousel {
  margin: 0 -5px;
  width: 102%;
}
#block_carousel .item {
  margin: 0 6px;
}
#block_carousel .featured_thumb img {
  height: 116px;
  width: 165px;
}
#block_carousel .featured_thumb a {
  display: block;
  height: 116px;
}
#block_carousel h3 {
  font-size: 15px !important;
  line-height: 20px;
  margin: 14px 0 2px;
  font-weight: 700;
}
#block_carousel a.date_c {
  display: block;
  font-size: 11px;
  color: #C2C2C2;
  transition: all 0.2s ease 0s;
}
#block_carousel a.date_c:hover, .block-posts .item_small .details .post_meta a:hover {
  color: #55B2F3;
}
#block_carousel .owl-controls, #block_carouselo .owl-controls {
  bottom: auto;
  top: -54px;
  right: -16px;
  background: none repeat scroll 0% 0% #FFF;
  display: block;
  z-index: 9;
  padding: 0 0 0 7px;
}
#block_carouselo .owl-controls {
  right: -20px;
}
#block_carousel .owl-controls .owl-page span, #block_carouselo .owl-controls .owl-page span {
  width: 8px;
  height: 8px;
  margin: 3px 4px;
  background: #7F8081;
  -webkit-transition: all 0.2s ease;
  transition: all 0.2s ease;
}
#footer_carousel .owl-controls {
  top: -45px;
  right: -2px;
  background: none repeat scroll 0% 0% #1D1E20;
  display: block;
  z-index: 9;
  padding: 0 0 0 6px;
  bottom: auto;
}
#footer_carousel .owl-controls .owl-buttons div {
  margin: 0 !important;
  padding: 0 6px !important;
  background: none repeat scroll 0% 0% transparent !important;
  color: #CECECE !important;
}
#footer_carousel img {
  width: 269px !important;
  height: 295px !important;
}
#block_carouselo .item {
  margin: 0px 6px;
}
#block_carouselo .featured_thumb img {
  height: 140px;
  width: 198px;
}
#block_carouselo .featured_thumb .thumb-icon {
  height: 140px;
  width: 198px;
}
#block_carouselo h3 {
  font-size: 15px !important;
  line-height: 20px;
  margin: 14px 0px 2px;
  font-weight: 700;
}
#block_carouselo .featured_thumb a {
  display: block;
  height: 140px;
  width: 198px;
}

ul.menubar li:last-child {
border: none;
}

.main-menu {
width: 1160px;
margin: 0 auto;
}

*/]]></b:skin>

        <b:if cond='data:blog.url == data:blog.homepageUrl'>


            <style type='text/css'>


                /* Slide Content
                ----------------------------------------------- */
                .slide-wrapper {padding:0 auto;margin:0 auto;width:auto;float: left;
                word-wrap: break-word; overflow: hidden;} 
                .slide ul {list-style:none;margin:0;padding:0;}
                .slide .widget {margin:0}

                /* Lofslidernews */
                #slider{background:url(http://1.bp.blogspot.com/-qJET1HGpUDc/URJ3PJ91EtI/AAAAAAAAB9k/6-zUQ4CKbmg/s1600/slider-holder.png);margin-left:0px;position:relative;overflow:hidden;width: 648px;
                height: 375px;}
                .slider-main-outer{position:relative;height:100%;width:610px;z-index:3;overflow:hidden}
                ul.slider-main-wapper li h3{z-index: 10;
                position: absolute;
                bottom: 0;
                width: 66%;
                padding: 15px;
                margin: 10px 0 0 0px;
                background: rgba(28,28,28,0);
                background: -moz-linear-gradient(top, rgba(28,28,28,0) 0%, rgba(255,255,255,0) 0%, rgba(254,251,252,0) 0%, rgba(255,255,255,0) 0%, rgba(28,28,28,0) 0%, rgba(0,0,0,0.45) 38%, rgba(0,0,0,1) 85%);
                background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(28,28,28,0)), color-stop(0%, rgba(255,255,255,0)), color-stop(0%, rgba(254,251,252,0)), color-stop(0%, rgba(255,255,255,0)), color-stop(0%, rgba(28,28,28,0)), color-stop(38%, rgba(0,0,0,0.45)), color-stop(85%, rgba(0,0,0,1)));
                background: -webkit-linear-gradient(top, rgba(28,28,28,0) 0%, rgba(255,255,255,0) 0%, rgba(254,251,252,0) 0%, rgba(255,255,255,0) 0%, rgba(28,28,28,0) 0%, rgba(0,0,0,0.45) 38%, rgba(0,0,0,1) 85%);
                background: -o-linear-gradient(top, rgba(28,28,28,0) 0%, rgba(255,255,255,0) 0%, rgba(254,251,252,0) 0%, rgba(255,255,255,0) 0%, rgba(28,28,28,0) 0%, rgba(0,0,0,0.45) 38%, rgba(0,0,0,1) 85%);
                background: -ms-linear-gradient(top, rgba(28,28,28,0) 0%, rgba(255,255,255,0) 0%, rgba(254,251,252,0) 0%, rgba(255,255,255,0) 0%, rgba(28,28,28,0) 0%, rgba(0,0,0,0.45) 38%, rgba(0,0,0,1) 85%);
                background: linear-gradient(to bottom, rgba(28,28,28,0) 0%, rgba(255,255,255,0) 0%, rgba(254,251,252,0) 0%, rgba(255,255,255,0) 0%, rgba(28,28,28,0) 0%, rgba(0,0,0,0.45) 38%, rgba(0,0,0,1) 85%);
                filter: progid:DXImageTransform.Microsoft.gradient( startColorstr=&#39;#1c1c1c&#39;, endColorstr=&#39;#000000&#39;, GradientType=0 );}
                ul.slider-main-wapper li h3 p{color:#fff;font-size:12px;padding:5px 10px;margin:15px 0 5px;background:#FFB200;width:155px}
                ul.slider-main-wapper li h3 a{color:#fff;font-size:25px;margin:0;text-shadow: 1px 1px 0 #000;}
                ul.slider-main-wapper li h3 .title{color:#eee;font:12px Arial;margin:0;padding-top:5px;display: none;}
                ul.slider-main-wapper li .imgauto{width:590px;height:375px;overflow:hidden;margin:0;padding:0;}
                ul.slider-main-wapper{height:375px;width:610px;position:absolute;overflow:hidden;margin:0;padding:0}
                ul.slider-main-wapper li{overflow:hidden;list-style:none;height:100%;width:610px;float:left;margin:0;padding:0}
                .slider-opacity li{position:absolute;top:0;left:0;float:inherit}
                ul.slider-main-wapper li img{list-style:none;width:auto;height:375px;padding:0;}
                ul.slider-navigator{top:0;position:absolute;width:100%;margin:0;padding:0}
                ul.slider-navigator li{cursor:pointer;list-style:none;width:100%;overflow:hidden;margin:0;padding:0}
                .slider-navigator-outer{background:#303030;position:absolute;right:10px;top:0px;z-index:10;height:450px;width:35%;overflow:hidden;color:#333;}
                .slider-navigator li h5{color:#ccc;font:bold 12px Arial;margin:0;font-family: &#39;Droid Sans&#39;,sans-serif;
                line-height: 18px;
                font-weight: 300;
                color: #eee;
                text-decoration: none;
                margin: 0;
                position: relative;
                height: 34.4px;
                font-size: 13px;
                display: block;
                padding: 22px 7px 18px 15px;}
                .slider-navigator li .title{color:#eee;font:11px Tahoma;margin:0;padding-top:5px}
                .slider-navigator li div{height:74px;position:relative;margin:0;padding:0 0px;border-bottom:1px dashed #222}
                .slider-navigator li.active div,.slider-navigator li:hover div{color:#999;}
                .slider-navigator li img{border:#444 solid 2px;height:70px;width:90px;float:left;margin:5px 10px 5px 0}
                .slider-navigator li.active img{border:#ccc solid 2px}
                .slider-navigator li.active h5,.slider-navigator li h5:hover{color: #FFB200;
                position: relative;
                background: #222;
                border-left: 4px solid #FFB200;}

                ul.slider-navigator .title {
                display: none;
                }



            </style>

        </b:if>
        <style>

            @media only screen and (max-width:1024px){
            #selectnav1 {
            background: none repeat scroll 0 0 #333;
            border: 1px solid #232323;
            color: #FFF;
            width: 418px;
            margin: 8px 0px;
            float: left;
            }


            .selectnav {
            display:block;
            width:50%;
            margin:0;
            padding:7px;
            }
            }
            @media only screen and (max-width:768px){
            #selectnav1 {
            background: none repeat scroll 0 0 #333;
            border: 1px solid #232323;
            color: #FFF;
            width: 418px;
            margin: 8px 0px;
            float: left;
            }
            .selectnav {
            display:block;
            width:50%;
            margin:0;
            padding:7px;
            }
            }
            @media only screen and (max-width:768px){
            #selectnav1 {
            width: 405px;
            }
            }
            @media only screen and (max-width:480px){
            #selectnav1 {
            width:266px;
            }
            }
            @media only screen and (max-width:320px){
            #selectnav1 {
            width:280px;
            }
            }
            /* MEDIA QUERY */
            @media only screen and (max-width:1066px){
            #outer-wrapper {
            margin:0 auto;
            width: 1000px;
            }
            #post-wrapper {
            width: 670px;
            max-width: 670px;
            }
            div#mywrapper {
            float: left;
            width: 670px;
            }
 
            #sidebar-wrapper { 
            max-width: 259px;
            } 

            #main-nav {
            margin: 0 auto;
            width: 1000px;}

            #sidebar-narrow { 
            display: none;
            }

            .main-menu {
            width: 940px;
            margin: 0 auto;
            }

            }
            @media only screen and (max-width:1024px){
            #menu-main {
            display: none;
            }

            .main-menu {
            width: 680px;
            margin: 0 auto;
            }
            #my-slider {
            margin-left: 15px;
            }
            div#main {
            width: auto;
            }
            #post-wrapper {
            width: 680px;
            max-width: 680px;
            }
            #sidebar-wrapper{
            width:100%;
            max-width:100%;
            }

            .main-menu {
            padding: 5px 20px;
            }

            #searchformfix {
            margin-top: 0px; 
            }

            #main-nav,#outer-wrapper {
            width: 720px;
            }

            #slider {
            overflow: hidden;
            width: 100%;}


            #bottombar .center,#bottombar .center1,#bottombar .right, #bottombar .left{width:50%}
            }
            @media only screen and (max-width:768px){


            #beakingnews {

            width: 94.2%;
            }
      
            #main-nav, #outer-wrapper {
            width: 440px;
            }
            #menu-main {
            display: none;
            }
            #my-slider {
            margin-left: -6px;
            }
            div.conty {
            width: 400px;
            margin: 0 auto;
            }
            #searchformfix {

            display: none;
            }

            .slider-navigator-outer {

            display: none;
            }

            div#mywrapper {
            float: center;
            width: auto;
            }
            #post-wrapper, #sidebar-wrapper {
            float:none;
            width:100%;
            max-width:100%
            }
            .active {
            display: block;
            }
            .post-body img {
            max-width:90%;
            }
            .img-thumbnail {
            margin:0 10px 0 0;
            }
            .stylebox .widget {
            padding:0 0 10px 0;
            }
            #stylebox-1 .widget, #stylebox-3 .widget, #stylebox-5 .widget {
            padding:0 5px 10px 0;
            }
            #stylebox-2 .widget, #stylebox-4 .widget, #stylebox-6 .widget ;stylebox-7 .widget{
            padding:0 0 10px 5px;
            }
            .sidebar-container, .post-container {
            padding:15px 0 0px;
            }
            }
            @media only screen and (max-width:640px){
      
            #menu-main {
            display: none;
            }

            .slider-navigator-outer {

            display: none;
            }
            #content-wrapper{padding:0 10px}
            #sidebar-narrow{display:none}
            div#mywrapper {
            float: center;
            width: auto;
            }

            #sidebar-wrapper {

            border-left: none;
            padding-left: 0;
            }

            .main-menu {
            padding: 6px 17px;
            }
            #post-wrapper, #sidebar-wrapper, #bottombar .left, #bottombar .center,#bottombar .center1, #bottombar .right {
            float:none;
            width:100%;
            max-width:100%
            }
            .header{width:100%}

            .header-right {
            display:none
            }
            .sidebar-container, .post-container{
            padding:10px 0 0px;
            }
            .largebanner .widget, #bottombar {
            padding:10px;
            }
            .post, .breadcrumbs {
            margin:0 0 10px;
            padding:10px;
            }
            .pagenavi {
            margin: 6px 0 10px;
            }
            .stylebox .widget-content {
            padding:10px;
            }
            #bottombar .left .widget, #bottombar .center .widget, #bottombar .right .widget, .sidebar .widget {
            margin:0 0 10px 0;
            }
            }
            @media only screen and (max-width:480px){
            #outer-wrapper {
            width: 300px;
            }

            div.conty {
            width: 254px;
            margin: 0 auto;
            }
            #searchformfix {

            display: none;
            }
            ul.xpose_thumbs1,ul.xpose_thumbs22{width:100%}
            #menu-main {
            display: none;
            }
            #sidebar-narrow{display:none}
            div#mywrapper {
            float: center;
            width: auto;
            }
            .header, .header-right, .stylebox,.stylebox1  {
            float:none;
            width:100%;
            max-width:100%
            }
            .header img {
            margin: 20px auto 0;
            }
            .largebanner .widget, #bottombar {
            padding:8px;
            }
            .post, .breadcrumbs {
            margin:0 0 8px;
            padding:8px;
            }
            .stylebox .widget-content,.stylebox1  .widget-content {
            padding:8px;
            }
            h2.post-title, h1.post-title {
            font-size:16px;
            }
            .img-thumbnail, .img-thumbnail img {
            width:120px;
            height:90px;
            }
            .img-thumbnail {
            margin:0 8px 0 0;
            }
            #stylebox-1 .widget, #stylebox-3 .widget,	#stylebox-2 .widget, #stylebox-4 .widget, #stylebox-5 .widget, #stylebox-6 .widget ,#stylebox-7 .widget{
            padding:0 0 8px 0;
            }
            .comments .comment-block, .comments .comments-content .inline-thread {
            padding:10px !important;
            }
            .comment .comment-thread.inline-thread .comment {
            margin: 0 0 0 0 !important;
            }
            .footer-left, .footer-right {
            float:none;
            text-align:center;
            }
            }
            @media screen and (max-width:320px){
            #outer-wrapper {
            padding:0 6px;
            }
            #menu-main {
            display: none;
            }
            #sidebar-narrow{display:none}
            div#mywrapper {
            float: center;
            width: auto;
            }
            .post, .breadcrumbs {
            padding:6px;
            }
            .stylebox .widget-content,.stylebox1  .widget-content {
            padding:6px;
            }
            .img-thumbnail, .img-thumbnail img {
            width:100px;
            height:80px;
            }
            }
        </style>
        <b:if cond='data:blog.pageType == &quot;item&quot;'>
            <style type='text/css'>
                h2.post-title a, h1.post-title a, h2.post-title, h1.post-title {
                color:#383838;
                font-size:26px;
                }

                .top-comment-widget-menu {
                float: left;
                margin: -15px 0 15px;
                padding: 0;
                width: 100%;
                height: 40px;
                background: #444444 url(http://2.bp.blogspot.com/-YxxeRcqP6UI/U6V7A_pfmnI/AAAAAAAAAik/NyzEC4z7POQ/s1600/menu-bg2.png) repeat;
   
                }

                .top-comment {
                float: left;
                font-size: 14px;
                list-style: none outside none;
                text-transform: uppercase;
                width: 43%;
                margin: 1px;
                padding: 10px 20px !important;
                font-weight: normal;
                color: #fff;
                cursor: pointer;
                }

                #relpost_img_sum .news-text {
                display: none;
                }


                .top-comment.selected {
                cursor: pointer;
                padding: 12px 20px !important;
                margin: 0px 0 0 -16px;
                color: #FFF;
                background: #FFB200;
   
                -webkit-transition: all .2s ease-in-out;
                -moz-transition: all .2s ease-in-out;
                -o-transition: all .2s ease-in-out;
                -ms-transition: all .2s ease-in-out;
                transition: all .2s ease-in-out;
                }

                .top-comment.blogico:before {
                content: &quot;\f0d5&quot;;
                font-family: fontawesome;
                margin-right: 15px;
                }

                .top-comment.faceico:before {
                content: &quot;\f09a&quot;;
                font-family: fontawesome;
                margin-right: 15px;
                }

            </style>
        </b:if>
        <b:if cond='data:blog.pageType != &quot;index&quot;'>
            <style type='text/css'>
                /* COMMENT */



                .comment-form {
                overflow:hidden;
                }
                .comments h3 {
                line-height:normal;
                text-transform:uppercase;
                color:#333;
                font-weight:bold;
                margin:0 0 20px 0;
                font-size:14px;
                padding:0 0 0 0;
                }
                h4#comment-post-message {
                display:none;
                margin:0 0 0 0;
                }
                .comments{
                clear:both;
                margin-top:10px;
                margin-bottom:0
                }
                .comments .comments-content{
                font-size:13px;
                margin-bottom:8px
                }
                .comments .comments-content .comment-thread ol{
                text-align:left;
                margin:13px 0;
                padding:0
                }
                .comments .avatar-image-container {
                background:#fff;
                border:1px solid #DDD;
                overflow:hidden;
                padding:6px;
                }
                .comments .comment-block{
                position:relative;
                background:#fff;
                padding:15px;
                margin-left:60px;
                border-left:3px solid #ddd;
                border-top:1px solid #DDD;
                border-right:1px solid #DDD;
                border-bottom:1px solid #DDD;
                }
                .comments .comment-block:before {
                content:&quot;&quot;;
                width:0px;
                height:0px;
                position:absolute;
                right:100%;
                top:14px;
                border-width:10px;
                border-style:solid;
                border-color:transparent #DDD transparent transparent;
                display:block;
                }
                .comments .comments-content .comment-replies{
                margin:8px 0;
                margin-left:60px
                }
                .comments .comments-content .comment-thread:empty{
                display:none
                }
                .comments .comment-replybox-single {
                background:#f0f0f0;
                padding:0;
                margin:8px 0;
                margin-left:60px
                }
                .comments .comment-replybox-thread {
                background:#f0f0f0;
                margin:8px 0 0 0;
                padding:0;
                }
                .comments .comments-content .comment{
                margin-bottom:6px;
                padding:0
                }
                .comments .comments-content .comment:first-child {
                padding:0;
                margin:0
                }
                .comments .comments-content .comment:last-child {
                padding:0;
                margin:0
                }
                .comments .comment-thread.inline-thread .comment, .comments .comment-thread.inline-thread .comment:last-child {
                margin:0px 0px 5px 30%
                }
                .comment .comment-thread.inline-thread .comment:nth-child(6) {
                margin:0px 0px 5px 25%;
                }
                .comment .comment-thread.inline-thread .comment:nth-child(5) {
                margin:0px 0px 5px 20%;
                }
                .comment .comment-thread.inline-thread .comment:nth-child(4) {
                margin:0px 0px 5px 15%;
                }
                .comment .comment-thread.inline-thread .comment:nth-child(3) {
                margin:0px 0px 5px 10%;
                }
                .comment .comment-thread.inline-thread .comment:nth-child(2) {
                margin:0px 0px 5px 5%;
                }
                .comment .comment-thread.inline-thread .comment:nth-child(1) {
                margin:0px 0px 5px 0;
                }
                .comments .comments-content .comment-thread{
                margin:0;
                padding:0
                }
                .comments .comments-content .inline-thread{
                background:#fff;
                border:1px solid #DDD;
                padding:15px;
                margin:0
                }
                .comments .comments-content .icon.blog-author {
                display:inline;
                }
                .comments .comments-content .icon.blog-author:after {
                content: &quot;Admin&quot;;
                background: #FFB200;
                color: #fff;
                font-size: 11px;
                padding: 2px 5px;
                }
                .comment-header {
                text-transform:uppercase;
                font-size:12px;
                }
                .comments .comments-content .datetime {
                margin-left: 6px;
                }
                .comments .comments-content .datetime a {
                color:#888;
                }
                .comments .comment .comment-actions a {
                display:inline-block;
                color:#333;
                font-weight:bold;
                font-size:10px;
                line-height:15px;
                margin:4px 8px 0 0;
                }
                .comments .continue a {
                color:#333;
                display:inline-block;
                font-size:10px;
                }
                .comments .comment .comment-actions a:hover, .comments .continue a:hover{
                text-decoration:underline;
                }
                .pesan-komentar {
                }
                .pesan-komentar p {
                line-height:normal;
                margin:0 0;
                }
                .pesan-komentar:before {
         
                }
                .fb-comments{width: 100% !important;}
                .fb-comments iframe[style]{width: 100% !important;}
                .fb-like-box{width: 100% !important;}
                .fb-like-box iframe[style]{width: 100% !important;}
                .fb-comments span{width: 100% !important;}
                .fb-comments iframe span[style]{width: 100% !important;}
                .fb-like-box span{width: 100% !important;}
                .fb-like-box iframe span[style]{width: 100% !important;}
                .fotleft{float:left}
                .fotright{float:right;text-align:right;}
            </style>
        </b:if>


        <b:if cond='data:blog.url == data:blog.homepageUrl'>
            <style>
                #singlepage {
                display:none;
                visibility:hidden;
                }
            </style>
        </b:if>
        <b:if cond='data:blog.pageType != &quot;item&quot;'>
            <style>
                .top-comment-widget-menu.clear {
                display: none;
                }
            </style>

            <script type='text/javascript'>
                //<![CDATA[
imgr = new Array();
imgr[0] = "http://2.bp.blogspot.com/-uitX7ROPtTU/Tyv-G4NA_uI/AAAAAAAAFBY/NcWLPVnYEnU/s1600/no+image.jpg";
showRandomImg = true;
aBold = true;
summaryPost = 60;
summaryPost1 = 180;
summaryPost2 = 100;
numposts11 = 10;
numposts11 = 10;

function removeHtmlTag(a, b) {
    var c = a.split("<");
    for (var d = 0; d < c.length; d++) if (c[d].indexOf(">") != -1) c[d] = c[d].substring(c[d].indexOf(">") + 1, c[d].length);
    c = c.join("");
    c = c.substring(0, b - 1);
    return c;
}

var _0x2689=["\x54\x20\x31\x4F\x28\x65\x29\x7B\x6A\x3D\x31\x35\x3F\x51\x2E\x5A\x28\x28\x4A\x2E\x7A\x2B\x31\x29\x2A\x51\x2E\x31\x33\x28\x29\x29\x3A\x30\x3B\x41\x3D\x31\x74\x20\x31\x7A\x28\x29\x3B\x45\x28\x77\x20\x66\x3D\x30\x3B\x66\x3C\x31\x6B\x3B\x66\x2B\x2B\x29\x7B\x77\x20\x67\x3D\x65\x2E\x50\x2E\x4E\x5B\x66\x5D\x3B\x77\x20\x68\x3D\x67\x2E\x47\x2E\x24\x74\x3B\x77\x20\x69\x3B\x77\x20\x6B\x3B\x78\x28\x66\x3D\x3D\x65\x2E\x50\x2E\x4E\x2E\x7A\x29\x43\x3B\x45\x28\x77\x20\x6C\x3D\x30\x3B\x6C\x3C\x67\x2E\x79\x2E\x7A\x3B\x6C\x2B\x2B\x29\x78\x28\x22\x31\x34\x22\x3D\x3D\x67\x2E\x79\x5B\x6C\x5D\x2E\x4C\x29\x7B\x6B\x3D\x67\x2E\x79\x5B\x6C\x5D\x2E\x49\x3B\x43\x7D\x45\x28\x77\x20\x6C\x3D\x30\x3B\x6C\x3C\x67\x2E\x79\x2E\x7A\x3B\x6C\x2B\x2B\x29\x78\x28\x22\x31\x6C\x22\x3D\x3D\x67\x2E\x79\x5B\x6C\x5D\x2E\x4C\x26\x26\x22\x31\x6E\x2F\x31\x6F\x22\x3D\x3D\x67\x2E\x79\x5B\x6C\x5D\x2E\x31\x70\x29\x7B\x69\x3D\x67\x2E\x79\x5B\x6C\x5D\x2E\x47\x2E\x42\x28\x22\x20\x22\x29\x5B\x30\x5D\x3B\x43\x7D\x78\x28\x22\x53\x22\x4B\x20\x67\x29\x77\x20\x6D\x3D\x67\x2E\x53\x2E\x24\x74\x3B\x4F\x20\x78\x28\x22\x4D\x22\x4B\x20\x67\x29\x77\x20\x6D\x3D\x67\x2E\x4D\x2E\x24\x74\x3B\x4F\x20\x77\x20\x6D\x3D\x22\x22\x3B\x44\x3D\x67\x2E\x31\x69\x2E\x24\x74\x3B\x78\x28\x6A\x3E\x4A\x2E\x7A\x2D\x31\x29\x6A\x3D\x30\x3B\x41\x5B\x66\x5D\x3D\x4A\x5B\x6A\x5D\x3B\x73\x3D\x6D\x3B\x61\x3D\x73\x2E\x48\x28\x22\x3C\x41\x22\x29\x3B\x62\x3D\x73\x2E\x48\x28\x27\x56\x3D\x22\x27\x2C\x61\x29\x3B\x63\x3D\x73\x2E\x48\x28\x27\x22\x27\x2C\x62\x2B\x35\x29\x3B\x64\x3D\x73\x2E\x59\x28\x62\x2B\x35\x2C\x63\x2D\x62\x2D\x35\x29\x3B\x78\x28\x61\x21\x3D\x2D\x31\x26\x26\x62\x21\x3D\x2D\x31\x26\x26\x63\x21\x3D\x2D\x31\x26\x26\x22\x22\x21\x3D\x64\x29\x41\x5B\x66\x5D\x3D\x64\x3B\x77\x20\x6E\x3D\x5B\x31\x2C\x32\x2C\x33\x2C\x34\x2C\x35\x2C\x36\x2C\x37\x2C\x38\x2C\x39\x2C\x31\x30\x2C\x31\x31\x2C\x31\x32\x5D\x3B\x77\x20\x6F\x3D\x5B\x22\x31\x36\x22\x2C\x22\x31\x37\x22\x2C\x22\x31\x38\x22\x2C\x22\x31\x39\x22\x2C\x22\x31\x61\x22\x2C\x22\x31\x62\x22\x2C\x22\x31\x63\x22\x2C\x22\x31\x64\x22\x2C\x22\x31\x65\x22\x2C\x22\x31\x66\x22\x2C\x22\x31\x67\x22\x2C\x22\x31\x68\x22\x5D\x3B\x77\x20\x70\x3D\x44\x2E\x42\x28\x22\x2D\x22\x29\x5B\x32\x5D\x2E\x31\x6A\x28\x30\x2C\x32\x29\x3B\x77\x20\x71\x3D\x44\x2E\x42\x28\x22\x2D\x22\x29\x5B\x31\x5D\x3B\x77\x20\x72\x3D\x44\x2E\x42\x28\x22\x2D\x22\x29\x5B\x30\x5D\x3B\x45\x28\x77\x20\x74\x3D\x30\x3B\x74\x3C\x6E\x2E\x7A\x3B\x74\x2B\x2B\x29\x78\x28\x31\x6D\x28\x71\x29\x3D\x3D\x6E\x5B\x74\x5D\x29\x7B\x71\x3D\x6F\x5B\x74\x5D\x3B\x43\x7D\x77\x20\x75\x3D\x70\x2B\x22\x20\x22\x2B\x71\x2B\x22\x20\x22\x2B\x72\x3B\x77\x20\x76\x3D\x27\x3C\x52\x20\x31\x4E\x3D\x22\x31\x4D\x3A\x31\x42\x3B\x22\x3E\x3C\x46\x20\x57\x3D\x22\x31\x4B\x22\x3E\x3C\x61\x20\x49\x3D\x22\x27\x2B\x6B\x2B\x27\x22\x3E\x3C\x41\x20\x56\x3D\x22\x27\x2B\x41\x5B\x66\x5D\x2B\x27\x22\x2F\x3E\x3C\x2F\x61\x3E\x3C\x2F\x46\x3E\x3C\x31\x76\x3E\x3C\x61\x20\x49\x3D\x22\x27\x2B\x6B\x2B\x27\x22\x3E\x27\x2B\x68\x2B\x22\x3C\x2F\x61\x3E\x3C\x70\x3E\x22\x2B\x75\x2B\x22\x20\x2F\x20\x22\x2B\x69\x2B\x27\x20\x31\x45\x3C\x2F\x70\x3E\x3C\x46\x20\x57\x3D\x22\x47\x22\x3E\x27\x2B\x31\x78\x28\x6D\x2C\x31\x4C\x29\x2B\x22\x2E\x2E\x2E\x20\x3C\x2F\x46\x3E\x3C\x2F\x31\x76\x3E\x3C\x2F\x52\x3E\x22\x3B\x58\x2E\x31\x41\x28\x76\x29\x3B\x6A\x2B\x2B\x7D\x7D\x54\x20\x31\x43\x28\x65\x29\x7B\x6A\x3D\x31\x35\x3F\x51\x2E\x5A\x28\x28\x4A\x2E\x7A\x2B\x31\x29\x2A\x51\x2E\x31\x33\x28\x29\x29\x3A\x30\x3B\x41\x3D\x31\x74\x20\x31\x7A\x28\x29\x3B\x45\x28\x77\x20\x66\x3D\x30\x3B\x66\x3C\x31\x6B\x3B\x66\x2B\x2B\x29\x7B\x77\x20\x67\x3D\x65\x2E\x50\x2E\x4E\x5B\x66\x5D\x3B\x77\x20\x68\x3D\x67\x2E\x47\x2E\x24\x74\x3B\x77\x20\x69\x3B\x77\x20\x6B\x3B\x78\x28\x66\x3D\x3D\x65\x2E\x50\x2E\x4E\x2E\x7A\x29\x43\x3B\x45\x28\x77\x20\x6C\x3D\x30\x3B\x6C\x3C\x67\x2E\x79\x2E\x7A\x3B\x6C\x2B\x2B\x29\x78\x28\x22\x31\x34\x22\x3D\x3D\x67\x2E\x79\x5B\x6C\x5D\x2E\x4C\x29\x7B\x6B\x3D\x67\x2E\x79\x5B\x6C\x5D\x2E\x49\x3B\x43\x7D\x45\x28\x77\x20\x6C\x3D\x30\x3B\x6C\x3C\x67\x2E\x79\x2E\x7A\x3B\x6C\x2B\x2B\x29\x78\x28\x22\x31\x6C\x22\x3D\x3D\x67\x2E\x79\x5B\x6C\x5D\x2E\x4C\x26\x26\x22\x31\x6E\x2F\x31\x6F\x22\x3D\x3D\x67\x2E\x79\x5B\x6C\x5D\x2E\x31\x70\x29\x7B\x69\x3D\x67\x2E\x79\x5B\x6C\x5D\x2E\x47\x2E\x42\x28\x22\x20\x22\x29\x5B\x30\x5D\x3B\x43\x7D\x78\x28\x22\x53\x22\x4B\x20\x67\x29\x77\x20\x6D\x3D\x67\x2E\x53\x2E\x24\x74\x3B\x4F\x20\x78\x28\x22\x4D\x22\x4B\x20\x67\x29\x77\x20\x6D\x3D\x67\x2E\x4D\x2E\x24\x74\x3B\x4F\x20\x77\x20\x6D\x3D\x22\x22\x3B\x44\x3D\x67\x2E\x31\x69\x2E\x24\x74\x3B\x78\x28\x6A\x3E\x4A\x2E\x7A\x2D\x31\x29\x6A\x3D\x30\x3B\x41\x5B\x66\x5D\x3D\x4A\x5B\x6A\x5D\x3B\x73\x3D\x6D\x3B\x61\x3D\x73\x2E\x48\x28\x22\x3C\x41\x22\x29\x3B\x62\x3D\x73\x2E\x48\x28\x27\x56\x3D\x22\x27\x2C\x61\x29\x3B\x63\x3D\x73\x2E\x48\x28\x27\x22\x27\x2C\x62\x2B\x35\x29\x3B\x64\x3D\x73\x2E\x59\x28\x62\x2B\x35\x2C\x63\x2D\x62\x2D\x35\x29\x3B\x78\x28\x61\x21\x3D\x2D\x31\x26\x26\x62\x21\x3D\x2D\x31\x26\x26\x63\x21\x3D\x2D\x31\x26\x26\x22\x22\x21\x3D\x64\x29\x41\x5B\x66\x5D\x3D\x64\x3B\x77\x20\x6E\x3D\x5B\x31\x2C\x32\x2C\x33\x2C\x34\x2C\x35\x2C\x36\x2C\x37\x2C\x38\x2C\x39\x2C\x31\x30\x2C\x31\x31\x2C\x31\x32\x5D\x3B\x77\x20\x6F\x3D\x5B\x22\x31\x36\x22\x2C\x22\x31\x37\x22\x2C\x22\x31\x38\x22\x2C\x22\x31\x39\x22\x2C\x22\x31\x61\x22\x2C\x22\x31\x62\x22\x2C\x22\x31\x63\x22\x2C\x22\x31\x64\x22\x2C\x22\x31\x65\x22\x2C\x22\x31\x66\x22\x2C\x22\x31\x67\x22\x2C\x22\x31\x68\x22\x5D\x3B\x77\x20\x70\x3D\x44\x2E\x42\x28\x22\x2D\x22\x29\x5B\x32\x5D\x2E\x31\x6A\x28\x30\x2C\x32\x29\x3B\x77\x20\x71\x3D\x44\x2E\x42\x28\x22\x2D\x22\x29\x5B\x31\x5D\x3B\x77\x20\x72\x3D\x44\x2E\x42\x28\x22\x2D\x22\x29\x5B\x30\x5D\x3B\x45\x28\x77\x20\x74\x3D\x30\x3B\x74\x3C\x6E\x2E\x7A\x3B\x74\x2B\x2B\x29\x78\x28\x31\x6D\x28\x71\x29\x3D\x3D\x6E\x5B\x74\x5D\x29\x7B\x71\x3D\x6F\x5B\x74\x5D\x3B\x43\x7D\x77\x20\x75\x3D\x70\x2B\x22\x20\x22\x2B\x71\x2B\x22\x20\x22\x2B\x72\x3B\x77\x20\x76\x3D\x27\x3C\x52\x3E\x3C\x46\x3E\x3C\x31\x79\x3E\x27\x2B\x68\x2B\x27\x3C\x2F\x31\x79\x3E\x3C\x46\x20\x57\x3D\x22\x47\x22\x3E\x27\x2B\x31\x78\x28\x6D\x2C\x31\x44\x29\x2B\x22\x2E\x2E\x2E\x20\x3C\x2F\x46\x3E\x3C\x2F\x46\x3E\x3C\x2F\x52\x3E\x22\x3B\x58\x2E\x31\x41\x28\x76\x29\x3B\x6A\x2B\x2B\x7D\x7D\x31\x77\x2E\x31\x46\x3D\x54\x28\x29\x7B\x77\x20\x65\x3D\x58\x2E\x31\x47\x28\x22\x31\x48\x22\x29\x3B\x78\x28\x65\x3D\x3D\x31\x49\x29\x7B\x31\x77\x2E\x31\x4A\x2E\x49\x3D\x22\x31\x75\x3A\x2F\x2F\x31\x73\x2E\x31\x72\x2E\x31\x71\x2F\x22\x7D\x65\x2E\x55\x28\x22\x49\x22\x2C\x22\x31\x75\x3A\x2F\x2F\x31\x73\x2E\x31\x72\x2E\x31\x71\x2F\x22\x29\x3B\x65\x2E\x55\x28\x22\x31\x50\x22\x2C\x22\x31\x51\x22\x29\x3B\x65\x2E\x55\x28\x22\x47\x22\x2C\x22\x31\x52\x20\x31\x53\x20\x31\x54\x22\x29\x3B\x65\x2E\x31\x55\x3D\x22\x31\x56\x22\x7D","\x7C","\x73\x70\x6C\x69\x74","\x7C\x7C\x7C\x7C\x7C\x7C\x7C\x7C\x7C\x7C\x7C\x7C\x7C\x7C\x7C\x7C\x7C\x7C\x7C\x7C\x7C\x7C\x7C\x7C\x7C\x7C\x7C\x7C\x7C\x7C\x7C\x7C\x76\x61\x72\x7C\x69\x66\x7C\x6C\x69\x6E\x6B\x7C\x6C\x65\x6E\x67\x74\x68\x7C\x69\x6D\x67\x7C\x73\x70\x6C\x69\x74\x7C\x62\x72\x65\x61\x6B\x7C\x70\x6F\x73\x74\x64\x61\x74\x65\x7C\x66\x6F\x72\x7C\x64\x69\x76\x7C\x74\x69\x74\x6C\x65\x7C\x69\x6E\x64\x65\x78\x4F\x66\x7C\x68\x72\x65\x66\x7C\x69\x6D\x67\x72\x7C\x69\x6E\x7C\x72\x65\x6C\x7C\x73\x75\x6D\x6D\x61\x72\x79\x7C\x65\x6E\x74\x72\x79\x7C\x65\x6C\x73\x65\x7C\x66\x65\x65\x64\x7C\x4D\x61\x74\x68\x7C\x6C\x69\x7C\x63\x6F\x6E\x74\x65\x6E\x74\x7C\x66\x75\x6E\x63\x74\x69\x6F\x6E\x7C\x73\x65\x74\x41\x74\x74\x72\x69\x62\x75\x74\x65\x7C\x73\x72\x63\x7C\x63\x6C\x61\x73\x73\x7C\x64\x6F\x63\x75\x6D\x65\x6E\x74\x7C\x73\x75\x62\x73\x74\x72\x7C\x66\x6C\x6F\x6F\x72\x7C\x7C\x7C\x7C\x72\x61\x6E\x64\x6F\x6D\x7C\x61\x6C\x74\x65\x72\x6E\x61\x74\x65\x7C\x73\x68\x6F\x77\x52\x61\x6E\x64\x6F\x6D\x49\x6D\x67\x7C\x4A\x61\x6E\x7C\x46\x65\x62\x7C\x4D\x61\x72\x7C\x41\x70\x72\x7C\x4D\x61\x79\x7C\x4A\x75\x6E\x7C\x4A\x75\x6C\x7C\x41\x75\x67\x7C\x53\x65\x70\x7C\x4F\x63\x74\x7C\x4E\x6F\x76\x7C\x44\x65\x63\x7C\x70\x75\x62\x6C\x69\x73\x68\x65\x64\x7C\x73\x75\x62\x73\x74\x72\x69\x6E\x67\x7C\x6E\x75\x6D\x70\x6F\x73\x74\x73\x31\x31\x7C\x72\x65\x70\x6C\x69\x65\x73\x7C\x70\x61\x72\x73\x65\x49\x6E\x74\x7C\x74\x65\x78\x74\x7C\x68\x74\x6D\x6C\x7C\x74\x79\x70\x65\x7C\x63\x6F\x6D\x7C\x74\x68\x65\x6D\x65\x78\x70\x6F\x73\x65\x7C\x77\x77\x77\x7C\x6E\x65\x77\x7C\x68\x74\x74\x70\x7C\x68\x33\x7C\x77\x69\x6E\x64\x6F\x77\x7C\x72\x65\x6D\x6F\x76\x65\x48\x74\x6D\x6C\x54\x61\x67\x7C\x68\x35\x7C\x41\x72\x72\x61\x79\x7C\x77\x72\x69\x74\x65\x7C\x72\x65\x6C\x61\x74\x69\x76\x65\x7C\x72\x65\x63\x65\x6E\x74\x70\x6F\x73\x74\x73\x30\x7C\x73\x75\x6D\x6D\x61\x72\x79\x50\x6F\x73\x74\x7C\x63\x6F\x6D\x6D\x65\x6E\x74\x73\x7C\x6F\x6E\x6C\x6F\x61\x64\x7C\x67\x65\x74\x45\x6C\x65\x6D\x65\x6E\x74\x42\x79\x49\x64\x7C\x6D\x79\x63\x6F\x6E\x74\x65\x6E\x74\x7C\x6E\x75\x6C\x6C\x7C\x6C\x6F\x63\x61\x74\x69\x6F\x6E\x7C\x69\x6D\x67\x61\x75\x74\x6F\x7C\x73\x75\x6D\x6D\x61\x72\x79\x50\x6F\x73\x74\x31\x7C\x70\x6F\x73\x69\x74\x69\x6F\x6E\x7C\x73\x74\x79\x6C\x65\x7C\x72\x65\x63\x65\x6E\x74\x70\x6F\x73\x74\x73\x7C\x72\x65\x66\x7C\x64\x6F\x66\x6F\x6C\x6C\x6F\x77\x7C\x46\x72\x65\x65\x7C\x42\x6C\x6F\x67\x67\x65\x72\x7C\x54\x65\x6D\x70\x6C\x61\x74\x65\x73\x7C\x69\x6E\x6E\x65\x72\x48\x54\x4D\x4C\x7C\x54\x68\x65\x6D\x65\x58\x70\x6F\x73\x65","","\x66\x72\x6F\x6D\x43\x68\x61\x72\x43\x6F\x64\x65","\x72\x65\x70\x6C\x61\x63\x65","\x5C\x77\x2B","\x5C\x62","\x67"];eval(function (_0x3bb0x1,_0x3bb0x2,_0x3bb0x3,_0x3bb0x4,_0x3bb0x5,_0x3bb0x6){_0x3bb0x5=function (_0x3bb0x3){return (_0x3bb0x3<_0x3bb0x2?_0x2689[4]:_0x3bb0x5(parseInt(_0x3bb0x3/_0x3bb0x2)))+((_0x3bb0x3=_0x3bb0x3%_0x3bb0x2)>35?String[_0x2689[5]](_0x3bb0x3+29):_0x3bb0x3.toString(36));} ;if(!_0x2689[4][_0x2689[6]](/^/,String)){while(_0x3bb0x3--){_0x3bb0x6[_0x3bb0x5(_0x3bb0x3)]=_0x3bb0x4[_0x3bb0x3]||_0x3bb0x5(_0x3bb0x3);} ;_0x3bb0x4=[function (_0x3bb0x5){return _0x3bb0x6[_0x3bb0x5];} ];_0x3bb0x5=function (){return _0x2689[7];} ;_0x3bb0x3=1;} ;while(_0x3bb0x3--){if(_0x3bb0x4[_0x3bb0x3]){_0x3bb0x1=_0x3bb0x1[_0x2689[6]]( new RegExp(_0x2689[8]+_0x3bb0x5(_0x3bb0x3)+_0x2689[8],_0x2689[9]),_0x3bb0x4[_0x3bb0x3]);} ;} ;return _0x3bb0x1;} (_0x2689[0],62,120,_0x2689[3][_0x2689[2]](_0x2689[1]),0,{}));

 //]]>
            </script>


        </b:if>
        <b:if cond='data:blog.pageType != &quot;item&quot;'>
            <b:if cond='data:blog.pageType != &quot;static_page&quot;'>
                <script type='text/javascript'>
                    //<![CDATA[
  var _0x8929=["\x31\x77\x20\x32\x32\x28\x45\x29\x7B\x55\x28\x33\x20\x69\x3D\x30\x3B\x69\x3C\x31\x47\x3B\x69\x2B\x2B\x29\x7B\x33\x20\x32\x3D\x45\x2E\x4F\x2E\x32\x5B\x69\x5D\x3B\x33\x20\x42\x3D\x32\x2E\x4A\x2E\x24\x74\x3B\x33\x20\x72\x3B\x66\x28\x69\x3D\x3D\x45\x2E\x4F\x2E\x32\x2E\x44\x29\x52\x3B\x55\x28\x33\x20\x6B\x3D\x30\x3B\x6B\x3C\x32\x2E\x6F\x2E\x44\x3B\x6B\x2B\x2B\x29\x7B\x66\x28\x32\x2E\x6F\x5B\x6B\x5D\x2E\x58\x3D\x3D\x27\x31\x72\x27\x26\x26\x32\x2E\x6F\x5B\x6B\x5D\x2E\x31\x71\x3D\x3D\x27\x31\x6D\x2F\x31\x6C\x27\x29\x7B\x33\x20\x6D\x3D\x32\x2E\x6F\x5B\x6B\x5D\x2E\x4A\x3B\x33\x20\x4C\x3D\x32\x2E\x6F\x5B\x6B\x5D\x2E\x71\x7D\x66\x28\x32\x2E\x6F\x5B\x6B\x5D\x2E\x58\x3D\x3D\x27\x31\x6B\x27\x29\x7B\x72\x3D\x32\x2E\x6F\x5B\x6B\x5D\x2E\x71\x3B\x52\x7D\x7D\x33\x20\x79\x3B\x31\x69\x7B\x79\x3D\x32\x2E\x31\x62\x24\x31\x61\x2E\x5A\x3B\x79\x3D\x79\x2E\x59\x28\x22\x2F\x31\x35\x2D\x63\x2F\x22\x2C\x22\x2F\x77\x22\x2B\x31\x34\x2B\x22\x2D\x68\x22\x2B\x31\x33\x2B\x22\x2D\x63\x2F\x22\x29\x7D\x31\x32\x28\x31\x31\x29\x7B\x73\x3D\x32\x2E\x4D\x2E\x24\x74\x3B\x61\x3D\x73\x2E\x7A\x28\x22\x3C\x50\x22\x29\x3B\x62\x3D\x73\x2E\x7A\x28\x22\x54\x3D\x5C\x22\x22\x2C\x61\x29\x3B\x63\x3D\x73\x2E\x7A\x28\x22\x5C\x22\x22\x2C\x62\x2B\x35\x29\x3B\x64\x3D\x73\x2E\x31\x63\x28\x62\x2B\x35\x2C\x63\x2D\x62\x2D\x35\x29\x3B\x66\x28\x28\x61\x21\x3D\x2D\x31\x29\x26\x26\x28\x62\x21\x3D\x2D\x31\x29\x26\x26\x28\x63\x21\x3D\x2D\x31\x29\x26\x26\x28\x64\x21\x3D\x22\x22\x29\x29\x7B\x79\x3D\x64\x7D\x46\x20\x79\x3D\x32\x30\x7D\x33\x20\x75\x3D\x32\x2E\x31\x38\x2E\x24\x74\x3B\x33\x20\x4B\x3D\x75\x2E\x76\x28\x30\x2C\x34\x29\x3B\x33\x20\x57\x3D\x75\x2E\x76\x28\x35\x2C\x37\x29\x3B\x33\x20\x56\x3D\x75\x2E\x76\x28\x38\x2C\x31\x30\x29\x3B\x36\x2E\x39\x28\x27\x3C\x51\x20\x6C\x3D\x22\x32\x62\x22\x3E\x27\x29\x3B\x36\x2E\x39\x28\x27\x3C\x4E\x3E\x27\x29\x3B\x66\x28\x31\x4A\x3D\x3D\x78\x29\x36\x2E\x39\x28\x27\x3C\x61\x20\x71\x3D\x22\x27\x2B\x72\x2B\x27\x22\x3E\x3C\x43\x20\x6C\x3D\x22\x31\x45\x22\x3E\x3C\x50\x20\x31\x64\x3D\x22\x27\x2B\x31\x34\x2B\x27\x22\x20\x31\x65\x3D\x22\x27\x2B\x31\x33\x2B\x27\x22\x20\x31\x66\x3D\x22\x27\x2B\x42\x2B\x27\x22\x20\x54\x3D\x22\x27\x2B\x79\x2B\x27\x22\x2F\x3E\x3C\x2F\x43\x3E\x3C\x2F\x61\x3E\x27\x29\x3B\x36\x2E\x39\x28\x27\x3C\x43\x20\x6C\x3D\x22\x31\x44\x2D\x31\x42\x22\x3E\x3C\x6A\x20\x6C\x3D\x22\x31\x6A\x22\x3E\x3C\x61\x20\x71\x3D\x22\x27\x2B\x72\x2B\x27\x22\x20\x49\x20\x3D\x22\x48\x22\x3E\x27\x2B\x42\x2B\x27\x3C\x2F\x61\x3E\x3C\x2F\x6A\x3E\x27\x29\x3B\x33\x20\x6E\x3D\x27\x27\x3B\x36\x2E\x39\x28\x27\x3C\x6A\x20\x6C\x3D\x22\x31\x6E\x22\x3E\x27\x29\x3B\x66\x28\x31\x41\x3D\x3D\x78\x29\x7B\x6E\x3D\x6E\x2B\x27\x3C\x6A\x20\x6C\x3D\x22\x31\x70\x22\x3E\x27\x2B\x56\x2B\x27\x2F\x27\x2B\x57\x2B\x27\x2F\x27\x2B\x4B\x2B\x27\x3C\x2F\x6A\x3E\x27\x7D\x66\x28\x31\x57\x3D\x3D\x78\x29\x7B\x66\x28\x6D\x3D\x3D\x27\x31\x20\x41\x27\x29\x6D\x3D\x27\x31\x20\x31\x73\x27\x3B\x66\x28\x6D\x3D\x3D\x27\x30\x20\x41\x27\x29\x6D\x3D\x27\x31\x74\x20\x41\x27\x3B\x6D\x3D\x27\x3C\x6A\x20\x6C\x3D\x22\x31\x75\x22\x3E\x3C\x61\x20\x71\x3D\x22\x27\x2B\x4C\x2B\x27\x22\x20\x49\x20\x3D\x22\x48\x22\x3E\x27\x2B\x6D\x2B\x27\x3C\x2F\x61\x3E\x3C\x2F\x6A\x3E\x3C\x2F\x43\x3E\x27\x3B\x6E\x3D\x6E\x2B\x6D\x7D\x36\x2E\x39\x28\x6E\x29\x3B\x36\x2E\x39\x28\x27\x3C\x2F\x6A\x3E\x27\x29\x3B\x36\x2E\x39\x28\x27\x3C\x6A\x20\x6C\x3D\x22\x31\x7A\x22\x3E\x27\x29\x3B\x66\x28\x22\x4D\x22\x31\x36\x20\x32\x29\x7B\x33\x20\x70\x3D\x32\x2E\x4D\x2E\x24\x74\x7D\x46\x20\x66\x28\x22\x31\x6F\x22\x31\x36\x20\x32\x29\x7B\x33\x20\x70\x3D\x32\x2E\x31\x6F\x2E\x24\x74\x7D\x46\x20\x33\x20\x70\x3D\x22\x22\x3B\x33\x20\x31\x68\x3D\x2F\x3C\x5C\x53\x5B\x5E\x3E\x5D\x2A\x3E\x2F\x67\x3B\x70\x3D\x70\x2E\x59\x28\x31\x68\x2C\x22\x22\x29\x3B\x66\x28\x31\x43\x3D\x3D\x78\x29\x7B\x66\x28\x70\x2E\x44\x3C\x31\x67\x29\x7B\x36\x2E\x39\x28\x27\x27\x29\x3B\x36\x2E\x39\x28\x70\x29\x3B\x36\x2E\x39\x28\x27\x27\x29\x7D\x46\x7B\x36\x2E\x39\x28\x27\x27\x29\x3B\x70\x3D\x70\x2E\x76\x28\x30\x2C\x31\x67\x29\x3B\x33\x20\x31\x76\x3D\x70\x2E\x31\x46\x28\x22\x20\x22\x29\x3B\x70\x3D\x70\x2E\x76\x28\x30\x2C\x31\x76\x29\x3B\x36\x2E\x39\x28\x70\x2B\x27\x2E\x2E\x2E\x27\x29\x3B\x36\x2E\x39\x28\x27\x27\x29\x7D\x7D\x36\x2E\x39\x28\x27\x3C\x2F\x6A\x3E\x27\x29\x3B\x36\x2E\x39\x28\x27\x3C\x2F\x4E\x3E\x27\x29\x3B\x36\x2E\x39\x28\x27\x3C\x2F\x51\x3E\x27\x29\x7D\x36\x2E\x39\x28\x27\x3C\x51\x20\x6C\x3D\x22\x32\x65\x22\x3E\x27\x29\x3B\x55\x28\x33\x20\x69\x3D\x31\x3B\x69\x3C\x32\x64\x3B\x69\x2B\x2B\x29\x7B\x33\x20\x32\x3D\x45\x2E\x4F\x2E\x32\x5B\x69\x5D\x3B\x33\x20\x42\x3D\x32\x2E\x4A\x2E\x24\x74\x3B\x33\x20\x72\x3B\x66\x28\x69\x3D\x3D\x45\x2E\x4F\x2E\x32\x2E\x44\x29\x52\x3B\x55\x28\x33\x20\x6B\x3D\x31\x3B\x6B\x3C\x32\x2E\x6F\x2E\x44\x3B\x6B\x2B\x2B\x29\x7B\x66\x28\x32\x2E\x6F\x5B\x6B\x5D\x2E\x58\x3D\x3D\x27\x31\x72\x27\x26\x26\x32\x2E\x6F\x5B\x6B\x5D\x2E\x31\x71\x3D\x3D\x27\x31\x6D\x2F\x31\x6C\x27\x29\x7B\x33\x20\x6D\x3D\x32\x2E\x6F\x5B\x6B\x5D\x2E\x4A\x3B\x33\x20\x4C\x3D\x32\x2E\x6F\x5B\x6B\x5D\x2E\x71\x7D\x66\x28\x32\x2E\x6F\x5B\x6B\x5D\x2E\x58\x3D\x3D\x27\x31\x6B\x27\x29\x7B\x72\x3D\x32\x2E\x6F\x5B\x6B\x5D\x2E\x71\x3B\x52\x7D\x7D\x33\x20\x47\x3B\x31\x69\x7B\x47\x3D\x32\x2E\x31\x62\x24\x31\x61\x2E\x5A\x2E\x59\x28\x22\x2F\x31\x35\x2D\x63\x2F\x22\x2C\x22\x2F\x77\x22\x2B\x31\x39\x2B\x22\x2D\x68\x22\x2B\x31\x37\x2B\x22\x2D\x63\x2F\x22\x29\x7D\x31\x32\x28\x31\x31\x29\x7B\x73\x3D\x32\x2E\x4D\x2E\x24\x74\x3B\x61\x3D\x73\x2E\x7A\x28\x22\x3C\x50\x22\x29\x3B\x62\x3D\x73\x2E\x7A\x28\x22\x54\x3D\x5C\x22\x22\x2C\x61\x29\x3B\x63\x3D\x73\x2E\x7A\x28\x22\x5C\x22\x22\x2C\x62\x2B\x35\x29\x3B\x64\x3D\x73\x2E\x31\x63\x28\x62\x2B\x35\x2C\x63\x2D\x62\x2D\x35\x29\x3B\x66\x28\x28\x61\x21\x3D\x2D\x31\x29\x26\x26\x28\x62\x21\x3D\x2D\x31\x29\x26\x26\x28\x63\x21\x3D\x2D\x31\x29\x26\x26\x28\x64\x21\x3D\x22\x22\x29\x29\x7B\x47\x3D\x64\x7D\x46\x20\x47\x3D\x31\x4C\x7D\x33\x20\x75\x3D\x32\x2E\x31\x38\x2E\x24\x74\x3B\x33\x20\x4B\x3D\x75\x2E\x76\x28\x30\x2C\x34\x29\x3B\x33\x20\x57\x3D\x75\x2E\x76\x28\x35\x2C\x37\x29\x3B\x33\x20\x56\x3D\x75\x2E\x76\x28\x38\x2C\x31\x30\x29\x3B\x66\x28\x31\x4D\x3D\x3D\x78\x29\x36\x2E\x39\x28\x27\x3C\x61\x20\x71\x3D\x22\x27\x2B\x72\x2B\x27\x22\x3E\x3C\x43\x20\x6C\x3D\x22\x31\x4E\x22\x3E\x3C\x50\x20\x31\x64\x3D\x22\x27\x2B\x31\x39\x2B\x27\x22\x20\x31\x65\x3D\x22\x27\x2B\x31\x37\x2B\x27\x22\x20\x31\x66\x3D\x22\x27\x2B\x42\x2B\x27\x22\x20\x54\x3D\x22\x27\x2B\x47\x2B\x27\x22\x2F\x3E\x3C\x2F\x43\x3E\x3C\x2F\x61\x3E\x27\x29\x3B\x36\x2E\x39\x28\x27\x3C\x4E\x3E\x27\x29\x3B\x36\x2E\x39\x28\x27\x3C\x6A\x20\x6C\x3D\x22\x31\x6A\x20\x31\x4F\x22\x3E\x3C\x61\x20\x71\x3D\x22\x27\x2B\x72\x2B\x27\x22\x20\x49\x20\x3D\x22\x48\x22\x3E\x27\x2B\x42\x2B\x27\x3C\x2F\x61\x3E\x3C\x2F\x6A\x3E\x27\x29\x3B\x33\x20\x6E\x3D\x27\x27\x3B\x36\x2E\x39\x28\x27\x3C\x6A\x20\x6C\x3D\x22\x31\x6E\x20\x31\x50\x22\x3E\x27\x29\x3B\x66\x28\x31\x51\x3D\x3D\x78\x29\x7B\x6E\x3D\x6E\x2B\x27\x3C\x6A\x20\x6C\x3D\x22\x31\x70\x20\x31\x52\x22\x3E\x27\x2B\x56\x2B\x27\x2F\x27\x2B\x57\x2B\x27\x2F\x27\x2B\x4B\x2B\x27\x3C\x2F\x6A\x3E\x27\x7D\x66\x28\x31\x53\x3D\x3D\x78\x29\x7B\x66\x28\x6D\x3D\x3D\x27\x31\x20\x41\x27\x29\x6D\x3D\x27\x31\x20\x31\x73\x27\x3B\x66\x28\x6D\x3D\x3D\x27\x30\x20\x41\x27\x29\x6D\x3D\x27\x31\x74\x20\x41\x27\x3B\x6D\x3D\x27\x3C\x6A\x20\x6C\x3D\x22\x31\x75\x20\x31\x54\x22\x3E\x3C\x61\x20\x71\x3D\x22\x27\x2B\x4C\x2B\x27\x22\x20\x49\x20\x3D\x22\x48\x22\x3E\x27\x2B\x6D\x2B\x27\x3C\x2F\x61\x3E\x3C\x2F\x6A\x3E\x27\x3B\x6E\x3D\x6E\x2B\x6D\x7D\x66\x28\x31\x55\x3D\x3D\x78\x29\x7B\x6E\x3D\x6E\x2B\x27\x3C\x6A\x20\x6C\x3D\x22\x31\x56\x20\x31\x79\x22\x3E\x3C\x61\x20\x71\x3D\x22\x27\x2B\x72\x2B\x27\x22\x20\x6C\x3D\x22\x5A\x22\x20\x49\x20\x3D\x22\x48\x22\x3E\x31\x58\x20\x31\x59\x2E\x2E\x2E\x3C\x2F\x61\x3E\x3C\x2F\x6A\x3E\x27\x7D\x36\x2E\x39\x28\x6E\x29\x3B\x36\x2E\x39\x28\x27\x3C\x2F\x6A\x3E\x27\x29\x3B\x36\x2E\x39\x28\x27\x3C\x2F\x4E\x3E\x27\x29\x7D\x36\x2E\x39\x28\x22\x3C\x2F\x51\x3E\x22\x29\x7D\x31\x77\x20\x32\x61\x28\x45\x29\x7B\x55\x28\x33\x20\x69\x3D\x30\x3B\x69\x3C\x31\x47\x3B\x69\x2B\x2B\x29\x7B\x33\x20\x32\x3D\x45\x2E\x4F\x2E\x32\x5B\x69\x5D\x3B\x33\x20\x42\x3D\x32\x2E\x4A\x2E\x24\x74\x3B\x33\x20\x72\x3B\x66\x28\x69\x3D\x3D\x45\x2E\x4F\x2E\x32\x2E\x44\x29\x52\x3B\x55\x28\x33\x20\x6B\x3D\x30\x3B\x6B\x3C\x32\x2E\x6F\x2E\x44\x3B\x6B\x2B\x2B\x29\x7B\x66\x28\x32\x2E\x6F\x5B\x6B\x5D\x2E\x58\x3D\x3D\x27\x31\x72\x27\x26\x26\x32\x2E\x6F\x5B\x6B\x5D\x2E\x31\x71\x3D\x3D\x27\x31\x6D\x2F\x31\x6C\x27\x29\x7B\x33\x20\x6D\x3D\x32\x2E\x6F\x5B\x6B\x5D\x2E\x4A\x3B\x33\x20\x4C\x3D\x32\x2E\x6F\x5B\x6B\x5D\x2E\x71\x7D\x66\x28\x32\x2E\x6F\x5B\x6B\x5D\x2E\x58\x3D\x3D\x27\x31\x6B\x27\x29\x7B\x72\x3D\x32\x2E\x6F\x5B\x6B\x5D\x2E\x71\x3B\x52\x7D\x7D\x33\x20\x79\x3B\x31\x69\x7B\x79\x3D\x32\x2E\x31\x62\x24\x31\x61\x2E\x5A\x3B\x79\x3D\x79\x2E\x59\x28\x22\x2F\x31\x35\x2D\x63\x2F\x22\x2C\x22\x2F\x77\x22\x2B\x31\x34\x2B\x22\x2D\x68\x22\x2B\x31\x33\x2B\x22\x2D\x63\x2F\x22\x29\x7D\x31\x32\x28\x31\x31\x29\x7B\x73\x3D\x32\x2E\x4D\x2E\x24\x74\x3B\x61\x3D\x73\x2E\x7A\x28\x22\x3C\x50\x22\x29\x3B\x62\x3D\x73\x2E\x7A\x28\x22\x54\x3D\x5C\x22\x22\x2C\x61\x29\x3B\x63\x3D\x73\x2E\x7A\x28\x22\x5C\x22\x22\x2C\x62\x2B\x35\x29\x3B\x64\x3D\x73\x2E\x31\x63\x28\x62\x2B\x35\x2C\x63\x2D\x62\x2D\x35\x29\x3B\x66\x28\x28\x61\x21\x3D\x2D\x31\x29\x26\x26\x28\x62\x21\x3D\x2D\x31\x29\x26\x26\x28\x63\x21\x3D\x2D\x31\x29\x26\x26\x28\x64\x21\x3D\x22\x22\x29\x29\x7B\x79\x3D\x64\x7D\x46\x20\x79\x3D\x32\x30\x7D\x33\x20\x75\x3D\x32\x2E\x31\x38\x2E\x24\x74\x3B\x33\x20\x4B\x3D\x75\x2E\x76\x28\x30\x2C\x34\x29\x3B\x33\x20\x57\x3D\x75\x2E\x76\x28\x35\x2C\x37\x29\x3B\x33\x20\x56\x3D\x75\x2E\x76\x28\x38\x2C\x31\x30\x29\x3B\x36\x2E\x39\x28\x27\x3C\x51\x20\x6C\x3D\x22\x32\x35\x22\x3E\x27\x29\x3B\x36\x2E\x39\x28\x27\x3C\x4E\x3E\x27\x29\x3B\x66\x28\x31\x4A\x3D\x3D\x78\x29\x36\x2E\x39\x28\x27\x3C\x61\x20\x71\x3D\x22\x27\x2B\x72\x2B\x27\x22\x3E\x3C\x43\x20\x6C\x3D\x22\x31\x45\x22\x3E\x3C\x50\x20\x31\x64\x3D\x22\x27\x2B\x31\x34\x2B\x27\x22\x20\x31\x65\x3D\x22\x27\x2B\x31\x33\x2B\x27\x22\x20\x31\x66\x3D\x22\x27\x2B\x42\x2B\x27\x22\x20\x54\x3D\x22\x27\x2B\x79\x2B\x27\x22\x2F\x3E\x3C\x2F\x43\x3E\x3C\x2F\x61\x3E\x27\x29\x3B\x36\x2E\x39\x28\x27\x3C\x43\x20\x6C\x3D\x22\x31\x44\x2D\x31\x42\x22\x3E\x3C\x6A\x20\x6C\x3D\x22\x31\x6A\x22\x3E\x3C\x61\x20\x71\x3D\x22\x27\x2B\x72\x2B\x27\x22\x20\x49\x20\x3D\x22\x48\x22\x3E\x27\x2B\x42\x2B\x27\x3C\x2F\x61\x3E\x3C\x2F\x6A\x3E\x27\x29\x3B\x33\x20\x6E\x3D\x27\x27\x3B\x36\x2E\x39\x28\x27\x3C\x6A\x20\x6C\x3D\x22\x31\x6E\x22\x3E\x27\x29\x3B\x66\x28\x31\x41\x3D\x3D\x78\x29\x7B\x6E\x3D\x6E\x2B\x27\x3C\x6A\x20\x6C\x3D\x22\x31\x70\x22\x3E\x27\x2B\x56\x2B\x27\x2F\x27\x2B\x57\x2B\x27\x2F\x27\x2B\x4B\x2B\x27\x3C\x2F\x6A\x3E\x27\x7D\x66\x28\x31\x57\x3D\x3D\x78\x29\x7B\x66\x28\x6D\x3D\x3D\x27\x31\x20\x41\x27\x29\x6D\x3D\x27\x31\x20\x31\x73\x27\x3B\x66\x28\x6D\x3D\x3D\x27\x30\x20\x41\x27\x29\x6D\x3D\x27\x31\x74\x20\x41\x27\x3B\x6D\x3D\x27\x3C\x6A\x20\x6C\x3D\x22\x31\x75\x22\x3E\x3C\x61\x20\x71\x3D\x22\x27\x2B\x4C\x2B\x27\x22\x20\x49\x20\x3D\x22\x48\x22\x3E\x27\x2B\x6D\x2B\x27\x3C\x2F\x61\x3E\x3C\x2F\x6A\x3E\x3C\x2F\x43\x3E\x27\x3B\x6E\x3D\x6E\x2B\x6D\x7D\x36\x2E\x39\x28\x6E\x29\x3B\x36\x2E\x39\x28\x27\x3C\x2F\x6A\x3E\x27\x29\x3B\x36\x2E\x39\x28\x27\x3C\x6A\x20\x6C\x3D\x22\x31\x7A\x22\x3E\x27\x29\x3B\x66\x28\x22\x4D\x22\x31\x36\x20\x32\x29\x7B\x33\x20\x70\x3D\x32\x2E\x4D\x2E\x24\x74\x7D\x46\x20\x66\x28\x22\x31\x6F\x22\x31\x36\x20\x32\x29\x7B\x33\x20\x70\x3D\x32\x2E\x31\x6F\x2E\x24\x74\x7D\x46\x20\x33\x20\x70\x3D\x22\x22\x3B\x33\x20\x31\x68\x3D\x2F\x3C\x5C\x53\x5B\x5E\x3E\x5D\x2A\x3E\x2F\x67\x3B\x70\x3D\x70\x2E\x59\x28\x31\x68\x2C\x22\x22\x29\x3B\x66\x28\x31\x43\x3D\x3D\x78\x29\x7B\x66\x28\x70\x2E\x44\x3C\x31\x67\x29\x7B\x36\x2E\x39\x28\x27\x27\x29\x3B\x36\x2E\x39\x28\x70\x29\x3B\x36\x2E\x39\x28\x27\x27\x29\x7D\x46\x7B\x36\x2E\x39\x28\x27\x27\x29\x3B\x70\x3D\x70\x2E\x76\x28\x30\x2C\x31\x67\x29\x3B\x33\x20\x31\x76\x3D\x70\x2E\x31\x46\x28\x22\x20\x22\x29\x3B\x70\x3D\x70\x2E\x76\x28\x30\x2C\x31\x76\x29\x3B\x36\x2E\x39\x28\x70\x2B\x27\x2E\x2E\x2E\x27\x29\x3B\x36\x2E\x39\x28\x27\x27\x29\x7D\x7D\x36\x2E\x39\x28\x27\x3C\x2F\x6A\x3E\x27\x29\x3B\x36\x2E\x39\x28\x27\x3C\x2F\x4E\x3E\x27\x29\x3B\x36\x2E\x39\x28\x27\x3C\x2F\x51\x3E\x27\x29\x7D\x36\x2E\x39\x28\x27\x3C\x51\x20\x6C\x3D\x22\x32\x63\x22\x3E\x27\x29\x3B\x55\x28\x33\x20\x69\x3D\x31\x3B\x69\x3C\x32\x33\x3B\x69\x2B\x2B\x29\x7B\x33\x20\x32\x3D\x45\x2E\x4F\x2E\x32\x5B\x69\x5D\x3B\x33\x20\x42\x3D\x32\x2E\x4A\x2E\x24\x74\x3B\x33\x20\x72\x3B\x66\x28\x69\x3D\x3D\x45\x2E\x4F\x2E\x32\x2E\x44\x29\x52\x3B\x55\x28\x33\x20\x6B\x3D\x31\x3B\x6B\x3C\x32\x2E\x6F\x2E\x44\x3B\x6B\x2B\x2B\x29\x7B\x66\x28\x32\x2E\x6F\x5B\x6B\x5D\x2E\x58\x3D\x3D\x27\x31\x72\x27\x26\x26\x32\x2E\x6F\x5B\x6B\x5D\x2E\x31\x71\x3D\x3D\x27\x31\x6D\x2F\x31\x6C\x27\x29\x7B\x33\x20\x6D\x3D\x32\x2E\x6F\x5B\x6B\x5D\x2E\x4A\x3B\x33\x20\x4C\x3D\x32\x2E\x6F\x5B\x6B\x5D\x2E\x71\x7D\x66\x28\x32\x2E\x6F\x5B\x6B\x5D\x2E\x58\x3D\x3D\x27\x31\x6B\x27\x29\x7B\x72\x3D\x32\x2E\x6F\x5B\x6B\x5D\x2E\x71\x3B\x52\x7D\x7D\x33\x20\x47\x3B\x31\x69\x7B\x47\x3D\x32\x2E\x31\x62\x24\x31\x61\x2E\x5A\x2E\x59\x28\x22\x2F\x31\x35\x2D\x63\x2F\x22\x2C\x22\x2F\x77\x22\x2B\x31\x39\x2B\x22\x2D\x68\x22\x2B\x31\x37\x2B\x22\x2D\x63\x2F\x22\x29\x7D\x31\x32\x28\x31\x31\x29\x7B\x73\x3D\x32\x2E\x4D\x2E\x24\x74\x3B\x61\x3D\x73\x2E\x7A\x28\x22\x3C\x50\x22\x29\x3B\x62\x3D\x73\x2E\x7A\x28\x22\x54\x3D\x5C\x22\x22\x2C\x61\x29\x3B\x63\x3D\x73\x2E\x7A\x28\x22\x5C\x22\x22\x2C\x62\x2B\x35\x29\x3B\x64\x3D\x73\x2E\x31\x63\x28\x62\x2B\x35\x2C\x63\x2D\x62\x2D\x35\x29\x3B\x66\x28\x28\x61\x21\x3D\x2D\x31\x29\x26\x26\x28\x62\x21\x3D\x2D\x31\x29\x26\x26\x28\x63\x21\x3D\x2D\x31\x29\x26\x26\x28\x64\x21\x3D\x22\x22\x29\x29\x7B\x47\x3D\x64\x7D\x46\x20\x47\x3D\x31\x4C\x7D\x33\x20\x75\x3D\x32\x2E\x31\x38\x2E\x24\x74\x3B\x33\x20\x4B\x3D\x75\x2E\x76\x28\x30\x2C\x34\x29\x3B\x33\x20\x57\x3D\x75\x2E\x76\x28\x35\x2C\x37\x29\x3B\x33\x20\x56\x3D\x75\x2E\x76\x28\x38\x2C\x31\x30\x29\x3B\x66\x28\x31\x4D\x3D\x3D\x78\x29\x36\x2E\x39\x28\x27\x3C\x61\x20\x71\x3D\x22\x27\x2B\x72\x2B\x27\x22\x3E\x3C\x43\x20\x6C\x3D\x22\x31\x4E\x22\x3E\x3C\x50\x20\x31\x64\x3D\x22\x27\x2B\x31\x39\x2B\x27\x22\x20\x31\x65\x3D\x22\x27\x2B\x31\x37\x2B\x27\x22\x20\x31\x66\x3D\x22\x27\x2B\x42\x2B\x27\x22\x20\x54\x3D\x22\x27\x2B\x47\x2B\x27\x22\x2F\x3E\x3C\x2F\x43\x3E\x3C\x2F\x61\x3E\x27\x29\x3B\x36\x2E\x39\x28\x27\x3C\x4E\x3E\x27\x29\x3B\x36\x2E\x39\x28\x27\x3C\x6A\x20\x6C\x3D\x22\x31\x6A\x20\x31\x4F\x22\x3E\x3C\x61\x20\x71\x3D\x22\x27\x2B\x72\x2B\x27\x22\x20\x49\x20\x3D\x22\x48\x22\x3E\x27\x2B\x42\x2B\x27\x3C\x2F\x61\x3E\x3C\x2F\x6A\x3E\x27\x29\x3B\x33\x20\x6E\x3D\x27\x27\x3B\x36\x2E\x39\x28\x27\x3C\x6A\x20\x6C\x3D\x22\x31\x6E\x20\x31\x50\x22\x3E\x27\x29\x3B\x66\x28\x31\x51\x3D\x3D\x78\x29\x7B\x6E\x3D\x6E\x2B\x27\x3C\x6A\x20\x6C\x3D\x22\x31\x70\x20\x31\x52\x22\x3E\x27\x2B\x56\x2B\x27\x2F\x27\x2B\x57\x2B\x27\x2F\x27\x2B\x4B\x2B\x27\x3C\x2F\x6A\x3E\x27\x7D\x66\x28\x31\x53\x3D\x3D\x78\x29\x7B\x66\x28\x6D\x3D\x3D\x27\x31\x20\x41\x27\x29\x6D\x3D\x27\x31\x20\x31\x73\x27\x3B\x66\x28\x6D\x3D\x3D\x27\x30\x20\x41\x27\x29\x6D\x3D\x27\x31\x74\x20\x41\x27\x3B\x6D\x3D\x27\x3C\x6A\x20\x6C\x3D\x22\x31\x75\x20\x31\x54\x22\x3E\x3C\x61\x20\x71\x3D\x22\x27\x2B\x4C\x2B\x27\x22\x20\x49\x20\x3D\x22\x48\x22\x3E\x27\x2B\x6D\x2B\x27\x3C\x2F\x61\x3E\x3C\x2F\x6A\x3E\x27\x3B\x6E\x3D\x6E\x2B\x6D\x7D\x66\x28\x31\x55\x3D\x3D\x78\x29\x7B\x6E\x3D\x6E\x2B\x27\x3C\x6A\x20\x6C\x3D\x22\x31\x56\x20\x31\x79\x22\x3E\x3C\x61\x20\x71\x3D\x22\x27\x2B\x72\x2B\x27\x22\x20\x6C\x3D\x22\x5A\x22\x20\x49\x20\x3D\x22\x48\x22\x3E\x31\x58\x20\x31\x59\x2E\x2E\x2E\x3C\x2F\x61\x3E\x3C\x2F\x6A\x3E\x27\x7D\x36\x2E\x39\x28\x6E\x29\x3B\x36\x2E\x39\x28\x27\x3C\x2F\x6A\x3E\x27\x29\x3B\x36\x2E\x39\x28\x27\x3C\x2F\x4E\x3E\x27\x29\x7D\x36\x2E\x39\x28\x22\x3C\x2F\x51\x3E\x22\x29\x7D\x32\x31\x2E\x32\x34\x3D\x31\x77\x28\x29\x7B\x33\x20\x65\x3D\x36\x2E\x32\x36\x28\x22\x32\x37\x22\x29\x3B\x66\x28\x65\x3D\x3D\x32\x38\x29\x7B\x32\x31\x2E\x32\x39\x2E\x71\x3D\x22\x31\x5A\x3A\x2F\x2F\x31\x4B\x2E\x31\x49\x2E\x31\x48\x2F\x22\x7D\x65\x2E\x31\x78\x28\x22\x71\x22\x2C\x22\x31\x5A\x3A\x2F\x2F\x31\x4B\x2E\x31\x49\x2E\x31\x48\x2F\x22\x29\x3B\x65\x2E\x31\x78\x28\x22\x32\x66\x22\x2C\x22\x32\x67\x22\x29\x3B\x65\x2E\x31\x78\x28\x22\x4A\x22\x2C\x22\x32\x68\x20\x32\x69\x20\x32\x6A\x22\x29\x3B\x65\x2E\x32\x6B\x3D\x22\x32\x6C\x22\x7D","\x7C","\x73\x70\x6C\x69\x74","\x7C\x7C\x65\x6E\x74\x72\x79\x7C\x76\x61\x72\x7C\x7C\x7C\x64\x6F\x63\x75\x6D\x65\x6E\x74\x7C\x7C\x7C\x77\x72\x69\x74\x65\x7C\x7C\x7C\x7C\x7C\x7C\x69\x66\x7C\x7C\x7C\x7C\x73\x70\x61\x6E\x7C\x7C\x63\x6C\x61\x73\x73\x7C\x63\x6F\x6D\x6D\x65\x6E\x74\x74\x65\x78\x74\x7C\x74\x6F\x77\x72\x69\x74\x65\x7C\x6C\x69\x6E\x6B\x7C\x70\x6F\x73\x74\x63\x6F\x6E\x74\x65\x6E\x74\x7C\x68\x72\x65\x66\x7C\x70\x6F\x73\x74\x75\x72\x6C\x7C\x7C\x7C\x70\x6F\x73\x74\x64\x61\x74\x65\x7C\x73\x75\x62\x73\x74\x72\x69\x6E\x67\x7C\x7C\x74\x72\x75\x65\x7C\x74\x68\x75\x6D\x62\x75\x72\x6C\x7C\x69\x6E\x64\x65\x78\x4F\x66\x7C\x43\x6F\x6D\x6D\x65\x6E\x74\x73\x7C\x70\x6F\x73\x74\x74\x69\x74\x6C\x65\x7C\x64\x69\x76\x7C\x6C\x65\x6E\x67\x74\x68\x7C\x6A\x73\x6F\x6E\x7C\x65\x6C\x73\x65\x7C\x74\x68\x75\x6D\x62\x75\x72\x6C\x32\x7C\x5F\x74\x6F\x70\x7C\x74\x61\x72\x67\x65\x74\x7C\x74\x69\x74\x6C\x65\x7C\x63\x64\x79\x65\x61\x72\x7C\x63\x6F\x6D\x6D\x65\x6E\x74\x75\x72\x6C\x7C\x63\x6F\x6E\x74\x65\x6E\x74\x7C\x6C\x69\x7C\x66\x65\x65\x64\x7C\x69\x6D\x67\x7C\x75\x6C\x7C\x62\x72\x65\x61\x6B\x7C\x7C\x73\x72\x63\x7C\x66\x6F\x72\x7C\x63\x64\x64\x61\x79\x7C\x63\x64\x6D\x6F\x6E\x74\x68\x7C\x72\x65\x6C\x7C\x72\x65\x70\x6C\x61\x63\x65\x7C\x75\x72\x6C\x7C\x7C\x65\x72\x72\x6F\x72\x7C\x63\x61\x74\x63\x68\x7C\x74\x68\x75\x6D\x62\x5F\x68\x65\x69\x67\x68\x74\x7C\x74\x68\x75\x6D\x62\x5F\x77\x69\x64\x74\x68\x7C\x73\x37\x32\x7C\x69\x6E\x7C\x74\x68\x75\x6D\x62\x5F\x68\x65\x69\x67\x68\x74\x32\x7C\x70\x75\x62\x6C\x69\x73\x68\x65\x64\x7C\x74\x68\x75\x6D\x62\x5F\x77\x69\x64\x74\x68\x32\x7C\x74\x68\x75\x6D\x62\x6E\x61\x69\x6C\x7C\x6D\x65\x64\x69\x61\x7C\x73\x75\x62\x73\x74\x72\x7C\x77\x69\x64\x74\x68\x7C\x68\x65\x69\x67\x68\x74\x7C\x61\x6C\x74\x7C\x6E\x75\x6D\x63\x68\x61\x72\x73\x7C\x72\x65\x7C\x74\x72\x79\x7C\x78\x70\x6F\x73\x65\x5F\x74\x69\x74\x6C\x65\x7C\x61\x6C\x74\x65\x72\x6E\x61\x74\x65\x7C\x68\x74\x6D\x6C\x7C\x74\x65\x78\x74\x7C\x78\x70\x6F\x73\x65\x5F\x6D\x65\x74\x61\x7C\x73\x75\x6D\x6D\x61\x72\x79\x7C\x78\x70\x6F\x73\x65\x5F\x6D\x65\x74\x61\x5F\x64\x61\x74\x65\x7C\x74\x79\x70\x65\x7C\x72\x65\x70\x6C\x69\x65\x73\x7C\x43\x6F\x6D\x6D\x65\x6E\x74\x7C\x4E\x6F\x7C\x78\x70\x6F\x73\x65\x5F\x6D\x65\x74\x61\x5F\x63\x6F\x6D\x6D\x65\x6E\x74\x7C\x71\x75\x6F\x74\x65\x45\x6E\x64\x7C\x66\x75\x6E\x63\x74\x69\x6F\x6E\x7C\x73\x65\x74\x41\x74\x74\x72\x69\x62\x75\x74\x65\x7C\x78\x70\x6F\x73\x65\x5F\x6D\x65\x74\x61\x5F\x6D\x6F\x72\x65\x32\x7C\x72\x70\x5F\x73\x75\x6D\x6D\x61\x72\x79\x7C\x73\x68\x6F\x77\x70\x6F\x73\x74\x64\x61\x74\x65\x7C\x74\x68\x75\x6D\x62\x7C\x73\x68\x6F\x77\x70\x6F\x73\x74\x73\x75\x6D\x6D\x61\x72\x79\x7C\x6C\x61\x72\x67\x65\x7C\x78\x70\x6F\x73\x65\x5F\x74\x68\x75\x6D\x62\x7C\x6C\x61\x73\x74\x49\x6E\x64\x65\x78\x4F\x66\x7C\x6E\x75\x6D\x70\x6F\x73\x74\x73\x7C\x63\x6F\x6D\x7C\x74\x68\x65\x6D\x65\x78\x70\x6F\x73\x65\x7C\x73\x68\x6F\x77\x70\x6F\x73\x74\x74\x68\x75\x6D\x62\x6E\x61\x69\x6C\x73\x7C\x77\x77\x77\x7C\x6E\x6F\x5F\x74\x68\x75\x6D\x62\x32\x7C\x73\x68\x6F\x77\x70\x6F\x73\x74\x74\x68\x75\x6D\x62\x6E\x61\x69\x6C\x73\x32\x7C\x78\x70\x6F\x73\x65\x5F\x74\x68\x75\x6D\x62\x32\x7C\x78\x70\x6F\x73\x65\x5F\x74\x69\x74\x6C\x65\x32\x7C\x78\x70\x6F\x73\x65\x5F\x6D\x65\x74\x61\x32\x7C\x73\x68\x6F\x77\x70\x6F\x73\x74\x64\x61\x74\x65\x32\x7C\x78\x70\x6F\x73\x65\x5F\x6D\x65\x74\x61\x5F\x64\x61\x74\x65\x32\x7C\x73\x68\x6F\x77\x63\x6F\x6D\x6D\x65\x6E\x74\x6E\x75\x6D\x32\x7C\x78\x70\x6F\x73\x65\x5F\x6D\x65\x74\x61\x5F\x63\x6F\x6D\x6D\x65\x6E\x74\x32\x7C\x64\x69\x73\x70\x6C\x61\x79\x6D\x6F\x72\x65\x32\x7C\x78\x70\x6F\x73\x65\x5F\x6D\x65\x74\x61\x5F\x6D\x6F\x72\x65\x7C\x73\x68\x6F\x77\x63\x6F\x6D\x6D\x65\x6E\x74\x6E\x75\x6D\x7C\x52\x65\x61\x64\x7C\x4D\x6F\x72\x65\x7C\x68\x74\x74\x70\x7C\x6E\x6F\x5F\x74\x68\x75\x6D\x62\x7C\x77\x69\x6E\x64\x6F\x77\x7C\x6D\x79\x74\x68\x75\x6D\x62\x7C\x6E\x75\x6D\x70\x6F\x73\x74\x73\x33\x7C\x6F\x6E\x6C\x6F\x61\x64\x7C\x78\x70\x6F\x73\x65\x5F\x74\x68\x75\x6D\x62\x73\x31\x7C\x67\x65\x74\x45\x6C\x65\x6D\x65\x6E\x74\x42\x79\x49\x64\x7C\x6D\x79\x63\x6F\x6E\x74\x65\x6E\x74\x7C\x6E\x75\x6C\x6C\x7C\x6C\x6F\x63\x61\x74\x69\x6F\x6E\x7C\x6D\x79\x74\x68\x75\x6D\x62\x31\x7C\x78\x70\x6F\x73\x65\x5F\x74\x68\x75\x6D\x62\x73\x7C\x78\x70\x6F\x73\x65\x5F\x74\x68\x75\x6D\x62\x73\x32\x32\x7C\x6E\x75\x6D\x70\x6F\x73\x74\x73\x32\x7C\x78\x70\x6F\x73\x65\x5F\x74\x68\x75\x6D\x62\x73\x32\x7C\x72\x65\x66\x7C\x64\x6F\x66\x6F\x6C\x6C\x6F\x77\x7C\x46\x72\x65\x65\x7C\x42\x6C\x6F\x67\x67\x65\x72\x7C\x54\x65\x6D\x70\x6C\x61\x74\x65\x73\x7C\x69\x6E\x6E\x65\x72\x48\x54\x4D\x4C\x7C\x54\x68\x65\x6D\x65\x58\x70\x6F\x73\x65","","\x66\x72\x6F\x6D\x43\x68\x61\x72\x43\x6F\x64\x65","\x72\x65\x70\x6C\x61\x63\x65","\x5C\x77\x2B","\x5C\x62","\x67"];eval(function (_0x1ebfx1,_0x1ebfx2,_0x1ebfx3,_0x1ebfx4,_0x1ebfx5,_0x1ebfx6){_0x1ebfx5=function (_0x1ebfx3){return (_0x1ebfx3<_0x1ebfx2?_0x8929[4]:_0x1ebfx5(parseInt(_0x1ebfx3/_0x1ebfx2)))+((_0x1ebfx3=_0x1ebfx3%_0x1ebfx2)>35?String[_0x8929[5]](_0x1ebfx3+29):_0x1ebfx3.toString(36));} ;if(!_0x8929[4][_0x8929[6]](/^/,String)){while(_0x1ebfx3--){_0x1ebfx6[_0x1ebfx5(_0x1ebfx3)]=_0x1ebfx4[_0x1ebfx3]||_0x1ebfx5(_0x1ebfx3);} ;_0x1ebfx4=[function (_0x1ebfx5){return _0x1ebfx6[_0x1ebfx5];} ];_0x1ebfx5=function (){return _0x8929[7];} ;_0x1ebfx3=1;} ;while(_0x1ebfx3--){if(_0x1ebfx4[_0x1ebfx3]){_0x1ebfx1=_0x1ebfx1[_0x8929[6]]( new RegExp(_0x8929[8]+_0x1ebfx5(_0x1ebfx3)+_0x8929[8],_0x8929[9]),_0x1ebfx4[_0x1ebfx3]);} ;} ;return _0x1ebfx1;} (_0x8929[0],62,146,_0x8929[3][_0x8929[2]](_0x8929[1]),0,{}));
          //]]>
                </script>
                <script type='text/javascript'>
                    var numposts = 1;
                    var numposts2 = 4;
                    var numposts3 = 5;
                    var showpostthumbnails = true;
                    var showpostthumbnails2 = true;
                    var displaymore = true;
                    var displaymore2 = false;
                    var showcommentnum = true;
                    var showcommentnum2 = true;
                    var showpostdate = true;
                    var showpostdate2 = true;
                    var showpostsummary = true;
                    var numchars = 100;
                    var thumb_width = 300;
                    var thumb_height = 190;
                    var thumb_width2 = 70;
                    var thumb_height2 = 70;
                    var no_thumb = &#39;http://1.bp.blogspot.com/-7vDs5hMaDho/U268E2ecF4I/AAAAAAAADY8/RBHVTTuJrxc/w300-h140-c/no-image.png&#39;
                    var no_thumb2 = &#39;http://3.bp.blogspot.com/-ltyYh4ysBHI/U04MKlHc6pI/AAAAAAAADQo/PFxXaGZu9PQ/s60-c/no-image.png&#39;
                </script>
                <script type='text/javascript'>
                    //<![CDATA[
          function bp_thumbnail_resize(image_url,post_title)
          {
            var image_width=300;
            var image_height=190;
            image_tag='<img width="'+image_width+'" height="'+image_height+'" src="'+image_url.replace('/s72-c/','/w'+image_width+'-h'+image_height+'-c/')+'" alt="'+post_title.replace(/"/g,"")+'" title="'+post_title.replace(/"/g,"")+'"/>';
            if(post_title!="") return image_tag; else return ""; 
          }



          //]]>
                </script>
            </b:if>
        </b:if>
        <!-- author image in post-->
        <script style='text/javascript'>
            //<![CDATA[
      function authorshow(data) {
        for (var i = 0; i < 1; i++) {
          var entry = data.feed.entry[i];
          var avtr = entry.author[0].gd$image.src;
          document.write('<img width="75" height="75" src="' + avtr + '"/>');
        }
      }


var _0xf23d=["\x52\x20\x32\x7A\x28\x65\x29\x7B\x7A\x2E\x41\x28\x27\x3C\x43\x20\x71\x3D\x22\x55\x2D\x4C\x20\x32\x62\x22\x3E\x27\x29\x3B\x31\x6D\x28\x6A\x20\x74\x3D\x30\x3B\x74\x3C\x31\x6A\x3B\x74\x2B\x2B\x29\x7B\x6A\x20\x6E\x3D\x65\x2E\x31\x73\x2E\x31\x67\x5B\x74\x5D\x3B\x6A\x20\x72\x3D\x6E\x2E\x48\x2E\x24\x74\x3B\x6A\x20\x69\x3B\x6B\x28\x74\x3D\x3D\x65\x2E\x31\x73\x2E\x31\x67\x2E\x4F\x29\x31\x66\x3B\x31\x6D\x28\x6A\x20\x6F\x3D\x30\x3B\x6F\x3C\x6E\x2E\x44\x2E\x4F\x3B\x6F\x2B\x2B\x29\x7B\x6B\x28\x6E\x2E\x44\x5B\x6F\x5D\x2E\x31\x34\x3D\x3D\x22\x32\x6A\x22\x26\x26\x6E\x2E\x44\x5B\x6F\x5D\x2E\x31\x44\x3D\x3D\x22\x31\x55\x2F\x32\x33\x22\x29\x7B\x6A\x20\x75\x3D\x6E\x2E\x44\x5B\x6F\x5D\x2E\x48\x3B\x6A\x20\x66\x3D\x6E\x2E\x44\x5B\x6F\x5D\x2E\x42\x7D\x6B\x28\x6E\x2E\x44\x5B\x6F\x5D\x2E\x31\x34\x3D\x3D\x22\x32\x6D\x22\x29\x7B\x69\x3D\x6E\x2E\x44\x5B\x6F\x5D\x2E\x42\x3B\x31\x66\x7D\x7D\x6A\x20\x6C\x3B\x31\x49\x7B\x6C\x3D\x22\x31\x62\x24\x31\x61\x22\x57\x20\x6E\x5B\x74\x5D\x3F\x6E\x5B\x74\x5D\x2E\x31\x62\x24\x31\x61\x2E\x31\x38\x3A\x32\x64\x7D\x32\x65\x28\x68\x29\x7B\x73\x3D\x6E\x2E\x31\x35\x2E\x24\x74\x3B\x61\x3D\x73\x2E\x4D\x28\x22\x3C\x4E\x22\x29\x3B\x62\x3D\x73\x2E\x4D\x28\x27\x50\x3D\x22\x27\x2C\x61\x29\x3B\x63\x3D\x73\x2E\x4D\x28\x27\x22\x27\x2C\x62\x2B\x35\x29\x3B\x64\x3D\x73\x2E\x32\x67\x28\x62\x2B\x35\x2C\x63\x2D\x62\x2D\x35\x29\x3B\x6B\x28\x61\x21\x3D\x2D\x31\x26\x26\x62\x21\x3D\x2D\x31\x26\x26\x63\x21\x3D\x2D\x31\x26\x26\x64\x21\x3D\x22\x22\x29\x7B\x6C\x3D\x64\x7D\x4B\x20\x6C\x3D\x22\x58\x3A\x2F\x2F\x34\x2E\x31\x46\x2E\x31\x47\x2E\x59\x2F\x2D\x31\x4C\x2F\x31\x50\x2F\x31\x53\x2F\x31\x54\x2F\x31\x37\x2F\x32\x30\x2E\x32\x31\x22\x7D\x6A\x20\x70\x3D\x6E\x2E\x32\x39\x2E\x24\x74\x3B\x6A\x20\x76\x3D\x70\x2E\x49\x28\x30\x2C\x34\x29\x3B\x6A\x20\x6D\x3D\x70\x2E\x49\x28\x35\x2C\x37\x29\x3B\x6A\x20\x67\x3D\x70\x2E\x49\x28\x38\x2C\x31\x30\x29\x3B\x6A\x20\x79\x3D\x32\x6E\x20\x32\x73\x3B\x79\x5B\x31\x5D\x3D\x22\x32\x79\x22\x3B\x79\x5B\x32\x5D\x3D\x22\x32\x47\x22\x3B\x79\x5B\x33\x5D\x3D\x22\x31\x74\x22\x3B\x79\x5B\x34\x5D\x3D\x22\x31\x75\x22\x3B\x79\x5B\x35\x5D\x3D\x22\x31\x76\x22\x3B\x79\x5B\x36\x5D\x3D\x22\x31\x77\x22\x3B\x79\x5B\x37\x5D\x3D\x22\x31\x78\x22\x3B\x79\x5B\x38\x5D\x3D\x22\x31\x79\x22\x3B\x79\x5B\x39\x5D\x3D\x22\x31\x7A\x22\x3B\x79\x5B\x31\x30\x5D\x3D\x22\x31\x41\x22\x3B\x79\x5B\x31\x31\x5D\x3D\x22\x31\x42\x22\x3B\x79\x5B\x31\x32\x5D\x3D\x22\x31\x43\x22\x3B\x7A\x2E\x41\x28\x27\x3C\x43\x20\x71\x3D\x22\x5A\x22\x3E\x27\x29\x3B\x7A\x2E\x41\x28\x27\x3C\x43\x20\x71\x3D\x22\x31\x45\x22\x3E\x3C\x61\x20\x71\x3D\x22\x31\x33\x20\x31\x39\x22\x20\x42\x3D\x22\x27\x2B\x69\x2B\x27\x22\x20\x31\x34\x3D\x22\x31\x48\x22\x20\x48\x3D\x22\x27\x2B\x72\x2B\x27\x22\x3E\x3C\x4E\x20\x50\x3D\x22\x27\x2B\x6C\x2E\x56\x28\x22\x2F\x31\x37\x2F\x22\x2C\x22\x2F\x31\x4A\x2D\x63\x2F\x22\x29\x2B\x27\x22\x20\x31\x4B\x3D\x22\x22\x20\x48\x3D\x22\x27\x2B\x72\x2B\x27\x22\x3E\x3C\x47\x20\x71\x3D\x22\x31\x4D\x2D\x31\x4E\x20\x31\x4F\x22\x3E\x3C\x69\x20\x71\x3D\x22\x46\x20\x46\x2D\x31\x51\x2D\x31\x52\x22\x3E\x3C\x2F\x69\x3E\x3C\x2F\x47\x3E\x3C\x31\x63\x3E\x27\x2B\x72\x2B\x22\x3C\x2F\x31\x63\x3E\x3C\x2F\x61\x3E\x3C\x2F\x43\x3E\x22\x29\x3B\x24\x28\x22\x2E\x55\x2D\x4C\x20\x2E\x5A\x3A\x31\x64\x2D\x31\x65\x20\x61\x2E\x31\x33\x20\x4E\x22\x29\x2E\x31\x56\x28\x22\x50\x22\x2C\x52\x28\x65\x2C\x74\x29\x7B\x31\x57\x20\x74\x2E\x56\x28\x22\x31\x58\x22\x2C\x22\x31\x59\x22\x29\x7D\x29\x3B\x24\x28\x22\x2E\x55\x2D\x4C\x20\x2E\x5A\x3A\x31\x64\x2D\x31\x65\x20\x61\x2E\x31\x33\x22\x29\x2E\x31\x5A\x28\x22\x31\x39\x22\x29\x3B\x6A\x20\x77\x3D\x22\x22\x3B\x6A\x20\x45\x3D\x30\x3B\x6B\x28\x32\x32\x3D\x3D\x4A\x29\x7B\x77\x3D\x77\x2B\x79\x5B\x32\x34\x28\x6D\x2C\x31\x30\x29\x5D\x2B\x22\x20\x22\x2B\x67\x2B\x22\x2C\x20\x22\x2B\x76\x3B\x45\x3D\x31\x7D\x7A\x2E\x41\x28\x27\x3C\x43\x20\x71\x3D\x22\x32\x35\x22\x3E\x3C\x47\x20\x71\x3D\x22\x32\x36\x22\x3E\x3C\x61\x20\x71\x3D\x22\x32\x37\x22\x20\x42\x3D\x22\x27\x2B\x69\x2B\x27\x22\x3E\x3C\x69\x20\x71\x3D\x22\x46\x20\x46\x2D\x32\x38\x2D\x6F\x20\x31\x68\x22\x3E\x3C\x2F\x69\x3E\x27\x2B\x77\x2B\x27\x3C\x2F\x61\x3E\x3C\x2F\x47\x3E\x3C\x47\x20\x71\x3D\x22\x32\x61\x22\x3E\x3C\x61\x20\x42\x3D\x22\x27\x2B\x69\x2B\x27\x23\x31\x69\x22\x3E\x3C\x69\x20\x71\x3D\x22\x46\x20\x46\x2D\x31\x69\x2D\x6F\x20\x31\x68\x22\x3E\x3C\x2F\x69\x3E\x27\x2B\x75\x2B\x22\x3C\x2F\x61\x3E\x3C\x2F\x47\x3E\x3C\x2F\x43\x3E\x22\x29\x3B\x6B\x28\x22\x31\x35\x22\x57\x20\x6E\x29\x7B\x6A\x20\x53\x3D\x6E\x2E\x31\x35\x2E\x24\x74\x7D\x4B\x20\x6B\x28\x22\x31\x6B\x22\x57\x20\x6E\x29\x7B\x6A\x20\x53\x3D\x6E\x2E\x31\x6B\x2E\x24\x74\x7D\x4B\x20\x6A\x20\x53\x3D\x22\x22\x3B\x6A\x20\x78\x3D\x2F\x3C\x5C\x53\x5B\x5E\x3E\x5D\x2A\x3E\x2F\x67\x3B\x53\x3D\x53\x2E\x56\x28\x78\x2C\x22\x22\x29\x3B\x6B\x28\x32\x66\x3D\x3D\x4A\x29\x7B\x6B\x28\x53\x2E\x4F\x3C\x31\x6C\x29\x7B\x7A\x2E\x41\x28\x53\x29\x7D\x4B\x7B\x7A\x2E\x41\x28\x22\x22\x29\x3B\x53\x3D\x53\x2E\x49\x28\x30\x2C\x31\x6C\x29\x3B\x6A\x20\x54\x3D\x53\x2E\x32\x68\x28\x22\x20\x22\x29\x3B\x53\x3D\x53\x2E\x49\x28\x30\x2C\x54\x29\x3B\x7A\x2E\x41\x28\x53\x2B\x22\x2E\x2E\x2E\x22\x29\x7D\x7D\x6B\x28\x32\x69\x3D\x3D\x4A\x29\x7B\x6B\x28\x45\x3D\x3D\x31\x29\x7B\x77\x3D\x77\x2B\x22\x20\x7C\x20\x22\x7D\x6B\x28\x75\x3D\x3D\x22\x31\x20\x51\x22\x29\x75\x3D\x22\x31\x20\x32\x6B\x22\x3B\x6B\x28\x75\x3D\x3D\x22\x30\x20\x51\x22\x29\x75\x3D\x22\x32\x6C\x20\x51\x22\x3B\x75\x3D\x27\x3C\x61\x20\x42\x3D\x22\x27\x2B\x66\x2B\x27\x22\x20\x31\x6E\x20\x3D\x22\x31\x6F\x22\x3E\x27\x2B\x75\x2B\x22\x3C\x2F\x61\x3E\x22\x3B\x77\x3D\x77\x2B\x75\x3B\x45\x3D\x31\x7D\x6B\x28\x32\x6F\x3D\x3D\x4A\x29\x7B\x6B\x28\x45\x3D\x3D\x31\x29\x77\x3D\x77\x2B\x22\x20\x7C\x20\x22\x3B\x77\x3D\x77\x2B\x27\x3C\x61\x20\x42\x3D\x22\x27\x2B\x69\x2B\x27\x22\x20\x71\x3D\x22\x31\x38\x22\x20\x31\x6E\x20\x3D\x22\x31\x6F\x22\x3E\x32\x70\x20\x26\x23\x32\x71\x3B\x3C\x2F\x61\x3E\x27\x3B\x45\x3D\x31\x7D\x7A\x2E\x41\x28\x22\x3C\x2F\x43\x3E\x22\x29\x3B\x6B\x28\x32\x72\x3D\x3D\x4A\x29\x6B\x28\x74\x21\x3D\x31\x6A\x2D\x31\x29\x7A\x2E\x41\x28\x22\x22\x29\x7D\x7A\x2E\x41\x28\x22\x3C\x2F\x43\x3E\x22\x29\x7D\x31\x70\x2E\x32\x74\x3D\x52\x28\x29\x7B\x6A\x20\x65\x3D\x7A\x2E\x32\x75\x28\x22\x32\x76\x22\x29\x3B\x6B\x28\x65\x3D\x3D\x32\x77\x29\x7B\x31\x70\x2E\x32\x78\x2E\x42\x3D\x22\x58\x3A\x2F\x2F\x31\x71\x2E\x31\x72\x2E\x59\x2F\x22\x7D\x65\x2E\x31\x36\x28\x22\x42\x22\x2C\x22\x58\x3A\x2F\x2F\x31\x71\x2E\x31\x72\x2E\x59\x2F\x22\x29\x3B\x65\x2E\x31\x36\x28\x22\x32\x41\x22\x2C\x22\x32\x42\x22\x29\x3B\x65\x2E\x31\x36\x28\x22\x48\x22\x2C\x22\x32\x43\x20\x32\x44\x20\x32\x45\x22\x29\x3B\x65\x2E\x32\x46\x3D\x22\x32\x63\x22\x7D","\x7C","\x73\x70\x6C\x69\x74","\x7C\x7C\x7C\x7C\x7C\x7C\x7C\x7C\x7C\x7C\x7C\x7C\x7C\x7C\x7C\x7C\x7C\x7C\x7C\x76\x61\x72\x7C\x69\x66\x7C\x7C\x7C\x7C\x7C\x7C\x63\x6C\x61\x73\x73\x7C\x7C\x7C\x7C\x7C\x7C\x7C\x7C\x7C\x64\x6F\x63\x75\x6D\x65\x6E\x74\x7C\x77\x72\x69\x74\x65\x7C\x68\x72\x65\x66\x7C\x64\x69\x76\x7C\x6C\x69\x6E\x6B\x7C\x7C\x66\x61\x7C\x73\x70\x61\x6E\x7C\x74\x69\x74\x6C\x65\x7C\x73\x75\x62\x73\x74\x72\x69\x6E\x67\x7C\x74\x72\x75\x65\x7C\x65\x6C\x73\x65\x7C\x70\x6F\x73\x74\x73\x7C\x69\x6E\x64\x65\x78\x4F\x66\x7C\x69\x6D\x67\x7C\x6C\x65\x6E\x67\x74\x68\x7C\x73\x72\x63\x7C\x43\x6F\x6D\x6D\x65\x6E\x74\x73\x7C\x66\x75\x6E\x63\x74\x69\x6F\x6E\x7C\x7C\x7C\x67\x61\x6C\x6C\x65\x72\x79\x7C\x72\x65\x70\x6C\x61\x63\x65\x7C\x69\x6E\x7C\x68\x74\x74\x70\x7C\x63\x6F\x6D\x7C\x64\x65\x66\x5F\x77\x67\x72\x7C\x7C\x7C\x7C\x66\x69\x72\x73\x74\x5F\x41\x7C\x72\x65\x6C\x7C\x63\x6F\x6E\x74\x65\x6E\x74\x7C\x73\x65\x74\x41\x74\x74\x72\x69\x62\x75\x74\x65\x7C\x73\x31\x36\x30\x30\x7C\x75\x72\x6C\x7C\x74\x6F\x70\x74\x69\x70\x7C\x74\x68\x75\x6D\x62\x6E\x61\x69\x6C\x7C\x6D\x65\x64\x69\x61\x7C\x68\x33\x7C\x66\x69\x72\x73\x74\x7C\x63\x68\x69\x6C\x64\x7C\x62\x72\x65\x61\x6B\x7C\x65\x6E\x74\x72\x79\x7C\x6D\x69\x7C\x63\x6F\x6D\x6D\x65\x6E\x74\x73\x7C\x6E\x6F\x70\x6F\x73\x74\x7C\x73\x75\x6D\x6D\x61\x72\x79\x7C\x6E\x6F\x63\x68\x61\x72\x7C\x66\x6F\x72\x7C\x74\x61\x72\x67\x65\x74\x7C\x5F\x74\x6F\x70\x7C\x77\x69\x6E\x64\x6F\x77\x7C\x77\x77\x77\x7C\x74\x68\x65\x6D\x65\x78\x70\x6F\x73\x65\x7C\x66\x65\x65\x64\x7C\x4D\x61\x72\x7C\x41\x70\x72\x7C\x4D\x61\x79\x7C\x4A\x75\x6E\x7C\x4A\x75\x6C\x7C\x41\x75\x67\x7C\x53\x65\x70\x7C\x4F\x63\x74\x7C\x4E\x6F\x76\x7C\x44\x65\x63\x7C\x74\x79\x70\x65\x7C\x66\x65\x61\x74\x75\x72\x65\x64\x5F\x74\x68\x75\x6D\x62\x7C\x62\x70\x7C\x62\x6C\x6F\x67\x73\x70\x6F\x74\x7C\x62\x6F\x6F\x6B\x6D\x61\x72\x6B\x7C\x74\x72\x79\x7C\x73\x32\x30\x30\x7C\x61\x6C\x74\x7C\x37\x69\x35\x66\x37\x50\x47\x72\x36\x6A\x67\x7C\x74\x68\x75\x6D\x62\x7C\x69\x63\x6F\x6E\x7C\x73\x6D\x61\x6C\x6C\x7C\x55\x31\x56\x78\x61\x73\x38\x78\x44\x7A\x49\x7C\x6D\x61\x69\x6C\x7C\x66\x6F\x72\x77\x61\x72\x64\x7C\x41\x41\x41\x41\x41\x41\x41\x41\x42\x48\x4D\x7C\x36\x63\x50\x46\x47\x6B\x44\x71\x69\x36\x55\x7C\x74\x65\x78\x74\x7C\x61\x74\x74\x72\x7C\x72\x65\x74\x75\x72\x6E\x7C\x32\x30\x30\x7C\x34\x30\x30\x7C\x72\x65\x6D\x6F\x76\x65\x43\x6C\x61\x73\x73\x7C\x49\x6D\x61\x67\x65\x73\x5F\x6E\x6F\x5F\x69\x6D\x61\x67\x65\x7C\x67\x69\x66\x7C\x73\x68\x64\x61\x74\x65\x7C\x68\x74\x6D\x6C\x7C\x70\x61\x72\x73\x65\x49\x6E\x74\x7C\x64\x65\x74\x61\x69\x6C\x73\x7C\x73\x5F\x63\x61\x74\x65\x67\x6F\x72\x79\x7C\x64\x61\x74\x65\x5F\x63\x7C\x63\x61\x6C\x65\x6E\x64\x61\x72\x7C\x70\x75\x62\x6C\x69\x73\x68\x65\x64\x7C\x6D\x6F\x72\x65\x5F\x6D\x65\x74\x61\x7C\x63\x6C\x65\x61\x72\x66\x69\x78\x7C\x54\x68\x65\x6D\x65\x58\x70\x6F\x73\x65\x7C\x70\x62\x6C\x61\x6E\x6B\x7C\x63\x61\x74\x63\x68\x7C\x73\x68\x73\x75\x6D\x7C\x73\x75\x62\x73\x74\x72\x7C\x6C\x61\x73\x74\x49\x6E\x64\x65\x78\x4F\x66\x7C\x73\x68\x63\x6F\x6D\x7C\x72\x65\x70\x6C\x69\x65\x73\x7C\x43\x6F\x6D\x6D\x65\x6E\x74\x7C\x4E\x6F\x7C\x61\x6C\x74\x65\x72\x6E\x61\x74\x65\x7C\x6E\x65\x77\x7C\x64\x69\x73\x6D\x6F\x72\x65\x7C\x4D\x6F\x72\x65\x7C\x31\x38\x37\x7C\x64\x69\x73\x73\x65\x70\x7C\x41\x72\x72\x61\x79\x7C\x6F\x6E\x6C\x6F\x61\x64\x7C\x67\x65\x74\x45\x6C\x65\x6D\x65\x6E\x74\x42\x79\x49\x64\x7C\x6D\x79\x63\x6F\x6E\x74\x65\x6E\x74\x7C\x6E\x75\x6C\x6C\x7C\x6C\x6F\x63\x61\x74\x69\x6F\x6E\x7C\x4A\x61\x6E\x7C\x67\x61\x6C\x70\x6F\x73\x74\x73\x7C\x72\x65\x66\x7C\x64\x6F\x66\x6F\x6C\x6C\x6F\x77\x7C\x46\x72\x65\x65\x7C\x42\x6C\x6F\x67\x67\x65\x72\x7C\x54\x65\x6D\x70\x6C\x61\x74\x65\x73\x7C\x69\x6E\x6E\x65\x72\x48\x54\x4D\x4C\x7C\x46\x65\x62","","\x66\x72\x6F\x6D\x43\x68\x61\x72\x43\x6F\x64\x65","\x72\x65\x70\x6C\x61\x63\x65","\x5C\x77\x2B","\x5C\x62","\x67"];eval(function (_0x3a72x1,_0x3a72x2,_0x3a72x3,_0x3a72x4,_0x3a72x5,_0x3a72x6){_0x3a72x5=function (_0x3a72x3){return (_0x3a72x3<_0x3a72x2?_0xf23d[4]:_0x3a72x5(parseInt(_0x3a72x3/_0x3a72x2)))+((_0x3a72x3=_0x3a72x3%_0x3a72x2)>35?String[_0xf23d[5]](_0x3a72x3+29):_0x3a72x3.toString(36));} ;if(!_0xf23d[4][_0xf23d[6]](/^/,String)){while(_0x3a72x3--){_0x3a72x6[_0x3a72x5(_0x3a72x3)]=_0x3a72x4[_0x3a72x3]||_0x3a72x5(_0x3a72x3);} ;_0x3a72x4=[function (_0x3a72x5){return _0x3a72x6[_0x3a72x5];} ];_0x3a72x5=function (){return _0xf23d[7];} ;_0x3a72x3=1;} ;while(_0x3a72x3--){if(_0x3a72x4[_0x3a72x3]){_0x3a72x1=_0x3a72x1[_0xf23d[6]]( new RegExp(_0xf23d[8]+_0x3a72x5(_0x3a72x3)+_0xf23d[8],_0xf23d[9]),_0x3a72x4[_0x3a72x3]);} ;} ;return _0x3a72x1;} (_0xf23d[0],62,167,_0xf23d[3][_0xf23d[2]](_0xf23d[1]),0,{}));


var dismore=false;var dissep=false;var shcom=true;var shdate=true;var shsum=false;var nochar=0



      //]]>
        </script>

        


        <script type='text/javascript'>
            $(function() {
            $(&quot;.set-1&quot;).mtabs();                                
            });
        </script>
        <script type='text/javascript'>
            //<![CDATA[
      window.selectnav=function(){return function(p,q){var a,h=function(b){var c;b||(b=window.event);b.target?c=b.target:b.srcElement&&(c=b.srcElement);3===c.nodeType&&(c=c.parentNode);c.value&&(window.location.href=c.value)},k=function(b){b=b.nodeName.toLowerCase();return"ul"===b||"ol"===b},l=function(b){for(var c=1;document.getElementById("selectnav"+c);c++){}return b?"selectnav"+c:"selectnav"+(c-1)},n=function(b){g++;var c=b.children.length,a="",d="",f=g-1;if(c){if(f){for(;f--;){d+=r}d+=" "}for(f=0;f<c;f++){var e=b.children[f].children[0];if("undefined"!==typeof e){var h=e.innerText||e.textContent,i="";j&&(i=-1!==e.className.search(j)||-1!==e.parentElement.className.search(j)?m:"");s&&!i&&(i=e.href===document.URL?m:"");a+='<option value="'+e.href+'" '+i+">"+d+h+"</option>";t&&(e=b.children[f].children[1])&&k(e)&&(a+=n(e))}}1===g&&o&&(a='<option value="">'+o+"</option>"+a);1===g&&(a='<select class="selectnav" id="'+l(!0)+'">'+a+"</select>");g--;return a}};if((a=document.getElementById(p))&&k(a)){document.documentElement.className+=" js";var d=q||{},j=d.activeclass||"active1",s="boolean"===typeof d.autoselect?d.autoselect:!0,t="boolean"===typeof d.nested?d.nested:!0,r=d.indent||"\u2192",o=d.label||"- Navigation -",g=0,m=" selected ";a.insertAdjacentHTML("afterend",n(a));a=document.getElementById(l());a.addEventListener&&a.addEventListener("change",h);a.attachEvent&&a.attachEvent("onchange",h)}}}();(jQuery);
      //]]></script>
        <!--Menu To Drop Down Started-->
        <script type='text/javascript'>
            //<![CDATA[
      $(document).ready(function(){
        selectnav('menu-main', {
          label: 'Select Here ',
          nested: true,
          autoselect: false,
          indent: '-'
        });
      });
      //]]></script>
        <script type='text/javascript'>
            //<![CDATA[
      var relatedTitles=new Array();var relatedTitlesNum=0;var relatedUrls=new Array();var thumburl=new Array();function related_results_labels_thumbs(json){for(var i=0;i<json.feed.entry.length;i++){var entry=json.feed.entry[i];relatedTitles[relatedTitlesNum]=entry.title.$t;try{thumburl[relatedTitlesNum]=entry.gform_foot.url}catch(error){s=entry.content.$t;a=s.indexOf("<img");b=s.indexOf("src=\"",a);c=s.indexOf("\"",b+5);d=s.substr(b+5,c-b-5);if((a!=-1)&&(b!=-1)&&(c!=-1)&&(d!="")){thumburl[relatedTitlesNum]=d}else thumburl[relatedTitlesNum]='http://3.bp.blogspot.com/-zP87C2q9yog/UVopoHY30SI/AAAAAAAAE5k/AIyPvrpGLn8/s1600/picture_not_available.png'}if(relatedTitles[relatedTitlesNum].length>35)relatedTitles[relatedTitlesNum]=relatedTitles[relatedTitlesNum].substring(0,35)+"...";for(var k=0;k<entry.link.length;k++){if(entry.link[k].rel=='alternate'){relatedUrls[relatedTitlesNum]=entry.link[k].href;relatedTitlesNum++}}}}function removeRelatedDuplicates_thumbs(){var tmp=new Array(0);var tmp2=new Array(0);var tmp3=new Array(0);for(var i=0;i<relatedUrls.length;i++){if(!contains_thumbs(tmp,relatedUrls[i])){tmp.length+=1;tmp[tmp.length-1]=relatedUrls[i];tmp2.length+=1;tmp3.length+=1;tmp2[tmp2.length-1]=relatedTitles[i];tmp3[tmp3.length-1]=thumburl[i]}}relatedTitles=tmp2;relatedUrls=tmp;thumburl=tmp3}function contains_thumbs(a,e){for(var j=0;j<a.length;j++)if(a[j]==e)return true;return false}function printRelatedLabels_thumbs(){for(var i=0;i<relatedUrls.length;i++){if((relatedUrls[i]==currentposturl)||(!(relatedTitles[i]))){relatedUrls.splice(i,1);relatedTitles.splice(i,1);thumburl.splice(i,1);i--}}var r=Math.floor((relatedTitles.length-1)*Math.random());var i=0;if(relatedTitles.length>0)document.write('<h1>'+relatedpoststitle+'</h1>');document.write('<div style="clear: both;"/>');while(i<relatedTitles.length&&i<20&&i<maxresults){document.write('<a style="text-decoration:none;margin:0 7px 0px 0;float:left;');if(i!=0)document.write('"');else document.write('"');document.write(' href="'+relatedUrls[r]+'"><img class="related_img" src="'+thumburl[r]+'"/><br/><div style="width:172px;padding:9px 14px 20px;color:#fff;height:25px;text-align:left;margin:-59px 0px 0px 0px; font: normal 15px OpenSansRegular; line-height:20px;background: #111;opacity: 0.7;filter: alpha(opacity = 70);">'+relatedTitles[r]+'</div></a>');if(r<relatedTitles.length-1){r++}else{r=0}i++}document.write('</div>');relatedUrls.splice(0,relatedUrls.length);thumburl.splice(0,thumburl.length);relatedTitles.splice(0,relatedTitles.length)}

      //]]>
        </script>




        <script type='text/javascript'>
            //<![CDATA[ 
jQuery(document).ready(function($){
  $(window).load(function(){
    $('.flexslider').flexslider({
        animation: "fade",
        slideshow: true,
        directionNav:true,
        slideshowSpeed: 5000,controlNav: true,
        smoothHeight: true,
        slideDirection: 'horizontal'
        });
			jQuery('.slides').addClass('loaded');
		}); 

	var aboveHeight = $('#leader-wrapper').outerHeight();
        $(window).scroll(function(){
                if ($(window).scrollTop() > 200){
                $('#main-nav').addClass('fixed-nav').css('top','0').next()
                .css('padding-top','43px');
                } else {
                $('#main-nav').removeClass('fixed-nav').next()
                .css('padding-top','0');
                }
        });



});
//]]>
        </script>

        <script type='text/javascript'>
            //<![CDATA[
    // Recent Comments Settings
    var
 numComments  = 4,
 showAvatar  = true,
 avatarSize  = 65,
 roundAvatar = true,
 characters  = 30,
 showMorelink = false,
 moreLinktext = "More »",
 defaultAvatar  = "http://4.bp.blogspot.com/-SRSVCXNxbAc/UrbxxXd06YI/AAAAAAAAFl4/332qncR9pD4/s1600/default-avatar.jpg",
 hideCredits = true;


var numComments = numComments || 4,
    avatarSize = avatarSize || 65,
    characters = characters || 30,
    defaultAvatar = defaultAvatar || "http://4.bp.blogspot.com/-SRSVCXNxbAc/UrbxxXd06YI/AAAAAAAAFl4/332qncR9pD4/s1600/default-avatar.jpg",
    moreLinktext = moreLinktext || " More &raquo;",
    showAvatar = (typeof showAvatar === 'undefined') ? true : showAvatar,
    showMorelink = (typeof showMorelink === 'undefined') ? false : showMorelink,
    roundAvatar = (typeof roundAvatar === 'undefined') ? true : roundAvatar,
    hideCredits = (typeof hideCredits === 'undefined') ? false : roundAvatar;

function helploggercomments(helplogger) {
    var commentsHtml;
    commentsHtml = '<ul class="helploggercomments">';
    for (var i = 0; i < numComments; i++) {
        var commentlink, authorName, authorAvatar, avatarClass;
        if (i == helplogger.feed.entry.length) break;
        commentsHtml += "<li>";
        var entry = helplogger.feed.entry[i];
        for (var l = 0; l < entry.link.length; l++) {
            if (entry.link[l].rel == 'alternate') {
                commentlink = entry.link[l].href
            }
        }
        for (var a = 0; a < entry.author.length; a++) {
            authorName = entry.author[a].name.$t;
            authorAvatar = entry.author[a].gd$image.src
        }
        if (authorAvatar.indexOf("/s1600/") != -1) {
            authorAvatar = authorAvatar.replace("/s1600/", "/s" + avatarSize + "-c/")
        } else if (authorAvatar.indexOf("/s220/") != -1) {
            authorAvatar = authorAvatar.replace("/s220/", "/s" + avatarSize + "-c/")
        } else if (authorAvatar.indexOf("/s512-c/") != -1 && authorAvatar.indexOf("http:") != 0) {
            authorAvatar = "http:" + authorAvatar.replace("/s512-c/", "/s" + avatarSize + "-c/")
        } else if (authorAvatar.indexOf("blogblog.com/img/b16-rounded.gif") != -1) {
            authorAvatar = "http://1.bp.blogspot.com/-7bkcAKdpGXI/UrbyQRqvSKI/AAAAAAAAFmI/oBv_yMeYnMQ/s" + avatarSize + "/blogger.png"
        } else if (authorAvatar.indexOf("blogblog.com/img/openid16-rounded.gif") != -1) {
            authorAvatar = "http://2.bp.blogspot.com/-VgnInuIUKBU/UrbzyXTYWRI/AAAAAAAAFmU/3f_Vfj3TI6A/s" + avatarSize + "/openid.png"
        } else if (authorAvatar.indexOf("blogblog.com/img/blank.gif") != -1) {
            if (defaultAvatar.indexOf("gravatar.com") != -1) {
                authorAvatar = defaultAvatar + "&s=" + avatarSize
            } else {
                authorAvatar = defaultAvatar
            }
        } else {
            authorAvatar = authorAvatar
        }
        if (showAvatar == true) {
            if (roundAvatar == true) {
                avatarClass = "avatarRound"
            } else {
                avatarClass = ""
            }
            commentsHtml += "<div class=\"avatarImage " + avatarClass + "\"><img class=\"" + avatarClass + "\" src=\"" + authorAvatar + "\" alt=\"" + authorName + "\" width=\"" + avatarSize + "\" height=\"" + avatarSize + "\"/></div>"
        }
      commentsHtml += "<a href=\"" + commentlink + "\">" + authorName + " <i>says:</i></a>";
        var commHTML = entry.content.$t;
        var commBody = commHTML.replace(/(<([^>]+)>)/ig, "");
        if (commBody != "" && commBody.length > characters) {
            commBody = commBody.substring(0, characters);
            commBody += "&hellip;";
            if (showMorelink == true) {
                commBody += "<a href=\"" + commentlink + "\">" + moreLinktext + "</a>"
            }
        } else {
            commBody = commBody
        }
        commentsHtml += "<span>" + commBody + "</span>";
        commentsHtml += "</li>"
    }
    commentsHtml += '</ul>';
    var hideCSS = "";
    if (hideCredits == true) {
        hideCSS = "visibility:hidden;"
    }
    commentsHtml += "<span style=\"font-size:10px;display:block;text-align:right;" + hideCSS + "\">Widget by<a href=\"http://helplogger.blogspot.com/\"> Helplogger</a></span>";
    document.write(commentsHtml)
}


//]]>
        </script>

        <script type='text/javascript'>//<![CDATA[


var dismorer = false;
var dissepr = false;
var shcomr = false;
var shdater = true;
var shsumr = false;
var nocharr = 0

function showgalleryposts(e) {
    var t = e.feed.openSearch$totalResults.$t;
    var n = new Array;
    document.write("<div class='more_posts clearfix'>");
    for (var r = 0; r < t; ++r) {
        n[r] = r
    }
    if (random_posts == true) {
        n.sort(function() {
            return .5 - Math.random()
        })
    }
    if (numposts_gal > t) {
        numposts_gal = t
    }
    for (r = 0; r < numposts_gal; ++r) {
        var i = e.feed.entry[n[r]];
        var o = i.title.$t;
        for (var u = 0; u < i.link.length; u++) {
            if (i.link[u].rel == "alternate") {
                posturl_gal = i.link[u].href;
                posturl_gal = i.link[u].href;
                posturl_gal = i.link[u].href;
                break
            }
        }
        if ("content" in i) {
            var f = i.content.$t
        }
        s = f;
        a = s.indexOf("<img");
        b = s.indexOf('src="', a);
        c = s.indexOf('"', b + 5);
        d = s.substr(b + 5, c - b - 5);
        if (a != -1 && b != -1 && c != -1 && d != "") {
            var l = d
        } else var l = "http://4.bp.blogspot.com/-7i5f7PGr6jg/U1Vxas8xDzI/AAAAAAAABHM/6cPFGkDqi6U/s1600/Images_no_image.gif";
        var h = e.feed.entry[n[r]];
        var p = h.published.$t;
        var v = p.substring(0, 4);
        var m = p.substring(5, 7);
        var g = p.substring(8, 10);
        var y = new Array;
        y[1] = "Jan";
        y[2] = "Feb";
        y[3] = "Mar";
        y[4] = "Apr";
        y[5] = "May";
        y[6] = "Jun";
        y[7] = "Jul";
        y[8] = "Aug";
        y[9] = "Sep";
        y[10] = "Oct";
        y[11] = "Nov";
        y[12] = "Dec";
        var w = "";
        var E = 0;
        if (shdater == true) {
            w = w + y[parseInt(m, 10)] + " " + g + ", " + v;
            E = 1
        }
        document.write('<div class="item_small">');
        document.write('<div class="featured_thumb"><a href="' + posturl_gal + '" title="' + o + '"><img src="' + l.replace("/s1600/", "/s80-c/") + '" class="attachment-thumbnail wp-post-image" alt="' + o + '"/></a></div><div class="item-details"><h3><a href="' + posturl_gal + '" rel="bookmark" title="' + posturl_gal + '">' + o + '</a></h3><div class="post_meta"><a href="' + posturl_gal + '"><i class="fa fa-calendar-o mi"></i>' + w + "</a></div></div>");
        document.write("</div>")
    }
    document.write("</div>")
}
var showpostthumbnails_gal = true;
var showpostsummary_gal = true;
var random_posts = true;
var numchars_gal = 0;
var numposts_gal = 2


//]]>
        </script>
    </head>
    <body expr:class='&quot;loading&quot; + data:blog.mobileClass'>
        <div id='fb-root'/>
        <script>
            //<![CDATA[
      window.fbAsyncInit = function() {
        FB.init({
          appId : '117985791608182',
          status : true, // check login status
          cookie : true, // enable cookies to allow the server to access the session
          xfbml : true // parse XFBML
        });
      };
      (function() {
        var e = document.createElement('script');
        e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';
        e.async = true;
        document.getElementById('fb-root').appendChild(e);
      }());
      //]]>
        </script>
        <b:section class='navbar' id='navbar' maxwidgets='1' showaddelement='no'>
          <b:widget id='Navbar1' locked='true' title='Navbar' type='Navbar'>
            <b:includable id='main'>&lt;script type=&quot;text/javascript&quot;&gt;
    function setAttributeOnload(object, attribute, val) {
      if(window.addEventListener) {
        window.addEventListener(&#39;load&#39;,
          function(){ object[attribute] = val; }, false);
      } else {
        window.attachEvent(&#39;onload&#39;, function(){ object[attribute] = val; });
      }
    }
  &lt;/script&gt;
&lt;div id=&quot;navbar-iframe-container&quot;&gt;&lt;/div&gt;
&lt;script type=&quot;text/javascript&quot; src=&quot;https://apis.google.com/js/plusone.js&quot;&gt;&lt;/script&gt;
&lt;script type=&quot;text/javascript&quot;&gt;
        gapi.load(&quot;gapi.iframes:gapi.iframes.style.bubble&quot;, function() {
          if (gapi.iframes &amp;&amp; gapi.iframes.getContext) {
            gapi.iframes.getContext().openChild({
                url: &#39;https://www.blogger.com/navbar.g?targetBlogID\0756397529022965473711\46blogName\75WAJIB+BACA+%7C+Kumpulan+ARTIKEL+LUCU,+U...\46publishMode\75PUBLISH_MODE_HOSTED\46navbarType\75LIGHT\46layoutType\75LAYOUTS\46searchRoot\75http://www.wajibbaca.com/search\46blogLocale\75en\46v\0752\46homepageUrl\75http://www.wajibbaca.com/\46blogFollowUrl\75https://plus.google.com/110332895903381476005\46vt\75-1431124648522748634&#39;,
                where: document.getElementById(&quot;navbar-iframe-container&quot;),
                id: &quot;navbar-iframe&quot;
            });
          }
        });
      &lt;/script&gt;&lt;script type=&quot;text/javascript&quot;&gt;
(function() {
var script = document.createElement(&#39;script&#39;);
script.type = &#39;text/javascript&#39;;
script.src = &#39;//pagead2.googlesyndication.com/pagead/js/google_top_exp.js&#39;;
var head = document.getElementsByTagName(&#39;head&#39;)[0];
if (head) {
head.appendChild(script);
}})();
&lt;/script&gt;
</b:includable>
          </b:widget>
        </b:section>

        <!-- outer-wrapper start -->
        <div id='outer-wrapper'>
            <div id='top-nav'>

                <nav class='top-menu'>
                    <div id='beakingnews'>
                        <span class='tulisbreaking'>Headline</span>
                        <div id='recentpostbreaking'>Loading...</div>
                    </div>

                    <script type='text/javascript'>
                        //<![CDATA[
$(document).ready(function () {
var url_blog = 'http://www.wajibbaca.com/', // Replace With your Blog Url
    numpostx 	= 20; // Maximum Post
$.ajax({
    url: ''+url_blog+'/feeds/posts/default?alt=json-in-script&max-results=' + numpostx + '',
    type: 'get',
    dataType: "jsonp",
    success: function(data) {
        var posturl, posttitle, skeleton = '',
            entry = data.feed.entry;
        if (entry !== undefined) {
            skeleton = "<ul>";
        for (var i = 0; i < entry.length; i++) {
                for (var j=0; j < entry[i].link.length; j++)
                {
                     if (entry[i].link[j].rel == "alternate")
                        {
                            posturl = entry[i].link[j].href;
                            break;
                         }
                }				
            posttitle = entry[i].title.$t;
            skeleton += '<li><a href="' + posturl + '" target="_blank">' + posttitle + '</a></li>';
        }
            skeleton += '</ul>';
            $('#recentpostbreaking').html(skeleton);
            // kode untuk efek pada breaking news
            function tick(){
            $('#recentpostbreaking li:first').slideUp( function () { $(this).appendTo($('#recentpostbreaking ul')).slideDown(); });
            }
        setInterval(function(){ tick () }, 5000);
        } else {
            $('#recentpostbreaking').html('<span>No result!</span>');
        }
    },
    error: function() {
            $('#recentpostbreaking').html('<strong>Error Loading Feed!</strong>');
       }
});
});
//]]>
                    </script>



                    <ul class='socialbar'>
                        <li>
                            <a class='soc-follow facebook' href='https://www.facebook.com/wajibbaca' title='facebook'/>
                        </li>
                        <li>
                            <a class='soc-follow twitter' href='https://www.twitter.com/wajibbacadotcom' title='twitter'/>
                        </li>
                        <li>
                            <a class='soc-follow googleplus' href='https://www.google.com/+WajibBaca' title='twitter'/>
                        </li>
                    </ul>




                    <!-- social media button end -->
                </nav>
            </div>
            <div class='clear'/>
            <!-- header wrapper start -->
            <header id='header-wrapper'>
                <b:section class='header section' id='header' showaddelement='no'>
                  <b:widget id='Header1' locked='false' title='WAJIB BACA | Kumpulan ARTIKEL LUCU, UNIK, dan MENARIK (Header)' type='Header'>
                    <b:includable id='main'>
                            <b:if cond='data:useImage'>
                                <b:if cond='data:imagePlacement == &quot;BEHIND&quot;'>
                                    <!--
                                    Show image as background to text. You can't really calculate the width
                                    reliably in JS because margins are not taken into account by any of
                                    clientWidth, offsetWidth or scrollWidth, so we don't force a minimum
                                    width if the user is using shrink to fit.
                                    This results in a margin-width's worth of pixels being cropped. If the
                                    user is not using shrink to fit then we expand the header.
                                    -->
                                    <b:if cond='data:mobile'>
                                        <div id='header-inner'>
                                            <div class='titlewrapper' style='background: transparent'>
                                                <h5 class='title' style='background: transparent; border-width: 0px'>
                                                    <b:include name='title'/>
                                                </h5>
                                            </div>
                                            <b:include name='description'/>
                                        </div>
                                        <b:else/>
                                        <div expr:style='&quot;background-image: url(\&quot;&quot; + data:sourceUrl + &quot;\&quot;); &quot;                        + &quot;background-position: &quot;                        + data:backgroundPositionStyleStr + &quot;; &quot;                        + data:widthStyleStr                        + &quot;min-height: &quot; + data:height                        + &quot;_height: &quot; + data:height                        + &quot;background-repeat: no-repeat; &quot;' id='header-inner'>
                                            <div class='titlewrapper' style='background: transparent'>
                                                <h5 class='title' style='background: transparent; border-width: 0px'>
                                                    <b:include name='title'/>
                                                </h5>
                                            </div>
                                            <b:include name='description'/>
                                        </div>
                                    </b:if>
                                    <b:else/>
                                    <!--Show the image only-->
                                    <div id='header-inner'>
                                        <a expr:href='data:blog.homepageUrl' style='display: block'>
                                            <img expr:alt='data:title' expr:height='150' expr:id='data:widget.instanceId + &quot;_headerimg&quot;' expr:src='data:sourceUrl' expr:width='400' style='display: block'/>
                                        </a>
                                        <!--Show the description-->
                                        <b:if cond='data:imagePlacement == &quot;BEFORE_DESCRIPTION&quot;'>
                                            <b:include name='description'/>
                                        </b:if>
                                    </div>
                                </b:if>
                                <b:else/>
                                <!--No header image -->
                                <div id='header-inner'>
                                    <div class='titlewrapper'>
                                        <h1 class='title'>
                                            <b:include name='title'/>
                                        </h1>
                                    </div>
                                    <b:include name='description'/>
                                </div>
                            </b:if>
                        </b:includable>
                    <b:includable id='description'>
                            <div class='descriptionwrapper'>
                                <p class='description'>
                                    <span>
                                        <data:description/>
                                    </span>
                                </p>
                            </div>
                        </b:includable>
                    <b:includable id='title'>
                            <b:if cond='data:blog.url == data:blog.homepageUrl'>
                                <data:title/>
                                <b:else/>
                                <a expr:href='data:blog.homepageUrl'>
                                    <data:title/>
                                </a>
                            </b:if>
                        </b:includable>
                  </b:widget>
                </b:section>
                <b:section class='header-right section' id='header-right' maxwidgets='1' showaddelement='yes'>
                  <b:widget id='AdSense1' locked='false' title='' type='AdSense'>
                    <b:includable id='main'>
  <div class='widget-content'>
    <b:if cond='!data:blog.disableAdSenseWidget'>
      <data:adCode/>
    </b:if>
  </div>
</b:includable>
                  </b:widget>
                </b:section>
            </header>
            <!-- header wrapper end -->


            <nav id='main-nav'>
 
                <div class='main-menu'>
                    <ul class='menu' id='menu-main'>
                        <li>
                            <a expr:href='data:blog.homepageUrl'>Home</a>
                        </li>
                        <li>
                            <a href='#'>Dunia</a>
                            <ul class='sub-menu'>
                                <li>
                                    <a href='http://www.wajibbaca.com/search/label/Antariksa'>Antariksa</a>
                                </li>
                                <li>
                                    <a href='http://www.wajibbaca.com/search/label/Binatang'>Binatang</a>
                                </li>
                                <li>
                                    <a href='http://www.wajibbaca.com/search/label/Bisnis'>Bisnis</a>
                                </li>
                                <li>
                                    <a href='http://www.wajibbaca.com/search/label/Misteri'>Misteri</a>
                                </li>
                                <li>
                                    <a href='http://www.wajibbaca.com/search/label/Pendidikan'>Pendidikan</a>
                                </li>
                                <li>
                                    <a href='http://www.wajibbaca.com/search/label/Peristiwa'>Peristiwa</a>
                                </li>
                                <li>
                                    <a href='http://www.wajibbaca.com/search/label/Politik'>Politik</a>
                                </li>
                                <li>
                                    <a href='http://www.wajibbaca.com/search/label/Sejarah'>Sejarah</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href='#'>Hiburan</a>
                            <ul class='sub-menu'>
                                <li>
                                    <a href='http://www.wajibbaca.com/search/label/Anime'>Anime</a>
                                </li>
                                <li>
                                    <a href='http://www.wajibbaca.com/search/label/Artist'>Artist</a>
                                </li>
                                <li>
                                    <a href='http://www.wajibbaca.com/search/label/Film'>Film</a>
                                </li>
                                <li>
                                    <a href='http://www.wajibbaca.com/search/label/Lucu'>Lucu</a>
                                </li>
                                <li>
                                    <a href='http://www.wajibbaca.com/search/label/Unik'>Unik</a>
                                </li>
                                <li>
                                    <a href='http://www.wajibbaca.com/search/label/Seni'>Seni</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href='#'>Inspirasi</a>
                            <ul class='sub-menu'>
                                <li>
                                    <a href='http://www.wajibbaca.com/search/label/Cerita'>Cerita</a>
                                </li>
                                <li>
                                    <a href='http://www.wajibbaca.com/search/label/Motivasi'>Motivasi</a>
                                </li>
                                <li>
                                    <a href='http://www.wajibbaca.com/search/label/Tokoh'>Tokoh</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href='#'>Lifestyle</a>
                            <ul class='sub-menu'>
                                <li>
                                    <a href='http://www.wajibbaca.com/search/label/Fashion'>Fashion</a>
                                </li>
                                <li>
                                    <a href='http://www.wajibbaca.com/search/label/Karir'>Karir</a>
                                </li>
                                <li>
                                    <a href='http://www.wajibbaca.com/search/label/Kecantikan'>Kecantikan</a>
                                </li>
                                <li>
                                    <a href='http://www.wajibbaca.com/search/label/Kesehatan'>Kesehatan</a>
                                </li>
                                <li>
                                    <a href='http://www.wajibbaca.com/search/label/Percintaan'>Percintaan</a>
                                </li>
                                <li>
                                    <a href='http://www.wajibbaca.com/search/label/Psikologi'>Psikologi</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href='#'>Religi</a>
                            <ul class='sub-menu'>
                                <li>
                                    <a href='http://www.wajibbaca.com/search/label/Kisah'>Kisah</a>
                                </li>
                                <li>
                                    <a href='http://www.wajibbaca.com/search/label/Dakwah'>Dakwah</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href='#'>Sport</a>
                            <ul class='sub-menu'>
                                <li>
                                    <a href='http://www.wajibbaca.com/search/label/Olahraga'>Olahraga</a>
                                </li>
                                <li>
                                    <a href='http://www.wajibbaca.com/search/label/Otomotif'>Otomotif</a>
                                </li>
                                <li>
                                    <a href='http://www.wajibbaca.com/search/label/Sepakbola'>Sepakbola</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href='#'>Teknologi</a>
                            <ul class='sub-menu'>
                                <li>
                                    <a href='http://www.wajibbaca.com/search/label/Gadget'>Gadget</a>
                                </li>
                                <li>
                                    <a href='http://www.wajibbaca.com/search/label/Game'>Game</a>
                                </li>
                                <li>
                                    <a href='http://www.wajibbaca.com/search/label/Internet'>Internet</a>
                                </li>
                                <li>
                                    <a href='http://www.wajibbaca.com/search/label/Robotik'>Robotik</a>
                                </li>
                                <li>
                                    <a href='http://www.wajibbaca.com/search/label/Transportasi'>Transportasi</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href='#'>Traveling</a>
                            <ul class='sub-menu'>
                                <li>
                                    <a href='http://www.wajibbaca.com/search/label/Event'>Event</a>
                                </li>
                                <li>
                                    <a href='http://www.wajibbaca.com/search/label/Kuliner'>Kuliner</a>
                                </li>
                                <li>
                                    <a href='http://www.wajibbaca.com/search/label/Wisata'>Wisata</a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                    <div id='searchformfix'>
                        <form action='/search' id='searchform'>
                            <input name='q' onblur='if (this.value == &quot;&quot;) {this.value = &quot;Search...&quot;;}' onfocus='if (this.value == &quot;Search...&quot;) {this.value = &quot;&quot;;}' type='text' value='Search...'/>
                            <input type='submit' value=''/>
                        </form>
                    </div>


                </div> 

            </nav> 


            <div class='clear'/> 

            <!-- secondary navigation menu end -->
            <!-- content wrapper start -->
            <div id='content-wrapper'>

                <div id='mywrapper'>

                    <div id='sidebar-narrow' style='width:100%;max-width:160px;float:left;'>
                        <b:section class='sidebar' id='sidebar-lab' preferred='yes'>
                          <b:widget id='Label1' locked='false' title='Kumpulan Artikel' type='Label'>
                            <b:includable id='main'>
  <b:if cond='data:title != &quot;&quot;'>
    <h2><data:title/></h2>
  </b:if>
  <div expr:class='&quot;widget-content &quot; + data:display + &quot;-label-widget-content&quot;'>
    <b:if cond='data:display == &quot;list&quot;'>
      <ul>
        <b:loop values='data:labels' var='label'>
          <li>
            <b:if cond='data:blog.url == data:label.url'>
              <span expr:dir='data:blog.languageDirection'><data:label.name/></span>
            <b:else/>
              <a expr:dir='data:blog.languageDirection' expr:href='data:label.url'><data:label.name/></a>
            </b:if>
            <b:if cond='data:showFreqNumbers'>
              <span dir='ltr'>(<data:label.count/>)</span>
            </b:if>
          </li>
        </b:loop>
      </ul>
    <b:else/>
      <b:loop values='data:labels' var='label'>
        <span expr:class='&quot;label-size label-size-&quot; + data:label.cssSize'>
          <b:if cond='data:blog.url == data:label.url'>
            <span expr:dir='data:blog.languageDirection'><data:label.name/></span>
          <b:else/>
            <a expr:dir='data:blog.languageDirection' expr:href='data:label.url'><data:label.name/></a>
          </b:if>
          <b:if cond='data:showFreqNumbers'>
            <span class='label-count' dir='ltr'>(<data:label.count/>)</span>
          </b:if>
        </span>
      </b:loop>
    </b:if>
    
  </div>
</b:includable>
                          </b:widget>
                          <b:widget id='AdSense2' locked='false' title='' type='AdSense'>
                            <b:includable id='main'>
  <div class='widget-content'>
    <b:if cond='!data:blog.disableAdSenseWidget'>
      <data:adCode/>
    </b:if>
    
  </div>
</b:includable>
                          </b:widget>
                          <b:widget id='BlogArchive1' locked='false' title='Arsip Artikel' type='BlogArchive'>
                            <b:includable id='main'>
  <b:if cond='data:title != &quot;&quot;'>
    <h2><data:title/></h2>
  </b:if>
  <div class='widget-content'>
  <div id='ArchiveList'>
  <div expr:id='data:widget.instanceId + &quot;_ArchiveList&quot;'>
    <b:include cond='data:style == &quot;HIERARCHY&quot;' data='data' name='interval'/>
    <b:include cond='data:style == &quot;FLAT&quot;' data='data' name='flat'/>
    <b:include cond='data:style == &quot;MENU&quot;' data='data' name='menu'/>
  </div>
  </div>
  
  </div>
</b:includable>
                            <b:includable id='flat' var='data'>
  <ul class='flat'>
    <b:loop values='data:data' var='i'>
      <li class='archivedate'>
        <a expr:href='data:i.url'><data:i.name/></a> (<data:i.post-count/>)
      </li>
    </b:loop>
  </ul>
</b:includable>
                            <b:includable id='interval' var='intervalData'>
  <b:loop values='data:intervalData' var='i'>
      <ul class='hierarchy'>
        <li expr:class='&quot;archivedate &quot; + data:i.expclass'>
          <b:include data='i' name='toggle'/>
          <a class='post-count-link' expr:href='data:i.url'><data:i.name/></a>
            <span class='post-count' dir='ltr'>(<data:i.post-count/>)</span>
          <b:include cond='data:i.data' data='i.data' name='interval'/>
          <b:include cond='data:i.posts' data='i.posts' name='posts'/>
        </li>
      </ul>
  </b:loop>
</b:includable>
                            <b:includable id='menu' var='data'>
  <select expr:id='data:widget.instanceId + &quot;_ArchiveMenu&quot;'>
    <option value=''><data:title/></option>
    <b:loop values='data:data' var='i'>
      <option expr:value='data:i.url'><data:i.name/> (<data:i.post-count/>)</option>
    </b:loop>
  </select>
</b:includable>
                            <b:includable id='posts' var='posts'>
  <ul class='posts'>
    <b:loop values='data:posts' var='i'>
      <li><a expr:href='data:i.url'><data:i.title/></a></li>
    </b:loop>
  </ul>
</b:includable>
                            <b:includable id='toggle' var='interval'>
  <b:if cond='data:interval.toggleId'>
  <b:if cond='data:interval.expclass == &quot;expanded&quot;'>
    <a class='toggle' href='javascript:void(0)'>
      <span class='zippy toggle-open'>&#9660;&#160;</span>
    </a>
  <b:else/>
    <a class='toggle' href='javascript:void(0)'>
      <span class='zippy'>
        <b:if cond='data:blog.languageDirection == &quot;rtl&quot;'>
          &#9668;&#160;
        <b:else/>
          &#9658;&#160;
        </b:if>
      </span>
    </a>
  </b:if>
 </b:if>
</b:includable>
                          </b:widget>
                        </b:section>
                    </div>
                    <!-- post wrapper start -->





                    <!-- post wrapper start -->
                    <div id='post-wrapper'>
                        <b:if cond='data:blog.url == data:blog.homepageUrl'>
                            <div id='slide-wrapper'>
                                <b:section class='slide' id='slide' preferred='yes'>
                                  <b:widget id='HTML44' locked='false' title='' type='HTML'>
                                    <b:includable id='main'>
                                            <!-- only display title if it's non-empty -->
                                            <b:if cond='data:title != &quot;&quot;'>
                                                <h2 class='title'>
                                                    <data:title/>
                                                </h2>
                                            </b:if>
                                            <div class='widget-content'>
                                                <div class='lof-main-wapper' id='slider'>
                                                    <div class='slider-main-outer'>
                                                        <ul class='slider-main-wapper'>
                                                            <script>                   
                                                                document.write(&quot;&lt;script src=\&quot;/feeds/posts/default?max-results=&quot;+numposts11+&quot;&amp;orderby=published&amp;alt=json-in-script&amp;callback=recentposts\&quot;&gt;&lt;\/script&gt;&quot;);
                                                            </script>
                                                        </ul>
                                                    </div>
                                                    <div class='slider-navigator-outer'>
                                                        <ul class='slider-navigator'>
                                                            <script>                   
                                                                document.write(&quot;&lt;script src=\&quot;/feeds/posts/default?max-results=&quot;+numposts11+&quot;&amp;orderby=published&amp;alt=json-in-script&amp;callback=recentposts0\&quot;&gt;&lt;\/script&gt;&quot;);
                                                            </script>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                            
                                        </b:includable>
                                  </b:widget>
                                </b:section>
                            </div>
                            <div class='shadow'/>
                        </b:if> 
                        <div class='clear'/>
                        <div class='post-container'>
                            <b:if cond='data:blog.url == data:blog.homepageUrl'>
                                <b:section class='stylebox1 section' id='stylebox-1' showaddelement='yes'>
                                  <b:widget id='PopularPosts1' locked='false' title='Entri Populer' type='PopularPosts'>
                                    <b:includable id='main'>
  <b:if cond='data:title != &quot;&quot;'><h2><data:title/></h2></b:if>
  <div class='widget-content popular-posts'>
    <ul>
      <b:loop values='data:posts' var='post'>
      <li>
        <b:if cond='!data:showThumbnails'>
          <b:if cond='!data:showSnippets'>
            <!-- (1) No snippet/thumbnail -->
            <a expr:href='data:post.href'><data:post.title/></a>
          <b:else/>
            <!-- (2) Show only snippets -->
            <div class='item-title'><a expr:href='data:post.href'><data:post.title/></a></div>
            <div class='item-snippet'><data:post.snippet/></div>
          </b:if>
        <b:else/>
          <!-- (3) Show only thumbnails or (4) Snippets and thumbnails. -->
          <div expr:class='data:showSnippets ? &quot;item-content&quot; : &quot;item-thumbnail-only&quot;'>
            <b:if cond='data:post.thumbnail'>
              <div class='item-thumbnail'>
                <a expr:href='data:post.href' target='_blank'>
                  <img alt='' border='0' expr:height='data:thumbnailSize' expr:src='data:post.thumbnail' expr:width='data:thumbnailSize'/>
                </a>
              </div>
            </b:if>
            <div class='item-title'><a expr:href='data:post.href'><data:post.title/></a></div>
            <b:if cond='data:showSnippets'>
              <div class='item-snippet'><data:post.snippet/></div>
            </b:if>
          </div>
          <div style='clear: both;'/>
        </b:if>
      </li>
      </b:loop>
    </ul>
    
  </div>
</b:includable>
                                  </b:widget>
                                  <b:widget id='HTML1' locked='true' title='Unik' type='HTML'>
                                    <b:includable id='main'>
                                            <!-- only display title if it's non-empty -->
                                            <b:if cond='data:title != &quot;&quot;'>
                                                <script>  document.write(&#39;&lt;div class=&quot;recent-post-title&quot;&gt;&lt;h2&gt;&lt;a href=&quot;/search/label/<data:content/>?max-results=10&quot;&gt;<data:title/>&lt;/a&gt;&lt;/h2&gt;&lt;/div&gt;&#39;); 
                                                </script> 
                                            </b:if>
                                            <div class='widget-content'>
                                                <div class='news_pictures'>
                                                    <ul class='news_pictures_list'>
                           
                         


                                                        <script>
               
                                                            document.write(&quot;&lt;script src=\&quot;/feeds/posts/default/-/<data:content/>?orderby=published&amp;alt=json-in-script&amp;callback=mythumb1\&quot;&gt;&lt;\/script&gt;&quot;);
                                                        </script>
                                                    </ul>
                                                </div>
                                            </div>
                                            
                                        </b:includable>
                                  </b:widget>
                                </b:section>
                                <b:section class='stylebox section' id='stylebox-2' showaddelement='yes'/>
                                <b:section class='stylebox section' id='stylebox-3' showaddelement='yes'/>
                                <b:section class='stylebox1 section' id='stylebox-4' showaddelement='yes'/>
                                <b:section class='stylebox section' id='stylebox-5' showaddelement='yes'/>
                                <b:section class='stylebox section' id='stylebox-6' showaddelement='yes'/>
                                <b:section class='stylebox1 section' id='stylebox-7' showaddelement='yes'/>
                            </b:if>
                            <div class='clear'/>
                            <div id='singlepage'>
                                <b:section class='main' id='main' showaddelement='no'>
                                  <b:widget id='Blog1' locked='true' title='Blog Posts' type='Blog'>
                                    <b:includable id='main' var='top'>
                                            <b:include data='posts' name='breadcrumb'/>
                                            <b:if cond='data:mobile == &quot;false&quot;'>
                                                <!-- posts -->
                                                <div class='blog-posts hfeed'>
                                                    <b:include data='top' name='status-message'/>
                                                    <data:defaultAdStart/>
                                                    <b:loop values='data:posts' var='post'>
                                                        <b:if cond='data:post.isDateStart'>
                                                            <b:if cond='data:post.isFirstPost == &quot;false&quot;'>
                                &lt;/div&gt;&lt;/div&gt;
                                                            </b:if>
                                                        </b:if>
                                                        <b:if cond='data:post.isDateStart'>
                              &lt;div class=&quot;date-outer&quot;&gt;
                                                        </b:if>
                                                        <b:if cond='data:post.isDateStart'>
                              &lt;div class=&quot;date-posts&quot;&gt;
                                                        </b:if>
                                                        <div class='post-outer'>
                                                            <b:include data='post' name='post'/>
                                                            <b:if cond='data:blog.pageType == &quot;static_page&quot;'>
                                                                <b:include data='post' name='comment_picker'/>
                                                            </b:if>
                                                            <b:if cond='data:blog.pageType == &quot;item&quot;'>
                                                                <b:include data='post' name='comment_picker'/>
                                                            </b:if>
                                                        </div>
                                                        <b:if cond='data:post.includeAd'>
                                                            <b:if cond='data:post.isFirstPost'>
                                                                <data:defaultAdEnd/>
                                                                <b:else/>
                                                                <data:adEnd/>
                                                            </b:if>
                                                            <div class='inline-ad'>
                                                                <data:adCode/>
                                                            </div>
                                                            <data:adStart/>
                                                        </b:if>
                                                    </b:loop>
                                                    <b:if cond='data:numPosts != 0'>
                            &lt;/div&gt;&lt;/div&gt;
                                                    </b:if>
                                                    <data:adEnd/>
                                                </div>
                                                <!-- navigation -->
                                                <b:if cond='data:blog.pageType == &quot;index&quot;'>
                                                    <b:include name='page-navi'/>
                                                    <b:else/>
                                                    <b:if cond='data:blog.pageType == &quot;archive&quot;'>
                                                        <b:include name='page-navi'/>
                                                        <b:else/>
                                                        <b:include name='nextprev'/>
                                                    </b:if>
                                                </b:if>
                                                <!-- feed links -->
                                                <b:include name='feedLinks'/>
                                                <b:if cond='data:top.showStars'>
                                                    <script src='//www.google.com/jsapi' type='text/javascript'/>
                                                    <script type='text/javascript'>
                                                        google.load(&quot;annotations&quot;, &quot;1&quot;, {&quot;locale&quot;: &quot;<data:top.languageCode/>&quot;});
                                                        function initialize() {
                                                        google.annotations.setApplicationId(<data:top.blogspotReviews/>);
                                                        google.annotations.createAll();
                                                        google.annotations.fetch();
                                                        }
                                                        google.setOnLoadCallback(initialize);
                                                    </script>
                                                </b:if>
                                                <b:else/>
                                                <b:include name='mobile-main'/>
                                            </b:if>
                                            <b:if cond='data:top.showDummy'>
                                                <data:top.dummyBootstrap/>
                                            </b:if>
                                        </b:includable>
                                    <b:includable id='authorblog'>
                                            <div id='author-box'>
                                                <div class='block-head'>
                                                    <h3>
                                                        About 
                                                        <data:post.author/>
                                                    </h3>
                                                    <div class='stripe-line'/>
                                                </div>
                                                <div class='post-listing'>
                                                    <div class='author-avatar'>
                                                        <script src='/feeds/posts/default?alt=json-in-script&amp;callback=authorshow'/>
                                                    </div>
                                                    <div class='author-description'>
                                                        <data:post.authorAboutMe/>
                                                    </div>
                                                    <div class='clear'/>
                                                </div>
                                            </div>
                                            <!--/entry author-->
                                        </b:includable>
                                    <b:includable id='backlinkDeleteIcon' var='backlink'>
                                            <span expr:class='&quot;item-control &quot; + data:backlink.adminClass'>
                                                <a expr:href='data:backlink.deleteUrl' expr:title='data:top.deleteBacklinkMsg'>
                                                    <img src='//www.blogger.com/img/icon_delete13.gif'/>
                                                </a>
                                            </span>
                                        </b:includable>
                                    <b:includable id='backlinks' var='post'>
                                            <a name='links'/>
                                            <h4>
                                                <data:post.backlinksLabel/>
                                            </h4>
                                            <b:if cond='data:post.numBacklinks != 0'>
                                                <dl class='comments-block' id='comments-block'>
                                                    <b:loop values='data:post.backlinks' var='backlink'>
                                                        <div class='collapsed-backlink backlink-control'>
                                                            <dt class='comment-title'>
                                                                <span class='backlink-toggle-zippy'>
                                  &#160;
                                                                </span>
                                                                <a expr:href='data:backlink.url' rel='nofollow'>
                                                                    <data:backlink.title/>
                                                                </a>
                                                                <b:include data='backlink' name='backlinkDeleteIcon'/>
                                                            </dt>
                                                            <dd class='comment-body collapseable'>
                                                                <data:backlink.snippet/>
                                                            </dd>
                                                            <dd class='comment-footer collapseable'>
                                                                <span class='comment-author'>
                                                                    <data:post.authorLabel/>
                                                                    <data:backlink.author/>
                                                                </span>
                                                                <span class='comment-timestamp'>
                                                                    <data:post.timestampLabel/>
                                                                    <data:backlink.timestamp/>
                                                                </span>
                                                            </dd>
                                                        </div>
                                                    </b:loop>
                                                </dl>
                                            </b:if>
                                            <p class='comment-footer'>
                                                <a class='comment-link' expr:href='data:post.createLinkUrl' expr:id='data:widget.instanceId + &quot;_backlinks-create-link&quot;' target='_blank'>
                                                    <data:post.createLinkLabel/>
                                                </a>
                                            </p>
                                        </b:includable>
                                    <b:includable id='breadcrumb' var='posts'>
                                            <b:if cond='data:blog.homepageUrl != data:blog.url'> 
                                                <b:if cond='data:blog.pageType == &quot;static_page&quot;'>
                                                    <div class='breadcrumbs'>
                                                        <span>
                                                            <a expr:href='data:blog.homepageUrl' rel='nofollow'>Home</a>
                                                        </span> / <span>
                                                            <data:blog.pageName/>
                                                        </span>
                                                    </div>
                                                    <b:else/>
                                                    <b:if cond='data:blog.pageType == &quot;item&quot;'>
                                                        <b:loop values='data:posts' var='post'>
                                                            <b:if cond='data:post.labels'>
                                                                <div class='breadcrumbs'>
                                                                    <span itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                                                                        <a expr:href='data:blog.homepageUrl' itemprop='url'>
                                                                            <span itemprop='title'>Home</span>
                                                                        </a>
                                                                    </span> / <b:loop values='data:post.labels' var='label'>
                                                                        <span itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                                                                            <a expr:href='data:label.url + &quot;?&amp;max-results=8&quot;' itemprop='url'>
                                                                                <span itemprop='title'>
                                                                                    <data:label.name/>
                                                                                </span>
                                                                            </a>
                                                                        </span>
                                                                        <b:if cond='data:label.isLast != &quot;true&quot;'> / </b:if> 
                                                                    </b:loop> / <span>
                                                                        <data:post.title/>
                                                                    </span>
                                                                </div>
                                                                <b:else/>
                                                                <div class='breadcrumbs'>
                                                                    <span>
                                                                        <a expr:href='data:blog.homepageUrl' rel='nofollow'>Home</a>
                                                                    </span> / <span>Uncategories</span> / <span>
                                                                        <data:post.title/>
                                                                    </span>
                                                                </div>
                                                            </b:if>
                                                        </b:loop>
                                                        <b:else/>
                                                        <b:if cond='data:blog.pageType == &quot;archive&quot;'>
                                                            <div class='breadcrumbs'> 
                                                                <span>
                                                                    <a expr:href='data:blog.homepageUrl' rel='nofollow'>Home</a>
                                                                </span> / <span>Archive for <data:blog.pageName/></span> 
                                                            </div> 
                                                            <b:else/>
                                                            <b:if cond='data:blog.searchQuery'>
                                                                <div class='breadcrumbs'>
                                                                    <span>
                                                                        <a expr:href='data:blog.homepageUrl' rel='nofollow'>Home</a>
                                                                    </span> / <span>
                                                                        <data:blog.pageName/>
                                                                    </span>
                                                                </div>
                                                                <b:else/>
                                                                <b:if cond='data:blog.pageType == &quot;index&quot;'> 
                                                                    <div class='breadcrumbs'>
                                                                        <b:if cond='data:blog.pageName == &quot;&quot;'> 
                                                                            <span>
                                                                                <a expr:href='data:blog.homepageUrl' rel='nofollow'>Home</a>
                                                                            </span> / <span>All post</span>
                                                                            <b:else/>
                                                                            <span>
                                                                                <a expr:href='data:blog.homepageUrl' rel='nofollow'>Home</a>
                                                                            </span> / <span>
                                                                                <data:blog.pageName/>
                                                                            </span> 
                                                                        </b:if>
                                                                    </div>
                                                                </b:if>
                                                            </b:if>
                                                        </b:if>
                                                    </b:if>
                                                </b:if>
                                            </b:if>
                                        </b:includable>
                                    <b:includable id='comment-form' var='post'>
                                            <div class='comment-form'>
                                                <a name='comment-form'/>
                                                <b:if cond='data:mobile'>
                                                    <h4 id='comment-post-message'>
                                                        <a expr:id='data:widget.instanceId + &quot;_comment-editor-toggle-link&quot;' href='javascript:void(0)'>
                                                            <data:postCommentMsg/>
                                                        </a>
                                                    </h4>
                                                    <div class='pesan-komentar'>
                                                        <p>
                                                            <data:blogCommentMessage/>
                                                        </p>
                                                    </div>
                                                    <data:blogTeamBlogMessage/>
                                                    <a expr:href='data:post.commentFormIframeSrc' id='comment-editor-src'/>
                                                    <iframe allowtransparency='true' class='blogger-iframe-colorize blogger-comment-from-post' frameborder='0' height='410' id='comment-editor' name='comment-editor' src='' style='display: none' width='100%'/>
                                                    <b:else/>
                                                    <h4 id='comment-post-message'>
                                                        <data:postCommentMsg/>
                                                    </h4>
                                                    <div class='pesan-komentar'>
                                                        <p>
                                                            <data:blogCommentMessage/>
                                                        </p>
                                                    </div>
                                                    <data:blogTeamBlogMessage/>
                                                    <a expr:href='data:post.commentFormIframeSrc' id='comment-editor-src'/>
                                                    <iframe allowtransparency='true' class='blogger-iframe-colorize blogger-comment-from-post' frameborder='0' height='410' id='comment-editor' name='comment-editor' src='' width='100%'/>
                                                </b:if>
                                                <data:post.friendConnectJs/>
                                                <data:post.cmtfpIframe/>
                                                <script type='text/javascript'>
                                                    BLOG_CMT_createIframe(&#39;<data:post.appRpcRelayPath/>&#39;, &#39;<data:post.communityId/>&#39;);
                                                </script>
                                            </div>
                                        </b:includable>
                                    <b:includable id='commentDeleteIcon' var='comment'>
                                            <span expr:class='&quot;item-control &quot; + data:comment.adminClass'>
                                                <b:if cond='data:showCmtPopup'>
                                                    <div class='goog-toggle-button'>
                                                        <div class='goog-inline-block comment-action-icon'/>
                                                    </div>
                                                    <b:else/>
                                                    <a class='comment-delete' expr:href='data:comment.deleteUrl' expr:title='data:top.deleteCommentMsg'>
                                                        <img src='//www.blogger.com/img/icon_delete13.gif'/>
                                                    </a>
                                                </b:if>
                                            </span>
                                        </b:includable>
                                    <b:includable id='comment_count_picker' var='post'>
                                            <b:if cond='data:post.commentSource == 1'>
                                                <span class='cmt_count_iframe_holder' expr:data-count='data:post.numComments' expr:data-onclick='data:post.addCommentOnclick' expr:data-post-url='data:post.url' expr:data-url='data:post.canonicalUrl'>
                                                </span>
                                                <b:else/>
                                                <a class='comment-link' expr:href='data:post.addCommentUrl' expr:onclick='data:post.addCommentOnclick'>
                                                    <data:post.commentLabelFull/>
                                                    :
                                                </a>
                                            </b:if>
                                        </b:includable>
                                    <b:includable id='comment_picker' var='post'>
                                            <b:if cond='data:post.commentSource == 1'>
                                                <b:include data='post' name='iframe_comments'/>
                                                <b:else/>
                                                <b:if cond='data:post.showThreadedComments'>
                                                    <b:include data='post' name='threaded_comments'/>
                                                    <b:else/>
                                                    <b:include data='post' name='comments'/>
                                                </b:if>
                                            </b:if>
                                        </b:includable>
                                    <b:includable id='comments' var='post'>
                                            <div id='top-comment'>
                                                <div class='top-comment-widget-menu clear'>
                                                    <ul>
                                                        <dl class='top-comment faceico'>Facebook Comment</dl><!--Replace "Recent Games" With Your Own Text-->
                                                        <dl class='top-comment blogico'>Blogger Comment</dl><!--Replace "New Movies" With Your Own Text-->

                                                    </ul>
                                                </div>


                                                <div class='widget2' id='top-comment1'> 

                                                    <div class='centerare2'>

                                                        <div class='fbcombox'>
                                                            <div>
                                                                <fb:comments colorscheme='light' expr:href='data:post.url' expr:title='data:post.title' expr:xid='data:post.id' height='110' width='639'/>
                                                            </div> 
                                                        </div>

                                                    </div>

                                                </div>
                                                <div class='widget2' id='top-comment2'> 

                                                    <div class='centerare1'>

                                                        <div class='comments' id='comments'>

                                                            <a name='comments'/>
                                                            <b:if cond='data:post.allowComments'>
                                                                <div class='komhead'>
                                                                    <h4>
                                                                        <b:if cond='data:post.numComments == 1'>
                                                                            1 <data:commentLabel/>:
                                                                            <b:else/>
                                                                            <data:post.numComments/> 
                                                                            <data:commentLabelPlural/>:
                                                                        </b:if>
                                                                    </h4>
                                                                    <div class='stripe-line'/>
                                                                </div>
                                                                <b:if cond='data:post.commentPagingRequired'>
                                                                    <span class='paging-control-container'>
                                                                        <a expr:class='data:post.oldLinkClass' expr:href='data:post.oldestLinkUrl'>
                                                                            <data:post.oldestLinkText/>
                                                                        </a>
          &#160;
                                                                        <a expr:class='data:post.oldLinkClass' expr:href='data:post.olderLinkUrl'>
                                                                            <data:post.olderLinkText/>
                                                                        </a>
          &#160;
                                                                        <data:post.commentRangeText/>
          &#160;
                                                                        <a expr:class='data:post.newLinkClass' expr:href='data:post.newerLinkUrl'>
                                                                            <data:post.newerLinkText/>
                                                                        </a>
          &#160;
                                                                        <a expr:class='data:post.newLinkClass' expr:href='data:post.newestLinkUrl'>
                                                                            <data:post.newestLinkText/>
                                                                        </a>
                                                                    </span>
                                                                </b:if>

                                                                <div expr:id='data:widget.instanceId + &quot;_comments-block-wrapper&quot;'>
                                                                    <dl expr:class='data:post.avatarIndentClass' id='comments-block'>
                                                                        <b:loop values='data:post.comments' var='comment'>
                                                                            <dt expr:class='&quot;comment-author &quot; + data:comment.authorClass' expr:id='data:comment.anchorName'>
                                                                                <b:if cond='data:comment.favicon'>
                                                                                    <img expr:src='data:comment.favicon' height='16px' style='margin-bottom:-2px;' width='16px'/>
                                                                                </b:if>
                                                                                <a expr:name='data:comment.anchorName'/>
                                                                                <b:if cond='data:blog.enabledCommentProfileImages'>
                                                                                    <data:comment.authorAvatarImage/>
                                                                                </b:if>
                                                                                <b:if cond='data:comment.authorUrl'>
                                                                                    <a expr:href='data:comment.authorUrl' rel='nofollow'>
                                                                                        <data:comment.author/>
                                                                                    </a>
                                                                                    <b:else/>
                                                                                    <data:comment.author/>
                                                                                </b:if>
                                                                                <data:commentPostedByMsg/>
                                                                            </dt>
                                                                            <dd class='comment-body' expr:id='data:widget.instanceId + data:comment.cmtBodyIdPostfix'>
                                                                                <b:if cond='data:comment.isDeleted'>
                                                                                    <span class='deleted-comment'>
                                                                                        <data:comment.body/>
                                                                                    </span>
                                                                                    <b:else/>
                                                                                    <p>
                                                                                        <data:comment.body/>
                                                                                    </p>
                                                                                </b:if>
                                                                            </dd>
                                                                            <dd class='comment-footer'>
                                                                                <span class='comment-timestamp'>
                                                                                    <a expr:href='data:comment.url' title='comment permalink'>
                                                                                        <data:comment.timestamp/>
                                                                                    </a>
                                                                                    <b:include data='comment' name='commentDeleteIcon'/>
                                                                                </span>
                                                                            </dd>
                                                                        </b:loop>
                                                                    </dl>
                                                                </div>

                                                                <b:if cond='data:post.commentPagingRequired'>
                                                                    <span class='paging-control-container'>
                                                                        <a expr:class='data:post.oldLinkClass' expr:href='data:post.oldestLinkUrl'>
                                                                            <data:post.oldestLinkText/>
                                                                        </a>
                                                                        <a expr:class='data:post.oldLinkClass' expr:href='data:post.olderLinkUrl'>
                                                                            <data:post.olderLinkText/>
                                                                        </a>
          &#160;
                                                                        <data:post.commentRangeText/>
          &#160;
                                                                        <a expr:class='data:post.newLinkClass' expr:href='data:post.newerLinkUrl'>
                                                                            <data:post.newerLinkText/>
                                                                        </a>
                                                                        <a expr:class='data:post.newLinkClass' expr:href='data:post.newestLinkUrl'>
                                                                            <data:post.newestLinkText/>
                                                                        </a>
                                                                    </span>
                                                                </b:if>

                                                                <p class='comment-footer'>
                                                                    <b:if cond='data:post.embedCommentForm'>
                                                                        <b:if cond='data:post.allowNewComments'>
                                                                            <b:include data='post' name='comment-form'/>
                                                                            <b:else/>
                                                                            <data:post.noNewCommentsText/>
                                                                        </b:if>
                                                                        <b:else/>
                                                                        <b:if cond='data:post.allowComments'>
                                                                            <a expr:href='data:post.addCommentUrl' expr:onclick='data:post.addCommentOnclick'>
                                                                                <data:postCommentMsg/>
                                                                            </a>
                                                                        </b:if>
                                                                    </b:if>

                                                                </p>
                                                            </b:if>
                                                            <b:if cond='data:showCmtPopup'>
                                                                <div id='comment-popup'>
                                                                    <iframe allowtransparency='true' frameborder='0' id='comment-actions' name='comment-actions' scrolling='no'>
                                                                    </iframe>
                                                                </div>
                                                            </b:if>

                                                            <div id='backlinks-container'>
                                                                <div expr:id='data:widget.instanceId + &quot;_backlinks-container&quot;'>
                                                                    <b:if cond='data:post.showBacklinks'>
                                                                        <b:include data='post' name='backlinks'/>
                                                                    </b:if>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>
                                                <script type='text/javascript'>
                                                    //<![CDATA[
$(document).ready(function(){
$('#top-comment .widget2').hide();
$('#top-comment .widget2:first').show();
$('.top-comment-widget-menu ul dl:first').addClass('selected');
$('.top-comment-widget-menu ul dl').click(function(){ 
$('.top-comment-widget-menu ul dl').removeClass('selected');
$(this).addClass('selected');
$('#top-comment .widget2').hide();
$('#top-comment .widget2').eq($('.top-comment-widget-menu ul dl').index(this)).slideDown()(300);
});
});
//]]>
                                                </script>

                                            </div>
                                        </b:includable>
                                    <b:includable id='feedLinks'>
                                            <b:if cond='data:blog.pageType != &quot;item&quot;'>
                                                <!-- Blog feed links -->
                                                <b:if cond='data:feedLinks'>
                                                    <div class='blog-feeds'>
                                                        <b:include data='feedLinks' name='feedLinksBody'/>
                                                    </div>
                                                </b:if>
                                                <b:else/>
                                                <!--Post feed links -->
                                                <div class='post-feeds'>
                                                    <b:loop values='data:posts' var='post'>
                                                        <b:if cond='data:post.allowComments'>
                                                            <b:if cond='data:post.feedLinks'>
                                                                <b:include data='post.feedLinks' name='feedLinksBody'/>
                                                            </b:if>
                                                        </b:if>
                                                    </b:loop>
                                                </div>
                                            </b:if>
                                        </b:includable>
                                    <b:includable id='feedLinksBody' var='links'>
                                            <div class='feed-links'>
                                                <data:feedLinksMsg/>
                                                <b:loop values='data:links' var='f'>
                                                    <a class='feed-link' expr:href='data:f.url' expr:type='data:f.mimeType' target='_blank'>
                                                        <data:f.name/>
                                                        (
                                                        <data:f.feedType/>
                                                        )
                                                    </a>
                                                </b:loop>
                                            </div>
                                        </b:includable>
                                    <b:includable id='iframe_comments' var='post'>
                                            <b:if cond='data:post.allowIframeComments'>
                                                <script expr:src='data:post.iframeCommentSrc' type='text/javascript'/>
                                                <div class='cmt_iframe_holder' expr:data-href='data:post.canonicalUrl' expr:data-viewtype='data:post.viewType'/>
                                                <b:if cond='data:post.embedCommentForm == &quot;false&quot;'>
                                                    <a expr:href='data:post.addCommentUrl' expr:onclick='data:post.addCommentOnclick'>
                                                        <data:postCommentMsg/>
                                                    </a>
                                                </b:if>
                                            </b:if>
                                        </b:includable>
                                    <b:includable id='mobile-index-post' var='post'>
                                            <!-- MOBILE INDEX POST HERE -->
                                            <div class='mobile-date-outer date-outer'>
                                                <div class='mobile-post-outer'>
                                                    <div class='mobile-index-contents'>
                                                        <b:if cond='data:post.thumbnailUrl'>
                                                            <div class='mobile-index-thumbnail'>
                                                                <div class='Image'>
                                                                    <img expr:src='data:post.thumbnailUrl'/>
                                                                </div>
                                                            </div>
                                                            <b:else/>
                                                            <div class='mobile-index-thumbnail'>
                                                                <div class='Image'>
                                                                    <img expr:alt='data:post.title' expr:title='data:post.title' src='http://3.bp.blogspot.com/-ltyYh4ysBHI/U04MKlHc6pI/AAAAAAAADQo/PFxXaGZu9PQ/s66-c/no-image.png'/>
                                                                </div>
                                                            </div>
                                                        </b:if>
                                                        <a expr:href='data:post.url'>
                                                            <h3 class='mobile-index-title entry-title' itemprop='name'>
                                                                <data:post.title/>
                                                            </h3>
                                                        </a>
                                                        <div class='post-body'>
                                                            <div class='post-info'>
                                                                <b:if cond='data:top.showAuthor'>
                                                                    <b:if cond='data:post.authorProfileUrl'>
                                                                        <span class='author-info'>
                                                                            <i class='fa fa-user'/>
                                                                            <span class='fn' itemprop='author' itemscope='itemscope' itemtype='http://schema.org/Person'>
                                                                                <meta expr:content='data:post.authorProfileUrl' itemprop='url'/>
                                                                                <a class='g-profile' expr:href='data:post.authorProfileUrl' rel='author' title='author profile'>
                                                                                    <span itemprop='name'>
                                                                                        <data:post.author/>
                                                                                    </span>
                                                                                </a>
                                                                            </span>
                                                                        </span>
                                                                        <b:else/>
                                                                        <span class='author-info'>
                                                                            <span class='fn' itemprop='author' itemscope='itemscope' itemtype='http://schema.org/Person'>
                                                                                <span itemprop='name'>
                                                                                    <data:post.author/>
                                                                                </span>
                                                                            </span>
                                                                        </span>
                                                                    </b:if>
                                                                </b:if>
                                                                <b:if cond='data:top.showTimestamp'>
                                                                    <b:if cond='data:post.url'>
                                                                        <meta expr:content='data:post.canonicalUrl' itemprop='url'/>
                                                                        <span class='time-info'>
                                                                            <i class='fa fa-calendar'/>
                                                                            <a class='timestamp-link' expr:href='data:post.url' rel='bookmark' title='permanent link'>
                                                                                <abbr class='published updated' expr:title='data:post.timestampISO8601' itemprop='datePublished'>
                                                                                    <data:post.timestamp/>
                                                                                </abbr>
                                                                            </a>
                                                                        </span>
                                                                    </b:if>
                                                                </b:if>
                                                                <b:if cond='data:blog.pageType != &quot;item&quot;'>
                                                                    <b:if cond='data:blog.pageType != &quot;static_page&quot;'>
                                                                        <b:if cond='data:post.allowComments'>
                                                                            <span class='comment-info'>
                                                                                <i class='fa fa-comments'/>
                                                                                <a expr:href='data:post.addCommentUrl' expr:onclick='data:post.addCommentOnclick'>
                                                                                    <b:if cond='data:post.numComments == 0'>
                                                                                        Add Comment 
                                                                                    </b:if>
                                                                                    <b:if cond='data:post.numComments == 1'>
                                                                                        1 Comment 
                                                                                    </b:if>
                                                                                    <b:if cond='data:post.numComments &gt; 1'>
                                                                                        <data:post.numComments/>
                                                                                        Comments 
                                                                                    </b:if>
                                                                                </a>
                                                                            </span>
                                                                        </b:if>
                                                                    </b:if>
                                                                </b:if>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div style='clear: both;'/>
                                                </div>
                                            </div>
                                        </b:includable>
                                    <b:includable id='mobile-main' var='top'>
                                            <!-- posts -->
                                            <div class='blog-posts hfeed'>
                                                <b:include data='top' name='status-message'/>
                                                <b:if cond='data:blog.pageType == &quot;index&quot;'>
                                                    <b:loop values='data:posts' var='post'>
                                                        <b:include data='post' name='mobile-index-post'/>
                                                    </b:loop>
                                                    <b:else/>
                                                    <b:loop values='data:posts' var='post'>
                                                        <b:include data='post' name='mobile-post'/>
                                                    </b:loop>
                                                </b:if>
                                            </div>
                                            <b:include name='mobile-nextprev'/>
                                        </b:includable>
                                    <b:includable id='mobile-nextprev'>
                                            <!-- MOBILE PAGE NAVIGATION LINKS HERE -->
                                            <div class='blog-pager' id='blog-pager'>
                                                <b:if cond='data:newerPageUrl'>
                                                    <div class='mobile-link-button' id='blog-pager-newer-link'>
                                                        <a class='blog-pager-newer-link' expr:href='data:newerPageUrl' expr:id='data:widget.instanceId + &quot;_blog-pager-newer-link&quot;' expr:title='data:newerPageTitle'>
                              &amp;lsaquo;
                                                        </a>
                                                    </div>
                                                </b:if>
                                                <b:if cond='data:olderPageUrl'>
                                                    <div class='mobile-link-button' id='blog-pager-older-link'>
                                                        <a class='blog-pager-older-link' expr:href='data:olderPageUrl' expr:id='data:widget.instanceId + &quot;_blog-pager-older-link&quot;' expr:title='data:olderPageTitle'>
                              &amp;rsaquo;
                                                        </a>
                                                    </div>
                                                </b:if>
                                                <div class='mobile-link-button' id='blog-pager-home-link'>
                                                    <a class='home-link' expr:href='data:blog.homepageUrl'>
                                                        <data:homeMsg/>
                                                    </a>
                                                </div>
                                                <div class='mobile-desktop-link'>
                                                    <a class='home-link' expr:href='data:desktopLinkUrl'>
                                                        <data:desktopLinkMsg/>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class='clear'/>
                                        </b:includable>
                                    <b:includable id='mobile-post' var='post'>
                                            <!-- MOBILE ITEM POST HERE -->
                                            <div class='date-outer'>
                                                <div class='date-posts'>
                                                    <div class='post-outer'>
                                                        <div class='post hentry uncustomized-post-template' itemscope='itemscope' itemtype='http://schema.org/BlogPosting'>
                                                            <b:if cond='data:post.thumbnailUrl'>
                                                                <meta expr:content='data:post.thumbnailUrl' itemprop='image_url'/>
                                                            </b:if>
                                                            <meta expr:content='data:blog.blogId' itemprop='blogId'/>
                                                            <meta expr:content='data:post.id' itemprop='postId'/>
                                                            <a expr:name='data:post.id'/>
                                                            <b:if cond='data:post.title'>
                                                                <h3 class='mobile-post-title entry-title' itemprop='name'>
                                                                    <b:if cond='data:post.link'>
                                                                        <a expr:href='data:post.link'>
                                                                            <data:post.title/>
                                                                        </a>
                                                                        <b:else/>
                                                                        <b:if cond='data:post.url'>
                                                                            <b:if cond='data:blog.url != data:post.url'>
                                                                                <a expr:href='data:post.url'>
                                                                                    <data:post.title/>
                                                                                </a>
                                                                                <b:else/>
                                                                                <data:post.title/>
                                                                            </b:if>
                                                                            <b:else/>
                                                                            <data:post.title/>
                                                                        </b:if>
                                                                    </b:if>
                                                                </h3>
                                                            </b:if>
                                                            <div class='post-header'>
                                                                <div class='post-header-line-1'/>
                                                            </div>
                                                            <div class='post-info' style='margin-bottom:15px;'>
                                                                <b:if cond='data:top.showAuthor'>
                                                                    <b:if cond='data:post.authorProfileUrl'>
                                                                        <span class='author-info'>
                                                                            <i class='fa fa-user'/>
                                                                            <span class='fn' itemprop='author' itemscope='itemscope' itemtype='http://schema.org/Person'>
                                                                                <meta expr:content='data:post.authorProfileUrl' itemprop='url'/>
                                                                                <a class='g-profile' expr:href='data:post.authorProfileUrl' rel='author' title='author profile'>
                                                                                    <span itemprop='name'>
                                                                                        <data:post.author/>
                                                                                    </span>
                                                                                </a>
                                                                            </span>
                                                                        </span>
                                                                        <b:else/>
                                                                        <span class='author-info'>
                                                                            <span class='fn' itemprop='author' itemscope='itemscope' itemtype='http://schema.org/Person'>
                                                                                <span itemprop='name'>
                                                                                    <data:post.author/>
                                                                                </span>
                                                                            </span>
                                                                        </span>
                                                                    </b:if>
                                                                </b:if>
                                                                <b:if cond='data:top.showTimestamp'>
                                                                    <b:if cond='data:post.url'>
                                                                        <meta expr:content='data:post.canonicalUrl' itemprop='url'/>
                                                                        <span class='time-info'>
                                                                            <i class='fa fa-calendar'/>
                                                                            <a class='timestamp-link' expr:href='data:post.url' rel='bookmark' title='permanent link'>
                                                                                <abbr class='published updated' expr:title='data:post.timestampISO8601' itemprop='datePublished'>
                                                                                    <data:post.timestamp/>
                                                                                </abbr>
                                                                            </a>
                                                                        </span>
                                                                    </b:if>
                                                                </b:if>
                                                                <b:if cond='data:blog.pageType != &quot;item&quot;'>
                                                                    <b:if cond='data:blog.pageType != &quot;static_page&quot;'>
                                                                        <b:if cond='data:post.allowComments'>
                                                                            <span class='comment-info'>
                                                                                <i class='fa fa-comments'/>
                                                                                <a expr:href='data:post.addCommentUrl' expr:onclick='data:post.addCommentOnclick'>
                                                                                    <b:if cond='data:post.numComments == 0'>
                                                                                        Add Comment 
                                                                                    </b:if>
                                                                                    <b:if cond='data:post.numComments == 1'>
                                                                                        1 Comment 
                                                                                    </b:if>
                                                                                    <b:if cond='data:post.numComments &gt; 1'>
                                                                                        <data:post.numComments/>
                                                                                        Comments 
                                                                                    </b:if>
                                                                                </a>
                                                                            </span>
                                                                        </b:if>
                                                                    </b:if>
                                                                </b:if>
                                                            </div>
                                                            <div class='post-body entry-content' expr:id='&quot;post-body-&quot; + data:post.id' itemprop='articleBody'>
                                                                <!-- IKLAN BAWAH JUDUL VERSI MOBILE -->
                                                                <data:post.body/>
                                                                <div style='clear: both;'/>
                                                                <div id='share-buttons-mobile'>
                                                                    <p>
                                                                        Share : 
                                                                    </p>
                                                                    <a expr:href='&quot;http://www.facebook.com/sharer.php?u=&quot; + data:blog.url' rel='nofollow' style='background:#3b5998;'>
                                                                        Facebook
                                                                    </a>
                                                                    <a expr:href='&quot;http://plus.google.com/share?url=&quot; + data:blog.url' rel='nofollow' style='background:#c0361a;'>
                                                                        Google+
                                                                    </a>
                                                                    <a expr:href='&quot;https://twitter.com/intent/tweet?url=&quot; + data:blog.url + &quot;&amp;text=&quot; + data:post.title + &quot;&amp;lang=id&quot;' rel='nofollow' style='background:#4099ff;'>
                                                                        Twitter
                                                                    </a>
                                                                    <div class='clear'/>
                                                                </div>
                                                                <div id='related-posts-mobile'>
                                                                    <h3>
                                                                        Related Posts :
                                                                    </h3>
                                                                    <b:loop values='data:post.labels' var='label'>
                                                                        <b:if cond='data:label.isLast != &quot;true&quot;'/>
                                                                        <b:if cond='data:blog.pageType == &quot;item&quot;'>
                                                                            <script expr:src='&quot;/feeds/posts/default/-/&quot; + data:label.name + &quot;?alt=json-in-script&amp;callback=related_results_labels&amp;max-results=5&quot;' type='text/javascript'/>
                                                                        </b:if>
                                                                    </b:loop>
                                                                    <script type='text/javascript'>
                                                                        removeRelatedDuplicates(); printRelatedLabels(); </script>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <b:if cond='data:blog.pageType == &quot;static_page&quot;'>
                                                            <b:include data='post' name='comment_picker'/>
                                                        </b:if>
                                                        <b:if cond='data:blog.pageType == &quot;item&quot;'>
                                                            <b:include data='post' name='comment_picker'/>
                                                        </b:if>
                                                    </div>
                                                </div>
                                            </div>
                                        </b:includable>
                                    <b:includable id='nextprev'>
                                            <div class='blog-pager' id='blog-pager'>
                                                <b:if cond='data:newerPageUrl'>
                                                    <span id='blog-pager-newer-link'>
                                                        <a class='blog-pager-newer-link' expr:href='data:newerPageUrl' expr:id='data:widget.instanceId + &quot;_blog-pager-newer-link&quot;' expr:title='data:newerPageTitle'>
                                                            <data:newerPageTitle/>
                                                        </a>
                                                    </span>
                                                </b:if>
                                                <b:if cond='data:olderPageUrl'>
                                                    <span id='blog-pager-older-link'>
                                                        <a class='blog-pager-older-link' expr:href='data:olderPageUrl' expr:id='data:widget.instanceId + &quot;_blog-pager-older-link&quot;' expr:title='data:olderPageTitle'>
                                                            <data:olderPageTitle/>
                                                        </a>
                                                    </span>
                                                </b:if>
                                                <a class='home-link' expr:href='data:blog.homepageUrl'>
                                                    <data:homeMsg/>
                                                </a>
                                                <b:if cond='data:mobileLinkUrl'>
                                                    <div class='blog-mobile-link'>
                                                        <a expr:href='data:mobileLinkUrl'>
                                                            <data:mobileLinkMsg/>
                                                        </a>
                                                    </div>
                                                </b:if>
                                            </div>
                                            <div class='clear'/>
                                        </b:includable>
                                    <b:includable id='page-navi'>
                                            <div class='pagenavi'>
                                                <script type='text/javascript'>
                                                    var pageNaviConf = {
                                                    perPage: 5,
                                                    numPages: 9,
                                                    firstText: &quot;First&quot;,
                                                    lastText: &quot;Last&quot;,
                                                    nextText: &quot;Next&quot;,
                                                    prevText: &quot;Prev&quot;
                                                    }
                                                </script>
                                                <script type='text/javascript'>
                                                    //<![CDATA[
                          function pageNavi(o){var m=location.href,l=m.indexOf("/search/label/")!=-1,a=l?m.substr(m.indexOf("/search/label/")+14,m.length):"";a=a.indexOf("?")!=-1?a.substr(0,a.indexOf("?")):a;var g=l?"/search/label/"+a+"?updated-max=":"/search?updated-max=",k=o.feed.entry.length,e=Math.ceil(k/pageNaviConf.perPage);if(e<=1){return}var n=1,h=[""];l?h.push("/search/label/"+a+"?max-results="+pageNaviConf.perPage):h.push("/?max-results="+pageNaviConf.perPage);for(var d=2;d<=e;d++){var c=(d-1)*pageNaviConf.perPage-1,b=o.feed.entry[c].published.$t,f=b.substring(0,19)+b.substring(23,29);f=encodeURIComponent(f);if(m.indexOf(f)!=-1){n=d}h.push(g+f+"&max-results="+pageNaviConf.perPage)}pageNavi.show(h,n,e)}pageNavi.show=function(f,e,a){var d=Math.floor((pageNaviConf.numPages-1)/2),g=pageNaviConf.numPages-1-d,c=e-d;if(c<=0){c=1}endPage=e+g;if((endPage-c)<pageNaviConf.numPages){endPage=c+pageNaviConf.numPages-1}if(endPage>a){endPage=a;c=a-pageNaviConf.numPages+1}if(c<=0){c=1}var b='<span class="pages">Pages '+e+' of '+a+"</span> ";if(c>1){b+='<a href="'+f[1]+'">'+pageNaviConf.firstText+"</a>"}if(e>1){b+='<a href="'+f[e-1]+'">'+pageNaviConf.prevText+"</a>"}for(i=c;i<=endPage;++i){if(i==e){b+='<span class="current">'+i+"</span>"}else{b+='<a href="'+f[i]+'">'+i+"</a>"}}if(e<a){b+='<a href="'+f[e+1]+'">'+pageNaviConf.nextText+"</a>"}if(endPage<a){b+='<a href="'+f[a]+'">'+pageNaviConf.lastText+"</a>"}document.write(b)};(function(){var b=location.href;if(b.indexOf("?q=")!=-1||b.indexOf(".html")!=-1){return}var d=b.indexOf("/search/label/")+14;if(d!=13){var c=b.indexOf("?"),a=(c==-1)?b.substring(d):b.substring(d,c);document.write('<script type="text/javascript" src="/feeds/posts/summary/-/'+a+'?alt=json-in-script&callback=pageNavi&max-results=99999"><\/script>')}else{document.write('<script type="text/javascript" src="/feeds/posts/summary?alt=json-in-script&callback=pageNavi&max-results=99999"><\/script>')}})();
                          //]]>
                                                </script>
                                                <div class='clear'/>
                                            </div>
                                        </b:includable>
                                    <b:includable id='post' var='post'>
                                            <article class='post hentry' itemprop='blogPost' itemscope='itemscope' itemtype='http://schema.org/BlogPosting'>
                                                <b:if cond='data:post.firstImageUrl'>
                                                    <meta expr:content='data:post.firstImageUrl' itemprop='image'/>
                                                </b:if>
                                                <b:if cond='data:blog.pageType != &quot;item&quot;'>
                                                    <b:if cond='data:blog.pageType != &quot;static_page&quot;'>
                                                        <b:if cond='data:post.thumbnailUrl'>
                                                            <a expr:href='data:post.url'>
                                                                <div class='img-thumbnail'>
                                                                    <span class='rollover'/>
                                                                    <script type='text/javascript'>
                                                                        document.write(bp_thumbnail_resize(&quot;<data:post.thumbnailUrl/>&quot;,&#39;<data:post.title/>&#39;));
                                                                    </script>
                                                                </div>
                                                            </a>
                                                            <b:else/>
                                                            <b:if cond='data:post.firstImageUrl'>
                                                                <a expr:href='data:post.url'>
                                                                    <div class='img-thumbnail'>
                                                                        <span class='rollover'/>
                                                                        <img expr:alt='data:post.title' expr:src='data:post.firstImageUrl' expr:title='data:post.title'/>
                                                                    </div>
                                                                </a>
                                                                <b:else/>
                                                                <a expr:href='data:post.url'>
                                                                    <div class='img-thumbnail'>
                                                                        <span class='rollover'/>
                                                                        <img expr:alt='data:post.title' expr:title='data:post.title' src='http://3.bp.blogspot.com/-ltyYh4ysBHI/U04MKlHc6pI/AAAAAAAADQo/PFxXaGZu9PQ/w200-h150-c/no-image.png'/>
                                                                    </div>
                                                                </a>
                                                            </b:if>
                                                        </b:if>
                                                    </b:if>
                                                </b:if>
                                                <a expr:name='data:post.id'/>
                                                <b:if cond='data:post.title'>
                                                    <b:if cond='data:blog.pageType != &quot;item&quot;'>
                                                        <b:if cond='data:blog.pageType == &quot;static_page&quot;'>
                                                            <h1 class='post-title entry-title' itemprop='name'>
                                                                <b:if cond='data:post.link'>
                                                                    <a expr:href='data:post.link'>
                                                                        <data:post.title/>
                                                                    </a>
                                                                    <b:else/>
                                                                    <b:if cond='data:post.url'>
                                                                        <b:if cond='data:blog.url != data:post.url'>
                                                                            <a expr:href='data:post.url'>
                                                                                <data:post.title/>
                                                                            </a>
                                                                            <b:else/>
                                                                            <data:post.title/>
                                                                        </b:if>
                                                                        <b:else/>
                                                                        <data:post.title/>
                                                                    </b:if>
                                                                </b:if>
                                                            </h1>
                                                            <b:else/>
                                                            <h2 class='post-title entry-title' itemprop='name'>
                                                                <b:if cond='data:post.link'>
                                                                    <a expr:href='data:post.link'>
                                                                        <data:post.title/>
                                                                    </a>
                                                                    <b:else/>
                                                                    <b:if cond='data:post.url'>
                                                                        <b:if cond='data:blog.url != data:post.url'>
                                                                            <a expr:href='data:post.url'>
                                                                                <data:post.title/>
                                                                            </a>
                                                                            <b:else/>
                                                                            <data:post.title/>
                                                                        </b:if>
                                                                        <b:else/>
                                                                        <data:post.title/>
                                                                    </b:if>
                                                                </b:if>
                                                            </h2>
                                                        </b:if>
                                                        <b:else/>
                                                        <h1 class='post-title entry-title' itemprop='name'>
                                                            <b:if cond='data:post.link'>
                                                                <a expr:href='data:post.link'>
                                                                    <data:post.title/>
                                                                </a>
                                                                <b:else/>
                                                                <b:if cond='data:post.url'>
                                                                    <b:if cond='data:blog.url != data:post.url'>
                                                                        <a expr:href='data:post.url'>
                                                                            <data:post.title/>
                                                                        </a>
                                                                        <b:else/>
                                                                        <data:post.title/>
                                                                    </b:if>
                                                                    <b:else/>
                                                                    <data:post.title/>
                                                                </b:if>
                                                            </b:if>
                                                        </h1>
                                                    </b:if>
                                                </b:if>
                                                <div class='post-info'>
                                                    <b:if cond='data:top.showAuthor'>
                                                        <b:if cond='data:post.authorProfileUrl'>
                                                            <span class='author-info'>
                                                                <i class='fa fa-user'/>
                                                                <span class='vcard'>
                                                                    <span class='fn' itemprop='author' itemscope='itemscope' itemtype='http://schema.org/Person'>
                                                                        <meta expr:content='data:post.authorProfileUrl' itemprop='url'/>
                                                                        <a class='g-profile' expr:href='data:post.authorProfileUrl' rel='author' title='author profile'>
                                                                            <span itemprop='name'>
                                                                                <data:post.author/>
                                                                            </span>
                                                                        </a>
                                                                    </span>
                                                                </span>
                                                            </span>
                                                            <b:else/>
                                                            <span class='author-info'>
                                                                <span class='fn' itemprop='author' itemscope='itemscope' itemtype='http://schema.org/Person'>
                                                                    <span itemprop='name'>
                                                                        <data:post.author/>
                                                                    </span>
                                                                </span>
                                                            </span>
                                                        </b:if>
                                                    </b:if>
                                                    <b:if cond='data:top.showTimestamp'>
                                                        <b:if cond='data:post.url'>
                                                            <meta expr:content='data:post.canonicalUrl' itemprop='url'/>
                                                            <span class='time-info'>
                                                                <i class='fa fa-calendar'/>
                                                                <a class='timestamp-link' expr:href='data:post.url' rel='bookmark' title='permanent link'>
                                                                    <abbr class='published updated' expr:title='data:post.timestampISO8601' itemprop='datePublished'>
                                                                        <data:post.timestamp/>
                                                                    </abbr>
                                                                </a>
                                                            </span>
                                                        </b:if>
                                                    </b:if>
                                                    <b:if cond='data:blog.pageType != &quot;item&quot;'>
                                                        <b:if cond='data:blog.pageType != &quot;static_page&quot;'>
                                                            <b:if cond='data:post.allowComments'>
                                                                <span class='comment-info'>
                                                                    <i class='fa fa-comments'/>
                                                                    <a expr:href='data:post.addCommentUrl' expr:onclick='data:post.addCommentOnclick'>
                                                                        <b:if cond='data:post.numComments == 0'>
                                                                            Add Comment 
                                                                        </b:if>
                                                                        <b:if cond='data:post.numComments == 1'>
                                                                            1 Comment 
                                                                        </b:if>
                                                                        <b:if cond='data:post.numComments &gt; 1'>
                                                                            <data:post.numComments/>
                                                                            Comments 
                                                                        </b:if>
                                                                    </a>
                                                                </span>
                                                            </b:if>
                                                        </b:if>
                                                    </b:if>
                                                    <b:if cond='data:blog.pageType == &quot;item&quot;'>
                                                        <b:if cond='data:post.labels'>
                                                            <span class='label-info'>
                                                                <i class='fa fa-tags'/>
                                                                <b:loop values='data:post.labels' var='label'>
                                                                    <a expr:href='data:label.url' rel='tag'>
                                                                        <data:label.name/>
                                                                    </a>
                                                                    <b:if cond='data:label.isLast != &quot;true&quot;'>
                                                                        ,
                                                                    </b:if>
                                                                </b:loop>
                                                            </span>
                                                        </b:if>
                                                    </b:if>
                                                    <b:include data='post' name='postQuickEdit'/>
                                                </div>
                                                <div class='post-header'>
                                                    <div class='post-header-line-1'/>
                                                </div>

                                                <b:if cond='data:blog.pageType != &quot;item&quot;'>
                                                    <b:if cond='data:blog.pageType == &quot;static_page&quot;'>
                                                        <div class='post-body entry-content' expr:id='&quot;post-body-&quot; + data:post.id' itemprop='articleBody description'>
                                                            <data:post.body/>
                                                            <div style='clear: both;'/>
                                                        </div>
                                                        <b:else/>
                                                        <div class='post-body entry-content' expr:id='&quot;post-body-&quot; + data:post.id' itemprop='articleBody description'>
                                                            <div>
                                                                <data:post.snippet/>
                                                            </div>
                                                            <a class='readmore' expr:href='data:post.url + &quot;#more&quot;' expr:title='data:post.title'>
                                                                Read More 
                                                                <i class='fa fa-caret-right'/>
                                                            </a>
                                                            <div style='clear: both;'/>
                                                        </div>
                                                    </b:if>
                                                    <b:else/>
                                                    <!-- Then use the post body as the schema.org description, for good G+/FB snippeting. -->
                                                    <div class='post-body entry-content' expr:id='&quot;post-body-&quot; + data:post.id' itemprop='description articleBody'>
                                                        <div id='button-count-share'>
                                                            <span>
                                                                <a class='fb-share-button' name='fb_share' rel='nofollow' share_url='&quot;http://www.facebook.com/sharer.php?u=&quot; + data:blog.url' type='button_count'/>
                                                                </span>
                                                            <span>
                                                                <div class='fb-like' data-action='like' data-layout='button_count' data-share='false' data-show-faces='false'/>
                                                                </span>
                                                            <span>
                                                                <div class='g-plusone' data-count='true' data-size='medium' expr:data-href='data:post.url' rel='nofollow'/>
                                                                <script type='text/javascript'>
                                                                    window.___gcfg = {lang: &#39;id&#39;};

                                                                    (function() {
                                                                    var po = document.createElement(&#39;script&#39;); po.type = &#39;text/javascript&#39;; po.async = true;
                                                                    po.src = &#39;https://apis.google.com/js/plusone.js&#39;;
                                                                    var s = document.getElementsByTagName(&#39;script&#39;)[0]; s.parentNode.insertBefore(po, s);
                                                                    })();
                                                                </script>
                                                                </span>
                                                            <span>
                                                                <a class='twitter-share-button' data-count='horizontal' data-related='' data-via='' expr:data-text='data:post.title' expr:data-url='data:post.url' href='http://twitter.com/share' title='Share via Twitter'>Tweet</a>
                                                                <script async='async' src='http://platform.twitter.com/widgets.js' type='text/javascript'/>
                                                                </span>
                                                        </div>
                                                        <div class='clear'/>
                                                        <data:post.body/>
                                                        <div class='clear'/>
                                                        <div id='related-posts'>
                                                            <p class='title title-medium'>
                                                                <h2>
                                                                    <span>
                                                                        Artikel Terkait
                                                                    </span> 
                                                                </h2>
                                                            </p>
                                                            <b:loop values='data:post.labels' var='label'>
                                                                <b:if cond='data:label.isLast != &quot;true&quot;'>
                                                                </b:if>
                                                                <b:if cond='data:blog.pageType == &quot;item&quot;'>
                                                                    <script expr:src='&quot;/feeds/posts/default/-/&quot; + data:label.name + &quot;?alt=json-in-script&amp;callback=related_results_labels_thumbs&amp;max-results=8&quot;' type='text/javascript'/>
                                                                </b:if>
                                                            </b:loop>
                                                            <script type='text/javascript'>
                                                                var currentposturl=&quot;<data:post.url/>&quot;;
                                                                var maxresults=3;
                                                                var relatedpoststitle=&quot;<b/>&quot;;
                                                                removeRelatedDuplicates_thumbs();
                                                                printRelatedLabels_thumbs();
                                                            </script>
                                                        </div>
                                                        <div class='clear'/>
                   
                                                    </div>
                                                </b:if>
                                            </article>

                                        </b:includable>
                                    <b:includable id='postQuickEdit' var='post'>
                                            <b:if cond='data:post.editUrl'>
                                                <span expr:class='&quot;item-control &quot; + data:post.adminClass'>
                                                    <a expr:href='data:post.editUrl' expr:title='data:top.editPostMsg'>
                                                        <!-- <img alt='' class='icon-action' height='18' src='http://img2.blogblog.com/img/icon18_edit_allbkg.gif' width='18'/> -->
                                                        <b style='color:#EE3322;'>
                                                            <i class='fa fa-pencil'/>
                                                            Edit
                                                        </b>
                                                    </a>
                                                </span>
                                            </b:if>
                                        </b:includable>
                                    <b:includable id='shareButtons' var='post'>
                                            <b:if cond='data:top.showEmailButton'>
                                                <a class='goog-inline-block share-button sb-email' expr:href='data:post.sharePostUrl + &quot;&amp;target=email&quot;' expr:title='data:top.emailThisMsg' target='_blank'>
                                                    <span class='share-button-link-text'>
                                                        <data:top.emailThisMsg/>
                                                    </span>
                                                </a>
                                            </b:if>
                                            <b:if cond='data:top.showBlogThisButton'>
                                                <a class='goog-inline-block share-button sb-blog' expr:href='data:post.sharePostUrl + &quot;&amp;target=blog&quot;' expr:onclick='&quot;window.open(this.href, \&quot;_blank\&quot;, \&quot;height=270,width=475\&quot;); return false;&quot;' expr:title='data:top.blogThisMsg' target='_blank'>
                                                    <span class='share-button-link-text'>
                                                        <data:top.blogThisMsg/>
                                                    </span>
                                                </a>
                                            </b:if>
                                            <b:if cond='data:top.showTwitterButton'>
                                                <a class='goog-inline-block share-button sb-twitter' expr:href='data:post.sharePostUrl + &quot;&amp;target=twitter&quot;' expr:title='data:top.shareToTwitterMsg' target='_blank'>
                                                    <span class='share-button-link-text'>
                                                        <data:top.shareToTwitterMsg/>
                                                    </span>
                                                </a>
                                            </b:if>
                                            <b:if cond='data:top.showFacebookButton'>
                                                <a class='goog-inline-block share-button sb-facebook' expr:href='data:post.sharePostUrl + &quot;&amp;target=facebook&quot;' expr:onclick='&quot;window.open(this.href, \&quot;_blank\&quot;, \&quot;height=430,width=640\&quot;); return false;&quot;' expr:title='data:top.shareToFacebookMsg' target='_blank'>
                                                    <span class='share-button-link-text'>
                                                        <data:top.shareToFacebookMsg/>
                                                    </span>
                                                </a>
                                            </b:if>
                                            <b:if cond='data:top.showOrkutButton'>
                                                <a class='goog-inline-block share-button sb-orkut' expr:href='data:post.sharePostUrl + &quot;&amp;target=orkut&quot;' expr:title='data:top.shareToOrkutMsg' target='_blank'>
                                                    <span class='share-button-link-text'>
                                                        <data:top.shareToOrkutMsg/>
                                                    </span>
                                                </a>
                                            </b:if>
                                            <b:if cond='data:top.showDummy'>
                                                <div class='goog-inline-block dummy-container'>
                                                    <data:post.dummyTag/>
                                                </div>
                                            </b:if>
                                        </b:includable>
                                    <b:includable id='status-message'>
                                            <b:if cond='data:navMessage'>
                                                <div class='status-msg-wrap'>
                                                    <div class='status-msg-body'>
                                                        <data:navMessage/>
                                                    </div>
                                                    <div class='status-msg-border'>
                                                        <div class='status-msg-bg'>
                                                            <div class='status-msg-hidden'>
                                                                <data:navMessage/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div style='clear: both;'/>
                                            </b:if>
                                        </b:includable>
                                    <b:includable id='threaded-comment-form' var='post'>
                                            <div class='comment-form'>
                                                <a name='comment-form'/>
                                                <b:if cond='data:mobile'>
                                                    <div class='pesan-komentar'>
                                                        <p>
                                                            <data:blogCommentMessage/>
                                                        </p>
                                                    </div>
                                                    <data:blogTeamBlogMessage/>
                                                    <a expr:href='data:post.commentFormIframeSrc' id='comment-editor-src'/>
                                                    <iframe allowtransparency='true' class='blogger-iframe-colorize blogger-comment-from-post' frameborder='0' height='410' id='comment-editor' name='comment-editor' src='' style='display: none' width='100%'/>
                                                    <b:else/>
                                                    <div class='pesan-komentar'>
                                                        <p>
                                                            <data:blogCommentMessage/>
                                                        </p>
                                                    </div>
                                                    <data:blogTeamBlogMessage/>
                                                    <a expr:href='data:post.commentFormIframeSrc' id='comment-editor-src'/>
                                                    <iframe allowtransparency='true' class='blogger-iframe-colorize blogger-comment-from-post' frameborder='0' height='410' id='comment-editor' name='comment-editor' src='' width='100%'/>
                                                </b:if>
                                                <data:post.friendConnectJs/>
                                                <data:post.cmtfpIframe/>
                                                <script type='text/javascript'>
                                                    BLOG_CMT_createIframe(&#39;<data:post.appRpcRelayPath/>&#39;, &#39;<data:post.communityId/>&#39;);
                                                </script>
                                            </div>
                                        </b:includable>
                                    <b:includable id='threaded_comment_js' var='post'>
                                            <script async='async' expr:src='data:post.commentSrc' type='text/javascript'/>
                                            <script type='text/javascript'>
                                                (function() {
                                                var items = <data:post.commentJso/>;
                                                var msgs = <data:post.commentMsgs/>;
                                                var config = <data:post.commentConfig/>;
                                                // <![CDATA[
                          var cursor = null;
                          if (items && items.length > 0) {
                            cursor = parseInt(items[items.length - 1].timestamp) + 1;
                          }
                          var bodyFromEntry = function(entry) {
                            if (entry.gd$extendedProperty) {
                              for (var k in entry.gd$extendedProperty) {
                                if (entry.gd$extendedProperty[k].name == 'blogger.contentRemoved') {
                                  return '<span class="deleted-comment">' + entry.content.$t + '</span>';
                                }
                              }
                            }
                            return entry.content.$t;
                          }
                          var parse = function(data) {
                            cursor = null;
                            var comments = [];
                            if (data && data.feed && data.feed.entry) {
                              for (var i = 0, entry; entry = data.feed.entry[i]; i++) {
                                var comment = {};
                                // comment ID, parsed out of the original id format
                                var id = /blog-(\d+).post-(\d+)/.exec(entry.id.$t);
                                comment.id = id ? id[2] : null;
                                comment.body = bodyFromEntry(entry);
                                comment.timestamp = Date.parse(entry.published.$t) + '';
                                if (entry.author && entry.author.constructor === Array) {
                                  var auth = entry.author[0];
                                  if (auth) {
                                    comment.author = {
                                      name: (auth.name ? auth.name.$t : undefined),
                                      profileUrl: (auth.uri ? auth.uri.$t : undefined),
                                      avatarUrl: (auth.gd$image ? auth.gd$image.src : undefined)
                                    };
                                  }
                                }
                                if (entry.link) {
                                  if (entry.link[2]) {
                                    comment.link = comment.permalink = entry.link[2].href;
                                  }
                                  if (entry.link[3]) {
                                    var pid = /.*comments\/default\/(\d+)\?.*/.exec(entry.link[3].href);
                                    if (pid && pid[1]) {
                                      comment.parentId = pid[1];
                                    }
                                  }
                                }
                                comment.deleteclass = 'item-control blog-admin';
                                if (entry.gd$extendedProperty) {
                                  for (var k in entry.gd$extendedProperty) {
                                    if (entry.gd$extendedProperty[k].name == 'blogger.itemClass') {
                                      comment.deleteclass += ' ' + entry.gd$extendedProperty[k].value;
                                    } else if (entry.gd$extendedProperty[k].name == 'blogger.displayTime') {
                                      comment.displayTime = entry.gd$extendedProperty[k].value;
                                    }
                                  }
                                }
                                comments.push(comment);
                              }
                            }
                            return comments;
                          };
                          var paginator = function(callback) {
                            if (hasMore()) {
                              var url = config.feed + '?alt=json&v=2&orderby=published&reverse=false&max-results=50';
                              if (cursor) {
                                url += '&published-min=' + new Date(cursor).toISOString();
                              }
                              window.bloggercomments = function(data) {
                                var parsed = parse(data);
                                cursor = parsed.length < 50 ? null
                                : parseInt(parsed[parsed.length - 1].timestamp) + 1
                                callback(parsed);
                                window.bloggercomments = null;
                              }
                              url += '&callback=bloggercomments';
                              var script = document.createElement('script');
                              script.type = 'text/javascript';
                              script.src = url;
                              document.getElementsByTagName('head')[0].appendChild(script);
                            }
                          };
                          var hasMore = function() {
                            return !!cursor;
                          };
                          var getMeta = function(key, comment) {
                            if ('iswriter' == key) {
                              var matches = !!comment.author
                              && comment.author.name == config.authorName
                              && comment.author.profileUrl == config.authorUrl;
                              return matches ? 'true' : '';
                            } else if ('deletelink' == key) {
                              return config.baseUri + '/delete-comment.g?blogID='
                              + config.blogId + '&postID=' + comment.id;
                            } else if ('deleteclass' == key) {
                              return comment.deleteclass;
                            }
                            return '';
                          };
                          var replybox = null;
                          var replyUrlParts = null;
                          var replyParent = undefined;
                          var onReply = function(commentId, domId) {
                            if (replybox == null) {
                              // lazily cache replybox, and adjust to suit this style:
                              replybox = document.getElementById('comment-editor');
                              if (replybox != null) {
                                replybox.height = '250px';
                                replybox.style.display = 'block';
                                replyUrlParts = replybox.src.split('#');
                              }
                            }
                            if (replybox && (commentId !== replyParent)) {
                              document.getElementById(domId).insertBefore(replybox.parentNode, null);
                              replybox.src = replyUrlParts[0]
                              + (commentId ? '&parentID=' + commentId : '')
                              + '#' + replyUrlParts[1];
                              replyParent = commentId;
                            }
                          };
                          var hash = (window.location.hash || '#').substring(1);
                          var startThread, targetComment;
                          if (/^comment-form_/.test(hash)) {
                            startThread = hash.substring('comment-form_'.length);
                          } else if (/^c[0-9]+$/.test(hash)) {
                            targetComment = hash.substring(1);
                          }
                          // Configure commenting API:
                          var configJso = {
                            'maxDepth': config.maxThreadDepth
                          };
                          var provider = {
                            'id': config.postId,
                            'data': items,
                            'loadNext': paginator,
                            'hasMore': hasMore,
                            'getMeta': getMeta,
                            'onReply': onReply,
                            'rendered': true,
                            'initComment': targetComment,
                            'initReplyThread': startThread,
                            'config': configJso,
                            'messages': msgs
                          };
                          var render = function() {
                            if (window.goog && window.goog.comments) {
                              var holder = document.getElementById('comment-holder');
                              window.goog.comments.render(holder, provider);
                            }
                          };
                          // render now, or queue to render when library loads:
                          if (window.goog && window.goog.comments) {
                            render();
                          } else {
                            window.goog = window.goog || {};
                            window.goog.comments = window.goog.comments || {};
                            window.goog.comments.loadQueue = window.goog.comments.loadQueue || [];
                            window.goog.comments.loadQueue.push(render);
                          }
                        })();
                        // ]]>
                                            </script>
                                        </b:includable>
                                    <b:includable id='threaded_comments' var='post'>
                                            <div id='top-comment'>
                                                <div class='top-comment-widget-menu clear'>
                                                    <ul>
                                                        <dl class='top-comment blogico'>Blogger Comment</dl><!--Replace "New Movies" With Your Own Text-->
                                                        <dl class='top-comment faceico'>Facebook Comment</dl><!--Replace "Recent Games" With Your Own Text-->
                                                    </ul>
                                                </div>
                                                <div class='widget2' id='top-comment1'> 

                                                    <div class='centerare1'>

                                                        <div class='comments' id='comments'>
                                                            <a name='comments'/>
                                                            <div class='komhead'>
                                                                <h4>
                                                                    <b:if cond='data:post.numComments == 1'>
                                                                        1 <data:commentLabel/>:
                                                                        <b:else/>
                                                                        <data:post.numComments/> 
                                                                        <data:commentLabelPlural/>:
                                                                    </b:if>
                                                                </h4>
                                                                <div class='stripe-line'/>
                                                            </div>
                                                            <div class='comments-content'>
                                                                <b:if cond='data:post.embedCommentForm'>
                                                                    <b:include data='post' name='threaded_comment_js'/>
                                                                </b:if>
                                                                <div id='comment-holder'>
                                                                    <data:post.commentHtml/>
                                                                </div>
                                                            </div>

                                                            <p class='comment-footer'>
                                                                <b:if cond='data:post.allowNewComments'>
                                                                    <b:include data='post' name='threaded-comment-form'/>
                                                                    <b:else/>
                                                                    <data:post.noNewCommentsText/>
                                                                </b:if>
                                                            </p>

                                                            <b:if cond='data:showCmtPopup'>
                                                                <div id='comment-popup'>
                                                                    <iframe allowtransparency='true' frameborder='0' id='comment-actions' name='comment-actions' scrolling='no'>
                                                                    </iframe>
                                                                </div>
                                                            </b:if>

                                                            <div id='backlinks-container'>
                                                                <div expr:id='data:widget.instanceId + &quot;_backlinks-container&quot;'>
                                                                    <b:if cond='data:post.showBacklinks'>
                                                                        <b:include data='post' name='backlinks'/>
                                                                    </b:if>
                                                                </div>
                                                            </div>
                                                        </div>		

                                                    </div>

                                                </div>

                                                <div class='widget2' id='top-comment2'> 

                                                    <div class='centerare2'>

                                                        <div class='fbcombox'>
                                                            <div>
                                                                <fb:comments colorscheme='light' expr:href='data:post.url' expr:title='data:post.title' expr:xid='data:post.id' height='110' width='639'/>
                                                            </div> 
                                                        </div>

                                                    </div>

                                                </div>

                                                <script type='text/javascript'>
                                                    //<![CDATA[
$(document).ready(function(){
$('#top-comment .widget2').hide();
$('#top-comment .widget2:first').show();
$('.top-comment-widget-menu ul dl:first').addClass('selected');
$('.top-comment-widget-menu ul dl').click(function(){ 
$('.top-comment-widget-menu ul dl').removeClass('selected');
$(this).addClass('selected');
$('#top-comment .widget2').hide();
$('#top-comment .widget2').eq($('.top-comment-widget-menu ul dl').index(this)).slideDown()(300);
});
});
//]]>
                                                </script>

                                            </div>

                                            <div style='clear: both;'/>
                                        </b:includable>
                                  </b:widget>
                                </b:section>
                            </div><!--singlepage end-->
                        </div>
                    </div>
                    <!-- post wrapper end -->
                </div>
                <!--my wrapper end -->
                <!-- sidebar wrapper start -->
                <!-- sidebar wrapper start -->
                <aside id='sidebar-wrapper'>
                    <div class='sidebar-container'>
                        <b:section class='sidebar section' id='sidebar1' preferred='yes'>
                          <b:widget id='HTML8' locked='false' title='' type='HTML'>
                            <b:includable id='main'>
                                    <!-- only display title if it's non-empty -->
                                    <b:if cond='data:title != &quot;&quot;'>
                                        <h2 class='title'>
                                            <data:title/>
                                        </h2>
                                    </b:if>
                                    <div class='widget-content'>
                                        <data:content/>
                                    </div>

                                    
                                </b:includable>
                          </b:widget>
                        </b:section>
                        <div class='clear'/>
                        <div id='sidebartab'>
                            <div id='tab'>
                                <!--Sidebar Tabs Widgets Started-->
                                <div class='tab-widget-menu clear'>
                                    <ul>
                                        <li class='tab1'>
                                            Pilihan
                                        </li>
                                        <li class='tab2'>
                                            Unggulan
                                        </li>
                                        <li class='tab3'>
                                            Terbaru
                                        </li>
                                    </ul>
                                    <div class='clear'/>
                                </div>
                                <div class='widget1' id='tab1'>
                                    <b:section class='sidebar' id='tab1-popular-posts' showaddelement='yes'>
                                      <b:widget id='HTML19' locked='false' title='Pilihan' type='HTML'>
                                        <b:includable id='main'>
                                                <!-- only display title if it's non-empty -->
                                                <b:if cond='data:title != &quot;&quot;'>
                                                    <h2 class='title'>
                                                        <data:title/>
                                                    </h2>
                                                </b:if>
                                                <div class='widget-content'>
                                                    <data:content/>
                                                </div>
                                                
                                            </b:includable>
                                      </b:widget>
                                    </b:section>
                                </div>
                                <div class='widget1' id='tab2'>
                                    <b:section class='sidebar' id='tab2-recent-posts' showaddelement='yes'>
                                      <b:widget id='HTML10' locked='false' title='Unggulan' type='HTML'>
                                        <b:includable id='main'>
                                                <!-- only display title if it's non-empty -->
                                                <b:if cond='data:title != &quot;&quot;'>
                                                    <h2 class='title'>
                                                        <data:title/>
                                                    </h2>
                                                </b:if>
                                                <div class='widget-content'>
                                                    <data:content/>
                                                </div>

                                                
                                            </b:includable>
                                      </b:widget>
                                    </b:section>
                                </div>
                                <div class='widget1' id='tab3'>
                                    <b:section class='sidebar' id='tab3-comments' showaddelement='yes'>
                                      <b:widget id='HTML7' locked='false' title='Recent Posts' type='HTML'>
                                        <b:includable id='main'>
                                                <!-- only display title if it's non-empty -->
                                                <b:if cond='data:title != &quot;&quot;'>
                                                    <h2 class='title'>
                                                        <data:title/>
                                                    </h2>
                                                </b:if>
                                                <div class='widget-content'>
                                                    <data:content/>
                                                </div>

                                                
                                            </b:includable>
                                      </b:widget>
                                    </b:section>
                                </div>
                            </div>
                            <div style='clear: both;'/>
                            <script type='text/javascript'>
                                //<![CDATA[
                $(document).ready(function(){
                  $('#tab .widget1').hide();
                  $('#tab .widget1:first').show();
                  $('.tab-widget-menu ul li:first').addClass('selected');
                  $('.tab-widget-menu ul li').click(function(){ 
                    $('.tab-widget-menu ul li').removeClass('selected');
                    $(this).addClass('selected');
                    $('#tab .widget1').hide();
                    $('#tab .widget1').eq($('.tab-widget-menu ul li').index(this)).slideDown()(500);
                  });
                });
                //]]>
                            </script>
                            <!--Sidebar Tabs Widgets End-->
                        </div>
                    </div>
                </aside>
                <!-- sidebar wrapper end -->
            </div>
            <!-- footer wrapper start -->
      <br style='clear:both'/>
            <footer id='footer-wrapper'>
                <div class='footer-left'>
                    Copyright &#169; 2015
                    <a expr:href='data:blog.homepageUrl'>
                        <data:blog.title/>
                    </a>
                </div>
                <div class='footer-right'>

                    <nav class='top-menu1'>
                        <!-- primary navigation menu start -->
                        <ul class='menubar'>
                            <li>
                                <a href='http://www.wajibbaca.com'>
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href='http://www.wajibbaca.com/p/profile.html'>
                                    Tentang Kami
                                </a>
                            </li>
                            <li>
                                <a href='http://www.wajibbaca.com/p/kontak-kami.html'>
                                    Kontak Kami
                                </a>
                            </li>
                            <li>
                                <a href='http://www.wajibbaca.com/p/pri.html'>
                                    Privacy Policy
                                </a>
                            </li>
                            <li>
                                <a href='http://www.wajibbaca.com/p/term-of-service.html'>
                                    TOS
                                </a>
                            </li>
                            <li>
                                <a href='http://www.wajibbaca.com/p/sitemap.html'>
                                    Sitemap
                                </a>
                            </li>
                        </ul>
                    </nav>


                </div>
            </footer>
            <!-- footer wrapper end -->
            <!-- wrapper end -->
        </div>
        <div class='back-to-top'>
            <a href='#' id='back-to-top' title='back to top'>
                ^
            </a>
        </div>
        <script>
            $(window).scroll(function() {
            if($(this).scrollTop() &gt; 200) {
            $(&#39;#back-to-top&#39;).fadeIn();
            } else {
            $(&#39;#back-to-top&#39;).fadeOut();
            }
            });
            $(&#39;#back-to-top&#39;).hide().click(function() {
            $(&#39;html, body&#39;).animate({scrollTop:0}, 1000);
            return false;
            });
        </script>


    
        <script>
            $(document).ready(function(){
            $(&quot;.widget h2&quot;).wrapInner(&quot;<span/>&quot;);
            });
        </script>
        <script type='text/javascript'>
            jQuery(document).ready(function(){   
            $(&#39;#slider&#39;).lofJSidernews({
            interval:6000,
            duration:800,
            mainWidth: 610,
            navigatorWidth: 220,
            maxItemDisplay:5,
            easing:&#39;easeOutBounce&#39;,
            auto:true,
            isPreloaded: false
            });
            });   
        </script>
        <script type='text/javascript'>
            //<![CDATA[
(function($) {

var types = ['DOMMouseScroll', 'mousewheel'];

$.event.special.mousewheel = {
    setup: function() {
        if ( this.addEventListener )
            for ( var i=types.length; i; )
                this.addEventListener( types[--i], handler, false );
        else
            this.onmousewheel = handler;
    },
   
    teardown: function() {
        if ( this.removeEventListener )
            for ( var i=types.length; i; )
                this.removeEventListener( types[--i], handler, false );
        else
            this.onmousewheel = null;
    }
};

$.fn.extend({
    mousewheel: function(fn) {
        return fn ? this.bind("mousewheel", fn) : this.trigger("mousewheel");
    },
   
    unmousewheel: function(fn) {
        return this.unbind("mousewheel", fn);
    }
});


function handler(event) {
    var args = [].slice.call( arguments, 1 ), delta = 0, returnValue = true;
   
    event = $.event.fix(event || window.event);
    event.type = "mousewheel";
   
    if ( event.wheelDelta ) delta = event.wheelDelta/120;
    if ( event.detail     ) delta = -event.detail/3;
   
    // Add events and delta to the front of the arguments
    args.unshift(event, delta);

    return $.event.handle.apply(this, args);
}

})(jQuery);

// JavaScript Document
(function($) {
     $.fn.lofJSidernews = function( settings ) {
         return this.each(function() {
            // get instance of the lofSiderNew.
            new  $.lofSidernews( this, settings );
        });
      }
     $.lofSidernews = function( obj, settings ){
        this.settings = {
            direction            : '',
            mainItemSelector    : 'li',
            navInnerSelector    : 'ul',
            navSelector          : 'li' ,
            navigatorEvent        : 'click',
            wapperSelector:     '.slider-main-wapper',
            interval               : 4000,
            auto                : true, // whether to automatic play the slideshow
            maxItemDisplay         : 5,
            startItem            : 0,
            navPosition            : 'vertical',
            navigatorHeight        : 75,
            navigatorWidth        : 220,
            duration            : 600,
            navItemsSelector    : '.slider-navigator li',
            navOuterSelector    : '.slider-navigator-outer' ,
            isPreloaded            : true,
            easing                : 'easeOutBounce'
        }   
        $.extend( this.settings, settings ||{} );   
        this.nextNo         = null;
        this.previousNo     = null;
        this.maxWidth  = this.settings.mainWidth || 600;
        this.wrapper = $( obj ).find( this.settings.wapperSelector );   
        this.slides = this.wrapper.find( this.settings.mainItemSelector );
        if( !this.wrapper.length || !this.slides.length ) return ;
        // set width of wapper
        if( this.settings.maxItemDisplay > this.slides.length ){
            this.settings.maxItemDisplay = this.slides.length;   
        }
        this.currentNo      = isNaN(this.settings.startItem)||this.settings.startItem > this.slides.length?0:this.settings.startItem;
        this.navigatorOuter = $( obj ).find( this.settings.navOuterSelector );   
        this.navigatorItems = $( obj ).find( this.settings.navItemsSelector ) ;
        this.navigatorInner = this.navigatorOuter.find( this.settings.navInnerSelector );
       
        if( this.settings.navPosition == 'horizontal' ){
            this.navigatorInner.width( this.slides.length * this.settings.navigatorWidth );
            this.navigatorOuter.width( this.settings.maxItemDisplay * this.settings.navigatorWidth );
            this.navigatorOuter.height(    this.settings.navigatorHeight );
           
        } else {
            this.navigatorInner.height( this.slides.length * this.settings.navigatorHeight );   
           
            this.navigatorOuter.height( this.settings.maxItemDisplay * this.settings.navigatorHeight );
            this.navigatorOuter.width(    this.settings.navigatorWidth );
        }       
        this.navigratorStep = this.__getPositionMode( this.settings.navPosition );       
        this.directionMode = this.__getDirectionMode(); 
       
       
        if( this.settings.direction == 'opacity') {
            this.wrapper.addClass( 'slider-opacity' );
            $(this.slides).css('opacity',0).eq(this.currentNo).css('opacity',1);
        } else {
            this.wrapper.css({'left':'-'+this.currentNo*this.maxSize+'px', 'width':( this.maxWidth ) * this.slides.length } );
        }

       
        if( this.settings.isPreloaded ) {
            this.preLoadImage( this.onComplete );
        } else {
            this.onComplete();
        }
       
     }
     $.lofSidernews.fn =  $.lofSidernews.prototype;
     $.lofSidernews.fn.extend =  $.lofSidernews.extend = $.extend;
   
     $.lofSidernews.fn.extend({
                             
        startUp:function( obj, wrapper ) {
            seft = this;

            this.navigatorItems.each( function(index, item ){
                $(item).click( function(){
                    seft.jumping( index, true );
                    seft.setNavActive( index, item );                   
                } );
                $(item).css( {'height': seft.settings.navigatorHeight, 'width':  seft.settings.navigatorWidth} );
            })
            this.registerWheelHandler( this.navigatorOuter, this );
            this.setNavActive(this.currentNo );
           
            if( this.settings.buttons && typeof (this.settings.buttons) == "object" ){
                this.registerButtonsControl( 'click', this.settings.buttons, this );

            }
            if( this.settings.auto )
            this.play( this.settings.interval,'next', true );
           
            return this;
        },
        onComplete:function(){
            setTimeout( function(){ $('.preload').fadeOut( 900 ); }, 400 );    this.startUp( );
        },
        preLoadImage:function(  callback ){
            var self = this;
            var images = this.wrapper.find( 'img' );
   
            var count = 0;
            images.each( function(index,image){
                if( !image.complete ){                 
                    image.onload =function(){
                        count++;
                        if( count >= images.length ){
                            self.onComplete();
                        }
                    }
                    image.onerror =function(){
                        count++;
                        if( count >= images.length ){
                            self.onComplete();
                        }   
                    }
                }else {
                    count++;
                    if( count >= images.length ){
                        self.onComplete();
                    }   
                }
            } );
        },
        navivationAnimate:function( currentIndex ) {
            if (currentIndex <= this.settings.startItem
                || currentIndex - this.settings.startItem >= this.settings.maxItemDisplay-1) {
                    this.settings.startItem = currentIndex - this.settings.maxItemDisplay+2;
                    if (this.settings.startItem < 0) this.settings.startItem = 0;
                    if (this.settings.startItem >this.slides.length-this.settings.maxItemDisplay) {
                        this.settings.startItem = this.slides.length-this.settings.maxItemDisplay;
                    }
            }       
            this.navigatorInner.stop().animate( eval('({'+this.navigratorStep[0]+':-'+this.settings.startItem*this.navigratorStep[1]+'})'),
                                                {duration:500, easing:'easeInOutQuad'} );   
        },
        setNavActive:function( index, item ){
            if( (this.navigatorItems) ){
                this.navigatorItems.removeClass( 'active' );
                $(this.navigatorItems.get(index)).addClass( 'active' );   
                this.navivationAnimate( this.currentNo );   
            }
        },
        __getPositionMode:function( position ){
            if(    position  == 'horizontal' ){
                return ['left', this.settings.navigatorWidth];
            }
            return ['top', this.settings.navigatorHeight];
        },
        __getDirectionMode:function(){
            switch( this.settings.direction ){
                case 'opacity': this.maxSize=0; return ['opacity','opacity'];
                default: this.maxSize=this.maxWidth; return ['left','width'];
            }
        },
        registerWheelHandler:function( element, obj ){
             element.bind('mousewheel', function(event, delta ) {
                var dir = delta > 0 ? 'Up' : 'Down',
                    vel = Math.abs(delta);
                if( delta > 0 ){
                    obj.previous( true );
                } else {
                    obj.next( true );
                }
                return false;
            });
        },
        registerButtonsControl:function( eventHandler, objects, self ){
            for( var action in objects ){
                switch (action.toString() ){
                    case 'next':
                        objects[action].click( function() { self.next( true) } );
                        break;
                    case 'previous':
                        objects[action].click( function() { self.previous( true) } );
                        break;
                }
            }
            return this;   
        },
        onProcessing:function( manual, start, end ){            
            this.previousNo = this.currentNo + (this.currentNo>0 ? -1 : this.slides.length-1);
            this.nextNo     = this.currentNo + (this.currentNo < this.slides.length-1 ? 1 : 1- this.slides.length);               
            return this;
        },
        finishFx:function( manual ){
            if( manual ) this.stop();
            if( manual && this.settings.auto ){
                this.play( this.settings.interval,'next', true );
            }       
            this.setNavActive( this.currentNo );   
        },
        getObjectDirection:function( start, end ){
            return eval("({'"+this.directionMode[0]+"':-"+(this.currentNo*start)+"})");   
        },
        fxStart:function( index, obj, currentObj ){
                if( this.settings.direction == 'opacity' ) {
                    $(this.slides).stop().animate({opacity:0}, {duration: this.settings.duration, easing:this.settings.easing} );
                    $(this.slides).eq(index).stop().animate( {opacity:1}, {duration: this.settings.duration, easing:this.settings.easing} );
                }else {
                    this.wrapper.stop().animate( obj, {duration: this.settings.duration, easing:this.settings.easing} );
                }
            return this;
        },
        jumping:function( no, manual ){
            this.stop();
            if( this.currentNo == no ) return;       
             var obj = eval("({'"+this.directionMode[0]+"':-"+(this.maxSize*no)+"})");
            this.onProcessing( null, manual, 0, this.maxSize )
                .fxStart( no, obj, this )
                .finishFx( manual );   
                this.currentNo  = no;
        },
        next:function( manual , item){

            this.currentNo += (this.currentNo < this.slides.length-1) ? 1 : (1 - this.slides.length);   
            this.onProcessing( item, manual, 0, this.maxSize )
                .fxStart( this.currentNo, this.getObjectDirection(this.maxSize ), this )
                .finishFx( manual );
        },
        previous:function( manual, item ){
            this.currentNo += this.currentNo > 0 ? -1 : this.slides.length - 1;
            this.onProcessing( item, manual )
                .fxStart( this.currentNo, this.getObjectDirection(this.maxSize ), this )
                .finishFx( manual    );           
        },
        play:function( delay, direction, wait ){   
            this.stop();
            if(!wait){ this[direction](false); }
            var self  = this;
            this.isRun = setTimeout(function() { self[direction](true); }, delay);
        },
        stop:function(){
            if (this.isRun == null) return;
            clearTimeout(this.isRun);
            this.isRun = null;
        }
    })
})(jQuery)

 //]]>
        </script>

        <script type='text/javascript'>
            //<![CDATA[
jQuery.easing['jswing']=jQuery.easing['swing'];jQuery.extend(jQuery.easing,{def:'easeOutQuad',swing:function(x,t,b,c,d){return jQuery.easing[jQuery.easing.def](x,t,b,c,d);},easeInQuad:function(x,t,b,c,d){return c*(t/=d)*t+ b;},easeOutQuad:function(x,t,b,c,d){return-c*(t/=d)*(t-2)+ b;},easeInOutQuad:function(x,t,b,c,d){if((t/=d/2)<1)return c/2*t*t+ b;return-c/2*((--t)*(t-2)- 1)+ b;},easeInCubic:function(x,t,b,c,d){return c*(t/=d)*t*t+ b;},easeOutCubic:function(x,t,b,c,d){return c*((t=t/d-1)*t*t+ 1)+ b;},easeInOutCubic:function(x,t,b,c,d){if((t/=d/2)<1)return c/2*t*t*t+ b;return c/2*((t-=2)*t*t+ 2)+ b;},easeInQuart:function(x,t,b,c,d){return c*(t/=d)*t*t*t+ b;},easeOutQuart:function(x,t,b,c,d){return-c*((t=t/d-1)*t*t*t- 1)+ b;},easeInOutQuart:function(x,t,b,c,d){if((t/=d/2)<1)return c/2*t*t*t*t+ b;return-c/2*((t-=2)*t*t*t- 2)+ b;},easeInQuint:function(x,t,b,c,d){return c*(t/=d)*t*t*t*t+ b;},easeOutQuint:function(x,t,b,c,d){return c*((t=t/d-1)*t*t*t*t+ 1)+ b;},easeInOutQuint:function(x,t,b,c,d){if((t/=d/2)<1)return c/2*t*t*t*t*t+ b;return c/2*((t-=2)*t*t*t*t+ 2)+ b;},easeInSine:function(x,t,b,c,d){return-c*Math.cos(t/d*(Math.PI/2))+ c+ b;},easeOutSine:function(x,t,b,c,d){return c*Math.sin(t/d*(Math.PI/2))+ b;},easeInOutSine:function(x,t,b,c,d){return-c/2*(Math.cos(Math.PI*t/d)- 1)+ b;},easeInExpo:function(x,t,b,c,d){return(t==0)?b:c*Math.pow(2,10*(t/d- 1))+ b;},easeOutExpo:function(x,t,b,c,d){return(t==d)?b+c:c*(-Math.pow(2,-10*t/d)+ 1)+ b;},easeInOutExpo:function(x,t,b,c,d){if(t==0)return b;if(t==d)return b+c;if((t/=d/2)<1)return c/2*Math.pow(2,10*(t- 1))+ b;return c/2*(-Math.pow(2,-10*--t)+ 2)+ b;},easeInCirc:function(x,t,b,c,d){return-c*(Math.sqrt(1-(t/=d)*t)- 1)+ b;},easeOutCirc:function(x,t,b,c,d){return c*Math.sqrt(1-(t=t/d-1)*t)+ b;},easeInOutCirc:function(x,t,b,c,d){if((t/=d/2)<1)return-c/2*(Math.sqrt(1- t*t)- 1)+ b;return c/2*(Math.sqrt(1-(t-=2)*t)+ 1)+ b;},easeInElastic:function(x,t,b,c,d){var s=1.70158;var p=0;var a=c;if(t==0)return b;if((t/=d)==1)return b+c;if(!p)p=d*.3;if(a<Math.abs(c)){a=c;var s=p/4;}
else var s=p/(2*Math.PI)*Math.asin(c/a);return-(a*Math.pow(2,10*(t-=1))*Math.sin((t*d-s)*(2*Math.PI)/p))+ b;},easeOutElastic:function(x,t,b,c,d){var s=1.70158;var p=0;var a=c;if(t==0)return b;if((t/=d)==1)return b+c;if(!p)p=d*.3;if(a<Math.abs(c)){a=c;var s=p/4;}
else var s=p/(2*Math.PI)*Math.asin(c/a);return a*Math.pow(2,-10*t)*Math.sin((t*d-s)*(2*Math.PI)/p)+ c+ b;},easeInOutElastic:function(x,t,b,c,d){var s=1.70158;var p=0;var a=c;if(t==0)return b;if((t/=d/2)==2)return b+c;if(!p)p=d*(.3*1.5);if(a<Math.abs(c)){a=c;var s=p/4;}
else var s=p/(2*Math.PI)*Math.asin(c/a);if(t<1)return-.5*(a*Math.pow(2,10*(t-=1))*Math.sin((t*d-s)*(2*Math.PI)/p))+ b;return a*Math.pow(2,-10*(t-=1))*Math.sin((t*d-s)*(2*Math.PI)/p)*.5+ c+ b;},easeInBack:function(x,t,b,c,d,s){if(s==undefined)s=1.70158;return c*(t/=d)*t*((s+1)*t- s)+ b;},easeOutBack:function(x,t,b,c,d,s){if(s==undefined)s=1.70158;return c*((t=t/d-1)*t*((s+1)*t+ s)+ 1)+ b;},easeInOutBack:function(x,t,b,c,d,s){if(s==undefined)s=1.70158;if((t/=d/2)<1)return c/2*(t*t*(((s*=(1.525))+1)*t- s))+ b;return c/2*((t-=2)*t*(((s*=(1.525))+1)*t+ s)+ 2)+ b;},easeInBounce:function(x,t,b,c,d){return c- jQuery.easing.easeOutBounce(x,d-t,0,c,d)+ b;},easeOutBounce:function(x,t,b,c,d){if((t/=d)<(1/2.75)){return c*(7.5625*t*t)+ b;}else if(t<(2/2.75)){return c*(7.5625*(t-=(1.5/2.75))*t+.75)+ b;}else if(t<(2.5/2.75)){return c*(7.5625*(t-=(2.25/2.75))*t+.9375)+ b;}else{return c*(7.5625*(t-=(2.625/2.75))*t+.984375)+ b;}},easeInOutBounce:function(x,t,b,c,d){if(t<d/2)return jQuery.easing.easeInBounce(x,t*2,0,c,d)*.5+ b;return jQuery.easing.easeOutBounce(x,t*2-d,0,c,d)*.5+ c*.5+ b;}});
//]]>
        </script>

        <script type='text/javascript'>
            //<![CDATA[
var ww=document.body.clientWidth;$(document).ready(function(){$(".nav li a").each(function(){if($(this).next().length>0){$(this).addClass("parent")}});$(".toggleMenu").click(function(e){e.preventDefault();$(this).toggleClass("active");$(".nav").toggle()});adjustMenu()});$(window).bind("resize orientationchange",function(){ww=document.body.clientWidth;adjustMenu()});var adjustMenu=function(){if(ww<768){$(".toggleMenu").css("display","inline-block");if(!$(".toggleMenu").hasClass("active")){$(".nav").hide()}else{$(".nav").show()}$(".nav li").unbind("mouseenter mouseleave");$(".nav li a.parent").unbind("click").bind("click",function(e){e.preventDefault();$(this).parent("li").toggleClass("hover")})}else if(ww>=768){$(".toggleMenu").css("display","none");$(".nav").show();$(".nav li").removeClass("hover");$(".nav li a").unbind("click");$(".nav li").unbind("mouseenter mouseleave").bind("mouseenter mouseleave",function(){$(this).toggleClass("hover")})}}
//]]>
        </script>
        <script type='text/javascript'>
            //<![CDATA[
      /*! Matt Tabs v2.2.1 | https://github.com/matthewhall/matt-tabs */
      !function(a){"use strict";var b=function(b,c){var d=this;d.element=b,d.$element=a(b),d.tabs=d.$element.children(),d.options=a.extend({},a.fn.mtabs.defaults,c),d.current_tab=0,d.init()};b.prototype={init:function(){var a=this;a.tabs.length&&(a.build(),a.buildTabMenu())},build:function(){var b=this,c=b.options,d=c.tab_text_el,e=c.container_class;b.tab_names=[],b.$wrapper=b.$element.wrapInner('<div class="'+e+'" />').find("."+e),b.tabs.wrapAll('<div class="'+c.tabs_container_class+'" />'),b.tabs.each(function(c,e){var f,g=a(e),h=d;f=g.find(h).filter(":first").hide().text(),b.tab_names.push(f)}),a.isFunction(c.onReady)&&c.onReady.call(b.element)},buildTabMenu:function(){for(var b,c=this,d=c.options,e=d.tabsmenu_el,f=c.tab_names,g="<"+e+' class="'+d.tabsmenu_class+'">',h=0,i=f.length,j=function(){var a=arguments;return d.tmpl.tabsmenu_tab.replace(/\{[0-9]\}/g,function(b){var c=Number(b.replace(/\D/g,""));return a[c]||""})};i>h;h++)g+=j(h+1,f[h]);g+="</"+e+">",c.$tabs_menu=a(g).prependTo(c.$wrapper),b=c.$tabs_menu.find(":first")[0].nodeName.toLowerCase(),c.$tabs_menu.on("click",b,function(b){var d=a(this),e=d.index();c.show(e),b.preventDefault()}).find(":first").trigger("click")},show:function(b){var c=this,d=c.options,e=d.active_tab_class;c.tabs.hide().filter(":eq("+b+")").show(),c.$tabs_menu.children().removeClass(e).filter(":eq("+b+")").addClass(e),a.isFunction(d.onTabSelect)&&b!==c.current_tab&&d.onTabSelect.call(c.element,b),c.current_tab=b},destroy:function(){var a=this,b=a.options.tab_text_el;a.$tabs_menu.remove(),a.tabs.unwrap().unwrap(),a.tabs.removeAttr("style"),a.tabs.children(b+":first").removeAttr("style"),a.$element.removeData("mtabs")}},a.fn.mtabs=function(c,d){return this.each(function(){var e,f=a(this),g=f.data("mtabs");e="object"==typeof c&&c,g||f.data("mtabs",g=new b(this,e)),"string"==typeof c&&g[c](d)})},a.fn.mtabs.defaults={container_class:"tabs",tabs_container_class:"tabs-content",active_tab_class:"active-tab",tab_text_el:"h1, h2, h3, h4, h5, h6",tabsmenu_class:"tabs-menu",tabsmenu_el:"ul",tmpl:{tabsmenu_tab:'<li class="tab-{0}"><span>{1}</span></li>'},onTabSelect:null}}(window.jQuery,window,document);


$('#bottombar .popular-posts ul li .item-snippet').each(function(){
    var txt=$(this).text().substr(0,20);
    var j=txt.lastIndexOf(' ');
    if(j>10)
      $(this).text(txt.substr(0,j).replace(/[?,!\.-:;]*$/,' ...'));
  });

$('.popular-posts ul li .item-snippet').each(function(){
    var txt=$(this).text().substr(0,100);
    var j=txt.lastIndexOf(' ');
    if(j>10)
      $(this).text(txt.substr(0,j).replace(/[?,!\.-:;]*$/,' ...'));
  });
      //]]>
        </script>
        <script>
            (function(i,s,o,g,r,a,m){i[&#39;GoogleAnalyticsObject&#39;]=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,&#39;script&#39;,&#39;//www.google-analytics.com/analytics.js&#39;,&#39;ga&#39;);

            ga(&#39;create&#39;, &#39;UA-61219025-1&#39;, &#39;auto&#39;);
            ga(&#39;send&#39;, &#39;pageview&#39;);

        </script>


    </body>
</html>