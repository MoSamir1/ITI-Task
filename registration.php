<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="main.css">
  <title>Registration</title>
</head>
<body>
  
  <form  action="done.php" method="post">
  <fieldset>
    <legend>Registration</legend>
    <label for="first_name">First Name:</label>
    <input type="text" name="first_name" id="first_name"><br>
    
    <label for="last_name">Last Name:</label>
    <input type="text" name="last_name" id="last_name"><br>
    
    <label class="labelarea" for="address">Address:</label>
    <textarea name="address" id="address" cols="22" rows="10"></textarea>
    <br>

    
    
    <label for="country">Country:</label>
    <select name="country" id="country">
      <option value="egypt">Egypt</option>
      <option value="italy">Italy</option>
      <option value="saudia">Eaudia</option>
      <option value="emirates">Emirates</option>
    </select><br>

    <label for="gender">Gender:</label>
    <input type="radio" name="gender" id="gender" value="male">
    <label for="gender">Male</label>
    <input type="radio" name="gender" id="gender" value="female">
    <label for="gender">Female</label><br><br>

    
    <label for="skills">Skills:</label><br>
    <input type="checkbox" name = "skills[]" value = "PHP" id = "PHP">
    <label for="PHP">PHP</label>
    <input type="checkbox" name = "skills[]" value = "J2SE" id = "J2SE">
    <label for="J2SE">J2SE</label><br>
    <input type="checkbox" name = "skills[]" value = "MySQL" id = "MySQL">
    <label for="MySQL">MySQL</label>
    <input type="checkbox" name = "skills[]" value = "PostgreeSQL" id = "PostgreeSQL">
    <label for="PostgreeSQL">PostgreeSQL</label>
    <br>

    <label for="userName">User Name:</label>
    <input type="text" name="userName" id="userName"><br>
    
    <label for="pass">Password :</label>
    <input type="text" name="pass" id="pass"><br>
    <label for="department">Department</label>
    <input type="text" name="department" id="department"><br>
    <div class = "captcha">
      <br>
      <img src="9.png" alt="captcha"><br>
      <input type="text" name="captcha" id="captcha">
    </div>
    
    <input type="submit" name="submit" value="Submit">
    <input type="reset">
  </form>
  </fieldset>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Assuming the form fields are named as follows
    $gender = $_POST["gender"];
    $firstName = $_POST["first_name"];
    $lastName = $_POST["last_name"];
    $address = $_POST["address"];
    $skills = $_POST["skills"];
    $department = $_POST["department"];

    // Redirect to "done.php" along with query parameters containing user information
    header("Location: done.php?gender=$gender&first_name=$firstName&last_name=$lastName&address=$address&skills=$skills&department=$department");
    exit();
}
?>


<?php
// Define an array to store error messages
$errors = array();

// Define the expected captcha value
$expectedCaptcha = "262S2V";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Assuming the form fields are named as follows
    $gender = isset($_POST["gender"]) ? $_POST["gender"] : "";
    $firstName = isset($_POST["first_name"]) ? $_POST["first_name"] : "";
    $lastName = isset($_POST["last_name"]) ? $_POST["last_name"] : "";
    $address = isset($_POST["address"]) ? $_POST["address"] : "";
    $skills = isset($_POST["skills"]) ? $_POST["skills"] : array();
    $department = isset($_POST["department"]) ? $_POST["department"] : "";
    $captcha = isset($_POST["captcha"]) ? $_POST["captcha"] : "";

    // Validate required fields
    if (empty($gender)) {
        $errors[] = "Gender is required.";
    }
    if (empty($firstName)) {
        $errors[] = "First Name is required.";
    }
    if (empty($lastName)) {
        $errors[] = "Last Name is required.";
    }
    if (empty($address)) {
        $errors[] = "Address is required.";
    }
    if (empty($skills)) {
        $errors[] = "Please select at least one skill.";
    }
    if (empty($department)) {
        $errors[] = "Department is required.";
    }

    // Validate captcha
    if ($captcha !== $expectedCaptcha) {
        $errors[] = "Please enter the correct captcha value.";
    }

    // If there are no errors, proceed with the registration
    if (empty($errors)) {
        // Redirect to "done.php" along with query parameters containing user information
        header("Location: done.php?gender=$gender&first_name=$firstName&last_name=$lastName&address=$address&skills=" . implode(",", $skills) . "&department=$department");
        exit();
    }
}