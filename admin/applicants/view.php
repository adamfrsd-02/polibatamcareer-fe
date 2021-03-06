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
	<h3 class="text-bold"><?php echo $job->OCCUPATIONTITLE; ?></h3>
	<input type="hidden" name="JOBREGID" value="<?php echo $jobreg->REGISTRATIONID;?>">
	<input type="hidden" name="APPLICANTID" value="<?php echo $appl->APPLICANTID;?>">

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
		<p class="text-bold">Job Description : </p>   
		<p style="margin-left: 15px;"><?php echo $job->JOBDESCRIPTION;?></p>
	</div>
	<div class="col-sm-12"> 
		<p class="text-bold">Qualification/Work Experience : </p>
		<p style="margin-left: 15px;"><?php echo $job->QUALIFICATION_WORKEXPERIENCE; ?></p>
	</div>
	<div class="col-sm-12"> 
		<p class="text-bold">Employeer : </p>
		<p style="margin-left: 15px;"><?php echo $comp->COMPANYNAME ; ?></p> 
		<p style="margin-left: 15px;"  class="text-bold">@ <?php echo $comp->COMPANYADDRESS ; ?></p>
	</div>
</div>
<div class="col-sm-6 content-body" >
	<p>Applicant Infomation</p> 
	<h3 class="text-bold"> <?php echo ucfirst($appl->FNAME). ' ' .ucfirst($appl->LNAME) ;?></h3>
	<table class="table" style="border: none;">
		<tr>
			<td>Address</td>
			<td>:</td>
			<td class="text-start"><?php echo $appl->ADDRESS; ?></td>
		</tr>
		<tr>
			<td>Email Address</td>
			<td>:</td>
			<td class="text-start"><?php echo $appl->EMAILADDRESS;?></td>
		</tr>
		<tr>
			<td>Contact</td>
			<td>:</td>
			<td class="text-start"><?php echo $appl->CONTACTNO;?></td>
		</tr>
		<tr>
			<td>Gender</td>
			<td>:</td>
			<td class="text-start"><?php echo $appl->SEX;?></td>
		</tr>
		<tr>
			<td>Age</td>
			<td>:</td>
			<td class="text-start"><?php echo $appl->AGE;?></td>
		</tr>
		<tr>
			<td>LinkedIn</td>
			<td>:</td>
			<td class="text-start">
				<?php
				if ($appl->LINKEDINLINK) :
				?>
					<a href="<?= $appl->LINKEDINLINK; ?>" target="_BLANK"><?= $appl->LINKEDINLINK; ?></a>
				<?php
				else :
					echo 'N/A';
				endif;
				?>
			</td>
		</tr>
	</table>

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
		<p>Feedback</p>
		<textarea class="input-group" style="box-sizing: border-box;" name="REMARKS"><?php echo isset($jobreg->REMARKS) ? $jobreg->REMARKS : ""; ?></textarea>
	</div>
	<div class="col-sm-12  submitbutton "> 
		<button type="submit" name="submit" class="btn btn-primary">Send</button>
	</div> 
</div>
</form>