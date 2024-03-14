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
    public $zodiacSign;

    function __construct($id, $email, $gender, $name, $dob, $description, $interests, $bannedUntil){
        $this->id = $id;
        $this->email = $email;
        $this->gender = $gender;
        $this->name = $name;
        $this->dob = $dob;
        $this->description = $description;
        $this->interests = $this->createInterestsArray($interests);
        $this->bannedUntil = new DateTime('2000-10-10'); //deafult banned until
        $this->makeZodiacSign();
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
            'bannedUntil'=> $this->bannedUntil,
            'zodiacSign'=> $this->zodiacSign
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

    private function makeZodiacSign(){
        $year = '2000';//compare only months and ignore the year
        $this->dob->format($year."-m-d");
        if ($this->dob <= new DateTime("2000-01-29")) {
            $this->zodiacSign = "Capricorn";
            return;
        }
        $zodiacs = array(
            "Aquarius"=>"2000-02-18",
            "Pisces"=>"2000-03-20",
            "Aries"=>"2000-04-19",
            "Taurus"=>"2000-05-20",
            "Gemini"=>"2000-06-20",
            "Cancer"=>"2000-07-22",
            "Leo"=>"2000-08-22",
            "Virgo"=>"2000-09-22",
            "Libra"=>"2000-10-22",
            "Scorpio"=>"2000-11-21",
            "Sagittarius"=>"2000-12-21",
            "Capricorn"=>"2000-12-31",
        );
        foreach ($zodiacs as $zodiac => $endDate) {
            if($this->dob <= new DateTime($endDate)) {
                $this->zodiacSign = $zodiac;
                return;
            }
        }
        
    }
}

