<div class="row">
	<div class="col-sm-12 well">
		<?= $this->Form->create($project) ?>
			<h1><?= __('Add a project') ?></h1>
			<?= $this->Form->input('name') ?>
			<?= $this->Form->input('description', ['type' => 'textarea']) ?>
                        <?= $this->Form->input('imageURL', ['label' => 'Profile picture URL']) ?>
			<?= $this->Form->hidden('userID', ['value' => $admin]); ?>
			<?= $this->Form->button(__('Save')); ?>
		<?= $this->Form->end() ?>
	</div>
</div>