<?php
class Profile{

    public $id;
    public $email;
    public $gender;
    public $name;
    public $dob;
    public $description;
    public $interests;
    public $bannedUntil;


    function __construct($id, $email, $gender, $name, $dob, $description, $interests, $bannedUntil){
    $this->id = $id;
    $this->email = $email;
    $this->gender = $gender;
    $this->name = $name;
    $this->dob = $dob;
    $this->description = $description;
    $this->interests = $this->createInterestsArray($interests);
    $this->bannedUntil = new DateTime('2000-10-10'); //deafult banned until
    }

    

    function get_profile() {
        return [
            'id' => $this->id,
            'email' => $this->email,
            'gender' => $this->gender,
            'name' => $this->name,
            'dob' => $this->dob,
            'description' => $this->description,
            'interests' => $this->interests,
            'bannedUntil'=> $this->bannedUntil
        ];
    }

    function createInterestsArray(string $interests){
        $interestUntrimmed =  preg_split("/\,/", $interests);
        $interestsTrimmed = array();
        for($i=0; $i < count($interestUntrimmed); $i++){
            $interestsTrimmed[$i] = trim($interestUntrimmed[$i], " \n\r\t\v\x00,");
        }
        return $interestsTrimmed;
    }

    function getInsertIntrestsQuery(){
        $interestsQuery = 'INSERT INTO `profile_interest` (`profile_id`, `interest`) VALUES ';
        $query_parts = array();
        for($x=0; $x<count($this->interests); $x++){
            $query_parts[] = "('" . $this->id . "', '" . $this->interests[$x] . "')";
        }
        $interestsQuery .= implode(',', $query_parts);
        return $interestsQuery;
    }

    function getUpdateProfileInDBQuery(){
        return "UPDATE profile SET `name`='$this->name', `gender`='$this->gender', `description`='$this->description',  `datetime_of_birth`='$this->dob' WHERE `id`='$this->id'";
    }
}
?>

