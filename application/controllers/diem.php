<?php
defined('BASEPATH') or exit('No direct script access allowed');
class diem extends CI_Controller
{
     //functions  

     public function __construct()
     {
          parent::__construct();

          $this->load->helper(array('form', 'url'));
          $this->load->library('form_validation');
          $this->load->model('diem_model');
     }
     function index()
     {
          $data["title"] = "Quản Lý Điểm ";
          $this->load->view('diem_view', $data);
     }
     function fetch_user()
     {
          $this->load->model("diem_model");
          $fetch_data = $this->diem_model->make_datatables();
          $data = array();
          foreach ($fetch_data as $row) {
               $sub_array = array();
               $sub_array[] = $row->ten_hs;
               $sub_array[] = $row->lop_hoc;
               $sub_array[] = $row->mon_hoc;
               $sub_array[] = $row->mieng;
               $sub_array[] = $row->muoi_nam_phut;
               $sub_array[] = $row->mot_tiet;
               $sub_array[] = $row->hoc_ki;
               $sub_array[] = $row->ten_gv;
               $sub_array[] = '<a href="#" id="edit" class="btn btn-sm btn-outline-info" 
                              value="'. $row->id .'"><i class="fas fa-edit"></i></a>';
               $sub_array[] = '<a href="#" id="del" class="btn btn-sm btn-outline-danger" 
                              value="'. $row->id .'"><i class="fas fa-trash-alt"></i></a>';
               
               $data[] = $sub_array;
          }
          $output = array(
               "draw"                    =>     intval($_POST["draw"]),
               "recordsTotal"          =>      $this->diem_model->get_all_data(),
               "recordsFiltered"     =>     $this->diem_model->get_filtered_data(),
               "data"                    =>     $data
          );
          echo json_encode($output);
     }
     public function insert()
	{
		if ($this->input->is_ajax_request()) {
			$this->form_validation->set_rules('ten_hs', 'Tên Học Sinh', 'required');
			$this->form_validation->set_rules('lop_hoc', 'Lớp Học', 'required');
			$this->form_validation->set_rules('mon_hoc', 'Môn Học', 'required');
			$this->form_validation->set_rules('mieng', 'Miệng', 'required');
			$this->form_validation->set_rules('muoi_nam_phut', '15 Phút', 'required');
			$this->form_validation->set_rules('mot_tiet', '45 Phút', 'required');
			$this->form_validation->set_rules('hoc_ki', 'Học Kỳ', 'required');
			$this->form_validation->set_rules('ten_gv', 'Giáo Viên', 'required');

			if ($this->form_validation->run() == FALSE) {
				$data1 = array('responce' => 'error', 'message' => validation_errors());
			} else {
				$ajax_data = $this->input->post();
				if ($this->diem_model->insert_entry($ajax_data)) {
					$data1 = array('responce' => 'success', 'message' => 'Data added successfully');
				} else {
					$data1 = array('responce' => 'error', 'message' => 'Failed');
				}
			}
		} else {
			echo "No direct script access allowed";
		}
		echo json_encode($data1);
	}

	//show dữ liệu
	public function fetch()
	{
		if ($this->input->is_ajax_request()) {
			$posts = $this->diem_model->get_entries();
			echo json_encode($posts);
		}
     }
     
     //delete dữ liệu
	public function delete()
	{
		if ($this->input->is_ajax_request()) {
			$del_id = $this->input->post('del_id');

			if ($this->diem_model->delete_entry($del_id)) {
				$data = array('responce' => "success");
			} else {
				$data = array('responce' => "error");
			}
		}
		echo json_encode($data);
     }
     public function edit()
	{
		if ($this->input->is_ajax_request()) {
			$edit_id = $this->input->post('edit_id');

			if ($post = $this->diem_model->edit_entry($edit_id)) {
				$data = array('responce' => "success", 'post' => $post);
			} else {
				$data = array('responce' => "error", 'message' => 'failed');
			}
		}
		echo json_encode($data);
	}

	public function update()
	{
		if ($this->input->is_ajax_request()) {
			$this->form_validation->set_rules('edit_ten_hs', 'Tên Học Sinh', 'required');
			$this->form_validation->set_rules('edit_lop_hoc', 'Lớp Học', 'required');
			$this->form_validation->set_rules('edit_mon_hoc', 'Môn Học', 'required');
			$this->form_validation->set_rules('edit_mieng', 'Miệng', 'required');
			$this->form_validation->set_rules('edit_muoi_nam_phut', '15 Phút', 'required');
			$this->form_validation->set_rules('edit_mot_tiet', '45 Phút', 'required');
			$this->form_validation->set_rules('edit_hoc_ki', 'Học Kỳ', 'required');
			$this->form_validation->set_rules('edit_ten_gv', 'Giáo Viên', 'required');

			if ($this->form_validation->run() == FALSE) {
				$data = array('responce' => 'error', 'message' => validation_errors());
			} else {
				$data['id'] = $this->input->post('edit_id');
				$data['ten_hs'] = $this->input->post('edit_ten_hs');
				$data['lop_hoc'] = $this->input->post('edit_lop_hoc');
				$data['mon_hoc'] = $this->input->post('edit_mon_hoc');
				$data['mieng'] = $this->input->post('edit_mieng');
				$data['muoi_nam_phut'] = $this->input->post('edit_muoi_nam_phut');
				$data['mot_tiet'] = $this->input->post('edit_mot_tiet');
				$data['hoc_ki'] = $this->input->post('edit_hoc_ki');
				$data['ten_gv'] = $this->input->post('edit_ten_gv');
				if ($this->diem_model->update_entry($data)) {
					$data = array('responce' => 'success', 'message' => 'Data added successfully');
				} else {
					$data = array('responce' => 'error', 'message' => 'Failed');
				}
			}
		} else {
			echo "No direct script access allowed";
		}
		echo json_encode($data);
	}
     
}
