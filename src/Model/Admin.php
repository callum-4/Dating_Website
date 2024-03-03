<?php
    class Admin{
        private $id;
        private $email;
        public function __construct($id, $email){
            $this->id = $id;
            $this->email = $email;

            //$this->password = $password
            //db hash and put into the db
        }

        function getId(){
            return $this->id;
        }

        function getEmail(){   
            return $this->email;
        }

        function setEmail($email){
            $this->email = $email;
        }

        function banUser($userId, $daysBanned){
            date_default_timezone_set('Ireland/Dublin');
            //$user = db.getUser($userId);
            //$user.setBannedUntill(date('Y-m-d', strtotime("+$daysBanned days"))
            return date('Y-m-d', strtotime("+30 days"));
        }

        function editProfile(){
            //finnish once profile complete
        }

        function deleteUser($userId){
            //db.deleteUser($userId)
            //db should cascade to all instances
        }

        function deleteAd($adId){
            //db.deleteAd($adId)
        }
    }
?>