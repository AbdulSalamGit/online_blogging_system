<?php  require_once("post_header.php");  ?>

<style type="text/css">
	.modify a{
		text-decoration: none;
		background-color: #130f40;
		margin: 10px;
		height: 40px;
		padding: 10px;
		border-radius: 10px;
		color: #fff;
	}
	.container{
		height: 540px;
	}
	
</style>
<div class="container">
	<div class="row">
		<div class="col-lg-4">
			
		</div>
		<div class="col-sm-12 col-lg-6 ">
			<h3 class="text-center">My Profile</h3>
			<table class="table table-borderless border border-1  table-light">
				  <thead>
				    <tr>
				      
				    </tr>
				  </thead>
				  <tbody>
				     <tr>
				      <th colspan="">First Name</th>
				      <td >Abdul Salam</td>
				    </tr>
				     <tr>
				      <th >Last Name</th>
				      <td >Qambrani</td>
				    </tr>
				     <tr>
				      <th >Email</th>
				      <td >hafizabsalam123@gmail.com</td>
				    </tr>
				     <tr>
				      <th >Gender</th>
				      <td >Male</td>
				    </tr>
				     <tr>
				      <th >Date of Birth</th>
				      <td >01/01/1995</td>
				    </tr>
				     <tr>
				      <th >Home Town</th>
				      <td > Badin Sindh</td>
				    </tr>
				     <tr>
				      <th >Pic</th>
				      <td >AAA</td>
				    </tr>

				  </tbody>

			</table>
			<div class="modify" align="center">
				<a href="#">Modify</a>
			<a href="change_password.php">Change Password</a>
			</div>

		</div>
		<div class="col-lg-2">
			
		</div>
	</div>
</div><br><br>



<?php	require_once("../footer.php"); ?>