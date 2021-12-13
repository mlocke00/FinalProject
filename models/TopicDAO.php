<?php
    include_once 'Topic.php';

    class TopicDAO {


        public function getConnection(){
            $mysqli = new mysqli("127.0.0.1", "cs2033user", "Spring-2021", "cs2033");
            if ($mysqli->connect_errno) {
                $mysqli=null;
            }
            return $mysqli;
        }

        public function addTopic($topic){
            $connection=$this->getConnection();
            $stmt = $connection->prepare("INSERT INTO topics (name, description) VALUES (?, ?)");
            $stmt->bind_param("ss", $topic->getName(), $topic->getDescription());
            $stmt->execute();
            $stmt->close();
            $connection->close();
        }

        public function deleteTopic($topid){
            $connection=$this->getConnection();
            $stmt = $connection->prepare("DELETE FROM topics WHERE topID = ?");
            $stmt->bind_param("i", $topid);
            $stmt->execute();
            $stmt->close();
            $connection->close();
        }

        public function getTopics(){
            $connection=$this->getConnection();
            $stmt = $connection->prepare("SELECT * FROM topics;"); 
            $stmt->execute();
            $result = $stmt->get_result();
            while($row = $result->fetch_assoc()){
                $topic = new Topic();
                $topic->load($row);
                $topics[]=$topic;
            }    
            $stmt->close();
            $connection->close();
            return $topics;
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
