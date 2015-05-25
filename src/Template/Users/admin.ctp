<div class="row">

    <!-- sidebar -->
    <div class="col-sm-4 sidebar">
        <!-- admin -->
        <h1>Admin page</h1>
        <div class="well">
            <?php echo 'Hi, ' . $admin['firstname'] . ' ' . $admin['lastname'] . '!'; ?>
        </div>

        <!-- account -->
        <h2>Account</h2>
        <ul class="menu">
            <li><?php echo $this->Html->link('Edit Account', ['controller' => 'Users', 'action' => 'edit', $admin['id']]); ?></li>
            <li><?php echo $this->Form->PostLink('Delete account', ['controller' => 'Users', 'action' => 'delete', $admin['id']], ['confirm' => 'Are you sure you want to delete this account?']) ?></li>
        </ul>
    </div>

    <!-- content -->
    <div class="col-sm-8 content">
        <!-- user info -->
        <div class="well">
            <?php echo $this->Html->link('Edit', ['controller' => 'Users', 'action' => 'edit', $admin['id']], ['class' => 'btn btn-xs btn-info pull-right']); ?>
            <h2>Basic user information</h2>
            <div class="col-sm-6">
            	<div class="thumbnail">
					<?php echo $image ?>
            	</div>
            </div>
            <div class="col-sm-6">
            	<strong>First name:</strong> <?php echo $admin['firstname'] ?><br>
            	<strong>Last name:</strong> <?php echo $admin['lastname'] ?><br>
            	<strong>Bio:</strong> <?php echo $admin['bio'] ?>
            </div>
        </div>

        <!-- interests -->
        <div class="well">
            <?php echo $this->Html->link('Add', ['controller' => 'Interests', 'action' => 'add', $admin['id']], ['class' => 'btn btn-xs btn-success pull-right']); ?>
            <h2>Interests</h2>
            <?php
            foreach ($admin['interests'] as $interest) {
                echo '
                <div class="interest">
                	<strong>' . $interest->name . '</strong>: ' . $interest->description . '
					' . $this->Html->link('Edit', ['controller' => 'Interests', 'action' => 'edit', $interest->id]) . ' - 
					' . $this->Form->PostLink('Delete', ['controller' => 'Interests', 'action' => 'delete', $interest->id], ['confirm' => 'Weet je zeker dat je dit item wilt verwijderen?']) . '
				</div>';
            }
            ?>
        </div>

        <!-- skills -->
        <div class="well">
            <?php echo $this->Html->link('Add', ['controller' => 'Skills', 'action' => 'add', $admin['id']], ['class' => 'btn btn-xs btn-success pull-right']); ?>
            <h2>Skills</h2>
            <?php
            foreach ($admin['skills'] as $skill) {
                echo '
                	<div class="skill">
	                	<strong>' . $skill->name . ' (' . $skill->level . ')</strong>: ' . $skill->description . '
						' . $this->Html->link('Edit', ['controller' => 'Skills', 'action' => 'edit', $skill->id]) . ' - 
						' . $this->Form->PostLink('Delete', ['controller' => 'Skills', 'action' => 'delete', $skill->id], ['confirm' => 'Weet je zeker dat je dit item wilt verwijderen?']) . '
					</div>';
            }
            ?>
        </div>

        <!-- projects -->
        <div class="well">
            <?php echo $this->Html->link('Add', ['controller' => 'Projects', 'action' => 'add', $admin['id']], ['class' => 'btn btn-xs btn-success pull-right']); ?>
            <h2>Projects</h2>
            <?php
            foreach ($admin['projects'] as $project) {
                echo '
		            <div class="col-sm-6 col-md-4">
						<div class="thumbnail">';
                                                if ($project->imageURL) {
							echo '<img src="' . $project->imageURL . '" alt="' . $project->name . '">';
                                                } else {
                                                    echo '<img src="../../webroot/img/project.jpg" alt="No project picture set">';
                                                }
						echo '<div class="caption">
								<h3>' . $project->name . '</h3>
								' . $project->description . '
								<span class="actions">
									' . $this->Html->link('Edit', ['controller' => 'Projects', 'action' => 'edit', $project->id], ['class' => 'btn btn-xs btn-info']) . '
									' . $this->Form->PostLink('Delete', ['controller' => 'Projects', 'action' => 'delete', $project->id], ['class' => 'btn btn-xs btn-danger'], ['confirm' => 'Weet je zeker dat je dit project wilt verwijderen?']) . '
								</span>
							</div>
						</div>
					</div>';
            }
            ?>
        </div>

        <!-- social media -->
        <div class="well">
            <?php echo $this->Html->link('Add', ['controller' => 'SocialLinks', 'action' => 'add', $admin['id']], ['class' => 'btn btn-xs btn-success pull-right']); ?>
            <h2>Social Links</h2>
            <?php
            foreach ($admin['social_links'] as $socialLink) {
                echo '
                <div class="social-link">
	            	<strong><a href="' . $socialLink->url . '">' . $socialLink->name . '</a></strong>
					' . $this->Html->link('Edit', ['controller' => 'SocialLinks', 'action' => 'edit', $admin['id']]) . ' - 
					' . $this->Form->PostLink('Delete', ['controller' => 'SocialLinks', 'action' => 'delete', $socialLink->id], ['confirm' => 'Weet je zeker dat je dit item wilt verwijderen?']) . '
				</div>';
            }
            ?>
        </div>
    </div>
</div>