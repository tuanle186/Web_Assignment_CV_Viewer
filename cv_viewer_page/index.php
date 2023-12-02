<?php 
    include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
    <div class="container">
        <div class="avatar">
            <!-- display img -->
            <?php                 
                // Get image data from database 
                $result = $conn->query("SELECT image FROM avatar ORDER BY id DESC"); 
            ?>

            <!-- Display images with BLOB data from database -->
            <?php if($result->num_rows > 0){ ?> 
                <div class="gallery"> 
                    <?php while($row = $result->fetch_assoc()){ ?> 
                        <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" /> 
                    <?php } ?> 
                </div> 
            <?php }else{ ?> 
                <!-- <p class="status error">Image(s) not found...</p>  -->
                <form class="open" action="upload.php" method="post" enctype="multipart/form-data">
                    <label>Select Image File:</label>
                    <input type="file" name="image">
                    <input type="submit" name="submit" value="Upload" class="submitBtn">
                </form>
            <?php } 
            ?>
        </div>

        <div class="name">
            <h1><?php echo isset($user['name']) ? $user['name'] : 'User Name'; ?></h1>

            <div class="specialize">
                <?php echo isset($user['position']) ? $user['position'] : 'User Position'; ?>
            </div>

            <ul class="contact">
                <li><span>G</span><?php echo isset($user['gender']) ? $user['gender'] : 'Gender'; ?></li>
                <li><span>D</span><?php echo isset($user['dob']) ? $user['dob'] : 'DOB'; ?></li>
                <li><span>P</span><?php echo isset($user['phone']) ? $user['phone'] : 'Phone'; ?></li>
                <li><span>E</span><?php echo isset($user['email']) ? $user['email'] : 'Email'; ?></li>
                <li><span>A</span><?php echo isset($user['address']) ? $user['address'] : 'Address'; ?></li>
            </ul>
        </div>


        <div class="info">
            <ul>
                <li>
                    Graduted from <b><?php echo isset($edu['uni_name']) ? $edu['uni_name'] : 'University Name'; ?></b> 
                </li>
                <li>
                    Graduation year <b><?php echo isset($edu['grad_year']) ? $edu['grad_year'] : 'University Graduation Year'; ?></b> 
                </li>
                <li>
                    Degree <b><?php echo isset($edu['degree']) ? $edu['degree'] : 'Degree'; ?></b> 
                </li>
                <li>
                    Major <b><?php echo isset($edu['major']) ? $edu['major'] : 'Major'; ?></b> 
                </li>
            </ul>
        </div>

        <div class="intro">
            <h2>INTRODUCTION</h2>
            <?php echo isset($user['introduction']) ? $user['introduction'] : 'Introduction'; ?>
        </div>

        <div class="exp">

            <h2>EXPERIENCES</h2>
            <?php 
                $experiences = getExperiences($resume_id, $conn);
                // echo "Resume ID for User ID: $resume_id";

                foreach ($experiences as $exp) {
                    echo '<div class="item">';
                    echo '<h4>' . (isset($exp['position']) ? $exp['position'] : 'Position') . '</h4>';
                    echo '<div class="time">';
                    echo 'Worked for ';
                    echo '<span>' . (isset($exp['company']) ? $exp['company'] : 'Company') . '</span>';
                    echo ' in ';
                    echo '<span>' . (isset($exp['duration']) ? $exp['duration'] : 'Time working') . ' months</span>';
                    echo '</div>';
                    echo '</div>';
                }
            ?>

            <h2 class="skills">Skills</h2>
            <?php 
                $skills = getSkills($resume_id, $conn);

                foreach($skills as $skill) {
                    echo '<ul>';
                    echo '<li>' . (isset($skill['name']) ? $skill['name'] : 'Skill') . '</li>';
                    echo '</ul>';
                }
            ?>
        </div>

        <div class="project">
            <h2>PROJECTS</h2>

            <?php 

                $projects = getProjects($resume_id, $conn);

                foreach($projects as $project) {
                    echo '<div class="item">';
                        echo '<h4>'. (isset($project['name']) ? $project['name'] : 'Project Name') .'</h4>';
                        echo '<div class="time"> <b>Working time: </b>';
                            echo  (isset($project['duration']) ? $project['duration'] : 'Project Working Time');
                        echo ' months</div>';
                        echo '<div class="web">';
                            echo (isset($project['web']) ? $project['web'] : 'Project Web Demo');
                        echo '</div>';
                        echo '<div class="location">';
                            echo (isset($project['field']) ? $project['field'] : 'Project Field');
                        echo '</div>';
                        echo '<div class="framework"><b>Framework used: </b>';
                            echo (isset($project['technology']) ? $project['technology'] : 'Project Framework')  ;
                        echo '</div>';
                        echo '<div class="des">';
                            echo (isset($project['description']) ? $project['description'] : 'Project Description') ;
                        echo '</div>';
                    echo '</div>';
                }

            ?>
        </div>
    </div>

    <button id="generate-pdf" onclick="getPDF()">Print CV</button>

    <script>
        var btn = document.querySelector("button");
        btn.onclick = () => {
                window.print();
        }
    </script>
    
    
    
</body>
</html>