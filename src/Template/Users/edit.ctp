<div class="row">
	<div class="col-sm-6 col-sm-offset-3 well">
		<div class="container-fluid">
			<?= $this->Form->create($user) ?>
				<h1><?= __('Edit User') ?></h1>
				<?= $this->Form->input('username') ?>
				<?= $this->Form->input('password') ?>
                                <?= $this->Form->input('firstname', ['label' => 'First name']) ?>
				<?= $this->Form->input('lastname', ['label' => 'Last name']) ?>
                                <?= $this->Form->input('bio', ['label' => 'Bio']) ?>
				<?= $this->Form->button(__('Save')); ?>
			<?= $this->Form->end() ?>
		</div>
	</div>
</div>