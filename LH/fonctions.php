<?php
date_default_timezone_set ( "Europe/Paris" );


function noveritis($dateYmd) {

$ordinauxlatin[1]="prima";
$ordinauxlatin[2]="secunda";
$ordinauxlatin[3]="tertia";
$ordinauxlatin[4]="quarta";
$ordinauxlatin[5]="quinta";
$ordinauxlatin[6]="sexta";
$ordinauxlatin[7]="septima";
$ordinauxlatin[8]="octava";
$ordinauxlatin[9]="nona";
$ordinauxlatin[10]="décima";
$ordinauxlatin[11]="undécima";
$ordinauxlatin[12]="duodécima";
$ordinauxlatin[13]="décima tertia";
$ordinauxlatin[14]="décima quarta";
$ordinauxlatin[15]="décima quinta";
$ordinauxlatin[16]="décima sexta";
$ordinauxlatin[17]="décima septima";
$ordinauxlatin[18]="duodevicésima";
$ordinauxlatin[19]="undevicésima";
$ordinauxlatin[20]="vigésima";
$ordinauxlatin[21]="vigésima prima";
$ordinauxlatin[22]="vigésima secunda";
$ordinauxlatin[23]="vigésima tertia";
$ordinauxlatin[24]="vigésima quarta";
$ordinauxlatin[25]="vigésima quinta";
$ordinauxlatin[26]="vigésima sexta";
$ordinauxlatin[27]="vigésima septima";
$ordinauxlatin[28]="vigésima octava";
$ordinauxlatin[29]="vigésima nona";
$ordinauxlatin[30]="trigésima";
$ordinauxlatin[31]="trigésima prima";


	/// mercredi des cendres 
	//print $dateYmd;
	$AN=(int)substr($dateYmd,0,4);
	$CM2=simplexml_load_file("wp-content/plugins/liturgia/LH/calendrier/".$AN."-2.xml");
	$r2=$CM2->xpath("/mois/ordo/jour[intitule/la='Feria IV Cinerum']");
	$CM3=simplexml_load_file("wp-content/plugins/liturgia/LH/calendrier/".$AN."-3.xml");
	$r3=$CM3->xpath("/mois/ordo/jour[intitule/la='Feria IV Cinerum']");
	$feria4CinerumYmd=$r2[0]['date'].$r3[0]['date'];
	$feria4cinerumTS=date2dateTS($feria4CinerumYmd);
	$txtF4C=(int)date('d',$feria4cinerumTS);
	if(date('m',$feria4cinerumTS)==2) {
		$txtF4C=(int)date('d',$feria4cinerumTS);
		$txtF4Cfr=$txtF4C." février"; 
		if($txtF4C=="1") $txtF4Cfr="1er février";
		$txtF4C=$ordinauxlatin[$txtF4C]." februárii";  
		
		}
	if(date('m',$feria4cinerumTS)==3) {
		$txtF4Cfr=$txtF4C." mars"; 
		if($txtF4C=="1") $txtF4Cfr="1er mars";
		$txtF4C=$ordinauxlatin[$txtF4C]." mártii"; 
		
		}
	
	/// Pâques mártii/aprílis
	$CM3=simplexml_load_file("wp-content/plugins/liturgia/LH/calendrier/".$AN."-3.xml");
	$r3=$CM3->xpath("/mois/ordo/jour[intitule/la='DOMINICA RESURRECTIONIS']");
	$CM4=simplexml_load_file("wp-content/plugins/liturgia/LH/calendrier/".$AN."-4.xml");
	$r4=$CM4->xpath("/mois/ordo/jour[intitule/la='DOMINICA RESURRECTIONIS']");
	$paschaYmd=trim($r3[0]['date'].$r4[0]['date']);
	$paschaTS=date2dateTS($paschaYmd);
	$txtPascha=(int)date('d',$paschaTS);
	if(date('m',$paschaTS)==3) {
		$txtPaschafr=$txtPascha." mars";
		if($txtPascha=="1") $txtPaschafr="1er mars";
		$txtPascha=$ordinauxlatin[$txtPascha]." mártii"; 
		}
	if(date('m',$paschaTS)==4) {
		 $txtPaschafr=$txtPascha." avril";
		 if($txtPascha=="1") $txtPaschafr="1er avril";
		 $txtPascha=$ordinauxlatin[$txtPascha]." apríli";
	} 
	
	/// Ascension aprílis/maii/iúnii
	$CM4=simplexml_load_file("wp-content/plugins/liturgia/LH/calendrier/".$AN."-4.xml");
	$r4=$CM4->xpath("/mois/ordo/jour[intitule/la='IN ASCENSIONE DOMINI']");
	$CM5=simplexml_load_file("wp-content/plugins/liturgia/LH/calendrier/".$AN."-5.xml");
	$r5=$CM5->xpath("/mois/ordo/jour[intitule/la='IN ASCENSIONE DOMINI']");
	$CM6=simplexml_load_file("wp-content/plugins/liturgia/LH/calendrier/".$AN."-6.xml");
	$r6=$CM6->xpath("/mois/ordo/jour[intitule/la='IN ASCENSIONE DOMINI']");
	
	$AscensioYmd=trim($r4[0]['date'].$r5[0]['date'].$r6[0]['date']);
	
	$AscensioTS=date2dateTS($AscensioYmd);
	$txtAscensio=(int)date('d',$AscensioTS);
	if(date('m',$AscensioTS)==4) {
		$txtAscensiofr=$txtAscensio." avril"; 
		
		if($$txtAscensio=="1") $txtAscensiofr="1er avril";
		$txtAscensio=$ordinauxlatin[$txtAscensio]." aprílis"; 
	}
	if(date('m',$AscensioTS)==5) {
		$txtAscensiofr=$txtAscensio." mai"; 
		if($txtAscensio=="1") $txtAscensiofr="1er mai";
		$txtAscensio=$ordinauxlatin[$txtAscensio]." maii";
	}
	if(date('m',$AscensioTS)==6) {
		$txtAscensiofr=$txtAscensio." juin"; 
		if($txtAscensio=="1") $txtAscensiofr="1er juin";
		$txtAscensio=$ordinauxlatin[$txtAscensio]." iúnii";
	}

	
	/// Pentecôte maii/iúnii/
	$CM5=simplexml_load_file("wp-content/plugins/liturgia/LH/calendrier/".$AN."-5.xml");
	$r5=$CM5->xpath("/mois/ordo/jour[intitule/la='Dominica Pentecostes']");
	$CM6=simplexml_load_file("wp-content/plugins/liturgia/LH/calendrier/".$AN."-6.xml");
	$r6=$CM6->xpath("/mois/ordo/jour[intitule/la='Dominica Pentecostes']");
	$pentecostesYmd=trim($r5[0]['date'].$r6[0]['date']);
	$pentecostesTS=date2dateTS($pentecostesYmd);
	$txtPentecostes=(int)date('d',$pentecostesTS);
	$jourPentecostesLa=(int)date('d',$pentecostesTS);
	if($jourPentecostesLa=="1") $jourPentecostesFr="1er";
	else $jourPentecostesFr=$jourPentecostesLa;
	if(date('m',$pentecostesTS)==5) {
		$moisPentecostesLa=" maii";
		$moisPentecostesFr=" mai";
	}
	
	if(date('m',$pentecostesTS)==6) {
		$moisPentecostesLa=" iúnii";
		$moisPentecostesFr=" juin";
	}
	if(date('m',$pentecostesTS)==date('m',$AscensioTS)){
		$moisPentecostesLa=" eiúsdem";
		$moisPentecostesFr=" du même mois";
	}
   $txtPentecostes=$ordinauxlatin[$jourPentecostesLa].$moisPentecostesLa;
	$txtPentecostesFr=$jourPentecostesFr.$moisPentecostesFr;
	
	/// Fête-Dieu  maii/iúnii
	$CM5=simplexml_load_file("wp-content/plugins/liturgia/LH/calendrier/".$AN."-5.xml");
	$r5=$CM5->xpath("/mois/ordo/jour[intitule/la='SS.MI CORPORIS ET SANGUINIS CHRISTI']");
	$CM6=simplexml_load_file("wp-content/plugins/liturgia/LH/calendrier/".$AN."-6.xml");
	$r6=$CM6->xpath("/mois/ordo/jour[intitule/la='SS.MI CORPORIS ET SANGUINIS CHRISTI']");
	$FDYmd=$r5[0]['date'].$r6[0]['date'];
	$FDTS=date2dateTS($FDYmd);
	$jourFD=(int)date('d',$FDTS);
	$jourFDFr=$jourFD;
	if($jourFD=="1") $jourFDFr="1er";
	
	if(date('m',$FDTS)==5) {
		$moisFDLa=" maii";
		$moisFDFr=" mai";
	}
	
	if(date('m',$FDTS)==6) {
		$moisFDLa=" iúnii";
		$moisFDFr=" juin";
	}
	if(date('m',$pentecostesTS)==date('m',$FDTS)){
		$moisFDLa=" eiúsdem";
		$moisFDFr=" du même mois";
	}
    $txtFD=$ordinauxlatin[$jourFD].$moisFDLa;
	$txtFDFr=$jourFDFr.$moisFDFr;
	
	/// 1er dimanche de l'Avent
	$CM11=simplexml_load_file("wp-content/plugins/liturgia/LH/calendrier/".$AN."-11.xml");
	$r11=$CM11->xpath("/mois/ordo/jour[intitule/la='Dominica I Adventus']");
	$CM12=simplexml_load_file("wp-content/plugins/liturgia/LH/calendrier/".$AN."-12.xml");
	$r12=$CM12->xpath("/mois/ordo/jour[intitule/la='Dominica I Adventus']");
	$pAYmd=trim($r11[0]['date'].$r12[0]['date']);
	$pATS=date2dateTS($pAYmd);
	$txt1A=(int)date('d',$pATS);
	if(date('m',$pATS)==11) {
		$txt1Afr=$txt1A." novembre"; 
		if($txt1A=="1") $txt1Afr="1er novembre";
		$txt1A=$ordinauxlatin[$txt1A]." novémbris";
		}
	if(date('m',$pATS)==12) {
		$txt1Afr=$txt1A." décembre"; 
		if($txt1A=="1") $txt1Afr="1er décembre";
		$txt1A=$ordinauxlatin[$txt1A]." decémbris";
		}
$result="<tr><td class='rubrique'><i>Selon le Missale Romanum (2002) et le Cérémonial des Évêques (§240), après le chant de l’Évangile,
un des diacres, ou bien un chanoine, un bénéficier ou le prêtre, montera à l’ambon revêtu de son pluvial 
('chape') blanc et y publiera au peuple l’annonce solennelle de la date de Pâques et des Fêtes mobiles
de l'année. Dès les premiers temps de l'Église, le patriarche d'Alexandrie - là où se trouvaient les plus 
habiles astronomes de la chrétienté - envoyait la date de la solennité pascale au Souverain Pontife, 
qui en informait les métropolites d'Occident. Les Évêques prirent donc l'habitude de publier chaque
année, une epistola festalis, dans laquelle étaient annoncées les Fêtes mobiles de l'année. Telle 
est l'origine du chant 'Noveritis' qui doit être traditionnellement chanté sur le ton de l'Exsultet.</i></:i></td></tr>";	
$result.="<tr><td class='gauche rubrique'>Ubi mos est, pro opportunitate, publicari possunt post Evangelium festa mobilia anni currentis.</td>";
$result.="<td class='droite rubrique'>Là où c'est l'usage, selon l'opportunité, on peut publier après l'Évangile les fêtes mobiles de l'année en cours.</td></tr>";

$result.="<tr><td class='gauche liturgie_titre'>Annuntiatio Paschæ festorumque mobilium</td>";
$result.="<td class='droite liturgie_titre'>Annonce de Pâques et des fêtes mobiles</td></tr>";

$result.="<tr>
			<td class='gauche'><center>Novéritis, fratres caríssimi,</center></td>";
$result.="	<td class='droite'><center>Sachez, bien-aimés Frères,</center></td>
		</tr>";
  
$result.="<tr>
			<td class='gauche'><center>quod annuénte Dei misericórdia,</center></td>";
$result.="	<td class='droite'><center>que, par la miséricorde de Dieu, de même que</center></td>
		</tr>";

$result.="<tr><td class='gauche'><center>sicut de Nativitáte Dómini nostri Iesu Christi gravísi sumus,</center></td>";
$result.="<td class='droite'><center>nous avons goûté l'allégresse de la Nativité de Notre Seigneur Jésus-Christ,</center></td></tr>";

$result.="<tr><td class='gauche'><center>ita et de Resurrectióne eiúsdem Salvatóris nostri</center></td>";
$result.="<td class='droite'><center>nous vous annonçons aujourd'hui les joies prochaines</center></td></tr>";

$result.="<tr><td class='gauche'><center>gáudium vobis annuntiámus.</center></td>";
$result.="<td class='droite'><center> de la résurrection de ce même Rédempteur.</center></td></tr>";

$result.="<tr><td class='gauche'><center>Die $txtF4C dies Cínerum,</center></td>";
$result.="<td class='droite'><center>Le $txtF4Cfr sera le jour des Cendres</center></td></tr>";

$result.="<tr><td class='gauche'><center>et initium ieiunii sacratíssimæ Quadragésimæ.</center></td>";
$result.="<td class='droite'><center>et le commencement du jeûne très sacré du Carême.</center></td></tr>";

$result.="<tr><td class='gauche'><center>Die $txtPascha</center></td>";
$result.="<td class='droite'><center> Le $txtPaschafr </center></td></tr>";

$result.="<tr><td class='gauche'><center>sanctum Pascha Dómini nostri Iesu Christi</center></td>";
$result.="<td class='droite'><center>sera la sainte Pâque de Notre Seigneur Jésus-Christ, </center></td></tr>";

$result.="<tr><td class='gauche'><center>cum gáudio celebrábitis.</center></td>";
$result.="<td class='droite'><center> que vous célèbrerez avec joie.</center></td></tr>";

$result.="<tr><td class='gauche'><center>Die $txtAscensio erit Ascénsio</center></td>";
$result.="<td class='droite'><center>Le $txtAscensiofr sera l'Ascension</center></td></tr>";

$result.="<tr><td class='gauche'><center>Dómini nostri Iesu Christi.</center></td>";
$result.="<td class='droite'><center>de Notre Seigneur Jésus-Christ.</center></td></tr>";

$result.="<tr><td class='gauche'><center>Die $txtPentecostes festum Pentecóstes.</center></td>";
$result.="<td class='droite'><center>le $txtPentecostesFr, la fête de la Pentecôte.</center></td></tr>";

$result.="<tr><td class='gauche'><center>Die $txtFD </center></td>";
$result.="<td class='droite'><center>Le $txtFDFr</center></td></tr>";

$result.="<tr><td class='gauche'><center>festum Sanctíssimi Córporis et Sánguinis Christi.</center></td>";
$result.="<td class='droite'><center>la fête du Corps et du Sang très Saints du Christ.</center></td></tr>";

$result.="<tr><td class='gauche'><center>Die  $txt1A </center></td>";
$result.="<td class='droite'><center>Le $txt1Afr</center></td></tr>";

$result.="<tr><td class='gauche'><center>domínica prima Advéntus Dómini nostri Iesu Christi,</center></td>";
$result.="<td class='droite'><center>le premier dimanche de l'Avent de Notre Seigneur Jésus-Christ,</center></td></tr>";

$result.="<tr><td class='gauche'><center>cui est honor et glória, in saécula sæculórum. Amen.</center></td>";
$result.="<td class='droite'><center>à qui est honneur et gloire dans tous les siècles des siècles. Amen.</center></td></tr>";

return $result;
}
	
