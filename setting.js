// JavaScript Document
function aths_submit()
{
	if(document.form_aths.g_aths_text.value=="")
	{
		alert("Please enter the text.")
		document.form_aths.g_aths_text.focus();
		return false;
	}
	else if(document.form_aths.g_aths_status.value=="")
	{
		alert("Please select the display status.")
		document.form_aths.g_aths_status.focus();
		return false;
	}
	else if(document.form_aths.g_aths_order.value=="")
	{
		alert("Please enter the display order, only number.")
		document.form_aths.g_aths_order.focus();
		return false;
	}
	else if(isNaN(document.form_aths.g_aths_order.value))
	{
		alert("Please enter the display order, only number.")
		document.form_aths.g_aths_order.focus();
		return false;
	}
}

function _hsadelete(id)
{
	if(confirm("Do you want to delete this record?"))
	{
		document.frm_hsa.action="options-general.php?page=announcement-ticker-highlighter-scroller/announcement-ticker-highlighter-scroller.php&AC=DEL&DID="+id;
		document.frm_hsa.submit();
	}
}	

function _g_aths_redirect()
{
	window.location = "options-general.php?page=announcement-ticker-highlighter-scroller/announcement-ticker-highlighter-scroller.php";
}