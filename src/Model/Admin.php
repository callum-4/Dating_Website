<?php
class Admin
{
    private $id;
    public function __construct($id)
    {
        $this->id = $id;
    }

    function getId()
    {
        return $this->id;
    }

    function banUser(int $userId, int $daysBanned, $conn)
    {
        date_default_timezone_set('utc');
        $intreval = DateInterval::createFromDateString($daysBanned . "day");
        $banDate = ((new DateTime())->add($intreval))->format('Y-m-d');
        $banStr = "UPDATE profile SET `banned_until`='$banDate' WHERE `id`='$userId'";
        $banStatement = $conn->prepare($banStr);
        $banStatement->execute();
    }

    function editProfile()
    {
        //finnish once profile complete
    }

    function deleteUser(int $userId, $conn)
    {//delete and then insert to get the cascade
        $delStr = "DELETE FROM profile WHERE `id`=$userId;
        INSERT INTO `profile`(`id`,`banned_until`) VALUES ($userId,'9999-12-31')";
        $deleteStatement = $conn->prepare($delStr);
        $deleteStatement->execute();
    }

    function deleteAd($adId)
    {
        //db.deleteAd($adId)
    }
}