<?php
include 'db_connection.php';
error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Work Information Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            color: #333;
        }
        h2 {
            color:#8d1a27; /* Blue color for heading */
        }
        form {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            background-color: #f2f2f2;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border:1px solid black;
        }
        label {
            
            margin-bottom: 5px;
            color: #555;
        }
        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="file"] {
            margin-top: 5px;
        }
        input[type="submit"] {
            background-color:#ff5050;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-left: 42%;
        }
        input[type="submit"]:hover {
            background-color:#3939ac; /* Darker shade of blue on hover */
        }
    </style>
</head>
<body>
    <h2>Work Information Form</h2>
    <form  method="post" enctype="multipart/form-data">
        <label for="user">Enter Your Username:</label>
        <input type="text" id="user" name="user" required><br>
        <br>
        <label>Type of Work:</label><br>
        <input type="radio" id="online" name="work_type" value="online" >
        <label for="online">Online</label><br>
        <input type="radio" id="offline" name="work_type" value="offline">
        <label for="offline">Offline</label><br>
        <br>
        <label for="description">Work Description:</label>
        <textarea id="description" name="description" rows="4" cols="50" required></textarea><br>
        <br>
        <label for="location">Location:</label>
        <input type="text" id="location" name="location" required><br>
        <br>
        <label for="images">Images:</label>
        <input type="file" id="images" name="images" accept="images/*"><br>
        <br>
        <label for="file">File:</label>
        <input type="file" id="file" name="file" accept="file/*"><br>
        <br>
        <label for="contact">Contact Number:</label>
        <input type="number" id="contact" name="contact" pattern="[0-9]{10}" required><br>

        <input type="submit" value="Submit" name="submit">
    </form>
    <?php
    
        // Get file details
        $fileName = $_FILES['images']['name'];
        $fileType = $_FILES['images']['type'];
        $fileTmpName = $_FILES['images']['tmp_name'];
        $fileError = $_FILES['images']['error'];
        $fileSize = $_FILES['images']['size'];
        $username = $_POST['user'];
        $work_type = $_POST['work_type'];
        $description = $_POST['description'];
        $location = $_POST['location'];
        //$images = $_FILES['images']['name']; 
        $file = $_FILES['file']['name']; 
        $contact = $_POST['contact'];

        // Check if file is selected and no errors occurred
        if($fileError === 0) {
            // Read file content
            $imageData = file_get_contents($fileTmpName);
            // Escape special characters in file content
            $escapedImageData = $conn->real_escape_string($imageData);
    
            // Insert image data into database
            //$sql = "INSERT INTO img(image_name, image_data) VALUES ('$fileName', '$escapedImageData')";
            $sql = "INSERT  INTO  sentbox(user, work_type, description, location, images,file, contact)
        VALUES ('$username', '$work_type', '$description', '$location', '$escapedImageData','$file', '$contact')";
            if ($conn->query($sql) === TRUE) {
                echo "Image and row uploaded successfully!";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Error uploading file.";
        }
    
// Include database connection

// Get form data
/*$a = $_REQUEST['user'];
$b = $_REQUEST['work_type'];
$c = $_REQUEST['description'];
$d = $_REQUEST['location'];
$e = $_FILES['image']['name'];
$f = $_FILES['file']['name'];
$g = $_REQUEST['contact'];


// Insert user data into database
$sql1 = "INSERT INTO sentbox VALUES ('',$a', '$b', '$c','$d','$e','$f','$g')";

$data=mysqli_query($conn,$sql1);
if($data)
{
	echo"database ok";
}
else
{
	echo"failed";
}
mysqli_close($conn);*/
/*$username = $_POST['user'];
$work_type = $_POST['work_type'];
$description = $_POST['description'];
$location = $_POST['location'];
//$images = $_FILES['images']['name']; 
$file = $_FILES['file']['name']; 

$contact = $_POST['contact'];
$sql = "INSERT  INTO  sentbox(user, work_type, description, location, images,file, contact)
        VALUES ('$username', '$work_type', '$description', '$location', '$images','$file', '$contact')";

if ($conn->query($sql) == TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();*/
?>
</body>
</html>
