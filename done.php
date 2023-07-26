<?php

// Retrieve user information from query parameters
$gender = isset($_POST["gender"]) ? $_POST["gender"] : "";
$firstName = isset($_POST["first_name"]) ? $_POST["first_name"] : "";
$lastName = isset($_POST["first_name"]) ? $_POST["last_name"] : "";
$address = isset($_POST["address"]) ? $_POST["address"] : "";
$skills = isset($_POST["skills"]) ? $_POST["skills"]: "";
$department = isset($_POST["department"]) ? $_POST["department"] : "";

// Function to determine the appropriate title based on gender
function getTitle($gender)
{
    return $gender === "male" ? "Mr." : "Miss";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration Done</title>
</head>
<body>
    <h1>Thank you <?php echo getTitle($gender) . " " . $firstName . " " . $lastName; ?></h1>
    <p>Please review your information:</p>
    <p>Name: <?php echo $firstName . " " . $lastName; ?></p>
    <p>Address: <?php echo $address; ?></p>
     <p>Your skills:</p>
    <ul>
        <?php foreach ($skills as $skill) : ?>
            <li><?php echo $skill; ?></li>
        <?php endforeach; ?>
    </ul>
    <p>Department: <?php echo $department; ?></p>
</body>
</html>
