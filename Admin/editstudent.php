<?php
include '../Includes/dbcon.php';

$id = $_GET['id'];
$sql = "SELECT * FROM tblstudent WHERE id='$id'";
$result = $conn->query($sql);
$student = $result->fetch_assoc();

if (isset($_POST['updateStudent'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $registrationNumber = $_POST['registrationNumber'];
    $course = $_POST['course'];
    $faculty = $_POST['faculty'];

    $sql = "UPDATE tblstudent SET 
        firstName='$firstName', 
        lastName='$lastName', 
        email='$email', 
        registrationNumber='$registrationNumber', 
        course='$course', 
        faculty='$faculty' 
        WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Student updated successfully!";
        header("Location: viewStudents.php");
    } else {
        echo "Error updating student: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Student</title>
</head>
<body>
    <h2>Edit Student</h2>
    <form action="" method="POST">
        <input type="text" name="firstName" value="<?php echo $student['firstName']; ?>" required>
        <input type="text" name="lastName" value="<?php echo $student['lastName']; ?>" required>
        <input type="email" name="email" value="<?php echo $student['email']; ?>" required>
        <input type="text" name="registrationNumber" value="<?php echo $student['registrationNumber']; ?>" required>
        <input type="text" name="course" value="<?php echo $student['course']; ?>" required>
        <input type="text" name="faculty" value="<?php echo $student['faculty']; ?>" required>
        <button type="submit" name="updateStudent">Update</button>
    </form>
</body>
</html>
