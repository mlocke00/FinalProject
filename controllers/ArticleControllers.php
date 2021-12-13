<?php
    //include "ControllerAction.php";
    //include "model/ArticleDAO.php";


    class ArticleList implements ControllerAction{

        function processGET(){
            $articleDAO = new ArticleDAO();
            $articles = $articleDAO->getArticles();
            $_REQUEST['articles']=$articles;
            return "views/listArticle.php";
        }

        function processPOST(){
            return;
        }

        function getAccess(){
            return "PROTECTED";
        }

    }

    class ArticleAdd implements ControllerAction{

        function processGET(){
            return "views/addArticle.php";
        }

        function processPOST(){
            $title=$_POST['title'];
            $image=$_POST['image'];
            $content=$_POST['content'];
            $article = new Article();
            $article->setTitle($title);
            $article->setImage($image);
            $article->setContent($content);
            $articleDAO = new ArticleDAO();
            $articleDAO->addArticle($article);
            header("Location: controller.php?page=list");
            exit;
        }

        function getAccess(){
            return "PROTECTED";
        }      

    }

    class ArticleDelete implements ControllerAction{

        function processGET(){
            $artid = $_GET['artID'];
            return 'views/delArticle.php';

        }

        function processPOST(){
            $artid=$_POST['artID'];
            $submit=$_POST['submit'];
            if($submit=='CONFIRM'){
                $articleDAO = new ArticleDAO();
                $articleDAO->deleteArticle($artid);
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