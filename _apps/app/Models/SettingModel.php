<?php namespace App\Models;

use CodeIgniter\Model;

class SettingModel extends Model
{

    function getSetting()
    {
        return $this->db->query("SELECT * FROM tbl_setting");
    }


}
