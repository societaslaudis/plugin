<?php


function sexte($date,$ordo) {
	
$lang=$_GET['lang'];
$option=$_GET['option'];
if($lang=="") $lang="fr";
$xml=$GLOBALS['liturgia'];
$prio=$xml->xpath("//ordo[@id='RE']//priorite");
$priorite=$prio[0];

//////// INTITULE
$sexte= intitule();

$of=$xml->xpath("//ordo[@id='RE']//office_matin/la");
if($of[0]) $off=$of[0];
if($off) {
	$sexte.="<tr><td class=\"gauche\"><center><i>".$off."</i></center></td>";
	$sexte.="<tr><td class=\"droite\"><center><i>".get_traduction($off,$lang)."</i></center></td></tr>";
}
else $sexte.="<tr><td class=\"gauche\"><center><i>Ad Sextam</i></center></td><td class=\"droite\"><center><i>".get_traduction("Ad Sextam", $lang)."</i></center></td></tr>";

// Initial
$sexte.= affiche_texte("initial_GHeure",$lang);
$sexte.= alleluia();

// Hymne
$hr=$xml->xpath("ordo[@id='RE']/HYMNUS_6");
$hrr=$hr[0];
$sexte.= hymne($hrr,$lang);


// ant1 et  PS1
$ar=$xml->xpath("ordo[@id='RE']/ant4");
$arr=$ar[0];
$sexte.= antienne($arr,$lang,"1");
$pr=$xml->xpath("ordo[@id='RE']/ps4");
$prr=$pr[0];
$sexte.= psaume($prr,$lang);
$sexte.= antienne($arr,$lang);
// ant2 et  PS2
$ar=$xml->xpath("ordo[@id='RE']/ant5");
$arr=$ar[0];
if($arr) $sexte.= antienne($arr,$lang,"2");
$pr=$xml->xpath("ordo[@id='RE']/ps5");
$prr=$pr[0];
if($prr) $sexte.= psaume($prr,$lang);
if($arr) $sexte.= antienne($arr,$lang);
// ant3 et  PS3
$ar=$xml->xpath("ordo[@id='RE']/ant6");
$arr=$ar[0];
if($arr) $sexte.= antienne($arr,$lang,"3");
$pr=$xml->xpath("ordo[@id='RE']/ps6");
$prr=$pr[0];
if($prr) $sexte.= psaume($prr,$lang);
if($arr) $sexte.= antienne($arr,$lang);

// Lecon et répons bref
$lr=$xml->xpath("ordo[@id='RE']/LB_6");
$lrr=$lr[0];
//print "<b>".$lrr."</b>";
$sexte.= lectiobrevis($lrr,$lang);
$rr=$xml->xpath("ordo[@id='RE']/RB_6");
$rrr=$rr[0];
//print "<br>";print_r($rr);
$sexte.= affiche_texte($rrr,$lang);
$oratio=$xml->xpath("ordo[@id='RE']/oratio_6");
$sexte.="
	<tr><td  class=\"gauche\">Orémus.</td>
	<td class=\"droite\">".get_traduction("Orémus", $lang).".</td></tr>
	";	
$sexte.= oratio($oratio[0],$lang);
$sexte.= affiche_texte("Benedicamus_Domino",$lang);

$sexte.="<tr>
<td class=\"gauche\"><hr><center><i>Ad Sextam - psalmodia complementaria</i></center></td>
<td class=\"droite\"><hr><center><i>A Sexte - psalmodie complémentaire.</i></center></td>
</tr>";

$sexte.="<tr><td class=\"gauche rubrique\">Post ℣. Deus, in adiutórium et hymnum, dicuntur psalmi graduales qui sequuntur cum suis antiphonis.</td>
<td class=\"droite rubrique\">Après le ℣. Dieu, viens à mon aide et l'hymne, on peut [choisir de] dire [ad libitum, à la place des précédents] les psaumes graduels qui suivent avec leurs antiennes.</td></tr>";


$ar=$xml->xpath("ordo[@id='RE']/ant4");
$arr=$ar[0];
$sexte.= antienne($arr,$lang,"1");
$sexte.=psaume("ps122",$lang);

$ar=$xml->xpath("ordo[@id='RE']/ant5");
$arr=$ar[0];
$sexte.= antienne($arr,$lang,"2");
$sexte.=psaume("ps123",$lang);


$ar=$xml->xpath("ordo[@id='RE']/ant6");
$arr=$ar[0];
$sexte.= antienne($arr,$lang,"3");
$sexte.=psaume("ps124",$lang);


return rougis_verset($sexte);
}





?>
