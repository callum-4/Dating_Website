<?php
require "Profile.php";
require "Seeking.php";
class MatchMaker{

    public function createMatchScore(
        String $profile_one_sign,
        array $profile_one_interests,
        String $profile_two_sign,
        array $profile_two_interests
    ){
        $matchScore = ($this->getSignScore($profile_one_sign, $profile_two_sign))*2;
        $matchScore += count(array_intersect($profile_one_interests, $profile_two_interests));
        return $matchScore;
    }

    public function getSignScore(
        String $profile_one_sign,
        String $profile_two_sign
    ){
        include "matchScores.php";
        $signsPair = implode('',sort($profile_one_sign, $profile_two_sign));
        return $SIGN_MATCH_SCORES[$signsPair];
    }

    public function generatePotentialMatches(Profile $profile, Seeking $seeking){
        $seekingGender = $seeking->getGender();
        $now = new DateTime();
        $minIntreval = DateInterval::createFromDateString($seeking->getMinAge() . " year");
        $maxIntreval = DateInterval::createFromDateString($seeking->getMaxAge() . " year");
        $minAgeDOB = $now->sub($minIntreval)->format('Y-m-d H:i:s');
        $maxAgeDOB = $now->sub($maxIntreval)->format('Y-m-d H:i:s');

        $selectingGender = '';
        if($seekingGender != 'No preference'){
            $selectingGender = " AND gender='$seekingGender'";
        }
        $getProfilesSQL = "SELECT * FROM profile WHERE datetime_of_birth >= '$maxAgeDOB' AND datetime_of_birth <= '$minAgeDOB'$selectingGender";
        echo $getProfilesSQL;
    }
}
