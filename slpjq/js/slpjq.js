// $Id$
//
// JavaScript slider commands
//
// Original Author: Jérémie Tisseau
// http://web-kreation.com/index.php/tutorials/nice-clean-sliding-login-panel-built-with-jquery/
//
// Modifications for Drupal © 2010 teeny-tiny websites
// http://www.teenytinywebsites.com
//
// Distributed under the terms of the GNU General Public License, version 3.0
// http://www.gnu.org/licenses/gpl-3.0.html

$(document).ready(function() {

  // Expand Panel
  $("#slpjq_open").click(function(){
    $("div#slpjq_panel").slideDown(Drupal.settings.slpjq.slidePeriod);

  });

  // Collapse Panel
  $("#slpjq_close").click(function(){
    $("div#slpjq_panel").slideUp(Drupal.settings.slpjq.slidePeriod);
  });

  // Switch buttons from "Log In | Join" to "Close Panel" on click
  $("#slpjq_toggle a").click(function(){
    $("#slpjq_toggle a").toggle();
  });

});
