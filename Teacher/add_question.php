<?php include '../database/db_con.php'; ?>
<?php include '../session.php'; ?>
<?php $get_id = $_GET['id']; ?>

<?php 
	$query= mysqli_query($link,"select * from teacher where teacher_id = '$session_id'")or die(mysqli_error());
	$row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
	<link rel="stylesheet" href="CSS/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../ckeditor/ckeditor.js"></script>

    <link rel="stylesheet" href="./CSS/quiz_dashboard.css">
</head>

	

<body>
		<?php include 'dropdown.php'; ?>
		
	<button><a href="view_quiz.php">Go to Dashboard</a></button>
	<div class="content">
		<h1>Add Quiz</h1>

        <div class="panels1">
            <div class="panel10">
                <form method="post">
                
                <div class="user-details">

                    <div class="input-box">
                        <span class="details">Question</span>
                        <textarea name="question" id="ckeditor_full" required></textarea>
                        <script>
                            CKEDITOR.replace( 'ckeditor_full' );
                        </script>
                    </div>

                    <div class="input-box">
                        <span class="details">Question Type</span>
                        <select id="qtype" name="question_type" required>
							<option value=""></option>
								<?php
									$query_question = mysqli_query($link,"select * from question_type")or die(mysqli_error());
										while($query_question_row = mysqli_fetch_array($query_question)){
								?>
									<option value="<?php echo $query_question_row['question_type_id']; ?>"><?php echo $query_question_row['question_type'];  ?></option>
								<?php } ?>
						</select>
                    </div>

                    <div class="input-box">
                        <div id="opt11">
                            <div class="gender-details">
								A: <input type="text" name="ans1" size="60"> <input name="answer" value="A" type="radio" id="dot-3">
                                <div class="category">
                                    <label for="dot-3">
                                    <span class="dot three"></span>
                                    <span class="gender"></span></label>
                                </div><br><br>
								B: <input type="text" name="ans2" size="60"> <input name="answer" value="B" type="radio" id="dot-4">
                                <div class="category">
                                    <label for="dot-4">
                                    <span class="dot four"></span>
                                    <span class="gender"></span></label>
                                </div><br><br>
								C: <input type="text" name="ans3" size="60"> <input name="answer" value="C" type="radio" id="dot-5">
                                <div class="category">
                                    <label for="dot-5">
                                    <span class="dot five"></span>
                                    <span class="gender"></span></label>
                                </div><br><br>
								D: <input type="text" name="ans4" size="60"> <input name="answer" value="D" type="radio" id="dot-6">
                                <div class="category">
                                    <label for="dot-6">
                                    <span class="dot six"></span>
                                    <span class="gender"></span></label>
                                </div><br><br>
                            
							</div>
						</div>
							</div>
							<div id="opt12">
								<!--<input name="correctt" value="True" type="radio">True<br /><br />
								<input name="correctt"  value="False" type="radio">False<br /><br /> -->
                                 <div class="gender-details">
                                <input type="radio" name="True" value="true" id="dot-1">
                                <input type="radio" name="False" value="false" id="dot-2">
                                <span class="gender-title">Select the Correct Answer</span>
                                <div class="category">
                                    <label for="dot-1">
                                    <span class="dot one"></span>
                                    <span class="correctt">True</span>
                                    </label>
                                    <label for="dot-2">
                                    <span class="dot two"></span>
                                    <span class="correctt">False</span>
                                    </label>
                                </div>
                                </div> 
							</div>

							<div id="opt13">
                            <div class="gender-details">
								A: <input type="text" name="ans1" size="60"> <input name="answer" value="A" type="checkbox" id="dot-3">
                                <div class="category">
                                    <label for="dot-3">
                                    <span class="dot three"></span>
                                    <span class="gender"></span></label>
                                </div><br><br>
								B: <input type="text" name="ans2" size="60"> <input name="answer" value="B" type="checkbox" id="dot-4">
                                <div class="category">
                                    <label for="dot-4">
                                    <span class="dot four"></span>
                                    <span class="gender"></span></label>
                                </div><br><br>
								C: <input type="text" name="ans3" size="60"> <input name="answer" value="C" type="checkbox" id="dot-5">
                                <div class="category">
                                    <label for="dot-5">
                                    <span class="dot five"></span>
                                    <span class="gender"></span></label>
                                </div><br><br>
								D: <input type="text" name="ans4" size="60"> <input name="answer" value="D" type="checkbox" id="dot-6">
                                <div class="category">
                                    <label for="dot-6">
                                    <span class="dot six"></span>
                                    <span class="gender"></span></label>
                                </div><br><br>
                                        </div>
							</div>
										</div>
                        </div>
                </div>
                    
                            <button name="save" type="submit" value="save" class="btn btn-info">
                                <i class="fa fa-fw fa-save"></i>&nbsp;Save
                            </button>
                       
                
                </form>
            </div>
        </div>
    </div>

</body>

</html>

<?php
		if (isset($_POST['save'])){
		$question = $_POST['question'];
		$points = $_POST['points'];
		$type = $_POST['question_type'];
		$answer = $_POST['answer']; 
		
		$ans1 = $_POST['ans1'];
		$ans2 = $_POST['ans2'];
		$ans3 = $_POST['ans3'];
		$ans4 = $_POST['ans4'];
		
		if ($type  == '2'){
				mysqli_query($link,"insert into quiz_question (quiz_id,question_text,date_added,answer,question_type_id) 
			values('$get_id','$question',NOW(),'".$_POST['correctt']."','$type')")or die(mysqli_error());
		}else{
	
		mysqli_query($link,"insert into quiz_question (quiz_id,question_text,date_added,answer,question_type_id) 
		values('$get_id','$question',NOW(),'$answer','$type')")or die(mysqli_error());
		$query = mysqli_query($link,"select * from quiz_question order by quiz_question_id DESC LIMIT 1")or die(mysqli_error());
		$row = mysqli_fetch_array($query);
		$quiz_question_id = $row['quiz_question_id'];
		
		mysqli_query($link,"insert into answer (quiz_question_id,answer_text,choices) values('$quiz_question_id','$ans1','A')")or die(mysqli_error());
		mysqli_query($link,"insert into answer (quiz_question_id,answer_text,choices) values('$quiz_question_id','$ans2','B')")or die(mysqli_error());
		mysqli_query($link,"insert into answer (quiz_question_id,answer_text,choices) values('$quiz_question_id','$ans3','C')")or die(mysqli_error());
		mysqli_query($link,"insert into answer (quiz_question_id,answer_text,choices) values('$quiz_question_id','$ans4','D')")or die(mysqli_error());
		
		}
		
	?>
		<script>
 		window.location = 'quiz_question.php<?php echo '?id='.$get_id; ?>' 
		</script>

		<?php
		    }
		?>

<script>
	jQuery(document).ready(function(){
		jQuery("#opt11").hide();
		jQuery("#opt12").hide();
		jQuery("#opt13").hide();		

		jQuery("#qtype").change(function(){	
			var x = jQuery(this).val();			
			if(x == '1') {
				jQuery("#opt11").show();
				jQuery("#opt12").hide();
				jQuery("#opt13").hide();
			} else if(x == '2') {
				jQuery("#opt11").hide();
				jQuery("#opt12").show();
				jQuery("#opt13").hide();
			} else {
				jQuery("#opt11").hide();
				jQuery("#opt12").hide();
				jQuery("#opt13").hide();
			}
		});
		
	});
</script>