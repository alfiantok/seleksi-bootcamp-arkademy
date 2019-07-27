<?php
$conn = mysqli_connect("localhost","root","","arkademy");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Arkademy Bootcamp</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
		.logo img{
			width: 120px;
		}
		.mybutton{	
			float: right;
			background: #F3AC13;
			border: none;
			padding: 10px 40px 10px 40px;
		}
		.mybutton:hover,.mybutton:active{
			background: #BF8405 !important;
		}
		.modal-header{
			border-bottom: none !important;
		}
		.thead-light th{
			background: #f1f1f1 !important;
		}
	</style>
</head>
<body>
	<header>
		<nav class="bg-default shadow">
			<div class="nav navbar">
				<div class="logo navbar-brand">
					<a href="6C.php">
						<img src="https://www.arkademy.com/asset/img/logo%20arkademy-tech%20academy-03.png">
					</a>
				</div>
			</div>
		</nav>
		<main>

			<div class="container mt-5">
				<div>
					<a href="javascript:void(0)" class="mybutton btn btn-primary mb-3 mt-5 ml-auto shadow-sm" data-toggle="modal" data-target="#openAdd">
						ADD
					</a>
				</div>
				<table class="table table-bordered">
					<thead class="thead-light">
						<tr>
							<th>Name</th>
							<th>Work</th>
							<th>Salary</th>
							<th>Action</th>
						</tr>
					</thead>
					<?php
						// Show Data

					$sql = "SELECT nama.id,nama.name,work.name AS work,kategori.salary FROM nama LEFT JOIN kategori ON nama.id_salary=kategori.id LEFT JOIN work ON nama.id_work=work.id GROUP BY nama.id DESC";
					$result = mysqli_query($conn,$sql);

					while($data = mysqli_fetch_array($result)){
						?>

						<tbody>
							<tr>
								<td><?php echo $data['name']; ?></td>
								<td><?php echo $data['work']; ?></td>
								<td><?php toRupiah($data['salary']); ?></td>
								<td width="15%">
									<a href="6C.php?id=<?php echo $data['id']; ?>&delete=<?php echo $data['name']; ?>" class="btn" onclick="return confirm('Anda Yakin?');"> <i class="fa fa-trash-o"></i> </a> |
									<a href="6C.php?id=<?php echo $data['id']; ?>&work=<?php echo $data['id']; ?>&salary=<?php echo $data['id']; ?>" class="btn" data-target="#openEdit<?php echo $data['id']; ?>" data-toggle="modal"> <i class="fa fa-edit"></i> </a> 
								</td>
							</tr>
						</tbody>


						<!-- Edit Modal -->
						<div class="modal fade" id="openEdit<?php echo $data['id']; ?>">
							<div class="modal-dialog modal-lg">
								<div class="modal-content mt-5">

									<!-- Modal Header -->
									<div class="modal-header">
										<h4 class="modal-title">Edit Data</h4>
										<button type="button" class="close" data-dismiss="modal">&times;</button>
									</div>

									<!-- Modal body -->
									<form method="get" action="6C.php">
										<div class="modal-body">
											<div class="form-group">
												<input type="hidden" name="id" value="<?php echo $data['id'] ?>">
												<input type="text" required name="name" class="form-control" placeholder="Name" value="<?php echo $data['name']; ?>">
												<select name="work" class="form-control mt-4" required>
													<?php
													$sqlWork = "SELECT * FROM work";
													$resultWork = mysqli_query($conn,$sqlWork);
													while($dataWork = mysqli_fetch_array($resultWork)){													
														?>

														<option value="<?php echo $dataWork['id']; ?>" <?php if($dataWork['name'] == $data['work']){ echo "selected"; } ?>>
															<?php echo $dataWork['name']; ?>		
														</option>

														<?php
													}
													?>
												</select>
												<select name="salary" class="form-control mt-4" required>
													<?php
													$sqlSalary = "SELECT * FROM kategori";
													$resultSalary = mysqli_query($conn,$sqlSalary);
													while($dataSalary = mysqli_fetch_array($resultSalary)){													
														?>

														<option value="<?php echo $dataSalary['id']; ?>" <?php if($dataSalary['salary'] == $data['salary']){ echo "selected"; } ?>>
															<?php toRupiah($dataSalary['salary']); ?>		
														</option>

														<?php
													}
													?>
												</select>
											</div>
										</div>
										<div class="container">
											<input type="submit" name="editData" href="javascript:void(0)" class="mybutton btn btn-primary mb-3 mr-0 ml-auto shadow-sm" value="Edit">

										</div>
									</form>
								</div>
							</div>
						</div>

						<?php
					}
					?>

				</table>
			</div>
			<?php
				// insertLogic 
			if (isset($_POST['addData'])) {
				$name = $_POST['name'];
				$work = $_POST['work'];
				$salary = $_POST['salary'];


				$sqlInsert = "INSERT INTO nama(name,id_work,id_salary) VALUES('$name','$work','$salary')";
				$insert = mysqli_query($conn,$sqlInsert);
				if($insert){
					echo '<META HTTP-EQUIV="Refresh" Content="0; URL=6C.php">';
				}
				else{
					echo "Fail";
				}
			}

			if(isset($_GET['delete'])){

				$idDelete = $_GET['id'];
				$name = $_GET['delete'];

				$sqlDel = "DELETE FROM nama WHERE id=$idDelete";
				$delResult = mysqli_query($conn,$sqlDel);

				if($delResult){
					echo '<META HTTP-EQUIV="Refresh" Content="0; URL=6C.php?delsuc='.$name.'">';
				}
			}


			if(isset($_GET['editData'])){
				$name = $_GET['name'];
				$work = $_GET['work'];
				$salary = $_GET['salary'];
				$id = $_GET['id'];

				$sqlEdit = "UPDATE nama SET name='$name',id_work=$work,id_salary=$salary WHERE id=$id";
				$editResult = mysqli_query($conn,$sqlEdit);
				if($editResult){
					echo '<META HTTP-EQUIV="Refresh" Content="0; URL=6C.php?editSuc=ok">';
				}
			}
			if(isset($_GET['delsuc'])){
				$name = $_GET['delsuc'];

				echo '<script type="text/javascript">';
				echo 'setTimeout(function () { swal("Delete Success!","Data '.$name.' berhasil dihapus","success");';
				echo '}, 500);</script>';
			}
			if(isset($_GET['editSuc'])){
				echo '<script type="text/javascript">';
				echo 'setTimeout(function () { swal("Edit Success!","","success");';
				echo '}, 500);</script>';
			}
			
			
			function toRupiah($data){
				echo number_format($data);
			}

			?>

			<!-- Add Modal -->
			<div class="modal fade" id="openAdd">
				<div class="modal-dialog modal-lg">
					<div class="modal-content mt-5">

						<!-- Modal Header -->
						<div class="modal-header">
							<h4 class="modal-title">Add Data</h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						</div>

						
						<!-- Modal body -->
						<form method="post" action="6C.php">
							<div class="modal-body">
								<div class="form-group">
									<input type="text" name="name" class="form-control" placeholder="Name" required>
									<select class="form-control mt-4" name="work" required>
										<option disabled selected value>Work</option>
										<?php
										$sqlSelectWork = "SELECT * FROM work";
										$resultSelectWork = mysqli_query($conn,$sqlSelectWork);

										while($datas = mysqli_fetch_array($resultSelectWork)){

											?>
											<option value="<?php echo $datas['id']; ?>"><?php echo $datas['name']; ?></option>
											<?php
										}
										?>
									</select>
									<select class="form-control mt-4" name="salary" required>
										<option disabled selected value>Salary</option>
										<?php
										$sqlSelectWork = "SELECT * FROM kategori";
										$resultSelectWork = mysqli_query($conn,$sqlSelectWork);

										while($datas = mysqli_fetch_array($resultSelectWork)){

											?>
											<option value="<?php echo $datas['id']; ?>"><?php toRupiah($datas['salary']); ?></option>
											<?php
										}
										?>
									</select>
								</div>
							</div>

							<div class="container">
								<button type="submit" name="addData" class="mybutton btn btn-primary mb-3 mr-0 ml-auto shadow-sm">
									ADD
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</main>
	</header>


	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	
</body>
</html>