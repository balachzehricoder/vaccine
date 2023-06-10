<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = " db_vaccinecompany";
//Create Connection
$conn = new mysqli($servername, $username, $password, $database);


$PARENTID = "";
$PARENT_NAME = "";
$PARENT_CNIC = "";
$PARENT_EMAIL = "";
$PARENT_PASSWORD = "";

$erroMessage = "";
$succesMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    //show the method of the employee
    if (!isset($_GET["PARENTID"])) {
        header("location: index.php");
        exit;
    }
    $PARENTID = $_GET["id"];

    $sql = "SELECT * FROM parent WHERE id = $PARENTID";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if (!$row) {
        header("Location: index.php");
        exit;
    }

    $PARENT_NAME = $row["PARENT_NAME"];
    $PARENT_CNIC = $row["PARENT_CNIC"];
    $PARENT_EMAIL = $row["PARENT_EMAIL"];
    $PARENT_PASSWORD = $row["PARENT_PASSWORD"];



} else {
    $PARENTID = $_POST["PARENTID"];
    $PARENT_NAME = $_POST["PARENT_NAME"];
    $PARENT_CNIC = $_POST["PARENT_CNIC"];
    $PARENT_EMAIL = $_POST["PARENT_EMAIL"];
    $PARENT_PASSWORD = $_POST["PARENT_PASSWORD"];


    do {
        if (empty($PARENTID) || empty($PARENT_NAME) || empty($PARENT_CNIC) || empty($PARENT_EMAIL) || empty($PARENT_PASSWORD)) {
            $erroMessage = "ALL the fields are required";
            break;
      }
      $sql = "UPDATE parent " . // added space after "employee"
      "SET PARENT_NAME = '$PARENT_NAME', PARENT_CNIC = '$PARENT_CNIC', PARENT_EMAIL = '$PARENT_EMAIL', PARENT_PASSWORD = '$PARENT_PASSWORD' " . // added spaces after each comma
      "WHERE CHILDRENID = $PARENTID";

          $result = $con->query($sql);
        if (!$result) {
            $erroMessage = "invalid query:" . $conn->error;
            break;
        }
        $succesMessage = "employ updated correctly";

        header("location: index.php");
        exit;

    } while (true);

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
       
        <form method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="row md-3">
                <label class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="PARENT_NAME" value="<?php echo $PARENT_NAME; ?>">
                </div>
            </div>

            <div class="col-sm-6">
                    <input type="number" class="form-control" name="PARENT_CNIC" value="<?php echo $PARENT_CNIC; ?>">
                </div>
            </div>
            <div class="row md-3">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="PARENT_EMAIL" value="<?php echo $PARENT_EMAIL; ?>">
                </div>
            </div>
            <div class="row md-3">
                <label class="col-sm-3 col-form-label">phone</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" name="PARENT_PASSWORD" value="<?php echo $PARENT_PASSWORD; ?>">
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