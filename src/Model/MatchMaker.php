<?php
include "Profile.php";
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

    
}
