<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Landing extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_landing');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    function index()
    {
        $this->session_on();
        $data = array(
            'title'     => 'Admin Panel',
            'session'     => $this->session->userdata('admin'),
            'data_landing' => $this->m_landing->GetLanding()->result_array()
        );
        render_backend('admin/landing/index', $data);
    }
    function new()
    {
        $this->session_on();
        $data = array(
            'session'         => $this->session->userdata('admin'),

            'landing_id'         => '',
            'landing_name'         => '',

            'landing_slide'         => '',
            'data_slide_category' => $this->m_landing->GetSlideCategory()->result_array(),

            'landing_search' => '',
            'data_service_category' => $this->m_landing->GetServiceCategory()->result_array(),
            'landing_service_category' => '',

            'landing_lawyers' => '',
            'lawyers_list' => '',
            'data_lawyer_category' => $this->m_landing->GetLawyerCategory()->result_array(),

            'landing_work' => '',
            'work_list' => '',
            'data_work_category' => $this->m_landing->GetWorkCategory()->result_array(),

            'section1_on'    => '',
            's1_landing_title'    => '',
            's1_landing_content'    => '',

            'section2_on'    => '',
            's2_landing_title'    => '',
            's2_landing_icon1'    => '',
            's2_landing_icon2'    => '',
            's2_landing_icon3'    => '',
            's2_landing_title1'    => '',
            's2_landing_title2'    => '',
            's2_landing_title3'    => '',
            's2_landing_description1'    => '',
            's2_landing_description2'    => '',
            's2_landing_description3'    => '',

            'partner_on'       => '',
            'landing_partner'  => '',
            'data_pertner_category' => $this->m_landing->GetPartnerCategory()->result_array(),

            'testimonial_on'       => '',
            'landing_testimonial' => '',
            'data_testimonial_category' => $this->m_landing->GetTestimonialCategory()->result_array(),

            'landing_slug'              => '',
            'editor_status'     => 'new',
            'title'            => 'Admin Panel'
        );
        render_backend('admin/landing/editor', $data);
    }

    function edit($landing_id = 0)
    {
        $this->session_on();
        $data_landing = $this->m_landing->GetLanding("WHERE landing_id = '$landing_id'")->result_array();

        $data = array(
            'session'         => $this->session->userdata('admin'),
            
            'landing_id'         => $data_landing[0]['landing_id'],
            'landing_name'     => $data_landing[0]['landing_name'],

            'landing_slide'     => $data_landing[0]['landing_slide'],
            'data_slide_category' => $this->m_landing->GetSlideCategory()->result_array(),

            'landing_search'         => $data_landing[0]['landing_search'],
            'data_service_category' => $this->m_landing->GetServiceCategory()->result_array(),
            'landing_service_category' => $data_landing[0]['landing_service_category'],

            'landing_lawyers'         => $data_landing[0]['landing_lawyers'],
            'lawyers_list'         => $data_landing[0]['lawyers_list'],
            'data_lawyer_category' => $this->m_landing->GetLawyerCategory()->result_array(),

            'landing_work'         => $data_landing[0]['landing_work'],
            'work_list'         => $data_landing[0]['work_list'],
            'data_work_category' => $this->m_landing->GetWorkCategory()->result_array(),

            'section1_on'         => $data_landing[0]['section1_on'],
            's1_landing_title'         => $data_landing[0]['s1_landing_title'],
            's1_landing_content'     => $data_landing[0]['s1_landing_content'],

            'section2_on'     => $data_landing[0]['section2_on'],
            's2_landing_title'     => $data_landing[0]['s2_landing_title'],
            's2_landing_icon1'     => $data_landing[0]['s2_landing_icon1'],
            's2_landing_icon2'     => $data_landing[0]['s2_landing_icon2'],
            's2_landing_icon3'     => $data_landing[0]['s2_landing_icon3'],
            's2_landing_title1'     => $data_landing[0]['s2_landing_title1'],
            's2_landing_title2'     => $data_landing[0]['s2_landing_title2'],
            's2_landing_title3'     => $data_landing[0]['s2_landing_title3'],
            's2_landing_description1'     => $data_landing[0]['s2_landing_description1'],
            's2_landing_description2'     => $data_landing[0]['s2_landing_description2'],
            's2_landing_description3'     => $data_landing[0]['s2_landing_description3'],

            'partner_on'     => $data_landing[0]['partner_on'],
            'landing_partner'     => $data_landing[0]['landing_partner'],
            'data_pertner_category' => $this->m_landing->GetPartnerCategory()->result_array(),

            'testimonial_on'     => $data_landing[0]['testimonial_on'],
            'landing_testimonial'     => $data_landing[0]['landing_testimonial'],
            'data_testimonial_category' => $this->m_landing->GetTestimonialCategory()->result_array(),

            'landing_slug'     => $data_landing[0]['landing_slug'],
            'editor_status' => 'edit',
            'title'         => 'Admin Panel'
        );
        render_backend('admin/landing/editor', $data);
    }

    function save()
    {
        $this->session_on();

        if ($_POST) {
            $landing_id        = $this->input->post('landing_id');

            $landing_name        = $this->input->post('landing_name');
            $landing_shortdesc        = $this->input->post('landing_shortdesc');

            $landing_slide        = $this->input->post('landing_slide');
            $landing_service_category  = $this->input->post('landing_service_category');

            $landing_search        = $this->input->post('landing_search');

            $landing_lawyers        = $this->input->post('landing_lawyers');
            $lawyers_list        = $this->input->post('lawyers_list');

            $landing_work        = $this->input->post('landing_work');
            $work_list        = $this->input->post('work_list');

            $section1_on        = $this->input->post('section1_on');
            $s1_landing_title        = $this->input->post('s1_landing_title');
            $s1_landing_content        = $this->input->post('s1_landing_content');

            $section2_on        = $this->input->post('section2_on');
            $s2_landing_title        = $this->input->post('s2_landing_title');
            $s2_landing_icon1        = $this->input->post('s2_landing_icon1');
            $s2_landing_icon2        = $this->input->post('s2_landing_icon2');
            $s2_landing_icon3        = $this->input->post('s2_landing_icon3');
            $s2_landing_title1        = $this->input->post('s2_landing_title1');
            $s2_landing_title2        = $this->input->post('s2_landing_title2');
            $s2_landing_title3        = $this->input->post('s2_landing_title3');
            $s2_landing_description1        = $this->input->post('s2_landing_description1');
            $s2_landing_description2        = $this->input->post('s2_landing_description2');
            $s2_landing_description3        = $this->input->post('s2_landing_description3');

            $partner_on        = $this->input->post('partner_on');
            $landing_partner        = $this->input->post('landing_partner');

            $testimonial_on        = $this->input->post('testimonial_on');
            $landing_testimonial        = $this->input->post('landing_testimonial');

            $landing_slug        = $this->input->post('landing_slug');
            $editor_status     = $this->input->post('editor_status');

            if ($editor_status == "new") {

                $this->form_validation->set_rules('landing_slug', 'landing_slug', 'required|is_unique[tbl_landing.landing_slug]');

                if ($this->form_validation->run() == FALSE)
                {
                    redirect('landing/index', 'refresh');
                    $this->session->set_flashdata('message', 'landing title cant same');
                }

                $data = array(
                    'landing_name'         => $landing_name,
                    'landing_shortdesc'         => $landing_shortdesc,

                    'landing_slide'         => $landing_slide,

                    'landing_search'         => $landing_search,
                    'landing_service_category'  => ($landing_service_category!=null) ? implode(",",$landing_service_category) : '',

                    'landing_lawyers'         => $landing_lawyers,
                    'lawyers_list'         => $lawyers_list,

                    'landing_work'         => $landing_work,
                    'work_list'         => $work_list,

                    'section1_on'     => $section1_on,
                    's1_landing_title'     => $s1_landing_title,
                    's1_landing_content'     => $s1_landing_content,

                    'section2_on'     => $section2_on,
                    's2_landing_title'     => $s2_landing_title,
                    's2_landing_icon1'     => $s2_landing_icon1,
                    's2_landing_icon2'     => $s2_landing_icon2,
                    's2_landing_icon3'     => $s2_landing_icon3,
                    's2_landing_title1'     => $s2_landing_title1,
                    's2_landing_title2'     => $s2_landing_title2,
                    's2_landing_title3'     => $s2_landing_title3,
                    's2_landing_description1'     => $s2_landing_description1,
                    's2_landing_description2'     => $s2_landing_description2,
                    's2_landing_description3'     => $s2_landing_description3,

                    'partner_on'     => $partner_on,
                    'landing_partner'     => $landing_partner,

                    'testimonial_on'     => $testimonial_on,
                    'landing_testimonial'     => $landing_testimonial,
                    
                    'landing_slug'     => $landing_slug
                );
                $result = $this->m_landing->InsertData('tbl_landing', $data);
                if ($result == 1) {
                    redirect('landing/index', 'refresh');
                    $this->session->set_flashdata('message', '	<div class="alert alert-success">
														  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														  <strong>Success!</strong> data berhasil di simpan.
														</div>');
                } else {
                    echo "ERROR";
                }
            } else {
                $data = array(
                    'landing_name'         => $landing_name,
                    'landing_shortdesc'         => $landing_shortdesc,

                    'landing_slide'         => $landing_slide,

                    'landing_search'         => $landing_search,
                    'landing_service_category'  => ($landing_service_category!=null) ? implode(",",$landing_service_category) : '',

                    'landing_lawyers'         => $landing_lawyers,
                    'lawyers_list'         => $lawyers_list,

                    'landing_work'         => $landing_work,
                    'work_list'         => $work_list,

                    'section1_on'     => $section1_on,
                    's1_landing_title'     => $s1_landing_title,
                    's1_landing_content'     => $s1_landing_content,

                    'section2_on'     => $section2_on,
                    's2_landing_title'     => $s2_landing_title,
                    's2_landing_icon1'     => $s2_landing_icon1,
                    's2_landing_icon2'     => $s2_landing_icon2,
                    's2_landing_icon3'     => $s2_landing_icon3,
                    's2_landing_title1'     => $s2_landing_title1,
                    's2_landing_title2'     => $s2_landing_title2,
                    's2_landing_title3'     => $s2_landing_title3,
                    's2_landing_description1'     => $s2_landing_description1,
                    's2_landing_description2'     => $s2_landing_description2,
                    's2_landing_description3'     => $s2_landing_description3,

                    'partner_on'     => $partner_on,
                    'landing_partner'     => $landing_partner,

                    'testimonial_on'     => $testimonial_on,
                    'landing_testimonial'     => $landing_testimonial,
                    
                    'landing_slug'     => $landing_slug
                );
                $result = $this->m_landing->UpdateData('tbl_landing', $data, array('landing_id' => $landing_id));
                if ($result == 1) {
                    redirect('landing/index', 'refresh');
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

    function delete($landing_id = 0)
    {
        $this->session_on();
        $result = $this->m_landing->DeleteData('tbl_landing', array('landing_id' => $landing_id));
        if ($result == 1) {
            redirect('landing/index', 'refresh');
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
