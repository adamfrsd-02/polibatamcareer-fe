<?php
	require_once ("../../config/conn.php");
    $qry = $koneksi->query("SELECT * FROM tblassesmentlist where ASSESMENTLISTID = ".$_GET['id'])->fetch_array();
?><div class="container-fluid admin">
<div class="col-md-12 alert alert-primary"><?php echo $qry['TITLE'] ?></div>
<button class="btn btn-primary bt-sm" id="new_question"><i class="fa fa-plus"></i>	Add Question</button>
<br>
<br>
<div class="card col-md-6 mr-4" style="float:left">
    <div class="card-header">
        Questions
    </div>
    <div class="card-body">
        <ul class="list-group">
        <?php
            $qry = $koneksi->query("SELECT * FROM tblassesment where QID = ".$_GET['id']." ORDER BY ASSESMENTID ASC");
            // if ($qry) {
            while($row=$qry->fetch_array()){
                ?>
                <li class="list-group-item"><?php echo $row['QUESTION'] ?><br>
                    <center>
                         <button class="btn btn-sm btn-outline-primary edit_question" data-id="<?php echo $row['ASSESMENTID']?>" type="button"><i class="fa fa-edit"></i></button>
                        <button class="btn btn-sm btn-outline-danger remove_question" data-id="<?php echo $row['ASSESMENTID']?>" type="button"><i class="fa fa-trash"></i></button>
                    </center>
                </li>
        <?php
            } 
        // }
        ?>
        </ul>
</div>
</div>
</div>
<?php
    $query = $koneksi->query("SELECT JOBID,PROGRESS_DETAIL FROM tbljob where COMPANYID = '".$_SESSION['COMPANY_USERID']."' ORDER BY JOBID DESC limit 1");
    $assesment = 0;
    $id = 0;
    while ($rows=$query->fetch_array()) {
        // echo "<pre>".print_r(,1)."</pre>";
        $listarr = unserialize($rows['PROGRESS_DETAIL']);
        
        $list = implode(" ", $listarr);
        $assesment = substr_count($list,"assesment");
        $id = $rows['JOBID'];
    }
    $query2 = $koneksi->query("SELECT COUNT(ASSESMENTLISTID) as total FROM tblassesmentlist WHERE COMPANYID = '".$_SESSION['COMPANY_USERID']."' AND JOBID = '".$id."'")->fetch_array();
    if ($query2['total'] >= $assesment) {
        echo '<a href="index.php" class="btn btn-primary float-end">FINISH</a>';
    }else {
        echo '<a href="index.php?view=assesment" class="btn btn-primary float-end">NEXT STEP</a>';
    }

?>
<div class="modal fade" id="manage_question" tabindex="-1" role="dialog" >
        <div class="modal-dialog modal-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    
                    <h4 class="modal-title" id="myModallabel">Add New Question</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <form id='question-frm'>
                    <div class ="modal-body">
                        <div id="msg"></div>
                        <div class="form-group">
                            <label>Question</label>
                            <input type="hidden" name="qid" value="<?php echo $_GET['id'] ?>" />
                            <input type="hidden" name="id" />
                            <textarea rows='3' name="question" required="required" class="form-control" ></textarea>
                        </div>
                            <label>Options:</label>

                        <div class="form-group">
                            <textarea rows="2" name ="question_opt[0]" required="" class="form-control" ></textarea>
                            <span>
                            <label><input type="radio" name="is_right[0]" class="is_right" value="1"> <small>Question Answer</small></label>
                            </span>
                            <br>
                            <textarea rows="2" name ="question_opt[1]" required="" class="form-control" ></textarea>
                            <label><input type="radio" name="is_right[1]" class="is_right" value="1"> <small>Question Answer</small></label>
                            <br>
                            <textarea rows="2" name ="question_opt[2]" required="" class="form-control" ></textarea>
                            <label><input type="radio" name="is_right[2]" class="is_right" value="1"> <small>Question Answer</small></label>
                            <br>
                            <textarea rows="2" name ="question_opt[3]" required="" class="form-control" ></textarea>
                            <label><input type="radio" name="is_right[3]" class="is_right" value="1"> <small>Question Answer</small></label>
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
// $(".select2").select2({
//     placeholder:"Select here",
//     width:'resolve'
// });
$('#table').DataTable();
$('#new_question').click(function(){
    $('#msg').html('')
    
    $('#manage_question .modal-title').html('Add New Question')
    $('#manage_question #question-frm').get(0).reset()
    $('#manage_question').modal('show')
})
$('.edit_question').click(function(){
    var id = $(this).attr('data-id')
    $.ajax({
        url:'./get_question.php?id='+id,
        error:err=>console.log(err),
        success:function(resp){
            if(typeof resp != undefined){
                resp = JSON.parse(resp)
                $('[name="id"]').val(resp.qdata.ASSESMENTID)
                $('[name="question"]').val(resp.qdata.QUESTION)
                Object.keys(resp.odata).map(k=>{
                    var data = resp.odata[k]
                    $('[name="question_opt['+k+']"]').val(data.OPTIONTEXT);
                    if(data.is_right == 1)
                    $('[name="is_right['+k+']"]').prop('checked',true);
                })
                $('#manage_question .modal-title').html('Edit Question')
                $('#manage_question').modal('show')

            }
        }
    })

})
$('.is_right').each(function(){
    $(this).click(function(){
        $('.is_right').prop('checked',false);
        $(this).prop('checked',true);
    })
})
$('.remove_question').click(function(){
    var id = $(this).attr('data-id')
    var conf = confirm('Are you sure to delete this data.');
    if(conf == true){
        $.ajax({
        url:'./delete_question.php?id='+id,
        error:err=>console.log(err),
        success:function(resp){
            if(resp == true)
                location.reload()
        }
    })
    }
})
$('#question-frm').submit(function(e){
    e.preventDefault();
    $('#question-frm [name="submit"]').attr('disabled',true)
    $('#question-frm [name="submit"]').html('Saving...')
    $('#msg').html('')

    $.ajax({
        url:'controller.php?action=insertquestion',
        method:'POST',
        data:$(this).serialize(),
        error:err=>{
            console.log(err)
            alert('An error occured')
            $('#quiz-frm [name="submit"]').removeAttr('disabled')
            $('#quiz-frm [name="submit"]').html('Save')
        },
        success:function(resp){
                if(resp == 1){
                    alert('Data successfully saved');
                    location.reload()
                }
        }
    })
})
$('#student-frm').submit(function(e){
    e.preventDefault();
    $('#student-frm [name="submit"]').attr('disabled',true)
    $('#student-frm [name="submit"]').html('Saving...')
    $('#msg').html('')

    $.ajax({
        url:'./quiz_student.php',
        method:'POST',
        data:$(this).serialize(),
        error:err=>{
            console.log(err)
            alert('An error occured')
            $('#quiz-frm [name="submit"]').removeAttr('disabled')
            $('#quiz-frm [name="submit"]').html('Save')
        },
        success:function(resp){
                if(resp == 1){
                    alert('Data successfully saved');
                    location.reload()
                }
        }
    })
})
})
</script>