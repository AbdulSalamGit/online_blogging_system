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
	td input{
		border-color: none;
		background-color: #fff;
		width: 100%;
		border-radius: 15px;
		padding: 4px;
	}
	.border{
		background-color: #ced6e0;
		border-radius: 12px;
	}
	.container{
		height: 540px;
	}

</style>
<div class="container">
	<div class="row">
		<div class="col-lg-4">
			
		</div>
		<div class="col-sm-12 col-lg-6  border border-1  table-light">
			<h3 class="text-center">Change Password</h3>
			<form action="">
			<table class="table table-borderless border border-1   " >

				  <thead>
				    <tr>
				      
				    </tr>
				  </thead>
				  <tbody>
				     <tr>
				      <th colspan="">Emali</th>
				      <td ><input type="email" ></td>
				    </tr>
				     <tr>
				      <th > Old Password</th>
				      <td ><input type="Password"></td>
				    </tr>
				     <tr>
				      <th > New Password</th>
				      <td ><input type="Password"></td>
				    </tr>
				    

				  </tbody>

			</table>

			<div class="modify" align="center">
			<a href="#">Change Password</a>
			</div>
			</form>
		</div>
		<div class="col-lg-2">
			
		</div>
	</div>
</div><br><br>



<?php	require_once("../footer.php"); ?>