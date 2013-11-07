=== Plugin Name ===
Contributors: Andre Cardoso
Donate link: 
Tags: user profile, social, professiona
Requires at least: 3.6.1
Tested up to: 3.6.1
Stable tag: 1.0.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html


== Description ==
This plugin provides an easy way to manage the social and professional user information.

== Installation ==
Like any other plugin, nothing magical.


== Usage == 
* In admin panel the user type your informations.
* On site, all you have to do is to get usermeta as needed where you need
Examples: 

    # Showing the job title
    <?php echo get_user_meta( $user->ID, 'job_title', true ); ?>
    #############################


    # Showing the skills (if is visible in admin and provided by user)
    <?php
        $skills = get_user_meta( $user->ID, 'skills', true );
        if ( !empty( $skills ) ) : ?>
            <?php foreach ( $skills as $skill ) : ?>
                    <?php echo $skill['technology']; ?>
                    <br />
                    <div class="progress">
                            <!-- using twitter bootstrap 3 to show a progress bar, it is not mandatory -->
                            <div class="progress-bar progress-bar-danger"  role="progressbar" aria-valuenow="<?php echo $skill['dominate']; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $skill['dominate']; ?>%; background-color: #af0e0f">
                                    <span class="sr-only"></span>
                            </div>
                    </div>
            <?php endforeach; ?>
        <?php endif; ?>
     #############################  


     # Showing Social elements
     <?php if ( $facebook = get_user_meta( $user->ID, 'facebook', true ) ) {
            echo '<a href="'.$facebook.'" target="_blank"><img src="{your-fb-image}" '
                            . 'alt="Facebook"'
                            . 'title="Facebook"></a>&nbsp;';
     } ?>
     #############################  

== Changelog ==

= 1.0.0 =
Created this plugin

