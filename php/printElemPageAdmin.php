<?php

// Function returns a string of the leaderboard
function printLeaderBoard($con):String{
    // Require the bdcon.php file
    require("../php/bdcon.php");
    $leaderBoard = "<br /><br />";

    // Select the top 5 users from the USERS table
    $sql = "Select nickname, score FROM USERS where score is not null order by score DESC limit 5";
    $sth = $con->prepare($sql);
    $sth->execute();

    // Fetch each row from the database and add it to the leaderboard string
    while($row = $sth->fetch()){
        $leaderBoard = $leaderBoard.$row["nickname"]." : ".$row["score"]."<br /><br />";
    }

    // Return the leaderboard
    return $leaderBoard;
}

// Function returns a string of the questions
function printQuestions($con):String{
    // Require the bdcon.php file
    require("../php/bdcon.php");
    $questions = "<br /><br />";

    // Select all questions from the QUESTION table
    $sql = "Select q_id, title FROM question order by q_id";
    $sth = $con->prepare($sql);
    $sth->execute();

    // Fetch each row from the database and add it to the questions string
    while($row = $sth->fetch()){
        $questions = $questions.$row["q_id"]." : ".$row["title"]."<br /><br />";
    }
    // Return the questions
    return $questions;
}
