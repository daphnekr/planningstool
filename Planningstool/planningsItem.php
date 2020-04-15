<?php
include("includes/functions.php");
connectDatabase();
$game = detailsPlanningsItem($_GET['name']);
$planning = getPlanningDetails($_GET['name']);



include("includes/header.php")
?>

<h1> <?php echo $game["name"] ?></h1> <br>
<span><img class = "w-25" src="images/<?php echo $game["image"] ?>"alt="<?php echo $game["name"] ?>"><br></span>
<?php echo $game["description"] ?><br>
<?php echo $game["expansion"] ?><br>
<?php echo $game["skills"] ?><br>
<?php echo $game["url"] ?><br>
<?php echo $game["min_players"] ?><br>

<?php echo $planning["players"] ?><br>
<?php echo $planning["gameleader"] ?><br>
<?php echo $planning["starttime"] ?><br>
</div>
</div>
</body>
