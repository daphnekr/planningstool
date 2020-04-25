<?php
include("includes/functions.php");
connectDatabase();
if(empty($_GET['options']) || empty($_GET['order']))
{
  $_GET['options'] = 'name';
  $_GET['order'] = 'ASC';
}

$data = getAllGames($_GET['options'], $_GET['order']);
$planning = getDetailsPlanningUpdate($_GET['id']);

$leader = getGameleaderFromId($_GET["gameleader"]);

$gameName = $starttime = $gameleader = $players = "";
$starttimeErr = $gameleaderErr = $playersErr = "";
$valid = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["plannedGame"])) {
        $gameNameErr = " * Verplicht";
    } else {
        $gameName = test_input($_POST["plannedGame"]);
        if (!preg_match("/^[a-zA-Z ]*$/",$gameName)) {
        $gameNameErr = " Alleen letters en spaties toegestaan";
        }
    }

    if (empty($_POST["date"])) {
        $dateErr = " * Verplicht";
    } else {
        $date = test_input($_POST["date"]);
    }

    if (empty($_POST["starttime"])) {
        $starttimeErr = " * Verplicht";
    } else {
        $starttime = test_input($_POST["starttime"]);
    }
    if (empty($_POST["gameleader"])) {
        $gameleaderErr = " * Verplicht";
    } else {
        $gameleader = test_input($_POST["gameleader"]);
        if (!preg_match("/^[a-zA-Z ]*$/",$gameleader)) {
        $gameleaderErr = " Alleen letters en spaties toegestaan";
        }else{
            createGameleader($_POST["gameleader"]);
        }
    }

    if (empty($_POST["players"])) {
        $playersErr = " * Verplicht";
    } else {
        $players = test_input($_POST["players"]);
        if (!preg_match("/^[a-zA-Z , ]*$/",$players)) {
        $playersErr = " Alleen letters en spaties toegestaan";
        }
    }
    if (!empty($_POST["starttime"]) && !empty($_POST["gameleader"]) && !empty($_POST["players"])){
        $valid = true;
    }

    if($valid){
        updatePlanning($starttime, $gameleader, $players, $gameName, $_POST["id"]);
        echo "<script>
        alert('Planning is bijgewerkt.');
        window.location.href='planning.php';
        </script>";
    }
    
}

include("includes/header.php");
?>

<h2>Planning bewerken</h2> <br>
<form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?<?= $_SERVER["QUERY_STRING"]?>" method="post">

<div class="form-group row">

    <label class="col-sm-2 col-form-label">Kies een spel</label>
    <div class="col-sm-10">
    <select name="plannedGame">
    <?php foreach($data as $game){?>
        <option value="<?php echo htmlentities($game["name"])?>" <?php if ($game['id'] == $planning["gameName_id"]) echo 'selected'; ?>><?php echo htmlentities($game["name"])?></option>
    <?php } ?>
    </select>
    </div>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Vul de datum in:</label>
    <div class="col-sm-10">
    <input type="date" name="date"><span class="text-danger"><?php echo $dateErr;?></span>
    </div>
  </div>

  <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Wat is de starttijd?</label>
    <div class="col-sm-10">
    <input type="time" name="starttime"><span class="text-danger"><?php echo $starttimeErr;?></span><br>
    </div>
  </div>

  <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Wie legt het spel uit?</label>
    <div class="col-sm-10">
    <input type="text" name="gameleader" placeholder = "<?php echo $leader["name"]?>"><span class="text-danger"><?php echo $gameleaderErr;?></span>
    </div>
  </div>

  <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Wie zijn de spelers?</label>
    <div class="col-sm-10">
    <input type="text" name="players" placeholder = "<?php echo $planning["players"]?>"><span class="text-danger"><?php echo $playersErr;?></span>
    </div>

    <input type="hidden" name="id" value="<?php echo $planning['id']?>" />
  </div>

  <input class = "mb-3 btn btn-danger" type="submit" value = "Bewerken">
</form>


</div>
