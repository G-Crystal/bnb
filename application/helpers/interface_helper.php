<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	// ============= Independent Function ============= //

function that(){
	return $CI =& get_instance();
}

function queue_style($styles){
	$link_open = '<link rel="stylesheet" href="';
	$link_close = '" />';
	$links = '';
	if(  $styles && is_array($styles) ){
		foreach ($styles as $key => $value) {
			$links .= $link_open.$value.$link_close;
		}
	}
	echo $links;
}

function queue_script($styles){
	$link_open = '<script src="';
	$link_close = '" /></script>';
	$links = '';
	if(  $styles && is_array($styles) ){
		foreach ($styles as $key => $value) {
			$links .= $link_open.$value.$link_close;
		}
	}
	echo $links;
}

function get_view($location) {  
	if (file_exists(APPPATH.'views/'.$location.EXT)){
   		that()->load->view($location);
   	}else{
   		echo 'ERROR: '.$location.' not found.';
   	}
}

function get_view_html($location) {  
	if (file_exists(APPPATH.'views/'.$location)){
   		that()->load->view($location);
   	}else{
   		echo 'ERROR: '.$location.' not found.';
   	}
}

function print_pre($var){
	echo '<pre>';
	print_r($var);
	echo '</pre>';
}

function dropDown_btn( $name, $selected=null, $color='success', $options=array() ){
	

	// Get dropdown settings
	$query = that()->helper_model->query_table( 'menu_value,menu_type','tbl_menus','WHERE menu_name = "'.$name.'"','row_array' );
	// check menu if exist.
	if( empty($query) ){
		echo '<option>Error: '.$name.' not found. </option>';
		return false;
	}
	$options = array_merge($options,array('get_selected'=>true));
	//check menu type
	if( $query['menu_type'] == 'custom' ){
		$data = custom_dropDown( unserialize($query['menu_value']), $name, $selected, 'list', $options );
	}else if( $query['menu_type'] == 'table' ){
		$data = table_dropDown( unserialize($query['menu_value']), $name, $selected, 'list', $options );
	}
	$result = '<button data-toggle="dropdown" class="btn btn-'.$color.' btn-sm dropdown-toggle">
					<span class="ace-icon fa fa-caret-down icon-on-right"></span>
					'.$data['selected'].'			
				</button>

				<ul class="dropdown-menu dropdown-'.$color.' dropdown-menu-right">';

	echo $result.$data['list'].'</ul>';
}

function getDropDown( $name, $selected=null, $output='option', $options=array() ){
	// Get dropdown settings
	$query = that()->helper_model->query_table( 'menu_value,menu_type','tbl_menus','kWHERE menu_name = "'.$name.'"','row_array' );
	// check menu if exist.
	if( empty($query) ){
		return '<option>Error: '.$name.' not found. </option>';
		return false;
	}
	//check menu type
	if( $query['menu_type'] == 'custom' ){
		return custom_dropDown( unserialize($query['menu_value']), $name, $selected, $output, $options );
	}else if( $query['menu_type'] == 'table' ){
		return table_dropDown( unserialize($query['menu_value']), $name, $selected, $output, $options );
	}
}

function dropDown( $name, $selected=null, $output='option', $options=array() ){
	// Get dropdown settings
	$query = that()->helper_model->query_table( 'menu_value,menu_type','tbl_menus','WHERE menu_name = "'.$name.'"','row_array' );
	// check menu if exist.
	if( empty($query) ){
		echo '<option>Error: '.$name.' not found. </option>';
		return false;
	}
	//check menu type
	if( $query['menu_type'] == 'custom' ){
		echo custom_dropDown( unserialize($query['menu_value']), $name, $selected, $output, $options );
	}else if( $query['menu_type'] == 'table' ){
		echo table_dropDown( unserialize($query['menu_value']), $name, $selected, $output, $options );
	}
}

