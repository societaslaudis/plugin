<?php
include_once("fonctions.php");
//include_once("osb_vigiles.php");
include_once("laudes-ord.php");
include_once("mediahora-ord.php");
//include_once("messe.php");
include_once("vepres-ord.php");
include_once("complies_ord.php");
$traductions=simplexml_load_file("../traductions.xml");
$edition="on";
//$edition="on";
$result="
<!DOCTYPE html>
<html xmlns=\"http://www.w3.org/1999/xhtml\" xml:lang=\"fr\" lang=\"fr\" dir=\"ltr\">
  <head>
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
	font-size:1em;
	float: left;
	width: 49%;
	color:#101010;
    text-align:justify;
	}
.droite {
	margin-right:1px;
	margin-left:1px;
	margin-bottom: 4px;
	font-family: georgia;
	font-size:1em;
	float: right;
	width: 49%;
	color:#101010;
	text-align:justify;
     }

.titre-antienne-lat {
	clear:both;
	margin-left:1px;
	margin-right:1px;
	font-family: georgia;
	font-size:1em;
	float:left;
	width: 49%;
    color:red;
	text-align:center;
	font-weight:900;
	
	}


.titre-antienne-ver {
	margin-right:1px;
	margin-left:1px;
	font-family: georgia;
	font-size:1em;
	width: 49%;
	float:right;
	color:red;
	text-align:center;
	font-weight:900;
	}	
.liturgie_italique	{
	font-style : italic;
}
.rubrique	{
	font-size:0.8em;
	color:red;
}
  
  </style>
    <title>Liturgia Horarum</title>
  </head>
   <body>
   <table>
   ";

// PSAUTIER
for($j=1;$j<5;$j++){
	for ($i=1;$i<8;$i++){
	
		$id="psalterium/psalterium_".$j.$i;
		print"\r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n".$id;
		$result.=laudes_ord($id);
		$result.=mediahora_ord($id);
		$result.=vepres_ord($id);
		$result.=complies_ord($id);
	}
}

if($edition=="on") { $result.=" 
</table>
<script>
function affichage_popup(nom_de_la_page, nom_interne_de_la_fenetre) {
	window.open (nom_de_la_page, nom_interne_de_la_fenetre, config='height=300, width=400, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, directories=no, status=no')
}
</script>";
}

$result.="
   </body>
</html>";
//print $result;
//print $result;
file_put_contents("LH-1.html", $result);

//On affiche le document word

 
echo $content;


?>