<div class="row">
	<div class="col-sm-12 well">
		<?= $this->Form->create($skill) ?>
			<h1><?= __('Voeg een skill toe') ?></h1>
			<?= $this->Form->input('name') ?>
			<?= $this->Form->input('level') ?>
			<?= $this->Form->input('description', ['type' => 'textarea']) ?>
			<?= $this->Form->hidden('userID', ['value' => $admin]); ?>
			<?= $this->Form->button(__('Submit')); ?>
		<?= $this->Form->end() ?>
	</div>
</div>