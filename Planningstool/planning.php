<?php
include("includes/functions.php");
connectDatabase();
$data = getPlanning();

if(!empty($_GET["id"])){
   deletePlanningsItem($_GET["id"]); 
}


include("includes/header.php");
?>

<?php 
foreach($data as $row){?>

    <?php $games = getGamesFromId($row["gameName_id"]); 
    $gameleader = getGameleaderFromId($row["gameleader_id"]);
    $eindtijd = $games["explain_minutes"] + $games["play_minutes"];
    ?>
    <a class = "text-danger" href="planning.php?id=<?php echo $row["id"];?>" onclick="return confirm('Weet je zeker dat je <?php echo $row['gameName']; ?> om <?php echo date('H:i', strtotime($row['starttime'])); ?> uur wilt verwijderen?');"><i class="fas fa-times"></i> Verwijder</a> <br>
    
    <p><b>Starttijd:</b> <?php echo date('H:i', strtotime($row["starttime"]));?> uur</p>

    <p><b>Spelnaam:</b> <?php echo $games["name"];?></p>

    <p><b>Eindtijd:</b> <?php echo date('H:i', strtotime('+ '.$eindtijd.' minute', strtotime($row["starttime"])));?> uur</p>

    <p><b>Duur inclusief uitlegtijd:</b> <?php echo $eindtijd;?> minuten</p>

    <p><b>Datum:</b> <?php echo date("d-m-Y", strtotime($row['date']));?> </p>

    <p><b>Speluitlegger:</b> <?php echo $gameleader["name"];?></p>

    <a class = "text-danger" href = "updatePlanning.php?id=<?php echo $row["id"];?>&name=<?php echo $games['id']; ?>&gameleader=<?php echo $gameleader["id"];?>" type = "button"><i class="fas fa-edit"></i> Bewerk </a> <br>

    <a class = "text-danger" href = "planningsItem.php?id=<?php echo $row["id"];?>&name=<?php echo $games['id']; ?>&gameleader=<?php echo $gameleader["id"];?>" type = "button"><i class="fas fa-info-circle"></i> Details</a>
    

    <hr>

<?php
}
?>

<?php
include("includes/footer.php")
?>
</div>
</body>
