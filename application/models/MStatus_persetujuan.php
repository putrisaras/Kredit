<?php
/**
 * Created by PhpStorm.
 * User: Us
 * Date: 1/8/2019
 * Time: 5:43 AM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class MStatus_persetujuan extends CI_Model
{
    //read kelayakan di bendahara
    public function read_statusPersetujuan()
    {
        $sql = $this->db->query("SELECT * FROM status_persetujuan");
        return $sql;
    }
    //get data pengajuan di bendahara
    public function getPersetujuan($status_kelayakan){
        $query = $this->db->query("SELECT * FROM status_persetujuan WHERE $status_kelayakan");
        return $query;
    }

}