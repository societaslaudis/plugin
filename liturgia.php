<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              www.societaslaudis.org
 * @since             1.0.0
 * @package           Liturgia
 *
 * @wordpress-plugin
 * Plugin Name:       Liturgia
 * Plugin URI:        www.societaslaudis.org
 * Description:       Liturgie en latin automatiquement générée.
 * Version:           1.0.0
 * Author:            FX
 * Author URI:        www.societaslaudis.org
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       liturgia
 * Domain Path:       /languages
 */

$GLOBALS['edition']="on";
include("module_calendrier.php");
include("LH/fonctions.php");
//include_once("osb_vigiles.php");
//
include_once("LH/invitatoire.php");
include_once("LH/vigiles.php");
include("LH/laudes.php");
include_once("LH/tierce.php");
include("LH/messe.php");
include_once("LH/sexte.php");
include_once("LH/none.php");
include("LH/vepres.php");
include("LH/complies.php");

//setlocale(LC_TIME,"FR_fr");
setlocale (LC_TIME, 'fr_FR.utf8','fra'); 


add_filter( 'rewrite_rules_array','my_insert_rewrite_rules' );
add_filter( 'query_vars','my_insert_query_vars' );
add_action( 'wp_loaded','my_flush_rules' );

// flush_rules() if our rules are not yet included
function my_flush_rules(){
	$rules = get_option( 'rewrite_rules' );

	if ( ! isset( $rules['messe-(\d*)$'] ) ) {
		global $wp_rewrite;
	   	$wp_rewrite->flush_rules();
	}
}

// Adding a new rule
function my_insert_rewrite_rules( $rules )
{
	$newrules = array();
	$newrules['forma-ordinaria/([^/]+)-(\d*)$'] = 'index.php?pagename=forma-ordinaria&office=$matches[1]&date=$matches[2]';
	return $newrules + $rules;
}

// Adding the date & office vars so that WP recognizes it
function my_insert_query_vars($vars)
{
    array_push($vars, 'date');
    array_push($vars, 'office');
   	array_push($vars, 'dateYmd');
    return $vars;
}

function affiche_liturgia($office) {
	

$result="

  <meta charset=\"utf-8\">
  <style>
  div#global {
	font-family: georgia;
	margin: 5px;
	}
div#centrage {
	text-align: center;
}
div#nav {
	text-align: center;
	margin: 2px 6px 12px 6px;
	font-family:georgia;
	font_weight:1200;
	font-size:1.2em;
}
        
.gauche {
	clear:both;
	margin-left:1px;
	margin-right:1px;
	margin-bottom: 4px;
	font-family: georgia;
	font-size:1.2em;
	float: left;
	width: 48%;
	color:#101010;
    text-align:justify;
	}
.droite {
	margin-right:1px;
	margin-left:1px;
	margin-bottom: 4px;
	font-family: georgia;
	font-size:1.2em;
	float: right;
	width: 48%;
	color:#101010;
	text-align:justify;
     }
.txt {
	margin-right:1px;
	margin-left:1px;
	margin-bottom: 4px;
	font-family: georgia;
	font-size:1.2em;
	color:#101010;
	text-align:justify;
     }
.titre-antienne-lat {
	clear:both;
	margin-left:1px;
	margin-right:1px;
	font-family: georgia;
	font-size:1.2em;
	float:left;
	width: 49%;
    color:red;
	text-align:center;
	font-weight:900;
	
	}

.rubrique{
	color:red;
	font-size:1em;
}

.titre-antienne-ver {
	margin-right:1px;
	margin-left:1px;
	font-family: georgia;
	font-size:1.2em;
	width: 49%;
	float:right;
	color:red;
	text-align:center;
	font-weight:900;
	}	
.liturgie_italique	{
	font-style : italic;
}
 .ordo  {
    border-bottom: 1px solid #bbb;
}
 .couleurLiturgiqueVert {
 	background-color:#9fb79e;
 }
 .couleurLiturgiqueRouge {
 	background:#DA0000;
 	color:#fff;
 }
 .couleurLiturgiqueBlanc {
 	background-color:#F3E2A9;
 }
 .couleurLiturgiqueViolet {
 	background-color:#610B4B;
 	color:#fff;
 }
 .couleurLiturgiqueRose {
 	background-color:#d1a8a8;
 	
 }
 .couleurLiturgiqueNoir {
 	background-color:#190710;
 	color:#fff;
 }
 .liturgie_titre{color:red;font-weight:900;text-align:center; }
