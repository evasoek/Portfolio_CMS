<div class="row">
	<div class="col-sm-6 col-sm-offset-3 auth">
		<div class="container-fluid">
			<?= $this->Flash->render('auth') ?>
			<?= $this->Form->create() ?>
				<h1><?= __('Please enter your username and password') ?></h1>
				<?= $this->Form->input('username') ?>
				<?= $this->Form->input('password') ?>
				<?= $this->Form->button(__('Login')); ?>
			<?= $this->Form->end() ?>
		</div>
	</div>
</div>