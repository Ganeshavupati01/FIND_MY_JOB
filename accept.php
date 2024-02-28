<?php
include 'db_connection.php';
error_reporting(0);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Users Information</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Users Information</h2>
    <table>
        <tr>
            <th>WORK_PROVIDER</th>
            <th>WORKER</th>
            <th>VIEW_DETAILS</th>
        </tr>
        <?php
          session_start();

        if(isset($_SESSION['username'])) {
            $excludename = $_SESSION['username'];
        // Retrieve rows from the database
        $sql = "SELECT * FROM accept where work_provider ='$excludename'and work_status is NULL";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["work_provider"] . "</td>";
                echo "<td>" . $row["worker"] . "</td>";

                echo "<td>";
                echo "<form action='accept_details.php' method='GET'>";
               
                echo "<input type='hidden' name='work_provider' value='" . htmlspecialchars($row["work_provider"]) . "'>";

                echo "<input type='hidden' name='worker' value='" . htmlspecialchars($row["worker"]) . "'>";
                echo "<input type='hidden' name='work_type' value='" . htmlspecialchars($row["work_type"]) . "'>";
                echo "<input type='hidden' name='description' value='" . htmlspecialchars($row["description"]) . "'>";
                echo "<input type='hidden' name='location' value='" . htmlspecialchars($row["location"]) . "'>";
                echo "<input type='hidden' name='contact' value='" . htmlspecialchars($row["contact"]) . "'>";
                echo "<input type='hidden' name='prize' value='" . htmlspecialchars($row["prize"]) . "'>";


                echo "<input type='submit' value='View Details'>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No users found</td></tr>";
        }
    }
    else{
        echo "you are not loggin";
    }
        // Close connection
        $conn->close();
        ?>
    </table>
</body>
</html>
