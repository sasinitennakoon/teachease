<?php
include '../database/db_con.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="././css/feed.css">
    <link rel="stylesheet" href="././css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        .emoji {
            cursor: pointer;
            font-size: 24px;
            margin-right: 10px;
        }

        .emoji:hover {
            filter: brightness(80%);
        }

        .emoji.highlighted {
            filter: none;
        }

        .emoji.enlarged {
            transform: scale(1.5); /* Adjust the scale factor as needed */
        }
        .star {
            color: #ccc; /* Default star color */
        }
    </style>
</head>
<body>
<?php include 'dropdown2.php'; 
if (!isset($_SESSION['id']) || ($_SESSION['id'] == '')) {
    header("location: index.php");
    exit();
}

$session_id=$_SESSION['id'];
$classes = [];
$class_ids = [];
$stmt = mysqli_prepare($link, "SELECT class_id, teacher_class.class_name FROM student_class INNER JOIN teacher_class on teacher_class.teacher_class_id = student_class.class_id WHERE student_id = ?");
if ($stmt) {
    mysqli_stmt_bind_param($stmt, "i", $session_id);
    mysqli_stmt_execute($stmt);

    // Bind both class_id and class_name
    mysqli_stmt_bind_result($stmt, $class_id, $class_name);

    while (mysqli_stmt_fetch($stmt)) {
        // Store both class_id and class_name in arrays
        $class_ids[] = $class_id;
        $classes[] = $class_name;
    }

    mysqli_stmt_close($stmt);
}

?>

<div class="sidebar">
    <div class="logo">
        <img src="././img/logo1.png" alt="Logo">
    </div>
    <hr color="white">
    <nav>
        <ul>
            <li><a href="studash.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li><a href="announcements.php"><i class="fas fa-bullhorn"></i> Announcements</a></li>
            <li><a href="MyCourses.php"><i class="fas fa-book"></i> My Courses</a></li>
            <li><a href="StudyMaterials.php"><i class="fas fa-book-open"></i> Study Materials</a></li>
            <li><a href="Tasks.php"><i class="far fa-sticky-note"></i></i> Flash Cards</a></li>
            <li><a href="Progress.php"><i class="fas fa-chart-line"></i> Progress Report</a></li>
            <li><a href="ExamR.php"><i class="fas fa-chalkboard"></i> Exam Results</a></li>
            <li><a href="msg.php"><i class="fas fa-envelope"></i> Messages</a></li>
            <li><a href="Feedback.php" class="active"><i class="fas fa-comment"></i> Feedback Collection</a></li>
        </ul>
    </nav>
</div>
<div class="content">
    <h2>Give Your Valuable Feedback Here!</h2>
    <div class="panelfeed">
        <h3> You can rate your classes and teachers here.<br>
            You can help us improve this online education platform.<br>
            Please rate if you are interested.<br></h3>
        <p> Thank You!<br>
            Admin Panel</p>
    </div>
    <div class="feedback-form">
        <h2>Feedback Form</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="rating">
            <h3>Choose Your Subject:</h3>
            <input type="radio" id="html" name="Subjects" value="Science">
            <label for="Science">Science</label><br>

            <input type="radio" id="html" name="Subjects" value="Mathematics">
            <label for="Mathematics">Mathematics</label><br>

            <input type="radio" id="html" name="Subjects" value="English">
            <label for="English">English</label><br>

            <input type="radio" id="html" name="Subjects" value="Sinahla">
            <label for="Sinahla">Sinahala</label><br>

            <input type="radio" id="html" name="Subjects" value="Buddhism">
            <label for="Buddhism">Buddhism</label><br>

            <input type="radio" id="html" name="Subjects" value="History">
            <label for="History">History</label><br>
            <!-- Add hidden input fields for ratings -->
            <input type="hidden" name="classRating" id="classRatingInput">
            <input type="hidden" name="teacherRating" id="teacherRatingInput">
        </div>

        <div class="rating">
    <h3>Choose Your Class:</h3>
    <select name="class_id">
        <option value="">Select a class</option>
        <?php
        // Display the class names, but use class_ids as the option values
        foreach ($classes as $index => $class) {
            echo "<option value=\"" . htmlspecialchars($class_ids[$index]) . "\">" . htmlspecialchars($class) . "</option>";
        }
        ?>
    </select>
