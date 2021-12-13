<?php
    include_once 'Comment.php';

    class CommentDAO {


        public function getConnection(){
            $mysqli = new mysqli("127.0.0.1", "cs2033user", "Spring-2021", "cs2033");
            if ($mysqli->connect_errno) {
                $mysqli=null;
            }
            return $mysqli;
        }

        public function addComment($comment){
            $connection=$this->getConnection();
            $stmt = $connection->prepare("INSERT INTO comments (content) VALUES (?)");
            $stmt->bind_param("s", $comment->getContent());
            $stmt->execute();
            $stmt->close();
            $connection->close();
        }

        public function deleteComment($comid){
            $connection=$this->getConnection();
            $stmt = $connection->prepare("DELETE FROM comments WHERE comID = ?");
            $stmt->bind_param("i", $comid);
            $stmt->execute();
            $stmt->close();
            $connection->close();
        }

        public function getComments(){
            $connection=$this->getConnection();
            $stmt = $connection->prepare("SELECT * FROM comments;"); 
            $stmt->execute();
            $result = $stmt->get_result();
            while($row = $result->fetch_assoc()){
                $comment = new Comment();
                $comment->load($row);
                $comments[]=$comment;
            }    
            $stmt->close();
            $connection->close();
            return $comments;
        }

        public function authenticate($username, $passwd){
            $connection=$this->getConnection();
            $stmt = $connection->prepare("SELECT * FROM users WHERE username = ? and passwd = ?;");
            $stmt->bind_param("ss",$username,$passwd); 
            $stmt->execute();
            $result = $stmt->get_result();
            $found=$result->fetch_assoc();
            $stmt->close();
            $connection->close();
            var_dump($found);
            return $found;
        }



    }
?>
