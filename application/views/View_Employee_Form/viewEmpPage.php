<body>
	  <div id="body">
	  <table border=\"2\" >
      <thead>
        <tr>
          <th><a href=<?php echo base_url()."index.php/Employee_form/orderID"; ?> >Employee_id</a></th>
          <th>Employee_Name</th>
          <th>Employee_Salary</th>
		  <th>Upload Image</th>
		  <th>Image </th>
		  <th>Edit Element</th>
		  <th>Delete Element</th>
        </tr>
      </thead>
      <tbody>
	<?php /* 
		<a href=<?php echo base_url()."index.php/Employee_form/orderID"; ?> >
	['Emp_Id']. */
	
	$this->load->helper('form');
	foreach($results as $employee) {
	    echo "<tr>
			  <td>".$employee['Emp_Id']."</td>
              <td>".$employee['Emp_Name']."</td>
              <td>".$employee['Emp_salary']."</td>
			  <td>";
			
			  echo form_open_multipart('Employee_Form/do_upload/'.$employee['id'].'/'.$this->uri->segment(3));
/*			 if(!$this->uri->segment(3))
				echo "URI SEGMENT NULL";
			else
				echo $this->uri->segment(3); */
			 echo "<input type=\"file\" name=\"userfile\" size=\"20\" />
			<br/><br />
			<input type=\"submit\" value=\"upload\" />
			</form>
			 </td>
			 <td>
				<img src=".$employee['image']." height=\"141\" width=\"107\">";
			 echo"</td>
			 <td>";
			 
			   $urisegment="";
			 if($this->uri->segment(3))
			{
				$urisegment=$this->uri->segment(3);
				
			}
			else
			{
				$urisegment="0";
				
			}
			 
			 echo form_open('Employee_form/editrow/'.$employee['id'].'/'.$urisegment);
			echo "<input value = \"Edit\" type=\"submit\" >
			</form> </td>
			<td>";
			echo form_open('Employee_form/deleterow/'.$employee['id'].'/'.$urisegment);
			echo "<input value =\"Delete\" type=\"submit\" >
			</form> </td>
            </tr>\n";
	}
	?>
	
	</tbody>
    </table>
	   <p><?php echo $links; ?></p>
	
	</body>