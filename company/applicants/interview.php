<?php
global $mydb;
    $getinterview = "SELECT INTERVIEWDATE FROM tblinterview WHERE id_progress = {$_GET['id']}";
    $mydb->setQuery($getinterview);
    $interviewdate = $mydb->loadSingleResult();
?>
<?php
    if (!isset($interviewdate->INTERVIEWDATE)) :
?>
<h3>Enter your intervew schedule with this applicant</h3>
<h4>Applicant will get noticed right after schedule form submitted</h4>
<form id='quiz-frm'>
    <div class ="modal-body">
        <div id="msg"></div>
        <div class="form-group">
            <label>Interview Date</label>
            <input type="hidden" name="id" value="<?= $_GET['id']; ?>" />
            <input type="datetime-local" name="date" required="required" class="form-control" />
        </div>
        
    </div>
    <div class="modal-footer">
        <button  class="btn btn-primary" name="save"><span class="glyphicon glyphicon-save"></span> Save</button>
    </div>
</form>
<?php
    else:
?>
<h3>Interview Link Form will be displayed on this page 2 hours before the interview starts  </h3>
<?php
    $query = "SELECT * FROM tblinterview WHERE id_progress = '{$_GET['id']}'";
    $mydb->setQuery($query);
    $res = $mydb->loadSingleResult();
    $end = New DateTime($res->INTERVIEWDATE);
    $start = NEW DateTime(date("Y-m-d H:i:s"));
    $diff = $start->diff($end);
    $hourdiff = round((strtotime($res->INTERVIEWDATE) - strtotime(date("Y-m-d H:i:s")))/3600, 1);
    // echo "<pre>".print_r(,1)."</pre>";
if ($hourdiff > 0 ) { ?>
    <h5>Countdown: <?= $diff->d." Days ".$diff->h." Hours ".$diff->i." Minutes ".$diff->s." Seconds "; ?></h5>
<?php }
?>

<h4>Applicant will get noticed right after interview link form submitted</h4>
<?php
    if($hourdiff <= 2){
?> 
<form id='quiz-frm'>
    <div class ="modal-body">
        <div id="msg"></div>
        <div class="form-group">
            <label>Interview Links</label>
            <input type="hidden" name="id" value="<?= $_GET['id']; ?>" />
            <input type="text" <?= ($res->INTERVIEWLINK) ? 'readonly' : '' ?> value=" <?= ($res->INTERVIEWLINK) ? $res->INTERVIEWLINK : "" ?>" name="links" required="required" class="form-control" />
        </div>
        
    </div>
    <div class="modal-footer">
        <?php
            if (!$res->INTERVIEWLINK) { ?>
                <button  class="btn btn-primary" name="save"><span class="glyphicon glyphicon-save"></span> Save</button>
           <?php } else { ?>
                <a href="index.php" class="btn btn-warning">Back</a>
          <?php }
        ?>
        <?php
            if($hourdiff <= 0 && $res->INTERVIEWLINK) { ?>
                <a href="controller.php?action=pass&id=<?= $_GET['id']; ?>" class="btn btn-primary" name="next">pass the interview stage</a>
        <?php    }
        ?>
    </div>

</form>
<?php  }
?>

<?php
    endif;
?>

<script>
$(document).ready(function(){
    $('#quiz-frm').submit(function(e){
        e.preventDefault();
        $('#quiz-frm [name="submit"]').attr('disabled',true)
        $('#quiz-frm [name="submit"]').html('Saving...')
        $('#msg').html('')
    
        $.ajax({
            url:'controller.php?action=interviewadd',
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