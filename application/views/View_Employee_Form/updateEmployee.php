<h1> Update Employee data</h1>

<label for="Photo">Photo</label>
	<img src="<?php echo $emp['image'] ?>" height ="200" width="auto"><br/><br/>
	
	<?php 
	$this->load->helper('form');
		  echo form_open('Employee_form/deleteImg/'.$emp['id'].'/'.$segment);
			echo "<input value = \"Delete Image\" type=\"submit\" >
			</form>";
	
	?>
<?php
	
	echo validation_errors();
	echo form_open('Employee_form/update');

?>
	
	<input type="hidden" name="id" value=<?php echo$emp['id'] ?> >
	<input type = "hidden" name = "segment" value = <?php echo $segment ?> >
	<label for="ID">Employee Id</label>
	<input type="text" name="empID" value=<?php echo $emp['Emp_Id'] ?> ><br/><br/>

	<label for="name">Employee Name</label>
	<input type="text" name="name" value =<?php echo $emp['Emp_Name'] ?> ><br/><br/>

	<label for="salary">Employee Salary</label>
	<input type="text" name="salary" value=<?php echo $emp['Emp_salary'] ?> > <br /><br/>
	
	<input type="submit" name="submit" value="Update Employee Data" />

</form>