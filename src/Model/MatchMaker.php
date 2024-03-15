<?php
require "Profile.php";
require "Seeking.php";
class MatchMaker{

    public function ageToDob(int $age){
        $now = new DateTime();
        $intreval = DateInterval::createFromDateString($age . " year");
        $dob = $now->sub($intreval);
        return $dob;
    }

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

    public function interestComparitor($conn, Array $profileInterests, int $profileId, int $matchId){
        $matchesIntrestsQuery = "SELECT interest FROM profile_interest WHERE profile_id='$matchId'";
        $intrestResult = mysqli_query($conn, $matchesIntrestsQuery);
        $matchesInterests = $intrestResult->fetch_all();
        $intrestResult->free_result();
        $score = $this->createInterestScore($profileInterests, array_column($matchesInterests,0));

        $matchupData = [$matchId,$profileId];
        sort($matchupData,SORT_NUMERIC);
        array_push($matchupData, $score);
        return $matchupData;
    }

    public function checkMatchesSeeking($conn, int $matchId, Profile $profile){
        $seekingQuery = "SELECT gender, max_age, min_age FROM seeking WHERE id = $matchId";
        $seekingResult = mysqli_query($conn, $seekingQuery);
        $seeking = $seekingResult->fetch_row();
        $seekingResult->free_result();
        if($seeking[0] == 'No preference' || $seeking[0] == $profile->gender){
            if($profile->dob >= $this->ageToDob($seeking[1]) && $profile->dob <= $this->ageToDob($seeking[2])){
                return true;
            }
        }
        return false;
    }

    public function generateMatches(Profile $profile, Seeking $seeking, $conn){
        try{
            $seekingGender = $seeking->getGender();
            $minAgeDOB = $this->ageToDob($seeking->getMinAge())->format('Y-m-d H:i:s');
            $maxAgeDOB = $this->ageToDob($seeking->getMaxAge())->format('Y-m-d H:i:s');

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
                if($score != 0 && $this->checkMatchesSeeking($conn,$matchInfo[0],$profile)){
                    $matchArr = $this->interestComparitor($conn,$profile->interests,$profile->id,$matchInfo[0]);
                    $matchArr[2] += $score;
                    array_push($matches, $matchArr);
                }
            }
            if(count($matches) != 0){
                $addMatchupsToTableQuery = 'INSERT INTO `matchup` (`profile_lower_id`,`profile_higher_id`, `match_score`) VALUES ';
                $query_parts = array();
                for($x=0; $x<count($matches); $x++){
                    $query_parts[] = "('" . $matches[$x][0] . "', '" . $matches[$x][1] . "', '" . $matches[$x][2] . "')";
                }
                $addMatchupsToTableQuery .= implode(',', $query_parts);
                $addMatchupsToTableQuery .= " ON DUPLICATE KEY UPDATE match_score=VALUES (match_score)";
                $matchupsStatement = $conn->prepare($addMatchupsToTableQuery);
                $matchupsStatement->execute();
           }
        }catch(Exception $e){
            console_log($e->getMessage());
        }
    }

    public function makeUnrecommendedMatch($conn, Profile $profile, int $matchId){
        $matchArr = $this->interestComparitor($conn,$profile->interests,$profile->id,$matchId);
        $addMatchupsToTableQuery = "INSERT INTO `matchup` (`profile_lower_id`,`profile_higher_id`, `match_score`) 
        VALUES ('" . $matchArr[0] . "', '" . $matchArr[1] . "', '" . $matchArr[2] . "')";
        $matchupsStatement = $conn->prepare($addMatchupsToTableQuery);
        $matchupsStatement->execute();
    }
}
