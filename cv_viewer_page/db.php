<?php 

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cv_information";

    // create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // check connection
    if($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    //update password hashed
    // $sql = "SELECT id, password FROM users";
    // $result = $conn->query($sql);

    // if ($result->num_rows > 0) {
    //     while ($row = $result->fetch_assoc()) {
    //         $userId = $row['id'];
    //         $plainPassword = $row['password'];

    //         // Hash the password
    //         $hashedPassword = password_hash($plainPassword, PASSWORD_DEFAULT);

    //         // Update the database with the hashed password
    //         $updateSql = "UPDATE users SET password = '$hashedPassword' WHERE id = $userId";
    //         $conn->query($updateSql);
    //     }
    //     // echo "Passwords hashed and updated successfully.";
    // } else {
    //     echo "No users found.";
    // }


    //retrieve data
    $user_id = 2;

    //user
    $sql_user = "SELECT * FROM users WHERE id = $user_id";
    $result_user = $conn->query($sql_user);

    if ($result_user->num_rows > 0) {
        $user = $result_user->fetch_assoc();
    } else {
        echo "User not found.";
    }

    //resume
    $sql_resume = "SELECT id FROM resumes WHERE user_id = $user_id";
    $result_resume = $conn->query($sql_resume);

    if ($result_resume->num_rows > 0) {
        while ($row = $result_resume->fetch_assoc()) {
            $resume_id = $row["id"];

        }
    } else {
        echo "Resume not found.";
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

    

    // Close connection
    // $conn->close();

?>