.liturgie_sous_titre{color:red;font-weight:400;text-align:center; }
.liturgie_italique{font-weight:400;font-style:italic; !important}
.ceremonial{font-weight:400;font-style:italic; font-family: georgia;	font-size: 1em ;	color: red ; }

td.lettrine:first-letter {
  font-size:3.5em;
  padding-right:0.1em;
  float:left;
  color:#801313;
}

td.lettrineH:first-letter {
  font-size:2em;
  padding-right:0.1em;
  //float:left;
  color:#801313;
}
h1 {
    font-size: 1.3em;
    text-align: center;
}
</style>
<table>
   ";

global $wp_query;
$GLOBALS['dateYmd']=$dateYmd=$wp_query->query_vars['date'];
$GLOBALS['office']=$office=$wp_query->query_vars['office'];
$GLOBALS['lang']="fr";
//if(!$dateYmd) $dateYmd=date("Ymd");
$date_ts=date2datets($dateYmd);


$liturgia=$GLOBALS['liturgia'];
$traductions=$GLOBALS['traductions'];
$couleur=$liturgia->xpath("ordo[@id='RE']/couleur");
//print $couleur[0];
$result.="<style> body{";
if($couleur[0]=="Vert") $result.="background-color:#9fb79e;";
if($couleur[0]=="Rouge") $result.="background-color:rgba(152, 0, 0, 0.73);";
if($couleur[0]=="Blanc") $result.="background-color:#F3E2A9;";
if($couleur[0]=="Violet") $result.="background-color:#610B4B;";
if($couleur[0]=="Rose") $result.="background-color:#d1a8a8;";
if($couleur[0]=="Noir") $result.="background-color:#190710;";
$result.="}</style>";


if(($office=="martyrologe")||$office==("journee")) {
	$result.= "</table><h1 title=\"Martyrologe du ".afficheDate(date("Y-m-d",$date_ts))."\">Martyrologe du ".afficheDate(date("Y-m-d",$date_ts))." - ".$GLOBALS['intitulefr']."</h1><table>";
	
	$result.="<table>"; 
	$result.=martyrologe2($dateYmd); 
	$result.="</table>";
}
if(($office=="invitatoire")||$office==("journee")){
	$result.= "</table><h1 title=\"Invitatoire du ".afficheDate(date("Y-m-d",$date_ts))."\">Invitatoire du ".afficheDate(date("Y-m-d",$date_ts))." - ".$GLOBALS['intitulefr']."</h1><table>";
	
	//$GLOBALS['edition']="off";

	$result.= "<table>".intitule();
	$result.= invitatoire();			
		
}

if(($office=="vigiles")||$office==("journee")){
	$result.= "</table><h1 title=\"Vigiles (OSB) du ".afficheDate(date("Y-m-d",$date_ts))."\">Vigiles (OSB) du ".afficheDate(date("Y-m-d",$date_ts))." - ".$GLOBALS['intitulefr']."</h1><table>";
	
	//$GLOBALS['edition']="off";

	$result.= "<table>".intitule();
	$result.= vigiles($dateYmd,"RE");			
	$result.="</table>";	
}
if(($office=="evangile-commente")||$office==("journee")){
	$result.= "</table><h1 title=\"Evangile commenté du ".afficheDate(date("Y-m-d",$date_ts))."\">Evangile commenté du ".afficheDate(date("Y-m-d",$date_ts))." - ".$GLOBALS['intitulefr']."</h1><table>";
	
	//$GLOBALS['edition']="off";

	$result.= "<table>".intitule();
	$result.= commentaire_Delatte()."</table>";			
		
}


if(($office=="laudes")||$office==("journee")) { //lodi_130118
	print"
	<audio controls=\"controls\">
	Votre navigateur ne prend pas en charge l'élément <code>audio</code>.
	<source src=\"http://media01.vatiradio.va/podcast/feed/lodi_".date("dmy",$date_ts).".mp3\" type=\"audio/mp3\">
	</audio>
	";
	$result.= "</table><h1 title=\"Laudes du ".afficheDate(date("Y-m-d",$date_ts))."\">Laudes du ".afficheDate(date("Y-m-d",$date_ts))." - ".$GLOBALS['intitulefr']."</h1><table>";
	
	$result.="<span id='".get_site_url()."/forma-ordinaria/laudes-".$dateYmd."'/>";
	$result.= laudes($dateYmd,"RE");
	$result.="</table>";
}

