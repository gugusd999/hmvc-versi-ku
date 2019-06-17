<?php 
	
	function index($am = "", $em = "")
	{
		template_header("01");
		$data["nama"] = $am;
		$data["token"] = $em;
		view("dasboard", $data);
		template_footer("01");
	}

 ?>