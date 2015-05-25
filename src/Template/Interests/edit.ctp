<div class="row">
	<div class="col-sm-12 well">
		<?= $this->Form->create($interest) ?>
			<h1><?= __('Edit interesse') ?></h1>
			<?= $this->Form->input('name') ?>
			<?= $this->Form->input('description', ['type' => 'textarea']) ?>
			<?= $this->Form->button(__('Submit')); ?>
		<?= $this->Form->end() ?>
	</div>
</div>