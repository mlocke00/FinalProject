<?php
    include_once "controllers/ControllerAction.php";
    include_once "controllers/UserControllers.php";
    include_once "controllers/TopicControllers.php";
    include_once "controllers/ArticleControllers.php";
    include_once "controllers/CommentControllers.php";
    include_once "models/UserDAO.php";
    include_once "models/TopicDAO.php";
    include_once "models/ArticleDAO.php";
    include_once "models/CommentDAO.php";

    class FrontController { 
        private $controllers;
        

        public function __construct(){
            $this->showErrors(0);
            $this->controllers = $this->loadControllers();
        }

        public function run(){
            session_start();

            //***** 1. Get Request Method and Page Variable *****/
            $method = $_SERVER['REQUEST_METHOD'];
            $page = $_REQUEST['page'];
        
            //***** 2. Route the Request to the Controller Based on Method and Page *** */
            $controller = $this->controllers[$method.$page];
            
            //** 3. Check Security Access ***/
            $controller = $this->securityCheck($controller);

            //** 4. Execute the Controller */
            if($method=='GET'){
                $content=$controller->processGET();
            }
            if($method=='POST'){
                $controller->processPOST();
            }

            //**** 5. Render Page Template */
            include "template/template.php";
        }

        private function loadControllers(){
        /******************************************************
         * Register the Controllers with the Front Controller *
         ******************************************************/
            $controllers["GET"."list"] = new UserList();
            $controllers["GET"."add"] = new UserAdd();
            $controllers["POST"."add"] = new UserAdd();
            $controllers["GET"."delete"] = new UserDelete();
            $controllers["POST"."delete"] = new UserDelete();
            $controllers["GET"."list"] = new TopicList();
            $controllers["GET"."add"] = new TopicAdd();
            $controllers["POST"."add"] = new TopicAdd();
            $controllers["GET"."delete"] = new TopicDelete();
            $controllers["POST"."delete"] = new TopicDelete();
            $controllers["GET"."list"] = new ArticleList();
            $controllers["GET"."add"] = new ArticleAdd();
            $controllers["POST"."add"] = new ArticleAdd();
            $controllers["GET"."delete"] = new ArticleDelete();
            $controllers["POST"."delete"] = new ArticleDelete();
            $controllers["GET"."list"] = new CommentList();
            $controllers["GET"."add"] = new CommentAdd();
            $controllers["POST"."add"] = new CommentAdd();
            $controllers["GET"."delete"] = new CommentDelete();
            $controllers["POST"."delete"] = new CommentDelete();
            $controllers["GET"."login"] = new Login();
            $controllers["POST"."login"] = new Login();
            $controllers["GET"."home"] = new Home();
            $controllers["GET"."about"] = new About();
            return $controllers;
        }

        private function securityCheck($controller){
        /******************************************************
         * Check Access restrictions for selected controller  *
         ******************************************************/
            if($controller->getAccess()=='PROTECTED'){
                if(!isset($_SESSION['loggedin'])){
                    //*** Not Logged In ****/
                    $controller = $this->controllers["GET"."login"];
                }
            }
            return $controller;
        }

        private function showErrors($debug){
            if($debug==1){
                ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                error_reporting(E_ALL);
            }
        }
    }

    $controller = new FrontController();
    $controller->run();
?>