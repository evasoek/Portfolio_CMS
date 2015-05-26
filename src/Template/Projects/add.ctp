<div class="row">
	<div class="col-sm-12 well">
		<h1><?= __('Add a project') ?></h1>
		<?= $this->Form->create($project, ['type' => 'file']) ?>
			<?= $this->Form->input('upload an image', ['type' => 'file']) ?>
			<?= $this->Form->button('Save image', array('class' => 'btn btn-xs btn-info')) ?>
		<?= $this->Form->end() ?>
		
		<?= $this->Form->create($project) ?>
			<?= $this->Form->input('imageURL', ['label' => 'Insert from URL']) ?>
		<?= $this->Form->end() ?>
		
		<hr>
		
		<?= $this->Form->create($project) ?>
			<?= $this->Form->input('name') ?>
			<?= $this->Form->input('description', ['type' => 'textarea']) ?>
			<?= $this->Form->hidden('userID', ['value' => $admin]); ?>
			<?= $this->Form->button('Submit'); ?>
		<?= $this->Form->end() ?>
	</div>
</div>