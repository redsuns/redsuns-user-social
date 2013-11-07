<?php
/*
Plugin Name: Redsuns User Social
Plugin URI: 
Description: Possibilita o cadastro e manutenção de redes sociais e informações profissionais de usuários
Version: 1.0.0
Author: Redsuns
Author URI: http://redsuns.com.be
License: GPLv2
*/

function redsuns_user_social_add_custom_user_profile_fields( $user ) 
{ ?>

	
	<h3><?php echo __('Professional', 'redsuns-user-social'); ?></h3>

	<table class="form-table">

        <!--Professional-->
		<tr>
			<th>
				<label for="job_title">
					<?php echo __('Job Title', 'redsuns-user-social'); ?>
				</label>
			</th>
			<td>
				<input type="text" name="job_title" id="job_title" 
					   value="<?php echo esc_attr( get_the_author_meta( 'job_title', $user->ID ) ); ?>" class="regular-text" />
				<br />
				<span class="description"><?php echo __('Type a description for your job', 'redsuns-user-social'); ?></span>
			</td>
		</tr>
        <!--Professional-->
        
        <!--Skills - by default it is hidden, to use it remove the "display:none;" property bellow -->
		<tr style="display:none;">
			<th>
				<label><?php echo __('Skills', 'redsuns-user-social'); ?></label> - 
				<span class="description"><?php echo __('Type a technology and how you think dominate it', 'redsuns-user-social'); ?></span>
			</th>
			<td>
				<div class="skill">
					<input type="text" name="skill[]" class="regular-text" placeholder="<?php echo __('Technology', 'redsuns-user-social'); ?>" />
					&nbsp;&nbsp;
					<select name="dominate[]">
						<option value=""><?php echo __('- Dominate -', 'redsuns-user-social'); ?></option>
						<option value="10">10%</option>
						<option value="20">20%</option>
						<option value="30">30%</option>
						<option value="40">40%</option>
						<option value="50">50%</option>
						<option value="60">60%</option>
						<option value="70">70%</option>
						<option value="80">80%</option>
						<option value="90">90%</option>
						<option value="100">100%</option>
					</select>
					<img class="img_plus" src="<?php echo plugin_dir_url(__FILE__); ?>assets/img/plus.png"/>
					<br />
				</div>

				<?php if ( $skills = get_the_author_meta( 'skills', $user->ID ) ) : ?>
					<br />
                    <?php echo __('Your current skills', 'redsuns-user-social'); ?>
					<br />
					<?php foreach ( $skills as $skill ) : ?>
						<div class="atual" id="rem_<?php echo sanitize_title( $skill['technology'] ); ?>">
							<input type="text" name="skill[]" class="regular-text" value="<?php echo $skill['technology']; ?>" />
							&nbsp;&nbsp;
							<select name="dominate[]">
								<option value="">- Domino -</option>
								<option value="10" <?php if ( $skill['dominate'] == 10 ) echo 'selected'; ?>>10%</option>
								<option value="20" <?php if ( $skill['dominate'] == 20 ) echo 'selected'; ?>>20%</option>
								<option value="30" <?php if ( $skill['dominate'] == 30 ) echo 'selected'; ?>>30%</option>
								<option value="40" <?php if ( $skill['dominate'] == 40 ) echo 'selected'; ?>>40%</option>
								<option value="50" <?php if ( $skill['dominate'] == 50 ) echo 'selected'; ?>>50%</option>
								<option value="60" <?php if ( $skill['dominate'] == 60 ) echo 'selected'; ?>>60%</option>
								<option value="70" <?php if ( $skill['dominate'] == 70 ) echo 'selected'; ?>>70%</option>
								<option value="80" <?php if ( $skill['dominate'] == 80 ) echo 'selected'; ?>>80%</option>
								<option value="90" <?php if ( $skill['dominate'] == 90 ) echo 'selected'; ?>>90%</option>
								<option value="100" <?php if ( $skill['dominate'] == 100 ) echo 'selected'; ?>>100%</option>
							</select>
							<img class="img_minus" src="<?php echo plugin_dir_url(__FILE__); ?>assets/img/minus.png" 
								 id="<?php echo sanitize_title( $skill['technology'] ); ?>"/>
							<br />
						</div>
					<?php endforeach; ?>
				<?php endif; ?>
			</td>
		</tr>
        <!--Skills-->
        
        <!--Impact Statement-->
		<tr>
			<th>
				<label for="impact_statement"><?php echo __('Impact statement', 'redsuns-user-social'); ?>
				</label></th>
			<td>
				<textarea name="impact_statement" id="impact_statement" class="regular-text"><?php echo esc_attr( get_the_author_meta( 'impact_statement', $user->ID ) ); ?></textarea>
                <br />
				<span class="description">
                    <?php echo __('Type a description of you, it will be displayed in your profile', 'redsuns-user-social'); ?>
                </span>
			</td>
		</tr>
        <!--Impact Statement-->
        
        <!--Featured Image-->
		<?php if ( $imagem = get_the_author_meta( 'featured_image', $user->ID ) ) : ?>
			<tr>
				<th>
					<label><?php echo __('Featured image', 'redsuns-user-social'); ?></label>
				</th>
				<td>
					<img src="<?php echo get_bloginfo( 'url' ); ?>/wp-content/uploads<?php echo $imagem; ?>" width="256"/>
				</td>
			</tr>
		<?php endif; ?>
		<tr>
			<th>
				<label><?php echo __('Featured image', 'redsuns-user-social'); ?></label>
            </th>
			<td>
				<input type="file" name="featured_image" id="featured_image">
				<br />
				<span class="description">
                    <?php echo __('If exists, the featured image will appear at your profile', 'redsuns-user-social'); ?>
                </span>
			</td>
		</tr>
        <!--Featured Image-->
        
        <!--Social-->
		<tr><td colspan="2"><h4><?php echo __('Social', 'redsuns-user-social'); ?></h4><hr></td></tr>
		<tr>
			<th>
				<label>Facebook
				</label></th>
			<td>
				<input type="text" name="facebook" maxlength="255" class="regular-text" value="<?php echo esc_attr( get_the_author_meta( 'facebook', $user->ID ) ); ?>">
			</td>
		</tr>
		<tr>
			<th>
				<label>Twitter
				</label></th>
			<td>
				<input type="text" name="twitter" maxlength="255" class="regular-text" value="<?php echo esc_attr( get_the_author_meta( 'twitter', $user->ID ) ); ?>">
			</td>
		</tr>
		<tr>
			<th>
				<label>Google Plus
				</label></th>
			<td>
				<input type="text" name="google_plus" class="regular-text" maxlength="255" value="<?php echo esc_attr( get_the_author_meta( 'google_plus', $user->ID ) ); ?>">
			</td>
		</tr>
		<tr>
			<th>
				<label>Github
				</label></th>
			<td>
				<input type="text" name="github" class="regular-text" maxlength="255" value="<?php echo esc_attr( get_the_author_meta( 'github', $user->ID ) ); ?>">
			</td>
		</tr>
        <!--Social-->
        
	</table>
    
	<script>
		jQuery(document).ready(function($) {
			$('form#your-profile').attr('enctype', 'multipart/form-data');

			content = $(".skill").html();

			$(".img_plus").click(function() {
				$(".skill").append(content);
				$(".img_plus").last().remove();
			});

			$(".img_minus").click(function() {
				skillToRemove = $(this).attr("id");

				if (confirm("<?php echo __('Are you sure you want to remove this skill?', 'redsuns-user-social'); ?>")) {
					$("#rem_" + skillToRemove).remove();
				}
			});
		});
	</script>

	<?php
}


