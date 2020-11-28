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
    <!-- Title Page-->
    <title>Survey Lion</title>
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
    <link rel="stylesheet" type="text/css" href="css/toggle.css">
</head>

<body>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Survey Form</h2>

                    <form method="GET" action="process.php">
                        <?php
                        if(isset($_GET['q_id'])){
                        $q_id = $_GET['q_id'];
                        $get_post = "select *from surveyposts where q_id = $q_id";
                        $res = mysqli_query($con,$get_post);
                        while ($row_post = mysqli_fetch_array($res)) {
                            $q_id = $row_post['q_id'];
                            $question = $row_post['question'];
                            $optionA = $row_post['optionA'];
                            $optionB = $row_post['optionB'];
                            $optionC = $row_post['optionC'];
                            $optionD = $row_post['optionD'];
                            ?>
                        <div class="input-group">
                            <label class="label"><?php echo $q_id; ?>)<?php echo $question; ?></label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                    <div class="p-t-10">
                                        <label class="radio-container m-r-45"><?php echo $optionA; ?>
                                            <input type="radio" value= 'A' name="q">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container m-r-45 "><?php echo $optionB; ?>
                                            <input type="radio" value= 'B' name="q">
                                            <span class="checkmark"></span>
                                        </label>
                                       <label class="radio-container m-r-45"><?php echo $optionC; ?>
                                            <input type="radio" value= 'C' name="q">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container m-r-45"><?php echo $optionD; ?>
                                            <input type="radio" value= 'D' name="q">
                                            <span class="checkmark"></span>
                                        </label><br>
                                    </div>
                                    <label class="switch"> 
                                    <input type="checkbox" value="<?php echo $q_id; ?>" name="q_id">
                                    <span class="slider round"></span>
                                    </label>
                                    <label class="radio-container m-r-45 " style="text-align: center;">Please conform your selection:</label>
                            </div>
                        </div>
                         <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="submit" name="submit">Submit</button>
                        </div>
                        <?php
                    }}
                    ?>

                    </form>
                </div>
            </div>
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
    <script type="text/javascript">
        var array = []
        var check = document.querySelectorAll('input[type=radio]:checked')

        for (var i = 0; i < check.length; i++) {
            array.push(check[i].value)
            }
        document.getElementById("hero").InnerHTML=array;
    </script>
</body>

</html>