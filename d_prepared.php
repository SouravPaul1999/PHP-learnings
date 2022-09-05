<?php

   $servername = "localhost";
   $username = "root";
    $password = "Souravpaul505@";
    $db="IPL_2022";
 
 try {
   $conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
   // set the PDO error mode to exception
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   $insert_value = $conn->prepare("INSERT INTO IPL_FIXTURES (venue_of_match,date_of_match,team1,team2)
  VALUES (:venue_of_match, :date_of_match, :team1, :team2)");
  $insert_value->bindParam(':venue_of_match', $venue);
  $insert_value->bindParam(':date_of_match', $date);
  $insert_value->bindParam(':team1', $team1);
  $insert_value->bindParam(':team2', $team2);

  $insert_value_t2 = $conn->prepare("INSERT INTO RESULTS_AND_CAPTAIN(venue_of_match,team1_captain,team2_captain,toss_won_by,match_won_by)
  VALUES (:venue_of_match, :team1_captain, :team2_captain, :toss_won_by, :match_won_by)");
  $insert_value_t2->bindParam(':venue_of_match', $venue);
  $insert_value_t2->bindParam(':team1_captain', $cap_t1);
  $insert_value_t2->bindParam(':team2_captain', $cap_t2);
  $insert_value_t2->bindParam(':toss_won_by', $toss_won);
  $insert_value_t2->bindParam(':match_won_by', $match_won);

  $venue = "chinnaswami";
  $date = "28/4/2022";
  $team1 = "PSG";
  $team2 = "DD";
  $insert_value->execute();

  $venue = "chinnaswami";
  $cap_t1= "KL Rahul";
  $cap_t2= "R panth";
  $toss_won= "PSG";
  $match_won= "PSG";
  $insert_value_t2->execute();

  $venue = "wankhede";
  $date = "25/4/2022";
  $team1 = "MI";
  $team2 = "KXIP";
  $insert_value->execute();  

  $venue = "wankhede";
  $cap_t1= "Rohit";
  $cap_t2= "s sharma";
  $toss_won= "MI";
  $match_won= "MI";
  $insert_value_t2->execute();

  echo "New records created successfully";
  }
catch(PDOException $e) {
echo "Error: " . $e->getMessage();
}
$conn = null;
?>