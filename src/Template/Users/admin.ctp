<div class="row">
	<div class="col-sm-4 sidebar">
		<h1>Admin page</h1>
		<div class="well">
			<?php echo 'Hi, '. $authUser['firstname'] .' '. $authUser['lastname']. '!'; ?>
		</div>
		
		<h2>Menu</h2>
		<ul class="menu">
			<li><?php echo $this->Html->link('Add portfolio Item', ['controller' => 'Portfolio', 'action' => 'add']); ?></li>
			<li><?php echo $this->Html->link('Edit profile', ['controller' => 'Users', 'action' => 'edit']); ?></li>
			<li><?php echo $this->Html->link('Delete account', ['controller' => 'Users', 'action' => 'delete']); ?></li>
		</ul>
	</div>
	<div class="col-sm-8 content">
		<?php echo 'vardumpje van user variabele. Hieruit moeten de geassocieerde projecten worden opgehaald <br>: '; var_dump($user); ?>
	</div>
</div>