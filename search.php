<?php
if (isset($_POST['search'])) {
  require_once 'koneksi.php';
  $no = 1;
  $search = $_POST['search'];
  $query = mysqli_query($koneksi, "SELECT * FROM transaction WHERE transid LIKE '%".$search."%'");
  while ($row = mysqli_fetch_object($query)) {
 echo '
            <tr>
              <td style="text-align: center">'.$no.'</td>
              <td style="text-align: center">'.$row['transdate'].'</td>
              <td style="text-align: center">'.$row['transid'].'</td>
              <td style="text-align: center">'.$row['nama_perusahaan'].'</td>
              <td style="text-align: center">'.$row['nama_customer'].'</td>
              <td style="text-align: center">'.$row['alamat'].'</td>
              <td style="text-align: center">'.$row['area'].'</td>
              <td style="text-align: center">'.$row['top'].'</td>
              <td style="text-align: center">'.$row['delivery_date'].'</td>
              <td style="text-align: center">'.$row['status'].'</td>
              <td>
                <a href="detail.php?id='.$row['id'].'" title="Lihat Detail"><span class="glyphicon glyphicon-list" aria-hidden="true"></span></a>
                <a href="edit.php?id='.$row['id'].'" title="Rubah Data"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                <a href="view.php?aksi=delete&id='.$row['id'].'" title="Hapus Data" onclick="return confirm(\'Data Akan Dihapus?\')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
              </td>
            </tr>
            ';
            $no++;
          }
        }
        ?>
