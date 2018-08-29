<?php
/**********************************************************************************************************************************
*
* Ajax Member System
* 
* Author: Webbu Design
*
***********************************************************************************************************************************/
add_action( 'PF_AJAX_HANDLER_pfget_usersystem', 'pf_ajax_usersystem' );
add_action( 'PF_AJAX_HANDLER_nopriv_pfget_usersystem', 'pf_ajax_usersystem' );
if(!function_exists('pf_ajax_usersystem')){
    function pf_ajax_usersystem(){
      //check_ajax_referer( 'pfget_usersystem', 'security');
      header('Content-Type: text/html; charset=UTF-8;');
      $pid = '';
      if(isset($_POST['pid']) && $_POST['pid']!=''){
        $pid = intval($_POST['pid']);
      }
      if(isset($_POST['formtype']) && $_POST['formtype']!=''){
        $formtype = esc_attr($_POST['formtype']);
      }
      if(isset($_POST['redirectpage']) && $_POST['redirectpage']!=''){
        $redirectpage = esc_attr($_POST['redirectpage']);
      }else{$redirectpage = 0;};

      $lang = '';
      if(isset($_POST['lang']) && $_POST['lang']!=''){
        $lang = sanitize_text_field($_POST['lang']);
      }

      if(function_exists('icl_t')) {
        if (!empty($lang)) {
          do_action( 'wpml_switch_language', $lang );
        }
      }
      
      $pfrecheck = PFRECIssetControl('setupreCaptcha_general_status','','0');
      if ($pfrecheck == 1) {
        if ($formtype == 'lp') {
            $recaptcha_vars = '<section><div id="recaptcha_div_us">'.PFreCaptchaWidgetLP().'</div></section>';
        } else {
            $recaptcha_vars = '<section><div id="recaptcha_div_us">'.PFreCaptchaWidget().'</div></section>';
        }
      }else{
        $recaptcha_vars = '';
      }

      

      
    	switch($formtype){
    /**
    *Login
    **/
    	case 'login':
        $setup4_membersettings_dashboard_link = esc_url(home_url());
        $pfmenu_perout = PFPermalinkCheck();
        $pfrechecklg = PFRECIssetControl('setupreCaptcha_general_login_status','','0');
        if ( $pfrecheck == 1 && $pfrechecklg != 1) {$recaptcha_vars = '';}

        $facebook_login_check = PFASSIssetControl('setup4_membersettings_facebooklogin','','0');
        $twitter_login_check = PFASSIssetControl('setup4_membersettings_twitterlogin','','0');
        $google_login_check = PFASSIssetControl('setup4_membersettings_googlelogin','','0');
        $vk_login_check = PFASSIssetControl('setup4_membersettings_vklogin','','0');

        if($twitter_login_check == 1){
          $twitter_login_text = '<div class="social-btns full"><a id="pf-ajax-logintwitter" href="'.$setup4_membersettings_dashboard_link.$pfmenu_perout.'uaf=twlogin" class="tws" title="'.esc_html__('LOGIN WITH TWITTER','pointfindert2d').'"><i class="pfadmicon-glyph-769"></i></a></div>';
        }else{$twitter_login_text = '';}

        if($facebook_login_check == 1){
          $facebook_login_text = '<div class="social-btns full"><a id="pf-ajax-loginfacebook" href="'.$setup4_membersettings_dashboard_link.$pfmenu_perout.'uaf=fblogin" class="fbs" title="'.esc_html__('LOGIN WITH FACEBOOK','pointfindert2d').'"><i class="pfadmicon-glyph-770"></i></a></div>';
        }else{$facebook_login_text = '';}

        if($google_login_check == 1){
          $google_login_text = '<div class="social-btns full"><a id="pf-ajax-logingoogle" href="'.$setup4_membersettings_dashboard_link.$pfmenu_perout.'uaf=gologin" class="gbs" title="'.esc_html__('LOGIN WITH GOOGLE','pointfindert2d').'"><i class="pfadmicon-glyph-813"></i></a></div>';
        }else{$google_login_text = '';}

        if($vk_login_check == 1){
          $vk_login_text = '<div class="social-btns full"><a id="pf-ajax-loginvk" href="'.$setup4_membersettings_dashboard_link.$pfmenu_perout.'uaf=vklogin" class="vk" title="'.esc_html__('LOGIN WITH VK','pointfindert2d').'"><i class="pfadmicon-glyph-980"></i></a></div>';
        }else{$vk_login_text = '';}


        ?>
        <script type='text/javascript'>
            (function($) {
                "use strict";
                $.pfAjaxUserSystemVars = {};
                $.pfAjaxUserSystemVars.username_err = '<?php echo esc_html__('Please write username ','pointfindert2d');?>';
                $.pfAjaxUserSystemVars.username_err2 = '<?php echo esc_html__('Please enter at least 3 charactersfor Username.','pointfindert2d');?>';
                $.pfAjaxUserSystemVars.password_err = '<?php echo esc_html__('Please write password ','pointfindert2d');?>';
            })(jQuery);
        </script>
        <div class="golden-forms wrapper mini">
            <div id="pflgcontainer-overlay" class="pftrwcontainer-overlay"></div>
            <form id="pf-ajax-login-form">
                <div class="pfmodalclose"><i class="pfadmicon-glyph-707"></i>
                </div>
                <div class="pfsearchformerrors">
                    <ul></ul>
                    <a class="button pfsearch-err-button">
                        <?php echo esc_html__( 'CLOSE', 'pointfindert2d');?>
                    </a>
                </div>
                <div class="form-title">
                    <h2><?php echo esc_html__('Account Login','pointfindert2d');?></h2>
                </div>
                <div class="form-enclose">
                    <div class="form-section">
                        <section>
                            <label class="cxb">
                                <?php echo esc_html__( 'Not a member yet?', 'pointfindert2d');?> <strong><a id="pf-register-trigger-button-inner" class="glink ext"><?php echo esc_html__('Register Now','pointfindert2d');?></a></strong>
                                <?php echo esc_html__( '- Its  Free', 'pointfindert2d');?>
                            </label>
                            <div class="tagline"><span><?php echo esc_html__('OR','pointfindert2d');?></span>
                            </div>
                        </section>
                        <section>
                            <div class="pointfinder-login-scbuttons"><span class="pflgtext"><?php echo esc_html__('LOGIN WITH','pointfindert2d');?></span><span class="pflgbuttons"><?php echo $facebook_login_text;echo $twitter_login_text;echo $google_login_text;echo $vk_login_text;?></span>
                            </div>
                            <div class="tagline"></div>
                            
                        </section>
                        <section>
                            <label for="usernames" class="lbl-text">
                                <?php echo esc_html__( 'Username:', 'pointfindert2d');?>
                            </label>
                            <label class="lbl-ui append-icon">
                                <input type="text" name="username" class="input" placeholder="<?php echo esc_html__('Enter Username','pointfindert2d');?>" autofocus /><span><i class="pfadmicon-glyph-632"></i></span>
                            </label>
                        </section>
                        <section>
                            <label for="pass" class="lbl-text">
                                <?php echo esc_html__( 'Password:', 'pointfindert2d');?>
                            </label>
                            <label class="lbl-ui append-icon">
                                <input type="password" name="password" class="input" placeholder="<?php echo esc_html__('Enter Password','pointfindert2d');?>" /><span><i class="pfadmicon-glyph-465"></i></span>
                            </label>
                        </section>
                        <?php echo $recaptcha_vars;?>
                        <section><span class="gtoggle"><label class="toggle-switch blue"><input type="checkbox" name="rem" id="toggle1_rememberme" /><label for="toggle1_rememberme" data-on="<?php echo esc_html__('YES','pointfindert2d');?>" data-off="<?php echo esc_html__('NO','pointfindert2d');?>"></label></label><label for="toggle1"><?php echo esc_html__('Remember me','pointfindert2d');?> <strong><a id="pf-lp-trigger-button-inner" class="glink ext"><?php echo esc_html__('Forgot Password?','pointfindert2d');?></a></strong></label></span>
                        </section>
                    </div>
                </div>
                <div class="form-buttons">
                    <section>
                        <input type="hidden" name="redirectpage" value="<?php echo $redirectpage;?>" />
                        <button id="pf-ajax-login-button" class="button blue">
                            <?php echo esc_html__( 'Login Now', 'pointfindert2d');?>
                        </button>
                    </section>
                </div>
            </form>
        </div>
    <?php
    		break;
    /**
    *Register
    **/
      case 'register':
        $pfrechecklg = PFRECIssetControl('setupreCaptcha_general_reg_status','','0');
        if ( $pfrecheck == 1 && $pfrechecklg != 1) {
          $recaptcha_vars = '';
        }

        $passffreg = PFSAIssetControl('passffreg','','0');
        $tandcfreg = PFSAIssetControl('tandcfreg','','0');
        $mobileffreg = PFSAIssetControl('mobileffreg','','0');
        $mobileffreg_req = PFSAIssetControl('mobileffreg_req','','0');
        $phoneffreg = PFSAIssetControl('phoneffreg','','0');
        $phoneffreg_req = PFSAIssetControl('phoneffreg_req','','0');

        $lnffreg = PFSAIssetControl('lnffreg','','0');
        $lnffreg_req = PFSAIssetControl('lnffreg_req','','0');
        $fnffreg = PFSAIssetControl('fnffreg','','0');
        $fnffreg_req = PFSAIssetControl('fnffreg_req','','0');


        echo '<script type="text/javascript">';
            echo "(function($) {";
                echo '"use strict";';
                echo "$.pfAjaxUserSystemVars2 = {};";
                echo "$.pfAjaxUserSystemVars2.username_err = '".esc_html__('Please write username ','pointfindert2d')."';";
                echo "$.pfAjaxUserSystemVars2.username_err2 = '".esc_html__('Please enter at least 3 charactersfor Username.','pointfindert2d')."';";
                echo "$.pfAjaxUserSystemVars2.email_err = '".esc_html__('Please write an email ','pointfindert2d')."';";
                echo "$.pfAjaxUserSystemVars2.email_err2 = '".esc_html__('Your email address must be in the format of name@ domain.com ','pointfindert2d')."';";

                if ($passffreg == '1') {
                    echo "$.pfAjaxUserSystemVars2.pass_err2 = '".esc_html__('Please enter password','pointfindert2d')."';";
                }
                if($fnffreg_req == '1'){
                    echo "$.pfAjaxUserSystemVars2.fn_err2 = '".esc_html__('Please enter first name.','pointfindert2d')."';";
                    echo "$.pfAjaxUserSystemVars2.fn_req = true;";
                }
                if($lnffreg_req == '1'){
                    echo "$.pfAjaxUserSystemVars2.ln_err2 = '".esc_html__('Please enter last name.','pointfindert2d')."';";
                    echo "$.pfAjaxUserSystemVars2.ln_req = true;";
                }
                if($phoneffreg_req == '1'){
                    echo "$.pfAjaxUserSystemVars2.phn_err2 = '".esc_html__('Please enter phone.','pointfindert2d')."';";
                    echo "$.pfAjaxUserSystemVars2.phn_req = true;";
                }
                if($mobileffreg_req == '1'){
                    echo "$.pfAjaxUserSystemVars2.mbl_err2 = '".esc_html__('Please enter mobile.','pointfindert2d')."';";
                    echo "$.pfAjaxUserSystemVars2.mbl_req = true;";
                }
                if($tandcfreg == '1'){
                    echo "$.pfAjaxUserSystemVars2.tnc_err2 = '".esc_html__('Please check terms and conditions checkbox.','pointfindert2d')."';";
                }

            echo "
        })(jQuery);";
        echo '</script>';
        ?>
        <div class="golden-forms wrapper mini">
            <div id="pflgcontainer-overlay" class="pftrwcontainer-overlay"></div>
            <form id="pf-ajax-register-form">
                <div class="pfmodalclose"><i class="pfadmicon-glyph-707"></i>
                </div>
                <div class="pfsearchformerrors">
                    <ul></ul>
                    <a class="button pfsearch-err-button">
                        <?php echo esc_html__( 'CLOSE', 'pointfindert2d');?>
                    </a>
                </div>
                <div class="form-title">
                    <h2><?php echo esc_html__('Register an Account','pointfindert2d');?></h2>
                </div>
                <div class="form-enclose">
                    <div class="form-section">
                        <section>
                            <label class="cxb">
                                <?php echo esc_html__( 'Already have an account?', 'pointfindert2d');?> <strong><a id="pf-login-trigger-button-inner" class="glink ext"><?php echo esc_html__('Login now','pointfindert2d');?></a></strong>
                            </label>
                            <div class="tagline"><span><?php echo esc_html__('OR','pointfindert2d');?></span>
                            </div>
                        </section>
                        <section>
                            <label for="usernames" class="lbl-text">
                                <?php echo esc_html__( 'Username:', 'pointfindert2d');?>
                            </label>
                            <label class="lbl-ui append-icon">
                                <input type="text" name="username" class="input" placeholder="<?php echo esc_html__('Enter Username','pointfindert2d');?>" autofocus /><span><i class="pfadmicon-glyph-632"></i></span>
                            </label>
                        </section>

                        <?php if($passffreg == '1'){ ?>
                        <section>
                            <label for="pass" class="lbl-text">
                                <?php echo esc_html__( 'Password:', 'pointfindert2d');?>
                            </label>
                            <label class="lbl-ui append-icon">
                                <input type="password" name="pass" class="input" placeholder="<?php echo esc_html__('Enter Password','pointfindert2d');?>" /><span><i class="pfadmicon-glyph-465"></i></span>
                            </label>
                        </section>
                        <?php } ?>

                        <?php if($fnffreg == '1'){ ?>
                        <section>
                            <label for="firstname" class="lbl-text">
                                <?php echo esc_html__( 'First Name:', 'pointfindert2d');?>
                            </label>
                            <label class="lbl-ui append-icon">
                                <input type="text" name="firstname" class="input" placeholder="<?php echo esc_html__('Enter First Name','pointfindert2d');?>" /><span><i class="pfadmicon-glyph-366"></i></span>
                            </label>
                        </section>
                        <?php } ?>

                        <?php if($lnffreg == '1'){ ?>
                        <section>
                            <label for="lastname" class="lbl-text">
                                <?php echo esc_html__( 'Last Name:', 'pointfindert2d');?>
                            </label>
                            <label class="lbl-ui append-icon">
                                <input type="text" name="lastname" class="input" placeholder="<?php echo esc_html__('Enter Last Name','pointfindert2d');?>" /><span><i class="pfadmicon-glyph-366"></i></span>
                            </label>
                        </section>
                        <?php } ?>


                        <section>
                            <label for="pass" class="lbl-text">
                                <?php echo esc_html__( 'Email:', 'pointfindert2d');?>
                            </label>
                            <label class="lbl-ui append-icon">
                                <input type="text" name="email" class="input" placeholder="<?php echo esc_html__('Enter Email Address','pointfindert2d');?>" /><span><i class="pfadmicon-glyph-823"></i></span>
                            </label>
                        </section>
                        
                        <?php if($phoneffreg == '1'){ ?>
                        <section>
                            <label for="phone" class="lbl-text">
                                <?php echo esc_html__( 'Phone:', 'pointfindert2d');?>
                            </label>
                            <label class="lbl-ui append-icon">
                                <input type="text" name="phone" class="input" placeholder="<?php echo esc_html__('Enter Phone Number','pointfindert2d');?>" /><span><i class="pfadmicon-glyph-116"></i></span>
                            </label>
                        </section>
                        <?php } ?>
                        
                        <?php if($mobileffreg == '1'){ ?>
                        <section>
                            <label for="mobile" class="lbl-text">
                                <?php echo esc_html__( 'Mobile:', 'pointfindert2d');?>
                            </label>
                            <label class="lbl-ui append-icon">
                                <input type="text" name="mobile" class="input" placeholder="<?php echo esc_html__('Enter Mobile Number','pointfindert2d');?>" /><span><i class="pfadmicon-glyph-35"></i></span>
                            </label>
                        </section>
                        <?php } ?>

                        <?php if($tandcfreg == '1'){
                            /**
                            *Terms and conditions
                            **/
                                global $wpdb;
                                $terms_conditions_template = $wpdb->get_results($wpdb->prepare("SELECT post_id FROM $wpdb->postmeta WHERE meta_key = %s AND meta_value = %s ",'_wp_page_template','terms-conditions.php'), ARRAY_A);
                                if (isset($terms_conditions_template[0]['post_id'])) {
                                    $terms_permalink = $terms_conditions_template[0]['post_id'];
                                }else{
                                    $terms_permalink = '';
                                }
                                
                                echo '<section style="margin-top: 20px;margin-bottom: 10px;">';
                                echo '
                                    <span class="goption upt2">
                                        <label class="options">
                                            <input type="checkbox" id="pftermsofuser" name="pftermsofuser" value="1">
                                            <span class="checkbox"></span>
                                        </label>
                                        <label for="check1" class="upt2ch1">'.sprintf(esc_html__( '%s Terms and conditions %s', 'pointfindert2d' ),'<a href="#" class="pftermshortc" data-pid="'.$terms_permalink.'"><strong>','</strong></a>').'</label>
                                   </span>
                                ';
                                echo '</section>';
                                
                            /**
                            *Terms and conditions
                            **/
                        }?>
                        <?php echo $recaptcha_vars;?>
                    </div>
                </div>
                <div class="form-buttons">
                    <section>
                        <button class="button blue" id="pf-ajax-register-button">
                            <?php echo esc_html__( 'Register Now', 'pointfindert2d');?>
                        </button>
                    </section>
                </div>
            </form>
        </div>
    <?php
        break;
    /**
    *Lost Password System
    **/
      case 'lp':
        $pfrechecklg = PFRECIssetControl('setupreCaptcha_general_fb_status','','0');
        if ( $pfrecheck == 1 && $pfrechecklg != 1) {
          $recaptcha_vars = '';
        }
        ?>
        <script type='text/javascript'>
            (function($) {
                "use strict";
                $.pfAjaxUserSystemVars3 = {};
                $.pfAjaxUserSystemVars3.username_err = '<?php echo esc_html__('Username or Email must be filled.','pointfindert2d');?>';
                $.pfAjaxUserSystemVars3.username_err2 = '<?php echo esc_html__('Please enter at least 3 charactersfor Username.','pointfindert2d');?>';
                $.pfAjaxUserSystemVars3.email_err2 = '<?php echo esc_html__('Your email address must be in the format of name@ domain.com ','pointfindert2d');?>';
            })(jQuery);
        </script>
        <div class="golden-forms wrapper mini">
            <div id="pflgcontainer-overlay" class="pftrwcontainer-overlay"></div>
            <div class="pfmodalclose"><i class="pfadmicon-glyph-707"></i>
            </div>
            <form id="pf-ajax-lp-form">
                <div class="pfsearchformerrors">
                    <ul></ul>
                    <a class="button pfsearch-err-button">
                        <?php echo esc_html__( 'CLOSE', 'pointfindert2d');?>
                    </a>
                </div>
                <div class="form-title">
                    <h2><?php echo esc_html__('Forgot Password','pointfindert2d');?></h2>
                </div>
                <div class="form-enclose">
                    <div class="form-section">
                        <section>
                            <label class="lbl-text"><strong><?php echo esc_html__('Please Enter;','pointfindert2d');?></strong>
                            </label>
                        </section>
                        <section>
                            <label for="usernames" class="lbl-text">
                                <?php echo esc_html__( 'Username:', 'pointfindert2d');?>
                            </label>
                            <label class="lbl-ui append-icon">
                                <input type="text" name="username" class="input" placeholder="<?php echo esc_html__('Enter Username','pointfindert2d');?>" autofocus /><span><i class="pfadmicon-glyph-632"></i></span>
                            </label>
                        </section>
                        <section>
                            <div class="tagline"><span><?php echo esc_html__('OR','pointfindert2d');?></span>
                            </div>
                        </section>
                        <section>
                            <label for="pass" class="lbl-text">
                                <?php echo esc_html__( 'Email:', 'pointfindert2d');?>
                            </label>
                            <label class="lbl-ui append-icon">
                                <input type="text" name="email" class="input" placeholder="<?php echo esc_html__('Enter Email Address','pointfindert2d');?>" /><span><i class="pfadmicon-glyph-823"></i></span>
                            </label>
                        </section>
                        <?php echo $recaptcha_vars;?>
                    </div>
                </div>
                <div class="form-buttons">
                    <section>
                        <button class="button blue" id="pf-ajax-lp-button">
                            <?php echo esc_html__( 'Send Password', 'pointfindert2d');?>
                        </button>
                    </section>
                </div>
            </form>
        </div>
      <?php
        break;

      case 'lpex':
      case 'lpin':
      $redirect_url = home_url( '/' );
      $redirect_url = add_query_arg( 'active', 'lp', $redirect_url );
        ?>
        <div class="golden-forms wrapper mini">
            <div id="pflgcontainer-overlay" class="pftrwcontainer-overlay"></div>
            <div class="pfmodalclose"><i class="pfadmicon-glyph-707"></i>
            </div>
            <form id="pf-ajax-lp-form">
                <div class="form-title">
                    <h2><?php echo esc_html__('Error','pointfindert2d');?></h2>
                </div>
                <div class="form-enclose">
                    <div class="form-section">
                        <section>
                            <label class="lbl-text">
                                <strong><?php echo sprintf(esc_html__('The password reset link you used is not valid anymore. Please %sclick here%s for create new password key.','pointfindert2d'),'<a class="lplink" href="'.$redirect_url.'">','</a>');?></strong>
                            </label>
                        </section>
                    </div>
                </div>
                <div class="form-buttons" style="height:55px;">
                    <section style="height:55px;">

                    </section>
                </div>
            </form>
        </div>
      <?php
        break;
      case 'lpr':
      ?>
        <script type='text/javascript'>
            (function($) {
                "use strict";
                $.pfAjaxUserSystemVars = {};
                $.pfAjaxUserSystemVars.password_err = '<?php echo esc_html__('Please write password ','pointfindert2d');?>';
                $.pfAjaxUserSystemVars.password_err2 = '<?php echo esc_html__('Please enter at least 3 charactersfor Password.','pointfindert2d');?>';
                $.pfAjaxUserSystemVars.password2_err = '<?php echo esc_html__('Please write repeat password ','pointfindert2d');?>';
                $.pfAjaxUserSystemVars.password2_err2 = '<?php echo esc_html__('Please enter at least 3 characters for Password.','pointfindert2d');?>';
                $.pfAjaxUserSystemVars.password2_err3 = '<?php echo esc_html__('The two passwords you entered don\'t match.','pointfindert2d');?>';
            })(jQuery);
        </script>
      <div class="golden-forms wrapper mini">
          <div id="pflgcontainer-overlay" class="pftrwcontainer-overlay"></div>
          <div class="pfmodalclose"><i class="pfadmicon-glyph-707"></i>
          </div>
          <form id="pf-ajax-lpr-form">
              <div class="pfsearchformerrors">
                  <ul></ul>
                  <a class="button pfsearch-err-button">
                      <?php echo esc_html__( 'CLOSE', 'pointfindert2d');?>
                  </a>
              </div>
              <div class="form-title">
                  <h2><?php echo esc_html__('Reset Password','pointfindert2d');?></h2>
              </div>
              <div class="form-enclose">
                  <div class="form-section">
                      <section>
                          <label class="lbl-text"><strong><?php echo esc_html__('Please Enter;','pointfindert2d');?></strong>
                          </label>
                      </section>
                      <section>
                          <label for="password" class="lbl-text">
                              <?php echo esc_html__( 'New Password:', 'pointfindert2d');?>
                          </label>
                          <label class="lbl-ui append-icon">
                                <input type="password" name="password" id="password" class="input" placeholder="<?php echo esc_html__('Enter Password','pointfindert2d');?>" /><span><i class="pfadmicon-glyph-465"></i></span>
                            </label>
                      </section>
                      <section>
                          <label for="password2" class="lbl-text">
                              <?php echo esc_html__( 'Repeat New Password:', 'pointfindert2d');?>
                          </label>
                          <label class="lbl-ui append-icon">
                                <input type="password" name="password2" id="password2" class="input" placeholder="<?php echo esc_html__('Repeat Password','pointfindert2d');?>" /><span><i class="pfadmicon-glyph-465"></i></span>
                            </label>
                      </section>
                  </div>
              </div>
              <div class="form-buttons">
                  <section>
                      <div class="pf-additional-detailsforlpr"></div>
                      <button class="button blue" id="pf-ajax-lpr-button">
                          <?php echo esc_html__( 'Reset Password', 'pointfindert2d');?>
                      </button>
                  </section>
              </div>
          </form>
      </div>
      <?php
        break;

    /**
    *Scontent
    **/
      case 'scontent':
        if(isset($_POST['scontenttype']) && $_POST['scontenttype']!=''){
          $scontenttype = esc_attr($_POST['scontenttype']);
        }else{
          $scontenttype = '';
        }
        if(isset($_POST['scontenttext']) && $_POST['scontenttext']!=''){
          $scontenttext = esc_attr($_POST['scontenttext']);
        }else{
          $scontenttext = '';
        }
        ?>
        <script type='text/javascript'>(function($) {
          "use strict";
          $.pfAjaxUserSystemVars = {};
          $.pfAjaxUserSystemVars.username_err = '<?php echo esc_html__('Please write username','pointfindert2d');?>';
          $.pfAjaxUserSystemVars.username_err2 = '<?php echo esc_html__('Please enter at least 3 characters for Username.','pointfindert2d');?>';
          $.pfAjaxUserSystemVars.password_err = '<?php echo esc_html__('Please write password','pointfindert2d');?>';
          })(jQuery);
        </script>

        <div class="golden-forms wrapper mini">
          <div id="pflgcontainer-overlay" class="pftrwcontainer-overlay"></div>
          <form id="pf-ajax-login-form">
            <div class="pfmodalclose">
              <i class="pfadmicon-glyph-707"></i>
            </div>

            <div class="pfsearchformerrors">
              <ul></ul>
              <a class="button pfsearch-err-button"><?php echo esc_html__('CLOSE','pointfindert2d');?></a>
            </div>

            <div class="form-title">
              <h2><?php echo esc_html__('Social Account Settings','pointfindert2d');?></h2>
            </div>

            <div class="form-enclose">
              <div class="form-section">

                <section style="text-align: center;">
                  <?php if ($scontenttype == 2 || $scontenttype == 4) {?>
                    <section>
                      <label for="email_n" class="lbl-text"><?php echo esc_html__('Email:','pointfindert2d');?></label>
                      <label class="lbl-ui append-icon">
                        <input type="text" name="email_n" class="input" placeholder="<?php echo esc_html__('Enter Email','pointfindert2d');?>" autofocus />
                        <span>
                          <i class="pfadmicon-glyph-632"></i>
                        </span>
                      </label>
                      <small><?php echo esc_html__('Please enter your email address to complete your registration.','pointfindert2d');?></small>
                    </section>
                  <?php }?>
                  <button id="pfsocialnewaccountbutton" class="button blue"><?php echo esc_html__('CREATE as NEW ACCOUNT','pointfindert2d');?></button>

                  <div class="tagline">
                    <span><?php echo esc_html__('OR','pointfindert2d');?></span>
                  </div>
                </section>

                <section>
                  <div class="pointfinder-login-scbuttons">
                    <?php echo esc_html__('CONNECT WITH EXISTING ACCOUNT','pointfindert2d');?>
                  </div>
                </section>

                <section>
                  <label for="usernames" class="lbl-text"><?php echo esc_html__('Username:','pointfindert2d');?></label>
                  <label class="lbl-ui append-icon">
                    <input type="text" name="username" class="input" placeholder="<?php echo esc_html__('Enter Username','pointfindert2d');?>" autofocus />
                    <span>
                      <i class="pfadmicon-glyph-632"></i>
                    </span>
                  </label>
                </section>

                <section>
                  <label for="pass" class="lbl-text"><?php echo esc_html__('Password:','pointfindert2d');?></label>
                  <label class="lbl-ui append-icon">
                    <input type="password" name="password" class="input" placeholder="<?php echo esc_html__('Enter Password','pointfindert2d');?>" />
                    <span><i class="pfadmicon-glyph-465"></i></span>
                  </label>
                </section>

              </div>
            </div>

            <div class="form-buttons">

              <section>
                <input type="hidden" name="redirectpage" value="<?php echo $redirectpage;?>"/>
                <input type="hidden" name="ctype" value="<?php echo $scontenttype;?>"/>
                <input type="hidden" name="ctext" value="<?php echo $scontenttext;?>"/>
                <button id="pfsocialconnectbutton" class="button blue"><?php echo esc_html__('CONNECT NOW','pointfindert2d');?></button>
              </section>

            </div>

          </form>

        </div>
    <?php
        break;
    /**
    *Error Window
    **/
      case 'error': 
    	if(isset($_POST['errortype']) && $_POST['errortype']!=''){
    		$errortype = esc_attr($_POST['errortype']);
    	}
    	if (empty($errortype)) {
    		$errortype = 0;
    	}

    	if ($errortype == 1) {
    		$pfkeyarray = array(
    	      0 => esc_html__('Information','pointfindert2d'), 
    	      1 => esc_html__('Details;','pointfindert2d'), 
    	      2 => esc_html__('Close','pointfindert2d'), 
    	    );
    	}elseif($errortype == 0){
    		$pfkeyarray = array(
    	      0 => esc_html__('Error','pointfindert2d'), 
    	      1 => esc_html__('Error Details;','pointfindert2d'), 
    	      2 => esc_html__('Close','pointfindert2d'), 
    	    );
    	}

        ?>
        <div class="golden-forms wrapper mini">
          <form id="pf-ajax-cl-form">
              <div class="form-title">
                  <h2><?php echo $pfkeyarray[0];?></h2>
              </div>
              <div class="form-enclose">
                  <div class="form-section">
                      <section>
                          <label class="lbl-text"><strong><?php echo $pfkeyarray[1];?></strong>
                          </label>
                          <p id="pf-ajax-cl-details"></p>
                      </section>
                  </div>
              </div>
              <div class="form-buttons">
                  <section>
                      <button class="button blue" id="pf-ajax-cl-button">
                          <?php echo $pfkeyarray[2];?>
                      </button>
                  </section>
              </div>
          </form>
      </div>
      <?php
        break;

    /*Terms */
    case 'terms':
?>
<div class="golden-forms wrapper" style="margin-left:0!important; margin-right:0!important;max-width:650px!important;">
      <form id="pf-ajax-cl-form">
          <div class="form-enclose">
              <div>
                  <section>
                      <div class="pf-termsconditions-class">
                          <?php
                            $content_post = get_post($pid);
                            $content = $content_post->post_content;
                            $content = apply_filters('the_content', $content);
                            echo $content;
                            ?>
                      </div>
                  </section>
              </div>
          </div>
          <div class="form-buttons">
              <section>
                  <button class="button blue" style="margin:0 auto;" id="pf-ajax-terms-button">
                      <?php echo esc_html__('Return to Register','pointfindert2d');?>
                  </button>
              </section>
          </div>
      </form>
  </div>
<?php
    break;
    	}
    die();
    }
}
?>