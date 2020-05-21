<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="A layout example that shows off a responsive product landing page.">
		<title>Landing Page &ndash; Layout Examples &ndash; Pure</title>
		<link rel="stylesheet" href="https://unpkg.com/purecss@2.0.3/build/pure-min.css" integrity="sha384-cg6SkqEOCV1NbJoCu11+bm0NvBRc8IYLRGXkmNrqUBfTjmMYwNKPWBTIKyw9mHNJ" crossorigin="anonymous">
		<link rel="stylesheet" href="https://unpkg.com/purecss@2.0.3/build/grids-responsive-min.css">
		<link rel="stylesheet" href="<?php echo get_site_url() . '/wp-content/plugins/' . $this->plugin_name . '/public/css/maintenance-mode.css'; ?>">
		<style>

		</style>
	</head>
	<body>
		<div class="splash-container">
			<div class="splash">
				<h1 class="splash-head">Big Bold Text</h1>
				<p class="splash-subhead">
					Lorem ipsum dolor sit amet, consectetur adipisicing elit.
				</p>
				<p>
					<a href="http://purecss.io" class="pure-button pure-button-primary">Get Started</a>
				</p>
			</div>
		</div>
	</body>
</html>
