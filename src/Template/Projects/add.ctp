<div class="row">
    <div class="col-sm-12 well">
        <h1><?= __('Add a project') ?></h1>
        <?= $this->Form->create($project, ['type' => 'file']) ?>
        <?= $this->Form->input('name') ?>
        <?= $this->Form->input('description', ['type' => 'textarea']) ?>
        <?= $this->Form->input('upload an image', ['type' => 'file']) ?>
        <?= $this->Form->hidden('userID', ['value' => $admin]); ?>
        <?= $this->Form->button('Submit'); ?>
        <?= $this->Form->end() ?>
    </div>
</div>