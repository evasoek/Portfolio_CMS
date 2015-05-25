<div class="row">
    <div class="col-sm-6 col-sm-offset-3 well">
        <div class="container-fluid">
            <?= $this->Form->create($user) ?>
            <h1><?= __('Edit User') ?></h1>
            <?= $this->Form->input('username') ?>
            <?= $this->Form->input('password') ?>
            <?= $this->Form->input('firstname', ['label' => 'First name']) ?>
            <?= $this->Form->input('lastname', ['label' => 'Last name']) ?>
            <?= $this->Form->input('bio', ['type' => 'textarea', 'label' => 'Bio']) ?>
            <?= $this->Form->input('imageURL', ['label' => 'Profile picture URL']) ?>
            <?= $this->Form->create($image, ['type' => 'file']); ?>
            <strong>Or upload a picture:</strong>
            <?= $this->Form->file('submittedfile'); ?>
            <?= $this->Form->button(__('Submit')); ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