function mod_ordo($do,$calendarium) {
	$bb.="<h3>Ordo</h3>";
	$datelatin=date_latin($do);
	$bb.="<b>Liturgie pour :</b> $datelatin";
	$bb.="<br><b>Temps liturgique :</b> ".$calendarium['tempus'][$do];
	$bb.="<br><b>Semaine :</b> ".$calendarium['hebdomada'][$do];
	if($calendarium['intitule'][$do]) $bb.="<br><b>".$calendarium['intitule'][$do]."</b>";
	if($calendarium['rang'][$do]) $bb.="<br><b >Rang : </b>".$calendarium['rang'][$do];
	$bb.="<br><b>Couleur des ornements :</b> ".$calendarium['couleur_template'][$do];
	$bb.="<br><b>Semaine du psautier :</b> ".$calendarium['hebdomada_psalterium'][$do];
	$bb.="<br>";

$bb=utf($bb);
print"</table>";
print $bb;
}

function get_CouleurLiturgique($dateYmd){
	global $calendarium;
	return $calendarium['couleur_template'][$dateYmd];
}



function ordo($ordo,$ref,$lang) {
    
	return $output;
}

function datets($jour) {
if(!$jour) $jour=$_GET['jour'];
if(!$jour) $jour=$_GET['date'];
if(!$jour) $jour=date("Ymd",time());
$anno=substr($jour,0,4);
$mense=substr($jour,4,2);
$die=substr($jour,6,2);
$date_ts=mktime(12,0,0,$mense,$die,$anno);


$jours_l = array("Dominica,", "Feria secunda,","Feria tertia,","Feria quarta,","Feria quinta,","Feria sexta,", "Sabbato,");
$date['ts']=$date_ts;
$date['AAAAMMJJ']=$jour;
return $date;
}
function date2dateTS($dateYmd) { // format AAAAMMJJ
	$anno=(int)substr($dateYmd,0,4);
	$mense=(int)substr($dateYmd,4,2);
	$die=(int)substr($dateYmd,6,2);
	date_default_timezone_set ( "Europe/Paris" );
	
	$dts=mktime(12,0,0,$mense,$die,$anno);
	return $dts;
	
}
function date_latin($j) {
	if($j==null) $j=time();
 $mois= array("Ianuarii","Februarii","Martii","Aprilis","Maii","Iunii","Iulii","Augustii","Septembris","Octobris","Novembris","Decembris");
 $jours = array("Dominica,", "Feria secunda,","Feria tertia,","Feria quarta,","Feria quinta,","Feria sexta,", "Sabbato,");
 $date= $jours[@date("w",$j)]." ".@date("j",$j)." ".$mois[@date("n",$j)-1]." ".@date("Y",$j);
 return $date;
}

function affiche_tableau($tableau,$office) {
	if($office=="laudes") {
		$t="
		<table>
		<th>Psautier</th>
		<th>Temporal</th>
		<th>Propre</th>
		<th>Special</th>";
		$t.="
		<tr>
		<td>".$tableau['matin']['psalterium']."</td>
		<td>".$tableau['matin']['ferie']."</td>
		<td>".$tableau['matin']['propre']."</td>
		<td>".$tableau['matin']['special']."</td>";
		$t.="</table>";
	}
	return $t;

}

function get_traduction($atraduire,$lang) {

$traductions=$GLOBALS['traductions'];

//print"<PRE>".print_r($GLOBALS['traductions'])."</PRE>";
if(!$lang) $lang=$GLOBALS['lang'];
if(!$lang) $lang="fr";
$path="//item[@ref='".$atraduire."']//".$lang;
$traduit=$traductions->xpath($path);
//print"<em>".$atraduire."->".$traduit[0]."<br/></em>";
if(!$traduit[0]) return $atraduire;
else return $traduit[0];
}

function get_date($date,$calendarium) {
date_default_timezone_set ( "fr_FR" );
	
if(!$date) $date=$_GET['date'];
if(!$date) $date=date("Ymd",time());
$anno=substr($date,0,4);
$mense=substr($date,4,2);
$die=substr($date,6,2);
$date_ts=mktime(12,0,0,$mense,$die,$anno);
$output=strftime("%A %#d %B %Y",$date_ts);

$output.="<br>".$calendarium['intitule'][$date];

	
	return $output;
	
}

function rougis_verset($string) {
$string1=str_replace("V/.", "<font color=red>V/.</font>",$string);
$string2= str_replace("R/.", "<font color=red>R/.</font>",$string1);
$string3= str_replace("", "<font color=red></font>",$string2);
$string4= str_replace("*", "<font color=red>*</font>",$string3);
$string5= str_replace("]", "<font color=red>]</font>",$string4);
$string6= str_replace("[", "<font color=red>[</font>",$string5);
$string7= str_replace("†", "<font color=red>†</font>",$string6);
$string8= str_replace("—", "<font color=red>—</font>",$string7);

return $string8;
}

function lectio($ref) {

	$row = -1;
	$fp = @fopen ($prefixe."calendrier../$ref.csv","r","1");
	while ($data = @fgetcsv ($fp, 1000, ";")) {
	$row++;
	  $latin=nl2br($data[0]);
		if ($lang=="fr") $verna=nl2br($data[1]);
		if ($lang=="en") $verna=nl2br($data[2]);
		if ($lang=="ar") $verna=nl2br($data[3]);
		
		if($row==0){		
		$lectio.="
		<tr><td id=\"colgauche\">$latin</td><td id=\"coldroite\">$verna</td>";
			}
			   
		elseif($row==1) {
		$lectio.="
		<tr><td id=\"colgauche\"><center><font color=red>$latin</font></center></td><td id=\"coldroite\"><center><font color=red>$verna</font></center></td>";
		}
		elseif($row==2) {
		$lectio.="
		<tr><td id=\"colgauche\"><center><font color=red><i>$latin</i></font></center></td><td id=\"coldroite\"><center><font color=red><i>$verna</i></font></center></td>";
		}
		else {
		$lectio.="
		<tr><td id=\"colgauche\">$latin</td><td id=\"coldroite\">$verna</td>";	
		}
	}	
 
	@fclose ($fp);
	return $lectio;
}

 	
function martyrologe2() {
	
	$dateYmd=$GLOBALS['dateYmd'];
	$liturgia=$GLOBALS['liturgia'];
	//if(!$dateYmd) $dateYmd=date("Ymd");
	$date_ts=date2datets($dateYmd);
	//$date_ts=$GLOBALS['date_ts'];
	//$dateYmd=$_GET['date'];
		
	//if(!$date_ts) {
	//	$dateYmd=$_GET['date'];
	
	//}
	//if($date_ts=="") $date_ts=time();
	//print " ---".$date_ts;
	//print " ---".time();
	//$xml=simplexml_load_file("wp-content/plugins/liturgia/LH/calendrier/".date('Y-m-d',$date_ts).".xml");
	//print "wp-content/plugins/liturgia/LH/calendrier/".date('Y-m-d',$date_ts).".xml";
	$martyrologe=$liturgia->martyrologe->para;	
	$mm=count($liturgia->martyrologe->para);
	
	$result="<div class=\"txt\"><b>Martyrologe</b>";
	for ($i=0;$i<$mm;$i++){
		$result.="<br />".$liturgia->martyrologe->para[$i];
	}
	return $result."</div>";
}
/*
function get_site_url(){
	return;
}
*/
function modificationes($messe,$lang) {
           $option=$_GET['option'];
$row = 0;
$ref=no_accent($ref);
$ref="sources/".$ref.".csv";
$fp = fopen ($ref,"r","1");
	while ($data = @fgetcsv ($fp, 1000, ";")) {
	    $id=$data[0];
	    //$messe[$id];
	    if($lang=="fr")$verna=$data[4];
	    if($lang=="en")$verna=$data[5];
	    if($lang=="ar")$verna=$data[6];
		}    
	   
	    $modificationes.="
		<div class=\"gauche\">$latin".affiche_editeur($ref,"lat")."</div>
		<div class=\"droite\">$verna".affiche_editeur($ref,$lang)."</div>";	
		$row++;	

	@fclose ($fp);
	return $modificationes;
}


