<?php
$dataFile = 'group7_data.txt';

if (file_exists($dataFile)) {
    $teamArray = file($dataFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
} else {
    $teamData = "Rechelle|image1.png|Group Member|candidorechelleanne@gmail.com|I'm Rechelle Anne Candido, a third-year BSIT student. A working student, nail tech, makeup artist and I own a small business. I work hard because I want to pursue my course and become successful in the future.\n" .
                "Johnn Vhelle|Image2.jpg|Group Member|johnnvhellebasbas@gmail.com|Hi there! I'm Vhelle, and I'm a third-year college student at PLMun. I currently take the BSIT program. Watching movies and reading stories are two of my interests, and I'd like to master digital art someday.\n" .
                "Ian Christoper|Image5.jpeg|Group Leader|icasenci12@gmail.com|I'm Ian, a third-year BSIT student at PLMun! Just a guy trying to do better every passing day and hoping that life takes me to a simple yet better place.\n" .
                "Justin|Image 4.jpg|Group Member|Justinpadora@gmail.com|I'm Justin Padora, a third-year BSIT student who also works as a crew leader at a fast food restaurant. I'm motivated to work hard in order to achieve my goal of graduating.\n" .
                "Cyraine|Image3.jpg|Group Member|cyrainemae@gmail.com|My name is Cyraine Mae Magdaraog, a third-year BSIT student at PLMUN. My goal is to graduate and be successful someday.";
    file_put_contents($dataFile, $teamData);
    $teamArray = file($dataFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
}

// Handle POST request to add a new member
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = clean_input($_POST['name']);
    $image = clean_input($_POST['image']);
    $role = clean_input($_POST['role']);
    $contact = clean_input($_POST['contact']);
    $bio = clean_input($_POST['bio']);

    // Validate inputs
    if (!empty($name) && !empty($image) && !empty($role) && !empty($contact) && !empty($bio)) {
        // Add new member to the data file
        $newMember = "$name|$image|$role|$contact|$bio";
        file_put_contents($dataFile, "\n$newMember", FILE_APPEND);
        header("Location: team.php");
        exit();
    } else {
        echo "All fields are required!";
    }
}

// Function to clean user input
function clean_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>
