<div class="row">
    <div class="col-sm-12 well">
	    <h1><?= __('Edit project') ?></h1>
	    <?= '<div class="input">
	        	<label for="image">Current project image</label>
				<div class="thumbnail">
                	'. $image .'
                	<div class="caption">
						<span class="actions">
							' . $this->Form->PostLink('Delete', ['controller' => 'Projects', 'action' => 'delete_image', $project->id], ['class' => 'btn btn-xs btn-danger']) . '<hr>
						'. $this->Form->create($project, ['type' => 'file']) .'
						'. $this->Form->input('upload an image', ['type' => 'file']) .'
						'. $this->Form->button(__('Save image')) .'
						'. $this->Form->end() .'
						</span>
					</div>
				</div>
			</div>' ?>
        <?= $this->Form->create($project) ?>
        <?= $this->Form->input('name') ?>
        <?= $this->Form->input('description', ['type' => 'textarea']); ?>
		<?= $this->Form->button(__('Save')); ?>
        <?= $this->Form->end() ?>
    </div>
</div>

<!-- http://theheightsanimalhospital.com/clients/15389/images/playful-kitten-6683.jpg -->