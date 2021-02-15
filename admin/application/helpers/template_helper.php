<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
if (!function_exists('render_frontend')) {
    function render_frontend($view, $data)
    {
        $ci = &get_instance();
        $ci->load->view('web/_header', $data);
        $ci->load->view($view, $data);
        $ci->load->view('web/_footer');
    }
}
if (!function_exists('render_backend')) {
    function render_backend($view, $data)
    {
        $ci = &get_instance();
        $ci->load->view('admin/bagianHeader', $data);
        $ci->load->view($view, $data);
        $ci->load->view('admin/bagianFooter');
    }
}
/* End of file Template.php */
/* Location: ./system/application/libraries/Template.php */