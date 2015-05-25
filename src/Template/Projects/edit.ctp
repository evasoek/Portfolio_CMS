<div class="row">
    <div class="col-sm-12 well">
        <?= $this->Form->create($project) ?>
        <h1><?= __('Edit project') ?></h1>
        <?= $this->Form->input('name') ?>
        <?= $this->Form->input('description', ['type' => 'textarea']) ?>
        <?= $this->Form->input('imageURL', ['label' => 'Project picture URL']) ?>
        <?= $this->Form->create($image, ['type' => 'file']); ?>
        <strong>Or upload a picture:</strong>
        <?= $this->Form->file('submittedfile'); ?>
        <?= $this->Form->button(__('Save')); ?>
        <?= $this->Form->end() ?>
    </div>
</div>