function recitatif  ($ref,$lang) {
  $option=$_GET['option'];
$row = 0;
$ref=no_accent($ref);
$ref="sources/".$ref.".csv";
$fp = @fopen ($ref,"r","1");
	while ($data = @fgetcsv ($fp, 1000, ";")) {
	    $latin=$data[0];
	    if($lang=="fr")$verna=$data[1];
	    if($lang=="en")$verna=$data[2];
	    if($lang=="ar")$verna=$data[3];
	    
	   
	    $recitatif.="
		<tr><td class=\"gauche\">$latin".affiche_editeur($ref,"lat")."</td>
		<td class=\"droite\">$verna".affiche_editeur($ref,$lang)."</td></tr>";	
		$row++;	
	}
	@fclose ($fp);
	return $recitatif;
}


function ordinaire_messe($ordinaire,$ref,$lang) {
       $ordi.="
		<tr><td class=\"gauche\">".nl2br($ordinaire[$ref]['lat'])."</td>
		<td class=\"droite\">".nl2br($ordinaire[$ref]['verna'])."</td></tr>";
		return $ordi;
}

function alleluia() { // fonction pour afficher alleluia à la fin du verset d'introduction de l'office
	$alleluia.="
		<tr><td class=\"gauche\"> Allelúia.</td>
		<td class=\"droite\">".get_traduction(" Allelúia.",$lang)."</td></tr>";
	$req="//ordo[@id='RE']/tempus/la";
	$tt=$GLOBALS['liturgia']->xpath($req);
	if($tt[0]=="Tempus Quadragesimae") return null;	
	if($tt[0]=="Tempus passionis") return null;	
	else return $alleluia;
}

function lectiobrevis($ref,$lang) {

$option=$_GET['option'];
$ref=no_accent($ref);
$refL=$GLOBALS['prefixe']."wp-content/plugins/liturgia/LH/TXT/".$ref.".xml" ;
$xml = @simplexml_load_file($refL);// or die("Error: Cannot create object : $refL");
if((!$xml)&&($GLOBALS['edition']=="on")) {
	if($GLOBALS['edition']=="on")$lectio="
	<tr><td class=\"gauche\">".affiche_editeur($GLOBALS['prefixe']."wp-content/plugins/liturgia/LH/TXT/".$ref.".xml","la")."</td>
	<td class=\"droite\"></div></tr>
	";
	return $lectio;
}


if($GLOBALS['edition']=="on") {
	$lectio="<tr><td class=\"gauche\">".affiche_editeur($GLOBALS['prefixe']."wp-content/plugins/liturgia/LH/TXT/".$ref.".xml","la")."</td>
	<td class=\"droite\">".affiche_editeur($GLOBALS['prefixe']."wp-content/plugins/liturgia/LH/TXT/".$ref.".xml",$lang)."</td></tr>";
}
if($xml)	{		 	
	foreach(@$xml->children() as $ligne){
		$o=$ligne->xpath('@id');
		$la=$ligne->xpath('la');
		$ver=$ligne->xpath($lang);
		
		if($o[0]==0) {
			$lectio.= "<tr><td class=\"gauche\"><b><center><font color=red>".$la[0]."</font></b></center></td><td class=\"droite\"><b><center><font color=red>".$ver[0]."</font></b></center></td></tr>";
		}
		else {
			$lectio.= "<tr><td class=\"gauche\">".$la[0]."</td><td class=\"droite\">".$ver[0]."</td></tr>";
		}
	}
}

	return $lectio;
}

function preces($ref,$lang) {
	
	$ref=no_accent($ref);
	
	$preces.="<tr><td class=\"gauche\"><font color=red><center>Preces  </center></font>";
	$preces.="</td>";
	$preces.="<td class=\"droite\">";
	$preces.="<font color=red><center>Prières litaniques. </center></font>";
	$preces.="</td></tr>";
	//$preces.=affiche_texte($ref, $lang);
	$refL=$GLOBALS['prefixe']."wp-content/plugins/liturgia/LH/TXT/".$ref.".xml";
	
     $xml = @simplexml_load_file($refL);
	 

	if($GLOBALS['edition']=="on")$preces.="<tr><td class=\"gauche\">".affiche_editeur($GLOBALS['prefixe']."wp-content/plugins/liturgia/LH/TXT/".$ref.".xml","la")."</td>
			<td class=\"droite\">".affiche_editeur($GLOBALS['prefixe']."wp-content/plugins/liturgia/LH/TXT/".$ref.".xml",$lang)."</td></tr>"; 		
$j=0;
if($xml){
foreach(@$xml->children() as $ligne){
		$la=@$ligne->xpath('la');
		$ver=@$ligne->xpath($lang);
	
	
		if($ligne->style) {
			$preces.= "
			<tr><td class=\"gauche ".$ligne->style."\">".$la[0]."</td>
			<td class=\"droite ".$ligne->style."\">".$ver[0]."</td></tr>";
		}
		else	{
			if($j==1){
				$preces.= "
				<tr><td class=\"gauche\"><i>".$la[0]."</i></td>
				<td class=\"droite\"><i>".$ver[0]."</i></td></tr>";
			}
			elseif($la[0]!=""){
			$preces.= "
			<tr><td class=\"gauche\">".$la[0]."</td>
			<td class=\"droite\">".$ver[0]."</td></tr>";
			}
		}
	$j++;
}	
}
$preces=rougis_verset($preces);

	
	return $preces;

}

function antienne($ref,$lang="fr",$num="") {

$ref=no_accent($ref);

$refL=$GLOBALS['prefixe']."wp-content/plugins/liturgia/LH/TXT/".$ref.".xml" ;

$xml = @simplexml_load_file($refL); // or die("Erreur : ".$refL);


if($xml) $la=@$xml->xpath('//ligne//la');

$expr="//ligne//".$lang;
if($xml)$ver=@$xml->xpath($expr);
if($GLOBALS['edition']=="on"){
	if(!$la) $antienne.="<tr><td class=\"gauche liturgie_italique\">".$ref."</td><td class=\"droite\">...</td></tr>";
	$antienne.="
	<tr><td class=\"gauche\">".affiche_editeur($GLOBALS['prefixe']."wp-content/plugins/liturgia/LH/TXT/".$ref.".xml","la")."</td>
	<td class=\"droite\">".affiche_editeur($GLOBALS['prefixe']."wp-content/plugins/liturgia/LH/TXT/".$ref.".xml",$lang)."</td></tr>
	";
}

	$antienne.="<tr><td class=\"gauche\"><font color=red>Ant. ".$num." </font>".(string)$la['0']."</td>";
	$antienne.="<td class=\"droite\"><font color=red>Ant. ".$num."</font> ".(string)$ver['0']."</td>";
	
	return $antienne;
}

function reponsbref($ref,$lang) {
$option=$_GET['option'];
$row = 0;
$ref=no_accent($ref);
if($debug) print"\r\n ".$ref;
$refL=$GLOBALS['prefixe']."wp-content/plugins/liturgia/LH/TXT/".$ref.".xml" ;
$xml = @simplexml_load_file($refL) ; 
if(!$xml) {
	
	if($GLOBALS['edition']=="on")$reponsbref="
	<tr><td class=\"gauche\">".$refL.affiche_editeur($refL,"la")."</td>
	<td class=\"droite\">".$refL.affiche_editeur($refL,$lang)."</td></tr>
	";
	return $reponsbref;
}


$ccc=@$xml->xpath('//ligne');

$reponsbref="
   	<tr><td class=\"gauche\"><font color=red><center><b>Responsorium Breve</b></font></td>
	<td class=\"droite\"><font color=red><center><b>".get_traduction("Responsorium Breve",$lang)."</b></center></font></td></tr>
	<tr><td class=\"gauche\">".affiche_editeur($GLOBALS['prefixe']."wp-content/plugins/liturgia/LH/TXT/".$ref.".xml","la")."</td>
	<td class=\"droite\">".affiche_editeur($GLOBALS['prefixe']."wp-content/plugins/liturgia/LH/TXT/".$ref.".xml",$lang)."</td></tr>
	";
	//for($v=0;$la[$v];$v++) {
		$reponsbref.="<tr><td class=\"gauche\">".nl2br($ccc[0]->la)."</td>";
		$reponsbref.="<td class=\"droite\">".nl2br($ccc[0]->fr)."</td></tr>";
		
	//}
	
	return rougis_verset($reponsbref);
}

function verset($ref,$lang) {
$option=$GLOBALS['option'];
if($lang=="") $lang="fr";
$row = 0;
$ref=no_accent($ref);
$refL=$GLOBALS['prefixe']."wp-content/plugins/liturgia/LH/TXT/".$ref.".xml" ;
$xml = @simplexml_load_file($refL) ; 
if((!$xml)&&($GLOBALS['edition']=="on")) {
	$verset="<tr><td class=\"gauche\"><a href=\"javascript:affichage_popup('http://localhost/?task=creation&lang=la&comment=wp-content/plugins/liturgia/LH/TXT/".$ref.".xml','affichage_popup');\">".$ref."</a></td>";
	$verset.="<td class=\"droite\"></td></tr>";
	return $verset;
}



$verset="
	<tr><td class=\"gauche\">".affiche_editeur($GLOBALS['prefixe']."wp-content/plugins/liturgia/LH/TXT/".$ref.".xml","la")."</td>
	<td class=\"droite\">".affiche_editeur($GLOBALS['prefixe']."wp-content/plugins/liturgia/LH/TXT/".$ref.".xml",$lang)."</td></tr>
	";
foreach(@$xml->children() as $ligne){
	$o=@$ligne->xpath('@id');
	$la=@$ligne->xpath('la');
	$ver=@$ligne->xpath($lang);

	
	
	$verset.= "<tr><td class=\"gauche\">".$la[0]."</td><td class=\"droite\">".$ver[0]."</td></tr>";
	}
	return $verset;
}



function hymne($ref,$lang) {
$row = 0;

$refL=$GLOBALS['prefixe']."wp-content/plugins/liturgia/LH/TXT/".$ref.".xml" ;
$xml = @simplexml_load_file($refL) ;//or die ("erreur : ".$refL);
if($GLOBALS['edition']=="on"){
	if(!$la) $hymne.="<tr><td class=\"gauche liturgie_italique\">".$ref."</td><td class=\"droite\">...</td></tr>";
	$hymne.="
	<tr><td class=\"gauche\">".affiche_editeur($GLOBALS['prefixe']."wp-content/plugins/liturgia/LH/TXT/".$ref.".xml","la")."</td>
	<td class=\"droite\">".affiche_editeur($GLOBALS['prefixe']."wp-content/plugins/liturgia/LH/TXT/".$ref.".xml",$lang)."</td></tr>
	";
}
$hymne="
	<tr><td class=\"gauche\">".affiche_editeur($GLOBALS['prefixe']."wp-content/plugins/liturgia/LH/TXT/".$ref.".xml","la")."</td>
	<td class=\"droite\">".affiche_editeur($GLOBALS['prefixe']."wp-content/plugins/liturgia/LH/TXT/".$ref.".xml",$lang)."</td></tr>
	";
	//if($xml){
	foreach(@$xml->children() as $ligne){
	$o=@$ligne->xpath('@id');
	$la=@$ligne->xpath('la');
	$ver=@$ligne->xpath($lang);

	if($o[0]==0) {
	$hymne.= "<tr><td class=\"gauche\"><b><center><font color=red>".$la[0]."</font></b></center></td><td class=\"droite\"><b><center><font color=red>".$ver[0]."</font></b></center></td></tr>";
	}
	elseif($la[0]=="") $hymne.= "<tr><td class=\"gauche\">&nbsp;</td><td class=\"droite\">&nbsp;</td>";
	elseif($o[0]==1) $hymne.= "<tr><td class=\"gauche lettrineH\"><center>".$la[0]."</center></td><td class=\"droite lettrineH\"><center>".$ver[0]."</center></td></tr>";
	
	else	$hymne.= "<tr><td class=\"gauche\"><center>".$la[0]."</center></td><td class=\"droite\"><center>".$ver[0]."</center></td></tr>";
	}

	return $hymne;
}


