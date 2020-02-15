<?php
class monhoc_model extends CI_Model
{
     var $table = "monhoc";
     var $select_column = array("id", "ten_mh", "lop_hoc", "tiet_day", "gv_day");
     var $order_column = array(null, "ten_mh", "lop_hoc", "tiet_day", "gv_day", null);
     function make_query()
     {
          $this->db->select($this->select_column);
          $this->db->from($this->table);
          if (isset($_POST["search"]["value"])) {
               $this->db->like("ten_mh", $_POST["search"]["value"]);
               $this->db->or_like("lop_hoc", $_POST["search"]["value"]);
               $this->db->or_like("tiet_day", $_POST["search"]["value"]);
               $this->db->or_like("gv_day", $_POST["search"]["value"]);
          }
          if (isset($_POST["order"])) {
               $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
          } else {
               $this->db->order_by('id', 'DESC');
          }
     }
     function make_datatables()
     {
          $this->make_query();
          if ($_POST["length"] != -1) {
               $this->db->limit($_POST['length'], $_POST['start']);
          }
          $query = $this->db->get();
          return $query->result();
     }
     function get_filtered_data()
     {
          $this->make_query();
          $query = $this->db->get();
          return $query->num_rows();
     }
     function get_all_data()
     {
          $this->db->select("*");
          $this->db->from($this->table);
          return $this->db->count_all_results();
     }
     public function get_entries()
    {
            $query = $this->db->get('monhoc');
            if(count($query->result()) > 0){
                return $query->result();
            }
    }

    //thêm vào data
    public function insert_entry($data)
    {  
        return $this->db->insert('monhoc', $data);
    }

    //delete data
    public function delete_entry($id){
        return $this->db->delete('monhoc', array('id' => $id));
    }

    //edit data
    public function edit_entry($id){
        $this->db->select("*");
        $this->db->from("monhoc");
        $this->db->where("id", $id);
        $query = $this->db->get();
        if(count($query->result()) > 0){
            return $query->row();
        }
    }

    //update data
    public function update_entry($data)
    {
           return $this->db->update('monhoc', $data, array('id' => $data['id']));
    }

     
}