function custom_dropDown( $menu_list, $name=null, $selected=null, $output='option', $options=array() ){
	$filter = ( isset($options['filter']) ) ? $options['filter'] : null;
	$default = ( isset($options['default']) ) ? $options['default'] : '';
	$sort = ( isset($options['sort']) ) ? $options['sort'] : null; // asc or desc
	$sortby = ( isset($options['sortby']) ) ? $options['sortby'] : 'value'; // key or value of array
	
	$menus = $menu_list;
	$data_items = array();
	if( $name != 'custom' ){
		$items = explode(';', trim(preg_replace('/\s+/', '',$menus['menu_data'])));

		foreach ($items as $key => $val) {
			$data_item = explode('|', $val);
			$item_value = ( isset($data_item[0]) ? $data_item[0] : '' );
			$item_name = ( isset($data_item[1]) ? $data_item[1] : '' );
			@$res = array( 
				'value' => $item_value,
				'menu_name' => $item_name
			);
			array_push($data_items, $res);
		}
	}else{
		foreach ($menus as $key => $value) {
			@$res = array(
				'value' => $key,
				'menu_name' => $value
				);
			array_push($data_items, $res);
		}
	}
	// set sortby with its respective array key.
	if( $sortby == 'key' ){
		$sortby = 'value';
	}else if( $sortby == 'value' ){
		$sortby = 'menu_name';
	}

	// sort items
	if( $sort == 'asc' || $sort == 'ASC' ){
		usort($data_items, sort_array($sortby));
	}else if( $sort == 'desc' || $sort == 'DESC' ){ 
		usort($data_items, sort_array_desc($sortby));

	}	

	// Create Dropdown
	if( $output == 'option' ){
		if( ! $default ){
			$list = '<option value="">&nbsp;</option>';
		}else if( $default == 'NULL' || $default == 'null' ){
			$list = '';
		}else{
			$list = $default;
		}
	}else if( $output == 'grid' ){
		$list = array();
	}else $list = '';

	$get_selected = '';
	foreach ($data_items as $key => $value) {
		if( ! $filter || ! in_array( $value['value'], explode(',', $filter) ) )
			$list .= create_dropDown( $value['value'], $value['menu_name'], $selected, $output );

		// for dropDown_button only
		if( isset($options['get_selected']) && ( $value['value'] == $selected ) ){
			$get_selected = $value['menu_name'];
		}
	}

	if( isset($options['get_selected']) ){
		$res_array = array(
			'list' => $list,
			'selected' => $get_selected
			);

		return $res_array;
	}else{
		return $list;
	}

}

function user_info($id,$output=''){
	$user = that()->helper_model->query_table( "*","tbl_users","WHERE tbl_users.user_id = $id","row","JOIN tbl_user_infos ON tbl_user_infos.user_id = tbl_users.user_id" );
	$res = '';
	if( $user ){
		switch ($output) {
			case 'full-name':
				$res = $user->user_fname.' '.$user->user_lname;
				break;
			default:
				$res = $user;
				break;
		}
	}
	return $res;
}


