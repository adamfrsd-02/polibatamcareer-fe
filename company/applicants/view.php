<?php 
global $mydb;
	$red_id = isset($_GET['id']) ? $_GET['id'] : '';

	$jobregistration = New JobRegistration();
	$jobreg = $jobregistration->single_jobregistration($red_id);
	 // `COMPANYID`, `JOBID`, `APPLICANTID`, `APPLICANT`, `REGISTRATIONDATE`, `REMARKS`, `FILEID`, `PENDINGAPPLICATION`


	$applicant = new Applicants();
	$appl = $applicant->single_applicant($jobreg->APPLICANTID);
 // `FNAME`, `LNAME`, `MNAME`, `ADDRESS`, `SEX`, `CIVILSTATUS`, `BIRTHDATE`, `BIRTHPLACE`, `AGE`, `USERNAME`, `PASS`, `EMAILADDRESS`,CONTACTNO

	$jobvacancy = New Jobs();
	$job = $jobvacancy->single_job($jobreg->JOBID);
 // `COMPANYID`, `CATEGORY`, `OCCUPATIONTITLE`, `REQ_NO_EMPLOYEES`, `SALARIES`, `DURATION_EMPLOYEMENT`, `QUALIFICATION_WORKEXPERIENCE`, `JOBDESCRIPTION`, `PREFEREDSEX`, `SECTOR_VACANCY`, `JOBSTATUS`, `DATEPOSTED`

	$company = new Company();
	$comp = $company->single_company($jobreg->COMPANYID);
	 // `COMPANYNAME`, `COMPANYADDRESS`, `COMPANYCONTACTNO`

	$sql = "SELECT * FROM `tblattachmentfile` WHERE `FILEID`=" .$jobreg->FILEID;
	$mydb->setQuery($sql);
	$attachmentfile = $mydb->loadSingleResult();


?> 
<style type="text/css">
.content-header {
	min-height: 50px;
	border-bottom: 1px solid #ddd;
	font-size: 15px;
	font-weight: bold;
}
.content-body {
	min-height: 350px;
	/*border-bottom: 1px solid #ddd;*/
}
.content-body >p {
	padding:10px;
	font-size: 12px;
	font-weight: bold;
	border-bottom: 1px solid #ddd;
}
.content-footer {
	min-height: 100px;
	border-top: 1px solid #ddd;

}
.content-footer > p {
	padding:5px;
	font-size: 15px;
	font-weight: bold; 
}
 
.content-footer textarea {
	width: 100%;
	height: 200px;
}
.content-footer  .submitbutton{  
	margin-top: 20px;
	/*padding: 0;*/

}
</style>
<form action="controller.php?action=approve" method="POST">
<div class="col-sm-12 content-header" style="">View Details</div>
<div class="col-sm-6 content-body" > 
	<p>Job Details</p> 
	<h3><?php echo $job->OCCUPATIONTITLE; ?></h3>
	<input type="hidden" name="JOBREGID" value="<?php echo $jobreg->REGISTRATIONID;?>">
	<input type="hidden" name="APPLICANTID" value="<?php echo $appl->APPLICANTID;?>">
	<input type="hidden" name="JOBID" value="<?php echo $job->JOBID;?>">

	<div class="col-sm-6">
		<ul>
            <li><i class="fp-ht-bed"></i>Required No. of Employee's : <?php echo $job->REQ_NO_EMPLOYEES; ?></li>
            <li><i class="fp-ht-food"></i>Salary : <?php echo number_format($job->SALARIES,2);  ?></li>
            <li><i class="fa fa-sun-"></i>Duration of Employment : <?php echo $job->DURATION_EMPLOYEMENT; ?></li>
        </ul>
	</div> 
	<div class="col-sm-6">
		<ul> 
            <li><i class="fp-ht-tv"></i>Prefered Sex : <?php echo $job->PREFEREDSEX; ?></li>
            <li><i class="fp-ht-computer"></i>Sector of Vacancy : <?php echo $job->SECTOR_VACANCY; ?></li>
        </ul>
	</div>
	<div class="col-sm-12">
		<p>Job Description : </p>   
		<p style="margin-left: 15px;"><?php echo $job->JOBDESCRIPTION;?></p>
	</div>
	<div class="col-sm-12"> 
		<p>Qualification/Work Experience : </p>
		<p style="margin-left: 15px;"><?php echo $job->QUALIFICATION_WORKEXPERIENCE; ?></p>
	</div>
	<div class="col-sm-12"> 
		<p>Employeer : </p>
		<p style="margin-left: 15px;"><?php echo $comp->COMPANYNAME ; ?></p> 
		<p style="margin-left: 15px;">@ <?php echo $comp->COMPANYADDRESS ; ?></p>
	</div>
