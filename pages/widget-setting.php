<?php if(preg_match('#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF'])) { die('You are not allowed to call this page directly.'); } ?>
<div class="wrap">
  <div class="form-wrap">
    <div id="icon-edit" class="icon32 icon32-posts-post"><br>
    </div>
    <h2><?php _e('Announcement ticker highlighter scroller', 'announcement-ticker'); ?></h2>
	<h3><?php _e('Widget Setting', 'announcement-ticker'); ?></h3>
    <?php
	$g_aths_title = get_option('g_aths_title');
	$g_aths_width = get_option('g_aths_width');
	$g_aths_height = get_option('g_aths_height');
	$g_aths_css = get_option('g_aths_css');
	$g_aths_delay = get_option('g_aths_delay');
	$g_aths_speed = get_option('g_aths_speed');
	$g_aths_highlightcolor = get_option('g_aths_highlightcolor');
	$g_aths_textcolor = get_option('g_aths_textcolor');
	
	if (isset($_POST['g_aths_form_submit']) && $_POST['g_aths_form_submit'] == 'yes')
	{
		check_admin_referer('g_aths_form_setting');
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
		?>
		<div class="updated fade">
			<p><strong><?php _e('Details successfully updated.', 'announcement-ticker'); ?></strong></p>
		</div>
		<?php
	}
	?>
	<script language="JavaScript" src="<?php echo WP_g_aths_PLUGIN_URL; ?>/pages/setting.js"></script>
    <form name="ssg_form" method="post" action="">
      
	  <label for="tag-title"><?php _e('Enter widget title', 'announcement-ticker'); ?></label>
      <input name="g_aths_title" id="g_aths_title" type="text" value="<?php echo $g_aths_title; ?>" size="80" maxlength="100" />
      <p><?php _e('Please enter your widget title.', 'announcement-ticker'); ?></p>
      
	  <label for="tag-width"><?php _e('Width', 'announcement-ticker'); ?></label>
      <input name="g_aths_width" id="g_aths_width" type="text" value="<?php echo $g_aths_width; ?>" maxlength="3" />
      <p><?php _e('Please enter your announcement box width.', 'announcement-ticker'); ?> (Example: 175)</p>
      
	  <label for="tag-height"><?php _e('Height', 'announcement-ticker'); ?></label>
      <input name="g_aths_height" id="g_aths_height" type="text" value="<?php echo $g_aths_height; ?>" maxlength="3" />
      <p><?php _e('Please enter your announcement box height.', 'announcement-ticker'); ?> (Example: 85)</p>
	  
	  <label for="tag-height"><?php _e('Delay', 'announcement-ticker'); ?></label>
      <input name="g_aths_delay" id="g_aths_delay" type="text" value="<?php echo $g_aths_delay; ?>" maxlength="4" />
      <p><?php _e('Please enter your ticker box delay.', 'announcement-ticker'); ?> (Example: 3000)</p>
	  
	  <label for="tag-height"><?php _e('Speed', 'announcement-ticker'); ?></label>
      <input name="g_aths_speed" id="g_aths_speed" type="text" value="<?php echo $g_aths_speed; ?>" maxlength="4" />
      <p><?php _e('Please enter your ticker box speed.', 'announcement-ticker'); ?> (Example: 2)</p>
	  
	  <label for="tag-height"><?php _e('Highlight color', 'announcement-ticker'); ?></label>
      <input name="g_aths_highlightcolor" id="g_aths_highlightcolor" type="text" value="<?php echo $g_aths_highlightcolor; ?>" maxlength="7" />
      <p><?php _e('Please enter your ticker box highlight color.', 'announcement-ticker'); ?> (Example: #F0EFEE)</p>
	       
	  <label for="tag-height"><?php _e('Text color', 'announcement-ticker'); ?></label>
      <input name="g_aths_textcolor" id="g_aths_textcolor" type="text" value="<?php echo $g_aths_textcolor; ?>" maxlength="7" />
      <p><?php _e('Please enter your ticker box text color.', 'announcement-ticker'); ?> (Example: #DD4B39)</p>
	  
	  <label for="tag-height"><?php _e('Style', 'announcement-ticker'); ?></label>
      <input name="g_aths_css" id="g_aths_css" type="text" value="<?php echo $g_aths_css; ?>" maxlength="1000" size="80" />
      <p><?php _e('Please enter your ticker box css.', 'announcement-ticker'); ?> (Example: font: Verdana; color:black)</p>
	   
	  <p style="padding-bottom:5px;padding-top:5px;">
		  <input name="g_aths_submit" id="g_aths_submit" class="button" value="<?php _e('Submit', 'announcement-ticker'); ?>" type="submit" />
		  <input name="publish" lang="publish" class="button" onclick="g_aths_redirect()" value="<?php _e('Cancel', 'announcement-ticker'); ?>" type="button" />
		  <input name="Help" lang="publish" class="button" onclick="g_aths_help()" value="<?php _e('Help', 'announcement-ticker'); ?>" type="button" />
	  </p>
	  <input name="g_aths_form_submit" id="g_aths_form_submit" value="yes" type="hidden" />
	  <?php wp_nonce_field('g_aths_form_setting'); ?>
    </form>
  </div>
<p class="description">
	<?php _e('Check official website for more information', 'announcement-ticker'); ?>
	<a target="_blank" href="<?php echo WP_g_aths_FAV; ?>"><?php _e('click here', 'announcement-ticker'); ?></a>
</p>
</div>
