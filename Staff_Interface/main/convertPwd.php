<?php
include("connect.php");
include("functions.php");

$stmt0 = $connect->prepare("SELECT id, password FROM system_access_control;");
$stmt0->execute();
$stmt0->bind_result($id, $pwd);
$results = [];
while ($stmt0->fetch()) {
    $results[] = [
    	'id' => $id,
        'password' => $pwd
    ];
}
$stmt0->close();

echo "<br>";

if(empty($results)){
	$id = "";
	$pwd = "";
	echo "Error";
} else {
	foreach($results as $result) {
		$id = $result['id'];
		$pwd = $result['password'];
		echo $pwd."<br>";
		$hash = simple_hash($pwd);
		echo $hash."<br><br>";

		$update = $connect->prepare("UPDATE system_access_control SET password = ? WHERE id = ? ");
		$update->bind_param("si", $hash, $id);
		$update->execute();
		$update->close();
	}
}

?>