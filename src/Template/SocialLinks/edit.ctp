<div class="row">
	<div class="col-sm-6 col-sm-offset-3 well">
		<div class="container-fluid">
			<?= $this->Form->create($social) ?>
				<h1><?= __('Edit social media link') ?></h1>
				<?= $this->Form->input('name') ?>
				<?= $this->Form->input('url') ?>
				<?= $this->Form->button(__('Save')); ?>
			<?= $this->Form->end() ?>
		</div>
	</div>
</div>