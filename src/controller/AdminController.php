<?php

namespace InfosUtilisateur\InfosUtilisateur\controller;

use InfosUtilisateur\InfosUtilisateur\infoPlugin;

class AdminController{


    public function __construct(){
        $this->init_hooks();
    }

    public function init_hooks(){
        add_action('admin_menu', [$this, 'admin_menu']);
        add_action('admin_init', [$this, 'admin_init']);
        add_action('admin_enqueue_scripts', [$this, 'info_user_addons_enqueue']);
        add_action('admin_enqueue_scripts', [$this, 'enqueue_admin_js']);
    }

    public function info_user_addons_enqueue(){
        wp_enqueue_style('wp-color-picker');
    }

    public function enqueue_admin_js() { 
        wp_enqueue_script( 'infos_utilisateur_js', plugins_url( 'infos_utilisateur_js.js', __FILE__ ), array( 'jquery', 'wp-color-picker' ), '', true );
    }

    public function admin_menu(){
        add_menu_page(
            'Infos utilisateurs',
            'Infos utilisateurs',
            'manage_options',
            'infos-utilisateurs',
            [$this, 'config_page'],
            'dashicons-info',
            3
        );
    }

    public function config_page(){
        infoPlugin::render('config');
    }

    public function admin_init(){
        register_setting('infos_utilisateur_general', 'infos_utilisateur_general');
        register_setting('infos_utilisateur_general', 'sticky_infos');
        register_setting('infos_utilisateur_general', 'text_infos');
        register_setting('infos_utilisateur_general', 'color_infos');
        register_setting('infos_utilisateur_general', 'text_color_infos');
        add_settings_section('infos_utilisateur_main', null, null, 'infos-utilisateurs');
        add_settings_field('bandeau_activated', 'Activer le bandeau :', [$this, 'bandeau_activated_render'], 'infos-utilisateurs', 'infos_utilisateur_main');
        add_settings_field('sticky_infos', 'Sticky :', [$this, 'sticky_infos_render'], 'infos-utilisateurs', 'infos_utilisateur_main');
        add_settings_field('text_infos', 'Texte :', [$this, 'text_render'], 'infos-utilisateurs', 'infos_utilisateur_main');
        add_settings_field('color_infos', 'Couleur du bandeau :', [$this, 'color_render'], 'infos-utilisateurs', 'infos_utilisateur_main');
        add_settings_field('text_color_infos', 'Couleur du texte :', [$this, 'text_color_render'], 'infos-utilisateurs', 'infos_utilisateur_main');
    }

    public function bandeau_activated_render(){
        ?>
            <input type="checkbox" name="infos_utilisateur_general" value='1' 
            <?php checked(1, get_option('infos_utilisateur_general'), true); ?> /> 
            <small>Activer / désactiver</small>
        <?php
    }

    public function sticky_infos_render(){
        ?>
            <input type="checkbox" name="sticky_infos" value='1' 
            <?php checked(1, get_option('sticky_infos'), true); ?> /> 
            <small>Activer / désactiver</small>
        <?php
    }

    public function text_render(){
        $text_info_value = get_option('text_infos');
        ?>
            <textarea name="text_infos" rows="5" cols="100"><?php echo isset($text_info_value) ? esc_textarea($text_info_value) : 'Changez le texte' ?></textarea>
        <?php
    }

    public function color_render(){
        $color_info_value = get_option('color_infos');
        ?>
            <input name="color_infos" type="text" value="<?php echo esc_attr(get_option('color_infos')) ? get_option('color_infos') : '#000000' ?>" class="infos-color-picker">
        <?php
    }

    public function text_color_render(){
        $text_color_info_value = get_option('text_color_infos');
        ?>
            <input name="text_color_infos" type="text" value="<?php echo esc_attr(get_option('text_color_infos')) ? get_option('text_color_infos') : '#fff' ?>" class="infos-color-picker">
        <?php
    }

}
