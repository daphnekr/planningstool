<?php
include("includes/functions.php");
connectDatabase();
$data = getGame($_GET['id']);


include("includes/header.php")
?>

<h2 class = "text-center"> <?php echo $data["name"] ?></h2>

<div class = "row">

    <div class = "col-3 d-inline-block">
        <img class = "w-75" src="images/<?php echo $data["image"] ?>"alt="<?php echo $data["name"] ?>">
    </div>

    <div class = "img-thumbnail w-50 col-9 d-inline-block bg-light">
            <p>
                <b>Skills:</b> <?php echo $data["skills"] ?><br>
                <b>Minimale spelers:</b> <?php echo $data["min_players"] ?> <br>
                <b>Maximale spelers:</b> <?php echo $data["max_players"] ?> <br>
                <b>Speeltijd:</b> <?php echo $data["play_minutes"] ?> minuten <br>
                <b>Uitlegtijd:</b> <?php echo $data["explain_minutes"] ?> minuten<br>
                <?php 
                if ($data["expansions"] != NULL) {
                echo "<b>Uitbreiding:</b> ".$data["expansions"]."<br>";
                }?> <br><br>

                <a href = '<?php echo $data["url"] ?>' target="_blank"><?php echo $data["url"] ?></a>
    
            </p>

    </div>

</div>
<div class = "mt-5 center">
    
    <div class = "img-thumbnail mx-auto d-block w-75 bg-light">
        <h3 class = "text-center"> Beschrijving </h3>
        <?php echo $data["description"] ?>
    </div>

</div>
<div class = "text-center mt-5 mb-3">
<?php echo $data["youtube"] ?>
            </div>


<?php
include("includes/footer.php")
?>

</div>
</body>
