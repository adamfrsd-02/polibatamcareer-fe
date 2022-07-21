<?php
require_once('../config/conn.php');
    $quiz = $koneksi->query("SELECT * FROM tblquisionerlist where QUISIONERLISTID =".$_GET['id']." order by RAND()")->fetch_array();
    
?>
<div class="container-fluid admin">
		<div class="col-md-12 alert alert-primary"><?php echo $quiz['TITLE'] ?></div>
		<br>
		<div class="card">
			<div class="card-body">
				<form action="" id="answer-sheet" action="post">
					<input type="hidden" name="user_id" value="<?php echo $_SESSION['APPLICANTID'] ?>">
					<input type="hidden" name="quiz_id" value="<?php echo $quiz['QUISIONERLISTID'] ?>">
					<input type="hidden" name="progress_id" value="<?php echo $_GET['progress'] ?>">
					<?php
					$question = $koneksi->query("SELECT * FROM tblquisioner where QID = '".$quiz['QUISIONERLISTID']."' order by QUISIONERID asc ");
					$i = 1 ;
					while($row =$question->fetch_assoc()){
						// $opt = $koneksi->query("SELECT * FROM tblassesmentopt where ASSESMENTID = '".$row['ASSESMENTID']."' order by RAND() ");
					?>

				<ul class="q-items list-group mt-4 mb-4">
					<li class="q-field list-group-item">
						<strong><?php echo ($i++). '. '; ?> <?php echo $row['QUESTION']; ?></strong>
						<input type="hidden" name="question_id[<?php echo $row['QUISIONERID'] ?>]" value="<?php echo $row['QUISIONERID'] ?>">
						<br>
						<br>
                        <textarea name="answer[<?php echo $row['QUISIONERID'] ?>]" id="answer<?php echo $row['QUISIONERID'] ?>" class="form-control" rows="10" maxlength="500" required></textarea>

					</li>
				</ul>

				<?php } ?>
				<button class="btn btn-block btn-primary" type="submit">Submit</button>
				</form>
			</div>	
		</div>
	</div>
    <script>
	$(document).ready(function(){
		$('#answer-sheet').submit(function(e){
			e.preventDefault()
			$('#answer-sheet [type="submit"]').attr('disabled',true)
			$('#answer-sheet [type="submit"]').html('Saving...')
			$.ajax({
				url:'submit_quisioner.php',
				type:'POST',
				data:$(this).serialize(),
				error:err=>console.log(err),
				success:function(resp){
					if(typeof resp != undefined){
						resp = JSON.parse(resp)
					if(resp.status == 1){
						alert('You completed the quisioner please wait for company response ')
						location.replace('index.php')
					}
					}
				}
			})
		})
		
	})
</script>