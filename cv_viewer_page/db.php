<?php 
include '../config/db.php';
session_start();

if (!$_SESSION['is_signed_in']) {
    header("Location: ../login_page/login.php");
}

//recognize resume
$user_id = $_SESSION['user_id'];
if (isset($_GET['cv_id'])) {
    $resume_id = $_GET['cv_id'];
}

//user
$sql_user = "SELECT * FROM users WHERE id = $user_id";
$result_user = $conn->query($sql_user);

if ($result_user->num_rows > 0) {
    $user = $result_user->fetch_assoc();
} else {
    echo "User not found.";
}

//education
$sql_edu = "SELECT * FROM education WHERE id = $user_id";
$result_edu = $conn->query($sql_edu);

if($result_edu->num_rows > 0) {
    $edu = $result_edu->fetch_assoc();
} else {
    echo "Education not found.";
}

//experiences
function getExperiences($resume_id, $conn) {
    $sql_exp = "SELECT * FROM experiences WHERE resume_id = $resume_id";
    // echo "Resume ID for User: $resume_id";
    $result_exp = $conn->query($sql_exp);

    // Check if there are any experiences
    if ($result_exp->num_rows > 0) {
        $experiences = array();
        // Iterate over the result set and add each experience to the array
        while ($exp = $result_exp->fetch_assoc()) {
            $experiences[] = $exp;
        }
        return $experiences;
    } else {
        return array(); // Return an empty array if no experiences are found
    }
}

//skills
function getSkills($resume_id, $conn) {
    $sql_skill = "SELECT * FROM skills WHERE resume_id = $resume_id";
    $result_skill = $conn->query($sql_skill);

    // Check if there are any experiences
    if ($result_skill->num_rows > 0) {
        $skills = array();
        // Iterate over the result set and add each experience to the array
        while ($skill = $result_skill->fetch_assoc()) {
            $skills[] = $skill;
        }
        return $skills;
    } else {
        return array(); // Return an empty array if no experiences are found
    }
}

//projects
function getProjects($resume_id, $conn) {
    $sql_project = "SELECT * FROM projects WHERE resume_id = $resume_id";
    $result_project = $conn->query($sql_project);
    // Check if there are any experiences
    if ($result_project->num_rows > 0) {
        $projects = array();
        // Iterate over the result set and add each experience to the array
        while ($project = $result_project->fetch_assoc()) {
            $projects[] = $project;
        }
        return $projects;
    } else {
        return array(); // Return an empty array if no experiences are found
    }
}
?>