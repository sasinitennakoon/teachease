<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <!--<link rel="stylesheet" href="../admin/css/dashboard.css"> -->
    <link rel="stylesheet" href="./css/1stterm.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
<?php include 'dropdown2.php'; ?>

<?php


  $query1 = mysqli_query($link,"select * from student where student_id = '$session_id'") or die(mysqli_error($link));
  $row = mysqli_fetch_array($query1) or die($query1);
  $student = $row['firstname'];
  $student_id = $row['student_id'];

  $query2 = mysqli_query($link,"select * from parent where childrenname = '$student'");
  $parent = mysqli_fetch_array($query2);
  $pname = $parent['firstname'];
?>

<a href="ExamR.php"><button>Go to Dashboard</button></a>

<div class="content">
    <h1>3rd term Result Sheet</h1>
    <?php


$query1 = mysqli_query($link,"select * from student where student_id = '$session_id'") or die(mysqli_error($link));
$row = mysqli_fetch_array($query1) or die($query1);
$student = $row['firstname'];
$student_id = $row['student_id'];

$query2 = mysqli_query($link,"select * from parent where childrenname = '$student'");
$parent = mysqli_fetch_array($query2);
$pname = $parent['firstname'];

$query = mysqli_query($link,"select * from marks_new where student_id = '$session_id' AND term_id = '3'");
              $count = mysqli_num_rows($query);

              if($count <= 0 || $count != 6)
              {
                  echo '<b><center>There is No Marks records to you.<center><b/>';
              }
              else if($count >= 1)
              {
?>
<button onclick="printResultSheet()">Print Result Sheet</button>
<script>
    function printResultSheet() {
        var printContent = document.querySelector('.panelsD').outerHTML;
        var originalContent = document.body.innerHTML;
        
        document.body.innerHTML = printContent;

        // Wait a short delay for rendering to complete, then trigger print
        setTimeout(function() {
            window.print();
            document.body.innerHTML = originalContent;
        }, 500);
    }
</script>
    <div class="panelsD">
            <h2>Result Sheet</h2>
            <h3>Term 03</h3>

            <table border="1px">

                <td colspan="3">Index Number:210200<?php echo $student_id;?></td>
                <td colspan="6">Status: <?php 
                $query = mysqli_query($link,"select * from average where student_id = '$session_id'");
                $row = mysqli_fetch_array($query);
                $avg = $row['average_marks'];

                if($avg > 35)
                    echo 'Pass';
                else
                    echo 'Fail';
                ?></td>
        
                <tr>
                    <td colspan="3"> Registration Number: STD100<?php
                    echo $student_id;
                    ?></td>
                    <td colspan="6">Grade: 10</td>
                </tr>
        
                <tr>
                    <td colspan="6">Student Name:<?php echo $student; ?></td>
                </tr>
        
                <tr>
                    <td colspan="6">Parent Name:  <?php
                     echo $parent['firstname']; ?></td>
                </tr>
                <?php 
                if($avg < 35){?>
                <tr style="background-color: red"><?php }else {?>
                
                
                <tr style="background-color: lightgreen;"><?php }?>
                <th>Number</th>
                <th>Subject</th>
                <th>Total Mark</th>
                <th>Previous Term Mark</th>
                <th>Obtain Mark</th>
                <th>Remarks</th>
                    </tr>
                    <?php
                     $query = mysqli_query($link,"select * from marks where student_id = '$student_id' AND term_id='2'");
                     $row2 = mysqli_fetch_array($query) or die($mysqli_error($query));
                ?>
                    <?php 
                    $sql = mysqli_query($link,"select * from marks where student_id='$student_id' AND subject_id = '14' AND term_id = '3'");
                    $row = mysqli_fetch_array($sql);
                    $mar = $row['marks'];
                    if($mar < 35)
                    {
                ?>
                <tr style="background-color: #FFCCCB;">
                <?php }else { ?>
                    <?php } ?>
                    <th>01</th>
                    <th>Science</th>
                    <th>100</th>
                    <th><?php 
        $sql = mysqli_query($link,"select * from marks where student_id='$student_id' AND subject_id = '14' AND term_id = '2'");
        $row = mysqli_fetch_array($sql);
        echo $row['marks'];
        $sc = $row['marks'];
        ?></th>
                    <th><?php 
        $sql = mysqli_query($link,"select * from marks where student_id='$student_id' AND subject_id = '14' AND term_id = '3'");
        $row = mysqli_fetch_array($sql);
        echo $row['marks'];
        $sc = $row['marks'];
        ?></th>
                    <th>pass</th>
                </tr>
        
                <?php 
                    $sql = mysqli_query($link,"select * from marks where student_id='$student_id' AND subject_id = '9' AND term_id = '3'");
                    $row = mysqli_fetch_array($sql);
                    $mar = $row['marks'];
                    if($mar < 35)
                    {
                ?>
                <tr style="background-color: #FFCCCB;">
                <?php }else { ?>
                    <?php } ?>
                    <th>02</th>
                    <th>Mathematics</th>
                    <th>100</th>
                    <th><?php 
        $sql = mysqli_query($link,"select * from marks where student_id='$student_id' AND subject_id = '9' AND term_id = '2'");
        $row = mysqli_fetch_array($sql);
        echo $row['marks'];
        $math = $row['marks'];
        ?></th>
                    <th><?php 
        $sql = mysqli_query($link,"select * from marks where student_id='$student_id' AND subject_id = '9' AND term_id = '3'");
        $row = mysqli_fetch_array($sql);
        echo $row['marks'];
        $math = $row['marks'];
        ?></th>
                    <th><?php if($row['marks'] > 35)
                                echo 'Pass';
                                else
                                echo 'Fail'; ?></th>
                </tr>
        
                <?php 
                    $sql = mysqli_query($link,"select * from marks where student_id='$student_id' AND subject_id = '12' AND term_id = '3'");
                    $row = mysqli_fetch_array($sql);
                    $mar = $row['marks'];
                    if($mar < 35)
                    {
                ?>
                <tr style="background-color: #FFCCCB;">
                <?php }else { ?>
                    <?php } ?>
                    <th>03</th>
                    <th>English</th>
                    <th>100</th>
                    <th><?php 
        $sql = mysqli_query($link,"select * from marks where student_id='$student_id' AND subject_id = '12' AND term_id = '2'");
        $row = mysqli_fetch_array($sql);
        echo $row['marks'];
        $eng = $row['marks'];
        ?></th>
                    <th><?php 
        $sql = mysqli_query($link,"select * from marks where student_id='$student_id' AND subject_id = '12' AND term_id = '3'");
        $row = mysqli_fetch_array($sql);
        echo $row['marks'];
        $eng = $row['marks'];
        ?></th>
                    <th><?php if($row['marks'] > 35)
                                echo 'Pass';
                                else
                                echo 'Fail'; ?></th>
                </tr>

                <?php 
                    $sql = mysqli_query($link,"select * from marks where student_id='$student_id' AND subject_id = '16' AND term_id = '3'");
                    $row = mysqli_fetch_array($sql);
                    $mar = $row['marks'];
                    if($mar < 35)
                    {
                ?>
                <tr style="background-color: #FFCCCB;">
                <?php }else { ?>
                    <?php } ?>
                    <th>04</th>
                    <th>Sinhala</th>
                    <th>100</th>
                    <th><?php 
        $sql = mysqli_query($link,"select * from marks where student_id='$student_id' AND subject_id = '16' AND term_id = '2'");
        $row = mysqli_fetch_array($sql);
        echo $row['marks'];
        $sin = $row['marks'];
        ?></th>
                    <th><?php 
        $sql = mysqli_query($link,"select * from marks where student_id='$student_id' AND subject_id = '16' AND term_id = '3'");
        $row = mysqli_fetch_array($sql);
        echo $row['marks'];
        $sin = $row['marks'];
        ?></th>
                    <th><?php if($row['marks'] > 35)
                                echo 'Pass';
                                else
                                echo 'Fail'; ?></th>
                </tr>

                <?php 
                    $sql = mysqli_query($link,"select * from marks where student_id='$student_id' AND subject_id = '15' AND term_id = '3'");
                    $row = mysqli_fetch_array($sql);
                    $mar = $row['marks'];
                    if($mar < 35)
                    {
                ?>
                <tr style="background-color: #FFCCCB;">
                <?php }else { ?>
                    <?php } ?>
                    <th>05</th>
                    <th>Buddhism</th>
                    <th>100</th>
                    <th><?php 
        $sql = mysqli_query($link,"select * from marks where student_id='$student_id' AND subject_id = '15' AND term_id = '2'");
        $row = mysqli_fetch_array($sql);
        echo $row['marks'];
        $bu = $row['marks'];
        ?></th>
                    <th><?php 
        $sql = mysqli_query($link,"select * from marks where student_id='$student_id' AND subject_id = '15' AND term_id = '3'");
        $row = mysqli_fetch_array($sql);
        echo $row['marks'];
        $bu = $row['marks'];
        ?></th>
                    <th><?php if($row['marks'] > 35)
                                echo 'Pass';
                                else
                                echo 'Fail'; ?></th>
                </tr>

                <?php 
                    $sql = mysqli_query($link,"select * from marks where student_id='$student_id' AND subject_id = '14' AND term_id = '3'");
                    $row = mysqli_fetch_array($sql);
                    $mar = $row['marks'];
                    if($mar < 35)
                    {
                ?>
                <tr style="background-color: #FFCCCB;">
                <?php }else { ?>
                    <?php } ?>
                    <th>06</th>
                    <th>History</th>
                    <th>100</th>
                    <th><?php 
        $sql = mysqli_query($link,"select * from marks where student_id='$student_id' AND subject_id = '14' AND term_id = '2'");
        $row = mysqli_fetch_array($sql);

        echo $row['marks'];
        $his = $row['marks'];
        ?></th>
                    <th><?php 
        $sql = mysqli_query($link,"select * from marks where student_id='$student_id' AND subject_id = '14' AND term_id = '3'");
        $row = mysqli_fetch_array($sql);

        echo $row['marks'];
        $his = $row['marks'];
        ?></th>
                    <th><?php if($row['marks'] > 35)
                                echo 'Pass';
                                else
                                echo 'Fail'; ?></th>
                </tr>
        
                <?php 
                $total = $sc + $math + $eng + $bu + $his + $sin; 
                ?>
                 <?php 
                    $avg = $total / 6;
                    if($avg > 90)
                        $result = 'Brilliant';
                    else if($avg < 90 && $avg >= 80)
                        $result = 'Very Good';
                    else if($avg < 80 && $avg >= 70)
                        $result = 'Good';
                    else if($avg < 70 && $avg >= 60)
                        $result = 'Fair';
                    else if($avg < 60 && $avg >= 50)
                        $result = 'Needs Improvement';
                    else if($avg < 50 && $avg >= 40)
                        $result = 'Poor';
                    else
                        $result = 'Weak'; ?>
        <?php if($result == 'Poor' || $result == 'Weak') {
            ?> <tr style="background-color: red;">
            <?php }else {?>
                <tr style="background-color: lightgreen;">
            <?php } ?>
             
               
                    <th colspan="3">Total Marks: <?php echo $total; ?>/600</th>
                   
                    <th colspan="6">Remark: <?php echo $result;?></th>
                </tr>
        
        
            </table>
           
        

            <p>The results displayed here have been prepared and verified by the respective teacher and entered into the database.
                If you have anything to clarify here, please contanct the respective teacher ASAP.
            </p>

            <p>If you want to get more information , please be kind to use below link.</p></br>
            <a href="moreinfo3.php">Overall Information</a>
    </div>





</div>

<?php
              }
              ?>
              </body>
              </html>







<script>
    function goBack() {
            window.history.back();
        }


        function calculateAverage() {
    var marks = document.querySelectorAll('.markInput');
    var totalMarks = 0;
    var validMarksCount = 0;

    marks.forEach(function(mark) {
        if (mark.value !== '' && !isNaN(mark.value) && parseInt(mark.value) >= 0 && parseInt(mark.value) <= 100) {
            totalMarks += parseInt(mark.value);
            validMarksCount++;
        }
    });

    if (validMarksCount > 0) {
        var average = totalMarks / validMarksCount;
        document.getElementById('averageResult').innerText = 'Average Mark: ' + average.toFixed(2);
    } else {
        document.getElementById('averageResult').innerText = 'No valid marks entered.';
    }
}

</script>