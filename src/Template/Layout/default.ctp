<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<!DOCTYPE html>
<html>
<head>
	<?= $this->Html->charset() ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>
	    <?= $this->fetch('title') ?>
	</title>
	<?= $this->Html->meta('icon') ?>
	
	<?= $this->Html->css('style.css') ?>
	<?= $this->Html->css('bootstrap.css') ?>
	
	<?= $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js') ?>
	<?= $this->Html->script('bootstrap.js') ?>
	<?= $this->Html->script('npm.js') ?>
	<?= $this->Html->script('classes.js') ?>
	
	<?= $this->fetch('meta') ?>
	<?= $this->fetch('css') ?>
	<?= $this->fetch('script') ?>
</head>
<body>
	<!-- Fixed navbar -->
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</button>
				<?php echo $this->Html->link('CMS', ['controller' => 'Pages', 'action' => 'home'], ['class' => 'navbar-brand']); ?>
			</div>
			<div id="navbar" class="collapse navbar-collapse">
				<ul class="nav navbar-nav navbar-right">
					<li><?php echo $this->Html->link('Login', ['controller' => 'Users', 'action' => 'login']); ?></li>
					<li><?php echo $this->Html->link('Register', ['controller' => 'Users', 'action' => 'register']); ?></li>
				</ul>
			</div>
		</div>
	</nav>
	
	<!-- Begin page content -->
	<div class="container">
		<?= $this->Flash->render() ?>
		<?= $this->fetch('content') ?>
	</div>
	
	<footer class="footer">
		<div class="container">
			<p class="text-muted">CMS INF-I Practicum</p>
		</div>
	</footer>
</body>
</html>
