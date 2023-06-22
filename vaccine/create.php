<?php
session_start();



include 'config.php';
// $servername = "localhost";
// $username = "root";
// $password = "";
// $database = "crud";
// //Create Connection
// $connection = new mysqli($servername, $username, $password, $database);


$VACCINE_NAME = "";
$VACCINE_ISSUEDATE = "";
$VACCINE_EXPIREDATE = "";
$VACCINE_STATUS = "";
$VACCINE_DESC = "";


$erroMessage = "";
$succesMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $VACCINE_NAME = $_POST["VACCINE_NAME"];
    $VACCINE_ISSUEDATE = $_POST["VACCINE_ISSUEDATE"];
    $VACCINE_EXPIREDATE =$_POST["VACCINE_EXPIREDATE"];
    $VACCINE_STATUS	 = $_POST["VACCINE_STATUS"];
    $VACCINE_DESC	 = $_POST["VACCINE_DESC"];


    

  

        //add new employee to database

        $sql = "INSERT INTO vaccine (VACCINE_NAME , VACCINE_ISSUEDATE , VACCINE_EXPIREDATE , VACCINE_STATUS , VACCINE_DESC ) VALUES ('$VACCINE_NAME','$VACCINE_ISSUEDATE', '$VACCINE_EXPIREDATE','$VACCINE_STATUS','$VACCINE_DESC')";
        $result = $conn->query($sql);
        if (!$result) {
            $erroMessage = "invalid query:" . $conn->error;
      
        }

        $VACCINE_NAME = "";
        $VACCINE_ISSUEDATE = "";
        $VACCINE_EXPIREDATE = "";
        $VACCINE_STATUS = "";
        $VACCINE_DESC = "";


        $succesMessage = "vaccine created successfully";

        header('Location: index.php');

    


}





?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Office</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <?php
    if (!empty($erroMessage)) {
        echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
    <strong>$erroMessage</strong>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
 
    </button>
  </div>";
    }


    ?>


    <div class="container my-5">
        <h2>New vaccine</h2>
        <form action="" method="post">
            <div class="row md-3">
                <label class="col-sm-3 col-form-label">VACCINE_NAME</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="VACCINE_NAME" value="<?php echo $VACCINE_NAME; ?>">
                </div>
            </div>
            <div class="row md-3">
                <label class="col-sm-3 col-form-label">VACCINE_ISSUEDATE</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="VACCINE_ISSUEDATE" value="<?php echo $VACCINE_ISSUEDATE; ?>">
                </div>

                <div class="col-sm-6">
                <label class="col-sm-3 col-form-label">VACCINE_EXPIREDATE</label>
                    <input type="date" class="form-control" name="VACCINE_EXPIREDATE" value="<?php echo $VACCINE_EXPIREDATE; ?>">
                </div>

                <div class="col-sm-6">
                <label class="col-sm-3 col-form-label">VACCINE_STATUS</label>
                    <input type="text" class="form-control" name="VACCINE_STATUS" value="<?php echo $VACCINE_STATUS; ?>">
                </div>

                <div class="col-sm-6">
                <label class="col-sm-3 col-form-label">VACCINE_DESC</label>
                    <input  type="text" class="form-control" name="VACCINE_DESC" value="<?php echo $VACCINE_DESC; ?>">
                </div>
            </div>
            
            </div>

            <?php
            if (!empty($succesMessage)) {
                echo "
    <div class='row md-3'>
                <div class='offset-sm-3 col-sm-6'>
    <div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>$succesMessage</strong> 
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'></button>
</div>
</div>
    </button>
  </div>";
            }


            ?>

            <div class="row md-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a href="index.php" class="btn btn-outline-primary" role="button">Cancel</a>
                </div>
            </div>

        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>