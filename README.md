# plugin_WP_IMC
Ce plugin d'IMC (indice de masse corporel) adapté pour WordPress

Pour utilisé ce plugin, vous devez mettre un block "code court" puis d'y écrire "[votre_imc]" pour l'afficher sur la page que vous souhaitez

Pour créer ce plugin, j'ai commencé par documenté le plugin. J'ai ensuite réalisé un hérédoc pour afficher le formulaire qui permettra d'entrer vos informations (poids et taille) et une condition ternaire pour déterminer l'interprétation de la masse corporel.
J'ai regroupé la condition ternaire imbriqué et mon formulaire dans une fonction qui sera exéuté par un hook d'action (ligne 49) qui permettra d'exécuter la fonction quand le shortcode sera présent sur le site.
