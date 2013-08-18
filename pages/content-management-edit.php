<div class="wrap">
<?php
$did = isset($_GET['did']) ? $_GET['did'] : '0';

// First check if ID exist with requested ID
$sSql = $wpdb->prepare(
	"SELECT COUNT(*) AS `count` FROM ".WP_g_aths_TABLE."
	WHERE `g_aths_id` = %d",
	array($did)
);
$result = '0';
$result = $wpdb->get_var($sSql);

if ($result != '1')
{
	?><div class="error fade"><p><strong>Oops, selected details doesn't exist.</strong></p></div><?php
}
else
{
	$g_aths_errors = array();
	$g_aths_success = '';
	$g_aths_error_found = FALSE;
	
	$sSql = $wpdb->prepare("
		SELECT *
		FROM `".WP_g_aths_TABLE."`
		WHERE `g_aths_id` = %d
		LIMIT 1
		",
		array($did)
	);
	$data = array();
	$data = $wpdb->get_row($sSql, ARRAY_A);
	
	// Preset the form fields
	$form = array(
		'g_aths_text' => $data['g_aths_text'],
		'g_aths_status' => $data['g_aths_status'],
		'g_aths_order' => $data['g_aths_order']
	);
}
// Form submitted, check the data
if (isset($_POST['g_aths_form_submit']) && $_POST['g_aths_form_submit'] == 'yes')
{
	//	Just security thingy that wordpress offers us
	check_admin_referer('g_aths_form_edit');
	
	$form['g_aths_text'] = isset($_POST['g_aths_text']) ? $_POST['g_aths_text'] : '';
	if ($form['g_aths_text'] == '')
	{
		$g_aths_errors[] = __('Please enter the announcement.', WP_g_aths_UNIQUE_NAME);
		$g_aths_error_found = TRUE;
	}

	$form['g_aths_status'] = isset($_POST['g_aths_status']) ? $_POST['g_aths_status'] : '';
	if ($form['g_aths_status'] == '')
	{
		$g_aths_errors[] = __('Please select the display status.', WP_g_aths_UNIQUE_NAME);
		$g_aths_error_found = TRUE;
	}
	
	$form['g_aths_order'] = isset($_POST['g_aths_order']) ? $_POST['g_aths_order'] : '';
	if ($form['g_aths_order'] == '')
	{
		$g_aths_errors[] = __('Please enter the display order, only number.', WP_g_aths_UNIQUE_NAME);
		$g_aths_error_found = TRUE;
	}

	//	No errors found, we can add this Group to the table
	if ($g_aths_error_found == FALSE)
	{	
		$sSql = $wpdb->prepare(
				"UPDATE `".WP_g_aths_TABLE."`
				SET `g_aths_text` = %s,
				`g_aths_status` = %s,
				`g_aths_order` = %s
				WHERE g_aths_id = %d
				LIMIT 1",
				array($form['g_aths_text'], $form['g_aths_status'], $form['g_aths_order'], $did)
			);
		$wpdb->query($sSql);
		
		$g_aths_success = 'Details was successfully updated.';
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
		<p><strong><?php echo $g_aths_success; ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/options-general.php?page=announcement-ticker-highlighter-scroller">Click here</a> to view the details</strong></p>
	</div>
	<?php
}
?>
<script language="JavaScript" src="<?php echo get_option('siteurl'); ?>/wp-content/plugins/announcement-ticker-highlighter-scroller/pages/setting.js"></script>
<script language="JavaScript" src="<?php echo get_option('siteurl'); ?>/wp-content/plugins/announcement-ticker-highlighter-scroller/pages/noenter.js"></script>
<div class="form-wrap">
	<div id="icon-edit" class="icon32 icon32-posts-post"><br></div>
	<h2><?php echo WP_g_aths_TITLE; ?></h2>
	<form name="g_aths_form" method="post" action="#" onsubmit="return g_aths_submit()"  >
      <h3>Update details</h3>
	  
	  <label for="tag-txt">Announcement</label>
      <textarea name="g_aths_text" id="g_aths_text" cols="100" rows="6"><?php echo esc_html(stripslashes($form['g_aths_text'])); ?></textarea>
      <p>Please enter your announcement text.</p>
      
      <label for="tag-txt">Display status</label>
      <select name="g_aths_status" id="g_aths_status">
        <option value=''>Select</option>
		<option value='YES' <?php if($form['g_aths_status']=='YES') { echo 'selected="selected"' ; } ?>>Yes</option>
        <option value='NO' <?php if($form['g_aths_status']=='NO') { echo 'selected="selected"' ; } ?>>No</option>
      </select>
      <p>Do you want to show this announcement?</p>
	  
	  <label for="tag-txt">Display order</label>
	  <input name="g_aths_order" type="text" id="g_aths_order" value="<?php echo $form['g_aths_order']; ?>" maxlength="3" />
	  <p>Please enter your display order.</p>
	  
      <input name="g_aths_id" id="g_aths_id" type="hidden" value="">
      <input type="hidden" name="g_aths_form_submit" value="yes"/>
      <p style="padding-top:8px;padding-bottom:8px;">
        <input name="publish" lang="publish" class="button" value="Submit" type="submit" />
        <input name="publish" lang="publish" class="button" onclick="g_aths_redirect()" value="Cancel" type="button" />
        <input name="Help" lang="publish" class="button" onclick="g_aths_help()" value="Help" type="button" />
      </p>
	  <?php wp_nonce_field('g_aths_form_edit'); ?>
    </form>
</div>
<p class="description"><?php echo WP_g_aths_LINK; ?></p>
</div>