<?php
include("includes/functions.php");
connectDatabase();


if(empty($_GET['options']) || empty($_GET['order']))
{
  $_GET['options'] = 'name';
  $_GET['order'] = 'ASC';
}

$data = getAllGames($_GET['options'], $_GET['order']);

if(isset($_GET['submit'])) 
{ 
  getAllGames($_GET['options'], $_GET['order']);
}

include("includes/header.php")
?>

<form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="optie-select">Sorteer de spellen op:</label>
    <select name="options" id="optie-select">
        <option value="name">Naam</option>
        <option value="max_players">Maximale spelers</option>
        <option value="play_minutes">Speeltijd</option>
    </select>

    <select name="order" id="optie-select">
        <option value="ASC">van laag naar hoog</option>
        <option value="DESC">van hoog naar laag</option>
    </select>
    <input type ="submit" value="Verander">
  </form>


<div class = "row ">
<?php foreach($data as $row){?>

  <div class = "img-thumbnail w-50 col-2 d-inline-block mb-2">
  <img src="images/<?php echo $row["image"]?>" class = "w-100 h-50">
  <h4><?php echo $row["name"]?></h4>
  <a class = "p-1 text-dark" href = 'gameDetails.php?id= <?php echo $row["id"]?>'>Lees meer &hellip;</a>
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