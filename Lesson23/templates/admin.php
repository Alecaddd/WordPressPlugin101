<div class="wrap">
	<h1>Alecaddd Plugin</h1>
	<?php settings_errors(); ?>

	<ul class="nav nav-tabs">
		<li class="active"><a href="#tab-1">Manage Settings</a></li>
		<li><a href="#tab-2">Updates</a></li>
		<li><a href="#tab-3">About</a></li>
	</ul>

	<div class="tab-content">
		<div id="tab-1" class="tab-pane active">

			<form method="post" action="options.php">
				<?php 
					settings_fields( 'alecaddd_plugin_settings' );
					do_settings_sections( 'alecaddd_plugin' );
					submit_button();
				?>
			</form>
			
		</div>

		<div id="tab-2" class="tab-pane">
			<h3>Updates</h3>
		</div>

		<div id="tab-3" class="tab-pane">
			<h3>About</h3>
		</div>
	</div>
</div>