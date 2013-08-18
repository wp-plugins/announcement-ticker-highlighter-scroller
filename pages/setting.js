/**
 *     Announcement ticker highlighter scroller
 *     Copyright (C) 2011- 2013 www.gopiplus.com
 *     http://www.gopiplus.com/work/2010/07/18/announcement-ticker-highlighter-scroller/
 * 
 *     This program is free software: you can redistribute it and/or modify
 *     it under the terms of the GNU General Public License as published by
 *     the Free Software Foundation, either version 3 of the License, or
 *     (at your option) any later version.
 * 
 *     This program is distributed in the hope that it will be useful,
 *     but WITHOUT ANY WARRANTY; without even the implied warranty of
 *     MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *     GNU General Public License for more details.
 * 
 *     You should have received a copy of the GNU General Public License
 *     along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */


function g_aths_submit()
{
	if(document.g_aths_form.g_aths_text.value=="")
	{
		alert("Please enter the announcement.")
		document.g_aths_form.g_aths_text.focus();
		return false;
	}
	else if(document.g_aths_form.g_aths_status.value=="")
	{
		alert("Please select the display status.")
		document.g_aths_form.g_aths_status.focus();
		return false;
	}
	else if(document.g_aths_form.g_aths_order.value=="")
	{
		alert("Please enter the display order, only number.")
		document.g_aths_form.g_aths_order.focus();
		return false;
	}
	else if(isNaN(document.g_aths_form.g_aths_order.value))
	{
		alert("Please enter the display order, only number.")
		document.g_aths_form.g_aths_order.focus();
		return false;
	}
	_g_escapeVal(document.g_aths_form.g_aths_text,'<br>');
}

function g_aths_delete(id)
{
	if(confirm("Do you want to delete this record?"))
	{
		document.frm_g_aths_display.action="options-general.php?page=announcement-ticker-highlighter-scroller&ac=del&did="+id;
		document.frm_g_aths_display.submit();
	}
}	

function g_aths_redirect()
{
	window.location = "options-general.php?page=announcement-ticker-highlighter-scroller";
}

function g_aths_help()
{
	window.open("http://www.gopiplus.com/work/2010/07/18/announcement-ticker-highlighter-scroller/");
}

function _g_escapeVal(textarea,replaceWith)
{
textarea.value = escape(textarea.value) //encode textarea strings carriage returns
for(i=0; i<textarea.value.length; i++)
{
	//loop through string, replacing carriage return encoding with HTML break tag
	if(textarea.value.indexOf("%0D%0A") > -1)
	{
		//Windows encodes returns as \r\n hex
		textarea.value=textarea.value.replace("%0D%0A",replaceWith)
	}
	else if(textarea.value.indexOf("%0A") > -1)
	{
		//Unix encodes returns as \n hex
		textarea.value=textarea.value.replace("%0A",replaceWith)
	}
	else if(textarea.value.indexOf("%0D") > -1)
	{
		//Macintosh encodes returns as \r hex
		textarea.value=textarea.value.replace("%0D",replaceWith)
	}
}
textarea.value=unescape(textarea.value) //unescape all other encoded characters
}