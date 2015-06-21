<div class="row">
    <div class="col-sm-12 well">
        <h1><?= __('Edit project') ?></h1>
        <div class="col-sm-6">
            <div class="thumbnail">
                <?= $image; ?>
                <div class="caption">
                    <?= $this->Form->PostLink('Delete', ['controller' => 'Projects', 'action' => 'delete_image', $project->id], ['class' => 'btn btn-xs btn-danger']) ?>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <?= $this->Form->create($project, ['type' => 'file']) ?>
            <?= $this->Form->input('upload an image', ['type' => 'file']) ?>
            <?= $this->Form->input('name') ?>
            <?= $this->Form->input('description', ['type' => 'textarea']); ?>
            <?= $this->Form->button(__('Save')); ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>