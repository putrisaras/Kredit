<?php
/**
 * Created by PhpStorm.
 * User: Us
 * Date: 1/8/2019
 * Time: 5:43 AM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class MStatus_kelayakan extends CI_Model
{

    public function read_dataStatus_kelayakan()
    {
        $sql = $this->db->query("SELECT * FROM status_kelayakan");
        return $sql;
    }
    public function update_StatusKelayakan($Id_kelayakan, $data)
    {
        $this->db->where('Id_kelayakan', $Id_kelayakan);
        $this->db->update('status_kelayakan', $data);
        return $this->db->affected_rows();
    }

}