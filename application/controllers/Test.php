<?php
	class Test extends CI_Controller {

	public function index()
	{
		echo "<h1>Hello World</h1>";
		$this->load->view('TestingCode');
	}
}
?>