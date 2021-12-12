<?php
    include_once 'User.php';

    class UserDAO {


        public function getConnection(){
            $mysqli = new mysqli("127.0.0.1", "cs2033user", "Spring-2021", "cs2033");
            if ($mysqli->connect_errno) {
                $mysqli=null;
            }
            return $mysqli;
        }

        public function addUser($user){
            $connection=$this->getConnection();
            $stmt = $connection->prepare("INSERT INTO users (username, lastname, firstname, passwd, email, role) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssss", $user->getUsername(), $user->getLastname(), $user->getFirstname(), $user->getPasswd(), $user->getEmail(), $user->getRole());
            $stmt->execute();
            $stmt->close();
            $connection->close();
        }

        public function deleteUser($userid){
            $connection=$this->getConnection();
            $stmt = $connection->prepare("DELETE FROM users WHERE userID = ?");
            $stmt->bind_param("i", $userid);
            $stmt->execute();
            $stmt->close();
            $connection->close();
        }

        public function getUsers(){
            $connection=$this->getConnection();
            $stmt = $connection->prepare("SELECT * FROM users;"); 
            $stmt->execute();
            $result = $stmt->get_result();
            while($row = $result->fetch_assoc()){
                $user = new User();
                $user->load($row);
                $users[]=$user;
            }    
            $stmt->close();
            $connection->close();
            return $users;
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