function redsuns_user_social_save_custom_user_profile_fields( $user_id ) 
{
	if ( !current_user_can( 'edit_user', $user_id ) ) {
		return false;
	}


	if ( isset( $_POST['job_title'] ) ) {
		update_usermeta( $user_id, 'job_title', filter_input( INPUT_POST, 'job_title', FILTER_SANITIZE_STRING ) );
	}
	
	if ( isset( $_POST['impact_statement'] ) ) {
		update_usermeta( $user_id, 'impact_statement', filter_input( INPUT_POST, 'impact_statement', FILTER_SANITIZE_STRING ) );
	}

	if ( isset( $_POST['skill'] ) ) {

		$skills = array();

		$total = count( $_POST['skill'] );
		for ( $cont = 0; $cont < $total; $cont++ ) {
			if ( $_POST['skill'][$cont] != "" ) {
				$skills[] = array(
					'technology' => $_POST['skill'][$cont],
					'dominate' => (int) $_POST['dominate'][$cont],
				);
			}
		}

		update_usermeta( $user_id, 'skills', $skills );
	}

	if ( isset( $_FILES['featured_image'] ) ) {
		$file = $_FILES['featured_image'];

		$allowed = array( 'image/jpeg', 'image/png' );
		$directory = wp_upload_dir();

		if ( !empty( $file['name'] ) && $file['error'] == 0 && in_array( $file['type'], $allowed ) ) {
			if ( move_uploaded_file( $file['tmp_name'], $directory['path'] . '/' . $file['name'] ) ) {
				update_usermeta( $user_id, 'featured_image', $directory['subdir'] . '/' . $file['name'] );
			}
		}
	}

	if ( isset( $_POST['facebook'] ) ) {
		update_usermeta( $user_id, 'facebook', filter_input( INPUT_POST, 'facebook', FILTER_SANITIZE_STRING ) );
	}

	if ( isset( $_POST['twitter'] ) ) {
		update_usermeta( $user_id, 'twitter', filter_input( INPUT_POST, 'twitter', FILTER_SANITIZE_STRING ) );
	}

	if ( isset( $_POST['google_plus'] ) ) {
		update_usermeta( $user_id, 'google_plus', filter_input( INPUT_POST, 'google_plus', FILTER_SANITIZE_STRING ) );
	}

	if ( isset( $_POST['github'] ) ) {
		update_usermeta( $user_id, 'github', filter_input( INPUT_POST, 'github', FILTER_SANITIZE_STRING ) );
	}
}


/* Registering actions */
add_action( 'show_user_profile', 'redsuns_user_social_add_custom_user_profile_fields' );
add_action( 'edit_user_profile', 'redsuns_user_social_add_custom_user_profile_fields' );

add_action( 'personal_options_update', 'redsuns_user_social_save_custom_user_profile_fields' );
add_action( 'edit_user_profile_update', 'redsuns_user_social_save_custom_user_profile_fields' );


/* Translation files */
load_plugin_textdomain( 'redsuns-user-social', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
