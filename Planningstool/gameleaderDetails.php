<?php
include("includes/functions.php");
connectDatabase();
$data = getDetailsGameleader($_GET["name"]);
$gameleader = getGameleaderFromId($_GET["id"]);


include("includes/header.php")
?>

<h2 class = "text-center"> Planning voor <?php echo $gameleader["name"] ?></h2>
<?php if(empty($data)){
  ?><a class = "text-danger" href="gameleaders.php?id=<?php echo $gameleader["id"];?>" onclick="return confirm('Weet je zeker dat je <?php echo $gameleader['name']; ?> wilt verwijderen?');"><i class="fas fa-times"></i> Verwijder</a> <br>

<?php } ?>

<div class = "row">

<table class="table">
  <tr>
    <th>Spelnaam</th>
    <th>Datum</th>
    <th>Starttijd</th>
    <th>Spelers</th>
  </tr>
  <tr>
  <?php foreach($data as $row){ ?>
    <?php $gamename = getGamesFromId($row["gameName_id"]); 
    $date = getDateFromId($row["date_id"]);?>
    <td><?php echo  $gamename['name']?></td>
    <td><?php echo date('d-m-Y', strtotime($date['date'])); ?></td>
    <td><?php echo date('H:i', strtotime($row['starttime'])); ?></td>
    <td><?php echo $row["players"] ?></td>
  </tr>
  <?php } ?>
</table>
</div>


<?php
include("includes/footer.php")
?>

</div>
</body>
