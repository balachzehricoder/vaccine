<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>office</title>
</head>

<body>


<br><br><br>
        <h2>List of Clients</h2>
        <a class="btn btn-primary" href="create.php" role="button">REGISTER YOUR CHILDREN</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Created</th>
                    <th>Action</th>
                </tr>
            <tbody>
                <?php
                // $servername = "localhost";
                // $username = "root";
                // $password = "";
                // $database = "crud";
                // //Create Connection
                // $connection = new mysqli($servername, $username, $password, $database);
                // if ($connection->connect_error) {
                //     die("connection failed" . $connection->connect_error);
                // }
                include 'config.php';
                // read all row from database table
                $sql = "SELECT * FROM CHILDREN";
                $result = $conn->query($sql);
                if (!$result) {
                    die("invalid query:" . $conn->error);
                }
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
    <td>$row[CHILDRENID]</td>
    <td>$row[CHILDREN_NAME]</td>
    <td>$row[CHILDREN_DATEOFBIRTH]</td>
    <td>$row[PARENTID]</td>
   
    <td>
        <a class='btn btn-primary btn-sm' href='edit.php?id=$row[CHILDRENID]'>Edit</a>
        <a class='btn btn-danger btn-sm' href='delete.php?id=$row[CHILDRENID]'>Delete</a>
    </td>
</tr>";
                }
                ?>


              
            </thead>
        </table>
    </div>

</body>

</html>