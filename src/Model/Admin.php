<?php
    class Admin{
        private $id;
        public function __construct($id){
            $this->id = $id;
        }

        function getId(){
            return $this->id;
        }

        function banUser(int $userId, int $daysBanned, $conn){
            date_default_timezone_set('utc');
            $intreval = DateInterval::createFromDateString($daysBanned . "day");
            $banDate = ((new DateTime())->add($intreval))->format('Y-m-d');
            $banStr = "UPDATE profile SET `banned_until`='$banDate' WHERE `id`='$userId'";
            $banStatement = $conn->prepare($banStr);
            $banStatement->execute();
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