if(($office=="tierce")||$office==("journee")) {
	$result.= "</table><h1 title=\"Office de tierce du ".afficheDate(date("Y-m-d",$date_ts))."\">Office de tierce du ".afficheDate(date("Y-m-d",$date_ts))." - ".$GLOBALS['intitulefr']."</h1><table>";
	
	$result.="<span id='".get_site_url()."/forma-ordinaria/tierce-".$dateYmd."'/>";
	$result.= tierce($dateYmd,"RE");
	$result.="</table>";
}

if(($office=="messe")||$office==("journee")){
	$result.= "</table><h1 title=\"Messe du ".afficheDate(date("Y-m-d",$date_ts))."\">Messe du ".afficheDate(date("Y-m-d",$date_ts))." - ".$GLOBALS['intitulefr']."</h1><table>";
	
	
	$result.="<span id='messe-".date("Y-m-d",$date_ts)."'/>";
	$result.= messe($dateYmd,"RE");
	$result.="</table>";
}

if(($office=="sexte")||$office==("journee")) {
	$result.= "</table><h1 title=\"Office de sexte du ".afficheDate(date("Y-m-d",$date_ts))."\">Office de sexte du ".afficheDate(date("Y-m-d",$date_ts))." - ".$GLOBALS['intitulefr']."</h1><table>";
	
	$result.="<span id='".get_site_url()."/forma-ordinaria/sexte-".$dateYmd."'/>";
	$result.= sexte($dateYmd,"RE");
	$result.="</table>";
}
if(($office=="none")||$office==("journee")) {
	$result.= "</table><h1 title=\"Office de none du ".afficheDate(date("Y-m-d",$date_ts))."\">Office de none du ".afficheDate(date("Y-m-d",$date_ts))." - ".$GLOBALS['intitulefr']."</h1><table>";
	
	$result.="<span id='".get_site_url()."/forma-ordinaria/none-".$dateYmd."'/>";
	$result.= none($dateYmd,"RE");
	$result.="</table>";
}
if(($office=="vepres")||$office==("journee")){ //http://media01.vatiradio.va/podcast/feed/vespri_lat_100118.mp3
	print"
	<audio controls=\"controls\">
	Votre navigateur ne prend pas en charge l'élément <code>audio</code>.
	<source src=\"http://media01.vatiradio.va/podcast/feed/vespri_lat_".date("dmy",$date_ts).".mp3\" type=\"audio/mp3\">
	</audio>
	";
	$result.= "</table><h1 title=\"Vêpres du ".afficheDate(date("Y-m-d",$date_ts))."\">Vêpres du ".afficheDate(date("Y-m-d",$date_ts))." - ".$GLOBALS['intitulefr']."</h1><table>";
	
	$result.="<span id='vepres-".date("Y-m-d",$date_ts)."'/>";
	$result.= vepres($dateYmd,"RE");
	$result.="</table>";
}

if(($office=="complies")||$office==("journee")){ //http://media01.vatiradio.va/podcast/feed/compieta_100118.mp3
	print"
	<audio controls=\"controls\">
	Votre navigateur ne prend pas en charge l'élément <code>audio</code>.
	<source src=\"http://media01.vatiradio.va/podcast/feed/compieta_".date("dmy",$date_ts).".mp3\" type=\"audio/mp3\">
	</audio>
	";
	
	$result.= "</table><h1 title=\"Complies du ".afficheDate(date("Y-m-d",$date_ts))."\">Complies du ".afficheDate(date("Y-m-d",$date_ts))." - ".$GLOBALS['intitulefr']."</h1><table>";
	
	$result.="<span id='complies-".date("Y-m-d",$date_ts)."'/>";
	$result.= complies($dateYmd,"RE");
	$result.="</table>";
}

