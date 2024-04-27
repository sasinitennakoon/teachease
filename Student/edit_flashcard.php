<?php include 'dropdown2.php'; ?>

<?php
    // Include your database connection file
    include '../database/db_con.php';

    // Check if flashcard_id is set in the URL
    if(isset($_GET['flashcard_id'])) {
        $flashcard_id = $_GET['flashcard_id'];

        // Fetch flashcard details
        $sql = "SELECT * FROM scienceflashcrd WHERE id='$flashcard_id'";
        $result = mysqli_query($link, $sql);

        if ($result && mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $question = $row['question'];
            $answer = $row['answer'];
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Edit Flashcard</title>
                <link rel="stylesheet" href="./css/flash.css">
                <link rel="stylesheet" href="././css/dashboard.css">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
            </head>
            <body>
                <h1>Edit Flashcard</h1>
                <form method="POST">
                    <input type="hidden" name="flashcard_id" value="<?php echo $flashcard_id; ?>">
                    <label for="question">Question:</label><br>
                    <input type="text" id="question" name="question" value="<?php echo $question; ?>"><br>
                    <label for="answer">Answer:</label><br>
                    <input type="text" id="answer" name="answer" value="<?php echo $answer; ?>"><br><br>
                    <input type="submit" value="update" name='update'>
                </form>
            </body>
            </html>
            <?php
        } else {
            echo "<p>Flashcard not found.</p>";
        }
    } else {
        echo "<p>Flashcard ID not specified.</p>";
    }

    // Close the database connection
   
?>

<?php 
    if(isset($_POST['update']))
    {
        $question = $_POST['question'];
        $answer = $_POST['answer'];

        $query = mysqli_query($link,"update scienceflashcrd set question='$question', answer = '$answer' where id='$flashcard_id'");
        $sql = "SELECT * FROM scienceflashcrd_bundle where user_id='$session_id' ORDER BY id DESC LIMIT 4"; // Assuming you want to display the latest 4 bundles
        $result = mysqli_query($link, $sql);
        $row = mysqli_fetch_array($result);

        $bundleId = $row['id'];
?>
        <script>
    window.location = "viewflash.php?bundle_id=<?php echo $bundleId; ?>"  ;
</script>

        <?php
    }
?>