function antienne_messe($ref,$lang) {
$option=$_GET['option'];
if(!$lang) $lang=$GLOBALS['lang'];
if(!$lang) $lang="fr";
$ref=trim($ref);
$refL=$GLOBALS['prefixe']."wp-content/plugins/liturgia/LH/TXT/".$ref.".xml" ;

if($_GET['debug']==1) $antiennemesse.="
<tr><td class=\"gauche\">".$ref."</td>
<td class=\"droite\">".$ref."</td></tr>
";
$xml = @simplexml_load_file($refL); // or die("Error: Cannot create object : $refL");
if(!$xml) {
	
	if($GLOBALS['edition']=="on")$antiennemesse="
	<tr><td class=\"gauche\">".$refL.affiche_editeur($refL,"la")."</td>
	<td class=\"droite\">".$refL.affiche_editeur($refL,$lang)."</td></tr>
	";
	return $antiennemesse;
}

$antiennemesse.="</center>";
$antiennemesse.="
	<tr><td class=\"gauche\">".affiche_editeur($refL,"la")."</td>
	<td class=\"droite\">".affiche_editeur($refL,$lang)."</td></tr>
	";

$o=0;
foreach($xml as $ligne){
	if($o==0)$antiennemesse.= "
	<tr><td class=\"gauche titre-antienne-lat\">".$ligne->la."</td>
	<td class=\"droite titre-antienne-ver\">".get_traduction(trim($ligne->la),$lang)."</td></tr>";
	elseif ($o==1) $antiennemesse.="	<tr><td class=\"gauche liturgie_italique\">".$ligne->la."</td>	<td class=\"droite liturgie_italique\"> </td>";
	else $antiennemesse.="	<tr><td class=\"gauche\">".$ligne->la."</td>	<td class=\"droite\">".$ligne->$lang."</td></tr>";
	$o++;
}
return $antiennemesse;
}

function affiche_editeur($ref,$lang) {
	/* Verification
		1 - des droits de l'utilisateur
		2 - de l'éditabilité du contenu concerné.
	*/
	//if($GLOBALS['edition']=="on") $verif=true;
	
	if ($GLOBALS['edition']=="on") { // contenu éditable et droits de l'utilisateur OK.
		//$editeur=" &nbsp; <A HREF=\"javascript:affichage_popup('http://localhost/?option=edit&affiche=1&task=edit&lang=$lang&ref=".$ref."','affichage_popup');\"><b>éditer</b></A>";
	 	$editeur="
	 	<a href=# onclick=\"editContent('".$lang."','".$ref."');\"><b><i>éditer</i></b></a>
	 	
	 	";
	}	
	return $editeur;	
}


function intitule($date_ts=""){
	
	//print $GLOBALS['dateYmd'];
	if(!$date_ts) $date_ts=date2dateTS($GLOBALS['dateYmd']);
	//print $date_ts;
	$die=array("Dominica","Feria II","Feria III","Feria IV","Feria V","Feria VI","Sabbato");
	$lang=$GLOBALS['lang'];
	$xml = $GLOBALS['liturgia'];
	$req="//ordo[@id='RE']";
	$r=$xml->xpath($req);
	$hebdomada=$r[0]->hebdomada->la;
	//print"intitule(".$GLOBALS['dateYmd'].") -----> priorité = ".$r[0]->priorite." rang = ".$r[0]->rang->la;
	$int="
	<tr><td class=\"gauche\" style=\"font-size: 1.1em;font-weight: 900;text-align:center;\">".$hebdomada."</td>
	<td class=\"droite\" style=\"font-size: 1.1em;font-weight: 900;text-align:center;\">".ucfirst(get_traduction($hebdomada,$lang))."</td></tr>
	";
	
	date_default_timezone_set ( "Europe/Paris" );
	
	$int.="
	<tr><td class=\"gauche\" style=\"font-size: 1.1em;font-weight: 300;text-align:center;\">".$die[date('w',$date_ts)]."</td>
	<td class=\"droite\" style=\"font-size: 1.1em;font-weight: 300;text-align:center;\">".ucfirst(get_traduction($die[date('w',$date_ts)],$lang))."</td></tr>
	";
	$intitule_la=$r[0]->intitule->la;
	
	$priorite=$r[0]->priorite;
	$rang=$r[0]->rang->la;
	if($priorite <12 ) {
		$int.="
		<tr><td class=\"gauche\" style=\"font-size: 1.1em;font-weight: 900;text-align:center;\">".$intitule_la."</td>
		<td class=\"droite\" style=\"font-size: 1.1em;font-weight: 900;text-align:center;\">".ucfirst(get_traduction($intitule_la,$lang))."</td></tr>
		";
		
		$rang_ver=get_traduction($rang, $lang);
		if($rang) $int.="
		<tr><td class=\"gauche\" style=\"font-size: 1.1em;font-weight: 300;text-align:center; font-style:italic\">".$rang."</td>
		<td class=\"droite\" style=\"font-size: 1.1em;font-weight: 300;text-align:center; font-style:italic\">".ucfirst(get_traduction($rang,$lang))."</td></tr>
		";
	
	}
	return $int;
}

function intitule_ord($id){
	$eid=explode("_",$id);
	
	$eeid=$eid[1];
	
	$hebdomada = $eeid[0];
	$jr=$eeid[1];
	$die=array("","Dominica","Feria II","Feria III","Feria IV","Feria V","Feria VI","Sabbato");
	$jour=$die[$jr];
	if($debug) print"\r\n ".$jr." ".$jour;
	
	$lang=$GLOBALS['lang'];
	$hebd=array("","I","II","III","IV");
	
	$int="
	<tr><td class=\"gauche\" style=\"font-size: 1.1em;font-weight: 900;text-align:center;\">Psalterium, hebdomada ".$hebd[$hebdomada]."</td>
	<td class=\"droite\" style=\"font-size: 1.1em;font-weight: 900;text-align:center;\">".get_traduction("Psalterium, hebdomada ",$lang).$hebd[$hebdomada]."</td></tr>
	<tr><td class=\"gauche\" style=\"font-size: 1.1em;font-weight: 900;text-align:center;\">".$jour."</td>
	<td class=\"droite\" style=\"font-size: 1.1em;font-weight: 900;text-align:center;\">".get_traduction($jour,$lang)."</td></tr>";
	
	return $int;
	
}



function intitule_soir(){
	
	$date_ts=$GLOBALS['date_ts'];
	$die=array("Dominica","Feria II","Feria III","Feria IV","Feria V","Feria VI","Sabbato");
	$lang=$GLOBALS['lang'];
	$xml = $GLOBALS['liturgia'];
	$req="//ordo[@id='RE']";
	$r=$xml->xpath($req);
	
	$hebdomada=$r[0]->hebdomada->la;
	date_default_timezone_set ( "fr_FR" );
	
	$int="
	<tr>
	<td class=\"gauche\" style=\"font-size: 1.1em;font-weight: 900;text-align:center;\">".$hebdomada."</td>
	<td class=\"droite\" style=\"font-size: 1.1em;font-weight: 900;text-align:center;\">".ucfirst(get_traduction($hebdomada,$lang))."</td>
	</tr>";
	$int.="
	<tr>
	<td class=\"gauche\" style=\"font-size: 1.1em;font-weight: 300;text-align:center;\">".$die[date('w',$date_ts)]."</td>
	<td class=\"droite\" style=\"font-size: 1.1em;font-weight: 300;text-align:center;\">".ucfirst(get_traduction($die[date('w',$date_ts)],$lang))."</td>
	</tr>";
	//$intitule_la=$r[0]->intitule_soir->la;
	$intitule_la=$r[0]->intitule_soir->la;
	$rang=$r[0]->rang_soir->la;
	if($priorite <12 ) {
		$int.="
		<tr>
		<td class=\"gauche\" style=\"font-size: 1.1em;font-weight: 900;text-align:center;\">".$intitule_la."</td>
		<td class=\"droite\" style=\"font-size: 1.1em;font-weight: 900;text-align:center;\">".get_traduction($intitule_la, $lang)."</td>
		</tr>";
		
		
		if($rang) $int.="
		<tr>
		<td class=\"gauche\" style=\"font-size: 1.1em;font-weight: 300;text-align:center; font-style:italic\">".$rang."</td>
		<td class=\"droite\" style=\"font-size: 1.1em;font-weight: 300;text-align:center; font-style:italic\">".get_traduction($rang, $lang)."</td>
		</tr>";
		if((!$rang)&&($intitule_la)) $int.="
		<tr>
		<td class=\"gauche\" style=\"font-size: 1.1em;font-weight: 300;text-align:center; font-style:italic\">Memoria ad libitum</td>
		<td class=\"droite\" style=\"font-size: 1.1em;font-weight: 300;text-align:center; font-style:italic\">".get_traduction("Memoria facultativa", $lang)."</td>
		</tr>";
	}
	return $int;
}

function lecture_messe($ref,$lang) {
	if(!$lang) $lang=$GLOBALS['lang'];
	if(!$lang) $lang="fr";
     $refL=$GLOBALS['prefixe']."wp-content/plugins/liturgia/LH/TXT/".$ref.".xml" ;
	
     $xml = @simplexml_load_file($refL);// or die("<br>Error: Cannot create object : <a href=\"$refL\">$refL</a>");
	 
	 
     if(!$xml) {
	 	
	 	if($GLOBALS['edition']=="on") $LM.="<tr><td class=\"gauche\">".affiche_editeur($refL,"la")."</td>
	<td class=\"droite\">".affiche_editeur($refL,$lang)."</td>";
	 	$LM.="</td>
	 	<td class=\"droite\">&nbsp;</td>
	   <tr><td class=\"gauche\">Verbum Domini. R/. Deo gratias.</td>";
	   
	   $LM.="<td class=\"droite\">".get_traduction("Verbum Domini. R/. Deo gratias.",$lang)."</td></tr>";
	   
    return $LM;
	 	 }
	 
	$LM.="
	<tr><td class=\"gauche\">".affiche_editeur($refL,"la")."</td>
	<td class=\"droite\">".affiche_editeur($refL,$lang)."</td>
	";
		
foreach(@$xml->children() as $ligne){
		$o=@$ligne->xpath('@id');
		$la=@$ligne->xpath('la');
		$ver=@$ligne->xpath($lang);
	
		if($o[0]==0) {
		$LM.= "
		<tr><td class=\"gauche liturgie_italique\">".$la[0]."</td>
		<td class=\"droite liturgie_italique\"><i>".$ver[0]."</i></td></tr>";
		}
		else	{
		$LM.= "
		<tr><td class=\"gauche\">".$la[0]."</td>
		<td class=\"droite\">".$ver[0]."</td></tr>";
		}
	}

     $LM .="
	   <tr><td class=\"gauche\">Verbum Domini. R/. Deo gratias.</td>";
	   if ($lang=="fr") $LM.="<td class=\"droite\">Parole du Seigneur. R/. Rendons grâces à Dieu.</td></tr>";
	   if ($lang=="en") $LM.="<td class=\"droite\">Word of the Lord. R/. Thanks be to God.</td></tr>";
    return $LM;
}

function leconsVigiles($ref,$lang){
	$refL="wp-content/plugins/liturgia/LH/TXT/".$ref.".xml" ;
	//print $refL."<br/>";
	$xml = @simplexml_load_file($refL);
	//print_r($xml);
	if($ref) $result="
	<tr><td class=\"gauche\">".affiche_editeur($refL,"la")."</td>
	<td class=\"droite\">".affiche_editeur($refL,$lang)."</td></tr>
	";
	if($xml) foreach($xml as $ligne){
		//print $ligne->la;
		if(stristr ( $ligne->la , "nocturno" ) )
			$result.="
			<tr><td class=\"gauche titre-antienne-lat\">".$ligne->la."</td>
			<td class=\"droite titre-antienne-ver\">".$ligne->$lang."</td></tr>";
		elseif(stristr ( $ligne->la , "Lectio " ) )
			$result.="
			<tr><td class=\"gauche liturgie_sous_titre\">".$ligne->la."</td>
			<td class=\"droite liturgie_sous_titre\">".$ligne->$lang."</td></tr>";
		
		
		else $result.="
		<tr><td class=\"gauche\">".$ligne->la."</td>
		<td class=\"droite\">".$ligne->$lang."</td></tr>
		";
	}
	return $result;
}

