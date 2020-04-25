<?php
include("includes/functions.php");
connectDatabase();
$data = getDetailsGameleader($_GET["name"]);


include("includes/header.php")
?>

<h2 class = "text-center"> <?php echo $data["name"] ?></h2>

<div class = "row">

<table class="table">
  <tr>
    <th>Spelnaam</th>
    <th>Starttijd</th>
    <th>Spelers</th>
  </tr>
  <tr>
  <?php foreach($data as $row){ ?>
    <td><?php echo $row["gameName_id"] ?></td>
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
