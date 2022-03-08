  <?php 
    $applicant = new Applicants();
    $appl = $applicant->single_applicant($_SESSION['APPLICANTID']);
  ?>
  <style type="text/css">
    .form-group {
      margin-bottom: 5px;
    }
  </style>

  <form class="form-horizontal" method="POST" action="controller.php?action=editprofile">  
    <div class="container">  
      <div class="box-header with-border">
        <h3 class="box-title">Accounts</h3>

        <!-- /.box-tools -->
      </div> 
      
      <div class="form-group">
        <div class="col-md-7">
          <div  id="image-container">
              <img title="profile image"  data-bs-target="#myModal"  data-bs-toggle="modal"  src="<?= web_root; ?>applicant-page/<?= $appl->APPLICANTPHOTO; ?>">
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="col-md-7">
          <label class="col-md-4 control-label" for=
            "FNAME">Firstname:</label>

            <div class="col-md-8">
              <!-- <input name="JOBID" type="hidden" value="<?php echo $_GET['job'];?>"> -->
               <input class="form-control input-sm" id="FNAME" name="FNAME" placeholder=
                  "Firstname" type="text" value="<?php echo $appl->FNAME;?>"  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="col-md-7">
            <label class="col-md-4 control-label" for=
            "LNAME">Lastname:</label>

            <div class="col-md-8"> 
              <input  class="form-control input-sm" id="LNAME" name="LNAME" placeholder=
                  "Lastname"    onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off" value="<?php echo $appl->LNAME;?>">
              </div>
          </div>
        </div>


        <div class="form-group">
          <div class="col-md-7">
            <label class="col-md-4 control-label" for=
            "ADDRESS">Address:</label>

            <div class="col-md-8">

             <textarea class="form-control input-sm" id="ADDRESS" name="ADDRESS" placeholder=
                "Address" type="text" value="" required  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off"><?php echo $appl->ADDRESS;?></textarea>
            </div>
          </div>
        </div> 

        <div class="form-group">
          <div class="col-md-7">
            <label class="col-md-4 control-label" for=
            "Gender">Sex:</label>

            <div class="col-md-8">
             <div class="col-lg-5">
                <div class="radio">
                  <label><input checked id="optionsRadios1" checked="True" name="optionsRadios" type="radio" value="Female">Female</label>
                </div>
              </div>

              <div class="col-lg-4">
                <div class="radio">
                  <label><input id="optionsRadios2"   name="optionsRadios" type="radio" value="Male"> Male</label>
                </div>
              </div> 
             
            </div>
          </div>
        </div> 

         <div class="form-group">
          <div class="col-md-7">
            <label class="col-md-4 control-label" for=
            "BIRTHDATE">Date of Birth:</label>

            <div class="col-md-8">
              <div class="input-group">
                  <span class="input-group-addon"> 
                   <i class="fa fa-calendar"></i> 
                  </span>  
                   <input class="form-control input-sm date_picker" id="BIRTHDATE" name="BIRTHDATE" placeholder="Date of Birth" type="text"    value="<?php echo date_format(date_create($appl->BIRTHDATE),'m/d/Y');?>" required  autocomplete="off">
              </div>
            </div>
          </div>
        </div>  

         <div class="form-group">
            <div class="col-md-7">
              <label class="col-md-4 control-label" for=
              "BIRTHPLACE">Place of Birth:</label>

              <div class="col-md-8">
                
                 <textarea class="form-control input-sm" id="BIRTHPLACE" name="BIRTHPLACE" placeholder=
                    "Place of Birth" type="text" value="" required  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off"><?php echo $appl->BIRTHPLACE;?></textarea>
              </div>
            </div>
          </div> 


         <div class="form-group">
          <div class="col-md-7">
            <label class="col-md-4 control-label" for=
            "TELNO">Contact No.:</label>

            <div class="col-md-8">
              
               <input class="form-control input-sm" id="TELNO" name="TELNO" placeholder=
                  "Contact No." type="text" any value="<?php echo $appl->CONTACTNO;?>" required  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
            </div>
          </div>
        </div> 

         <div class="form-group">
          <div class="col-md-7">
            <label class="col-md-4 control-label" for=
            "CIVILSTATUS">Civil Status:</label>

            <div class="col-md-8">
              <select class="form-control input-sm" name="CIVILSTATUS" id="CIVILSTATUS">
                  <option value="none" >Select</option>
                  <option value="Single">Single</option>
                  <option value="Married">Married</option>
                  <option value="Widow" >Widow</option>
                  <!-- <option value="Fourth" >Fourth</option> -->
              </select> 
            </div>
          </div>
        </div>  

         <div class="form-group">
          <div class="col-md-7">
            <label class="col-md-4 control-label" for=
            "EMAILADDRESS">Email Address:</label> 
            <div class="col-md-8">
               <input type="Email" class="form-control input-sm" id="EMAILADDRESS" name="EMAILADDRESS" placeholder="Email Address"   autocomplete="off" value="<?php echo $appl->EMAILADDRESS;?>" /> 
            </div>
          </div>
        </div>  
        
        <div class="form-group">
          <div class="col-md-7">
            <label class="col-md-4 control-label" for=
            "DEGREE">Educational Attainment:</label>

            <div class="col-md-8"> 
              <input  class="form-control input-sm" id="DEGREE" name="DEGREE" placeholder=
                  "Educational Attainment"    onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off" value="<?php echo $appl->DEGREE;?>">
              </div>
          </div>
        </div>  
        <div class="form-group">
          <div class="col-md-7">
            <label class="col-md-4 control-label" for=
            "submit"></label>

            <div class="col-md-8">
               <button class="btn btn-primary btn-sm" name="submit" type="submit" ><span class="fa fa-save"></span> Submit </button>
              </div>
          </div>
        </div>  
     
    </div>  
  </form>
  
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" aria-hidden='true'>
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button class="close" data-dismiss="modal" type=
            "button">×</button>
   
            <h4 class="modal-title" id="myModalLabel">Choose Image.</h4>
        </div>
   
        <form action="controller.php?action=photos" enctype="multipart/form-data" method=
        "post">
            <div class="modal-body">
                <div class="form-group">
                    <div class="rows">
                        <div class="col-md-12">
                            <div class="rows">
                                <div class="col-md-8">
                                  <input name="MAX_FILE_SIZE" type=
                                    "hidden" value="1000000"> <input id=
                                    "photo" name="photo" type=
                                    "file">
                                </div>
   
                                <div class="col-md-4"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
   
            <div class="modal-footer">
                <button class="btn btn-default" data-dismiss="modal" type=
                "button">Close</button> <button  class="btn btn-primary"
                name="savephoto" type="submit">Upload Photo</button>
            </div>
        </form>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->