</div>
        <div class="rating">
            <h3>Rate for the class:</h3>
            <div class="stars" id="classRating">
                <span class="star" data-value="1">&#9733;</span>
                <span class="star" data-value="2">&#9733;</span>
                <span class="star" data-value="3">&#9733;</span>
                <span class="star" data-value="4">&#9733;</span>
                <span class="star" data-value="5">&#9733;</span>
            </div>
        </div>
        <div class="rating">
            <h3>Rate for your teacher:</h3>
            <div class="emojis" id="teacherRating">
                <span class="emoji" data-value="very-bad">&#128545;</span>
                <span class="emoji" data-value="bad">&#128542;</span>
                <span class="emoji" data-value="neutral">&#128528;</span>
                <span class="emoji" data-value="satisfied">&#128522;</span>
                <span class="emoji" data-value="highly-satisfied">&#128525;</span>
            </div>
        </div>
        <div class="comment">
            <h3>Add a comment:</h3>
            <textarea id="commentText" name="comment" rows="4" cols="50" placeholder="Enter your comment here..."></textarea>
        </div>
        <button id="submitBtn" type="submit">Submit</button>
        </form>
    </div>
    <div class="popup" id="popup">
        <span class="close" id="close">&times;</span>
        <div class="popupContent" id="popupContent"></div>
    </div>
</div>

<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all fields are filled
    if(isset($_POST['Subjects']) && isset($_POST['class_id']) && isset($_POST['classRating']) && isset($_POST['teacherRating']) && isset($_POST['comment'])) {
        // Prepare and bind the SQL statement
        $stmt = mysqli_prepare($link, "INSERT INTO feedback (student_id,class_id, subject, class_rating, teacher_rating, comment) VALUES ('$session_id',?,?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "isiss",$class_id, $subject, $classRating, $teacherRating, $comment);
        
        // Set parameters
        $class_id = $_POST['class_id'];
        $subject = $_POST['Subjects'];
        $classRating = $_POST['classRating'];
        $teacherRating = $_POST['teacherRating'];
        $comment = $_POST['comment'];
       
        
        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            echo "Feedback submitted successfully!";
        } else {
            echo "Error: " . mysqli_stmt_error($stmt);
        }
        
        // Close statement and connection
        mysqli_stmt_close($stmt);
        mysqli_close($link);
    } else {
        echo "All fields are required!";
    }
}?>
<script>
    // Add JavaScript to set hidden input values before submitting the form
    const submitBtn = document.getElementById('submitBtn');
    const classRatingInput = document.getElementById('classRatingInput');
    const teacherRatingInput = document.getElementById('teacherRatingInput');

    // Function to get selected class rating
    function getSelectedClassRating() {
        const stars = document.querySelectorAll('.star');
        let count = 0;
        stars.forEach(star => {
            if (star.classList.contains('highlighted')) {
                count++;
            }
        });
        return count;
    }

    // Function to get selected teacher rating
    function getSelectedTeacherRating() {
        const emojis = document.querySelectorAll('.emoji');
        let rating = '';
        emojis.forEach(emoji => {
            if (emoji.classList.contains('enlarged')) {
                rating = emoji.getAttribute('data-value');
            }
        });
        return rating;
    }

    submitBtn.addEventListener('click', () => {
        const classRating = getSelectedClassRating();
        const teacherRating = getSelectedTeacherRating();
        const comment = document.getElementById('commentText').value.trim();

        // Set hidden input values
        classRatingInput.value = classRating;
        teacherRatingInput.value = teacherRating;
    });
    
    const stars = document.querySelectorAll('.star');
    const emojis = document.querySelectorAll('.emoji');
    const commentText = document.getElementById('commentText');
    const popup = document.getElementById('popup');
    const closePopup = document.getElementById('close');
    const popupContent = document.getElementById('popupContent');

    stars.forEach(star => {
        star.addEventListener('click', () => {
            const rating = parseInt(star.getAttribute('data-value'));
            highlightStars(rating);
            showPopup(`You rated ${rating} star(s) for the class.`);
        });
    });

    function highlightStars(count) {
        stars.forEach((star, index) => {
            if (index < count) {
                star.classList.add('highlighted');
            } else {
                star.classList.remove('highlighted');
            }
        });
    }

    emojis.forEach(emoji => {
        emoji.addEventListener('click', () => {
            const rating = emoji.getAttribute('data-value');
            highlightEmojis(emoji);
            showPopup(`You rated the teacher as: ${rating}`);
        });
    });

    function highlightEmojis(selectedEmoji) {
        emojis.forEach(emoji => {
            if (emoji === selectedEmoji) {
                emoji.classList.toggle('enlarged');
            } else {
                emoji.classList.remove('enlarged');
            }
        });
    }

    submitBtn.addEventListener('click', () => {
        const comment = commentText.value.trim();
        if (comment !== '') {
            showPopup(`Your comment: ${comment}`);
        } else {
            showPopup('Please add a comment before submitting.');
        }
    });

    closePopup.addEventListener('click', () => {
        popup.style.display = 'none';
    });

</script>
</body>
</html>