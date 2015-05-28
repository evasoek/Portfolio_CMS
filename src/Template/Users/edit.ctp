<div class="row">
    <div class="col-sm-12 well">
        <div class="container-fluid">
            <h1><?= __('Edit User') ?></h1>

			<?= $image; ?>
            <?= $this->Form->create($user, ['type' => 'file']) ?>
            <?= $this->Form->input('upload an image', ['type' => 'file']) ?>
            <hr>
            <?= $this->Form->input('username') ?>
            <?= $this->Form->input('password') ?>
            <?= $this->Form->input('firstname', ['label' => 'First name']) ?>
            <?= $this->Form->input('lastname', ['label' => 'Last name']) ?>
            <?= $this->Form->input('bio', ['type' => 'textarea', 'label' => 'Bio']) ?>
            <?= $this->Form->button(__('Save')); ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