else {
	$siteurl=get_site_url();
	$result.= "</table><h1 title=\"Ordo liturgique du ".afficheDate(date("Y-m-d",$date_ts))." au ".afficheDate(date("Y-m-d",$date_ts+30*60*60*24))."\">Ordo liturgique du ".afficheDate(date("Y-m-d",$date_ts))." au ".afficheDate(date("Y-m-d",$date_ts+30*60*60*24))."</h1><table>";
	
	$result.="
		<table >";
		$die=array("Dominica","Feria II","Feria III","Feria IV","Feria V","Feria VI","Sabbato");
	for ($i=0;$i<31;$i++){
		
		$ts=$date_ts+($i*60*60*24);
		$dateformatee = strftime("%A %e %B %Y",$ts);
		
		$xml=simplexml_load_file("wp-content/plugins/liturgia/LH/calendrier/".date('Y-m-d',$ts).".xml");
		$req="//ordo[@id='RE']";
		$r=$xml->xpath($req);
		$semaine=$r[0]->hebdomada->la;
		$jr=$die[date('w',$ts)];
		$intitule_la=$r[0]->intitule->la;
		$wp_query->query_vars['couleurLiturgique']=$couleurLiturgique=$couleur=$r[0]->couleur;
		$rang=$r[0]->rang->la;
		$priorite=$r[0]->priorite;
		$biographie =$xml->biographie->biographiecourte;
		$result.="<tr><td class='ordo couleurLiturgique".$couleur." '><center>".$dateformatee."</center></td>";
		$result.="<td class='ordo'><center>".$jr." - ".$semaine."</center>";
		if($priorite <12 ) {
			$result.="<br /><center><b>".$intitule_la;
			if($rang!="") $result.=", ".$rang; 
			$result.=".</b></center>";
		}
		if(($rang=="")&&($priorite==12)) $result.="<br />".$intitule_la.", memoria ad libitum.";
		$result.="<br /><i>".$xml->biographie->intitule."</i>";
		$result.="<br /><i>".$biographie."</i> - <a href='".$siteurl."/forma-ordinaria/martyrologe-".date("Ymd",$ts)."'>Martyrologe du jour</a>";
		if($xml->biographie->patronage!="") $result.="<br />Patronage : <i>".$xml->biographie->patronage."</i>";
		//print_r($xml->piete);
		if($xml->piete) $result.="<br /><i>".$xml->piete->intitule[0].$xml->piete->intitule[1]."</i>";
		
		if($xml->ordo->hebdomada_psalterium!="") $result.="<br />Semaine du psautier : <i>".$xml->ordo->hebdomada_psalterium."</i>";
		
		
		$result.="<br />";
		$result.="<a href='".$siteurl."/forma-ordinaria/invitatoire-".date("Ymd",$ts)."/'>Ad invitatorium</a> - ";
		$result.="<a href='".$siteurl."/forma-ordinaria/vigiles-".date("Ymd",$ts)."/'>Ad Vigilias (OSB)</a> - ";
		
		$result.="<a href='".$siteurl."/forma-ordinaria/laudes-".date("Ymd",$ts)."/'>Ad Laudes matutinas</a> - ";
		$result.="<a href='".$siteurl."/forma-ordinaria/tierce-".date("Ymd",$ts)."/'>Ad Tertiam</a> - ";
		
		$result.="<a href='".$siteurl."/forma-ordinaria/messe-".date("Ymd",$ts)."/'>Ad Missam</a> - ";
		$result.="<a href='".$siteurl."/forma-ordinaria/sexte-".date("Ymd",$ts)."/'>Ad Sextam</a> - ";
		$result.="<a href='".$siteurl."/forma-ordinaria/none-".date("Ymd",$ts)."/'>Ad Nonam</a> - ";
		
		$result.="<a href='".$siteurl."/forma-ordinaria/vepres-".date("Ymd",$ts)."/'>Ad Vesperas</a> - ";
		$result.="<a href='".$siteurl."/forma-ordinaria/complies-".date("Ymd",$ts)."/'>Ad Completorium</a> - ";
		$result.="<a href='".$siteurl."/forma-ordinaria/journee-".date("Ymd",$ts)."/'>Journée entière</a>";		
		$result.="</td></tr>";
		
	}
	$result.="</table>";
	
	
}
echo $result;
//$result.=osb_vigiles($date);


return $result;
//return ;
//file_put_contents("LH.html", $result);
}
 
?>
