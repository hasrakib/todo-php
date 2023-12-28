

// // Database connection info
// // $dbHost = 'localhost';
// // $dbName = 'todoapp-database';
// // $dbUser = '';
// // $dbPass = '';

// // // Connect to the database
// // $conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

// // Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }
// if(isset($_POST['checkbox']) && $_POST['checkbox'] == '1') {

//     // Update status in database
//     $stmt = $db->prepare("UPDATE table SET status = 1 WHERE id = :id");
//     $stmt->bindParam(':id', $id);
//     $stmt->execute();

//     // Fetch updated data
//     $stmt = $db->prepare("SELECT * FROM table WHERE id = :id");
//     $stmt->bindParam(':id', $id);
//     $stmt->execute();
//     $result = $stmt->fetchAll();

//     // Output updated data
//     echo json_encode($result);
//   }
// header('Location: index.php');
// 

// todo-php/check.php
<?php
include 'database.php';


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['checkbox']) && isset($_POST['id'])) {
    $id = $_POST['id'];
    $status = ($_POST['checkbox'] == '1') ? 1 : 0;

    
    $stmt = $conn->prepare("UPDATE todov1 SET status = ? WHERE id = ?");
    $stmt->bind_param('ii', $status, $id);
    $stmt->execute();

    
    $response = array('status' => $status);
    echo json_encode($response);
}


exit();
?>

