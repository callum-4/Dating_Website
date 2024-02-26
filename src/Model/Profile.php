<?php
class Profile{

    public $id;
    public $email;
    public $type;
    public $name;
    public $dob;
    public $description;
    public $interests;
    public $bannedUntil;


    function __construct($id, $email, $type, $name, $dob, $description, $interests, $bannedUntil){
    $this-> id = $id;
    $this-> email = $email;
    $this-> type = $type;
    $this-> name = $name;
    $this-> dob = $dob;
    $this-> description = $description;
    $this-> interests = $interests;
    $this->bannedUntil = new DateTime('2000-10-10'); //deafult banned until
    }

    

    function get_profile() {
        return [
            'id' => $this->id,
            'email' => $this->email,
            'type' => $this->type,
            'name' => $this->name,
            'dob' => $this->dob,
            'description' => $this->description,
            'interests' => $this->interests,
            'bannedUntil'=> $this->bannedUntil
        ];
    }
  
}

$testProfile = new Profile(1, 'qwerty@gmail.com', 'user', 'Roger Shaw','2002-05-10', 'description', 'running', $bannedUntil);

    // used to display test profile details
  $profileDetails = $testProfile->get_profile();
  
  print_r($profileDetails);
      
?>

