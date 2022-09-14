<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript">
                $(document).ready(function(){
					// e.preventDefault();		

					// $("#upload").on("click",function(e){
					// 	    e.preventDefault();		       
					// 		// console.log("1");
					// 		if(!$("#certy").val() || !$("#eid").val()){
					// 			$("#erupload").html("Error: Please fill the Form First");
					// 			$("#erupload").show();
					// 		}
					// 		else{
					// 		$(".form-popup").show();
					// 		$("#erupload").hide();
					// 		}
					// 	});
					// $("#eid").change(function(){

					// 	$("#closeupload").click(function(){
					// 	// console.log("clicked");
					// 	$(".form-popup").hide();
					// });	
					// });	


                    // const form = document.querySelector(".uploadform"),
					// fileInput = $(".file-input"),
					// progressArea = document.querySelector(".progress-area"),
					// uploadedArea = document.querySelector(".uploaded-area");
					
					// let data = new FormData();
					// fileInput.change((e)=>{
					// 	e.preventDefault();

					// var eidupload=$("#eid").val();
					// console.log(eidupload);
					// var certyupload=$("#certy").val();
					// console.log(certyupload);
					// var certyidupload;
					// // if(certyupload){
					// 	switch(certyupload){
					// 	case "NOC":certyidupload=1;
					// 			break;
					// 	case "Experience Certificate":certyidupload=2;
					// 	break;
					// 	case "Relieving Letter":certyidupload=3;
					// 	break;
					// 	case "Termination Certificate":certyidupload=4;
					// 	break; 
					// 	default: certyidupload=0;           
					// }
					// data.append("eidupload",eidupload);
					// data.append("certyidupload",certyidupload);

				// 	const files = e.target.files;
				// 	// console.log(e.target.files.length);
				// 	for(let i=0;i<files.length;i++){
				// 	if(files[i]){
				// 		let fileName = files[i].name;
				// 		data.append("file",files[i]);
				// 		console.log(fileName);
				// 		uploadFile(fileName);
				// 	}
				// }
				// 	});
				// 	function uploadFile(name){
				// 	let xhr = new XMLHttpRequest();
				// 	// console.log(xhr);
				// 	xhr.open("POST", "upload.php");
				// 	// console.log("demo");
				// 	xhr.upload.addEventListener("progress",(e) =>{
				// 		console.log(e);
				// 		// e.preventDefault();
				// 		var loaded=e.loaded;
				// 		var total=e.total;
				// 		let fileLoaded = Math.floor((loaded / total) * 100);
				// 		let fileTotal = Math.floor(total / 1000);
				// 		// console.log(fileLoaded);
				// 		let fileSize;
				// 		(fileTotal < 1024) ? fileSize = fileTotal + " KB" : fileSize = (loaded / (1024*1024)).toFixed(2) + " MB";
				// 		let progressHTML = `<li class="row">
				// 							<i class="fas fa-file-alt"></i>
				// 							<div class="content">
				// 								<div class="details">
				// 								<span class="name">${name} • Uploading</span>
				// 								<span class="percent">${fileLoaded}%</span>
				// 								</div>
				// 								<div class="progress-bar">
				// 								<div class="progress" style="width: ${fileLoaded}%"></div>
				// 								</div>
				// 							</div>
				// 							</li>`;
				// 		uploadedArea.classList.add("onprogress");
				// 		progressArea.innerHTML = progressHTML;
				// 		if(loaded == total){
				// 		progressArea.innerHTML = "";
				// 		let uploadedHTML = `<li class="row">
				// 								<div class="content upload">
				// 								<i class="fas fa-file-alt"></i>
				// 								<div class="details">
				// 									<span class="name">${name} • Uploaded</span>
				// 									<span class="size">${fileSize}</span>
				// 								</div>
				// 								</div>
				// 								<i class="fas fa-check"></i>
				// 							</li>`;
				// 		uploadedArea.classList.remove("onprogress");
				// 		uploadedArea.insertAdjacentHTML("afterbegin", uploadedHTML);
				// 		}
				// 	});
				// 	// console.log();
				// 	for (var key of data.entries()) {
				// 		console.log(key[0] + ', ' + key[1]);
				// 	}
				// 	// console.log(xhr.send(data));
				// 	xhr.send(data);
				// 	xhr.onreadystatechange=function() {
				// 	if (this.readyState==4 && this.status==200) {
				// 		$("#hider1").show();
				// 	}
				// }
					
				// 	}
					$("#submit").click(function(e){
						e.preventDefault();
						var eid=$("#eid").val();
						var rdate=$("#rdate").val();
						var sdate=$("#sdate").val();
						var edate=$("#edate").val();
						var certy=$("#certy").val();
						var content=$("#content").val();

                        if(!eid ){
							$("#erid").html("<br>Fill Employee Name<br>");
							return false;
						}
						else{
							$("#erid").hide();
						}
						if(!rdate ){
							$("#errdate").html("<br>Fill Release Date <br>");
							return false;
						}
						else{
							$("#errdate").hide();
						}
						if(!sdate){
							$("#ersdate").html("<br>Fill Starting Date <br>");
							return false;
						}
						else{
							$("#ersdate").hide();
						}
						if(!edate){
							$("#eredate").html("<br>Fill Ending Date <br>");
							return false;
						}
						else{
							$("#eredate").hide();
						}
						if(!certy){
							$("#ercerty").html("<br>Fill Certy Name<br>");
							return false;
						}
						else{
							$("#ercerty").hide();
						}
						if(!content && certy!="All"){
							$("#ercontent").html("<br>Fill Certy Content <br>");
							return false;
						}
						else{
							$("#ercontent").hide();
						}
 						$.ajax({
							url:'regemp.php',
							type:'POST',
							data:{
								"eid": eid,
								"rdate": rdate,
								"sdate": sdate,
								"edate": edate,
								"certy": certy,
								"content": content
							},
							success:function(data) {
								console.log(data);
							}

						});
						if(certy=="All"){
							$("#content").hide();
							$.ajax({
							url:'noc.php',
							type:'POST',
							data:{
								"eid": eid,
								"sdate": sdate,
								"edate": edate,
								"certyname":certy,
								"content": content
							},
							success:function(data) {
								console.log(data);		
							},
						});
						$.ajax({
							url:'ec.php',
							type:'POST',
							data:{
								"eid": eid,
								"sdate": sdate,
								"edate": edate,
								"certyname":certy,
								"content": content
							},
							success:function(data) {
								console.log(data);
							}

						});	
						$.ajax({
							url:'rl.php',
							type:'POST',
							data:{
								"eid": eid,
								"sdate": sdate,
								"edate": edate,
								"certyname":certy,
								"content": content
							},
							success:function(data) {
								console.log(data);
							}

						});
						}
						else if(certy=="NOC"){
							$.ajax({
							url:'noc.php',
							type:'POST',
							data:{
								"eid": eid,
								"sdate": sdate,
								"edate": edate,
								"certyname":certy,
								"content": content
							},
							success:function(data) {
								console.log(data);		
							},
						});
						}
						else if(certy=="Experience Certificate"){
						    $.ajax({
							url:'ec.php',
							type:'POST',
							data:{
								"eid": eid,
								"sdate": sdate,
								"edate": edate,
								"certyname":certy,
								"content": content
							},
							success:function(data) {
								console.log(data);		
							},
						});
						}
						else if(certy=="Relieving Letter"){
						    $.ajax({
							url:'rl.php',
							type:'POST',
							data:{
								"eid": eid,
								"sdate": sdate,
								"edate": edate,
								"certyname":certy,
								"content": content
							},
							success:function(data) {
								console.log(data);
							}

						});
						}
						// else if(certy=="Termination Certificate"){
						//       $.ajax({
						// 	url:'tc.php',
						// 	type:'POST',
						// 	data:{
						// 		"eid": eid,
						// 		"sdate": sdate,
						// 		"edate": edate,
						// 		"certyname":certy,
						// 		"content": content
						// 	},
						// 	success:function(data) {
						// 		console.log(data);
						// 	}

						// });
						// }
						// else{
						// 	$("#er").val("fill Credentials properly");
						// 	$("#error").show();
						// }
					});

					$("#certy").change(function(){
						var ename=$("#ename").val();
						var sdate=$("#sdate").val();
						var edate=$("#edate").val();

					if($(this).val()=="NOC"){
							$("#content").val(`This is to certify that Mr./Mrs. ${ename} has worked with this company from ${sdate} to ${edate} as <Designation>`);
						}
						else if($(this).val()=="Experience Certificate"){
							$("#content").val(`for the experience gained in our organization. As the head of out HR department, I hereby testify that this employee has worked in our company from ${sdate}  to ${edate} and has gained experience as a Developer of the Software`);
						}
						else if($(this).val()==="Relieving Letter"){
							$("#content").val(`was Level with Jain Software Pvt. Ltd. as a <Designation> From ${sdate} to ${edate}, subsequent his resignation letter dated <Resignation Letter Date>, ${ename} has been relieved of his duties.`);
						}
						else{
							$("#contentbox").hide();
						}
				});

                });
    </script>
    <style>
        body{
            width:100%;
            height: 100%;
			position:absolute;
			/* padding:0;
			margin:0; */
            /* background-color: red; */
        }
		.row{
			width:100%;
			min-height:100%;
			margin:0;
		}
        .formspace{
            width:100%;
            min-height: 100%;
            background-color: purple;
            display:block;
			margin:0;
			padding:0;
        }
        .freespace{
            width:100%;
            height: 100%;
            background-color: blue;
        }
		.formenter{
			width:100%;
			padding:3%;
		}
    </style>
