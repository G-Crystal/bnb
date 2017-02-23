<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Dropdown_menus extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->driver('cache');

        $access = $this->session->userdata('user_access');
        if( ! hasAccess($access,[1]) )
            $this->load->view('base',array('content'=>'no_access_view'));
    }

    public function index()
    {
        $data = array(
            'content' => 'developers/dropdown_menus_view'
            );
        $this->load->view('base',$data);
    }

    public function save_menu(){
        $data = $this->input->post('data');
        $type = $this->input->post('type');
        if( $data ){
            $menu_settings = serializeToArray( $data );
            $name = ( $type == 'table' )  ? $menu_settings['menu_name'] : $menu_settings['custom_menu_name'] ;
            $menu_data = array(
                'menu_name' => $name,
                'menu_value' => serialize($menu_settings),
                'menu_type' => $type
            );

            if( $this->validate_menu( $name ) ){
                $this->db->update( 'tbl_menus', $menu_data, array( 'menu_name' => $name ) );
                echo 'updated';
            }else{
                $this->db->insert( 'tbl_menus', $menu_data );
                echo 'inserted';
            }

           
        }else return false;
    }

    public function delete_menu(){
        $id = $this->input->post('data');
        $this->db->trans_start();
        $this->db->update('tbl_menus',array('status'=>1),array('menu_id'=>$id));
        $this->db->trans_complete();

        if($this->db->trans_status()){
            echo 'Deleted';
        }else echo 'Something went wrong!';

    }

    public function validate_menu( $menu_name ){
        if( strcasecmp( $menu_name, 'custom' ) == 0 ) return true; // custom is reserve word for custom menu of dropDown Function.
        $name_exist = $this->helper_model->row_exist( array( 'menu_name'=>$menu_name ),'tbl_menus' );
        if( $name_exist )
            return true;
            return false;
    }

    public function get_data(){
        $id = $this->input->post('data');
        $data = $this->helper_model->query_table( 'menu_value','tbl_menus','WHERE menu_id = "'.$id.'"','single' );
        $menu = unserialize($data);

        echo json_encode($menu);
    }

    public function menu_name_exist(){
        if( $this->validate_menu( $this->input->post('name') ) ){
            echo 'true';
        }else echo 'false';
    }

}