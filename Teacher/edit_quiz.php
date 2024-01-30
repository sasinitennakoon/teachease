<?php
	if(isset($_POST['update']))
	{
		$title = $_POST['title'];
		$description = $_POST['description'];

		$sql = mysqli_query($link,"update quiz set quiz_title = '$title' ,
        quiz_description = '$description'
        
        
        where quiz_id = '$get_id' ")or die(mysqli_error());
        

?>
		<script>
			window.location="add_quiz.php";
		</script>

		<?php
	}
?>