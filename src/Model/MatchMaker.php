<?php
require "Profile.php";
require "Seeking.php";
class MatchMaker{

    public function createInterestScore(
        array $profile_one_interests,
        array $profile_two_interests
    ){
        $matchScore = count(array_intersect($profile_one_interests, $profile_two_interests));
        return $matchScore;
    }

    public function getSignScore(
        String $profile_one_sign,
        String $profile_two_sign
    ){
        require "matchScores.php";
        $signArr = [$profile_one_sign, $profile_two_sign];
        sort($signArr);
        $signsPair = implode('',$signArr);
        return SIGN_MATCH_SCORES[$signsPair];
    }

    public function generatePotentialMatches(Profile $profile, Seeking $seeking, $conn){
        try{
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
        $getProfilesQuery = "
            SELECT id, datetime_of_birth FROM profile WHERE
            datetime_of_birth >= '$maxAgeDOB'
            AND datetime_of_birth <= '$minAgeDOB'
            $selectingGender";
        $result = mysqli_query($conn, $getProfilesQuery);
        $potentialMatches = $result->fetch_all();
        $result->free_result();
        $matches = array();

        foreach($potentialMatches as $matchInfo){
            $potentialMatchesZodiac = $profile->makeZodiacSign(new DateTime($matchInfo[1]));
            $score = $this->getSignScore($potentialMatchesZodiac, $profile->zodiacSign);
            if($score != 0){
                $matchesIntrestsQuery = "SELECT interest FROM profile_interest WHERE profile_id='$matchInfo[0]'";
                $intrestResult = mysqli_query($conn, $matchesIntrestsQuery);
                $matchesInterests = $intrestResult->fetch_all();
                $intrestResult->free_result();
                $score += $this->createInterestScore($profile->interests, array_column($matchesInterests,0));

                $idsSorted = [$matchInfo[0],$profile->id];
                sort($idsSorted,SORT_NUMERIC);
                array_push($matches,[$idsSorted[0],$idsSorted[1],$score]);
            }
        }
        //console_log($matches);
        /*$addMatchupsToTableQuery = "INSERT INTO table (id, name, age) VALUES(1, "A", 19) ON DUPLICATE KEY UPDATE    
        name="A", age=19
        "*/
        
        $addMatchupsToTableQuery = 'INSERT INTO `matchup` (`profile_lower_id`,`profile_higher_id`, `match_score`) VALUES ';
        $query_parts = array();
        for($x=0; $x<count($matches); $x++){
            $query_parts[] = "('" . $matches[$x][0] . "', '" . $matches[$x][1] . ", '" . $matches[$x][2] . "')";
        }
        $addMatchupsToTableQuery .= implode(',', $query_parts);
        $addMatchupsToTableQuery .= " ON DUPLICATE KEY UPDATE match_score=VALUES (match_score)";
        $matchupsStatement = $conn->prepare($addMatchupsToTableQuery);
        $matchupsStatement->execute();
    }catch(Exception $e){
        console_log($e->getMessage());
    }
    }
}
