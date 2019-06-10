<?php
/**
 * Created by PhpStorm.
 * User: Us
 * Date: 1/8/2019
 * Time: 5:43 AM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class MPengajuan_kredit extends CI_Model
{

    public function read_dataPengajuan_kredit()
    {
        $sql = $this->db->query("SELECT * FROM pengajuan_kredit");
        return $sql;
    }


}