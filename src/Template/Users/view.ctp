<div class="row">
    <div class="col-sm-12">
        <h1><?php echo 'Portfolio of user: ' . $user['username'] ?> </h1>
        <div class="well">
            <h2>Basic user information</h2>
            <?php echo '<strong>First name:</strong> ' . $user['firstname']; ?> <br>
            <?php echo '<strong>Last name:</strong> ' . $user['lastname']; ?> <br>    
            <?php echo '<strong>Bio:</strong> ' . $user['bio']; ?> <br>
        </div>

        <div class="well">
            <h2>Interests:</h2>
            <?php
            foreach ($user['interests'] as $interest) {
                echo '<strong>' . $interest->name . '</strong>: ' . $interest->description .'<br>';
            }
            ?>
        </div>

        <div class="well">
            <h2>Skills:</h2>
            <?php
            foreach ($user['skills'] as $skill) {
                echo '<strong>' . $skill->name . ' (' . $skill->level . ')</strong>: ' . $skill->description .'<br>';
            }
            ?>
        </div>

        <div class="well">
            <h2>Projects:</h2>
            <?php
            foreach ($user['projects'] as $project) {
	            echo '
				<div class="col-sm-6 col-md-4">
					<div class="thumbnail">
						<img src="'. $project->imageURL .'" alt="'. $project->name .'">
						<div class="caption">
							<h3>'. $project->name .'</h3>
							'. $project->description .'
						</div>
					</div>
				</div>';
            }
            ?>
        </div>

        <div class="well">
            <h2>Social Links:</h2>
            <?php
            foreach ($user['social_links'] as $socialLink) {
                echo '<strong><a href="' . $socialLink->url . '">' . $socialLink->name . '</a></strong><br>';
            }
            ?>
        </div>
    </div>
</div>