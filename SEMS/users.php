<?php session_start(); ?>
<?php include('db/connect.php'); ?>
<?php include('partials/header.php'); ?>
<?php include('partials/navbar.php'); ?>

<br><br>
<div class="container">
	<div class="row">
		<div class="col-md-4">
			<div class="card">
				<div class="card-header">Add User</div>
				<!-- add user form -->
				<form action="controller.php" method="POST">
				<div class="card-body">
					<input type="text" name="name" class="form-control" placeholder="Enter name" required>
					<br>
					<input type="email" name="email" class="form-control" placeholder="Enter email" required>
					<br>
					<select name="role" class="form-control" required>
						<option value="">Select Role</option>
						<option value="student">Student</option>
						<option value="faculty">Faculty</option>
					</select>
					<br>
					<input type="text" name="username" class="form-control" placeholder="Enter username" required>
					<br>
					<input type="password" name="password" class="form-control" placeholder="Enter password" required>
				</div>
				<div class="card-footer">
					<button type="submit" name="add-user" class="btn btn-info">Submit</button>
				</div>
				</form>
			</div>
		</div>

		<div class="col-md-8">
			<div class="card">
				<div class="card-body">
					<!-- session flash message -->
					<?php if(isset($_SESSION['success'])){ ?>
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<?php echo $_SESSION['success']; ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php unset($_SESSION['success']); }elseif(isset($_SESSION['failure'])){ ?>
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<?php echo $_SESSION['failure']; ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php unset($_SESSION['failure']); } ?>

					<!-- users table -->
					<table class="table table-striped table-responsive">
						<thead>
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Email</th>
								<th>Role</th>
								<th>Username</th>
								<th>Password</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$sql="SELECT * FROM users ORDER BY id DESC";
								$query=mysqli_query($connection, $sql);
								$count=0;

								while($row=mysqli_fetch_array($query)){
									$count++;
							?>
							<tr>
								<td><?php echo $count; ?></td>
								<td><?php echo $row['name']; ?></td>
								<td><?php echo $row['email']; ?></td>
								<td><?php echo $row['role']; ?></td>
								<td><?php echo $row['username']; ?></td>
								<td><?php echo substr($row['password'], 0, 10).'...'; ?></td>
							</tr>
							<?php
								}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include('partials/footer.php'); ?>
<?php include('db/close.php'); ?>