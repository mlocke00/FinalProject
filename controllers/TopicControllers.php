<?php
    //include "ControllerAction.php";
    //include "model/TopicDAO.php";


    class TopicList implements ControllerAction{

        function processGET(){
            $topicDAO = new TopicDAO();
            $topics = $topicDAO->getTopics();
            $_REQUEST['topics']=$topics;
            return "views/listTopic.php";
        }

        function processPOST(){
            return;
        }

        function getAccess(){
            return "PROTECTED";
        }

    }

    class TopicAdd implements ControllerAction{

        function processGET(){
            return "views/addTopic.php";
        }

        function processPOST(){
            $name=$_POST['name'];
            $description=$_POST['description'];
            $topic = new Topic();
            $topic->setName($name);
            $topic->setDescription($description);
            $topicDAO = new TopicDAO();
            $topicDAO->addTopic($topic);
            header("Location: controller.php?page=list");
            exit;
        }

        function getAccess(){
            return "PROTECTED";
        }      

    }

    class TopicDelete implements ControllerAction{

        function processGET(){
            $userid = $_GET['topID'];
            return 'views/delTopic.php';

        }

        function processPOST(){
            $topid=$_POST['topID'];
            $submit=$_POST['submit'];
            if($submit=='CONFIRM'){
                $topicDAO = new TopicDAO();
                $topicDAO->deleteTopic($topid);
            }
            header("Location: controller.php?page=list");
            exit;
        }

        function getAccess(){
            return "PROTECTED";
        }

    }

    class Login implements ControllerAction{

        function processGET(){
            return "views/login.php";
        }

        function processPOST(){
            $username=$_POST['username'];
            $passwd=$_POST['passwd'];
            $userDAO = new UserDAO();
            $found=$userDAO->authenticate($username,$passwd);
            if($found==null){
                $nextView="Location: controller.php?page=login";
            }else{
                $nextView="Location: controller.php?page=list";
                $_SESSION['loggedin']='TRUE';
            }
            header($nextView);
            exit;       
        }
        function getAccess(){
            return "PUBLIC";
        }

    }

    class Home implements ControllerAction{

        function processGET(){
            return "views/home.php";
        }

        function processPOST(){
            return;
        }

        function getAccess(){
            return "PUBLIC";
        }

    }

    class About implements ControllerAction{

        function processGET(){
            return "views/about.php";
        }

        function processPOST(){
            return;
        }

        function getAccess(){
            return "PUBLIC";
        }

    }
?>