<?php
/*
 * Drop-down Menu
 *
 * @access	public
 * @param	string
 * @param	array
 * @param	string
 * @param	string
 * @return		string
 */
function form_dropdown($name = '', $options = array(), $selected = array(), $extra = '',$default_value = FALSE) {
	if(!is_array($selected)) 	{
		$selected = array($selected);
	}

	// If no selected state was submitted we will attempt to set it automatically
	if(count($selected)===0)	{
		// If the form name appears in the $_POST array we have a winner!
		if (isset($_POST[$name])) {
			$selected = array($_POST[$name]);
		}
	}

	if($extra!='') {
		$extra = ' '.$extra;
	}
	
	$multiple = (count($selected) > 1 && strpos($extra, 'multiple') === FALSE) ? ' multiple="multiple"' : '';
	$form = '<select name="'.$name.'"'.$extra.$multiple.">\n";
	$form .= ($default_value) ? '<option value="">'.$default_value.'</option>\n' : '';

	foreach ($options as $key => $val)
	{
		$key = (string) $key;

		if (is_array($val))
		{
			$form .= '<optgroup label="'.$key.'">'."\n";
			foreach ($val as $optgroup_key => $optgroup_val)
			{
				$sel = (in_array($optgroup_key, $selected)) ? ' selected="selected"' : '';
				$form .= '<option value="'.$optgroup_key.'"'.$sel.'>'.(string) $optgroup_val."</option>\n";
			}
			$form .= '</optgroup>'."\n";
		}
		else
		{
			$sel = (in_array($key, $selected)) ? ' selected="selected"' : '';
			$form .= '<option value="'.$key.'"'.$sel.'>'.(string) $val."</option>\n";
		}
	}
	$form .= '</select>';
	return $form;
}