function lecture_vigiles($ref,$lang,$ordre) {
$option=$_GET['option'];

$row = 0;
$ref=no_accent($ref);
$refL=$GLOBALS['prefixe']."wp-content/plugins/liturgia/LH/TXT/OSB_Vigiles".$ref.".xml" ;


     $refL="/TXT/OSB_Vigiles/".$ref.".xml";
	 
     $xml = @simplexml_load_file($refL);
	 
    
	 
	$lecture_vigiles.="
	<tr><td class=\"gauche\">Lectio $ordre ".affiche_editeur($refL,"la")."</td>
	<td class=\"droite\">Lecture $ordre ".affiche_editeur($refL,$lang)."</td></tr>
	";
		
foreach(@$xml->children() as $ligne){
		$o=@$ligne->xpath('@id');
		$la=@$ligne->xpath('la');
		$ver=@$ligne->xpath($lang);
		if($o[0]==0) {
		$lecture_vigiles.= "
		<tr><td class=\"gauche\"><i>".$la[0]."</i></td>
		<td class=\"droite\"><i>".$ver[0]."</i></td>";
		}
		else	{
		$lecture_vigiles.= "
		<tr><td class=\"gauche\">".$la[0]."</td>
		<td class=\"droite\">".$ver[0]."</td></tr>";
		}
	}

	return $lecture_vigiles;
}

function lecture_OL($ref,$lang,$ordre) {
$option=$_GET['option'];

$row = 0;
$ref=no_accent($ref);
$refL="TXT/".$ref.".xml";
$refL=$GLOBALS['prefixe']."wp-content/plugins/liturgia/LH/TXT/".$ref.".xml" ;
     
	
     $xml = @simplexml_load_file($refL);
	 
     if(!$xml) {
	 	$lecture_OL ="<tr><td class=\"gauche\" style=\"font-style:oblique;\"><a href=\"javascript:affichage_popup('http://localhost/?task=creation&lang=la&comment=".$refL."','affichage_popup');\">$ref</a></td><td class=\"droite\">&nbsp;</td></tr>";   
    return $lecture_OL;
	 }
	 
	$lecture_OL.="
	<tr><td class=\"gauche\">Lectio $ordre ".affiche_editeur($refL,"la")."</td>
	<td class=\"droite\">Lecture $ordre ".affiche_editeur($refL,$lang)."</td>
	";
		
foreach(@$xml->children() as $ligne){
		$o=@$ligne->xpath('@id');
		$la=@$ligne->xpath('la');
		$ver=@$ligne->xpath($lang);
	
		if($o[0]==0) {
		$lecture_OL.= "
		<tr><td class=\"gauche\"><i>".$la[0]."</i></td>
		<td class=\"droite\"><i>".$ver[0]."</i></td></tr>";
		}
		else	{
		$lecture_OL.= "
		<tr><td class=\"gauche\">".$la[0]."</td>
		<td class=\"droite\">".$ver[0]."</td></tr>";
		}
	}

	return $lecture_OL;
}



function creation_accents($texte) {
	
	$voyelles_sans_accent = array("+","'a", "'i", "'o", "'u", "a'e", "'y", "'A", "'I", "'O", "'U", "A'E","'Y");
	$voyelles_avec_accent = array("†","á", "í", "ó", "ú", "ǽ", "ý", "Á", "Í", "Ó", "Ú", "Ǽ","Ý");
	$texte_final = str_replace($voyelles_sans_accent, $voyelles_avec_accent, $texte);
	return $texte_final;
}

function repons_vigiles($ref,$lang,$ordre) {
$option=$_GET['option'];
$row = 0;
$ref=no_accent($ref);
$refL=$GLOBALS['prefixe']."wp-content/plugins/liturgia/LH/TXT/OSB_Vigiles".$ref.".xml" ;
$xml = @simplexml_load_file($refL);
	  $repons_vigiles="
		<tr><td class=\"gauche\" align=\"center\" ><font color=red>Responsorium $ordre</font> ".affiche_editeur($refL,'lat')."</td>
		<td class=\"droite\" align=\"center\"><font color=red>Répons $ordre</font> ".affiche_editeur($refL,$lang)."</td>";
    if(!$xml) {
	 	$repons_vigiles ="<tr><td class=\"gauche\" style=\"font-style:oblique;\"><a href=\"javascript:affichage_popup('http:/locahost/?task=creation&lang=la&comment=".$refL."','affichage_popup');\">$ref</a></td><td class=\"droite\">&nbsp;</td></tr>";   
    return $repons_vigiles;
	 }   
foreach(@$xml->children() as $ligne){
		$o=@$ligne->xpath('@id');
		$la=@$ligne->xpath('la');
		$ver=@$ligne->xpath($lang);
		$repons_vigiles.= "
		<tr><td class=\"gauche\">".$la[0]."</td>
		<td class=\"droite\">".$ver[0]."</td></tr>";
		}	 
	return $repons_vigiles;
}



function repons($ref,$lang) {
$option=$_GET['option'];

$row = 0;
$ref=no_accent($ref);
$refL=$GLOBALS['prefixe']."wp-content/plugins/liturgia/LH/TXT/".$ref.".xml" ;
$xml = @simplexml_load_file($refL) ; //or die ("erreur : "."wp-content/plugins../".$ref);
if((!$xml)&&($GLOBALS['edition']=="on")) {
	$verset="<tr><td class=\"gauche\">".affiche_editeur($refL)."</td>";
	$verset.="<td class=\"droite\">".affiche_editeur($refL)."</td></tr>";
	return $verset;
}

$la=@$xml->xpath('//ligne/la');
$expr="//ligne/".$lang;
$ver=@$xml->xpath($expr);

$verset="
	<tr><td class=\"gauche\">".affiche_editeur($ref,"la")."</td>
	<td class=\"droite\">".affiche_editeur($ref,$lang)."</td></tr>
	";
	$verset.="
		<tr>
		<td class=\"droite\">&nbsp;</td></tr>";
	for($v=0;$la[$v];$v++) {
		$verset.="<tr><td class=\"gauche\">".nl2br($la[$v])."</td>";
		$verset.="<td class=\"droite\">".nl2br($ver[$v])."</td></tr>";
	}
	return $verset;
}


function evangile($ref,$lang) {
	if(!$lang) $lang=$GLOBALS['lang'];
	if(!$lang) $lang="fr";
	$LM="<tr><td class=\"gauche titre-antienne-lat\">Evangelium</td>
	<td class=\"droite titre-antienne-ver\" >".get_traduction("Evangelium",$lang)."</td></tr>
	";
     $refL=$GLOBALS['prefixe']."wp-content/plugins/liturgia/LH/TXT/".$ref.".xml";
     $refL=$GLOBALS['prefixe']."wp-content/plugins/liturgia/LH/TXT/".$ref.".xml" ;
	 $xml = @simplexml_load_file($refL);
	 
if(!$xml) {
	 	$LM .="
	 	<tr><td class=\"gauche\" style=\"font-style:oblique;\">";
	 	if($GLOBALS['edition']=="on") $LM.=affiche_editeur($refL,"la");
	 	$LM.="</td>
	 	<td class=\"droite\">".affiche_editeur($refL,$lang)."</td>
	   <tr><td class=\"gauche\">Verbum Domini. R/. Laus tibi Christe.</tdv>";
	   if ($lang=="fr") $LM.="<td class=\"droite\">Parole du Seigneur. R/. Louange à Toi ô Christ.</td></tr>";
	   if ($lang=="en") $LM.="<td class=\"droite\">Word of the Lord. R/. Praise be to thee, Christ.</td></tr>";
    return $LM;
	 	 }
	 
	

	$LM.="
	<tr><td class=\"gauche\">".affiche_editeur($refL,"la")."</td>
	<td class=\"droite\">".affiche_editeur($refL,$lang)."</td></tr>
	";
		
foreach(@$xml->children() as $ligne){
		$o=@$ligne->xpath('@id');
		$la=@$ligne->xpath('la');
		$ver=@$ligne->xpath($lang);
	
		if($o[0]==0) {
		$LM.= "
		<tr><td class=\"gauche\" liturgie_italique\">".$la[0]."</td>
		<td class=\"droite liturgie_italique\">".$ver[0]."</td></td>";
		}
		else	{
		$LM.= "
		<tr><td class=\"gauche\">".$la[0]."</td>
		<td class=\"droite\">".$ver[0]."</td></tr>";
		}
	}

     $LM .="
	   <tr><td class=\"gauche\">Verbum Domini. R/. Laus tibi, Christe.</td>";
	   if ($lang=="fr") $LM.="<td class=\"droite\">Parole du Seigneur. R/. Louange à Toi, ô Christ.</td></tr>";
	   if ($lang=="en") $LM.="<td class=\"droite\">Word of the Lord. R/. Praise be to thee, Christ.</td></tr>";
    return $LM;
}


