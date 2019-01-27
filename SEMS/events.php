<?php session_start(); ?>
<?php include('db/connect.php'); ?>
<?php require('function.php'); ?>
<?php include('partials/header.php'); ?>
<?php include('partials/navbar.php'); ?>

<br><br>
<div class="container">
	<div class="row">
		<div class="col-md-4">
			<div class="card">
				<div class="card-header">Add Events</div>
				<!-- add user form -->
				<form action="controller.php" method="POST">
				<div class="card-body">
					<input type="text" name="name" class="form-control" placeholder="Enter event name" required>
					<br>
					<select name="organizer" class="form-control" required>
						<option value="">Select Organizer</option>
						<?php
							$sql="SELECT * FROM users ORDER BY name ASC";
							$query=mysqli_query($connection, $sql);

							while($row=mysqli_fetch_array($query)){
						?>
						<option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
						<?php } ?>
					</select>
					<br>
					<select name="judge" class="form-control" required>
						<option value="">Select Judge</option>
						<?php
							$sql="SELECT * FROM users ORDER BY name ASC";
							$query=mysqli_query($connection, $sql);

							while($row=mysqli_fetch_array($query)){
						?>
						<option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
						<?php } ?>
					</select>
					<br>
					<input type="text" name="location" class="form-control" placeholder="Enter event location" required>
					<br>
					<label for="startDate">Start Date:</label>
					<input type="date" name="startDate" class="form-control" id="startDate" required>
					<br>
					<label for="endDate">End Date:</label>
					<input type="date" name="endDate" class="form-control" id="endDate" required>
					<br>
					<input type="number" name="entryFee" class="form-control" placeholder="Enter entry fee">
				</div>
				<div class="card-footer">
					<button type="submit" name="add-event" class="btn btn-info">Submit</button>
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
								<th>Organizer</th>
								<th>Judge</th>
								<th>Location</th>
								<th>Start</th>
								<th>End</th>
								<th>Fee</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$sql="SELECT * FROM events ORDER BY id DESC";
								$query=mysqli_query($connection, $sql);
								$count=0;

								while($row=mysqli_fetch_array($query)){
									$count++;
							?>
							<tr>
								<td><?php echo $count; ?></td>
								<td><?php echo $row['name']; ?></td>
								<td><?php echo getName($row['organizerId']); ?></td>
								<td><?php echo getName($row['judgeId']); ?></td>
								<td><?php echo $row['location']; ?></td>
								<td><?php echo $row['startDate']; ?></td>
								<td><?php echo $row['endDate']; ?></td>
								<td><?php echo $row['entryFee']; ?></td>
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