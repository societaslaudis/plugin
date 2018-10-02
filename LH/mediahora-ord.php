<?php

function mediahora_ord($id) {
	

	
$lang=$GLOBALS['lang'];
$option=$GLOBALS['option'];
if($lang=="") $lang="fr";
//$xml=$GLOBALS['liturgia'];
//id = PSalterium/PSalterium11
$xml=simplexml_load_file("../sources/".$id.".xml");
//print_r($xml);
$output="";
//////// INTITULE

// Initial

$output.=intitule_ord($id);
$output.= "
		<tr><td class=\"gauche\" style=\"font-size: 1.1em;font-weight: 900;text-align:center;\">Ad Horam mediam</td>
		<td class=\"droite\" style=\"font-size: 1.1em;font-weight: 900;text-align:center;\">".get_traduction("Ad Horam mediam",$lang)."</td></tr>";
$output.= "
		<tr><td class=\"gauche\">V/. Deus, in adiutórium. Glória Patri. Sicut erat. Allelúia.</td>
		<td class=\"droite\">".get_traduction("V/. Deus, in adiutórium. Glória Patri. Sicut erat. Allelúia.",$lang)."</td></tr>
		";
 
// Hymne
$output.="<tr><td class=\"gauche rubrique\" >Ad Tertiam</td>
		<td class=\"droite rubrique\">".get_traduction("Ad Tertiam",$lang)."</td></tr>";
$hr=$xml->xpath("/liturgia/HYMNUS_tertiam/@id");
$hrr=$hr[0];
print"\r\n".$hrr;
$output.= hymne($hrr,$lang);

// Hymne
$output.="<tr><td class=\"gauche rubrique\" >Ad Sextam</td>
		<td class=\"droite rubrique\">".get_traduction("Ad Sextam",$lang)."</td></tr>";
$hr=$xml->xpath("/liturgia/HYMNUS_sextam/@id");
$hrr=$hr[0];
print"\r\n".$hrr;
$output.= hymne($hrr,$lang);

// Hymne
$output.="<tr><td class=\"gauche rubrique\" >Ad Nonam</td>
		<td class=\"droite rubrique\">".get_traduction("Ad Nonam",$lang)."</td></tr>";
$hr=$xml->xpath("/liturgia/HYMNUS_nonam/@id");
$hrr=$hr[0];
print"\r\n".$hrr;
$output.= hymne($hrr,$lang);

// ant4 et  PS4
$ar=$xml->xpath("/liturgia/ant4/@id");
$arr=$ar[0];
$output.= antienne($arr,$lang,"1");
$pr=$xml->xpath("/liturgia/PS4/@id");
$prr=$pr[0];
$output.= Psaume($prr,$lang);
$output.= antienne($arr,$lang);
// ant2 et  PS2
$ar=$xml->xpath("/liturgia/ant5/@id");
$arr=$ar[0];
$output.= antienne($arr,$lang,"2");
$pr=$xml->xpath("/liturgia/PS5/@id");
$prr=$pr[0];
$output.= PSaume($prr,$lang);
$output.= antienne($arr,$lang);
// ant3 et  PS3
$ar=$xml->xpath("/liturgia/ant6/@id");
$arr=$ar[0];
$output.= antienne($arr,$lang,"3");
$pr=$xml->xpath("/liturgia/PS6/@id");
$prr=$pr[0];
$output.= Psaume($prr,$lang);
$output.= antienne($arr,$lang);
// Lecon et répons bref
$output.="<tr><td class=\"gauche rubrique\" >Ad Tertiam</td>
		<td class=\"droite rubrique\">".get_traduction("Ad Tertiam",$lang)."</td></tr>";
$lr=$xml->xpath("/liturgia/LB_3/@id");
$lrr=$lr[0];
$output.= lectiobrevis($lrr,$lang);
$rr=$xml->xpath("/liturgia/RB_3/@id");
$rrr=$rr[0];
$output.= verset($rrr,$lang);
$output.="<tr><td class=\"gauche\">Orémus.</td>
		<td class=\"droite\">".get_traduction("Orémus.",$lang)."</td></tr>";
$oratio=$xml->xpath("/liturgia/oratio_3/@id");
if(trim($oratio[0])=="COL") {
$output.= "
		<tr><td class=\"gauche rubrique\"> Oratio, ut in proprio de Tempore.</td>
		<td class=\"droite rubrique\">".get_traduction(" Oratio, ut in proprio de Tempore.",$lang)."</td></tr>";
}
else $output.= oratio($oratio[0],$lang);


// Lecon et répons bref
$output.="<tr><td class=\"gauche rubrique\" >Ad Sextam</td>
		<td class=\"droite rubrique\">".get_traduction("Ad Sextam",$lang)."</td></tr>";
$lr=$xml->xpath("/liturgia/LB_6/@id");
$lrr=$lr[0];
$output.= lectiobrevis($lrr,$lang);
$rr=$xml->xpath("/liturgia/RB_6/@id");
$rrr=$rr[0];
$output.= verset($rrr,$lang);
$oratio=$xml->xpath("/liturgia/oratio_6/@id");
$output.="<tr><td class=\"gauche\">Orémus.</td>
		<td class=\"droite\">".get_traduction("Orémus.",$lang)."</td></tr>";
$oratio=$xml->xpath("/liturgia/oratio_3/@id");
if(trim($oratio[0])=="COL") {
$output.= "
		<tr><td class=\"gauche rubrique\"> Oratio, ut in proprio de Tempore.</td>
		<td class=\"droite rubrique\">".get_traduction(" Oratio, ut in proprio de Tempore.",$lang)."</td></tr>";
}
else $output.= oratio($oratio[0],$lang);

// Lecon et répons bref
$output.="<tr><td class=\"gauche rubrique\" >Ad Nonam</td>
		<td class=\"droite rubrique\">".get_traduction("Ad Nonam",$lang)."</td></tr>";
$lr=$xml->xpath("/liturgia/LB_9/@id");
$lrr=$lr[0];
$output.= lectiobrevis($lrr,$lang);
$rr=$xml->xpath("/liturgia/RB_9/@id");
$rrr=$rr[0];
$output.= verset($rrr,$lang);
$oratio=$xml->xpath("/liturgia/oratio_9/@id");
$output.="<tr><td class=\"gauche\">Orémus.</td>
		<td class=\"droite\">".get_traduction("Orémus.",$lang)."</td></tr>";
$oratio=$xml->xpath("/liturgia/oratio_3/@id");
if(trim($oratio[0])=="COL") {
$output.= "
		<tr><td class=\"gauche rubrique\"> Oratio, ut in proprio de Tempore.</td>
		<td class=\"droite rubrique\">".get_traduction(" Oratio, ut in proprio de Tempore.",$lang)."</td></tr>";
}
else $output.= oratio($oratio[0],$lang);


/// CONCLUSION
$output.= "<tr><td class=\"gauche rubrique\">Conclusio Horae, ut in ordinario.</td>
		<td class=\"droite rubrique\">".get_traduction("Conclusio Horae, ut in ordinario.",$lang)."</td></tr>";

return $output;

	//return "machin";
}

?>