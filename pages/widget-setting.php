<div class="wrap">
  <div class="form-wrap">
    <div id="icon-edit" class="icon32 icon32-posts-post"><br>
    </div>
    <h2><?php echo WP_g_aths_TITLE; ?></h2>
	<h3>Widget setting</h3>
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
			<p><strong>Details successfully updated.</strong></p>
		</div>
		<?php
	}
	?>
	<script language="JavaScript" src="<?php echo get_option('siteurl'); ?>/wp-content/plugins/announcement-ticker-highlighter-scroller/pages/setting.js"></script>
    <form name="ssg_form" method="post" action="">
      
	  <label for="tag-title">Enter widget title</label>
      <input name="g_aths_title" id="g_aths_title" type="text" value="<?php echo $g_aths_title; ?>" size="80" maxlength="100" />
      <p>Please enter your widget title.</p>
      
	  <label for="tag-width">Width</label>
      <input name="g_aths_width" id="g_aths_width" type="text" value="<?php echo $g_aths_width; ?>" maxlength="3" />
      <p>Please enter your announcement box width. (Example: 175)</p>
      
	  <label for="tag-height">Height</label>
      <input name="g_aths_height" id="g_aths_height" type="text" value="<?php echo $g_aths_height; ?>" maxlength="3" />
      <p>Please enter your announcement box height. (Example: 85)</p>
	  
	  <label for="tag-height">Delay</label>
      <input name="g_aths_delay" id="g_aths_delay" type="text" value="<?php echo $g_aths_delay; ?>" maxlength="4" />
      <p>Please enter your ticker box delay. (Example: 3000)</p>
	  
	  <label for="tag-height">Speed</label>
      <input name="g_aths_speed" id="g_aths_speed" type="text" value="<?php echo $g_aths_speed; ?>" maxlength="4" />
      <p>Please enter your ticker box speed. (Example: 2)</p>
	  
	  <label for="tag-height">Highlight color</label>
      <input name="g_aths_highlightcolor" id="g_aths_highlightcolor" type="text" value="<?php echo $g_aths_highlightcolor; ?>" maxlength="7" />
      <p>Please enter your ticker box highlight color. (Example: #F0EFEE)</p>
	       
	  <label for="tag-height">Text color</label>
      <input name="g_aths_textcolor" id="g_aths_textcolor" type="text" value="<?php echo $g_aths_textcolor; ?>" maxlength="7" />
      <p>Please enter your ticker box text color. (Example: #DD4B39)</p>
	  
	  <label for="tag-height">Style</label>
      <input name="g_aths_css" id="g_aths_css" type="text" value="<?php echo $g_aths_css; ?>" maxlength="1000" size="80" />
      <p>Please enter your ticker box css. (Example: font: Verdana; color:black)</p>
	   
	  <p style="padding-bottom:5px;padding-top:5px;">
		  <input name="g_aths_submit" id="g_aths_submit" class="button" value="Submit" type="submit" />
		  <input name="publish" lang="publish" class="button" onclick="g_aths_redirect()" value="Cancel" type="button" />
		  <input name="Help" lang="publish" class="button" onclick="g_aths_help()" value="Help" type="button" />
	  </p>
	  <input name="g_aths_form_submit" id="g_aths_form_submit" value="yes" type="hidden" />
	  <?php wp_nonce_field('g_aths_form_setting'); ?>
    </form>
  </div>
  <p class="description"><?php echo WP_g_aths_LINK; ?></p>
</div>
