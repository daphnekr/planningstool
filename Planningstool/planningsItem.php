<?php
include("includes/functions.php");
connectDatabase();
$game = detailsPlanningsItem($_GET['name']);
$planning = getPlanningDetails($_GET['name']);



include("includes/header.php")
?>

<h2 class = "text-center"> Planning voor <?php echo $game["name"] ?></h2>

<div class = "row">

    <div class = "col-3 d-inline-block">
        <img class = "w-75" src="images/<?php echo $game["image"] ?>"alt="<?php echo $game["name"] ?>">
    </div>

    <div class = "img-thumbnail w-50 col-3 mr-5 d-inline-block bg-light">
            <p>
                <b>Starttijd</b> <?php echo date('g:i', strtotime($planning["starttime"])) ?> uur<br>
                <b>Spelleider:</b> <?php echo $planning["gameleader"] ?> <br>
                <b>Spelers:</b> <?php echo $planning["players"] ?> <br>    
            </p>

    </div>

    <div class = "img-thumbnail w-50 col-5 d-inline-block bg-light">
            <p>
                <b>Skills:</b> <?php echo $game["skills"] ?><br>
                <b>Minimale spelers:</b> <?php echo $game["min_players"] ?> <br>
                <b>Maximale spelers:</b> <?php echo $game["max_players"] ?> <br>
                <b>Speeltijd:</b> <?php echo $game["play_minutes"] ?> minuten <br>
                <b>Uitlegtijd:</b> <?php echo $game["explain_minutes"] ?> minuten<br>
                <?php 
                if ($game["expansions"] != NULL) {
                echo "<b>Uitbreiding:</b> ".$game["expansions"]."<br>";
                }?> <br><br>

                <a href = '<?php echo $game["url"] ?>' target="_blank"><?php echo $game["url"] ?></a>
    
            </p>

    </div>

</div>
<div class = "mt-5 center">
    
    <div class = "img-thumbnail mx-auto d-block w-75 bg-light">
        <h3 class = "text-center"> Beschrijving </h3>
        <?php echo $game["description"] ?>
    </div>

</div>
<div class = "text-center mt-5 mb-3">
    <?php echo $game["youtube"] ?>
</div>

<?php
include("includes/footer.php")
?>
</div>
</body>
