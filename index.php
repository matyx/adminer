<?php

function adminer_object() {
    // required to run any plugin
    include_once "./plugins/plugin.php";

    // autoloader
    foreach (glob("plugins/*.php") as $filename) {
        include_once "./$filename";
    }

    $plugins = array(
        // specify enabled plugins here
        new AdminerTablesFilter,
        new AdminerDumpPhpPrototype,
        new AdminerForeignSystem,
        new FillLoginForm(getenv('ADMINER_DEFAULT_DRIVER') ?? 'server', getenv('ADMINER_DEFAULT_HOST') ?? false, getenv('ADMINER_DEFAULT_USER') ?? false, getenv('ADMINER_DEFAULT_PASSWORD') ?? false, getenv('ADMINER_DEFAULT_DATABSE') ?? false),
    );

    /* It is possible to combine customization and plugins:
    class AdminerCustomization extends AdminerPlugin {
    }
    return new AdminerCustomization($plugins);
    */

    return new AdminerPlugin($plugins);
}

// include original Adminer or Adminer Editor
include "./adminer.php";
