<?php
include("includes/functions.php");
connectDatabase();
$data = getPlanning();
deletePlanningsItem($_GET["id"]);


include("includes/header.php");
?>

<?php 
foreach($data as $row){?>

    <?php $play_minutes = getPlayminutes($row["gameName"]); ?>
    <a class = "text-danger" href="planning.php?id=<?php echo $row["id"];?>" onclick="return confirm('Weet je zeker dat je <?php echo $row['gameName']; ?> om <?php echo $row['starttime']; ?> wilt verwijderen?');"><i class="fas fa-times"></i> Verwijder</a> <br>
    
    <p>Starttijd: <?php echo date('g:i', strtotime($row["starttime"]));?> uur</p>

    <p>Spelnaam: <?php echo $row["gameName"];?></p>

    <p>Duur: <?php echo $play_minutes["play_minutes"];?> minuten</p>

    <p>Speluitlegger: <?php echo $row["gameleader"];?></p>

    <a class = "text-danger" href = "updatePlanning.php?name=<?php echo $row["id"];?>" type = "button"><i class="fas fa-edit"></i> Bewerk </a> <br>

    <a class = "text-danger" href = "planningsItem.php?name=<?php echo $row["gameName"];?>" type = "button"><i class="fas fa-info-circle"></i> Details</a>
    

    <hr>

<?php
}
?>

<?php
include("includes/footer.php")
?>
</div>
</body>
