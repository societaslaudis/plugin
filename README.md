# plugin
Ceci est un plugin wordpress destiné à afficher les textes de la liturgie du jour (office divin et messe). Le calendrier qui est utilisé est générable en ligne de commande PHP-CLI avec le code présent dans l'autre dépôt https://github.com/societaslaudis/liturgia


Installez-le donc classiquement comme un plugin wordpress standar dans [racine_de_votre_site_]/wp-contents/plugins/

dans le fichier liturgia.php vous trouverez ce paramétrage :
$GLOBALS['edition']="on";
Grâce à cela, vous verrez apparaître à côté de chaque poièce un petit lien d'édition qui vous permettra de façon très simple, de mettre à jour le texte, soit en latin, soit dans sa traduction.

Règles pour les traductions sur Societas Laudis. 
- Usage du tutoiement de majesté avec majuscules pour Dieu. Exemple : "Dieu éternel et tout-puissant, Toi qui dans la prodigalité de Ton amour surpasses et les mérites et les vœux de ceux qui Te supplient, répands sur nous Ta miséricorde, afin de chasser tout ce que redoute la conscience et suppléer à ce que la prière n'ose demander." Pas de "vous" et pas de minuscule aux pronoms articles désignant Dieu.
- Usage du vouvoiement pour la Bse Vierge MArie (comme dans le "Je vous Salue Marie").
- Utilisation de la traduction Fillion, Crampon ou Glaire de la bible (en fonction de la meilleure correspondance avec le texte latin).
- Utilsiation de la néo vulgate pour les textes des lectures, avec accentuation latine.
