<div class="row">
	<div class="col-sm-12 well">
		<?= $this->Form->create($project) ?>
			<h1><?= __('Add a project') ?></h1>
			<?= $this->Form->input('name') ?>
			<?= $this->Form->input('description', ['type' => 'textarea']) ?>
                        <?= $this->Form->input('imageURL', ['label' => 'Project picture URL']) ?>
			<?= $this->Form->hidden('userID', ['value' => $admin]); ?>
			<?= $this->Form->button(__('Submit')); ?>
		<?= $this->Form->end() ?>
	</div>
</div>