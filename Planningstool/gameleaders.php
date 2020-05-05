<?php
include("includes/functions.php");
connectDatabase();
$gameleader = getGameleaders();

if(!empty($_GET["id"])){
  deleteGameleader($_GET["id"]); 
}


include("includes/header.php");
?>

<div class = "row ">
<?php foreach($gameleader as $row){?>

  <div class = "img-thumbnail w-50 col-2 d-inline-block mb-2">
    <h4><?php echo $row["name"]?></h4>
    <a class = "p-1 text-dark" href = 'gameleaderDetails.php?name=<?php echo $row["name"]?>&id=<?php echo $row["id"]?>'>Lees meer &hellip;</a>
    </div>
<?php
}
?>

</div>


<?php
include("includes/footer.php")
?>

</div>
</body>