</div>
<div class="col-sm-6 content-body" >
	<p>Applicant Infomation</p> 
	<h3> <?php echo $appl->LNAME. ', ' .$appl->FNAME . ' ' . $appl->MNAME;?></h3>
	<ul> 
		<li><b>Address</b> : <?php echo $appl->ADDRESS; ?></li>
		<li><b>Contact No</b> : <?php echo $appl->CONTACTNO;?></li>
		<li><b>Email Address</b> : <?php echo $appl->EMAILADDRESS;?></li>
		<li><b>Sex</b> : <?php echo $appl->SEX;?></li>
		<li><b>Age</b> : <?php echo $appl->AGE;?></li>
		<?php
			if ($appl->LINKEDINLINK) {
				?>
				<li><b>Linkedin Profile</b> : <a href="<?= $appl->LINKEDINLINK; ?>" target="_BLANK"><?= $appl->LINKEDINLINK; ?></a></li>
				<?php
			}
		?>
	</ul>
	<div class="col-sm-12"> 
		<p>Educational Attainment : </p>
		<p style="margin-left: 15px;"><?php echo $appl->DEGREE;?></p>
	</div>


</div> 
<div class="col-sm-12 content-footer">
<p><i class="fa fa-paperclip"></i>  Attachment Files</p>
	<div class="col-sm-12 slider">
		 <h3>Download Resume <a href="<?php echo web_root.'applicant/'.$attachmentfile->FILE_LOCATION; ?>" target="_BLANK">Here</a></h3>
	</div> 

	<div class="col-sm-12">
		<?php
			$mydb->setQuery("SELECT id_progress FROM tblprogress WHERE APPLICANTID= $appl->APPLICANTID AND COMPANYID = $job->COMPANYID AND JOBID = $job->JOBID ");
			$progress = $mydb->loadSingleResult();
			$mydb->setQuery("SELECT progres_step FROM tbl_user_progress WHERE APPLICANTID = $appl->APPLICANTID AND id_progress = $progress->id_progress");
			$userprogress = $mydb->loadSingleResult();
			$status = array_values(unserialize($job->PROGRESS_DETAIL))[$userprogress->progres_step - 1];
		if ($status == "medical checkup") { ?>
		<p>Medical Checkup Status</p>
		<select class="form-control" name="REMARKS" id="REMARKS">
			<option value="Success" <?= ($jobreg->REMARKS == "Success") ? "Selected" : "" ?>>Hire</option>
			<option value="Pending" <?= ($jobreg->REMARKS == "Pending") ? "Selected" : "" ?>>Pending</option>
			<option value="Failed" <?= ($jobreg->REMARKS == "Failed") ? "Selected" : "" ?>>Failed</option>
		</select>
		<?php }
		else if($status == 'quisioner') { ?>
			<p>Quisioner Answer : </p>
			<?php
			$mydb->setQuery("SELECT * FROM tblquisionerlist where COMPANYID = $job->COMPANYID AND JOBID = $job->JOBID");
			$cur = $mydb->loadResultList();
			require_once('../../config/conn.php');
			foreach ($cur as $quiz ) {
				$question = $koneksi->query("SELECT * FROM tblquisioner where QID = '".$quiz->QUISIONERLISTID."' order by QUISIONERID asc ");
				$i = 1 ;
				while($row =$question->fetch_assoc()){ ?>
					<ul class="q-items list-group mt-4 mb-4">
						<li class="q-field list-group-item">
							<strong><?php echo ($i++). '. '; ?> <?php echo $row['QUESTION']; ?></strong>
							<br>
							<br>
							<?php
							$mydb->setQuery("SELECT answer FROM tblquisionerresult where QUISIONERID = ".$row['QUISIONERID']." AND QUISIONERLISTID = ".$row['QID']." AND APPLICANTID = $appl->APPLICANTID");
							$res = $mydb->loadSingleResult();
							?>
							<p><?= $res->answer; ?></p>

						</li>
					</ul>	
				<?php }
			}
				
			?>
			
			<p>Update Applicant Status</p>
			<select class="form-control" name="REMARKS" id="REMARKS">
				<option value="Success" <?= ($jobreg->REMARKS == "Success") ? "Selected" : "" ?>>Hire</option>
				<option value="Pending" <?= ($jobreg->REMARKS == "Pending") ? "Selected" : "" ?>>Pending</option>
				<option value="Failed" <?= ($jobreg->REMARKS == "Failed") ? "Selected" : "" ?>>Failed</option>
			</select>

		<?php }
		?>

	</div>
	<div class="col-sm-12  submitbutton "> 
		<button type="submit" name="submit" class="btn btn-primary">Send</button>
	</div> 
</div>
</form>