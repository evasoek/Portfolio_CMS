<div class="row">
	<div class="col-sm-12">
		<div class="container-fluid">
			<h1>Choose a user</h1>
			<?php 
				echo $this->Form->select('user', $users); 
			?>
		</div>
	</div>
</div>