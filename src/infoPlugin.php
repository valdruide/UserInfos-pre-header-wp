<?php

namespace InfosUtilisateur\InfosUtilisateur;

use InfosUtilisateur\InfosUtilisateur\controller\AdminController;

class infoPlugin{

    const INFO_UTILISATEUR_ACTIVATED = 'info_utilisateur_activated';

    public function __construct(string $file){
        register_activation_hook($file, [$this, 'pluginActivation']);
        add_action('admin_notices', [$this, 'notice_activation']);

        if(is_admin()){
            $adminController = new AdminController();
        }
    }

    public function pluginActivation(): void{
        set_transient(self::INFO_UTILISATEUR_ACTIVATED, true);
    }

    public function notice_activation(): void{
        if (get_transient(self::INFO_UTILISATEUR_ACTIVATED)){
            self::render('notice', [
                'message' => "Merci d'avoir activé <strong>Infos Utilisateur</strong> !"
            ]);
            delete_transient(self::INFO_UTILISATEUR_ACTIVATED);
        }
    }

    public static function render(string $name, array $args = []){
        extract($args);
        $file = INFOS_UTILISATEUR_DIR . "views/$name.php";
        ob_start();
        include_once($file);
        echo ob_get_clean();
    }

}

