<?php
     if (!isset($_SESSION['COMPANY_USERID'])){
      redirect(web_root."company/index.php");
     }

?>
<form class="form-horizontal span6" action="controller.php?action=add" method="POST">

  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Add New Job Vacancy</h1>
    </div>
    <!-- /.col-lg-12 -->
  </div>

  <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for="COMPANYNAME">Company Name:</label>

      <div class="col-md-8">
        <?php 
                          $id = $_SESSION["COMPANY_USERID"];
                            $sql ="Select * From tblcompany where COMPANYID = $id";
                            $mydb->setQuery($sql);
                            $res  = $mydb->loadSingleResult();
                          ?>
        <input type="hidden" name="COMPANYID" value="<?= $id ?>">
        <input type="text" class="form-control input-sm" id="COMPANYNAME" readonly value="<?= $res->COMPANYNAME?>"
          name="COMPANYNAME">

      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for="CATEGORY">Category :</label>

      <div class="col-md-8">
        <select class="form-control input-sm" id="CATEGORY" name="CATEGORY">
          <option value="None">Select</option>
          <?php 
                            $sql ="Select * From tblcategory";
                            $mydb->setQuery($sql);
                            $res  = $mydb->loadResultList();
                            foreach ($res as $row) {
                              # code...
                              echo '<option value='.$row->CATEGORY.'>'.$row->CATEGORY.'</option>';
                            }

                          ?>
        </select>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for="OCCUPATIONTITLE">Occupation Title:</label>
      <div class="col-md-8">
        <input class="form-control input-sm" id="OCCUPATIONTITLE" name="OCCUPATIONTITLE" placeholder="Occupation Title"
          autocomplete="none" />
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for="REQ_NO_EMPLOYEES">Required no. of Employees:</label>
      <div class="col-md-8">
        <input class="form-control input-sm" id="REQ_NO_EMPLOYEES" name="REQ_NO_EMPLOYEES"
          placeholder="Required no. of Employees" autocomplete="none" />
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for="SALARIES">Salary:</label>
      <div class="col-md-8">
        <input class="form-control input-sm" id="SALARIES" name="SALARIES" placeholder="Salary" autocomplete="none" />
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for="DURATION_EMPLOYEMENT">Duration of Employment:</label>
      <div class="col-md-8">
        <input class="form-control input-sm" id="DURATION_EMPLOYEMENT" name="DURATION_EMPLOYEMENT"
          placeholder="Duration of Employment" autocomplete="none" />
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for="QUALIFICATION_WORKEXPERIENCE">Qualification/Work Experience:</label>
      <div class="col-md-8">
        <textarea class="form-control input-sm" id="QUALIFICATION_WORKEXPERIENCE" name="QUALIFICATION_WORKEXPERIENCE"
          placeholder="Qualification/Work Experience" autocomplete="none"></textarea>
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for="JOBDESCRIPTION">Job Description:</label>
      <div class="col-md-8">
        <textarea class="form-control input-sm" id="JOBDESCRIPTION" name="JOBDESCRIPTION" placeholder="Job Description"
          autocomplete="none"></textarea>
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for="PREFEREDSEX">Prefered Sex:</label>
      <div class="col-md-8">
        <select class="form-control input-sm" id="PREFEREDSEX" name="PREFEREDSEX">
          <option value="None">Select</option>
          <option>Male</option>
          <option>Female</option>
          <option>Male/Female</option>
        </select>
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for="SECTOR_VACANCY">Sector of Vacancy:</label>
      <div class="col-md-8">
        <textarea class="form-control input-sm" id="SECTOR_VACANCY" name="SECTOR_VACANCY"
          placeholder="Sector of Vacancy" autocomplete="none"></textarea>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for="">Assignment Process:</label>
      <div class="col-md-8" id="new_chq">
        <div id="children-1">
          <select name="assignment[]" class="form-control">
            <option value="assesment">Online Assesment</option>
            <option value="interview">Interview</option>
            <option value="quisioner">Quisioner</option>
          </select>
          <button type="button"  style="margin-top: 10px; float: right; border: none;" onclick="add()" class="add mt-2 col-md-4 btn btn-success" id="plus"><i class="fa fa-plus-circle"></i> Add Process</button>
        </div>
        <input type="hidden" value="1" id="total_chq">

      </div>
    </div>
  </div>


  <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for="idno"></label>

      <div class="col-md-8">
        <button class="btn btn-primary btn-sm" name="save" type="submit"><span class="fa fa-save fw-fa"></span>
          Save</button>
        <!-- <a href="index.php" class="btn btn-info"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;<strong>Back</strong></a> -->

      </div>
    </div>
  </div>


</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">
  function add() {
    var id = $("#new_chq div:last").attr('id').split('-')[1];
    var new_chq_no = parseInt($('#total_chq').val()) + 1;
    var newid = parseInt(id) + 1;
    var new_input =
      '<div id="children-' + newid +
      '"><select  class="form-control col-md-12" style="margin-top: 10px" name="assignment[]"><option value="assesment">Online Assesment</option><option value="interview">Interview</option><option value="quisioner">Quisioner</option></select><button class="btn btn-warning float-right col-md-4" style="margin-top: 10px; float: right; border: none;" type="button" onclick="remove(' +
      newid + ')"><i class="fa fa-times-circle"></i> Remove </button><br></div>';
    // $('#new_chq').append(new_input);
    $(new_input).insertAfter("#children-" + id)
    $('#total_chq').val(new_chq_no)
  }

  function remove(id) {
    // var last_chq_no = $('#total_chq').val();
    // if (last_chq_no > 1) {
    //   $('#new_' + last_chq_no).remove();
    //   $('#total_chq').val(last_chq_no - 1);
    // }
    $('#children-' + id).remove();
  }
</script>