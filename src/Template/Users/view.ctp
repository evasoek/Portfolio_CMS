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
		            echo '<strong>'. $interest->name .'</strong>: '. $interest->description;
	            } 
	        ?>
        </div>
        
        <div class="well">
            <h2>Skills:</h2>
            <?php 
	            foreach ($user['skills'] as $skill) {
		            echo '<strong>'. $skill->name .' ('. $skill->level .')</strong>: '. $skill->description;
	            } 
	        ?>
        </div>
        
        <div class="well">
            <h2>Social Links:</h2>
            <?php 
	            foreach ($user['social_links'] as $socialLink) {
		            echo '<strong>'. $socialLink->name .'</strong>: '. $socialLink->url;
	            } 
	        ?>
        </div>
    </div>
</div>