<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Formulaire HTML5</title>
<style>
table {
	width:100%;
}
td {
	width:49%;
}
.content { display: flex; flex-direction: column; }
textarea {
	width:100%;
	//height:500px;
	display: flex;
  	flex-direction: column;
  	flex-basis: 100%;
    flex-shrink: 1;
    flex-grow: 1;
	box-sizing:border-box;
	direction:ltr;
	display:block;
	max-width:100%;
	line-height:100%;
	padding:3px 3px 10px;
	border-radius:3px;
	border:1px solid #F7E98D;
	font:14px Tahoma, cursive;
	transition:box-shadow 0.5s ease;
	box-shadow:0 2px 3px rgba(0,0,0,0.1);
	font-smoothing:subpixel-antialiased;
	background:linear-gradient(#F9EFAF, #F7E98D);
	background:-o-linear-gradient(#F9EFAF, #F7E98D);
	background:-ms-linear-gradient(#F9EFAF, #F7E98D);
	background:-moz-linear-gradient(#F9EFAF, #F7E98D);
	background:-webkit-linear-gradient(#F9EFAF, #F7E98D);
}

input[type=submit] {
    color:#08233e;
    font:1.5em Futura, ‘Century Gothic’, AppleGothic, sans-serif;
    font-size:100%;
    cursor:pointer;
    background-color:rgba(255,204,0,0.8);
}
</style>
<script>
	/*!
	Autosize 4.0.0
	license: MIT
	http://www.jacklmoore.com/autosize
*/
!function(e,t){if("function"==typeof define&&define.amd)define(["exports","module"],t);else if("undefined"!=typeof exports&&"undefined"!=typeof module)t(exports,module);else{var n={exports:{}};t(n.exports,n),e.autosize=n.exports}}(this,function(e,t){"use strict";function n(e){function t(){var t=window.getComputedStyle(e,null);"vertical"===t.resize?e.style.resize="none":"both"===t.resize&&(e.style.resize="horizontal"),s="content-box"===t.boxSizing?-(parseFloat(t.paddingTop)+parseFloat(t.paddingBottom)):parseFloat(t.borderTopWidth)+parseFloat(t.borderBottomWidth),isNaN(s)&&(s=0),l()}function n(t){var n=e.style.width;e.style.width="0px",e.offsetWidth,e.style.width=n,e.style.overflowY=t}function o(e){for(var t=[];e&&e.parentNode&&e.parentNode instanceof Element;)e.parentNode.scrollTop&&t.push({node:e.parentNode,scrollTop:e.parentNode.scrollTop}),e=e.parentNode;return t}function r(){var t=e.style.height,n=o(e),r=document.documentElement&&document.documentElement.scrollTop;e.style.height="";var i=e.scrollHeight+s;return 0===e.scrollHeight?void(e.style.height=t):(e.style.height=i+"px",u=e.clientWidth,n.forEach(function(e){e.node.scrollTop=e.scrollTop}),void(r&&(document.documentElement.scrollTop=r)))}function l(){r();var t=Math.round(parseFloat(e.style.height)),o=window.getComputedStyle(e,null),i="content-box"===o.boxSizing?Math.round(parseFloat(o.height)):e.offsetHeight;if(i!==t?"hidden"===o.overflowY&&(n("scroll"),r(),i="content-box"===o.boxSizing?Math.round(parseFloat(window.getComputedStyle(e,null).height)):e.offsetHeight):"hidden"!==o.overflowY&&(n("hidden"),r(),i="content-box"===o.boxSizing?Math.round(parseFloat(window.getComputedStyle(e,null).height)):e.offsetHeight),a!==i){a=i;var l=d("autosize:resized");try{e.dispatchEvent(l)}catch(e){}}}if(e&&e.nodeName&&"TEXTAREA"===e.nodeName&&!i.has(e)){var s=null,u=e.clientWidth,a=null,c=function(){e.clientWidth!==u&&l()},p=function(t){window.removeEventListener("resize",c,!1),e.removeEventListener("input",l,!1),e.removeEventListener("keyup",l,!1),e.removeEventListener("autosize:destroy",p,!1),e.removeEventListener("autosize:update",l,!1),Object.keys(t).forEach(function(n){e.style[n]=t[n]}),i.delete(e)}.bind(e,{height:e.style.height,resize:e.style.resize,overflowY:e.style.overflowY,overflowX:e.style.overflowX,wordWrap:e.style.wordWrap});e.addEventListener("autosize:destroy",p,!1),"onpropertychange"in e&&"oninput"in e&&e.addEventListener("keyup",l,!1),window.addEventListener("resize",c,!1),e.addEventListener("input",l,!1),e.addEventListener("autosize:update",l,!1),e.style.overflowX="hidden",e.style.wordWrap="break-word",i.set(e,{destroy:p,update:l}),t()}}function o(e){var t=i.get(e);t&&t.destroy()}function r(e){var t=i.get(e);t&&t.update()}var i="function"==typeof Map?new Map:function(){var e=[],t=[];return{has:function(t){return e.indexOf(t)>-1},get:function(n){return t[e.indexOf(n)]},set:function(n,o){e.indexOf(n)===-1&&(e.push(n),t.push(o))},delete:function(n){var o=e.indexOf(n);o>-1&&(e.splice(o,1),t.splice(o,1))}}}(),d=function(e){return new Event(e,{bubbles:!0})};try{new Event("test")}catch(e){d=function(e){var t=document.createEvent("Event");return t.initEvent(e,!0,!1),t}}var l=null;"undefined"==typeof window||"function"!=typeof window.getComputedStyle?(l=function(e){return e},l.destroy=function(e){return e},l.update=function(e){return e}):(l=function(e,t){return e&&Array.prototype.forEach.call(e.length?e:[e],function(e){return n(e,t)}),e},l.destroy=function(e){return e&&Array.prototype.forEach.call(e.length?e:[e],o),e},l.update=function(e){return e&&Array.prototype.forEach.call(e.length?e:[e],r),e}),t.exports=l});
</script>

</head>
<body>
<?php
include_once("LH/fonctions.php");
if(@$_GET[act]=="valideCorrections") {
	print "VALIDE CORRECTIONS OK<br />";
	//print_r($_POST);
	$content=$_POST["content"];
	$xml = @simplexml_load_file(dirname(__FILE__)."/../../../".$_GET["refL"]);
	//print_r($xml);
	$contentLA=$contentFR=$contentCO="";
	if($xml) $contentLA=@$xml->xpath('//ligne//la'); 
	if($xml) $contentFR=@$xml->xpath('//ligne//fr'); 
	if($xml) $contentCO=@$xml->xpath('//ligne//'.$_GET['langue']);
	 
	$result="<?xml version=\"1.0\" encoding=\"UTF-8\"?> <liturgia>";
	$c=count($contentLA);
	if(count($contentCO)>count($contentLA)) $c=count($contentCO);
	if($c==0) $c=1;
	if($_GET['langue']=="fr"){
		for ($i=0;$i<$c;$i++){
		$result.="<ligne id=\"".$i."\"><la>".@$contentLA[$i]."</la><fr>".@$content[$i]."</fr></ligne>";
		}
	}
	if($_GET['langue']=="la"){
		for ($i=0;$i<$c;$i++){
		$result.="<ligne id=\"".$i."\"><la>".@$content[$i]."</la><fr>".@$contentFR[$i]."</fr></ligne>";
		}
	}
	
	$result.="</liturgia>";
	//$result=toUTF8($result);
	//print $result;
	$sxe = new SimpleXMLElement($result);
	//print_r($sxe);
	$dir= realpath(dirname(__FILE__))."/../../../".$_GET["refL"];
	print "<br />".$dir;
	print "<br />lang = ".$_GET['langue']."   ".$result."<br />";print_r($content);
	print "<br>ecriture : ".$sxe->asXML($dir);
	
	print "<br>ecriture : ".$sxe->asXML("test.xml");
	
	
	exit();
}

print" EDITION ".$_GET['langue']." ".$_GET['refL'];

print"<form method=\"post\" action=\"edit.php?act=valideCorrections&langue=".$_GET['langue']."&refL=".$_GET['refL']."\">
<input type=\"submit\" value=\"Correction\" >";

//print"<br> simplexml_load_file(";
// print "/".$_GET["refL"].");";
$xml = @simplexml_load_file(dirname(__FILE__)."/../../../".$_GET["refL"]);
//print_r($xml);
$contentLA=$contentCO="";
if($xml) $contentLA=@$xml->xpath('//ligne//la'); 
if($xml) $contentCO=@$xml->xpath('//ligne//'.$_GET['langue']); 
//print_r($content);
print"<table>";
$c=count($contentLA);
if(count($contentCO)>count($contentLA)) $c=count($contentCO);
if($c==0) $c=1; 
for ($i=0;$i<$c;$i++){
	print"<tr><td>".@$contentLA[$i]."</td><td ><textarea class='content' name='content[".$i."]' >".@$contentCO[$i]."</textarea></td></tr>";
}
print"</table> </form>
 ";
?>
</body>

</html>