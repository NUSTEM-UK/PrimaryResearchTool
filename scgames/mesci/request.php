<?php

if(isset($_REQUEST))
{
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	// Import from AJAX post
	$id = ($_POST['id'] ?: NULL);
	$sciId = ($_POST['sciId'] ?: NULL);
	$sciRow = ($_POST['sciRow'] ?: NULL);
	$meId = ($_POST['meId'] ?: NULL);
	$meRow = ($_POST['meRow'] ?: NULL);

	<script>
		console.log(<?= json_encode($sciRow, $meRow); ?>);
	</script>

	// Split string into array
	$sciId = explode("," ,$sciId);
	$sciRow = explode("," ,$sciRow);
	$meId = explode("," ,$meId);
	$meRow = explode("," ,$meRow);

	$sciNum = [];
	$meNum = [];

	foreach ($sciRow as $rowId) {
    	array_push($sciNum, (int)substr($rowId, -1));
	}
	<script>
		console.log(<?= json_encode($sciNum); ?>);
	</script>

	foreach ($meRow as $rowId) {
    	array_push($meNum, (int)substr($rowId, -1));
	}
	<script>
		console.log(<?= json_encode($meNum); ?>);
	</script>

	// Connect to BD
	include('../src/connect.php');

	$conn = connect();

	$stmt = $conn -> prepare("INSERT INTO attrib(id, meclever, mecreative, mesensible, mestrange, mekind, mefun, mefriendly, mecool, mehardworking, sciclever, scicreative, scisensible, scistrange, scikind, scifun, scifriendly, scicool, scihardworking) 
	VALUES(:id, :meclever, :mecreative, :mesensible, :mestrange, :mekind, :mefun, :mefriendly, :mecool, :mehardworking, :sciclever, :scicreative, :scisensible, :scistrange, :scikind, :scifun, :scifriendly, :scicool, :scihardworking);");
	$stmt -> execute([':id' => $id, ':meclever' => $meNum[1], ':mecreative' => $meNum[2], ':mesensible' => $meNum[8], ':mestrange' => $meNum[0], ':mekind' => $meNum[7], ':mefun' => $meNum[5], ':mefriendly' => $meNum[4], ':mecool' => $meNum[3], ':mehardworking' => $meNum[6], ':sciclever' => $sciNum[1], ':scicreative' => $sciNum[2], ':scisensible' => $sciNum[8], ':scistrange' => $sciNum[0], ':scikind' => $sciNum[7], ':scifun' => $sciNum[5], ':scifriendly' => $sciNum[4], ':scicool' => $sciNum[3], ':scihardworking' => $sciNum[6]]);
	// $stmt -> debugDumpParams(); // Spew raw SQL into the popup dialog so we can see what's going on (comment out for production)
	
	$errorCode = $stmt->errorInfo();

	// Returns error code top be sent as allert if not expected
	echo $errorCode[0];
}
?>