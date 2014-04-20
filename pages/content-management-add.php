<?php if(preg_match('#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF'])) { die('You are not allowed to call this page directly.'); } ?>
<div class="wrap">
<?php
$g_aths_errors = array();
$g_aths_success = '';
$g_aths_error_found = FALSE;

// Preset the form fields
$form = array(
	'g_aths_text' => '',
	'g_aths_status' => '',
	'g_aths_order' => '',
	'g_aths_date' => '',
	'g_aths_id' => ''
);

// Form submitted, check the data
if (isset($_POST['g_aths_form_submit']) && $_POST['g_aths_form_submit'] == 'yes')
{
	//	Just security thingy that wordpress offers us
	check_admin_referer('g_aths_form_add');
	
	$form['g_aths_text'] = isset($_POST['g_aths_text']) ? $_POST['g_aths_text'] : '';
	if ($form['g_aths_text'] == '')
	{
		$g_aths_errors[] = __('Please enter the announcement.', 'announcement-ticker');
		$g_aths_error_found = TRUE;
	}

	$form['g_aths_status'] = isset($_POST['g_aths_status']) ? $_POST['g_aths_status'] : '';
	if ($form['g_aths_status'] == '')
	{
		$g_aths_errors[] = __('Please select the display status.', 'announcement-ticker');
		$g_aths_error_found = TRUE;
	}
	
	$form['g_aths_order'] = isset($_POST['g_aths_order']) ? $_POST['g_aths_order'] : '';
	if ($form['g_aths_order'] == '')
	{
		$g_aths_errors[] = __('Please enter the display order, only number.', 'announcement-ticker');
		$g_aths_error_found = TRUE;
	}

	//	No errors found, we can add this Group to the table
	if ($g_aths_error_found == FALSE)
	{
		$sql = $wpdb->prepare(
			"INSERT INTO `".WP_g_aths_TABLE."`
			(`g_aths_text`, `g_aths_status`, `g_aths_order`)
			VALUES(%s, %s, %s)",
			array($form['g_aths_text'], $form['g_aths_status'], $form['g_aths_order'])
		);
		$wpdb->query($sql);
		
		$g_aths_success = __('New details was successfully added.', 'announcement-ticker');
		
		// Reset the form fields
		$form = array(
			'g_aths_text' => '',
			'g_aths_status' => '',
			'g_aths_order' => '',
			'g_aths_date' => '',
			'g_aths_id' => ''
		);
	}
}

if ($g_aths_error_found == TRUE && isset($g_aths_errors[0]) == TRUE)
{
	?>
	<div class="error fade">
		<p><strong><?php echo $g_aths_errors[0]; ?></strong></p>
	</div>
	<?php
}
if ($g_aths_error_found == FALSE && strlen($g_aths_success) > 0)
{
	?>
	  <div class="updated fade">
		<p><strong><?php echo $g_aths_success; ?> 
		<a href="<?php echo WP_g_aths_ADMIN_URL; ?>"><?php _e('Click here to view the details', 'announcement-ticker'); ?></a></strong></p>
	  </div>
	  <?php
	}
?>
<script language="JavaScript" src="<?php echo WP_g_aths_PLUGIN_URL; ?>/pages/setting.js"></script>
<script language="JavaScript" src="<?php echo WP_g_aths_PLUGIN_URL; ?>/pages/noenter.js"></script>
<div class="form-wrap">
	<div id="icon-edit" class="icon32 icon32-posts-post"><br></div>
	<h2><?php _e('Announcement ticker highlighter scroller', 'announcement-ticker'); ?></h2>
	<form name="g_aths_form" method="post" action="#" onsubmit="return g_aths_submit()"  >
      <h3><?php _e('Add new details', 'announcement-ticker'); ?></h3>
      
	  <label for="tag-txt"><?php _e('Announcement', 'announcement-ticker'); ?></label>
      <textarea name="g_aths_text" id="g_aths_text" cols="100" rows="6"></textarea>
      <p><?php _e('Please enter your announcement text.', 'announcement-ticker'); ?></p>
      
      <label for="tag-txt"><?php _e('Display status', 'announcement-ticker'); ?></label>
      <select name="g_aths_status" id="g_aths_status">
        <option value=''>Select</option>
		<option value='YES'>Yes</option>
        <option value='NO'>No</option>
      </select>
      <p><?php _e('Do you want to show this announcement?', 'announcement-ticker'); ?></p>
	  
	  <label for="tag-txt"><?php _e('Display order', 'announcement-ticker'); ?></label>
	  <input name="g_aths_order" type="text" id="g_aths_order" value="" maxlength="3" />
	  <p><?php _e('Please enter your display order.', 'announcement-ticker'); ?></p>
	  
      <input name="g_aths_id" id="g_aths_id" type="hidden" value="">
      <input type="hidden" name="g_aths_form_submit" value="yes"/>
      <p style="padding-top:8px;padding-bottom:8px;">
        <input name="publish" lang="publish" class="button" value="<?php _e('Submit', 'announcement-ticker'); ?>" type="submit" />
        <input name="publish" lang="publish" class="button" onclick="g_aths_redirect()" value="<?php _e('Cancel', 'announcement-ticker'); ?>" type="button" />
        <input name="Help" lang="publish" class="button" onclick="g_aths_help()" value="<?php _e('Help', 'announcement-ticker'); ?>" type="button" />
      </p>
	  <?php wp_nonce_field('g_aths_form_add'); ?>
    </form>
</div>
<p class="description">
	<?php _e('Check official website for more information', 'announcement-ticker'); ?>
	<a target="_blank" href="<?php echo WP_g_aths_FAV; ?>"><?php _e('click here', 'announcement-ticker'); ?></a>
</p>
</div>