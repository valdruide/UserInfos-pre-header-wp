<style>
    .infoUserCotainer h1{
        font-size: 2.5em;
        margin-top: 25px;
        font-weight: 500;
    }

    .infoUserContainer .form-table th{
        width: 280px;
        font-size: 1.2em;
    }

    .infoUserContainer textarea{
        resize: none;
    }
</style>

<div class="wrap">
    <div class="infoUserCotainer">
        <h1>Configuration du bandeau d'information aux utilisateurs en haut de page</h1>
        <form method="post" action="options.php">
            <?php settings_fields('infos_utilisateur_general') ?>
            <?php do_settings_sections('infos-utilisateurs') ?>
            <?php submit_button(); ?>
        </form>
    </div>
</div>