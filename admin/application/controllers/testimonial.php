<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Testimonial extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_testimonial');
    }

    function index()
    {
        $this->session_on();
        $data = array(
            'title'     => 'Admin Panel',
            'session'     => $this->session->userdata('admin'),
            'testimonial_category_data' => $this->m_testimonial->GetTestimonialCategory()->result_array(),
            'testimonial_category_id'           => '',
            'set_as_home'           => '',
            'testimonial_id'        => '',
            'testimonial_avatar'    => '',
            'testimonial_name'      => '',
            'testimonial_company'   => '',
            'testimonial'           => '',
            'testimonial_status'    => '',
            'editor_status'         => 'new',

            'data_testimonial' => $this->m_testimonial->GetTestimonial()->result_array()
        );
        render_backend('admin/testimonial/index', $data);;
    }

    function edit($id = 0)
    {
        $this->session_on();
        $data_testimonial = $this->m_testimonial->GetTestimonial("WHERE testimonial_id = '$id'")->result_array();

        /*end label to array*/
        $data = array(
            'session'         => $this->session->userdata('admin'),
            'testimonial_category_data' => $this->m_testimonial->GetTestimonialCategory()->result_array(),
            'testimonial_category_id'         => $data_testimonial[0]['testimonial_category_id'],
            'set_as_home'         => $data_testimonial[0]['set_as_home'],
            'testimonial_id'         => $data_testimonial[0]['testimonial_id'],
            'testimonial_avatar'         => $data_testimonial[0]['testimonial_avatar'],
            'testimonial_name'     => $data_testimonial[0]['testimonial_name'],
            'testimonial_company'     => $data_testimonial[0]['testimonial_company'],
            'testimonial'     => $data_testimonial[0]['testimonial'],
            'testimonial_status'     => $data_testimonial[0]['testimonial_status'],
            'editor_status'     => 'edit',
            'title'         => 'Admin Panel',

            'data_testimonial' => $this->m_testimonial->GetTestimonial()->result_array()
        );
        render_backend('admin/testimonial/index', $data);;
    }

    function save()
    {
        $this->session_on();
        if ($_POST) {
            $testimonial_category_id        = $this->input->post('testimonial_category_id');
            $set_as_home        = $this->input->post('set_as_home');
            $testimonial_id        = $this->input->post('testimonial_id');
            $testimonial_avatar        = $this->input->post('testimonial_avatar');
            $testimonial_name        = $this->input->post('testimonial_name');
            $testimonial_company    = $this->input->post('testimonial_company');
            $testimonial        = $this->input->post('testimonial');
            $testimonial_status        = $this->input->post('testimonial_status');
            $editor_status    = $this->input->post('editor_status');

            if ($editor_status == "new") {
                $data = array(
                    'set_as_home'     => $set_as_home,
                    'testimonial_category_id'     => $testimonial_category_id,
                    'testimonial_avatar'     => $testimonial_avatar,
                    'testimonial_name'     => $testimonial_name,
                    'testimonial_company'     => $testimonial_company,
                    'testimonial'     => $testimonial,
                    'testimonial_status'     => $testimonial_status,
                );
                $result = $this->m_testimonial->InsertData('tbl_testimonial', $data);
                if ($result == 1) {
                    redirect('testimonial/index', 'refresh');
                    $this->session->set_flashdata('message', '	<div class="alert alert-success">
														  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														  <strong>Success!</strong> data berhasil di simpan.
														</div>');
                } else {
                    echo "ERROR";
                }
            } else {
                $data = array(
                    'set_as_home'     => $set_as_home,
                    'testimonial_category_id'     => $testimonial_category_id,
                    'testimonial_avatar'     => $testimonial_avatar,
                    'testimonial_name'     => $testimonial_name,
                    'testimonial_company'     => $testimonial_company,
                    'testimonial'     => $testimonial,
                    'testimonial_status'     => $testimonial_status,
                );
                $result = $this->m_testimonial->UpdateData('tbl_testimonial', $data, array('testimonial_id' => $testimonial_id));
                if ($result == 1) {
                    redirect('testimonial/index', 'refresh');
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

    function delete($testimonial_id = 0)
    {
        $this->session_on();
        $result = $this->m_testimonial->DeleteData('tbl_testimonial', array('testimonial_id' => $testimonial_id));
        if ($result == 1) {
            redirect('testimonial/index', 'refresh');
            $this->session->set_flashdata('message', '	<div class="alert alert-success">
														  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														  <strong>Success!</strong> data berhasil di hapus.
														</div>');
        } else {
            echo "ERROR";
        }
    }

    function category()
    {
        $this->session_on();
        $data = array(
            'title'     => 'testimonial Category',
            'session'   => $this->session->userdata('admin'),
            'id'            => '',
            'testimonial_category_name'             => '',
            'testimonial_category_description'  => '',
            'editor_status' => 'new',

            'data_testimonial_category' => $this->m_testimonial->GetTestimonialCategory()->result_array()
        );
        render_backend('admin/testimonial/category', $data);
    }

    function category_edit($id = 0)
    {
        $this->session_on();
        $data_testimonial_category = $this->m_testimonial->GetTestimonialCategory("WHERE id = '$id'")->result_array();

        $data = array(
            'title'     => 'testimonial Category',
            'session'   => $this->session->userdata('admin'),

            'id'                            => $data_testimonial_category[0]['id'],
            'testimonial_category_name'             => $data_testimonial_category[0]['testimonial_category_name'],
            'testimonial_category_description'  => $data_testimonial_category[0]['testimonial_category_description'],
            'editor_status' => 'edit',

            'data_testimonial_category' => $this->m_testimonial->GetTestimonialCategory()->result_array()
        );
        render_backend('admin/testimonial/category', $data);
    }

    function category_save()
    {
        $this->session_on();
        if ($_POST) {
            $id     = $this->input->post('id');
            $testimonial_category_name      = $this->input->post('testimonial_category_name');
            $testimonial_category_description       = $this->input->post('testimonial_category_description');
            $editor_status      = $this->input->post('editor_status');

            if ($editor_status == "new") {
                $data = array(
                    'testimonial_category_name'     => $testimonial_category_name,
                    'testimonial_category_description'  => $testimonial_category_description,
                    'testimonial_category_slug'     => url_title($testimonial_category_name, '-', TRUE),
                );
                $result = $this->m_testimonial->InsertData('tbl_testimonial_category', $data);
                if ($result == 1) {
                    redirect('testimonial/category', 'refresh');
                    $this->session->set_flashdata('message', '  <div class="alert alert-success">
                                                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                          <strong>Success!</strong> data berhasil di simpan.
                                                        </div>');
                } else {
                    echo "ERROR";
                }
            } else {
                $data = array(
                    'testimonial_category_name'     => $testimonial_category_name,
                    'testimonial_category_description'  => $testimonial_category_description,
                    'testimonial_category_slug'     => url_title($testimonial_category_name, '-', TRUE),
                );
                $result = $this->m_testimonial->UpdateData('tbl_testimonial_category', $data, array('id' => $id));
                if ($result == 1) {
                    redirect('testimonial/category', 'refresh');
                    $this->session->set_flashdata('message', '  <div class="alert alert-success">
                                                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                              <strong>Success!</strong> data berhasil di ubah.
                                                            </div>');
                } else {
                    echo "ERROR";
                }
            }
        }
    }

    function category_delete($id = 0)
    {
        $this->session_on();
        $result = $this->m_testimonial->DeleteData('tbl_testimonial_category', array('id' => $id));
        if ($result == 1) {
            redirect('testimonial/category', 'refresh');
            $this->session->set_flashdata('message', '  <div class="alert alert-success">
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
