<?php
require_once('../config/conn.php');
    $quiz = $koneksi->query("SELECT * FROM tblassesmentlist where ASSESMENTLISTID =".$_GET['id']." order by RAND()")->fetch_array();
    
?>
<div class="container-fluid admin">
		<div class="col-md-12 alert alert-primary"><?php echo $quiz['TITLE'] ?></div>
		<br>
		<div class="card">
			<div class="card-body">
				<form action="" id="answer-sheet" action="post">
					<input type="hidden" name="user_id" value="<?php echo $_SESSION['APPLICANTID'] ?>">
					<input type="hidden" name="quiz_id" value="<?php echo $quiz['ASSESMENTLISTID'] ?>">
					<input type="hidden" name="progress_id" value="<?php echo $_GET['progress'] ?>">
					<?php
					$question = $koneksi->query("SELECT * FROM tblassesment where QID = '".$quiz['ASSESMENTLISTID']."' order by ASSESMENTID asc ");
					$i = 1 ;
					while($row =$question->fetch_assoc()){
						$opt = $koneksi->query("SELECT * FROM tblassesmentopt where ASSESMENTID = '".$row['ASSESMENTID']."' order by RAND() ");
					?>
                    <?php
                        // echo "<pre>".print_r($row,1)."</pre>";
                    ?>

				<ul class="q-items list-group mt-4 mb-4">
					<li class="q-field list-group-item">
						<strong><?php echo ($i++). '. '; ?> <?php echo $row['QUESTION']; ?></strong>
						<input type="hidden" name="question_id[<?php echo $row['ASSESMENTID'] ?>]" value="<?php echo $row['ASSESMENTID'] ?>">
						<br>
						<ul class='list-group mt-4 mb-4'>
						<?php while($orow = $opt->fetch_assoc()){ ?>

							<li class="answer list-group-item">
								<label><input type="radio" name="option_id[<?php echo $row['ASSESMENTID'] ?>]" value="<?php echo $orow['ASSESMENTOPTID'] ?>"> <?php echo $orow['OPTIONTEXT'] ?></label>
							</li>
						<?php } ?>

						</ul>

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
		$('.answer').each(function(){
		$(this).click(function(){
			$(this).find('input[type="radio"]').prop('checked',true)
			$(this).css('background','#00c4ff3d')
			$(this).siblings('li').css('background','white')
		})


		})
		$('#answer-sheet').submit(function(e){
			e.preventDefault()
			$('#answer-sheet [type="submit"]').attr('disabled',true)
			$('#answer-sheet [type="submit"]').html('Saving...')
			$.ajax({
				url:'submit_answer.php',
				type:'POST',
				data:$(this).serialize(),
				error:err=>console.log(err),
				success:function(resp){
					if(typeof resp != undefined){
						resp = JSON.parse(resp)
					if(resp.status == 1){
						alert('You completed the quiz your score is '+resp.score)
						location.replace('index.php')
					}
					}
				}
			})
		})
		
	})
</script>