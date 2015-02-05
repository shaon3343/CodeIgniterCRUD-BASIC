<?php 
	
	echo "<table border=\"2\" >
      <thead>
        <tr>
          <th>Employee_id</th>
          <th>Employee_Name</th>
          <th>Employee_Salary</th>
		  <th>Edit Element</th>
		  <th>Delete Elemement</th>
        </tr>
      </thead>
      <tbody>";
foreach($emp as $employee):
	echo "<tr>
			  <td>".$employee['Emp_Id']."</td>
              <td>".$employee['Emp_Name']."</td>
              <td>".$employee['Emp_salary']."</td>
			  <td>";
			  $this->load->helper('form');
			  echo form_open('Employee_form/editrow/'.$employee['id']);
			echo "<input value = \"Edit\" type=\"submit\" >
			</form> </td>
			<td>";
			echo form_open('Employee_form/deleterow/'.$employee['id']);
			echo "<input value =\"Delete\" type=\"submit\" >
			</form> </td>
            </tr>\n";
endforeach;

echo "</tbody>";
    echo "</table>";
?>