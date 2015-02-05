<?php

	class Employee_form extends CI_Controller{
	
		public function __construct()
		{
			parent::__construct();
			$this->load->model('Employee_Model');
			$this->load->library('pagination');
			$this->load->helper('url');
		}
		public function create(){
			$this->load->helper('form');
			$this->load->library('form_validation');
			
			$data['title']='Insert Employee data';
			
			$this->form_validation->set_rules('empID','Employee Id','required');
		//	$this->form_validation->set_rules('Name','Employee Name','required');
		//	$this->form_validation->set_rules('Salary','Employee Salary','required');
			
			if($this->form_validation->run()===FALSE)
			{
				$data['emp'] = array(
				'Emp_Id' => "",
				'Emp_Name' => "",
				'Emp_salary' => ""
			);
				$this->load->view('View_Employee_Form/InsertEmployee',$data);
				
			
			}
			else
			{
				$this->Employee_Model->set_employee();
				$data['key']="Insert";
				$data['to']="to";
				$this->load->view('View_Employee_Form/Success',$data);
				$this->getEmp();
			}
		}
		public function editrow($id,$segment)
		{
			$data['emp']=$this->Employee_Model->get_row($id);
			$data['segment']=$segment;
			$this->load->view('View_Employee_Form/UpdateEmployee',$data);
			
		}
		public function update()
		{
			$this->Employee_Model->update_row();
			$data['key']="Updat";
			$data['to']="";
			$this->load->view('View_Employee_Form/Success',$data);
			$segment=$this->input->post('segment');
			//$this->getEmp();
			redirect("Employee_Form/getEmp/".$segment);
		}
		public function deleterow($id,$segment)
		{
			$this->Employee_Model->delete_row($id);
			$data['key']="Delet";
			$data['to']="from";
			$this->load->view('View_Employee_Form/Success',$data);
			redirect("Employee_Form/getEmp/".$segment);
			//$this->getEmp();
		}
		public function getEmp()
		{
		//	$data['emp']=$this->Employee_Model->get_table();
			
			$config = array();
			$config['base_url']=base_url().'index.php/Employee_form/getEmp';
			$config['total_rows']=$this->Employee_Model->record_count();
			$config['per_page']=5;
			$config['uri_segment']=3;
			
			$this->pagination->initialize($config);
			
			$page=($this->uri->segment(3))?$this->uri->segment(3):0;
			$data['results']=$this->Employee_Model->get_tablePart($config['per_page'],$page);
			$data['links']=$this->pagination->create_links();
			$this->load->view('View_Employee_Form/viewEmpPage',$data);
		}
		function setLink($id,$imgdata,$empdata){
			$this->Employee_Model->setlink($id,$imgdata,$empdata);
		}
		function do_upload($id,$segment)
		{
		
			$config = array();
			$config['base_url']=base_url().'index.php/Employee_form/getEmp';
			$config['total_rows']=$this->Employee_Model->record_count();
			$config['per_page']=5;
			$config['uri_segment']=3;
			
			$this->pagination->initialize($config);
			
			$page=($this->uri->segment(3))?$this->uri->segment(3):0;
			$data['results']=$this->Employee_Model->get_tablePart($config['per_page'],$page);
			$data['links']=$this->pagination->create_links();	
			
			$configs['upload_path'] = dirname( dirname(__FILE__) ).'/views/View_Employee_Form/photo';
			$configs['allowed_types'] = 'gif|jpg|png';
			$configs['max_size']	= '1000';
			$configs['max_width']  = '1024';
			$configs['max_height']  = '768';

			$this->load->library('upload', $configs);

			if ( ! $this->upload->do_upload())
			{
				$error = array('error' => $this->upload->display_errors());
				echo $error['error'];//$this->load->view('View_Employee_Form/upload_form', $error);
			}
			else
			{
				$imgdata['upload_data'] = $this->upload->data();
				/* Do resizing here */ 
				$conf['image_library'] = 'gd2';
				$conf['source_image'] = dirname( dirname(__FILE__) ).'\\views\\View_Employee_Form\\photo\\'.$imgdata['upload_data']['file_name'];
			//	$config['create_thumb'] = TRUE;
				$conf['maintain_ratio'] = TRUE;
				$conf['width'] = 141;
				$conf['height'] = 107;

				$this->load->library('image_lib', $conf);

				if(!$this->image_lib->resize())
				{
					echo "ERROR RESIZING<br>";
					echo $conf['source_image'];
					die;
				}
					
				
				/* Do resizing here */ 
				$imgdata['upload_data'] = $this->upload->data();
				$empdata['employeeRecord']=$this->Employee_Model->get_row($id);
				$imgdata['linkImg']=base_url()."application/views/View_Employee_Form/photo/";
				$this->setLink($id,$imgdata,$empdata);
				redirect("Employee_Form/getEmp/".$segment);
				/* Insert into the database here and then fetch records from db and dispaly */
				
				
			//	$this->load->view('View_Employee_Form/viewEmpPage',$data);
		//	$this->load->view('View_Employee_Form/uploadSuccess', $data);
			}
		}
		public function orderID(){
			
			$config = array();
			$config['base_url']=base_url().'index.php/Employee_form/orderID';
			$config['total_rows']=$this->Employee_Model->record_count();
			$config['per_page']=5;
			$config['uri_segment']=3;
			
			$this->pagination->initialize($config);
			
			$page=($this->uri->segment(3))?$this->uri->segment(3):0;
			$data['results']=$this->Employee_Model->get_tableOrder($config['per_page'],$page);
			$data['links']=$this->pagination->create_links();			
			
			$this->load->view('View_Employee_Form/viewEmpPage',$data);
		}
		public function deleteImg($id,$segment)
		{
			$this->Employee_Model->deleteImg($id);
		/*	echo "in delteImg<br>";
			die;  
			$data['emp']=array(
				'id'=>$this->input->post('id'),
				'Emp_Id'=>$this->input->post('empID'),
				'Emp_Name'=>$this->input->post('name'),
				'Emp_salary'=>$this->input->post('salary'),
				'image'=>""
				);
				eikhane db theke data construct korte hobe. 
			*/
		/*	$data['emp']=$this->Employee_Model->get_row($id);
			$data['segment']=$segment; */
			redirect('Employee_form/editrow/'.$id.'/'.$segment);
			//$this->load->view('View_Employee_Form/updateEmployee'); // ,$data
		}
	}
?>