<div class="row">
	<div class="col-sm-6 col-sm-offset-3 well">
		<div class="container-fluid">
			<h1><?= __('Register User') ?></h1>
			<?= $this->Form->create($user, ['type' => 'file']) ?>
				<?= $this->Form->input('upload an image', ['type' => 'file']) ?>
	            <hr>
				<?= $this->Form->input('username') ?>
				<?= $this->Form->input('password') ?>
                                <?= $this->Form->input('firstname', ['label' => 'First name']) ?>
				<?= $this->Form->input('lastname', ['label' => 'Last name']) ?>
				<?= $this->Form->button(__('Submit')); ?>
			<?= $this->Form->end() ?>
		</div>
	</div>
</div>