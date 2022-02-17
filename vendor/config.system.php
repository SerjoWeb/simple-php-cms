<?php

    /**
     * Class Config Sytem
     */
    Class ConfigSystem {
        /**
         * Private and static constants
         */
        private static $instance = null;
        private $URL = null;
        private $PAGE = null;
        
        /**
         * Private Function Constructor
         */
        private function __construct() {
            $this->URL = $this->returnSaveValue($_SERVER["REQUEST_URI"]);
        }

        /**
         * Public Function GetInstance
         * returns self instance (Singleton pattern)
         */
        public static function getInstance() {
            if(!self::$instance) {
                self::$instance = new ConfigSystem();
            }

            return self::$instance;
        }

        /**
         * Public Function Init
         */
        public function init() {
            $this->getAllErrors();
            $this->admitURL();
            $this->showSite();
        }

        /**
         * Private function Show errors
         * Useable for development mode
         */
        private function getAllErrors() {
            error_reporting(E_ALL);
            ini_set("display_errors", 1);
        }

        /**
         * Private Function Return safe value
         */
        private function returnSaveValue($val) {
            return stripslashes(strip_tags(trim(htmlentities(htmlspecialchars(urldecode($val))))));
        }

        /**
         * Private Function Admit URL
         */
        private function admitURL() {
            $url = str_split($this->URL);
            $url = end($url);

            if($url !== "/") {
                $parse = $this->URL . "/";
                header("location: " . $parse);
            }
        }

        /**
         * Private Function Parse URL
         */
        private function parseURL() {
            $pageCaption = null;
                
            if($this->URL !== "/") {
                $url   = explode("/", $this->URL);
                $parse = array();
            
                for($i = 0; $i < count($url); $i++) {
                    if(!preg_match("/($^)/", $url[$i])) {
                        array_push($parse, $url[$i]);
                    }
                }
        
                $pageCaption = $this->returnSaveValue(preg_replace('/\s+/', '', $parse[0]));
            }
    
            return $pageCaption;
        }

        /**
         * Private Function Require files and pass params
         */
        private function requireWithParams($filename, $params) {
            extract($params);
            require_once($filename);
        }

        /**
         * Private Function show Site
         */
        private function showSite() {
            if ($this->parseURL() == "" || $this->parseURL() == "/") {
                if(file_exists("site/index.php") && file_exists("site/views/main.php")) {
                    $this->PAGE = "site/views/main.php";
                    $this->requireWithParams("site/index.php", array("page"=>$this->PAGE));
                } else {
                    header("location: /page-not-found");
                }
            } else {
                if ($this->parseURL() == "cms") {
                    $this->showCMS();
                } else {
                    if(file_exists("site/index.php") && file_exists("site/views/" . $this->parseURL() . ".php")) {
                        $this->PAGE = "site/views/" . $this->parseURL() . ".php";
                        $this->requireWithParams("site/index.php", array("page"=>$this->PAGE));
                    } else {
                        header("location: /page-not-found");
                    }
                }
            }
        }

        /**
         * Private Function Show CMS panel
         */
        private function showCMS() {
            if ($this->parseURL() == "cms") {
                if(file_exists("frontend/index.php")) {
                    require_once("frontend/index.php");
                } else {
                    throw new Exception("CMS Panel is not available!");
                }
            } else {
                header("location: /");
            }
        }
    }

?>