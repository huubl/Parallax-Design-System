{{--
  Title: Update Profile
  Description: Display a listing of portfolio items
  Category: general_blocks
  Icon: star-filled
  Keywords: portfolio listing
  Mode: preview
  Align: full
  --}}

  @php
  $phone_number = get_field('phone_number', 'option');
  $email = get_field('email', 'option');


  $current_user = wp_get_current_user();
  @endphp

  @if(!is_user_logged_in())
  @include('partials.capital.login-form')
  @else

  <div class="section section--investments active mt-45">
    <div class="container container--invest flex justify-between items-start flew-row flex-wrap">
      <div class="fp-bg bg-white md:ml-15"></div>
      <div class="investments--listings px-15 md:px-60 pt-120 w-full md:w-2/3">
        <h1 class="border-top">Update Info</h1>
        <p class="user__nav">WELCOME {!! $current_user->first_name !!} <span class="px-2">|</span> <a href="/investor-login/">INVESTOR PORTAL</a> <span class="px-2">|</span> <a href="{!! wp_logout_url(get_permalink()) !!}">LOGOUT</a></p>

        <div class="table__listings">
          <?php
          /* Get user info. */
          global $current_user, $wp_roles;
          //get_currentuserinfo(); //deprecated since 3.1

          /* Load the registration file. */
          //require_once( ABSPATH . WPINC . '/registration.php' ); //deprecated since 3.1
          $error = array();
          /* If profile was saved, update profile. */
          if ( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) && $_POST['action'] == 'update-user' ) {

            /* Update user password. */
            if ( !empty($_POST['pass1'] ) && !empty( $_POST['pass2'] ) ) {
              if ( $_POST['pass1'] == $_POST['pass2'] )
              wp_update_user( array( 'ID' => $current_user->ID, 'user_pass' => esc_attr( $_POST['pass1'] ) ) );
              else
              $error[] = __('The passwords you entered do not match.  Your password was not updated.', 'profile');
            }

            /* Update user information. */
            if ( !empty( $_POST['url'] ) )
            wp_update_user( array( 'ID' => $current_user->ID, 'user_url' => esc_url( $_POST['url'] ) ) );
            if ( !empty( $_POST['email'] ) ){
              if (!is_email(esc_attr( $_POST['email'] )))
              $error[] = __('The Email you entered is not valid.  please try again.', 'profile');
              elseif(email_exists(esc_attr( $_POST['email'] )) != $current_user->ID )
              $error[] = __('This email is already used by another user.  try a different one.', 'profile');
              else{
                wp_update_user( array ('ID' => $current_user->ID, 'user_email' => esc_attr( $_POST['email'] )));
              }
            }

            if ( !empty( $_POST['first-name'] ) )
            update_user_meta( $current_user->ID, 'first_name', esc_attr( $_POST['first-name'] ) );
            if ( !empty( $_POST['last-name'] ) )
            update_user_meta($current_user->ID, 'last_name', esc_attr( $_POST['last-name'] ) );
            if ( !empty( $_POST['description'] ) )
            update_user_meta( $current_user->ID, 'description', esc_attr( $_POST['description'] ) );

            /* Redirect so the page will show updated info.*/
            /*I am not Author of this Code- i dont know why but it worked for me after changing below line to if ( count($error) == 0 ){ */
            if ( count($error) == 0 ) {
              //action hook for plugins and extra fields saving
              do_action('edit_user_profile_update', $current_user->ID);
              wp_redirect( get_permalink() );
              exit;
            }
          }

          ?>

          <?php if ( count($error) > 0 ) echo '<p class="error">' . implode("<br />", $error) . '</p>'; ?>
          <form method="post" id="adduser" action="<?php the_permalink(); ?>" class="user__info">
            <h6>Name</h6>
            <p class="form-username">
              <label for="first-name"><?php _e('First Name', 'profile'); ?></label>
              <input class="text-input" name="first-name" type="text" id="first-name" placeholder="First Name" value="<?php the_author_meta( 'first_name', $current_user->ID ); ?>" />
            </p><!-- .form-username -->
            <p class="form-username">
              <label for="last-name"><?php _e('Last Name', 'profile'); ?></label>
              <input class="text-input" name="last-name" type="text" id="last-name" placeholder="Last Name" value="<?php the_author_meta( 'last_name', $current_user->ID ); ?>" />
            </p><!-- .form-username -->

            <hr>

            <h6>contact info</h6>
            <p class="form-email">
              <label for="email"><?php _e('E-mail *', 'profile'); ?></label>
              <input class="text-input" name="email" type="text" placeholder="Email Address" id="email" value="<?php the_author_meta( 'user_email', $current_user->ID ); ?>" />
            </p><!-- .form-email -->
            <p class="form-url">
              <label for="url"><?php _e('Website', 'profile'); ?></label>
              <input class="text-input" name="url" type="text" id="url" placeholder="Website" value="<?php the_author_meta( 'user_url', $current_user->ID ); ?>" />
            </p><!-- .form-url -->

            <hr>

            <h6>about yourself</h6>

            <p class="form-textarea">
              <label for="description"><?php _e('Biographical Information', 'profile') ?></label>
              <textarea name="description" id="description" rows="3" cols="50" placeholder="Biographical Info (Share a little biographical information to fill out your profile. This may be shown publicly.)"><?php the_author_meta( 'description', $current_user->ID ); ?></textarea>
            </p><!-- .form-textarea -->

            <hr>

            <h6>Account Management</h6>

            <a href="/wp/wp-admin/profile.php#password" class="button button--primary">Create New Password</a>

            <hr>

            <?php
            //action hook for plugin and extra fields
            do_action('edit_user_profile',$current_user);
            ?>
            <p class="form-submit">
              <?php echo $referer; ?>
              <input name="updateuser" type="submit" id="updateuser" class="submit button button--primary" value="<?php _e('Update', 'profile','<img src="/app/themes/sage/resources/assets/images/arrow0right-white.svg">'); ?>" />
              <?php wp_nonce_field( 'update-user' ) ?>
              <input name="action" type="hidden" id="action" value="update-user" />
            </p><!-- .form-submit -->
          </form><!-- #adduser -->
        </div>
      </div>

      <div class="investor--contact w-full md:w-1/3 p-30 md:p-45 bg-primary-2 mt-45 md:mt-120">
        <h5>Contact 1839</h5>
        @if( $phone_number )
        <a class="block my-15 text-white" href="tel:{{ preg_replace('/[^0-9]/', '', $phone_number) }}"><img src="/app/themes/sage/resources/assets/images/tele-right.svg" class="inline-block mr-15">{{ $phone_number }}</a>
        @endif

        @if($email)
        <a class="text-white" href="mailto:{!! $email !!}"><img src="/app/themes/sage/resources/assets/images/email.svg" class="inline-block mr-15"> {!! $email !!}</a>
        @endif
        {!! do_shortcode('[gravityform id="1" title="false" description="false"]') !!}
      </div>
    </div>
  </div>
  @endif
