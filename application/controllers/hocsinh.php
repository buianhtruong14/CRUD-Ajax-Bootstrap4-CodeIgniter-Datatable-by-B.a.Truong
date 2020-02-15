<?php
defined('BASEPATH') or exit('No direct script access allowed');
class hocsinh extends CI_Controller
{
     //functions  

     public function __construct()
     {
          parent::__construct();

          $this->load->helper(array('form', 'url'));
          $this->load->library('form_validation');
          $this->load->model('hocsinh_model');
     }
     function index()
     {
          $data["title"] = "Quản Lý Học Sinh ";
          $this->load->view('hocsinh_view', $data);
     }
     function fetch_user()
     {
          $this->load->model("hocsinh_model");
          $fetch_data = $this->hocsinh_model->make_datatables();
          $data = array();
          foreach ($fetch_data as $row) {
               $sub_array = array();
               $sub_array[] = $row->ten_hs;
               $sub_array[] = $row->ngaysinh_hs;
               $sub_array[] = $row->hoc_lop;
               $sub_array[] = $row->gv_day;
               $sub_array[] = '<a href="#" id="edit" class="btn btn-sm btn-outline-info" 
                              value="'. $row->id .'"><i class="fas fa-edit"></i></a>';
               $sub_array[] = '<a href="#" id="del" class="btn btn-sm btn-outline-danger" 
                              value="'. $row->id .'"><i class="fas fa-trash-alt"></i></a>';
               
               $data[] = $sub_array;
          }
          $output = array(
               "draw"                    =>     intval($_POST["draw"]),
               "recordsTotal"          =>      $this->hocsinh_model->get_all_data(),
               "recordsFiltered"     =>     $this->hocsinh_model->get_filtered_data(),
               "data"                    =>     $data
          );
          echo json_encode($output);
     }
     public function insert()
	{
		if ($this->input->is_ajax_request()) {
			$this->form_validation->set_rules('ten_hs', 'Tên Giáo Viên', 'required');
			$this->form_validation->set_rules('ngaysinh_hs', 'Ngày Sinh', 'required');
			$this->form_validation->set_rules('hoc_lop', 'Lớp Dạy', 'required');
			$this->form_validation->set_rules('gv_day', 'Môn Dạy', 'required');

			if ($this->form_validation->run() == FALSE) {
				$data1 = array('responce' => 'error', 'message' => validation_errors());
			} else {
				$ajax_data = $this->input->post();
				if ($this->hocsinh_model->insert_entry($ajax_data)) {
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
			$posts = $this->hocsinh_model->get_entries();
			echo json_encode($posts);
		}
     }
     
     //delete dữ liệu
	public function delete()
	{
		if ($this->input->is_ajax_request()) {
			$del_id = $this->input->post('del_id');

			if ($this->hocsinh_model->delete_entry($del_id)) {
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

			if ($post = $this->hocsinh_model->edit_entry($edit_id)) {
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
			$this->form_validation->set_rules('edit_ten_hs', 'Tên Giáo Viên', 'required');
			$this->form_validation->set_rules('edit_ngaysinh_hs', 'Ngày Sinh', 'required');
			$this->form_validation->set_rules('edit_hoc_lop', 'Lớp Dạy', 'required');
			$this->form_validation->set_rules('edit_gv_day', 'Môn Dạy', 'required');

			if ($this->form_validation->run() == FALSE) {
				$data = array('responce' => 'error', 'message' => validation_errors());
			} else {
				$data['id'] = $this->input->post('edit_id');
				$data['ten_hs'] = $this->input->post('edit_ten_hs');
				$data['ngaysinh_hs'] = $this->input->post('edit_ngaysinh_hs');
				$data['hoc_lop'] = $this->input->post('edit_hoc_lop');
				$data['gv_day'] = $this->input->post('edit_gv_day');
				if ($this->hocsinh_model->update_entry($data)) {
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
