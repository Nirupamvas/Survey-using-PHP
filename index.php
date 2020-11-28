<?php
include 'includes/config.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Lion Survey</title>
    <link rel="icon" type="image/x-icon" href="lion.svg">
    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>

    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
    <?php
    $get_post = "select *from surveyposts";
    $res = mysqli_query($con,$get_post);
    $c = 0;
    while ($row_post = mysqli_fetch_array($res)) {
        $q_id = $row_post['q_id'];
        $question = $row_post['question'];
        $optionA = $row_post['optionA'];
        $optionB = $row_post['optionB'];
        $optionC = $row_post['optionC'];
        $optionD = $row_post['optionD'];
        $c=$c+1;
        ?>
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title"><?php echo $c,")";  ?><?php echo $question;  ?></h2>
                            <button class="btn btn--radius-2 btn--blue"  style="position: center"><a href="survey-post.php?q_id=<?php echo $q_id;  ?>" style="text-decoration: none; color: white;">Start-></a></button>
                        </div>
                </div>
            </div>
    <?php
}
?>
</div>
</div>
    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->