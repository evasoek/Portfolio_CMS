<div class="row">
    <div class="col-sm-4 sidebar">
        <h1>Admin page</h1>
        <div class="well">
            <?php echo 'Hi, ' . $admin['firstname'] . ' ' . $admin['lastname'] . '!'; ?>
        </div>

        <h2>Account</h2>
        <ul class="menu">
            <li><?php echo $this->Html->link('Delete account', ['controller' => 'Users', 'action' => 'delete']); ?></li>
        </ul>
    </div>
    <div class="col-sm-8 content">
        <div class="well">
	        <?php echo $this->Html->link('Edit', ['controller' => 'Users', 'action' => 'edit', $admin['id']], ['class' => 'btn btn-xs btn-info pull-right']); ?>
            <h2>Basic user information</h2>
            <BR>
            <?php echo '<strong>First name:</strong> ' . $admin['firstname']; ?> <br>
            <?php echo '<strong>Last name:</strong> ' . $admin['lastname']; ?> <br>    
            <?php echo '<strong>Bio:</strong> ' . $admin['bio']; ?> <br>
        </div>

        <div class="well">
	        <?php echo $this->Html->link('Add', ['controller' => 'Interests', 'action' => 'add'], ['class' => 'btn btn-xs btn-success pull-right']); ?>
            <h2>Interests:</h2>
            <BR>
            <?php
            foreach ($admin['interests'] as $interest) {
                echo '<strong>' . $interest->name . '</strong>: ' . $interest->description . "  ";
                echo $this->Html->link('Edit', ['controller' => 'Interests', 'action' => 'edit']);
                echo " - ";
                echo $this->Html->link('Delete', ['controller' => 'Interests', 'action' => 'delete']);
            }
            ?>
        </div>

        <div class="well">
	        <?php echo $this->Html->link('Add', ['controller' => 'Skills', 'action' => 'add'], ['class' => 'btn btn-xs btn-success pull-right']); ?>
            <h2>Skills:</h2>
            <BR>
            <?php
            foreach ($admin['skills'] as $skill) {
                echo '<strong>' . $skill->name . ' (' . $skill->level . ')</strong>: ' . $skill->description . "    ";
                echo $this->Html->link('Edit', ['controller' => 'Skills', 'action' => 'edit']);
                echo " - ";
                echo $this->Html->link('Delete', ['controller' => 'Skills', 'action' => 'delete']);
            }
            ?>
        </div>

        <div class="well">
	        <?php echo $this->Html->link('Add', ['controller' => 'Projects', 'action' => 'add'], ['class' => 'btn btn-xs btn-success pull-right']); ?>
            <h2>Projects:</h2>
            <BR>
            <?php
            foreach ($admin['projects'] as $project) {
                echo '<img src="' . $project->imageURL . '" alt="Project image" style="width:300px;height:200px"> <BR>';
                echo '<strong>' . $project->name . '</strong>: ' . $project->description . "    ";
                echo $this->Html->link('Edit', ['controller' => 'Projects', 'action' => 'edit', $project->id]);
                echo " - ";
                echo $this->Html->link('Delete', ['controller' => 'Projects', 'action' => 'delete']);
            }
            ?>
        </div>

        <div class="well">
	        <?php echo $this->Html->link('Add', ['controller' => 'SocialLinks', 'action' => 'add'], ['class' => 'btn btn-xs btn-success pull-right']); ?>
            <h2>Social Links:</h2>
            <BR>
            <?php
            foreach ($admin['social_links'] as $socialLink) {
                echo '<strong><a href="' . $socialLink->url . '">' . $socialLink->name . '</a></strong>    ';
                echo $this->Html->link('Edit', ['controller' => 'SocialLinks', 'action' => 'edit']);
                echo " - ";
                echo $this->Html->link('Delete', ['controller' => 'SocialLinks', 'action' => 'delete']);
            }
            ?>
        </div>
    </div>
</div>