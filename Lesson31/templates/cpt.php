<div class="wrap">
	<h1>CPT Manager</h1>
	<?php settings_errors(); ?>

	<ul class="nav nav-tabs">
		<li class="<?php echo !isset($_POST["edit_post"]) ? 'active' : '' ?>"><a href="#tab-1">Your Custom Post Types</a></li>
		<li class="<?php echo isset($_POST["edit_post"]) ? 'active' : '' ?>">
			<a href="#tab-2">
				<?php echo isset($_POST["edit_post"]) ? 'Edit' : 'Add' ?> Custom Post Type
			</a>
		</li>
		<li><a href="#tab-3">Export</a></li>
	</ul>

	<div class="tab-content">
		<div id="tab-1" class="tab-pane <?php echo !isset($_POST["edit_post"]) ? 'active' : '' ?>">

			<h3>Manage Your Custom Post Types</h3>

			<?php 
				$options = get_option( 'alecaddd_plugin_cpt' ) ?: array();

				echo '<table class="cpt-table"><tr><th>ID</th><th>Singular Name</th><th>Plural Name</th><th class="text-center">Public</th><th class="text-center">Archive</th><th class="text-center">Actions</th></tr>';

				foreach ($options as $option) {
					$public = isset($option['public']) ? "TRUE" : "FALSE";
					$archive = isset($option['has_archive']) ? "TRUE" : "FALSE";

					echo "<tr><td>{$option['post_type']}</td><td>{$option['singular_name']}</td><td>{$option['plural_name']}</td><td class=\"text-center\">{$public}</td><td class=\"text-center\">{$archive}</td><td class=\"text-center\">";

					echo '<form method="post" action="" class="inline-block">';
					echo '<input type="hidden" name="edit_post" value="' . $option['post_type'] . '">';
					submit_button( 'Edit', 'primary small', 'submit', false);
					echo '</form> ';

					echo '<form method="post" action="options.php" class="inline-block">';
					settings_fields( 'alecaddd_plugin_cpt_settings' );
					echo '<input type="hidden" name="remove" value="' . $option['post_type'] . '">';
					submit_button( 'Delete', 'delete small', 'submit', false, array(
						'onclick' => 'return confirm("Are you sure you want to delete this Custom Post Type? The data associated with it will not be deleted.");'
					));
					echo '</form></td></tr>';
				}

				echo '</table>';
			?>
			
		</div>

		<div id="tab-2" class="tab-pane <?php echo isset($_POST["edit_post"]) ? 'active' : '' ?>">
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