</head>
<body>
     <div class="row">
        <div class="col-4 formspace" >
         <form id="formenter" name="formenter" class="formenter" action="" method="POST" style="color:white;">
            <div >
                <h1> Employee Details</h1>                    
            </div>
                  
        <ul style="width:100%; margin:0 auto; list-style:none; padding:5%;">
	    <li style="width:80%; margin: 3%;" > 
		<div >  		 
             <p><b>Employee Name</b></p>
				   <select class="form-control  fg-input fg-active" name="eid"  width="100%" id="eid"  tabindex="0"  >
						<?php
									require_once('config.php');
									$select = "SELECT * FROM employees ";
									$query = mysqli_query($conn, $select);

									while ($result = mysqli_fetch_array($query)) {
									?>
									 <option value=<?php echo $result['id']; ?>><?php echo $result['empname']; ?></option>
								 <?php
									}
					     ?>	
					</select> 
					<span id="erid" style="color: red"></span>

        </div>
		</li>
		<li style="width:80%; margin: 3%;" > 
			<div>  		 
				 <p><b>Release Date</b></p>
					   <input type="date" name="rdate"  id="rdate" class="form-control material fg-input fg-active"  value="0" tabindex="0" placeholder="Enter no. of Hours" >
					   <span id="errdate" style="color: red"></span>
			</div>
		</li>
		<li style="width:80%; margin: 3%;" > 
			<div>  		 
				 <p><b>Start Date</b></p>
					   <input style="width:100%;" type="date" name="sdate"  id="sdate" class="form-control material fg-input fg-active"  value="0" tabindex="0" placeholder="Enter no. of Hours" >
					   <span id="ersdate" style="color: red"></span>
			</div>
		</li>
		<li style="width:80%; margin: 3%;" > 
			<div>  		 
				 <p><b>End Date</b></p>
					   <input style="width:100%;" type="date" name="edate"  id="edate" class="form-control material fg-input fg-active"  value="0" tabindex="0" placeholder="Enter no. of Hours" >
					   <span id="eredate" style="color: red"></span>
			</div>
		</li>
		<li style="width:80%; margin: 3%;" > 
			<div>  		 
				 <p><b>Select Certificate</b></p>
					   <select class="form-control  fg-input fg-active" name="certy"  id="certy"  tabindex="0" placeholder="Select Content" >
					   <option>All</option>	
					   <option>NOC</option>
						<option>Experience Certificate</option>
						<option>Relieving Letter</option>
						</select>
						<span id="ercerty" style="color: red"></span>
			</div>
		</li>
		<li style="width:80%; margin: 3%;" > 
			<div id="contentbox">  		 
				 <p><b>Content</b></p>
                    <textarea class="form-control material fg-input fg-active" name="content" id="content"  rows="3" ></textarea >  
					<span id="ercontent" style="color: red"></span>
			</div>
		</li>  		 
    </ul>
					<!-- <a name="upload" id="upload" class="btn btn-lg btn-danger btn-block uploadbtn">Upload Files</a>
					<span id="erupload"></span> -->
					<button type="submit" name="submit" id="submit" style="margin-down: 0;" class="btn btn-lg btn-danger btn-block">Submit</button>	
				<!-- <div class="progress m-0 d-none progressbar1">
                <div class="progress-bar progress-bar-success progress-bar-striped active progressstatus" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 0%">Save - 0%
                </div>
				</div> -->
			</form> 
        </div>
        <div class="col-8 freespace"></div>
    </div> 
</body>
</html>