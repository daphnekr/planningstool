<?php
include("includes/functions.php");
connectDatabase();
$data = getPlanning();
deletePlanningsItem($_GET["id"]);
date_default_timezone_set("Europe/Amsterdam");



include("includes/header.php");
?>

<?php 
foreach($data as $row){?>

    <?php $games = getGamesFromId($row["gameName"]); ?>
    <a class = "text-danger" href="planning.php?id=<?php echo $row["id"];?>" onclick="return confirm('Weet je zeker dat je <?php echo $row['gameName']; ?> om <?php echo date('H:i', strtotime($row['starttime'])); ?> uur wilt verwijderen?');"><i class="fas fa-times"></i> Verwijder</a> <br>
    
    <p>Starttijd: <?php echo date('H:i', strtotime($row["starttime"]));?> uur</p>

    <p>Spelnaam: <?php echo $row["gameName"];?></p>

    <p>Duur: <?php echo $games["play_minutes"];?> minuten</p>

    <p>Speluitlegger: <?php echo $row["gameleader"];?></p>

    <a class = "text-danger" href = "updatePlanning.php?id=<?php echo $row["id"];?>" type = "button"><i class="fas fa-edit"></i> Bewerk </a> <br>

    <a class = "text-danger" href = "planningsItem.php?id=<?php echo $row["id"];?>&name=<?php echo $row['gameName']; ?>" type = "button"><i class="fas fa-info-circle"></i> Details</a>
    

    <hr>

<?php
}
?>

<?php
include("includes/footer.php")
?>
</div>
</body>
