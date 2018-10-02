<?php

function vepres_ord($id) {
$lang=$GLOBALS['lang'];
$option=$GLOBALS['option'];
if($lang=="") $lang="fr";
$xml=simplexml_load_file("../sources/".$id.".xml");

$output="";
//////// INTITULE
$output.= intitule_ord($id);

$output.="<tr><td class=\"gauche\"><center><i>Ad Vesperas</i></center></td><td class=\"droite\"><center><i>".get_traduction("Ad Vesperas", $lang)."</i></center></td></tr>";

// Initial
$output.= "
		<tr><td class=\"gauche\">V/. Deus, in adiutórium. Glória Patri. Sicut erat. Allelúia.</td>
		<td class=\"droite\">".get_traduction("V/. Deus, in adiutórium. Glória Patri. Sicut erat. Allelúia.",$lang)."</td></tr>
		";

// Hymne
$hr=$xml->xpath("/liturgia/HYMNUS_vesperas/@id");
$hrr=$hr[0];
$output.= hymne($hrr,$lang);
// ant1 et  PS1
$ar=$xml->xpath("/liturgia/ant7/@id");
$arr=$ar[0];
$output.= antienne($arr,$lang,"1");
$pr=$xml->xpath("/liturgia/PS7/@id");
$prr=$pr[0];
$output.= PSaume($prr,$lang);
$output.= antienne($arr,$lang);
// ant2 et  PS2
$ar=$xml->xpath("/liturgia/ant8/@id");
$arr=$ar[0];
$output.= antienne($arr,$lang,"2");
$pr=$xml->xpath("/liturgia/PS8/@id");
$prr=$pr[0];
$output.= PSaume($prr,$lang);
$output.= antienne($arr,$lang);
// ant3 et  PS3
$ar=$xml->xpath("/liturgia/ant9/@id");
$arr=$ar[0];
$output.= antienne($arr,$lang,"3");
$pr=$xml->xpath("/liturgia/PS9/@id");
$prr=$pr[0];
$output.= PSaume($prr,$lang);
$output.= antienne($arr,$lang);
// Lecon et répons bref
$lr=$xml->xpath("/liturgia/LB_soir/@id");
$lrr=$lr[0];
$output.= lectiobrevis($lrr,$lang);
$rr=$xml->xpath("/liturgia/RB_soir/@id");
$rrr=$rr[0];
$output.= reponsbref($rrr,$lang);
// Antienne et Benedictus
$br=$xml->xpath("/liturgia/magnificat/@id");
$brr=$br[0];
$output.= antienne($brr,$lang);
$output.= PSaume("magnificat",$lang);
$output.= antienne($brr,$lang);
$preces=$xml->xpath("/liturgia/preces/@id");
$pp="PRECES_".$preces[0]."_vepres";
$output.= preces($pp,$lang);
$output.= pater($lang);
$oratio=$xml->xpath("/liturgia/oratio_vesperas/@id");
//print_r($oratio);
$output.= collecte($oratio[0],$lang);
/// CONCLUSION
$output.= "<tr><td class=\"gauche rubrique\">Conclusio Horae, ut in ordinario.</td>
		<td class=\"droite rubrique\">".get_traduction("Conclusio Horae, ut in ordinario.",$lang)."</td></tr>";

//print $output;
return $output;
}

?>