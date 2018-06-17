<form action="#" method="post" data-url="<?php echo admin_url('admin-ajax.php'); ?>">

	<div class="form-group">
		<input type="text" class="form-field" placeholder="Your Name" id="name" name="name" required>
		<small class="field-msg error">Your Name is Required</small>
	</div>

	<div class="form-group">
		<input type="email" class="form-field" placeholder="Your Email" id="email" name="email" required>
		<small class="field-msg error">Your Email is Required</small>
	</div>

	<div class="form-group">
		<textarea name="message" id="message" class="form-field" placeholder="Your Message" required></textarea>
		<small class="field-msg error">A Message is Required</small>
	</div>
	
	<div class="text-center">
		<div>
            <button type="stubmit" class="btn btn-default btn-lg btn-sunset-form">Submit</button>
        </div>
		<small class="field-msg js-form-submission">Submission in process, please wait&hellip;</small>
		<small class="field-msg success js-form-success">Message Successfully submitted, thank you!</small>
		<small class="field-msg error js-form-error">There was a problem with the Contact Form, please try again!</small>
	</div>

</form>