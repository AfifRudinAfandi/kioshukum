<?php namespace App\Models;

use CodeIgniter\Model;

class AboutModel extends Model
{

    function getTnC($condition = '')
    {
        // return $this->db->query("SELECT * FROM tbl_lawyer 
        // INNER JOIN tbl_lawyer_category ON tbl_lawyer_category.id = tbl_lawyer.lawyer_category_id $condition");
    }

}
