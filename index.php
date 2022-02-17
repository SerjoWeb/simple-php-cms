<?php

    /**
     * Try Catch to start app
     */
    try {
        /**
         * Requre once vendor -> config
         */
        if(file_exists("vendor/config.system.php")) {
            require_once("vendor/config.system.php");

            /**
             * Create an instance and initialize the app (singleton)
             */
            try {
                $instance = ConfigSystem::getInstance();
                $instance->init();
            } catch(Exception $e) {
                echo "Fatal Error: " .$e->getMessage();
                return;
            }
        } else {
            throw new Exception("App is not available!");
        }
    } catch(Exception $e) {
        echo "Fatal Error: " .$e->getMessage();
        return;
    }

?>