<?php
	
	class Employee_Model extends CI_Model{
		public function __construct()
		{
			$this->load->database();
		}
		public function set_employee()
		{			
			$data=array(
				'id'=>$this->input->post('id'),
				'Emp_Id'=>$this->input->post('empID'),
				'Emp_Name'=>$this->input->post('name'),
				'Emp_salary'=>$this->input->post('salary')
				);
				return $this->db->insert('emp_records',$data);
		}
		public function record_count(){
			return $this->db->count_all('emp_records');
		}
		public function deleteImg($id)
		{
			$data=$this->get_row($id);
			$data['image']="";
			$this->db->where('id', $id);
			$this->db->update('emp_records',$data); 
		}
		public function update_row()
		{
			$data=array(
				'Emp_Id'=>$this->input->post('empID'),
				'Emp_Name'=>$this->input->post('name'),
				'Emp_salary'=>$this->input->post('salary'),
				'image'=>$this->input->post('imagesrc')
				);
			$id=$this->input->post('id');
			$this->db->where('id', $id);
			$this->db->update('emp_records',$data); 
		}
		public function setlink($id,$imagedata,$empdata)
		{
		
		/*	echo $id;
			echo "<br>".$imagedata['upload_data']['file_name'];
			echo "<br>".$empdata['employeeRecord']['Emp_Id']."<br>";
			echo "<br>".$empdata['employeeRecord']['Emp_Name']."<br>";
			echo "<br>".$empdata['employeeRecord']['Emp_salary']."<br>";
			echo "<br>".$imagedata['linkImg']; */
			
			$data=array(
				'Emp_Id'=>$empdata['employeeRecord']['Emp_Id'],
				'Emp_Name'=>$empdata['employeeRecord']['Emp_Name'],
				'Emp_salary'=>$empdata['employeeRecord']['Emp_salary'],
				'image'=>$imagedata['linkImg'].$imagedata['upload_data']['file_name']
				
				);
			$this->db->where('id', $id);
			$this->db->update('emp_records',$data);
		}
		public function get_table()
		{
			$query=$this->db->get('emp_records');
			return $query->result_array();
		}
		public function get_tablePart($limit,$start)
		{
			$this->db->limit($limit,$start);
			$query=$this->db->get('emp_records');
			
			return $query->result_array();
		/*	if($query->num_rows()>0)
			{
				foreach ($query->result() as $row){
					$data[]=$row;
				}
				return $data;
			} 
			return false; */
		}
		public function get_tableOrder($limit,$start)
		{
			$this->db->order_by('Emp_Id','asc'); 
			$this->db->limit($limit,$start);
			$query=$this->db->get('emp_records');
			
			return $query->result_array();
		}
		public function get_row($id)
		{
			$query = $this->db->get_where('emp_records', array('id' => $id));
			return $query->row_array();
		}
		public function delete_row($id){
			$this->db->delete('emp_records', array('id' => $id));
		}
	}

?>