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
                <link rel="stylesheet" href="./css/dashboard.css">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
                <style>
                    /* Styling for flashcards */
                    .flashcard-container {
                        display: flex;
                        flex-wrap: wrap;
                        justify-content: center;
                        gap: 20px;
                        margin-top: 20px;
                    }
                .flashcard {
                    width: 300px;
                    height: 200px;
                    perspective: 1000px;
                    position: relative;
                    margin-bottom: 20px;
                }
                .flashcard .front, .flashcard .back {
                    width: 100%;
                    height: 100%;
                    position: absolute;
                    top: 0;
                    left: 0;
                    backface-visibility: hidden;
                    transition: transform 0.5s;
                    border-radius: 10px;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                }
                .flashcard .front {
                    background-color: #FFD700; /* Golden */
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    font-size: 24px;
                }
                .flashcard .back {
                    background-color: #90EE90; /* Light Green */
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    font-size: 24px;
                    transform: rotateY(180deg);
                }
                .flashcard.flipped .front {
                    transform: rotateY(180deg);
                }
                .flashcard.flipped .back {
                    transform: rotateY(0deg);
                }
            
                .flashcard .card-inner {
                    width: 100%;
                    height: 100%;
                    position: absolute;
                    transition: transform 0.8s ease;
                    transform-style: preserve-3d;
                    border-radius: 10px;
                }
                
                .flashcard .front {
                    background-color: #3498db; /* Blue */
                }
                .flashcard .back {
                    background-color: #2ecc71; /* Green */
                    transform: rotateY(180deg);
                }
                .flashcard.flipped .card-inner {
                    transform: rotateY(180deg);
                }
                .flashcard {
                    width: 300px;
                    height: 200px;
                    position: relative;
                    margin-bottom: 20px;
                    perspective: 1000px;
                }
                
                </style>
            </head>
            <body>
                <a href="scienceflash.php"><button>Go to Dashboard</button></a>
                <h1 style="text-align: center;">Flashcards in Bundle <?php echo $bundle_id; ?></h1>
                
                <div class="flashcard-container">
                    <?php
                    // Output flashcards
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <div class="flashcard" onclick="flipCard(this)">
                            <div class="front">
                                <!-- Front side content (Question) -->
                                <p><?php echo htmlspecialchars($row["question"]); ?></p>
                            </div>
                            <div class="back">
                                <!-- Back side content (Answer) -->
                                <p><?php echo htmlspecialchars($row["answer"]); ?></p>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>

                <script>
                    function flipCard(card) {
                        card.classList.toggle('flipped');
                    }
                </script>
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