function psaume($ref,$lang) {
$row = 0;

$refL="/TXT/".$ref.".xml";
$refL=$GLOBALS['prefixe']."wp-content/plugins/liturgia/LH/TXT/".$ref.".xml" ;
$xml = @simplexml_load_file($refL); //or die("Error: Cannot create object : $refL");

if(!$xml) {
	if($GLOBALS['edition']=="on")$psaume="
	<tr><td class=\"gauche\"><a href=\"javascript:affichage_popup('http://localhost/?task=creation&lang=la&comment=".$GLOBALS['prefixe']."wp-content/plugins/liturgia/LH/TXT/".$ref.".xml','affichage_popup');\">".$ref."</a></td>
	<td class=\"droite\"></td></tr>
	";
	return $psaume;
}
if($debug) print"<br>OPEN : ".$refL;

$psaume="
	<tr><td class=\"gauche\">".affiche_editeur($GLOBALS['prefixe']."wp-content/plugins/liturgia/LH/TXT/".$ref.".xml","la")."</td>
	<td class=\"droite\">".affiche_editeur($GLOBALS['prefixe']."wp-content/plugins/liturgia/LH/TXT/".$ref.".xml",$lang)."</td></tr>
	";
		
	foreach($xml->children() as $ligne){
	$o=$ligne->xpath('@id');
	$la=$ligne->xpath('la');
	$ver=$ligne->xpath($lang);
	if($o[0]==0) {
	if(($la[0])!="") $psaume.= "<tr><td class=\"gauche\"><b><center><font color=red>".$la[0]."</font></b></center></td><td class=\"droite\"><b><center><font color=red>".$ver[0]."</font></b></center></td></tr>";
	}
	elseif 	($o[0]==1) {
	if($la[0]!="") $psaume.= "<tr><td class=\"gauche\"><center><font color=red>".$la[0]."</font></center></td><td class=\"droite\"><center><font color=red>".$ver[0]."</font></center></td></tr>";
	}
	
	elseif 	($o[0]==2) {
	if($la[0]!="") $psaume.= "<tr><td class=\"gauche\"><center><i>".$la[0]."</i></center></td><td class=\"droite\"><center><i>".$ver[0]."</i></center></td></tr>";
	}
	
	elseif 	($o[0]==3) {
	if($la[0]!="") $psaume.= "<tr><td class=\"gauche\"><center><font color=red><b>".$la[0]."</b></font></td><td class=\"droite\"><center><font color=red><b>".$ver[0]."</b></font></td></tr>";
	}
	elseif 	($o[0]==4) {
	$psaume.= "<tr><td class=\"gauche lettrine\">".$la[0]."</td><td class=\"droite lettrine\">".$ver[0]."</td></tr>";
	}	
	else  {
	$psaume.= "<tr><td class=\"gauche\">".$la[0]."</td><td class=\"droite\">".$ver[0]."</td></tr>";
	}
}



	if($ref!="AT41") $psaume.=doxologie($lang);
	
	return $psaume;
}
function doxologie($lang) {
$doxologie="";
	$xml = simplexml_load_file($GLOBALS['prefixe']."wp-content/plugins/liturgia/LH/TXT/ps_doxologie.xml");// or die("Error: Cannot create object : $refL");
	foreach(@$xml->children() as $ligne){
		$la=$ligne->xpath('la');
		$ver=$ligne->xpath($lang);
		$doxologie.= "<tr><td class=\"gauche\">".$la[0]."</td><td class=\"droite\">".$ver[0]."</td></tr>";
	
	}
	return $doxologie;
}
/*
function initium($mp3,$lang) {
	$initium.="
	<div class=\"gauche\">".mp3Player($mp3)."&nbsp;</div>
	<div class=\"droite\">&nbsp;</div>";
	$fp = fopen ("sources/initium.csv","r","1");
	while ($data = @fgetcsv ($fp, 1000, ";")) {
		$latin=$data[0];
		if ($lang=="fr") $verna=$data[1];
		if ($lang=="en") $verna=$data[2];
		if ($lang=="ar") $verna="<div align=\"right\">$data[3]</div>";
		
		if($latin!="") $initium.="
		<div class=\"gauche\">$latin</div>
		<div class=\"droite\">$verna</div>";
  	}
	@fclose ($fp);
	
	return $initium;
}
*/
function utf($string) {
	/*
setlocale(LC_ALL, 'fr_FR');
$string = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $string);	
$string = preg_replace('#[^A-Za-z0-9éèêëÉúùûíîïáàâæóôœçý]+#', '', $string);

$string1=str_replace("é", "&eacute;",$string);
$string2= str_replace("è", "&egrave;",$string1);
$string3= str_replace("ê", "&ecirc;",$string2);
$string4= str_replace("ú", "&uacute;",$string3);
$string5= str_replace("ù", "&ugrave;",$string4);
$string6= str_replace("û", "&ucirc;",$string5);
$string7= str_replace("í", "&iacute;",$string6);
$string8= str_replace("î", "&icirc;",$string7);
$string9= str_replace("ï", "&iuml;",$string8);
$string10= str_replace("á", "&aacute;",$string9);
$string11= str_replace("à", "&agrave;",$string10);
$string12= str_replace("â", "&acirc;",$string11);
$string13= str_replace("æ", "&aelig;",$string12);
$string14= str_replace("ó", "&oacute;",$string13);
$string15= str_replace("ô", "&ocirc;",$string14);
//$string16= str_replace("", "&oelig;",$string15);
$string17= str_replace(" ", "&nbsp;",$string15);
//$string18= str_replace("", "&#146;",$string17);
$string19= str_replace("«", "&#171;",$string17);
$string20= str_replace("»", "&#187;",$string19);
$string21= str_replace("ç", "&ccedil;",$string20);
$string22= str_replace("ë", "&euml;",$string21);
$string23= str_replace("-", "-",$string22);
$string24= str_replace("ý", "&yacute;",$string23);
$string25= str_replace("°", "e",$string24);
//$string26= str_replace("Æ", "&Aelig;",$string25);
//$string26= str_replace("", "&#8224;",$string25);
$string27= str_replace("É", "&Eacute;",$string25);
//$string28= str_replace("", "&#151;",$string27);

$string29= str_replace("œ", "&#x153;",$string27);
	 
return $string29;


$from = mb_detect_encoding($string);
if ($from != 'UTF-8') {
$string = mb_convert_encoding($string, 'UTF-8', $from);
}
*/
return $string;
}

function toUTF8($string){
$from = mb_detect_encoding($string);
if ($from != 'UTF-8') {
$string = mb_convert_encoding($string, 'UTF-8', $from);
}
}

function pater($lang) {
	$row=0;	
	$xml=simplexml_load_file($GLOBALS['prefixe']."wp-content/plugins/liturgia/LH/TXT/PATER.xml"); 
	$la=@$xml->xpath('//ligne//la');
	$expr="//ligne//".$lang;
	$ver=$xml->xpath($expr);
	$pater="
		<tr><td class=\"gauche\">".mp3Player($mp3)."</td>
		<td class=\"droite\">&nbsp;</td></tr>";
	$v=0;
	while($la[$v]) {
		$pater.="<tr><td class=\"gauche\">".$la[$v]."</td>";
		$pater.="<td class=\"droite\">".$ver[$v]."</td></tr>";
		$v++;
	}
	return $pater;	
}
function renvoi ($mp3,$lang) {
	$fp = fopen ("sources/renvoi.csv","r","1");
	$r=0;
	while ($data = @fgetcsv ($fp, 1000, ";")) {
		$latin=$data[0];
		if ($lang=="fr") $verna="$data[1]";
		if ($lang=="en") $verna=$data[2];
		if ($lang=="ar") $verna="<td align=\"right\">$data[3]<td>";
		if($r==9) $renvoi.="
	<tr><td class=\"gauche\">".mp3Player($mp3)."</td>";
	$renvoi.="<td class=\"droite\">&nbsp;</td></tr>";
		if($latin!="") $renvoi.="
		<tr><td class=\"gauche\">$l
		
		  atin</td>
		<td class=\"droite\">$verna</td></tr>";
  	$r++;
	}
	@fclose ($fp);
	
	return $renvoi;
}

function no_accent($str_accent) {
   $pattern = Array("/ /","/Æ/","/é/", "/è/", "/ê/", "/ç/", "/æ/","/à/", "/á/", "/í/", "/ï/", "/ù/", "/ó/","/ú/","/,/","/__/","/:/");
   // notez bien les / avant et après les caractères
   $rep_pat = Array("_","A","e", "e", "e", "c", "ae","a", "a", "i", "i", "u", "o", "u","_","_",null,null);
   $str_noacc = preg_replace($pattern, $rep_pat, $str_accent);
   $str_noacc=trim($str_noacc,"_");
   $str_noacc = preg_replace($pattern, $rep_pat, $str_noacc);
   $str_noacc = str_replace("*", null, $str_noacc);
   $str_noacc = str_replace("?", null, $str_noacc);
   $str_noacc=trim($str_noacc);
   $str_noacc=str_replace("__", "_", $str_noacc);
   return $str_noacc;
}


function ref_player($office,$piece,$date,$tableau) {
	$dj="matin"; if ($office=="vepres") $dj="soir";
	$anno=substr($date,0,4);
	$mense=substr($date,4,2);
	$die=substr($date,6,2);
	
	$tempus=$tableau[$dj]['temps'];
	switch ($tempus) {
		case "Tempus Adventus":
		$ref_player="HG/TO_Noel/4-Avent";
		if (($mense=="12")&&($die<17)) {
			$ref_player.="/1- Adv jusque 16dec";	
		}
		if (($mense=="12")&&($die>16)) {
			$ref_player.="/2- Adv a partir 17dec";
		}
		break;
		
		case "Tempus Nativitatis":
		$ref_player="HG/TO_Noel";	
		break;

		case "Tempus per annum":
		$ref_player="HG/TO_Noel";	
		break;

		case "Tempus Quadragesimae":
		$ref_player="HG/Careme_Temps-pascal/1-Careme";	
		break;

		case "Tempus Paschale":
		$ref_player="HG/Careme_Temps-pascal/2-Temps pascal";	
		break;	
	}		
	return $ref_player;
}
function mp3Playerjs($ref) {
	$playerjs=<<<END

END;
return $playerjs;
}
function mp3Player ($ref) {
	if($ref=="") return null;
$player= <<< END
<embed src="$ref" width="50" height="40" autostart="false" loop="false"></embed>
</object>
END;

return $player;	
}


function oraison_messe($ref,$lang) {

//$option=$_GET['option'];
//$ref=no_accent($ref);
$refL=$GLOBALS['prefixe']."wp-content/plugins/liturgia/LH/TXT/".$ref.".xml";
//print $refL;
$xml = @simplexml_load_file($refL); // or die("Erreur : ".$refL);
if((!$xml)&&($GLOBALS['edition']=="on")) {
	
	
	if($GLOBALS['edition']=="on") $oratio.="<tr><td class=\"gauche\">".affiche_editeur($refL,"la")."</td>
	<td class=\"droite\">".affiche_editeur($refL,$lang)."</td></tr>";
	return $oratio;
}
$oratio="<tr><td class=\"gauche\">".affiche_editeur($GLOBALS['prefixe']."wp-content/plugins/liturgia/LH/TXT/".$ref.".xml","la")."</td>
	<td class=\"droite\">".affiche_editeur($GLOBALS['prefixe']."wp-content/plugins/liturgia/LH/TXT/".$ref.".xml",$lang)."</td></tr>
	";
	//print_r($xml);
foreach ($xml as $ligne){
	if($ligne->la=="Collecta") {
		$type="collecte";
		$oratio.="<tr><td class=\"gauche titre-antienne-lat\">Collecta</td>";
		$oratio.="<td class=\"droite titre-antienne-ver\">".get_traduction("Collecta",$lang)."</td></tr>";
		$oratio.="<tr><td class=\"gauche\">Orémus.</td>";
		$oratio.="<td class=\"droite\">".get_traduction("Orémus.",$lang)."</td></tr>";
		}
	if($ligne->la=="Super oblata"){
		$type="Super oblata";
		$oratio.="<tr><td class=\"gauche titre-antienne-lat\">Super oblata</td>";
		$oratio.="<td class=\"droite titre-antienne-ver\">".get_traduction("Super oblata",$lang)."</td></tr>";
	}
	if($ligne->la=="Post communionem"){
		$type="Post communionem";
		$oratio.="<tr><td class=\"gauche titre-antienne-lat\">Post communionem</td>";
		$oratio.="<td class=\"droite titre-antienne-ver\">".get_traduction("Post communionem",$lang)."</td></tr>";
		$oratio.="<tr><td class=\"gauche\">Orémus.</td>";
		$oratio.="<td class=\"droite\">".get_traduction("Orémus.",$lang)."</td></tr>";
	}
	//else {
		
		if($type=="collecte"){
			if (($ligne->la)&&(substr($ligne->la,-14))==" Per Dóminum.") {
				$ligne->la=str_replace(" Per Dóminum.", " Per Dóminum nostrum Iesum Christum, Fílium tuum, qui tecum vivit et regnat in unitáte Spíritus Sancti, Deus, per ómnia sæcula sæculórum.",$ligne->la);
				$ligne->$lang.=get_traduction(" Per Dóminum nostrum Iesum Christum, Fílium tuum, qui tecum vivit et regnat in unitáte Spíritus Sancti, Deus, per ómnia sæcula sæculórum.", $lang);
			}
     
			if ((substr($ligne->la,-11))==" Qui tecum.") {
				$ligne->la=str_replace(" Qui tecum.", " Qui tecum vivit et regnat in unitáte Spíritus Sancti, Deus, per ómnia sæcula sæculórum.",$ligne->la);
				$ligne->$lang.=get_traduction(" Qui tecum vivit et regnat in unitáte Spíritus Sancti, Deus, per ómnia sæcula sæculórum.", $lang);
			}

			if ((substr($ligne->la,-11))==" Qui vivis.") {
				$ligne->la=str_replace(" Qui vivis.", " Qui vivis et regnas cum Deo Patre in unitáte Spíritus Sancti, Deus, per ómnia sæcula sæculórum.",$ligne->la);
				$ligne->$lang.=get_traduction(" Qui vivis et regnas cum Deo Patre in unitáte Spíritus Sancti, Deus, per ómnia sæcula sæculórum.", $lang);
			}
		}
		
		if ((substr($ligne->la,-14))==" Per Dóminum.") {
				$ligne->la=str_replace(" Per Dóminum.", " Per Christum Dóminum nostrum.",$ligne->la);
				$ligne->$lang.=get_traduction(" Per Christum Dóminum nostrum.", $lang);
			}
			
		if ((substr($ligne->la,-15))==" Per Christum.") {
				$ligne->la=str_replace(" Per Christum.", " Per Christum Dóminum nostrum.",$ligne->la);
				$ligne->$lang.=get_traduction(" Per Christum Dóminum nostrum.", $lang);
			}
		
		if ((substr($ligne->la,-11))==" Qui vivit.") {
				$ligne->la=str_replace(" Qui vivit.", " Qui vivit et regnat in sæcula sæculórum.",$ligne->la);
				$ligne->$lang.=get_traduction(" Qui vivit et regnat in sæcula sæculórum.", $lang);
			}
		 
		if ((substr($ligne->la,-11))==" Qui tecum.") {
				$ligne->la=str_replace(" Qui tecum.", " Qui vivit et regnat in sæcula sæculórum.",$ligne->la);
				$ligne->$lang.=get_traduction(" Qui vivit et regnat in sæcula sæculórum.", $lang);
			}

		if ((substr($ligne->la,-11))==" Qui vivis.") {
				$ligne->la=str_replace(" Qui vivis.", " Qui vivis et regnas in sæcula sæculórum.",$ligne->la);
				$ligne->$lang.=get_traduction(" Qui vivis et regnas in sæcula sæculórum.", $lang);
			}
		}
		
		$oratio.="<tr><td class=\"gauche\">".$ligne->la."</td>";
		$oratio.="<td class=\"droite\">".$ligne->$lang."</td></tr>";
	
//}
	
	return $oratio;

}



