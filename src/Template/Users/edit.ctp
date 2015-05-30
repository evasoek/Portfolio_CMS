<div class="row">
    <div class="col-sm-12 well">
        <div class="container-fluid">
            <h1><?= __('Edit User') ?></h1>

			<div class="col-sm-6">
				<div class="thumbnail">
					<?= $image; ?>
					<div class="caption">
						<?= $this->Form->PostLink('Delete', ['controller' => 'Users', 'action' => 'delete_image', $user->id], ['class' => 'btn btn-xs btn-danger']) ?>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<?= $this->Form->create($user, ['type' => 'file']) ?>
			        <?= $this->Form->input('upload an image', ['type' => 'file']) ?>
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
</div>
