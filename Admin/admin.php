<?php
include_once('../includes/config.php');
session_start();
if(isset($_POST['submit']))
{
$question = $_POST['question'];
$option1 = $_POST['option1'];
$option2 = $_POST['option2'];
$option3 = $_POST['option3'];
$option4 = $_POST['option4'];

$res=mysqli_query($con,"insert into surveyposts(question,optionA,optionB,optionC,optionD) values('".$question."','".$option1."','".$option2."','".$option3."','".$option4."')");
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
	<title>Admin | <?php echo $_SESSION['email']; ?></title>
  <link rel="icon" type="image/x-icon" href="../lion.svg">
	<!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

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
        <li style="float:right"><a href="admin.php" class="active">Admin</a></li>
        <li style="float:right"><a href="dashbord.php" >Dashbord</a></li>
    </ul>

    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Survey Questions</h2>
                    <form name="submit" method="post" onSubmit="return valid();">
                        <div class="row-space">
                                <div class="input-group">
                                    <label class="label">Please input your question here</label>
                                    <input class="input--style-4" type="text" name="question">
                                </div>
                          <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Option 1</label>
                                    <input class="input--style-4" type="text" name="option1">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Option 2</label>
                                    <input class="input--style-4" type="text" name="option2">
                                </div>
                            </div>
                           </div>
                           <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Option 3</label>
                                    <input class="input--style-4" type="text" name="option3">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Option 4</label>
                                    <input class="input--style-4" type="text" name="option4">
                                </div>
                            </div>
                           </div>
                        </div>
                       <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" name="submit" type="submit" style="position: center" onclick="myFunction()">submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>