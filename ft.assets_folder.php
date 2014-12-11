<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Assets_folder_ft extends EE_Fieldtype {

    var $info = array(
        'name'      => 'Assets Folder',
        'version'   => '1.0'
    );

    // --------------------------------------------------------------------

		function display_field($data)
		{
			if (is_string($data) && $data != '' && $data[0] == '<')
			{
				return $data;
			}

			$field_options	= $this->_get_field_options($data);
			
			$values = '';
			if($data)
			{
				$values = decode_multi_field($data);
				$values = $values[0];
			}
			$r = form_fieldset('');
			$r .= '<label>'.form_dropdown($this->field_name, $field_options, $values).'</label>';
			$r .= form_fieldset_close();
			
			return $r;
		}

	
		function _get_field_options($data)
		{
			$field_options = array(''=>'');

			$this->EE->db->select('folder_id, folder_name, full_path');
			$this->EE->db->order_by('full_path', 'asc');
			$query = $this->EE->db->get('assets_folders');
			foreach ($query->result_array() as $row)
			{
				$level = substr_count ($row['full_path'],'/');
				$tab = '';
				for($i = 0; $i <= $level; $i++)
				{
					if($i > 0) $tab .= '&nbsp;&nbsp;&nbsp;&nbsp;';
				}
				$field_options[$row['folder_id']] = $tab . $row['folder_name'];
			}

			return $field_options;
		}
	
		function replace_tag($data, $params = array(), $tagdata = FALSE)
		{
			return $data;
		}
}