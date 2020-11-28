<?PHP
include 'includes/config.php';

$voteMessage = "";
session_start();
if ((isset($_SESSION['hasVoted']))) {
	if ($_SESSION['hasVoted'] = '1') {
		$voteMessage = "You've already voted";
	}
}
else {
	if (isset($_GET['submit']) && isset($_GET['q'])) {
		$selected_radio = $_GET['q'];
		$idNumber = $_GET['q_id'];
		if ($con) {
			if($selected_radio == "A") {
				$votedSQL = "UPDATE surveyposts SET votedA = votedA + 1 WHERE q_id = $idNumber";
				mysqli_query($con,$votedSQL);
				echo '<script language="javascript">';
				echo 'alert("Successfully Submitted")';
				echo '</script>';
				
			}
			else if($selected_radio == "B"){
				$votedSQL = "UPDATE surveyposts SET votedB = votedB + 1 WHERE q_id = $idNumber";
				mysqli_query($con,$votedSQL);
				echo '<script language="javascript">';
				echo 'alert("Successfully Submitted")';
				echo '</script>';

			}
			else if($selected_radio == "C"){
				$votedSQL = "UPDATE surveyposts SET votedC = votedC + 1 WHERE q_id = $idNumber";
				mysqli_query($con,$votedSQL);
				echo '<script language="javascript">';
				echo 'alert("Successfully Submitted")';
				echo '</script>';
			}
			else if($selected_radio == "D"){
				$votedSQL = "UPDATE surveyposts SET votedD = votedD + 1 WHERE q_id = $idNumber";
				mysqli_query($con,$votedSQL);
				echo '<script language="javascript">';
				echo 'alert("Successfully Submitted")';
				echo '</script>';
			}
			else {
				print "Error - could not record vote";
			}	
		}
	}
	else {
		print "cannot insert";
	}
	header('Location: index.php');
}

function insert_vote($db, $sql, $id) {

	$stmt = $db->prepare($sql);
	$stmt->bind_param('i', $id);
	$stmt->execute();

	//$_SESSION['hasVoted'] = '1';
	return "Thanks for voting!";
}
?>

<html>
<head>
<title>Process Survey</title>
</head>
<body>
<?PHP print $voteMessage . "<BR>"; ?>
</body>
</html>