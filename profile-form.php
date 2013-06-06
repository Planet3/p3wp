<?php
/**
 * Template for displaying the user profile.
 * Used with the Theme My Login plugin: http://wordpress.org/plugins/theme-my-login/
 *
 * @package Planet3.0
 * @since Planet3.0 3.0
 */
?>
<div class="login profile" id="theme-my-login<?php $template->the_instance(); ?>">
	<?php $template->the_action_template_message( 'profile' ); ?>
	<?php $template->the_errors(); ?>
	<form id="your-profile" action="<?php $template->the_action_url( 'profile' ); ?>" method="post">

		<?php wp_nonce_field( 'update-user_' . $current_user->ID ); ?>
		<p>
			<input type="hidden" name="from" value="profile" />
			<input type="hidden" name="checkuser_id" value="<?php echo $current_user->ID; ?>" />
		</p>

		<div class="row">

			<div class="large-6 push-6 columns">
				<h3>Your Avatar</h3>
				<p>Planet3.0 uses the <a href="http://en.gravatar.com/">Gravitar</a> service to display a user avatar.</p>
				<?php echo get_avatar( get_the_author_meta( 'user_email' ), 512, $default, get_the_author() ); ?>
				<p><br />Edit your Avatar <a href="http://en.gravatar.com/emails/">here</a></p>
				<hr class="show-for-small" />
			</div><!-- large-6 push-6 -->

			<div class="large-6 pull-6 columns">
				<h3>Name</h3>

				<table class="form-table">
				<tr>
					<th><label for="user_login">Username</label></th>
					<td><input type="text" name="user_login" id="user_login" value="<?php echo esc_attr( $profileuser->user_login ); ?>" disabled="disabled" class="regular-text" /> <span class="description">Your username cannot be changed.</span></td>
				</tr>

				<tr>
					<th><label for="first_name">First Name</label></th>
					<td><input type="text" name="first_name" id="first_name" value="<?php echo esc_attr( $profileuser->first_name ); ?>" class="regular-text" /></td>
				</tr>

				<tr>
					<th><label for="last_name">Last Name</label></th>
					<td><input type="text" name="last_name" id="last_name" value="<?php echo esc_attr( $profileuser->last_name ); ?>" class="regular-text" /></td>
				</tr>

				<tr>
					<th><label for="nickname">Nickname <span class="description">required</span></label></th>
					<td><input type="text" name="nickname" id="nickname" value="<?php echo esc_attr( $profileuser->nickname ); ?>" class="regular-text" /></td>
				</tr>

				<tr>
					<th><label for="display_name">Display name publicly as</label></th>
					<td>
						<select name="display_name" id="display_name">
						<?php
							$public_display = array();
							$public_display['display_nickname']  = $profileuser->nickname;
							$public_display['display_username']  = $profileuser->user_login;

							if ( ! empty( $profileuser->first_name ) )
								$public_display['display_firstname'] = $profileuser->first_name;

							if ( ! empty( $profileuser->last_name ) )
								$public_display['display_lastname'] = $profileuser->last_name;

							if ( ! empty( $profileuser->first_name ) && ! empty( $profileuser->last_name ) ) {
								$public_display['display_firstlast'] = $profileuser->first_name . ' ' . $profileuser->last_name;
								$public_display['display_lastfirst'] = $profileuser->last_name . ' ' . $profileuser->first_name;
							}

							if ( ! in_array( $profileuser->display_name, $public_display ) )// Only add this if it isn't duplicated elsewhere
								$public_display = array( 'display_displayname' => $profileuser->display_name ) + $public_display;

							$public_display = array_map( 'trim', $public_display );
							$public_display = array_unique( $public_display );

							foreach ( $public_display as $id => $item ) {
						?>
							<option <?php selected( $profileuser->display_name, $item ); ?>><?php echo $item; ?></option>
						<?php
							}
						?>
						</select>
					</td>
				</tr>
				</table>

				<h3>Contact Info</h3>

				<table class="form-table">
				<tr>
					<th><label for="email">E-mail <span class="description">required</span></label></th>
					<td><input type="text" name="email" id="email" value="<?php echo esc_attr( $profileuser->user_email ); ?>" class="regular-text" /></td>
				</tr>

				<tr>
					<th><label for="url">Website</label></th>
					<td><input type="text" name="url" id="url" value="<?php echo esc_attr( $profileuser->user_url ); ?>" class="regular-text code" /></td>
				</tr>

				<?php
					foreach ( _wp_get_user_contactmethods() as $name => $desc ) {
				?>
				<tr>
					<th><label for="<?php echo $name; ?>"><?php echo apply_filters( 'user_'.$name.'_label', $desc ); ?></label></th>
					<td><input type="text" name="<?php echo $name; ?>" id="<?php echo $name; ?>" value="<?php echo esc_attr( $profileuser->$name ); ?>" class="regular-text" /></td>
				</tr>
				<?php
					}
				?>
			</div><!-- large-6 pull-6 -->

			</table>
		</div><!-- .row -->

		<h3>About Yourself</h3>

		<table class="form-table">
		<tr>
			<th><label for="description">Biographical Info</label></th>
			<td><textarea name="description" id="description" rows="10" cols="30"><?php echo esc_html( $profileuser->description ); ?></textarea><br />
			<span class="description">Share a little biographical information to fill out your profile.</span></td>
		</tr>

		<?php
		$show_password_fields = apply_filters( 'show_password_fields', true, $profileuser );
		if ( $show_password_fields ) :
		?>
		<tr id="password">
			<th><label for="pass1">New Password</label></th>
			<td><input type="password" name="pass1" id="pass1" size="16" value="" autocomplete="off" /> <span class="description">If you would like to change the password type a new one. Otherwise leave this blank.</span><br />
				<input type="password" name="pass2" id="pass2" size="16" value="" autocomplete="off" /> <span class="description">Type your new password again.</span><br />
				<!--<div id="pass-strength-result">Strength indicator</div>-->
				<p class="description indicator-hint">Hint: The password should be at least seven characters long. To make it stronger, use upper and lower case letters, numbers and symbols like ! " ? $ % ^ &amp; ).</p>
			</td>
		</tr>
		<?php endif; ?>
		</table>

		<?php do_action( 'show_user_profile', $profileuser ); ?>

		<p class="submit">
			<input type="hidden" name="action" value="profile" />
			<input type="hidden" name="instance" value="<?php $template->the_instance(); ?>" />
			<input type="hidden" name="user_id" id="user_id" value="<?php echo esc_attr( $current_user->ID ); ?>" />
			<input class="hide" name="admin_bar_front" type="checkbox" id="admin_bar_front" value="1" checked />
			<input type="submit" class="button-primary" value="Update Profile" name="submit" />
		</p>
	</form>
</div>
