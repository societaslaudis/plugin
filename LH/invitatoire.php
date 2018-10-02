<?php



//fonction de lecture et de mis en forme du psaume invitatoire

function psaume_invitatoire($ref,$ant_lat,$ant_fr) {
/*
$row = 0;
$fp = fopen ("calendrier/liturgia/ps94_inv.csv","r","1");
    while ($data = fgetcsv ($fp, 1000, ";")) {
        switch ($row){

            case 0:
                if ($data[0]!="&nbsp;") {
                    $latin="<b><center><font color=red>$data[0]</font></b></center>";
                    $francais="<b><center><font color=red>$data[1]</b></font></center>";
                }

                break;



            case 1:
                if ($data[0]!="&nbsp;") {
                    $latin="<center><font color=red>$data[0]</font></center>";
                    $francais="<center><font color=red>$data[1]</font></center>";
                }

                break;



            case 2:

                if ($data[0]!="&nbsp;") {
                    $latin="<center><i>$data[0]</i></center>";
                    $francais="<center><i>$data[1]</i></center>";
                }

                break;



            case 3:

                if($data[0]=="antiphona"){
                   $latin="V/. ".$ant_lat;
                   $francais="V/. ".$ant_fr;
                }

                break;



            default:

                switch ($data[0]){

                    case "antiphona":
                        $latin="R/. ".$ant_lat;
                        $francais="R/. ".$ant_fr;
                        break;

                    default :
                        $latin=$data[0];
                        $francais=$data[1];
                        break;
                }

                break;

        }

   //$num = count ($data);

   //print "<p> $num fields in line $row: <br>\n";

      $psaume_invitatoire .="
      
    <tr>
    <td id=\"colgauche\">$latin</td>
    <td id=\"coldroite\">$francais</td>
    </tr>";
      $row++;
    }
    //$psaume_invitatoire.="</table>";
    fclose ($fp);
	*/
    return $psaume_invitatoire;

}





/// ici le code pour l'invitatoire