function oratio($ref,$lang) {

//$option=$_GET['option'];
//$ref=no_accent($ref);
$refL=$GLOBALS['prefixe']."wp-content/plugins/liturgia/LH/TXT/".$ref.".xml";
//print $refL;
$xml = @simplexml_load_file($refL); // or die("Erreur : ".$refL);
if((!$xml)&&($GLOBALS['edition']=="on")) {
	
	
	if($GLOBALS['edition']=="on") $oratio.="<tr><td class=\"gauche\">".affiche_editeur($refL,"la")."</td>
	<td class=\"droite\">".affiche_editeur($refL,$lang)."</td></tr>";
	return $oratio;
}

if($xml) $la=@$xml->xpath('//ligne//la');
if($xml) $ver=@$xml->xpath('//ligne//'.$lang); 
$oratio="<tr><td class=\"gauche\">".affiche_editeur($GLOBALS['prefixe']."wp-content/plugins/liturgia/LH/TXT/".$ref.".xml","la")."</td>
	<td class=\"droite\">".affiche_editeur($GLOBALS['prefixe']."wp-content/plugins/liturgia/LH/TXT/".$ref.".xml",$lang)."</td></tr>
	";	
	
	if ((substr($la[0],-14))==" Per Dóminum.") {
		$la[0]=str_replace(" Per Dóminum.", " Per Christum Dóminum nostrum.",$la[0]);
		$ver[0].=get_traduction(" Per Christum Dóminum nostrum.", $lang);
	}
	if ((substr($la[0],-14))==" Per Christum.") {
		$la[0]=str_replace(" Per Christum.", " Per Christum Dóminum nostrum.",$la[0]);
		$ver[0].=get_traduction(" Per Christum Dóminum nostrum.", $lang);
	}
    
	if ((substr($la[0],-11))==" Qui vivit.") {
	    $la[0]=str_replace(" Qui tecum.", " Qui vivit et regnat in sæcula sæculórum.",$la[0]);
	    $ver[0].=get_traduction(" Qui vivit et regnat in sæcula sæculórum.", $lang);
	}
	 
	if ((substr($la[0],-11))==" Qui tecum.") {
	    $la[0]=str_replace(" Qui tecum.", " Qui vivit et regnat in sæcula sæculórum.",$la[0]);
	    $ver[0].=get_traduction(" Qui vivit et regnat in sæcula sæculórum.", $lang);
	}

	if ((substr($la[0],-11))==" Qui vivis.") {
	    $la[0]=str_replace(" Qui vivis.", " Qui vivis et regnas in sæcula sæculórum.",$la[0]);
	    $ver[0].=get_traduction(" Qui vivis et regnas in sæcula sæculórum.", $lang);
	}

	$oratio.="<tr><td class=\"gauche\">".$la['0']."</td>";
	$oratio.="<td class=\"droite\">".$ver['0']."</td></tr>";
	
	return $oratio;

}

function collecte($ref,$lang) {
	if(!$lang) $lang=$GLOBALS['lang'];
	if(!$lang) $lang="fr";
	$refL=$GLOBALS['prefixe']."wp-content/plugins/liturgia/LH/TXT/".$ref.".xml";    
	$oraison.="
	<tr><td class=\"gauche\"><font color=red><center>Collecta ".affiche_editeur($GLOBALS['prefixe']."wp-content/plugins/liturgia/LH/TXT/".$ref.".xml","la")."</center></font></td>
	";
	 
	if($lang=="fr") {
		$oraison.="<td class=\"droite\"><font color=red><center>Collecte ".affiche_editeur($GLOBALS['prefixe']."wp-content/plugins/liturgia/LH/TXT/".$ref.".xml",$lang)."</center></font></td></tr>";
	} 
	  
	
	$xml = @simplexml_load_file($refL);// or die("Erreur : ".$refL);
	if(!$xml) {
	if($GLOBALS['edition']=="on")$oraison="
	<tr><td class=\"gauche\">".$refL.affiche_editeur($refL,"la")."</td>
	<td class=\"droite\">".$refL.affiche_editeur($refL,$lang)."</td></tr>
	";
	return $oraison;
	}
	
	$o=0;
	foreach($xml as $ligne){
	
		if ((substr($ligne->la,-14))==" Per Dóminum.") {
			$ligne->la=str_replace(" Per Dóminum.", " Per Dóminum nostrum Iesum Christum, Fílium tuum, qui tecum vivit et regnat in unitáte Spíritus Sancti, Deus, per ómnia sæcula sæculórum.",$ligne->la);
			$ligne->$lang.=get_traduction(" Per Dóminum nostrum Iesum Christum, Fílium tuum, qui tecum vivit et regnat in unitáte Spíritus Sancti, Deus, per ómnia sæcula sæculórum.", $lang);
		}
		 
		if ((substr($ligne->la,-11))==" Qui tecum.") {
			$ligne->la=str_replace(" Qui tecum.", " Qui tecum vivit et regnat in unitáte Spíritus Sancti, Deus, per ómnia sæcula sæculórum.",$ligne->la);
			$ligne->$lang.=get_traduction(" Qui tecum vivit et regnat in unitáte Spíritus Sancti, Deus, per ómnia sæcula sæculórum.", $lang);
		}

		if ((substr($ligne->la,-11))==" Qui vivis.") {
			$la[0]=str_replace(" Qui vivis.", " Qui vivis et regnas cum Deo Patre in unitáte Spíritus Sancti, Deus, per ómnia sæcula sæculórum.",$ligne->la);
			$ligne->$lang.=get_traduction(" Qui vivis et regnas cum Deo Patre in unitáte Spíritus Sancti, Deus, per ómnia sæcula sæculórum.", $lang);
		}
	
	$oraison.="	<tr><td class=\"gauche\">".$ligne->la."</td>	<td class=\"droite\">".$ligne->$lang."</td></tr>";
		$o++;
	}    
	//$oraison.="<tr><td class=\"gauche\">".$la['0']."</td>";
	//$oraison.="<td class=\"droite\">".$ver['0']."</td></tr>";  

  return $oraison;
}



/*
function mod_calendarium($mois="",$an="") {
//print "calendrier";
$ok=false;
$date=$_GET['date'];
$lang=$_GET['lang'];
$office=$_GET['office'];
$anno=substr($date,0,4);
$mois=substr($date,4,2);
$die=substr($date,6,2);

if(!$lang) $lang="fr";
//$mois=str
if(!$mois) $mois=$_GET['mois'];
if(!$mois) $mois=date("m",time());

if (!$an) $an=$_GET['an'];
if(!$an) $an=date("Y",time());

if(!date) {
$date=date("Ymd", @mktime(0, 0, 0, $mois, 1,$an));
}

if (!$date) {
   $date=date("Ymd",time());
}

$date_ts=mktime(12,0,0,$mois,1,$an);

$file="/calendrier/".date("Y-n",$date_ts).".xml";
$xml = @simplexml_load_file($file);

if ($lang=="la") {
$men= array("Ianuarii","Februarii","Martii","Aprilis","Maii","Iunii","Iulii","Augustii","Septembris","Octobris","Novembris","Decembris");
$do="Do.";
$f2="F.2";
$f3="F.3";
$f4="F.4";
$f5="F.5";
$f6="F.6";
$sa="Sa.";
//$calendarium="";
}
if ($lang=="fr") {
$men= array("Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Décembre");
$do="Dim";
$f2="Lun";
$f3="Mar";
$f4="Mer";
$f5="Jeu";
$f6="Ven";
$sa="Sam";
//$calendarium="";
}

//print_r($men);

if($mois=="13") {
	$mois=1;
	$an++;
}
if($mois=="0") {
	$mois=12;
	$an--;
}

$s=0;$i=1;$sem=array();
while(date("m",$date_ts)==$mois) {
	$jour=date("w",$date_ts);

	$sem[$s][$jour]=$i;
	if ($jour==6) { $jour=0; $s++;}
 	//print"[$s|$jour]=$i";
	$i++;
	$date_ts=$date_ts+60*60*24;

}

$coul['Rouge']="#ff0000";
$coul['Vert']="#1b6f1f";
$coul['Blanc']="#ffeda6";
$coul['Violet']="#6b0d24";
$coul['Rose']="#d1a8a8";
$coul['Noir']="#000000";

	$an_plus=$an;
	$an_moins=$an;
    $mois_moins=$mois-1;
    $mois_plus=$mois+1;
	if($mois_plus==13) {$mois_plus=1; $an_plus=$an+1; }
	if($mois_moins==0) {$mois_moins=12; $an_moins=$an-1; }
	
$calendarium="<div align=center>
<table style=\"text-align: center; font-size:15px; margin:2px;\" border=\"0\" cellpadding=\"0\" cellspacing=\"3\">
<tr><td style=\"color: black;\"><a href=\"?mois=$mois_moins&an=$an_moins&office=$office\">&lt;&lt;</a></td>
      <td style=\"text-align: center;\" colspan=\"5\" rowspan=\"1\"><a href=\"?mois=$mois&an=$an&office=$office\">".$men[$mois-1]." $an</a></td>
      <td style=\"color: black;\"><a href=\"?mois=$mois_plus&&an=$an_plus&office=$office\">&gt;&gt;</a></td></tr>
  <tbody><tr >
  <td style=\"color: #777;\"><b>$do</b></td>
  <td style=\"color: #777;\">$f2</td>
  <td style=\"color: #777;\">$f3</td>
  <td style=\"color: #777;\">$f4</td>
  <td style=\"color: #777;\">$f5</td>
  <td style=\"color: #777;\">$f6</td>
  <td style=\"color: #777;\">$sa</td>
  </tr>";

	for ($u=0;$u<6;$u++) { // boucle semaines
		
    $calendarium.="<tr>";
    $f=$sem[$u][0];
    $jour_ts=@mktime(12,0,0,$mois,$f,$an);
   
	$url="/".$GLOBALS['wp']->request;
   
    $jour=@date("Ymd",$jour_ts);
	$req="//ordo[@id='RE']//jour[@date='".$jour."']";
	
	if($xml){ // TCH ajout - pr eviter affichage erreure dans les log
	$result=$xml->xpath($req);
    $iff=(string) $result[0]->couleur;
	//print"<br>"; print_r($result[0]->intitule);
	$titre=(string) $result[0]->intitule->fr;
	if($lang=="la") $titre=(string) $result[0]->intitule->la;
	}
	$coloris=$coul[$iff];
	//print"<br>".$jour." ".$req." ".$iff." "; //print_r($result);
	 $couleur_fonte=$coul['Noir'];
    if (($coloris==$coul['Noir'])OR($coloris==$coul['Violet'])OR($coloris==$coul['Vert'])) $couleur_fonte="#ffffff";	
//	print"<br>".$couleur_fonte;
	if($f!="")    {
		$calendarium.="
		<td style=\" background-color: $coloris;  font-weight:700; text-align: center;  text-decoration: none; ";
	  if($jour==$date) $calendarium.=" border: solid 3px;";
	  $calendarium.=" \">
		<a style=\"color: #000000; text-decoration: none;\"  href=\"?date=$jour&mois=$mois&an=$an&office=$office\" title=\"$titre\">
		<font color=\"$couleur_fonte\">$f</font></a></td>";
		}
	else $calendarium.="<td style=\" color: #000000; text-align: center; text-decoration: none;  \"></td>";
	
	for($n=1;$n<7;$n++) { // boucle jours
	$f=$sem[$u][$n];
    $jour_ts=@mktime(12,0,0,$mois,$f,$an);
    $jour=@date("Ymd",$jour_ts);
	$req="//ordo[@id='RE']//jour[@date='".$jour."']";
	$result=$xml->xpath($req);
    $iff=(string) $result[0]->couleur;
	$titre=(string) $result[0]->intitule->fr;
	if($lang=="la") $titre=(string) $result[0]->intitule->la;
	//print"<br>".$jour." ".$req." ".$iff." "; //print_r($result);
	///
	//print_r($result);
			///
    $coloris=$coul[$iff];
    $couleur_fonte=$coul['Noir'];
    if (($coloris==$coul['Noir'])OR($coloris==$coul['Violet'])OR($coloris==$coul['Vert'])) $couleur_fonte="#ffffff";
	//print"<br>".$couleur_fonte;
    //$titre=$calend['intitule'][$jour];
	  if($f!="") {
	  $calendarium.="
	  <td style=\" background-color: $coloris; text-align: center; text-decoration: none;";
	  if($jour==$date) $calendarium.=" border: solid 3px;";
	  
	  $calendarium.=" \">
	  <a style=\"color: #000000; text-decoration: none;\" href=\"?date=$jour&mois=$mois&an=$an&office=$office\" title=\"".$titre."\">
	  <font color=\"$couleur_fonte\">$f</font></a></td>
	  ";
      }
	else {
	$calendarium.="<td style=\" text-align: center;  text-decoration: none;\"></td>";
	   }

	} // fin boucle jours
} // fin boucle semaines


    $calendarium.="   
  </tbody>
</table>
</div>
";

return $calendarium;

}

*/

