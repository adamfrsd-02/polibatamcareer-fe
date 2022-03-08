<?php
// include('../../config/conn.php');
    $COMPANYID = $_SESSION['COMPANY_USERID'];
    global $mydb;
    if (!isset($_GET['JOBID'])) {      
        $mydb->setQuery("SELECT * FROM tbljob 
            Where COMPANYID = $COMPANYID ORDER BY JOBID DESC LIMIT 1");
        $cur = $mydb->loadSingleResult();
    } else {
        $jobid = $_GET['JOBID'];
        $mydb->setQuery("SELECT * FROM tbljob 
            Where JOBID = $jobid LIMIT 1");
        $cur = $mydb->loadSingleResult();
    }

    if( !isset($_GET['JOBID'])) :
?>

        <form id="asstitle">
            <div class="form-group">
                <div class="col-md-8">
                  <label class="col-md-4 control-label" for="ASSESMENT TITLE">ASSESMENT TITLE:</label>
                  <div class="col-md-8">
                      <input type="hidden" name="COMPANYID" value="<?= $COMPANYID; ?>">
                      <input type="hidden" name="JOBID" value="<?= $cur->JOBID; ?>">
                    <input class="form-control input-sm" id="ASSESMENTTITLE" name="ASSESMENTTITLE" placeholder="Assesment Title"
                      autocomplete="none" />
                  </div>
                </div>
              </div>
              <button  class="btn btn-primary" name="save"><span class="glyphicon glyphicon-save"></span> Save</button>
        </form>
        <?php
            else :
        ?>
        <?php
            endif;
        ?>
<script>
    $(document).ready(function(){
        $('#asstitle').submit(function(e){
			e.preventDefault();
			$('#asstitle [name="submit"]').attr('disabled',true)
			$('#asstitle [name="submit"]').html('Saving...')
			$('#msg').html('')

			$.ajax({
				url:'controller.php?action=assesment',
				method:'POST',
				data:$(this).serialize(),
				error:err=>{
					console.log(err)
					alert('An error occured')
					$('#quiz-frm [name="submit"]').removeAttr('disabled')
					$('#quiz-frm [name="submit"]').html('Save')
				},
				success:function(resp){
					if(typeof resp != undefined){
						resp = JSON.parse(resp)
						if(resp.status == 1){
							alert('Data successfully saved');
							location.replace('index.php?view=question&id='+resp.id)
						}else{
						$('#msg').html('<div class="alert alert-danger">'+resp.msg+'</div>')

						}
					}
				}
			})
            
		})
	})
</script>