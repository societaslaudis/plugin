<?php

function noveritis() {

	/// mercredi des cendres 
	$CM=simplexml_load_file("calendrier/2018-2.xml");
	$r=$CM->xpath("/mois/ordo/jour[intitule/la='Feria IV Cinerum']");
	$feria4CinerumYmd=$r[0]['date'];
	$feria4cinerumTS=date2dateTS($feria4CinerumYmd);
	$txtF4C=date('d',$feria4cinerumTS);
	if(date('m',$feria4cinerumTS)==2) $txtF4C.=" februárii";
	if(date('m',$feria4cinerumTS)==3) $txtF4C.=" mártii";
	
	/// Pâques mártii/aprílis
	$CM3=simplexml_load_file("calendrier/2018-4.xml");
	$r3=$CM3->xpath("/mois/ordo/jour[intitule/la='DOMINICA RESURRECTIONIS']");
	$CM4=simplexml_load_file("calendrier/2018-4.xml");
	$r4=$CM4->xpath("/mois/ordo/jour[intitule/la='DOMINICA RESURRECTIONIS']");
	$paschaYmd=trim($r3[0]['date'].$r4[0]['date']);
	$paschaTS=date2dateTS($paschaYmd);
	$txtPascha=date('d',$paschaTS);
	if(date('m',$paschaTS)==3) $txtPascha.=" mártii";
	if(date('m',$paschaTS)==4) $txtPascha.=" apríli";
	
	/// Ascension aprílis/maii/iúnii
	$CM4=simplexml_load_file("calendrier/2018-5.xml");
	$r4=$CM4->xpath("/mois/ordo/jour[intitule/la='IN ASCENSIONE DOMINI']");
	$CM5=simplexml_load_file("calendrier/2018-5.xml");
	$r5=$CM5->xpath("/mois/ordo/jour[intitule/la='IN ASCENSIONE DOMINI']");
	$CM6=simplexml_load_file("calendrier/2018-5.xml");
	$r6=$CM6->xpath("/mois/ordo/jour[intitule/la='IN ASCENSIONE DOMINI']");
	
	$AscensioYmd=trim($r4[0]['date'].$r5[0]['date'].$r6[0]['date']);
	
	$AscensioTS=date2dateTS($AscensioYmd);
	$txtAscensioC=date('d',$feria4cinerumTS);
	if(date('m',$AscensioTS)==4) $txtAscensio.=" aprílis";
	if(date('m',$AscensioTS)==5) $txtAscensio.=" maii";
	if(date('m',$AscensioTS)==6) $txtAscensio.=" iúnii";

	
	/// Pentecôte maii/iúnii/
	$CM5=simplexml_load_file("calendrier/2018-5.xml");
	$r5=$CM5->xpath("/mois/ordo/jour[intitule/la='Dominica Pentecostes']");
	$CM6=simplexml_load_file("calendrier/2018-5.xml");
	$r6=$CM6->xpath("/mois/ordo/jour[intitule/la='Dominica Pentecostes']");
	$pentecostesYmd=trim($r5[0]['date']$r6[0]['date']);
	$pentecostesTS=date2dateTS($pentecostesYmd);
	$txtPentecostes=date('d',$pentecostesTS);
	if(date('m',$pentecostesTS)==6) $txtpentecostes.=" iúnii";
	if(date('m',$pentecostesTS)==5) $txtpentecostes.=" maii";
	
	/// Fête-Dieu /iúnii
	$CM=simplexml_load_file("calendrier/2018-6.xml");
	$r=$CM->xpath("/mois/ordo/jour[intitule/la='SS.MI CORPORIS ET SANGUINIS CHRISTI']");
	$FDYmd=$r[0]['date'];
	$FDTS=date2dateTS($FDYmd);
	$txtF4C=date('d',$feria4cinerumTS);
	if(date('m',$FDTS)==6) $txtFD.=" iúnii";
	if(date('m',$FDTS)==5) $txtFD.=" maii";
	
	/// 1er dimanche de l'Avent
	$CM11=simplexml_load_file("calendrier/2018-12.xml");
	$r11=$CM11->xpath("/mois/ordo/jour[intitule/la='Dominica I Adventus']");
	$CM12=simplexml_load_file("calendrier/2018-12.xml");
	$r12=$CM12->xpath("/mois/ordo/jour[intitule/la='Dominica I Adventus']");
	$pAYmd=trim($r11[0]['date'].$r12[0]['date']);
	$pATS=date2dateTS($pAYmd);
	$txt1A=date('d',$pATS);
	if(date('m',$pATS)==11) $txt1A.=" novémbris";
	if(date('m',$pATS)==12) $txt1A.=" decémbris";
	
$result="Annuntiatio Paschæ festorumque mobilium<br/>";
$result.="Novéritis, fratres caríssimi,<br/>";
$result.="quod annuénte Dei misericórdia,<br/>";
$result.="sicut de Nativitáte Dómini nostri Iesu Christi gravísi sumus,<br/>";
$result.="ita et de Resurrectióne eiúsdem Salvatóris nostri<br/>";
$result.="gáudium vobis annuntiámus.<br/>";
$result.="Die $txtF4C dies Cínerum,<br/>";
$result.="et initium ieiunii sacratíssimæ Quadragésimæ.<br/>";
$result.="Die $txtPascha <br/>";
$result.="sanctum Pascha Dómini nostri Iesu Christi<br/>";
$result.="cum gáudio celebrábitis.<br/>";
$result.="Die $txtAscensio erit Ascénsio<br/>";
$result.="Dómini nostri Iesu Christi.<br/>";
$result.="Die $txtpentecostes eiúsdem festum Pentecóstes.<br/>";
$result.="Die $txtFD eiúsdem <br/>";
$result.="festum Santíssimi Córporis et Sánguinis Christi.<br/>";
$result.="Die  $txt1A <br/>";
$result.="domínica prima Advéntus Dómini nostri Iesu Christi,<br/>";
$result.="cui est honor et glória, in sΔcula sæculórum. Amen.<br/>";

return $result;
}

?>
