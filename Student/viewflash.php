<?php include 'dropdown2.php'; ?>

<?php
    // Include your database connection file
    include '../database/db_con.php';

    // Check if bundle_id is set in the URL
    if(isset($_GET['bundle_id'])) {
        $bundle_id = $_GET['bundle_id'];

        // Fetch flashcards belonging to the specified bundle
        $sql = "SELECT * FROM scienceflashcrd WHERE bundle_id='$bundle_id'";
        $result = mysqli_query($link, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>View Flashcards</title>
                <link rel="stylesheet" href="./css/flash.css">
                <link rel="stylesheet" href="./css/general2.css">
    <link rel="stylesheet" href="././css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
            </head>
            <body>
            <a href="scienceflash.php"><button>Go to Dashboard</button></a>
                <h1><center>Flashcards in Bundle <?php echo $bundle_id; ?></center></h1>
                
                <div class="content">
   

                <table id="myTable">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Question</th>
                        <th>Answer</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                       
                    <?php
                        // Output flashcards
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<div class='flashcard'>";?>
                            <tr>
                                <td></td>
                         <td><?php echo $row["question"]; ?></td>
                         <td><?php echo $row['answer']; ?></td>
                           
                          <td><?php  echo "<a style='text-decoration:none;' href='edit_flashcard.php?flashcard_id=" . $row['id'] . "'>Edit</a>"; ?></td>
                          <td><?php  echo "<a style='text-decoration:none;'href='delete_flashcard.php?flashcard_id=" . $row['id'] . "'>Delete</a>"; ?></td>
                        </tr>
                          <?php
                        }
                    ?>

                    
                    </tbody>
                    </table>
                </div>
            </body>
            </html>
            <?php
        } else {
            echo "<p>No flashcards found in this bundle.</p>";
        }
    } else {
        echo "<p>Bundle ID not specified.</p>";
    }

    // Close the database connection
    mysqli_close($link);
?>


