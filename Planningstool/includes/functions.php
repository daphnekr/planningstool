<?php 

function connectDatabase(){
    $servername = "localhost";
    $username = "root";
    $password = "mysql";
    $dbname = 'planningstool';
    $connection = null;


    try {
        $connect = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connect;

    }
    catch(PDOException $e)
        {
        $e->getMessage();
        }
}

function getAllGames($options, $order){
    $connect = connectDatabase();
    $query = $connect->prepare("SELECT * FROM games ORDER BY $options $order");
    $query->execute();
    return $query->fetchAll();
}

function createPlanning($gameName, $starttime, $gameleader, $players){
    $connect = connectDatabase();
    $query = $connect->prepare("INSERT INTO planning (gameName, starttime, gameleader, players) VALUES (:gameName, :starttime, :gameleader, :players)");
    return $query->execute(["gameName"=> $gameName, "starttime" => $starttime, "gameleader" => $gameleader, "players" => $players]);
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function getGame($id){
    $connect = connectDatabase();
    $data = $connect->prepare("SELECT * FROM games WHERE id = :id");
    $data->execute(['id' => $id]);
    return $data->fetch();
}

function getPlanning(){
    $connect = connectDatabase();
    $query = $connect->prepare("SELECT * FROM planning ORDER BY starttime ASC");
    $query->execute();
    return $query->fetchAll();
}

function updatePlanning($gameName, $starttime, $gameleader, $players, $id){
    $connect = connectDatabase();
    $query = $connect->prepare("UPDATE planning SET `gameName` = :gameName, `starttime` = :starttime, `gameleader` = :gameleader, `players` = :players WHERE id = :id");
    return $query->execute(['gameName'=> $gameName, 'starttime'=> $starttime, 'gameleader'=> $gameleader, 'players'=> $players, 'id' => $id]);
}

function deletePlanningsItem($id){
    $connect = connectDatabase();
    $query = $connect->prepare("DELETE FROM planning WHERE id = :id");
    return $query->execute(['id'=> $id]);
}

function getPlayminutes($gameName){
    $connect = connectDatabase();
    $query = $connect->prepare("SELECT `play_minutes` FROM games WHERE `name` = :gameName");
    $query->execute(['gameName'=> $gameName]);
    return $query->fetch();
}

function detailsPlanningsItem($gameName){
    $connect = connectDatabase();
    $query = $connect->prepare("SELECT * FROM games WHERE `name` = :gameName");
    $query->execute(['gameName'=> $gameName]);
    return $query->fetch();
}

function getPlanningDetails($gameName){
    $connect = connectDatabase();
    $query = $connect->prepare("SELECT * FROM planning WHERE `gameName` = :gameName");
    $query->execute(['gameName'=> $gameName]);
    return $query->fetch();
}

function countPlannedGames(){
    $connect = connectDatabase();
    $query = $connect->prepare("SELECT * FROM planning");
    $query->execute();
    return $query->rowCount();
}

?>