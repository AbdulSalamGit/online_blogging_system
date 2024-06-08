<?php require_once("admin_header.php"); ?>

<style>
	h1{
		font-size: 40px;
		font-weight: bold;
		padding-top: 20px;
	}
	h3{
		font-size: 22px;
	}
</style>
<div class="wrapper">
       <?php require_once("sidebar.php"); ?>
       <div class="main bg-light">
       	<div class="container">
       		<div class="row">
                <div class="col-lg-12 col-sm-12">
                  <div class="table-responsive">
       			      <h1 class="text-center text-uppercase"> Comments</h1>
                           <table  id="table_id" class="display" style="width:100%">
                               <thead>
                                <tr>
                                   <th>No</th>
                                   <th>User Name</th>
                                   <th>Categpry</th>
                                   <th>text</th>
                                   <th>Added_on</th>
                                   <th>Action</th>
                                
                                </tr>               
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>01</td>
                                        <td>ABC</td>
                                        <td>Education</td>
                                        <td>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sapiente veritatis ullam odio recusandae fu..</td>
                                        <td>12/04/24</td>
                                         <td width="200px">
                                        <button type="button" class="btn btn-outline-success">Approve</button>
                                        <button type="button" class="btn btn-outline-danger">Reject</button>
                                        </td>
                                        
                                    </tr>             
                                </tbody>
                                <tfoot>
                                     <!-- <tr>
                                        <td>02</td>
                                        <td>System Architect</td>
                                        <td>abc@gmail.com</td>
                                        <td>Education</td>
                                        <td>Education</td>
                                        <td>$320,800</td>
                                        <td>$320,800</td>
                                    </tr> -->
                                </tfoot>
                                </table>         
                    </div>
                </div>
       		</div>
       	</div>


       </div>
</div>
<?php require_once("footer.php"); ?>