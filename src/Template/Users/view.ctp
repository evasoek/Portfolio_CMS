<div class="row">
    <div class="col-sm-12">
        <h1><?php echo 'Portfolio of user: ' . $user['username'] ?> </h1>
        <div class="well">
            <h2>Basic user information</h2>
            <?php echo '<strong>Firstname:</strong> ' . $user['firstname']; ?> <br>
            <?php echo '<strong>Lasttname:</strong> ' . $user['lastname']; ?> <br>    
            <?php echo '<strong>Bio:</strong> ' . $user['bio']; ?> <br>
        </div>
        
        <div class="well">
            <h2>Interests:</h2>
            <?php 
	            foreach ($user['interests'] as $interest) {
		            echo $interest->name .': '. $interest->description;
	            } 
	        ?>
        </div>
        
        <div class="well">
            <h2>Skills:</h2>
            <!--Write code-->
        </div>
        
        <div class="well">
            <h2>Social Links:</h2>
            <!--Write code-->
        </div>
    </div>
</div>