function invitatoire() {


$xml=$GLOBALS['liturgia'];
$prio=$xml->xpath("//ordo[@id='RE']//priorite");
$priorite=$prio[0];

//////// INTITULE
$ant_invit=$xml->xpath("ordo[@id='RE']/invitatoire");
$invit=$ant_invit[0];
$invitatoire.="<tr><td class=\"gauche\"><center><i>Ad Invitatorium</i></center></td><td class=\"droite\"><center><i>".get_traduction("Ad Invitatorium", $lang)."</i></center></td></tr>";
$invitatoire.="<tr><td class=\" ceremonial\">A la liturgie lue :</td></tr>";

$invitatoire.="<tr><td class=\"gauche rubrique\">Ante Officium quod a solo persolvitur, dici potest sequens oratio:</td>";
$invitatoire.="<td class=\"droite rubrique\">Avant l'office récité seul, on peut dire la prière suivante :</td></tr>";
//$invitatoire.="<tr><td class=\" rubrique\"><i>Dans la liturgie chantée, l'usage du rite romain veut qu'on récite cette prière à genoux, à voix basse, pendant la 'station' qui précède l'office, et qu'on l'achève par un signe de croix.</i></td></tr>";
$invitatoire.="<tr><td class=\"gauche\">Aperi, Dómine, os meum ad benedicéndum nomen sanctum tuum; munda cor meum ab ómnibus vanis, pervérsis et aliénis cogitatiónibus; intelléctum illúmina, afféctum inflámma, ut digne, atténte ac devóte hoc Offícium recitáre váleam, et exaudíri mérear ante conspéctum divínæ maiestátis tuæ. Per Christum Dóminum nostrum. Amen.</td>";
$invitatoire.="<td class=\"droite\">Ouvre mes lèvres, Seigneur, afin qu’elles bénissent Ton saint Nom, purifie aussi mon cœur de toute pensée vaine, mauvaise, étrangère. Éclaire mon intelligence, enflamme mon amour, afin que je puisse réciter cet office avec respect, attention et dévotion, et mériter d’être exaucé en présence de Ta divine majesté. Par le Christ notre Seigneur. Amen.</td></tr>";
//$invitatoire.="<tr><td class=\" rubrique\"><i>Le cas échéant on se met ensuite debout, et on trace un signe de croix sur les lèvres en disant :</i></td></tr>";

$invitatoire.="<tr><td class=\"gauche\">V/. Dómine, lábia mea apéries. R/. Et os meum annuntiábit laudem tuam.</td>";

$invitatoire.="<td class=\"droite\">V/. Seigneur, ouvre mes lèvres. R/. Et ma bouche annoncera Ta louange.</td></tr>";

/******
 * PS 94
 * 
 * 
 * *****/
 
$invitatoire.="<tr><td class=\"gauche liturgie_titre\">Psalmus 94 (95)</td>";
$invitatoire.="<td class=\"droite liturgie_titre\">Psaume 94 (95)</td></tr>";

$invitatoire.="<tr><td class=\"gauche liturgie_sous_titre\">Invitatio ad laudem Dei</td>";
$invitatoire.="<td class=\"droite liturgie_sous_titre\">Invitation à la louange de Dieu</td></tr>";

$invitatoire.="<tr><td class=\"gauche liturgie_italique\">Adhortamini vosmetipsos per singulos dies, donec illud «hodie» vocatur (Hebr 3, 13).</td>";
$invitatoire.="<td class=\"droite liturgie_italique\">Exhortez-vous mutuellement chaque jour, tant que vaut cet « aujourd'hui ».</td></tr>";
$invitatoire.= antienne($invit,$GLOBALS['lang']);

$invitatoire.="<tr><td class=\"gauche\">Veníte, exsultémus Dómino;
iubilémus Deo salutári nostro.
Præoccupémus fáciem eius in confessióne
et in psalmis iubilémus ei.</td>";
$invitatoire.="<td class=\"droite\">Venez, exultons pour le Seigneur, jubilons pour Dieu, notre salut. + Accourons devant Sa face dans l'action de grâce, dans des psaumes, jubilons pour Lui.
  </td></tr>";

$invitatoire.= antienne($invit,$GLOBALS['lang']);

$invitatoire.="<tr><td class=\"gauche\">Quóniam Deus magnus Dóminus
et rex magnus super omnes deos.
Quia in manu eius sunt profúnda terræ,
et altitúdines móntium ipsíus sunt.
Quóniam ipsíus est mare, et ipse fecit illud,
et siccam manus eius formavérunt.</td>";
$invitatoire.="<td class=\"droite\">
Parce que le Seigneur est le grand Dieu ; le grand Roi au-dessus de tous les dieux. 
Car dans Sa main sont les profondeurs de la terre, et que les hauteurs des montagnes sont à Lui. 
Parce qu'à Lui est la mer, et que c'est Lui-même qui l'a faite, et que Ses mains ont formé le continent. 
</td></tr>";

$invitatoire.= antienne($invit,$GLOBALS['lang']);

$invitatoire.="<tr><td class=\"gauche\">Veníte, adorémus et procidámus
et génua flectámus ante Dóminum, qui fecit nos,
quia ipse est Deus noster,
et nos pópulus páscuæ eius et oves manus eius.</td>";
$invitatoire.="<td class=\"droite\">
Venez, adorons, prosternons - nous devant Dieu, et fléchissons les genoux devant le Seigneur qui nous a faits, parce que Lui-même est notre Dieu,
 et que nous sommes Son peuple et les brebis de Sa main.
</td></tr>";

$invitatoire.= antienne($invit,$GLOBALS['lang']);

$invitatoire.="<tr><td class=\"gauche\">Utinam hódie vocem eius audiátis:
«Nolíte obduráre corda vestra,
sicut in Meríba secúndum diem Massa in desérto,
ubi tentavérunt me patres vestri:
probavérunt me, etsi vidérunt ópera mea.</td>";
$invitatoire.="<td class=\"droite\">
Si seulement aujourd'hui, vous entendiez Sa voix, n'endurcissez pas vos coeurs, 
comme à Mériba, comme au jour de Massa dans le désert, où Me tentèrent vos pères ; 
ils M'éprouvèrent, alors qu'ils avaient vu Mes oeuvres.
 </td></tr>";

$invitatoire.= antienne($invit,$GLOBALS['lang']);

$invitatoire.="<tr><td class=\"gauche\">Quadragínta annis tæduit me generatiónis illíus,
et dixi: Pópulus errántium corde sunt isti.
Et ipsi non cognovérunt vias meas;
ídeo iurávi in ira mea:
Non introíbunt in réquiem meam».</td>";
$invitatoire.="<td class=\"droite\">
Pendant quarante ans, J'ai été le dégoût de cette génération et J'ai dit : 
ils sont un peuple errant de coeur ; et eux, ils n'ont point connu Mes voies : 
c'est pourquoi Je leur ai juré dans Ma colère, ils n'entreront pas dans Mon repos.
</td></tr>";

$invitatoire.= antienne($invit,$GLOBALS['lang']);

$invitatoire.="<tr><td class=\"gauche\">Glória Patri, et Fílio, et Spirítui Sancto.
Sicut erat in princípio, et nunc et semper,
et in sæcula sæculórum. Amen.</td>";
$invitatoire.="<td class=\"droite\">Gloire au Père, au Fils et au Saint Esprit. 
Comme il était au commencement, maintenant et toujours, et dans les siècles des siècles. Amen.</td></tr>";

$invitatoire.= antienne($invit,$GLOBALS['lang']);

//print $invit[0];
//$invitatoire.= antienne($invit,$lang);

$invitatoire.="<tr><td class=\" ceremonial\"><hr>Si le psaume 94 est récité pendant la litugie de ce jour, à une des heures suivantes, on peut prendre un autre psaume comme invitatoire, au choix :</td></tr>";
/**** 
 * 
 * 
 * PSAUME 99
 * 
 * 
 * 
 **************/
$invitatoire.="<tr><td class=\"gauche rubrique\">vel:</td>";
$invitatoire.="<td class=\"droite rubrique\">ou :</td></tr>";
 
$invitatoire.="<tr><td class=\"gauche liturgie_titre\">Psalmus 99 (100)";
$invitatoire.="<td class=\"droite liturgie_titre\">Psaume 99 (100)</td></tr>";

$invitatoire.="<tr><td class=\"gauche liturgie_sous_titre\">Gaudium in templum ingredientium";
$invitatoire.="<td class=\"droite liturgie_sous_titre\">Joie de l&#x92;entr&#xE9;e dans le temple</td></tr>";


$invitatoire.="<tr><td class=\"gauche liturgie_italique\">
Redemptos iubet Dominus victoriæ carmen canere (S. Athanasius).</td>";
$invitatoire.="<td class=\"droite liturgie_italique\">
Le Seigneur invite les rachet&#xE9;s &#xE0; entonner un chant de victoire (S. Athanase).
</td></tr>";
$invitatoire.= antienne($invit,$GLOBALS['lang']);

$invitatoire.="<tr><td class=\"gauche\">Iubiláte Dómino, omnis terra, *
servíte Dómino in lætítia;
introíte in conspéctu eius *
in exsultatióne.
</td>";
$invitatoire.="<td class=\"droite\">
Acclamez Dieu, toute la terre; servez le Seigneur avec joie. 
Entrez en Sa pr&#xE9;sence * avec all&#xE9;gresse.
</td></tr>";
$invitatoire.= antienne($invit,$GLOBALS['lang']);
$invitatoire.="<tr><td class=\"gauche\">Scitóte quóniam Dóminus ipse est Deus; †
ipse fecit nos, et ipsíus sumus, *
pópulus eius et oves páscuæ eius.</td>";
$invitatoire.="<td class=\"droite\">
Sachez que c'est le Seigneur qui est Dieu; c'est Lui qui nous a faits, et non pas nous-m&#xEA;mes.
	 Nous sommes Son peuple, et les brebis de Son p&#xE2;turage.
	 </td></tr>";
$invitatoire.= antienne($invit,$GLOBALS['lang']);
$invitatoire.="<tr><td class=\"gauche\">
Introíte portas eius in confessióne, †
átria eius in hymnis, *
confitémini illi, benedícite nómini eius.</td>";
$invitatoire.="<td class=\"droite\">
Franchissez ses portes avec des louanges, ses parvis en chantant des hymnes; 
	c&#xE9;l&#xE9;brez-le, b&#xE9;nissez son nom.
</td></tr>";
$invitatoire.= antienne($invit,$GLOBALS['lang']);
$invitatoire.="<tr><td class=\"gauche\">
Quóniam suávis est Dóminus; †
in ætérnum misericórdia eius, *
et usque in generatiónem et generatiónem véritas eius.</td>";
$invitatoire.="<td class=\"droite\">
car le Seigneur est suave;  sa mis&#xE9;ricorde est &#xE9;ternelle, * 
	et sa v&#xE9;rit&#xE9; demeure de g&#xE9;n&#xE9;ration en g&#xE9;n&#xE9;ration.
</td></tr>";
$invitatoire.= antienne($invit,$GLOBALS['lang']);
$invitatoire.="<tr><td class=\"gauche\">Glória Patri, et Fílio, et Spirítui Sancto.
Sicut erat in princípio, et nunc et semper,
et in sæcula sæculórum. Amen.</td>";
$invitatoire.="<td class=\"droite\">Gloire au Père, au Fils et au Saint Esprit. 
Comme il était au commencement, maintenant et toujours, et dans les siècles des siècles. Amen.</td></tr>";
$invitatoire.= antienne($invit,$GLOBALS['lang']);
//print $invit[0];
//$GLOBALS['lang'];


/**** 
 * 
 * 
 * PSAUME 66
 * 
 * 
 * 
 **************/
$invitatoire.="<tr><td class=\"gauche rubrique\">vel:";
$invitatoire.="<td class=\"droite rubrique\">ou :</td></tr>";
 
 $invitatoire.="<tr><td class=\"gauche liturgie_titre\">Psalmus 66 (67)";
$invitatoire.="<td class=\"droite liturgie_titre\">Psaume 66 (67)</td></tr>";

$invitatoire.="<tr><td class=\"gauche liturgie_sous_titre\">Omnes gentes Domino confiteantur";
$invitatoire.="<td class=\"droite liturgie_sous_titre\">Toutes les nations rendront gloire au Seigneur</td></tr>";

$invitatoire.="<tr><td class=\"gauche liturgie_italique\">Notum sit vobis quoniam gentibus missum est hoc salutare Dei (Act 28, 28).</td>";
$invitatoire.="<td class=\"droite liturgie_italique\">Sachez que le salut de Dieu a &#xE9;t&#xE9; envoy&#xE9; aux gentils (Act 28, 28).</td></tr>";

$invitatoire.= antienne($invit,$GLOBALS['lang']);
$invitatoire.="<tr><td class=\"gauche\">Deus misereátur nostri et benedícat nobis; *
illúminet vultum suum super nos,
ut cognoscátur in terra via tua, *
in ómnibus géntibus salutáre tuum.
</td>";
$invitatoire.="<td class=\"droite\">Que Dieu nous soit favorable et qu'Il nous b&#xE9;nisse;  qu'Il illumine sur nous Son visage, 
afin que l'on connaisse sur la terre Ta voie, et parmi toutes les nations Ton salut.
</td></tr>";

$invitatoire.= antienne($invit,$GLOBALS['lang']);
$invitatoire.="<tr><td class=\"gauche\">Confiteántur tibi pópuli, Deus; *
confiteántur tibi pópuli omnes.
Læténtur et exsúltent gentes, †
quóniam iúdicas pópulos in æquitáte *
et gentes in terra dírigis.</td>";
$invitatoire.="<td class=\"droite\">
Que les peuples Te louent, &#xF4; Dieu ; que les peuples Te louent tous.
Que les nations se r&#xE9;jouissent, qu'elles soient dans l'all&#xE9;gresse ; car Tu juges les peuples avec droiture, et Tu conduis les nations sur la terre.</fr></ligne>
</td></tr>";

$invitatoire.= antienne($invit,$GLOBALS['lang']);
$invitatoire.="<tr><td class=\"gauche\">
Confiteántur tibi pópuli, Deus; *
confiteántur tibi pópuli omnes.
Terra dedit fructum suum; *
benedícat nos Deus, Deus noster,
benedícat nos Deus, *
et métuant eum omnes fines terræ.</td>";
$invitatoire.="<td class=\"droite\">
Que les peuples Te louent, &#xF4; Dieu, que les peuples Te louent tous.
La terre a donn&#xE9; son fruit ; que nous b&#xE9;nisse Dieu, notre Dieu,
que Dieu nous b&#xE9;nisse, et que toutes les extr&#xE9;mit&#xE9;s de la terre Le r&#xE9;v&#xE8;rent.
</td></tr>";

$invitatoire.= antienne($invit,$GLOBALS['lang']);
$invitatoire.="<tr><td class=\"gauche\">Glória Patri, et Fílio, et Spirítui Sancto.
Sicut erat in princípio, et nunc et semper,
et in sæcula sæculórum. Amen.</td>";
$invitatoire.="<td class=\"droite\">Gloire au Père, au Fils et au Saint Esprit. 
Comme il était au commencement, maintenant et toujours, et dans les siècles des siècles. Amen.</td></tr>";
$invitatoire.= antienne($invit,$GLOBALS['lang']);

/**** 
 * 
 * 
 * PSAUME 23
 * 
 * 
 * 
 **************/
$invitatoire.="<tr><td class=\"gauche rubrique\">vel:</td>";
$invitatoire.="<td class=\"droite rubrique\">ou :</td></tr>";
 
$invitatoire.="<tr><td class=\"gauche liturgie_titre\">Psalmus 23 (24)</td>";
$invitatoire.="<td class=\"droite liturgie_titre\">Psaume 23 (24)</td></tr>";

$invitatoire.="<tr><td class=\"gauche liturgie_sous_titre\">Domini in templum adventus";
$invitatoire.="<td class=\"droite liturgie_sous_titre\">Av&#xE8;nement de Dieu dans le Temple</td></tr>";

$invitatoire.="<tr><td class=\"gauche liturgie_italique\">Christo apertæ sunt portæ cæli propter carnalem eius assumptionem (S. Irenæus).</td>";
$invitatoire.="<td class=\"droite liturgie_italique\">Les portes du ciel se sont ouvertes au Christ parce qu&#x92;il a pris la nature humaine. (S. Ir&#xE9;n&#xE9;e)</td></tr>";

$invitatoire.= antienne($invit,$GLOBALS['lang']);
$invitatoire.="<tr><td class=\"gauche\">Dómini est terra et plenitúdo eius, *
orbis terrárum et qui hábitant in eo.
Quia ipse super mária fundávit eum *
et super flúmina firmávit eum.
</td>";
$invitatoire.="<td class=\"droite\">
Au Seigneur est la terre et tout ce qu'elle renferme, le monde et tous ceux qui l'habitent.
Car c'est Lui qui l'a fond&#xE9; sur les mers, et qui l'a &#xE9;tabli sur les fleuves.
</td></tr>";
$invitatoire.= antienne($invit,$GLOBALS['lang']);
$invitatoire.="<tr><td class=\"gauche\">Quis ascéndet in montem Dómini, *
aut quis stabit in loco sancto eius?
Innocens mánibus et mundo corde, †
qui non levávit ad vana ánimam suam, *
nec iurávit in dolum.
Hic accípiet benedictiónem a Dómino *
et iustificatiónem a Deo salutári suo.
Hæc est generátio quæréntium eum, *
quæréntium fáciem Dei Iacob.</td>";
$invitatoire.="<td class=\"droite\">
Qui montera sur la montagne du Seigneur, ou qui se tiendra dans son lieu saint ?
Celui qui a les mains innocentes et le coeur pur, qui n'a pas livr&#xE9; son &#xE2;me &#xE0; la vanit&#xE9;,
 ni fait &#xE0; son prochain un serment trompeur.
 Celui-l&#xE0; recevra la b&#xE9;n&#xE9;diction du Seigneur, et la mis&#xE9;ricorde de Dieu, son Sauveur.
 Telle est la race de ceux qui le cherchent, de ceux qui cherchent la face du Dieu de Jacob.
</td></tr>";
$invitatoire.= antienne($invit,$GLOBALS['lang']);
$invitatoire.="<tr><td class=\"gauche\">
Attóllite, portæ, cápita vestra, †
et elevámini, portæ æternáles, *
et introíbit rex glóriæ.
Quis est iste rex glóriæ? *
Dóminus fortis et potens, Dóminus potens in prœlio.</td>";
$invitatoire.="<td class=\"droite\">
Levez vos portes, &#xF4; princes, et &#xE9;levez-vous, portes &#xE9;ternelles,
  et le roi de gloire entrera.
  Qui est ce roi de gloire ? C'est le Seigneur fort et puissant, le Seigneur puissant dans les combats.

</td></tr>";
$invitatoire.= antienne($invit,$GLOBALS['lang']);

$invitatoire.="<tr><td class=\"gauche\">
Attóllite, portæ, cápita vestra, †
et elevámini, portæ æternáles, *
et introíbit rex glóriæ.
Quis est iste rex glóriæ? *
Dóminus virtútum ipse est rex glóriæ.
</td>";
$invitatoire.="<td class=\"droite\">
Levez vos portes, &#xF4; princes, et &#xE9;levez-vous, portes &#xE9;ternelles, et le roi de gloire entrera.
Quel est ce roi de gloire ?  Le Seigneur des arm&#xE9;es est Lui-m&#xEA;me ce roi de gloire.
</td></tr>";
$invitatoire.= antienne($invit,$GLOBALS['lang']);


$invitatoire.="<tr><td class=\"gauche\">Glória Patri, et Fílio, et Spirítui Sancto.
Sicut erat in princípio, et nunc et semper,
et in sæcula sæculórum. Amen.</td>";
$invitatoire.="<td class=\"droite\">Gloire au Père, au Fils et au Saint Esprit. 
Comme il était au commencement, maintenant et toujours, et dans les siècles des siècles. Amen.</td></tr>";
$invitatoire.= antienne($invit,$GLOBALS['lang']);

$invitatoire.="<tr><td class=\"gauche rubrique\">Psalmus cum sua antiphona, pro opportunitate, omitti potest quando Invitatorium Laudibus matutinis præponendum est.
";
$invitatoire.="<td class=\"droite rubrique\">Le psaume [invitatoire] avec son antienne, si c'est opportun, peut être omis lorsque l'invitatoire précède immédiatement les Laudes du matin. </td></tr>";
$invitatoire.= "</table>";
$invitatoire=rougis_verset($invitatoire);
return $invitatoire;
}

?>
