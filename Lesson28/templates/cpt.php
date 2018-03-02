<div class="wrap">
	<h1>CPT Manager</h1>
	<?php settings_errors(); ?>

	<ul class="nav nav-tabs">
		<li class="active"><a href="#tab-1">Your Custom Post Types</a></li>
		<li><a href="#tab-2">Add Custom Post Type</a></li>
		<li><a href="#tab-3">Export</a></li>
	</ul>

	<div class="tab-content">
		<div id="tab-1" class="tab-pane active">

			<h3>Manage Your Custom Post Types</h3>

			<?php 
				$options = get_option('alecaddd_plugin_cpt');

				echo '<table class="cpt-table"><tr><th>ID</th><th>Singular Name</th><th>Plural Name</th><th class="text-center">Public</th><th class="text-center">Archive</th><th class="text-center">Actions</th></tr>';

				foreach ($options as $option) {
					echo "<tr><td>{$option['post_type']}</td><td>{$option['singular_name']}</td><td>{$option['plural_name']}</td><td class=\"text-center\">{$option['public']}</td><td class=\"text-center\">{$option['has_archive']}</td><td class=\"text-center\"><a href=\"#\">EDIT</a> - <a href=\"#\">DELETE</a></td></tr>";
				}

				echo '</table>';
			?>
			
		</div>

		<div id="tab-2" class="tab-pane">
			<form method="post" action="options.php">
				<?php 
					settings_fields( 'alecaddd_plugin_cpt_settings' );
					do_settings_sections( 'alecaddd_cpt' );
					submit_button();
				?>
			</form>
		</div>

		<div id="tab-3" class="tab-pane">
			<h3>Export Your Custom Post Types</h3>
		</div>
	</div>
</div>