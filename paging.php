<!--
Author : Aguzrybudy
Created : Selasa, 08-Novermber-2016
Title : Crud Php Mysqli Dilengkapi dengan upload gambar dan ckeditor
-->

<?php
class paging_quotation{

	function cariPosisi($batas){

		if(empty($_GET['home'])){
			$posisi=0;
			$_GET['home']=1;
		}
		else{
			$posisi = ($_GET['home']-1) * $batas;
		}
			return $posisi;
		}

		// Fungsi untuk menghitung total halaman
		function jumlahHalaman($jmldata, $batas){
		$jmlhalaman = ceil($jmldata/$batas);
		return $jmlhalaman;
		}

		// Fungsi untuk link halaman 1,2,3 
		function navHalaman($halaman_aktif, $jmlhalaman){
		$link_halaman = "<li class='page-item'></li>";

		// Link ke halaman pertama (first) dan sebelumnya (prev)
		if($halaman_aktif > 1){
			$prev = $halaman_aktif-1;
			$link_halaman .= " 
			<li class='page-item'><a class='page-link' href=index.php?home>First</a></li>
			<li class='page-item'><a class='page-link' href=index.php?home=$prev> Prev</a></li>  ";
		}
		else{ 
			$link_halaman .= "  <li class='page-item disabled'><a class='page-link' href='#' tabindex='-1' aria-label='Previous'>  Previous </a></li>  ";
		}

		// Link halaman 1,2,3, ...
		$angka = ($halaman_aktif > 3 ? "<li class='page-item'> <span aria-hidden='true'>...</span> " : " </li>"); 
		for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
		  if ($i < 1)
		  	continue;
			  $angka .= "<li class='page-item'><a class='page-link' href=index.php?home=$i>$i</a></li>  ";
		  }
		
		  $angka .= " <li class='page-item active'>  <a class='page-link' href='#'>$halaman_aktif</a></li>  ";
			  
		for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
		    if($i > $jmlhalaman)
		      break;
			  $angka .= "<li class='page-item'><a class='page-link' href=index.php?home=$i>$i</a></li>  ";
		    }
			$angka .= ($halaman_aktif+2<$jmlhalaman ? " <li class='page-item'>  <span aria-hidden='true'>...</span> <a  class='page-link' href=index.php?home=$jmlhalaman>  $jmlhalaman</a>  " : " </li>");
			$link_halaman .= "<li class='page-item'>$angka</li>";

			// Link ke halaman berikutnya (Next) dan terakhir (Last) 
			if($halaman_aktif < $jmlhalaman){
				$next = $halaman_aktif+1;
				$link_halaman .= "
				<li class='page-item'><a class='page-link' href=index.php?home=$next>Next</a></li>
				<li class='page-item'><a class='page-link' href=index.php?home=$jmlhalaman>Last </a><li>";
			}
			else{
				$prev = $halaman_aktif-1;
				$link_halaman .= " <li class='page-item'><a class='page-link' href='index.php?home=$next' aria-label='Next'> Next</a></li> ";
			}
				return $link_halaman;
		}
}
?>
