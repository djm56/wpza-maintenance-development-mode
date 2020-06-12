<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$wpdm = get_exopite_sof_option('wpza-maintenance-development-mode');
//print_r('<pre>');
//print_r($my_options);
//print_r('</pre>');
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
			body {
				<?php echo 'background-color: ', (!empty($wpdm['background_color']) ? $wpdm['background_color'] : '#1f8dd6'); ?>
				<?php
				if (!empty($wpdm['typography_1'])) {
					echo (!empty($wpdm['typography_1']['family']) ? 'font-family: ' . $wpdm['typography_1']['family'] . ';' : '');
					echo (!empty($wpdm['typography_1']['size']) ? 'font-size: ' . $wpdm['typography_1']['size'] . 'px;' : '');
					echo (!empty($wpdm['typography_1']['height']) ? 'line-height: ' . $wpdm['typography_1']['height'] . 'px;' : '');
					echo (!empty($wpdm['typography_1']['color']) ? 'color: ' . $wpdm['typography_1']['color'] . ';' : '');
				}
				?>
			}
			.splash-container {
				<?php echo 'background-color: ', (!empty($wpdm['background_color']) ? $wpdm['background_color'] : '#1f8dd6'); ?>
			}
		</style>
	</head>
	<body>
		<div class="splash-container">
			<div class="splash">
				<?php
//				print_r('<pre>');
//				print_r($wpdm);
//				print_r('</pre>');

				echo (!empty($wpdm['editor_content']) ? $wpdm['editor_content'] : '');
				?>
			</div>
		</div>
	</body>
</html>
