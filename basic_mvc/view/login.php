<?php ob_start(); ?>

<div class="container-fluid" style="background-color: lightgrey;">
	<section class="container">
		<div class="row">
			<div class="col-lg-offset-8" style="padding:10px">
				<div style="border: 2px solid black; padding: 0 10px 10px;">
					<h3><strong>Login</strong></h3>
					<form method="POST">
						<label>Username</label>
						<input type="text" name="username" class="form-control">
						<label>Password</label>
						<input type="password" name="password" class="form-control"><br>
						<input type="submit" name="submit_login" class="btn btn-success form-control" value="Login"></input>
					</form>
				</div>
			</div>
		</div>
	</section>
</div>

<?php $content = ob_get_clean(); ?>


