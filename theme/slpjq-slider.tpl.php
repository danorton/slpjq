<?php
// $Id$
/**
 * @file
 * Template to display the SlipJaq slider
 *
 * Available variables:
 * - $logged_in: TRUE if a user is currently logged in.
 * - $title: The formatted title for the slider.
 * - $image_url: The URL of an image to display.
 * - $user_register: TRUE if a user is allowed to self-register.
 *
 * The following variables are not passed in, but may also be set as a customization:
 * - $slpjq_start_open: TRUE if to start with the slider already open.
 *
 * @see slpjq_theme()
 *
 * @code
 * This HTML is derived from a work by Jérémie Tisseau:
 * http://web-kreation.com/index.php/tutorials/nice-clean-sliding-login-panel-built-with-jquery/
 *
 * Modifications for Drupal © 2010 teeny-tiny websites
 * http://www.teenytinywebsites.com
 *
 * Distributed under the terms of the GNU General Public License, version 3.0
 * http://www.gnu.org/licenses/gpl-3.0.html
 * @endcode
 */

/**
 * @cond
 */
global $base_path;
?>
<div id="slpjq_toppanel">
  <?php if (!$logged_in): ?>
  <div id="slpjq_panel"<?php
    if ($slpjq_start_open) {
      print " style=\"display: block;\"";
    } ?>>
    <div class="slpjq-content slpjq-clearfix">
      <div class="slpjq-left">
      <?php if ($title || $image_url): ?>
        <?php if ($title): ?>
          <h1 class="slpjq-title"><?php print $title; ?></h1>
        <?php endif; ?>
        <?php if ($image_url): ?>
          <img class="slpjq-image" src="<?php print $image_url; ?>" />
        <?php endif; ?>
      <?php else: ?>
        &nbsp;
      <?php endif; ?>
      </div>
      <div class="slpjq-center">
        <h1><?php print t('Member login'); ?></h1>
        <?php print drupal_get_form('user_login_block'); ?>
        <p><a href="<?php echo $base_path ?>user/password"><?php print t('Request new password'); ?></a></p>
      </div>
      <?php if ($user_register): ?>
      <div class="slpjq-left slpjq-right">
        <h1><?php print t('Not a member yet?') . " " . t('Register!'); ?></h1>
        <?php print drupal_get_form('user_register'); ?>
      </div>
      <?php endif; ?>
    </div>
  </div> <!-- /#slpjq_panel -->
  <?php endif; // logged in ?>
  <div class="slpjq-tab">
    <ul class="<?php print $logged_in?"slpjq-logout":"slpjq-login"; ?>">
      <li class="slpjq-left">&nbsp;</li>
      <?php if ($logged_in): ?>
      <li><?php print t('Hello, !user',
            array('!user' =>
              "<a href=\"" . $base_path . "user\" title=\"" . t('View member profile') . "\">" . htmlspecialchars($user->name) . "</a>"));?></li>
      <li class="slpjq-sep"></li>
      <li><a id="slpjq_logout" class="slpjq-logout" href="<?php echo $base_path ?>logout"><?php print t('Log out'); ?></a></li>
      <?php else: ?>
      <li><?php print t('Hello, Guest'); ?></li>
      <li id="slpjq_toggle">
        <a id="slpjq_open"<?php
        if ($slpjq_start_open) {
          print " style=\"display: none;\"";
        } ?> class="slpjq-open" href="#"><?php
        print t('Log in');
        if ($user_register) {
          print ' | ' . t('Register');
        }
        ?></a>
        <a id="slpjq_close"<?php
        if (!$slpjq_start_open) {
          print " style=\"display: none;\"";
        } ?> class="slpjq-close" href="#"><?php print t('Close panel'); ?></a>
      </li>
      <?php endif; ?>
      <li class="slpjq-right">&nbsp;</li>
    </ul>
  </div> <!-- /#slpjq-tab -->
</div> <!-- /#slpjq_toppanel -->
<?php
/**
 * @endcond
 */