function table_dropDown( $menu_list, $name, $selected, $output='option', $options ){
	$filter = ( isset($options['filter']) ) ? $options['filter'] : null; // separated with comma
	$default = ( isset($options['default']) ) ? $options['default'] : ''; // type null or NULL if no default or first option in list
	$separator = ( isset($options['separator']) ) ? $options['separator'] : ', ';
	$sort = ( isset($options['sort']) ) ? $options['sort'] : null; // asc or desc
	$sortby = ( isset($options['sortby']) ) ? $options['sortby'] : 'value'; // key or value of array
	$settings = $menu_list;
	// Prepare settings
	$where = '';
	$item_value = $settings['item_value'];
	$item_name = explode(',', $settings['item_name']);
	$first_name = ( isset($item_name[0]) ) ? $item_name[0] : '';
	$second_name = ( isset($item_name[1]) ) ? $item_name[1] : '';
	$select = $item_value.','.$settings['item_name'];
	$table_name = $settings['table_name'];
	$condition = $settings['menu_where'];

	// Check if table and fields exists
	if( that()->db->table_exists( $table_name ) ){
		if( ! that()->db->field_exists( $item_value, $table_name ) ){
			echo '<option>Error: Field '.$item_value.' does not exist</option>';
			return false;
		}else if( ! that()->db->field_exists( $first_name, $table_name ) ){
			echo '<option>Error: Field '.$first_name.' does not exist</option>';
			return false;
		}else if( ($second_name) && ! that()->db->field_exists( $second_name, $table_name ) ){
			echo '<option>Error: Field '.$second_name.' does not exist</option>';
			return false;
		}else if( count($item_name) > 2 ){
			echo '<option>Error: Only 2 value allowed in item name';
			return false;
		}
	}else{
		echo '<option>Error: Table '.$table_name.' does not exist</option>';
		return false;
	}

	// Create condition for WHERE
	if( $condition ){		
		$dum = explode(',', $condition);
		// must insert to another variable for next() function to work.
		$items = $dum;
		if( is_array($items)){
			$where = 'WHERE ';
			foreach ($items as $k => $v) {
				$item = explode('=', $v);

				// check condition field exist
				if( ! that()->db->field_exists( $item[0], $table_name ) ){
					echo '<option>Error: Field '.$item[0].' does not exist</option>';
					return false;
				}

				$where .= $item[0].' = "'.$item[1].'"';
				$where .= ( next($items) ) ? ' AND ' : '';			
			}
		}

	}

	$field = that()->db->list_fields($table_name)[0];
	if( ! $field )
		return false;
	if( $filter ){
		$action = ( $where ) ? ' AND ' : 'WHERE ';
		$where .= $action.$field.' NOT IN ("'.$filter.'")';
	}

	// Get Menu
	$menu = that()->helper_model->query_table( $select,$table_name,$where,'array' );
	if( $sortby == 'key' ){
		$sortby = 'menu_id';
	}else if( $sortby == 'value' ){
		$sortby = 'menu_name';
	}
	// sort items
	if( $sort == 'asc' || $sort == 'ASC' ){
		usort($menu, sort_array($sortby));
	}else if( $sort == 'desc' || $sort == 'DESC' ){
		usort($menu, sort_array_desc($sortby));
	}

	// Create Dropdown
	if( $output == 'option' ){
		if( ! $default ){
			$list = '<option value="">&nbsp;</option>';
		}else if( $default == 'NULL' || $default == 'null' ){
			$list = '';
		}else{
			$list = $default;
		}
	}else $list = '';
	
	$get_selected = '';
	$menu_var = $menu; //pass to another variable to use next() function.
	foreach ($menu_var as $key => $val) {		
		$name = $val[$first_name];
		$value = $val[$item_value];

		// check if item_name has 2 value separated by comma(,)
		if( $second_name )
			$name .= $separator.$val[$second_name];

		$list .= create_dropDown( $value, $name, $selected, $output );
		if( $output == 'grid' && next($menu_var) )
			$list .= ';';
		// for dropDown_button only
		if( isset($options['get_selected']) && ( $value == $selected ) ){
			$get_selected = $name;
		}

	}

	if( isset($options['get_selected']) ){
		$res_array = array(
			'list' => $list,
			'selected' => $get_selected
			);

		return $res_array;
	}else{
		return $list;
	}
}

// counter function for dropDown.
function create_dropDown( $value, $name, $selected, $output ){
	$select = '';
	switch ($output) {
		case 'grid':
			return $value.':'.$name;
			break;

		case 'list':
			if( $selected && ( $value == $selected ) )
				$select = 'class="active"';

			return '<li '.$select.'><a href="'.$value.'">'.$name.'</a></li>';
			break;

		case 'list_data':
			if( $selected && ( $value == $selected ) )
				$select = 'class="active"';

			return '<li '.$select.' data-value="'.$value.'" >'.$name.'</li>';
			break;
		
		default:
			if( $selected && ( $value == $selected ) )
				$select = 'selected="selected"';

			return '<option '.$select.' value="'.$value.'">'.$name.'</option>';
			break;
	}
}

