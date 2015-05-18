<div class="row">
	<div class="col-sm-12">
		<div class="container-fluid">
			<h1>Choose a user</h1>
			<select>
				<?php
					foreach ($users as $user) {
						echo '<option value="'. $user->username .'">'. $user->username .'</option>';
					}
				?>
			</select>
		</div>
	</div>
</div>