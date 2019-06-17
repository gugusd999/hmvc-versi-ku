<?php 
	
	// ambil class app
	require_once "../app/app.php";
	require_once "../app/database.php";


	if (!isset($_GET["url"])) {
		echo "
			<script>
				location.href = 'index.php?url=halaman/dasboard';
			</script>
		";
	}

 	$ambilurl = $_GET["url"];
 	$pecah_url = explode("/", $ambilurl);
 	$halaman = $pecah_url[0];
 	unset($pecah_url[0]);
	$parameter = "";

 	if (isset($pecah_url[1])) {
 		$parameter = $pecah_url[1];
 		unset($pecah_url[1]);
 	}else{
 		$parameter = "index";
 	}
	
	require_once "../halaman/".$halaman."/controller/".$halaman.".php";

 	call_user_func_array($parameter, $pecah_url);

 	// membuat fungsi untuk memanggil view
 	function view($namaView, $e = ""){
		global $halaman;
		// memecah array dan membuat keynya sebagai variable menggunakan extract();
		if ($e != "") {
			extract($e);
		}
		require_once "../halaman/".$halaman."/view/".$namaView.".php";
 	}

 	function template_header($nama_template){
 		require_once "../template/".$nama_template."/header.php";
 	}

 	function template_footer($nama_template){
 		require_once "../template/".$nama_template."/footer.php";
 	}

 ?>