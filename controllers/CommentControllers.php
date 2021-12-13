<?php
    //include "ControllerAction.php";
    //include "model/CommentDAO.php";


    class CommentList implements ControllerAction{

        function processGET(){
            $commentDAO = new CommentDAO();
            $comments = $commentDAO->getComments();
            $_REQUEST['comments']=$comments;
            return "views/listComment.php";
        }

        function processPOST(){
            return;
        }

        function getAccess(){
            return "PROTECTED";
        }

    }

    class CommentAdd implements ControllerAction{

        function processGET(){
            return "views/addComment.php";
        }

        function processPOST(){
            $content=$_POST['content'];
            $comment = new Comment();
            $comment->setContent($content);
            $commentDAO = new CommentDAO();
            $commentDAO->addComment($comment);
            header("Location: controller.php?page=list");
            exit;
        }

        function getAccess(){
            return "PROTECTED";
        }      

    }

    class CommentDelete implements ControllerAction{

        function processGET(){
            $comid = $_GET['comID'];
            return 'views/delComment.php';

        }

        function processPOST(){
            $comid=$_POST['comID'];
            $submit=$_POST['submit'];
            if($submit=='CONFIRM'){
                $commentDAO = new CommentDAO();
                $commentDAO->deleteComment($comid);
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