function sort_array($key) {
    return function ($a, $b) use ($key) {
        return strnatcmp($a[$key], $b[$key]);
    };
}

function sort_array_desc($key) {
    return function ($a, $b) use ($key) {
        return strnatcmp($b[$key], $a[$key]);
    };
}



	// ========================== Ace Dependent Function ========================== //

function sidebar_menu( $menu_id ){
	//if( ! that()->session->userdata('localStorage') ){
		$menu_exist = that()->helper_model->row_exist(array('access_id'=>$menu_id,'access_status'=>0),'req_access');

		if( $menu_exist ){
			$query = that()->helper_model->query_table('access_value','req_access','WHERE access_id = "'.$menu_id.'"','single');
			$menu = unserialize($query);
			//print_pre($menu);
			$depth = 0;
			return '<ul class="nav nav-list">'.get_sidebar_menu( $menu,$depth ).'</ul>';
		}else echo 'Error: Menu does not exist.';
	//}
}

function sidebar_menu_ls( $menu,$active_link ){
	$menu = unserialize($menu);
	$depth = 0;
	return '<ul class="nav nav-list">'.get_sidebar_menu( $menu,$depth,$active_link ).'</ul>';
}

function get_sidebar_menu( $menu,$depth,$active_link=null ){
	$page_link = ( $active_link ) ? $active_link : that()->uri->uri_string();
	$data = '';
	foreach ($menu as $key => $value) {

		$id = ( isset($value['id']) ) ? $value['id'] : '';
		$name = ( isset($value['name']) ) ? $value['name'] : '';
		$link = ( isset($value['link']) ) ? $value['link'] : '';
		$icon = ( isset($value['icon']) ) ? $value['icon'] : '';
		$child = isset($value['children']) ? $value['children'] : '';
		$arrow = ( $child ) ? '<b class="arrow fa fa-angle-down"></b>' : '';
		$new_link = '<a href="'.$link.'">';
		$arrow = '';
		if( $name == 'Devlopers' && that()->input->get('admin') != 'developer' ){
			
		}else{

		$active = ( $link == $page_link ) ? 'active' : '';
		if( $child ){
			$new_link = '<a href="#" class="dropdown-toggle">';
			$arrow = '<b class="arrow fa fa-angle-down"></b>';
			$active = ( active_child($child,$page_link) ) ? 'open active' : '' ;
		}

		if( $depth > 0 ){
			$icon = ( $icon ) ? $icon : 'fa-caret-right';
		}

		$data .= '
			<li class="hover '.$active.'">
				'.$new_link.'
					<i class="menu-icon fa '.$icon.'"></i>
					<span class="menu-text"> '.ucfirst($name).' </span>

					'.$arrow.'
				</a>

				<b class="arrow"></b>
		';
		if( $child ) :
			$data .= '<ul class="submenu">'.get_sidebar_menu($child,$depth+1,$active_link).'</ul>';
		endif;
	}
	}

	return $data.'</li>';
}

// counter function for get_sidebar_menu
function active_child( $child,$page_link ){
	foreach ($child as $key => $value) {
		$link = ( isset($value['link']) ) ? $value['link'] : '';
		$children = isset($value['children']) ? $value['children'] : '';
		if( $page_link == $link || ( ( $children ) && active_child($children,$page_link) ) ){
			return true;
		}
	}
	return false;
}

function arrayToList($array,$type='list',$json=false){
	if( empty($array) ) return '';
	if( $json ) $array = json_decode($array);
	if( ! is_array($array) ) return 'Parameter 1 must be an array.';

	$res = '';
	if( $type == 'list' ){
		
		foreach ($array as $value) {
			$res .= '<li>'.$value.'</li>';
		}		
	}elseif ( $type == ', ' || $type == ' ,' || $type == ',' ) {
		$res = implode($type, $array);
	}


	return $res;
}

function checkAvatar($link){
	$locaiont = 'assets/uploads/';

	if( file_exists($link) ){
		return $link;
	}else{
		return $locaiont.'default-avatar.jpg';
	}
}