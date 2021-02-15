<?php namespace App\Models;

use CodeIgniter\Model;

class TestimonialModel extends Model
{

    function getTestimonial($condition = '')
    {
        return $this->db->query("SELECT * FROM tbl_testimonial 
        INNER JOIN tbl_testimonial_category ON tbl_testimonial_category.id = tbl_testimonial.testimonial_category_id $condition");
    }

}
