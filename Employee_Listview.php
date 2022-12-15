<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee List View</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
        table tr:hover {
            cursor:pointer;
        }
        table thead {
            background:#008ECC;
        }
        table thead tr th {
            color:#fff;
        }
    </style>

    <script>
        $(document).ready(function(){
            $('table tr').click(function(){
                var id = $(this).attr('row_id');
                window.open(
                    // url of the next page
                    + id);
            });
        });
    </script>
</head>
<body>
    <div>
        <h2>Employees List</h2>
        <table>
            <thead>
                <tr>
                    <th>Employee Number</th>
                    <th>Employee Name</th>
                    <th>Gender</th>
                    <th>Date of Birth</th>
                    <th>Nationality</th>
                    <th>Civil Status</th>
                    <th>Department</th>
                    <th>Designation</th>
                    <th>Employee Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include 'db_conection.php';
                    $conn = OpenCon();

                    $sql = "SELECT emp_id_no, employee_no, fname, mname, lname, suffix, gender, birth_date, nationality, civil_status, department, designation, employee_status FROM personal_infotbl";
                    $resul = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    // output data of each row
                        while($row = $result->fetch_assoc()) {
                            echo "<tr row_id='" , $row['emp_id_no'] , "'><td>", $row["employee_no"] , "</td></td>" , "<td>" , $row["fname"] , " "
                            , $row["mname"] , " " , $row["lname"] , " " , $row["suffix"], "</td>" , "<td>" , $row["gender"] , "</td>" , "<td>"
                            , $row["birth_date"] , "</td>" , "<td>" , $row["nationality"] , "</td>" , "<td>" , $row["civil_status"], "</td>" , "<td>"
                            , $row["department"] , "</td>" , "<td>" , $row["designation"] , "</td>" , "<td>" , $row["employee_status"], "</td>" ;
                        }
                        echo "</table>";
                    } else {
                        echo "0 results";
                    }
                    $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
