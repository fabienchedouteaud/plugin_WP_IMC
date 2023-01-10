<?php
/**
 * @package Calcul_IMC
 * @version 0.1
 */
/*
Plugin Name: Calcul IMC
Plugin URI: http://wordpress.org/plugins/calcul-imc.php
Description: le plugin Calcul IMC permet d'obtenir notre imc en fonction de notre taille et de notre poids
Author: Fabien Chedouteaud
Version: 0.1
Licence GPL2 : http://wordpress.org/licence.txt
*/

function imc_shortcode() {

    if(!isset($_POST["imc_poids"], $_POST['imc_taille'])) {
        $sortie = <<<EOF
            <form method="post">
                <div class="champ">
                    <label for="imc_taille">Votre taille :</label>
                    <input type="number" name="imc_taille" id="imc_taille">
                </div>
                <div class="champ">
                    <label for="imc_poids">Votre poids :</label>
                    <input type="number" name="imc_poids" id="imc_poids">
                </div>

                <input type="submit" value="Envoyer">
            </form>
        EOF;

    } else {
        $var = round($_POST["imc_poids"] / (($_POST["imc_taille"] / 100)**2), 0);

        $text = ( $var < 18.5 ) ? "Insuffisance pondérale (maigreur)" : 
            (( $var >= 18.5 && $var < 25 ) ? "Corpulence normale" :
            (( $var >= 25 && $var < 30 ) ? "Surpoids" :
            (( $var >= 30 && $var < 35 ) ? "Obésité modérée" :
            (( $var >= 35 && $var < 40 ) ? "Obésité sévère" :
            "Obésité morbide ou massive"))));

        $sortie = '<p>Avec ' . $var . ' Kg/m<sup>2</sup>, vous &ecirc;tes en ' . $text . '</p>';   
    }
    return $sortie;
}


add_shortcode('votre_imc', 'imc_shortcode');
