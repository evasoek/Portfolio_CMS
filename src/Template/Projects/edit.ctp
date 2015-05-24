<div class="row">
	<div class="col-sm-12 well">
		<?= $this->Form->create($project) ?>
			<h1><?= __('Edit project') ?></h1>
			<?= $this->Form->input('name') ?>
			<?= $this->Form->input('description', ['type' => 'textarea']) ?>
			<?= $this->Form->button(__('Submit')); ?>
		<?= $this->Form->end() ?>
	</div>
</div>