function affichage() {
 global $current_user;
get_currentuserinfo();

// Calcul du jour;
//if($_SERVER[SERVER_ADDR]!="192.168.193.231") return;

$lang=$_GET['lang'];
if(!$lang) $lang="fr";
$option=$_GET['option'];
$q=$_GET['q'];
$date_ts=$GLOBALS['date_ts'];
setlocale(LC_TIME, "fr_FR.UTF-8");
date_default_timezone_set ( "Europe/Paris" );
//if ((int)date("H",time())>=17) print "vesperas";

if(!$office) $office=$_GET['office'];
if(!$office) 	$office =$GLOBALS['office'];
if(!$office) {
	$GLOBALS['office']="laudes"; $office="laudes";
	if((int)date("H",time())>=8) {$GLOBALS['office']="tierce"; $office="tierce"; };
	if((int)date("H",time())>=9) {$GLOBALS['office']="messe"; $office="messe"; };
	if((int)date("H",time())>=12) {$GLOBALS['office']="sexte";$office="sexte";}
	if((int)date("H",time())>=14) {$GLOBALS['office']="none";$office="none";}
	if((int)date("H",time())>=16) {$GLOBALS['office']="vepres";$office="vepres";}
	if((int)date("H",time())>=20) {$GLOBALS['office']="complies";$office="complies";}
	
}

$date=$GLOBALS['date'];
if(!$date) $date=$_GET['date'];
if (!$date) {
     $date=date("Ymd",time());
}

$traductions=simplexml_load_file("traductions.xml");
$GLOBALS['traductions']=$traductions;
$xml=$GLOBALS['liturgia'];
$ordo=$_GET['ordo'];
if(!$ordo) $ordo="RE";
$datemoins_ts=$date_ts-(60*60*24);
$datemoins=date("Ymd",$datemoins_ts);
$dateplus_ts=$date_ts+(60*60*24);
$dateplus=date("Ymd",$dateplus_ts);
$ed=$GLOBALS['edition'];
if(!$ed) $ed="off";
if($ed=="off") $switch="on";
if($ed=="on") $switch="off";
print"Avertissement : les textes de l'office sont en cours de reconstruction. Des erreurs importantes peuvent s'afficher. Elles sont en cours de correction. Merci.";

	print"<menu class=\"editio\">
		<span id=\"modeedition\">Mode édition : <a href=\"?date=$date&edition=$switch&office=$office&lang=".$_GET['lang']."\">
		<img src=\"".get_bloginfo('wpurl')."/wp-content/plugins/wpliturgia/img/".$ed.".png\"></a></span> 
		</menu>
	<menu id=\"lang\">
	Lingua : <span "; 
	if ($lang=="fr") print"id=\"selected\">fr</span>";
	else print"><a href=\"?lang=fr&office=".$_GET['office']."&date=".$_GET['date']."\">fr</a></span>";
	print"<span align=\"right\"";
	if ($lang=="en") print"id=\"selected\">en</span>";
	else print"><a href=\"?lang=en&office=".$_GET['office']."&date=".$_GET['date']."\">en</a></span>";
	print"<span align=\"right\"";
	if ($lang=="ar") print"id=\"selected\">ar</span>";
	else print"><a href=\"?lang=ar&office=".$_GET['office']."&date=".$_GET['date']."\">ar</a></span>";
	print"</menu>";
global $current_user;
      get_currentuserinfo();
     
if ((string)$current_user->user_login=="admin"){
	print"<br><a href=\"?lang=fr&office=journee\">Journée entière</a>";
}


print"

<p><div id=\"nav\"><a href=\"?date=$datemoins&office=$office&edition=".$GLOBALS['edition']."\"><<</a> 
<a href=\"?date=$date&office=Martyrologe&edition=".$GLOBALS['edition']."&lang=".$_GET['lang']."&date=".$_GET['date']."\">Martyrologe</a> -
Office de lecture - 
<a href=\"?date=$date&office=laudes&edition=".$GLOBALS['edition']."&lang=".$_GET['lang']."&date=".$_GET['date']."\">Laudes</a> - 
Tierce -  
<a href=\"?date=$date&office=messe&&edition=".$GLOBALS['edition']."&lang=".$_GET['lang']."&date=".$_GET['date']."\">Messe</a> - 
Sexte - 
None - ";
print"
<a href=\"?date=$date&edition=".$GLOBALS['edition']."&office=vepres&lang=".$_GET['lang']."&date=".$_GET['date']."\">Vêpres</a> ";
print"- 
<a href=\"?date=$date&edition=".$GLOBALS['edition']."&office=complies&lang=".$_GET['lang']."&date=".$_GET['date']."\">Complies</a> 
<a href=\"?date=$dateplus&edition=".$GLOBALS['edition']."&office=$office&lang=".$_GET['lang']."\">>></a></div>";

if($office=="journee") journee();
if ($office=="Martyrologe") martyrologe($xml);  //affiche_nav($date,$office);}
if ($office=="invitatoire") { $contenu.= invitatoire($date,$ordo); print"</table>"; affiche_nav($date,$office); }

if ($office=="lectures") { $contenu.= lecture($date,$ordo);  affiche_nav($date,$office);}
if ($office=="laudes") {  $contenu.= laudes($date,$ordo); affiche_nav($date,$office); }
if ($office=="tierce") {$contenu.= tierce($date,$ordo);  affiche_nav($date,$office);}
if ($office=="messe") messe($date,$ordo);  //affiche_nav($date,$office);}
if ($office=="sexte") {$contenu.= sexte($date,$ordo);  affiche_nav($date,$office);}
if ($office=="none") {$contenu.= none($date,$ordo);  affiche_nav($date,$office);}
if ($office=="vepres") {$contenu.= vepres($date,$ordo); affiche_nav($date,$office);}
if ($office=="complies") {$contenu.= complies($date,$ordo); affiche_nav($date,$office);}


return $output;
}

function afficheDate($date){
	//return 	2016-08-01
	$anno=substr($date,0,4);
	$mense=substr($date,5,2);
	$die=substr($date,8,2);
	$date_ts=mktime(12,0,0,$mense,$die,$anno);
	$GLOBALS['date_ts']=$date_ts;
	setlocale(LC_TIME,"FR_fr");
	setlocale (LC_TIME, 'fr_FR.utf8','fra'); 
	//setlocale(LC_TIME, 'fr_FR','fra');
	return strftime("%A %e %B %Y",$date_ts);
}

function affiche_texte($ref,$lang="fr") {
$refL=$GLOBALS['prefixe']."wp-content/plugins/liturgia/LH/TXT/".$ref.".xml";
	
     $xml = @simplexml_load_file($refL);
	 
if(!$xml) {
	if((!$xml)&&($GLOBALS['edition']=="on")) {
	if($GLOBALS['edition']=="on") $aff.="<tr><td class=\"gauche\">".affiche_editeur($refL,"la")."</td>
	<td class=\"droite\">".affiche_editeur($refL,$lang)."</td></tr>";
	return $aff;
}
}
	if($GLOBALS['edition']=="on")$aff="<tr><td class=\"gauche\">".affiche_editeur($GLOBALS['prefixe']."wp-content/plugins/liturgia/LH/TXT/".$ref.".xml","la")."</td>
			<td class=\"droite\">".affiche_editeur($GLOBALS['prefixe']."wp-content/plugins/liturgia/LH/TXT/".$ref.".xml",$lang)."</td></tr>"; 		
foreach(@$xml->children() as $ligne){
		$la=@$ligne->xpath('la');
		$ver=@$ligne->xpath($lang);
	
	
		if($ligne->style) {
			$aff.= "
			<tr><td class=\"gauche ".$ligne->style."\">".$la[0]."</td>
			<td class=\"droite ".$ligne->style."\">".$ver[0]."</td></tr>";
		}
		else	{
			if($la[0]!=""){
			$aff.= "
			<tr><td class=\"gauche\">".nl2br($la[0])."</td>
			<td class=\"droite\">".nl2br($ver[0])."</td></tr>";
			}
		}
	
	}

$aff=rougis_verset($aff);

return $aff;	
}

function commentaire_Delatte() {

	
	$xml=$GLOBALS['liturgia'];
	$ev=$xml->xpath("//ordo[@id='RE']//EV");
	$evangile=$ev[0];
	
	$com="
   
   ";
	$com.= evangile($evangile,$lang);
	//print $com;
	$com .="</table><br />";
	$com.="<div class=\"txt\">";
	if(!$lang) $lang=$GLOBALS['lang'];
	if(!$lang) $lang="fr";
	
     $refL=$GLOBALS['prefixe']."wp-content/plugins/liturgia/LH/TXT/commentaire".$evangile.".xml";
     //print $refL;
     $xml = @simplexml_load_file($refL);
	 


	if(($GLOBALS['edition']=="on")&&(!$xml)) $com.= affiche_editeur($refL,"fr");
		
if($xml) foreach(@$xml->children() as $ligne){
		$o=@$ligne->xpath('@id');
		$la=@$ligne->xpath('la');
		$ver=@$ligne->xpath($lang);
	
		$com.="<br />".$ver[0];
		
	}
	


	$com.="</div>";
    return $com;
    }

?>
