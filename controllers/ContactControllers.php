<?php
    //include "ControllerAction.php";
    //include "model/UserDAO.php";


    class UserList implements ControllerAction{

        function processGET(){
            $userDAO = new UserDAO();
            $users = $userDAO->getUsers();
            $_REQUEST['users']=$users;
            return "views/listUser.php";
        }

        function processPOST(){
            return;
        }

        function getAccess(){
            return "PROTECTED";
        }

    }

    class UserAdd implements ControllerAction{

        function processGET(){
            return "views/addUser.php";
        }

        function processPOST(){
            $username=$_POST['username'];
            $lastname=$_POST['lastname'];
            $firstname=$_POST['firstname'];
            $passwd=$_POST['passwd'];
            $email=$_POST['email'];
            $role=$_POST['role'];
            $user = new User();
            $user->setUsername($username);
            $user->setLastname($lastname);
            $user->setFirstname($firstname);
            $user->setPasswd($passwd);
            $user->setEmail($email);
            $user->setRole($role);
            $userDAO = new UserDAO();
            $userDAO->addUser($user);
            header("Location: controller.php?page=list");
            exit;
        }

        function getAccess(){
            return "PROTECTED";
        }      

    }

    class UserDelete implements ControllerAction{

        function processGET(){
            $userid = $_GET['userID'];
            return 'views/delUser.php';

        }

        function processPOST(){
            $userid=$_POST['userID'];
            $submit=$_POST['submit'];
            if($submit=='CONFIRM'){
                $userDAO = new UserDAO();
                $userDAO->deleteUser($userid);
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