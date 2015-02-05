<h1> Insert Employee data</h1>
<?php
	$this->load->helper('form');
	echo validation_errors();
	echo form_open('Employee_form/create');

?>
	<input type="hidden" name="id" value="">
	<label for="ID">Employee Id</label>
	<input type="text" name="empID" ><br/><br/>

	<label for="name">Employee Name</label>
	<input type="text" name="name" ><br/><br/>

	<label for="salary">Employee Salary</label>
	<input type="text" name="salary" > <br /><br/>
	
	<input type="submit" name="submit" value="Insert Employee Data" />

</form>