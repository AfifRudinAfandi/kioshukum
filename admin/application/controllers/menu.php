<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Menu extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_menu');
    }

    function index()
    {
        $this->session_on();
        $data = array(
            'session'       => $this->session->userdata('admin'),
            'menu_id'       => '',
            'menu_title'    => '',
            'menu_link'     => '',
            'menu_description'     => '',
            'menu_icon'     => '',
            'is_parent'     => '',

            'editor_status'     => 'new',
            'title'             => 'Admin Panel',

            'data_menu'     => $this->m_menu->GetMenu()->result_array()
        );
        render_backend('admin/menu/index', $data);
    }

    function edit($id = 0)
    {
        $this->session_on();
        $data_menu = $this->m_menu->GetMenu("WHERE menu_id = '$id'")->result_array();
        $data = array(
            'session'             => $this->session->userdata('admin'),

            'menu_id'        => $data_menu[0]['menu_id'],
            'menu_title'     => $data_menu[0]['menu_title'],
            'menu_link'     => $data_menu[0]['menu_link'],
            'menu_description'     => $data_menu[0]['menu_description'],
            'menu_icon'        => $data_menu[0]['menu_icon'],
            'is_parent'     => $data_menu[0]['is_parent'],

            'editor_status'        => 'edit',
            'title'             => 'Admin Panel',

            'data_menu'     => $this->m_menu->GetMenu()->result_array()
        );
        render_backend('admin/menu/index', $data);
    }

    function save()
    {
        $this->session_on();
        if ($_POST) {

            $menu_id        = $this->input->post('menu_id');
            $menu_title        = $this->input->post('menu_title');
            $menu_link        = $this->input->post('menu_link');
            $menu_description        = $this->input->post('menu_description');
            $menu_icon        = $this->input->post('menu_icon');
            $is_parent        = $this->input->post('is_parent');
            $editor_status    = $this->input->post('editor_status');

            if ($editor_status == "new") {
                $data = array(
                    'menu_title'     => $menu_title,
                    'menu_link'        => $menu_link,
                    'menu_description'        => $menu_description,
                    'menu_icon'     => $menu_icon,
                    'is_parent'        => $is_parent,
                );
                $result = $this->m_menu->InsertData('tbl_menu', $data);
                if ($result == 1) {
                    redirect('menu/index', 'refresh');
                    $this->session->set_flashdata('message', '	<div class="alert alert-success">
														  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														  <strong>Success!</strong> data berhasil di simpan.
														</div>');
                } else {
                    echo "ERROR";
                }
            } else {
                $data = array(
                    'menu_id'         => $menu_id,
                    'menu_title'     => $menu_title,
                    'menu_link'        => $menu_link,
                    'menu_description'        => $menu_description,
                    'menu_icon'     => $menu_icon,
                    'is_parent'        => $is_parent,
                );
                $result = $this->m_menu->UpdateData('tbl_menu', $data, array('menu_id' => $menu_id));
                if ($result == 1) {
                    redirect('menu/index', 'refresh');
                    $this->session->set_flashdata('message', '	<div class="alert alert-success">
														  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														  <strong>Success!</strong> data berhasil di ubah.
														</div>');
                } else {
                    echo "ERROR";
                }
            }
        }
    }

    function delete($id = 0)
    {
        $this->session_on();
        $result = $this->m_menu->DeleteData('tbl_menu', array('menu_id' => $id));
        if ($result == 1) {
            redirect('menu/index', 'refresh');
            $this->session->set_flashdata('message', '	<div class="alert alert-success">
														  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														  <strong>Success!</strong> data berhasil di hapus.
														</div>');
        } else {
            echo "ERROR";
        }
    }

    function session_on()
    {
        if (!$this->session->userdata('admin')) {
            header('location:' . base_url() . 'login');
            exit(0);
        }
    }
}
