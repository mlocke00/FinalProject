<?php
    class User{
        private $userID;
        private $username;
        private $lastname;
        private $firstname;
        private $passwd;
        private $email;
        private $role;
        private $lastModified;
        

        public function load($row){
            $this->setUserID($row['userID']);
            $this->setUsername($row['username']);
            $this->setLastname($row['lastname']);
            $this->setFirstname($row['firstname']);
            $this->setPasswd($row["passwd"]);
            $this->setEmail($row["email"]);
            $this->setRole($row['role']);
            $this->setLastModified($row['lastModified']);
        }

        public function setUserID($userID){
            $this->userID=$userID;
        }

        public function getUserID(){
            return $this->userID;
        }

        public function setUsername($username){
            $this->username=$username;
        }

        public function getUsername(){
            return $this->username;
        }

        public function setLastname($lastname){
            $this->lastname=$lastname;
        }

        public function getLastname(){
            return $this->lastname;
        }

        public function setFirstname($firstname){
            $this->firstname=$firstname;
        }

        public function getFirstname(){
            return $this->firstname;
        }

        public function setEmail($email){
            $this->email=$email;
        }

        public function getEmail(){
            return $this->email;
        }

        public function setPasswd($passwd){
            $this->passwd=$passwd;
        }

        public function getPasswd(){
            return $this->passwd;
        }

        public function setRole($role){
            $this->role=$role;
        }

        public function getRole(){
            return $this->role;
        }

        public function setLastModified($lastModified){
            $this->lastModified=$lastModified;
        }

        public function getLastModified(){
            return $this->lastModified;
        }
    }
?>