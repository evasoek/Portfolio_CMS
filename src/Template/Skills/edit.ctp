<div class="row">
    <div class="col-sm-12 well">
        <?= $this->Form->create($skill) ?>
        <h1><?= __('Edit skill') ?></h1>
        <?= $this->Form->input('name') ?>
        <?= $this->Form->input('level') ?>
        <?= $this->Form->input('description', ['type' => 'textarea']) ?>
        <?= $this->Form->button(__('Save')); ?>
        <?= $this->Form->end() ?>
    </div>
</div>