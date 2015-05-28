<div class="row">
    <div class="col-sm-12 well">
	    <h1><?= __('Edit project') ?></h1>
	    <?= $image; ?>
        <?= $this->Form->create($project, ['type' => 'file']) ?>
	        <?= $this->Form->input('name') ?>
	        <?= $this->Form->input('description', ['type' => 'textarea']); ?>
	        <?= $this->Form->input('upload an image', ['type' => 'file']) ?>
			<?= $this->Form->button(__('Save')); ?>
        <?= $this->Form->end() ?>
    </div>
</div>

<!-- http://theheightsanimalhospital.com/clients/15389/images/playful-kitten-6683.jpg -->