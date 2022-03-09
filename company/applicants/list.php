<?php
	 if(!isset($_SESSION['COMPANY_USERID'])){
      redirect(web_root."company/index.php");
     }

?> 
	<div class="row">
    <div class="col-lg-12">
            <h1 class="page-header">List of Applicant's   </h1>
       		</div>
        	<!-- /.col-lg-12 -->
   		 </div>
                
 
						<form class="wow fadeInDownaction" action="controller.php?action=delete" Method="POST">   		
							<table id="dash-table" class="table table-striped  table-hover table-responsive" style="font-size:12px" cellspacing="0">

							  <thead>
							  	<tr>
									<th>Applicant</th>
									<th>Job Title</th>
									<th>Company</th>
									<th>Applied Date</th> 
									<th>Remarks</th>
									<th>Application Progress</th>
									<th width="14%" >Action</th> 
							  	</tr>	
							  </thead> 
							  <tbody>
							  	<?php   
								  $id = $_SESSION['COMPANY_USERID'];
							  		// $mydb->setQuery("SELECT * 
											// 			FROM  `tblusers` WHERE TYPE != 'Customer'");
							  		$mydb->setQuery("SELECT * FROM `tblcompany` c  , `tbljobregistration` j, `tbljob` j2, `tblapplicants` a WHERE  c.`COMPANYID`=j.`COMPANYID` AND  j.`JOBID`=j2.`JOBID` AND j.`APPLICANTID`=a.`APPLICANTID` AND c.`COMPANYID`=$id ");
							  		$cur = $mydb->loadResultList();

									foreach ($cur as $result) { 
							  		echo '<tr>';
							  		// echo '<td width="5%" align="center"></td>';
									$mydb->setQuery("SELECT * FROM tblapplicants where APPLICANTID = $result->APPLICANTID");
									$appl = $mydb->loadSingleResult();
									echo '<td>'. $appl->FNAME." ".$appl->LNAME.'</td>';
							  		echo '<td>' . $result->OCCUPATIONTITLE.'</a></td>';
							  		echo '<td>' . $result->COMPANYNAME.'</a></td>'; 
							  		echo '<td>'. $result->REGISTRATIONDATE.'</td>';
							  		echo '<td>'. $result->REMARKS.'</td>';
									  $mydb->setQuery("SELECT id_progress FROM tblprogress WHERE APPLICANTID= $result->APPLICANTID AND COMPANYID = $result->COMPANYID AND JOBID = $result->JOBID ");
									  $progress = $mydb->loadSingleResult();
									  $mydb->setQuery("SELECT progres_step FROM tbl_user_progress WHERE APPLICANTID = $result->APPLICANTID AND id_progress = $progress->id_progress");
									  $userprogress = $mydb->loadSingleResult();
									  $status = array_values(unserialize($result->PROGRESS_DETAIL))[$userprogress->progres_step - 1];
									echo '<td>'.$userprogress->progres_step ."/".count(unserialize($result->PROGRESS_DETAIL)).'</td>';
					  				echo '<td align="center" >';
									 if (!$status == 'hired') {
										 if ($status == 'interview' && $userprogress->progres_step < count(unserialize($result->PROGRESS_DETAIL))) {
											 echo '<a title="interview link" href="index.php?view=interview&id='.$progress->id_progress.'"  class="btn btn-success btn-xs  "><span class="fa fa-info fw-fa"></span> Interview</a>';
											}
											if ($status == 'medical checkup') {
												
												echo '<a title="View" href="index.php?view=view&id='.$result->REGISTRATIONID.'"  class="btn btn-info btn-xs  ">
												<span class="fa fa-info fw-fa"></span> Medical Checkup Status Update</a> ';
											}else {
												echo '<a title="View" href="index.php?view=view&id='.$result->REGISTRATIONID.'"  class="btn btn-info btn-xs  ">
												<span class="fa fa-info fw-fa"></span> View</a>';
											}
										} 
									echo ' 
					  		             <a title="Remove" href="controller.php?action=delete&id='.$result->REGISTRATIONID.'&applicantid='.$appl->APPLICANTID.'"  class="btn btn-danger btn-xs  ">
					  		             <span class="fa fa-trash-o fw-fa"></span> Remove</a> 
					  					 </td>';
							  		echo '</tr>';
							  	} 
							  	?>
							  </tbody>
								
							</table>
 
							 
							</form>
       
                 
 