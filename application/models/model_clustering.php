<?php
class Model_Clustering extends CI_Model {
  private $_table = "data_corona";

  function insert($tabel, $data) {
		return $this->db->insert($tabel, $data);
	}

  function delete($tabel, $where) {
		return $this->db->delete($tabel, $where);
	}

  function update($tabel, $data, $where) {
		return $this->db->update($tabel, $data, $where);
	}

  function get($where = '') {
		return $this->db->query("SELECT * FROM $where;");
	}

  public function getSearch() {
    $keyword = $this->input->get('keyword');

    $this->db->like('no', $keyword);
    $this->db->or_like('provinsi', $keyword);

    return $this->db->get($this->_table)->result();
  }

  function input_data($data,$table) {
    $this->db->query("ALTER TABLE data_corona DROP no");
    $this->db->query("ALTER TABLE data_corona ADD  no INT( 50 ) NOT NULL AUTO_INCREMENT FIRST ,ADD KEY (no)");
    $this->db->insert($table,$data);
  }

  function edit_centroid_awal($data,$table) {
    $this->db->query('truncate table centroid_awal');
    $this->db->insert($table,$data);
  }

  function edit_data($where,$table) {
    return $this->db->get_where($table,$where);
  }

  function update_data($where,$data,$table){
    $this->db->where($where);
    $this->db->update($table,$data);
  }

  function hapus_data($where,$table) {
    $this->db->where($where);
    $this->db->delete($table);
    $this->db->query("ALTER TABLE data_corona DROP no");
    $this->db->query("ALTER TABLE data_corona ADD  no INT( 50 ) NOT NULL AUTO_INCREMENT FIRST ,ADD KEY (no)");
  }

}
?>
