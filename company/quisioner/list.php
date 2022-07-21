<?php
    require_once('../../config/conn.php');
?>
<div class="card">
    <div class="card-body">
        <table class="table table-bordered" id='table'>
            
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Items</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
            // $where = '';
            // if($_SESSION['login_user_type'] == 2){
            // 	$where = " where u.id = ".$_SESSION['login_id']." ";
            // }
            $qry = $koneksi->query("SELECT *  from tblquisionerlist where COMPANYID = '{$_SESSION["COMPANY_USERID"]}' order by TITLE asc ");
            $i = 1;
            if($qry->num_rows > 0){
                while($row= $qry->fetch_assoc()){
                    $items = $koneksi->query("SELECT count(QUISIONERID) as item_count from tblquisioner where QID = '".$row['QUISIONERLISTID']."' ")->fetch_array()['item_count'];
                ?>
            <tr>
                <td><?php echo $i++ ?></td>
                <td><?php echo $row['TITLE'] ?></td>
                <td><?php echo $items ?></td>
                <td>
                    <center>
                     <a class="btn btn-sm btn-outline-primary edit_quiz" href="index.php?view=form&id=<?php echo $row['QUISIONERLISTID']?>"><i class="fa fa-task"></i> Manage</a>
                     <button class="btn btn-sm btn-outline-primary edit_quiz" data-id="<?php echo $row['QUISIONERLISTID']?>" type="button"><i class="fa fa-edit"></i> Edit</button>
                    <!-- <button class="btn btn-sm btn-outline-danger remove_quiz" data-id="<?php echo $row['QUISIONERLISTID']?>" type="button"><i class="fa fa-trash"></i> Delete</button> -->
                    </center>
                </td>
            </tr>
            <?php
            }
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
<div class="modal fade" id="manage_quiz" tabindex="-1" role="dialog" >
    <div class="modal-dialog modal-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                
                <h4 class="modal-title" id="myModallabel">Add New quiz</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form id='quiz-frm'>
                <div class ="modal-body">
                    <div id="msg"></div>
                    <div class="form-group">
                        <label>Title</label>
                        <input type="hidden" name="id" />
                        <input type="text" name="title" required="required" class="form-control" />
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button  class="btn btn-primary" name="save"><span class="glyphicon glyphicon-save"></span> Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
	$(document).ready(function(){
		$('#table').DataTable();
		$('.edit_quiz').click(function(){
			var id = $(this).attr('data-id')
			$.ajax({
				url:'./get_quiz.php?id='+id,
				error:err=>console.log(err),
				success:function(resp){
					if(typeof resp != undefined){
						resp = JSON.parse(resp)
						$('[name="id"]').val(resp.ASSESMENTLISTID)
						$('[name="title"]').val(resp.TITLE)
						$('#manage_quiz .modal-title').html('Edit Quiz')
						$('#manage_quiz').modal('show')

					}
				}
			})

		})
		$('.remove_quiz').click(function(){
			var id = $(this).attr('data-id')
			var conf = confirm('Are you sure to delete this data.');
			if(conf == true){
				$.ajax({
				url:'delete_quisioner.php?id='+id,
				error:err=>console.log(err),
				success:function(resp){
					if(resp == true)
						location.reload()
				}
			})
			}
		})
		$('#quiz-frm').submit(function(e){
			e.preventDefault();
			$('#quiz-frm [name="submit"]').attr('disabled',true)
			$('#quiz-frm [name="submit"]').html('Saving...')
			$('#msg').html('')

			$.ajax({
				url:'./save_quiz.php',
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
							location.replace('index.php')
						}else{
						$('#msg').html('<div class="alert alert-danger">'+resp.msg+'</div>')

						}
					}
				}
			})
		})
	})
</script>