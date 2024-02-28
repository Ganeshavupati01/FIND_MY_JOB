

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
    <?php
include 'db_connection.php';
error_reporting(0);

use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;
    
    //require 'vendor/autoload.php'; // Path to PHPMailer autoload.php file
    require 'PHPMailer/Exception.php';
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/SMTP.php';


session_start();
  if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
  }

// Get the user from the URL query parameter
$user0 = $_GET['from_user'];

$user1 = $_GET['to_user'];
$user2 = $_GET['work_type'];
$user3 = $_GET['description'];
$user4 = $_GET['location'];
$user5 = $_GET['contact'];
$user6 = $_GET['prize'];





// Retrieve detailed information based on the user
//$sql = "SELECT * FROM sentbox WHERE user = '$user'";
//$result = $conn->query($sql);

//if ($result->num_rows > 0) {
    // Output detailed information
  //  $row = $result->fetch_assoc();
        echo "<h2>Your Work Details : " . $user1 . "</h2>";
        echo "<p><strong>Work Type:</strong> " . $user2 . "</p>";
        echo "<p><strong>Description:</strong> " . $user3 . "</p>";
        echo "<p><strong>Location:</strong> " . $user4 . "</p>";
        echo "<p><strong>Contact:</strong> " . $user5 . "</p>";
        echo "<p><strong>ESTIMATED-PRIZE FROM:".$user0.":</strong> " . $user6 . "</p>";

        echo "<p><strong>Image:</strong> </p>";

        $sql = "SELECT images FROM sentbox where user='$user1' and work_type='$user2' and description='$user3' and location='$user4' and contact='$user5'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {

            $row = $result->fetch_assoc();

            echo "<img src='data:image/jpeg;base64," . base64_encode($row["images"]) . "' width='200px' height='200px' alt='Image'>";
        
            
        } else {
            echo "No image found.";
        }
    //}
 //else {
   // echo "<p>No details found for this user</p>";
//}

// Close connection
//$conn->close();

?>
    </div>
    <center>
        <form method="POST">
            <input type="submit" value="accepted" name="submit">
        </form>
    </center>

    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {




    $sql5 = "SELECT * FROM sign_in where username ='$user0'";
    $result5 = $conn->query($sql5);

    if ($result5->num_rows > 0) {
        // Output data of each row
        $row5 = $result5->fetch_assoc();
        
            $send_to = $row5["email"];
    }



    
    
    // Instantiate PHPMailer
   /* $mail = new PHPMailer(true); // Passing `true` enables exceptions
    
    try {
        // Server settings
        $mail->isSMTP(); // Set mailer to use SMTP
        $mail->Host       = 'smtp.gmail.com'; // SMTP server
        $mail->SMTPAuth   = true; // Enable SMTP authentication
        $mail->Username   = '20093cm010@gmail.com'; // SMTP username
        $mail->Password   = 'fisl wkqx aanw dvjp'; // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port       = 587; // TCP port to connect to
    
        // Recipients
        $mail->setFrom('20093cm010@gmail.com', 'FIND_MY_JOB'); // Sender's email address and name
        $mail->addAddress( $send_to); // Recipient's email address
    
        // Content
        $mail->isHTML(false); // Set email format to plain text
        $mail->Subject = 'your work offer is accepted'; // Email subject 
        $mail->Body    = '<html><body><h3>work_producer</h3></body></html>'.$user1.'<html><body><h3>contact</h3></body></html>'.$user5.'<html><body><h3>work_type</h3></body></html>'.$user2.'<html><body><h3>description</h3></body></html>'.$user3.'<html><body><h3>location</h3></body></html>'.$user4.'<html><body><h3>your_estimated_prize</h3></body></html>'.$user6;; // Email body
    
        $mail->send(); // Send email
        echo 'Email sent successfully!';
    } catch (Exception $e) {
        echo "Failed to send email. Error: {$mail->ErrorInfo}";
    }*/
    $mail = new PHPMailer(true); // Passing `true` enables exceptions

try {
    // Server settings
    $mail->isSMTP(); // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com'; // SMTP server
    $mail->SMTPAuth   = true; // Enable SMTP authentication
    $mail->Username   = '20093cm010@gmail.com'; // SMTP username
    $mail->Password   = 'fisl wkqx aanw dvjp'; // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587; // TCP port to connect to

    // Recipients
    $mail->setFrom('20093cm010@gmail.com', 'FIND_MY_JOB'); // Sender's email address and name
    $mail->addAddress($send_to); // Recipient's email address

    // Content
    $mail->isHTML(true); // Set email format to HTML
    $mail->Subject = 'Your work offer is accepted'; // Email subject 
    $mail->Body    = '<html><body><h3>work_producer</h3></body></html>'.$user1.'<html><body><h3>contact</h3></body></html>'.$user5.'<html><body><h3>work_type</h3></body></html>'.$user2.'<html><body><h3>description</h3></body></html>'.$user3.'<html><body><h3>location</h3></body></html>'.$user4.'<html><body><h3>your_estimated_prize</h3></body></html>'.$user6;; // Email body


    $mail->send(); // Send email
    echo 'Email sent successfully!';
} catch (Exception $e) {
    echo "Failed to send email. Error: {$mail->ErrorInfo}";
}
    

        //session_start();
        //$from_user = $_SESSION['username'];
        $pri=$_POST['prize'];
    
    
        $sql = "DELETE FROM sentbox WHERE user='$user1' and work_type='$user2' and description='$user3' and location='$user4' and contact='$user5'";

        if ($conn->query($sql) === TRUE) {
            echo " row deleted successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        $sql2 = "DELETE FROM req WHERE to_user='$user1' and work_type='$user2' and description='$user3' and location='$user4' and contact='$user5'";

        if ($conn->query($sql2) === TRUE) {
            echo " row deleted successfully!";
        } else {
            echo "Error: " . $sql2 . "<br>" . $conn->error;
        }

        $sql3 = "INSERT  INTO  accept(work_provider, worker, work_type, description, location, contact,prize)
    VALUES ('$user1', '$user0', '$user2', '$user3', '$user4','$user5','$user6')";
    if ($conn->query($sql3) === TRUE) {
        echo " row uploaded successfully!";
    } else {
        echo "Error: " . $sql3 . "<br>" . $conn->error;
    }
    //echo"not";
}
    $conn->close();

    ?>
</body>
</html>
