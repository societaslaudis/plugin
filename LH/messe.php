<?php
 

function messe($date,$ordo) {
	
$auth=false;
$xml=$GLOBALS['liturgia'];

$prio=$xml->xpath("//ordo[@id='RE']//priorite");
$priorite=$prio[0];
$cel=$xml->xpath("//ordo[@id='RE']//intitule/la");
$output.= intitule();


$output.="<tr><td class=\"gauche\"><center><i>Ad Missam</i></center>";
$output.="<td class=\"droite\"><center><i>".get_traduction("Ad Missam",$lang)."</i></center></td></tr>";



$lang=@$GLOBALS['lang'];

$option=$GLOBALS['option'];
$an=$xml->xpath("//ordo[@id='RE']//matin//lettre_annee");
$lettre_annee=$an[0];

$messesSXO=$xml->xpath("//ordo[@id='RE']//messe");
$output="";
$output=intitule();
for($i=0; $i<count($messesSXO);$i++){
	//print_r($cel[0]);
	if(($messesSXO[$i]->Intitule_messe=="Ad missam in vigilia")&&($cel[0][0]=="DOMINICA RESURRECTIONIS")){
	/****
	 * 
	 * Vigile pascale
	 * 
	 * 
	 * 
	 */
	 
	 $output.="<tr><td><hr></td><td><hr></td></tr>";
	if($messesSXO[$i]->Intitule_messe) $output.="<tr><td class=\"gauche\" style=\"font-weight: 600; text-align:center;\">".$messesSXO[$i]->Intitule_messe."</td>
	<td class=\"droite\" style=\"font-weight: 600; text-align:center;\">".$messesSXO[$i]->Intitule_messe."</td></tr>
	";
	 $output.=antienne_messe("Benedictio_ignis_et_praeparatio_cerei",$lang);
	 $output.=antienne_messe("Processio_Lumen_Christi",$lang);
	 $output.=antienne_messe("Exsultet",$lang);
	 
	 //LECON1
	 $output.=lecture_vigiles("LEC_Gen1,1–2,2",$lang,1);
	 //vel:
	 $output.=lecture_vigiles("LEC_Gen1,1.26-31a",$lang,1);
	 $output.=antienne_messe($messesSXO[$i]->TR1,$lang);
	 // Orémus
	 $output.=oratio("COL_Omnipotens_sempiterne_Deus_qui_es_in_omnium_operum_tuorum",$lang);
	 // Vel, De creatione hominis:
	 $output.=oratio("COL_Deus_qui_mirabiliter_creasti_hominem_et_mirabilius",$lang);
	 
	  //LECON2
	 $output.=lecture_vigiles("LEC_Gen22,1-18",$lang,2);
	 //vel:
	 $output.=lecture_vigiles("LEC_Gen1-2.9a10-13.15-18",$lang,2);
	 $output.=antienne_messe($messesSXO[$i]->TR2,$lang);
	 // Orémus
	 $output.=oratio("COL_Deus_Pater_summe_fidelium_qui_promissionis",$lang);
	 
	  //LECON3
	 $output.=lecture_vigiles("LEC_Ex14,15–15,1",$lang,3);
	 $output.=antienne_messe($messesSXO[$i]->TR3,$lang);
	 // Orémus
	 $output.=oratio("COL_Deus_cuius_antiqua_miraculae_etiam_nostris",$lang);
	 // Vel:
	 $output.=oratio("COL_Deus_qui_primis_temporibus_impleta_miracula",$lang);
	 
	  //LECON4
	 $output.=lecture_vigiles("LEC_Is54,5-14",$lang,4);
	 $output.=antienne_messe($messesSXO[$i]->TR4,$lang);
	 // Orémus
	 $output.=oratio("COL_Omnipotens_sempiterne_Deus_multiplica_in_honorem",$lang);
	 // Vel alia ex orationibus, quæ sequuntur lectiones forte omissas.
	 
	  //LECON5
	 $output.=lecture_vigiles("LEC_Is55,1-11",$lang,5);
	 $output.=antienne_messe($messesSXO[$i]->TR5,$lang);
	 // Orémus
	 $output.=oratio("COL_Omnipotens_sempiterne_Deus_spes_unica_mundi",$lang);
	 
	  //LECON6
	 $output.=lecture_vigiles("LEC_Bar3,9-15.31–4,4",$lang,6);
	 $output.=antienne_messe($messesSXO[$i]->TR6,$lang);
	 // Orémus
	 $output.=oratio("COL_Deus_qui_Ecclesiam_tuam_semper_gentium",$lang);
	 
	  //LECON7
	 $output.=lecture_vigiles("LEC_Ez36,16-28",$lang,7);
	 $output.=antienne_messe($messesSXO[$i]->TR7,$lang);
	 // Orémus
	 $output.=oratio("COL_Deus_incommutabilis_virtus_et_lumen_aeternum",$lang);
	
	 // Gloria in excelsis Deo
	// Orémus
	$output.=collecte("Deus_qui_hanc_sacratíssimam_noctem_gloria_dominicae",$lang);
	 // Lecture II
	if($messesSXO[$i]->LEC2!=""){
		$output.="<tr><td class=\"gauche\" style=\"color:red;font-weight: 900;text-align:center;\">Lectio</td>
		<td class=\"droite\" style=\"color:red;font-weight: 900;text-align:center;\">".get_traduction("Lectio II",$lang)."</td></tr>
		";
		$output.= lecture_messe($messesSXO[$i]->LEC2,$lang);
	}
	
	
	// Psalmodie II
	if($messesSXO[$i]->PS2) $output.= antienne_messe($messesSXO[$i]->PS2,$lang);
	$output.= evangile($messesSXO[$i]->EV,$lang);
	/*
33. Deinde lector profert lectionem de Apostolo.
34. Lecta Epistola, omnibus surgentibus, sacerdos ter sollemniter intonat, vocem gradatim elevando
Allelúia, quod omnes repetunt. Si necesse est, psalmista Allelúia intonat. Deinde psalmista vel cantor
profert psalmum 117, populo respondente Allelúia.
35. Sacerdos, more solito, imponit incensum et diacono benedicit. Ad Evangelium non portantur
luminaria, sed tantum incensum.
36. Post Evangelium homilia, etsi brevis, ne omittatur.
Pars tertia: Liturgia baptismalis
37. Post homiliam proceditur ad liturgiam baptismalem. Sacerdos cum ministris vadit ad fontem
baptismalem, si hic est in conspectu fidelium. Secus ponitur vas cum aqua in presbyterio.
38. Vocantur, si adsunt, catechumeni, qui præsentantur a patrinis, vel, si sunt parvuli, portantur a
parentibus et patrinis, in faciem ecclesiæ congregatæ.
39. Tunc, si processio ad baptisterium vel ad fontem habenda sit, ea statim ordinatur. Præcedit minister
cum cereo paschali, eumque sequuntur baptizandi cum patrinis, deinde ministri, diaconus et
sacerdos. Durante processione, canuntur litaniæ (n. 43). Expletis litaniis, sacerdos facit monitionem
(n. 40).
40. Si autem liturgia baptismalis in presbyterio peragitur, sacerdos statim monitionem introductoriam
facit, his vel similibus verbis:
Si adsunt baptizandi:
Précibus nostris, caríssimi,
fratrum nostrórum beátam spem unánimes adiuvémus,
ut Pater omnípotens ad fontem regeneratiónis eúntes
omni misericórdiæ suæ auxílio prosequátur.
Si benedicendus est fons, sed non adsunt baptizandi:
Dei Patris omnipoténtis grátiam, caríssimi,
super hunc fontem súpplices invocémus,
ut qui ex eo renascéntur
adoptiónis fíliis in Christo aggregéntur.
41. Et canuntur litaniæ a duobus cantoribus, omnibus stantibus (propter tempus paschale) et respondentibus.
Si autem habenda sit longior processio ad baptisterium, litaniæ cantantur durante processione;
quo in casu baptizandi vocantur ante processionem, et fit processio præcedente cereo paschali, quem
sequuntur catechumeni cum patrinis, deinde ministri, diaconus et sacerdos. Monitio autem fiat ante
benedictionem aquæ.
_____________________________________________________________________________________
42. Si non adsunt baptizandi, neque benedicendus est fons, omissis litaniis, statim proceditur ad
benedictionem aquæ (n. 54).
_____________________________________________________________________________________
43. In litaniis addi possunt aliqua nomina Sanctorum, præsertim vero Titularis ecclesiæ vel Patronorum
loci et eorum qui sunt baptizandi.
Kýrie, eléison. Kýrie, eléison.
Christe, eléison. Christe, eléison.
Kýrie, eléison. Kýrie, eléison.
Sancta María, Mater Dei, ora pro nobis.
Sancte Míchael, ora pro nobis.
232
Sancti Angeli Dei, oráte pro nobis.
Sancte Ioánnes Baptísta, ora pro nobis.
Sancte Ioseph, ora pro nobis.
Sancti Petre et Paule, oráte pro nobis.
Sancte Andréa, ora pro nobis.
Sancte Ioánnes, ora pro nobis.
Sancta María Magdaléna, ora pro nobis.
Sancte Stéphane, ora pro nobis.
Sancte Ignáti Antiochéne, ora pro nobis.
Sancte Laurénti, ora pro nobis.
Sanctæ Perpétua et Felícitas, oráte pro nobis.
Sancta Agnes, ora pro nobis.
Sancte Gregóri, ora pro nobis.
Sancte Augustíne, ora pro nobis.
Sancte Athanási, ora pro nobis.
Sancte Basíli, ora pro nobis.
Sancte Martíne, ora pro nobis.
Sancte Benedícte, ora pro nobis.
Sancti Francísce et Domínice, oráte pro nobis.
Sancte Francísce (Xavier), ora pro nobis.
Sancte Ioánnes María (Vianney), ora pro nobis.
Sancta Catharína (Senénsis), ora pro nobis.
Sancta Terésia a Iesu, ora pro nobis.
Omnes Sancti et Sanctæ Dei, oráte pro nobis.
Propítius esto, líbera nos, Dómine.
Ab omni malo, líbera nos, Dómine.
Ab omni peccáto, líbera nos, Dómine.
A morte perpétua, líbera nos, Dómine.
Per incarnatiónem tuam, líbera nos, Dómine.
Per mortem et resurrectiónem tuam, líbera nos, Dómine.
Per effusiónem Spíritus Sancti, líbera nos, Dómine.
Peccatóres, te rogámus, audi nos.
Si adsunt baptizandi
Ut hos eléctos per grátiam
Baptísmi regeneráre dignéris, te rogámus, audi nos.
Si non adsunt baptizandi
Ut hunc fontem,
regenerándis tibi fíliis,
grátia tua sanctificáre dignéris, te rogámus, audi nos.
Iesu, Fili Dei vivi, te rogámus, audi nos.
Christe, audi nos. Christe, audi nos.
Christe, exáudi nos. Christe, exáudi nos.
233
Si adsunt baptizandi, sacerdos, extensis manibus, dicit hanc orationem:
Omnípotens sempitérne Deus,
adésto magnæ pietátis tuæ sacraméntis,
et ad recreándos novos pópulos,
quos tibi fons baptísmatis párturit,
spíritum adoptiónis emítte,
ut, quod nostræ humilitátis gérendum est mystério,
virtútis tuæ impleátur efféctu.
Per Christum Dóminum nostrum.
¤ Amen.
Benedictio aquæ baptismalis
44./46. Deinde sacerdos benedicit aquam baptismalem dicens, extensis manibus, hanc orationem:
Deus, qui invisíbili poténtia
per sacramentórum signa mirábilem operáris efféctum,
et creatúram aquæ multis modis præparásti,
ut baptísmi grátiam demonstráret;
Deus, cuius Spíritus
super aquas inter ipsa mundi primórdia ferebátur,
ut iam tunc virtútem sanctificándi aquárum natúra concíperet;
Deus, qui regeneratiónis spéciem
in ipsa dilúvii effusióne signásti,
ut uníus eiusdémque eleménti mystério
et finis esset vítiis et orígo virtútum;
Deus, qui Abrahæ fílios
per Mare Rubrum sicco vestígio transíre fecísti,
ut plebs, a Pharaónis servitúte liberáta,
pópulum baptizatórum præfiguráret;
Deus, cuius Fílius, in aqua Iordánis a Ioánne baptizátus,
Sancto Spíritu est inúnctus, et, in cruce pendens,
una cum sánguine aquam de látere suo prodúxit,
ac, post resurrectiónem suam, discípulis iussit:
„Ite, docéte omnes gentes, baptizántes eos
in nómine Patris, et Fílii, et Spíritus Sancti“:
réspice in fáciem Ecclésiæ tuæ,
eíque dignáre fontem baptísmatis aperíre.
Sumat hæc acqua Unigéniti tui grátiam de Spíritu Sancto,
ut homo, ad imáginem tuam cónditus,
sacraménto baptísmatis a cunctis squalóribus vetustátis ablútus,
in novam infántiam ex aqua et Spíritu Sancto resúrgere meréatur.
234
Et immittens, pro opportunitate, cereum paschalem in aquam semel vel ter, prosequitur:
Descéndat, quΔsumus, Dómine, in hanc plenitúdinem fontis
per Fílium tuum virtus Spíritus Sancti,
et tenens cereum in aqua prosequitur:
ut omnes, cum Christo consepúlti per baptísmum in mortem,
ad vitam cum ipso resúrgant.
Qui tecum vivit et regnat in unitáte Spíritus Sancti, Deus,
per ómnia sΔcula sæculórum.
¤ Amen.
45./47. Deinde tollitur cereus de aqua, populo acclamante:
Benedícite, fontes, Dómino,
laudáte et superexaltáte eum in sΔcula.
48. Aquæ baptismalis benedictione expleta et acclamatione populi prolata, sacerdos, stans, interrogat
ad abrenuntiationem faciendam adultos atque parentes vel patrinos parvulorum, ut in respectivis
Ordinibus Ritualis Romani determinatur.
Si unctio cum oleo catechumenorum adultorum facta non sit antea, inter ritus immediate præparatorios,
fit hoc momento.
49. Deinde sacerdos singulos adultos de fide interrogat, atque, si de parvulis agitur, triplicem professionem
fidei ab omnibus parentibus et patrinis simul requirit, ut in respectivis Ordinibus indicatur.
Ubi hac nocte multi sunt baptizandi, ritum ordinari potest ita ut, statim post responsionem
baptizandorum, patrinorum atque parentum, celebrans postulet ac recipiat renovationem promissionum
baptismalium omnium adstantium.
50. Peractis interrogationibus, sacerdos baptizat electos adultos et parvulos.
51. Post baptismum sacerdos infantes ungit chrismate. Omnibus vero, sive adultis sive parvulis,
vestis candida traditur. Deinde sacerdos vel diaconus accipit cereum paschalem de manu ministri
atque cerei neophytorum accenduntur. Pro infantibus ritus Effetha omittitur.
52. Postea, nisi ablutio baptismalis aliique ritus explanativi, in presbyterio locum habuerint, fit reditus
in presbyterium, processione ordinata uti antea, neophytis vel patrinis seu parentibus cereum
accensum gestantibus. Durante processione canitur canticum baptismale Vidi aquam vel alius cantus
aptus (n. 56).
53. Si adulti sunt baptizati, Episcopus vel, eo absente, presbyter qui baptismum contulit statim
sacramentum Confirmationis eis ministret in presbyterio, ut in Pontificali aut Rituali Romano indicatur.
235
Benedictio aquæ
54. Si vero non adsunt baptizandi, neque fons baptismalis benedicendus est, sacerdos ad aquam benedicendam
fideles introducit, dicens:
Dóminum Deum nostrum, fratres caríssimi,
supplíciter exorémus,
ut hanc creatúram aquæ benedícere dignétur,
super nos aspergéndam in nostri memóriam baptísmi.
Ipse autem nos renováre dignétur,
ut Spirítui, quem accépimus, fidéles maneámus.
Et post brevem pausam in silentio hanc orationem profert, extensis manibus:
Dómine Deus noster,
pópulo tuo hac nocte sacratíssima vigilánti
adésto propítius:
et nobis, mirábile nostræ creatiónis opus,
sed et redemptiónis nostræ mirabílius, memorántibus,
hanc aquam benedícere tu dignáre.
Ipsam enim tu fecísti,
ut et arva fecunditáte donáret,
et levámen corpóribus nostris munditiámque præbéret.
Aquam étiam tuæ minístram misericórdiæ condidísti:
nam per ipsam solvísti tui pópuli servitútem
illiúsque sitim in desérto sedásti;
per ipsam novum foedus nuntiavérunt prophétæ,
quod eras cum homínibus initúrus;
per ipsam dénique, quam Christus in Iordáne sacrávit,
corrúptam natúræ nostræ substántiam
in regeneratiónis lavácro renovásti.
Sit ígitur hæc aqua nobis suscépti baptísmatis memória,
et cum frátribus nostris, qui sunt in Páschate baptizáti,
gáudia nos tríbuas sociáre.
Per Christum Dóminum nostrum.
¤ Amen.
236
Renovatio promissionum baptismalium
55. Ritu baptismi (et confirmationis) expleto, vel si hic non habuit locum, post benedictionem
aquæ, omnes, stantes et candelas accensas in manibus gestantes, promissionem fidei baptismalis,
una cum baptizandis, renovant, nisi iam locum habuerit, (cf. n. 48). Sacerdos fideles alloquitur, his
vel similibus verbis:
Per paschále mystérium, fratres caríssimi,
in baptísmo consepúlti sumus cum Christo,
ut cum eo in novitáte vitæ ambulémus.
Quaprópter, quadragesimáli observatióne absolúta,
sancti baptísmatis promissiónes renovémus,
quibus olim Sátanæ et opéribus eius abrenuntiávimus,
et Deo in sancta Ecclésia cathólica servíre promísimus.
Quaprópter:
Sacerdos: Abrenuntiátis Sátanæ?
Omnes: Abrenúntio.
Sacerdos: Et ómnibus opéribus eius?
Omnes: Abrenúntio.
Sacerdos: Et ómnibus pompis eius?
Omnes: Abrenúntio.
Vel:
Sacerdos: Abrenuntiátis peccáto, ut in libertáte filiórum Dei vivátis?
Omnes: Abrenúntio.
Sacerdos: Abrenuntiátis seductiónibus iniquitátis, ne peccátum vobis dominétur?
Omnes: Abrenúntio.
Sacerdos: Abrenuntiátis Sátanæ, qui est auctor et princeps peccáti?
Omnes: Abrenúntio.
Si casus fert, hæc altera formula aptari potest a Conferentiis Episcoporum, iuxta locorum necessitates.
Deinde sacerdos prosequitur:
Sacerdos: Créditis in Deum Patrem omnipoténtem, creatórem cæli et terræ?
Omnes: Credo.
Sacerdos: Créditis in Iesum Christum, Fílium eius únicum, Dóminum nostrum, natum
ex María Vírgine, passum et sepúltum, qui a mórtuis resurréxit et sedet
ad déxteram Patris?
Omnes: Credo.
Sacerdos: Créditis in Spíritum Sanctum, sanctam Ecclésiam cathólicam, sanctórum
communiónem, remissiónem peccatórum, carnis resurrectiónem et vitam
ætérnam?
Omnes: Credo.
237
Et sacerdos concludit:
Et Deus omnípotens, Pater Dómini nostri Iesu Christi,
qui nos regenerávit ex aqua et Spíritu Sancto,
quique nobis dedit remissiónem peccatórum,
ipse nos custódiat grátia sua,
in Christo Iesu Dómino nostro,
in vitam ætérnam.
Omnes: Amen.
56. Sacerdos aspergit populum aqua benedicta, omnibus cantantibus:
Antiphona
Vidi aquam egrediéntem de templo,
a látere dextro, allelúia;
et omnes, ad quos pervénit aqua ista, salvi facti sunt
et dicent: Allelúia, allelúia.
Cantari potest etiam alius cantus indolem baptismalem præ se ferens.
57. Interim neophyti deducuntur ad locum suum inter fideles. Si benedictio aquæ baptismalis facta
non est in baptisterio, diaconus et ministri reverenter portant vas aquæ ad fontem.
Si benedictio fontis locum non habuit, aqua benedicta reponitur loco convenienti.
58. Aspersione facta, sacerdos redit ad sedem, ubi, omisso symbolo, moderatur orationem universalem,
quam neophyti primum participant.
238
Pars quarta: Liturgia eucharistica
59. Sacerdos accedit ad altare et more solito incipit liturgiam eucharisticam.
60. Præstat, ut panis et vinum afferantur a neophytis vel, si sint parvuli, ab eorum parentibus vel
patrinis.
61. Super oblata
Súscipe, quΔsumus, Dómine, preces pópuli tui
cum oblatiónibus hostiárum,
ut, paschálibus initiáta mystériis,
ad æternitátis nobis medélam, te operánte, profíciant.
Per Christum.
62. Præfatio paschalis I: De mysterio paschali (in hac potíssimum nocte), p. 241 vel 368.
63. In Prece eucharistica, memoria fit baptizatorum et patrinorum, iuxta formulas quæ in Missali et
Rituali Romano pro singulis Precibus eucharisticis inveniuntur.
64. Ante Ecce Agnus Dei, sacerdos neophytos breviter monere potest de prima Communione recipienda
et de pretio tanti mysterii, quod est initiationis culmen et totius vitæ christianæ centrum.
65. Expedit ut neophyti sacram Communionem recipiant sub utraque specie, una cum patrinis,
matrinis, parentibus et coniugibus catholicis, necnon catechistis laicis. Convenit etiam ut,
de consensu Episcopi dioecesani, ubi adiuncta hoc suadeant, omnes fideles ad sacram Communionem
sub utraque specie admittantur.
66. Ant. ad communionem 1 Cor 5, 7-8
Pascha nostrum immolátus est Christus;
ítaque epulémur in ázymis sinceritátis et veritátis, allelúia.
Opportune cantatur psalmus 117.
67. Post communionem
Spíritum nobis, Dómine, tuæ caritátis infúnde,
ut, quos sacraméntis paschálibus satiásti,
tua fácias pietáte concórdes.
Per Christum.
239
68. Benedictio sollemnis
Benedícat vos omnípotens Deus,
hodiérna interveniénte sollemnitáte pascháli,
et ab omni miserátus deféndat incursióne peccáti.
¤ Amen.
Et qui ad ætérnam vitam
in Unigéniti sui resurrectióne vos réparat,
vos prΔmiis immortalitátis adímpleat.
¤ Amen.
Et qui, explétis passiónis domínicæ diébus,
paschális festi gáudia celebrátis,
ad ea festa, quæ lætítiis peragúntur ætérnis,
ipso opitulánte, exsultántibus ánimis veniátis.
¤ Amen.
Benedícat vos omnípotens Deus,
Pater, et Fílius, † et Spíritus Sanctus.
¤ Amen.
Adhiberi potest etiam formula benedictionis finalis Ordinis Baptismi adultorum vel parvulorum,
iuxta rerum adiuncta.
69. Ad populum dimittendum, diaconus vel, eo absente, ipse sacerdos cantat vel dicit:
Ite, missa est, allelúia, allelúia.
Omnes respondent:
Dei grátias, allelúia, allelúia.
Quod servatur per totam octavam Paschæ.
70. Cereus paschalis accenditur in omnibus celebrationibus liturgicis sollemnioribus huius temporis.
	 * 
	 */
	
	// Offertoire
	$output.= antienne_messe($messesSXO[$i]->OF,$lang);
		// Communion
	$output.= antienne_messe($messesSXO[$i]->CO,$lang);
		  
	}
	 
	 
	
	else{
		
	
	$output.="<tr><td><hr/></td><td><hr/></td></tr>";
	if($messesSXO[$i]->Intitule_messe) $output.="<tr><td class=\"gauche\" style=\"font-weight: 600; text-align:center;\">".$messesSXO[$i]->Intitule_messe."</td>
	<td class=\"droite\" style=\"font-weight: 600; text-align:center;\">".$messesSXO[$i]->Intitule_messe."</td></tr>
	";
	$n=0;
	foreach($messesSXO[$i]->IN as $IN){
		//$output.=antienne_messe($messesSXO[$i]->IN,$lang);
		if($n>0) $output.="<tr><td class=\"gauche rubrique\" >Vel:</td><td class=\"droite rubrique\" >".get_traduction("Vel:",$lang)."</td></tr>";
		$output.=antienne_messe($IN,$lang);$n++;
	}
	// Collecte 
	$output.= oraison_messe($messesSXO[$i]->COL,$lang);
	// Lecture I
	$output.="<tr><td class=\"gauche titre-antienne-lat\" >Lectio I</td>
	<td class=\"droite titre-antienne-ver\">".get_traduction("Lectio I",$lang)."</td></tr>";
	$output.= lecture_messe($messesSXO[$i]->LEC,$lang);
	
	// Psalmodie I
	if($messesSXO[$i]->PS1){
		$n=0;
		foreach($messesSXO[$i]->PS1 as $PS1) {
			if($n>0) $output.="<tr><td class=\"gauche rubrique\" >Vel:</td><td class=\"droite rubrique\" >".get_traduction("Vel:",$lang)."</td></tr>";
			$output.= antienne_messe($PS1,$lang); $n++;
		//$output.= antienne_messe($messesSXO[$i]->PS1,$lang);
	}
}
	// Lecture II
	if($messesSXO[$i]->LEC2!=""){
		$output.="<tr><td class=\"gauche\" style=\"color:red;font-weight: 900;text-align:center;\">Lectio II</td>
		<td class=\"droite\" style=\"color:red;font-weight: 900;text-align:center;\">".get_traduction("Lectio II",$lang)."</td></tr>
		";
		$output.= lecture_messe($messesSXO[$i]->LEC2,$lang);
	}
	
	
	// Psalmodie II
	if($messesSXO[$i]->PS2) {
		$n=0;
		foreach($messesSXO[$i]->PS2 as $PS2) {
			if($n>0) $output.="<tr><td class=\"gauche rubrique\" >Vel:</td><td class=\"droite rubrique\" >".get_traduction("Vel:",$lang)."</td></tr>";
			$output.= antienne_messe($PS2,$lang); $n++;
		}
	}
		// Sequence
	if($messesSXO[$i]->SEQ) $output.= antienne_messe($messesSXO[$i]->SEQ,$lang);
	
	$output.= evangile($messesSXO[$i]->EV,$lang);
	if($cel[0]=="IN EPIPHANIA DOMINI"){
		if(trim((string)$messesSXO[$i]->Intitule_messe)=="Ad Missam in Die")
			
			$output.= noveritis($date);
		}
	
	// Offertoire
	$output.= antienne_messe($messesSXO[$i]->OF,$lang);
	
	// Super oblata
	$output.= oraison_messe($messesSXO[$i]->SO,$lang);
	// Préface
	$output.= antienne_messe($messesSXO[$i]->PRE,$lang);
	// Communion
	if($messesSXO[$i]->CO) {
		$n=0;
		foreach($messesSXO[$i]->CO as $CO) {
		if($n>0) $output.="<tr><td class=\"gauche rubrique\" >Vel:</td><td class=\"droite rubrique\" >".get_traduction("Vel:",$lang)."</td></tr>";
				
		$output.= antienne_messe($CO,$lang); $n++;
		}
	}
	// post communnio
	$output.= oraison_messe($messesSXO[$i]->PC,$lang);
	
	// Aux messes lues :
	$output.="<tr><td><hr/></td></tr>";
	$output.="<tr><td class=\"rubrique\">Modifications aux messes lues :</td></tr>";
	// Introit lu
	$output.=antienne_messe($messesSXO[$i]->IN_L,$lang);
	// Psaume responsorial
	$output.=antienne_messe($messesSXO[$i]->PR,$lang);
	// PS2 lu
	$output.=antienne_messe($messesSXO[$i]->PS2_L,$lang);
	// communion lue
	$output.=antienne_messe($messesSXO[$i]->CO_L,$lang);
				
}
	$output=rougis_verset($output);
	}
	
	return $output;
}


?>
