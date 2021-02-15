<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_web');
    }

    public function index()
    {
        $data_landing = $this->m_web->getLanding("WHERE landing_slug = 'home'")->result_array();
        $render = array(
            'landing_id'            => $data_landing[0]['landing_id'],
            'landing_name'          => $data_landing[0]['landing_name'],
            'landing_slide'      => $data_landing[0]['landing_slide'],
            'landing_slide_data'         => $this->m_web->getSlide("WHERE slide_id_category  = " . $data_landing[0]['landing_slide'] . "")->result_array(),
            's1_landing_title'      => $data_landing[0]['s1_landing_title'],
            's1_landing_content'    => $data_landing[0]['s1_landing_content'],
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
            'landing_partner'     => $data_landing[0]['landing_partner'],
            'landing_partner_data'      => $this->m_web->getPartner()->result_array(),
            'landing_testimonial'     => $data_landing[0]['landing_testimonial'],
            'landing_testimonial_data'      => $this->m_web->getTestimonial()->result_array()
        );

        render_frontend('web/welcome', $render);
    }

    public function landing($landing_id, $landing_slug)
    {
        $data_landing = $this->m_web->getLanding("WHERE landing_id = '$landing_id' AND landing_slug = '$landing_slug'")->result_array();
        $render = array(
            'landing_id'            => $data_landing[0]['landing_id'],
            'landing_name'          => $data_landing[0]['landing_name'],
            'landing_slide'      => $data_landing[0]['landing_slide'],
            'landing_slide_data'         => $this->m_web->getSlide("WHERE slide_id_category  = " . $data_landing[0]['landing_slide'] . "")->result_array(),
            's1_landing_title'      => $data_landing[0]['s1_landing_title'],
            's1_landing_content'    => $data_landing[0]['s1_landing_content'],
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
            'landing_partner'     => $data_landing[0]['landing_partner'],
            'landing_partner_data'      => $this->m_web->getPartner()->result_array(),
            'landing_testimonial'     => $data_landing[0]['landing_testimonial'],
            'landing_testimonial_data'      => $this->m_web->getTestimonial()->result_array()
        );

        render_frontend('web/welcome', $render);
    }
}
