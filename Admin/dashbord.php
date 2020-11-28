<?php
include_once('../includes/config.php');
session_start();
if(isset($_POST['submit']))
{
$question = $_POST['question'];
$voted1 = $_POST['voted1'];
$voted2 = $_POST['voted2'];
$voted3 = $_POST['voted3'];
$voted4 = $_POST['voted4'];

$res=mysqli_query($con,"insert into surveyposts(question,votedA,votedB,votedC,votedD) values('".$question."','".$voted1."','".$voted2."','".$voted3."','".$voted4."')");
	if($res){
		echo '<script language="javascript">';
		echo 'alert("Successfully inserted")';
		echo '</script>';
	}
	else{
		echo '<script language="javascript">';
		echo 'alert("Successfully inserted")';
		echo '</script>';}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin | Counts | <?php echo $_SESSION['email']; ?></title>
    <link rel="stylesheet" type="text/css" href="../css/charts.css">
        <link rel="icon" type="image/x-icon" href="../lion.jpg">
	<!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="../css/main.css" rel="stylesheet" media="all">

        <style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
  border-right:1px solid #bbb;
}

li:last-child {
  border-right: none;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #111;
}

.active {
  background-color: #4CAF50;
}
</style>



    <script>
function myFunction() {
  alert("Inserted Successfully!");
}
</script>
</head>
<body>
    <ul>
        <li><a class="active" href="#home">Lion Survey</a></li>
        <li style="float:right"><a href="logout.php">Logout</a></li>
        <li style="float:right"><a href="admin.php">Admin</a></li>
        <li style="float:right"><a href="dashbord.php" class="active">Dashbord</a></li>
    </ul>

    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
    <?php
    $get_post = "select *from surveyposts order by q_id DESC";
    $res = mysqli_query($con,$get_post);
    $c=0;
    while ($row_post = mysqli_fetch_array($res)) {
        $q_id = $row_post['q_id'];
        $question = $row_post['question'];
        $optionA = $row_post['optionA'];
        $optionB = $row_post['optionB'];
        $optionC = $row_post['optionC'];
        $optionD = $row_post['optionD'];
        $votedA = $row_post['votedA'];
        $votedB = $row_post['votedB'];
        $votedC = $row_post['votedC'];
        $votedD = $row_post['votedD'];
        $c=$c+1
        ?>
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title"><?php echo $c,")"; ?><?php echo $question;?></h2>
                       <!-- <div class="row-space">
                             <div class="row row-space">
                                <div class="input-group">
                                    <label class="label"><?php //echo "a)",$optionA;?> : <?php //echo $votedA;?></label>
                                </div>
                                <div class="input-group">
                                    <label class="label"><?php //echo "b)",$optionB;?> : <?php //echo $votedB;?></label>
                                </div>
                            </div>
                             <div class="row row-space">
                                <div class="input-group">
                                    <label class="label"><?php //echo "c)",$optionC;?> : <?php ///echo $votedC;?></label>
                                </div>
                                <div class="input-group">
                                    <label class="label"><?php //echo "d)",$optionD;?> : <?php //echo $votedD;?></label>
                                </div>
                            </div>
                        </div>-->
                        <dl>
                        <dd class="percentage percentage-<?php echo $votedA;?>"><span class="text"><?php echo "a)",$optionA;?> : <?php echo $votedA;?></span></dd>
                        <dd class="percentage percentage-<?php echo $votedB;?>"><span class="text"><?php echo "b)",$optionB;?> : <?php echo $votedB;?></span></dd>
                        <dd class="percentage percentage-<?php echo $votedC;?>"><span class="text"><?php echo "c)",$optionC;?> : <?php echo $votedC;?></span></dd>
                        <dd class="percentage percentage-<?php echo $votedD;?>"><span class="text"><?php echo "d)",$optionD;?> : <?php echo $votedD;?></span></dd>
                    </dl>
                </div>
            </div>
        </div>

        <?php
    }
    ?>
    </div>

</body>
<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</html>