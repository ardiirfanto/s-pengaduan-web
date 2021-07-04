<?php
function menu($page = "main")
{

	$pg = "";
	switch ($page) {

		/* Panel Admin */
        
		case "user_warga":
			$pg = "user_warga.php";
			break;
		case "user_kades":
			$pg = "user_kades.php";
			break;
		case "pengaduan":
			$pg = "pengaduan.php";
			break;
		case "pengaduan_kategori":
			$pg = "pengaduan_kategori.php";
			break;
		case "post":
			$pg = "post.php";
			break;
		case "post_add":
			$pg = "post_add.php";
			break;
		case "post_edit":
			$pg = "post_edit.php";
			break;
		case "post_kategori":
			$pg = "post_kategori.php";
			break;

		default:
			$pg = "dashboard.php";
	}
	include_once("views/" . $pg);
}
