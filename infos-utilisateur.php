<?php
/*
Plugin Name: UserInfos-pre-header
Plugin URI: https://tristan-viard.fr
Description: Displays a banner at the top of the site with information for users
Author: Tristan Viard x Jean-Baptiste Berthouly
Version: 0.7
Author URI: https://tristan-viard.fr
*/

defined( 'ABSPATH' or die ("Hey you have nothing to do here"));
define('INFOS_UTILISATEUR_DIR', plugin_dir_path(__FILE__));
require INFOS_UTILISATEUR_DIR . 'vendor/autoload.php';
use InfosUtilisateur\InfosUtilisateur\infoPlugin;

$plugin = new infoPlugin(__FILE__);



if (get_option('infos_utilisateur_general') === '1') {
    add_action('wp_head', 'bandeau_page');
}



function bandeau_page(){
    $color_info_value =  ( get_option('color_infos') ? get_option('color_infos') : '#000000') ;
    $text_color_info_value =  ( get_option('text_color_infos') ? get_option('text_color_infos') : '#fff') ;

    ?>
    <style>
        .preHeader{
            background-color : <?php echo $color_info_value ?>;
			padding: 10px;
			display: flex;
			align-items: center;
			justify-content: center;
			width: 100vw;
			position: relative;
			left: 50%;
			right: 50%;
			margin-left: -50vw;
			margin-right: -50vw;
			z-index: 9999;
		}
		
		.preHeader p{
			color : <?php echo $text_color_info_value ?>;
			font-size: 1.1em;
			margin: 0;
            text-align: center;
		}
    </style>
    <?php

	if(get_option('sticky_infos') === '1'){
	?>
	<style>
		.preHeader{
			position: fixed!important;
			top: 0;
		}
		header{
			top: 45px!important;
		}
	</style>
	<?php
	}

    echo('
        <div class="preHeader">
			<p>' . get_option('text_infos') . '</p>
		</div>
    ');
}

?>