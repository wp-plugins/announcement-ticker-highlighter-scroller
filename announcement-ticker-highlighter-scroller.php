<?php

/*
Plugin Name: Announcement ticker highlighter scroller
Plugin URI: http://gopi.coolpage.biz/demo/2009/09/06/announcement-ticker-highlighter-scroller/
Description: This plug-in will display the announcement with highlighter scroller. It gradually reveals each message into view from bottom to top.
Version: 3.0
Author: Gopi R
Author URI: http://gopi.coolpage.biz/demo/about/
Donate link: http://gopi.coolpage.biz/demo/2009/09/06/announcement-ticker-highlighter-scroller/
*/

global $wpdb, $wp_version;
define("WP_g_aths_TABLE", $wpdb->prefix . "g_aths_plugin");

function g_aths_announcement()
{
	global $wpdb;
	$data = $wpdb->get_results("select g_aths_text from ".WP_g_aths_TABLE." where g_aths_status='YES' ORDER BY g_aths_order");
	if ( ! empty($data) ) 
	{
		$count = 0; 
		foreach ( $data as $data ) 
		{
			$g_athscontent = $data->g_aths_text;
			$g_aths = $g_aths . "g_aths_contents[$count]='$g_athscontent';";
			$count++;
		}
	}
	?>
<script src="<?php echo get_option('siteurl'); ?>/wp-content/plugins/announcement-ticker-highlighter-scroller/announcement-ticker-highlighter-scroller.js" type="text/javascript"></script>
<script type="text/javascript">
	var g_aths_contents=new Array()
	<?php echo $g_aths; ?>
	
	var g_aths_width="<?php echo get_option('g_aths_width'); ?>px"
	var g_aths_height="<?php echo get_option('g_aths_height'); ?>px"
	var g_aths_css="<?php echo get_option('g_aths_css'); ?>"
	var g_aths_delay=<?php echo get_option('g_aths_delay'); ?> //delay btw messages
	var g_aths_speed=<?php echo get_option('g_aths_speed'); ?> //2 pixels at a time.
	var g_aths_highlightcolor="<?php echo get_option('g_aths_highlightcolor'); ?>"
	var g_aths_textcolor="<?php echo get_option('g_aths_textcolor'); ?>"
	
	document.write('<style>#g_aths_bg a{color:'+g_aths_textcolor+'}</style>')
	document.write('<div style="position:relative;left:0px;top:5px; width:'+g_aths_width+'; height:'+g_aths_height+';'+g_aths_css+'">')
	document.write('<span id="g_aths_bg" style="position:absolute;left:0;top:0;color:'+g_aths_textcolor+'; width:'+g_aths_width+'; height:'+g_aths_height+';padding: 4px"></span><span id="g_aths_highlighter" style="position:absolute;left:0;top:0;clip:rect(auto auto auto 0px); background-color:'+g_aths_highlightcolor+'; width:'+g_aths_width+';height:'+g_aths_height+';padding: 4px"></span>')
	document.write('</div>')
	g_aths_startcontent();
	//if (document.all || document.getElementById)
	//window.onload=g_aths_startcontent
	</script>
<?php
}

function g_aths_deactivate() 
{
	delete_option('g_aths_title');
	delete_option('g_aths_title_display');
	delete_option('g_aths_width');
	delete_option('g_aths_height');
	delete_option('g_aths_css');
	delete_option('g_aths_delay');
	delete_option('g_aths_speed');
	delete_option('g_aths_highlightcolor');
	delete_option('g_aths_textcolor');
}

