<div class="row">
	<div class="col-sm-6 col-sm-offset-3 well">
		<div class="container-fluid">
			<?= $this->Flash->render('auth') ?>
			<?= $this->Form->create() ?>
				<h1><?= __('Login') ?></h1>
				<p>Please enter your username and password</p>
				<?= $this->Form->input('username') ?>
				<?= $this->Form->input('password') ?>
				<?= $this->Form->button(__('Login')); ?>
			<?= $this->Form->end() ?>
		</div>
	</div>
</div>