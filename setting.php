<div class="wrap">
  <h2><?php echo wp_specialchars( 'Announcement ticker highlighter scroller' ); ?></h2>
  <?php
global $wpdb, $wp_version;

include_once("extra.php");
$g_aths_title = get_option('g_aths_title');
$g_aths_width = get_option('g_aths_width');
$g_aths_height = get_option('g_aths_height');
$g_aths_css = get_option('g_aths_css');
$g_aths_delay = get_option('g_aths_delay');
$g_aths_speed = get_option('g_aths_speed');
$g_aths_highlightcolor = get_option('g_aths_highlightcolor');
$g_aths_textcolor = get_option('g_aths_textcolor');

if ($_POST['g_aths_submit']) 
{
	$g_aths_title = stripslashes($_POST['g_aths_title']);
	$g_aths_width = stripslashes($_POST['g_aths_width']);
	$g_aths_height = stripslashes($_POST['g_aths_height']);
	$g_aths_css = stripslashes($_POST['g_aths_css']);
	$g_aths_delay = stripslashes($_POST['g_aths_delay']);
	$g_aths_speed = stripslashes($_POST['g_aths_speed']);
	$g_aths_highlightcolor = stripslashes($_POST['g_aths_highlightcolor']);
	$g_aths_textcolor = stripslashes($_POST['g_aths_textcolor']);

	update_option('g_aths_title', $g_aths_title );
	update_option('g_aths_width', $g_aths_width );
	update_option('g_aths_height', $g_aths_height );
	update_option('g_aths_css', $g_aths_css );
	update_option('g_aths_delay', $g_aths_delay );
	update_option('g_aths_speed', $g_aths_speed );
	update_option('g_aths_highlightcolor', $g_aths_highlightcolor );
	update_option('g_aths_textcolor', $g_aths_textcolor );

}

?>
  <form name="form_aths" method="post" action="">
    <div align="left" style="padding-top:5px;padding-bottom:5px;"> <a href="options-general.php?page=announcement-ticker-highlighter-scroller/announcement-ticker-highlighter-scroller.php">Manage Page</a> <a href="options-general.php?page=announcement-ticker-highlighter-scroller/setting.php">Setting Page</a> </div>
    <table width="800" border="0" cellspacing="0" cellpadding="3">
      <tr>
        <td colspan="2" align="left" valign="bottom">Title: </td>
      </tr>
      <tr>
        <td colspan="2" align="left" valign="bottom"><input name="g_aths_title" type="text" value="<?php echo $g_aths_title; ?>"  id="g_aths_title" size="100" maxlength="100"></td>
      </tr>
      
      <tr align="left" valign="middle">
        <td width="314" valign="bottom">Width:</td>
        <td width="474" rowspan="12" align="center" valign="middle"><?php if (function_exists (timepass)) timepass(); ?>      
      </tr>
      <tr align="left" valign="middle">
        <td><input name="g_aths_width" type="text" value="<?php echo $g_aths_width; ?>"  id="g_aths_width" maxlength="5">        </td>
      </tr>
      <tr align="left" valign="middle">
        <td valign="bottom">Height:</td>
      </tr>
      <tr align="left" valign="middle">
        <td><input name="g_aths_height" type="text" value="<?php echo $g_aths_height; ?>"  id="g_aths_height" maxlength="5">        </td>
      </tr>
      <tr align="left" valign="middle">
        <td valign="bottom">Delay:</td>
      </tr>
      <tr>
        <td align="left" valign="middle"><input name="g_aths_delay" type="text" value="<?php echo $g_aths_delay; ?>"  id="g_aths_delay" maxlength="5"></td>
      </tr>
      <tr>
        <td align="left" valign="bottom">Speed:</td>
      </tr>
      <tr>
        <td align="left" valign="middle"><input name="g_aths_speed" type="text" value="<?php echo $g_aths_speed; ?>"  id="g_aths_speed" maxlength="5"></td>
      </tr>
      <tr>
        <td align="left" valign="bottom">Highlight color:</td>
      </tr>
      <tr>
        <td align="left" valign="middle"><input name="g_aths_highlightcolor" type="text" value="<?php echo $g_aths_highlightcolor; ?>"  id="g_aths_highlightcolor" maxlength="10"></td>
      </tr>
      <tr>
        <td align="left" valign="bottom">Text color:</td>
      </tr>
      <tr>
        <td align="left" valign="middle"><input name="g_aths_textcolor" type="text" value="<?php echo $g_aths_textcolor; ?>"  id="g_aths_textcolor" maxlength="10"></td>
      </tr>
      <tr>
        <td colspan="2" align="left" valign="bottom">Style:</td>
      </tr>
      <tr>
        <td colspan="2" align="left" valign="bottom"><input name="g_aths_css" type="text"  id="g_aths_css" value="<?php echo $g_aths_css; ?>" size="100" maxlength="270"></td>
      </tr>
      <tr>
        <td height="40" align="left" valign="bottom"><input name="g_aths_submit" id="g_aths_submit" lang="publish" class="button-primary" value="Update Setting" type="submit" /></td>
        <td align="center" valign="top">&nbsp;</td>
      </tr>
    </table>
  </form>
  <h2><?php echo wp_specialchars( 'Paste the below code to your desired template location!' ); ?></h2>
  <div style="padding-top:7px;padding-bottom:7px;"> <code style="padding:7px;"> &lt;?php if (function_exists (g_aths_announcement)) g_aths_announcement(); ?&gt; </code></div>
  <br />
  <div align="left" style="padding-top:10px;padding-bottom:5px;"> 
  <a href="options-general.php?page=announcement-ticker-highlighter-scroller/announcement-ticker-highlighter-scroller.php">Manage Page</a> 
  <a href="options-general.php?page=announcement-ticker-highlighter-scroller/setting.php">Setting Page</a> 
  </div>
  <br>
  Arrange the width & height to match the location(sidebar).<br>
  Plug-in created by <a target="_blank" href='http://gopi.coolpage.biz/demo/about/'>Gopi</a>.<br>
  <a target="_blank" href='http://gopi.coolpage.biz/demo/2009/09/06/announcement-ticker-highlighter-scroller/'>click here</a> to post suggestion or comments or how to improve this plugin.<br>
  <a target="_blank" href='http://gopi.coolpage.biz/demo/2009/09/06/announcement-ticker-highlighter-scroller/'>click here</a> to see my plugin demo.<br>
  <a target="_blank" href='http://gopi.coolpage.biz/demo/2009/09/06/announcement-ticker-highlighter-scroller/'>click here</a> To download my other plugins.<br>
  Clicking the above ad will not affect the site, to remove the ad simply remove this "timepass()" function from page!!<br>
  <br>
</div>