function g_aths_activation() 
{
	global $wpdb;
	
	if($wpdb->get_var("show tables like '". WP_g_aths_TABLE . "'") != WP_g_aths_TABLE) 
	{
		$wpdb->query("
			CREATE TABLE IF NOT EXISTS `". WP_g_aths_TABLE . "` (
			  `g_aths_id` int(11) NOT NULL auto_increment,
			  `g_aths_text` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
			  `g_aths_order` int(11) NOT NULL default '0',
			  `g_aths_status` char(3) NOT NULL default 'No',
			  `g_aths_date` datetime NOT NULL default '0000-00-00 00:00:00',
			  PRIMARY KEY  (`g_aths_id`) )
			");
		$sSql = "INSERT INTO `". WP_g_aths_TABLE . "` (`g_aths_text`, `g_aths_order`, `g_aths_status`, `g_aths_date`)"; 
		$sSql = $sSql . "VALUES ('This is sample text for announcement ticker highlighter scroller - This is sample text for announcement ticker highlighter scroller.', '1', 'YES', '0000-00-00 00:00:00');";
		$wpdb->query($sSql);
	}
	add_option('g_aths_title', "Announcement");
	add_option('g_aths_title_display', "YES");
	add_option('g_aths_width', "175");
	add_option('g_aths_height', "85");
	add_option('g_aths_css', "font: Verdana; color:black");
	add_option('g_aths_delay', "3000");
	add_option('g_aths_speed', "2");
	add_option('g_aths_highlightcolor', "#D7F4F4");
	add_option('g_aths_textcolor', "#000000");
}

function g_aths_admin_options() 
{
	global $wpdb;
	?>

<div class="wrap">
  <?php
    $title = __('Announcement ticker highlighter scroller');
    $mainurl = get_option('siteurl')."/wp-admin/options-general.php?page=announcement-ticker-highlighter-scroller/announcement-ticker-highlighter-scroller.php";

	include_once("extra.php");
    $DID=@$_GET["DID"];
    $AC=@$_GET["AC"];
    $submittext = "Insert Message";

	if($AC <> "DEL" and trim($_POST['g_aths_text']) <>"")
    {
			if($_POST['g_aths_id'] == "" )
			{
					$sql = "insert into ".WP_g_aths_TABLE.""
					. " set `g_aths_text` = '" . mysql_real_escape_string(trim($_POST['g_aths_text']))
					. "', `g_aths_order` = '" . $_POST['g_aths_order']
					. "', `g_aths_status` = '" . $_POST['g_aths_status']
					. "'";	
			}
			else
			{
					$sql = "update ".WP_g_aths_TABLE.""
					. " set `g_aths_text` = '" . mysql_real_escape_string(trim($_POST['g_aths_text']))
					. "', `g_aths_order` = '" . $_POST['g_aths_order']
					. "', `g_aths_status` = '" . $_POST['g_aths_status']
					. "' where `g_aths_id` = '" . $_POST['g_aths_id'] 
					. "'";	
			}
			$wpdb->get_results($sql);
    }
    
    if($AC=="DEL" && $DID > 0)
    {
        $wpdb->get_results("delete from ".WP_g_aths_TABLE." where g_aths_id=".$DID);
    }
    
    if($DID<>"" and $AC <> "DEL")
    {
        //select query
        $data = $wpdb->get_results("select * from ".WP_g_aths_TABLE." where g_aths_id=$DID limit 1");
    
        //bad feedback
        if ( empty($data) ) 
        {
           echo "<div id='message' class='error'><p>No data available! use below form to create!</p></div>";
            return;
        }
        
        $data = $data[0];
        
        //encode strings
        if ( !empty($data) ) $g_aths_id_x = htmlspecialchars(stripslashes($data->g_aths_id)); 
        if ( !empty($data) ) $g_aths_text_x = htmlspecialchars(stripslashes($data->g_aths_text));
        if ( !empty($data) ) $g_aths_status_x = htmlspecialchars(stripslashes($data->g_aths_status));
		if ( !empty($data) ) $g_aths_order_x = htmlspecialchars(stripslashes($data->g_aths_order));
        
        $submittext = "Update Message";
    }
    ?>
  <h2><?php echo wp_specialchars( $title ); ?></h2>
  <div align="left" style="padding-top:5px;padding-bottom:5px;"> <a href="options-general.php?page=announcement-ticker-highlighter-scroller/announcement-ticker-highlighter-scroller.php">Manage Page</a> <a href="options-general.php?page=announcement-ticker-highlighter-scroller/setting.php">Setting Page</a> </div>
  <script language="JavaScript" src="<?php echo get_option('siteurl'); ?>/wp-content/plugins/announcement-ticker-highlighter-scroller/setting.js"></script>
  <script language="JavaScript" src="<?php echo get_option('siteurl'); ?>/wp-content/plugins/announcement-ticker-highlighter-scroller/noenter.js"></script>
  <form name="form_aths" method="post" action="<?php echo $mainurl; ?>" onsubmit="return aths_submit()"  >
    <table width="100%">
      <tr>
        <td colspan="3" align="left" valign="middle">Enter the message:</td>
      </tr>
      <tr>
        <td colspan="2" align="left" valign="middle"><textarea name="g_aths_text" cols="70" rows="8" id="g_aths_text"><?php echo $g_aths_text_x; ?></textarea></td>
        <td width="40%" rowspan="3" align="center" valign="top"><?php if (function_exists (timepass)) timepass(); ?>        </td>
      </tr>
      <tr>
        <td align="left" valign="middle">Display Status:</td>
        <td align="left" valign="middle">Display Order:</td>
      </tr>
      <tr>
        <td width="20%" align="left" valign="middle"><select name="g_aths_status" id="g_aths_status">
            <option value="">Select</option>
            <option value='YES' <?php if($g_aths_status_x=='YES') { echo 'selected' ; } ?>>Yes</option>
            <option value='NO' <?php if($g_aths_status_x=='NO') { echo 'selected' ; } ?>>No</option>
          </select>        </td>
        <td width="40%" align="left" valign="middle"><input name="g_aths_order" type="text" id="g_aths_order" size="10" value="<?php echo $g_aths_order_x; ?>" maxlength="3" /></td>
      </tr>
      <tr>
        <td height="35" colspan="3" align="left" valign="bottom"><input name="publish" lang="publish" class="button-primary" value="<?php echo $submittext?>" type="submit" />
          <input name="publish" lang="publish" class="button-primary" onclick="_g_aths_redirect()" value="Cancel" type="button" /> 
          (Enter key not allow, use &lt;br&gt; tage to break) </td>
      </tr>
      <input name="g_aths_id" id="g_aths_id" type="hidden" value="<?php echo $g_aths_id_x; ?>">
    </table>
  </form>
  <div class="tool-box">
    <?php
	$data = $wpdb->get_results("select * from ".WP_g_aths_TABLE." order by g_aths_order");
	if ( empty($data) ) 
	{ 
		echo "<div id='message' class='error'>No data available! use below form to create!</div>";
		return;
	}
	?>
    <form name="frm_hsa" method="post">
      <table width="100%" class="widefat" id="straymanage">
        <thead>
          <tr>
            <th width="4%" align="left" scope="col">ID
              </td>
            <th width="68%" align="left" scope="col">Message
              </td>
            <th width="8%" align="left" scope="col"> Order
              </td>
            <th width="7%" align="left" scope="col">Display
              </td>
            <th width="13%" align="left" scope="col">Action
              </td>
          </tr>
        </thead>
        <?php 
        $i = 0;
        foreach ( $data as $data ) { 
		if($data->g_aths_status=='YES') { $displayisthere="True"; }
        ?>
        <tbody>
          <tr class="<?php if ($i&1) { echo'alternate'; } else { echo ''; }?>">
            <td align="left" valign="middle"><?php echo(stripslashes($data->g_aths_id)); ?></td>
            <td align="left" valign="middle"><?php echo(stripslashes($data->g_aths_text)); ?></td>
            <td align="left" valign="middle"><?php echo(stripslashes($data->g_aths_order)); ?></td>
            <td align="left" valign="middle"><?php echo(stripslashes($data->g_aths_status)); ?></td>
            <td align="left" valign="middle"><a href="options-general.php?page=announcement-ticker-highlighter-scroller/announcement-ticker-highlighter-scroller.php&DID=<?php echo($data->g_aths_id); ?>">Edit</a> &nbsp; <a onClick="javascript:_hsadelete('<?php echo($data->g_aths_id); ?>')" href="javascript:void(0);">Delete</a> </td>
          </tr>
        </tbody>
        <?php $i = $i+1; } ?>
        <?php if($displayisthere<>"True") { ?>
        <tr>
          <td colspan="5" align="center" style="color:#FF0000" valign="middle">No Announcement available with display status 'Yes'!' </td>
        </tr>
        <?php } ?>
      </table>
    </form>
    <div align="left" style="padding-top:10px;padding-bottom:10px;"> <a href="options-general.php?page=announcement-ticker-highlighter-scroller/announcement-ticker-highlighter-scroller.php">Manage Page</a> <a href="options-general.php?page=announcement-ticker-highlighter-scroller/setting.php">Setting Page</a> </div>
    <h2><?php echo wp_specialchars( 'Paste the below code to your desired template location!' ); ?></h2>
    <div style="padding-top:7px;padding-bottom:7px;"> <code style="padding:7px;"> &lt;?php if (function_exists (g_aths_announcement)) g_aths_announcement(); ?&gt; </code></div>
  </div>
</div>
<?php
}

function g_aths_add_to_menu() 
{
	add_options_page('Game Movie Auto 3D | Announcement ticker highlighter scroller', 'Announcement ticker highlighter scroller', 7, __FILE__, 'g_aths_admin_options' );
	add_options_page('Game Movie Auto 3D | Announcement ticker highlighter scroller', '', 0, "announcement-ticker-highlighter-scroller/setting.php",'' );
}

function g_aths_widget($args) 
{
	extract($args);
	echo $before_widget . $before_title;
	echo get_option('g_aths_title');
	echo $after_title;
	g_aths_announcement();
	echo $after_widget;
}

function g_aths_control()
{
	echo '<p>Announcement ticker highlighter scroller.<br> To change the setting goto Announcement ticker highlighter scroller link under SETTING tab.';
	echo ' <a href="options-general.php?page=announcement-ticker-highlighter-scroller/setting.php">';
	echo 'click here</a></p>';
}

function g_aths_widget_init() 
{
  	register_sidebar_widget(__('Announcement ticker highlighter scroller'), 'g_aths_widget');   
	
	if(function_exists('register_sidebar_widget')) 	
	{
		register_sidebar_widget('Announcement ticker highlighter scroller', 'g_aths_widget');
	}
	
	if(function_exists('register_widget_control')) 	
	{
		register_widget_control(array('Announcement ticker highlighter scroller', 'widgets'), 'g_aths_control',500,400);
	} 
}

add_action("plugins_loaded", "g_aths_widget_init");
register_activation_hook(__FILE__, 'g_aths_activation');
add_action('admin_menu', 'g_aths_add_to_menu');
register_deactivation_hook( __FILE__, 'g_aths_deactivate' );
?>
