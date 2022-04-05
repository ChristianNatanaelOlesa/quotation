<?php 
  session_start();
 
  // cek apakah yang mengakses halaman ini sudah login
  if($_SESSION['username']==""){
    echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
  }
 
  ?>
  

<?php
  include("header2.php");

  include("koneksi.php");
  $sql=$mysqli->query("select * FROM transaction WHERE transid ='$_GET[transid]'");
  $row=mysqli_fetch_array($sql);

  $sql2=$mysqli->query("select * FROM trx_top_other WHERE transid ='$_GET[transid]'");
  $row2=mysqli_fetch_array($sql2);

  $sql3=$mysqli->query("select * FROM trx_item WHERE transid ='$_GET[transid]'");
  $row3=mysqli_fetch_array($sql3);
?> 


<style type="text/css">
	td {
            word-wrap: break-word;
        }
</style>

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h3>Detail Transaction</h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item active">Detail Transaction</li>
          <li class="breadcrumb-item active"><?php echo $row['transid']; ?></li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="card">
    <div class="card-header">
      <?php if ($row['id_status'] == 3 OR $row['id_status'] == 2) {
  			echo '';
	  	}else{
			?>

		<div class="card-header">
      <div class="row">

      	<div class="col-md-4">
				 <button type="button" class="btn btn-block btn-outline-warning" data-toggle="modal" data-target="#modal-xl">
           <h4><b>ADD TOP</b></h4>
          </button>
				</div>

				<?php if ($row['id_status'] == 4) { ?>
					<div class="col-md-4">
						<a href="edit_quotation_reject.php?transid=<?php echo $row['transid'] ?>" title="Edit Transaction">
							<button type="button" class="btn btn-block btn-outline-danger"><h4><b>EDIT TRANSACTION</b></h4></button>
						</a>
					</div>
				<?php } else if ($row['id_status'] == 1){ ?>
					<div class="col-md-4">
						<a href="edit_quotation.php?transid=<?php echo $row['transid'] ?>" title="Edit Transaction">
							<button type="button" class="btn btn-block btn-outline-danger"><h4><b>EDIT HEADER TRANSACTION</b></h4></button>
						</a>
					</div>
				<?php } ?>
				

				<?php if ($row3['detail_item'] == "" or $row3['harga_item'] == 0 or $row3['qty_item'] == 0) { ?>
					<div class="col-md-4">
						<button type="button" class="btn btn-block btn-outline-success" onclick="return confirm('LIST ITEM BELUM LENGKAP')" value="REQUEST APPROVAL">
                <h4><b>REQUEST APPROVAL</b></h4>
            </button>
					</div>
				<?php } else{ ?>
					<div class="col-md-4">
						<a href="request_approval.php?transid=<?php echo $row['transid'] ?>" title="Request Approval">
							<button type="button" class="btn btn-block btn-outline-success"><h4><b>REQUEST APPROVAL</b></h4></button>
						</a>
					</div>
				<?php } ?>

				

			</div>
    </div>
  	<?php } ?>
    </div>

		<div class="modal fade" id="modal-xl">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">ADD TOP</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form class="form-horizontal" name="add_top_form" action="index.php?page=create_top" method="post" enctype="multipart/form-data">
							<div class="card-body">
								<div class="row" hidden>
							    <div class="col-md-4">
							      <div class="form-group">
							        <label>No Quotation</label>
							        <input type="text" name="transid" class="form-control" value="<?php echo $row['transid']; ?>" readonly>  
							      </div>
							    </div>
							  </div>

						    <div class="row">
							    <div class="col-md-12">
										<table class="table table-bordered">
											<thead>
									      <tr>
									        <th style="width: 900px; text-align:center;">Term Of Payment</th>
									        <th style="width: 200px; text-align:center;"><button type="button" class="btn btn-primary" id="btn-tambah">Tambah</button></th>
									      </tr>
								      </thead>
								      <tbody id="tbl-top-body"></tbody>
							      </table>
							    </div>
								</div>

								<?php 

			  				if($row2['desc_other'] == ""){
			    				echo '<div class="row">
											    <div class="col-md-12">
														<div class="form-group">
															<div class="form-group">
																<textarea class="form-control" name="desc_other" id="desc_other" placeholder="Other Term of Payment"></textarea>
															</div>
														</div>
											    </div>
												</div>';
			    			}else{
			    				echo '';
			    			} ?>

							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">&nbsp;</label>
								<div class="col-sm-6">
									<button type="reset" class="btn btn-danger">Reset</button>
									<button type="submit" class="btn btn-primary">Save</button>
								</div>
							</div>
						</form>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

<div class="card-body">
  <div class="content">
		<table class="table table-striped">
			<tr>
				<th>Quotation No.</th>
				<td><?php echo $row['transid']; ?></td>

				<th>Transaction Date</th>
				<td><?php echo $row['transdate']; ?></td>

				<th>Status</th>
				<td>
					<?php 
            if($row['id_status'] == 1){echo '<span class="badge bg-primary" style="text-align: center;">OPEN</span>';
                  }else if ($row['id_status'] == 2) {
                    echo '<span class="badge bg-warning" style="text-align: center;">WAIT FOR APPROVAL</span>';
                  }else if ($row['id_status'] == 3) {
                    echo '<span class="badge bg-success" style="text-align: center;">APPROVED</span>';
                  }else if ($row['id_status'] == 4) {
                    echo '<span class="badge bg-danger" style="text-align: center;">REJECTED</span>';
                  }else if ($row['id_status'] == 5) {
                    echo 'PRINT';
                  }else if ($row['id_status'] == 6) {
                    echo 'REVISI';
                  }else if ($row['id_status'] == 7) {
                    echo 'CREATE SO';
                  } 
                ?>
      	</td>
			</tr>

			<tr>
				<th>Nama Customer</th>
				<td><?php echo $row['nama_cust']; ?></td>

				<th>Nama Perusahaan</th>
				<td><?php echo $row['perusahaan_cust']; ?></td>

				<th>No Prospect</th>
				<td><?php echo $row['noprospect']; ?></td>
			</tr>

			<tr>
				<th>Project</th>
				<td><?php echo $row['project_cust']; ?></td>

				<th>Segment</th>
				<td><?php echo $row['segment']; ?></td>

				<th>Sub Segment</th>
				<td><?php echo $row['sub_segment']; ?></td>
			</tr>

			<tr>
				<th>Alamat Customer</th>
				<td><?php echo $row['alamat_cust']; ?></td>

				<th>Area Customer</th>
				<td><?php echo $row['area_cust']; ?></td>

				<th>Telepon Customer</th>
				<td><?php echo $row['telepon_cust']; ?></td>
			</tr>

			<tr>
				<th>Email Customer</th>
				<td><?php echo $row['email_cust']; ?></td>

				<th>CustQQ Code</th>

				<td><?php 
						if(empty($row['custqq_code'])){echo '-';
			            }else {
			              echo $row['custqq_code'];
			            } 
		            ?>	
		    </td>

		    <th>CustQQ Name</th>
		    <td><?php 
						if(empty($row['custqq_name'])){echo '-';
			            }else {
			              echo $row['custqq_name'];
			            } 
		            ?>	
		    </td>
			</tr>

			<tr>
				<th>Nama Sales</th>
				<td><?php echo $row['nama_sales']; ?></td>

				<th>Telepon Sales</th>
				<td><?php echo $row['telepon_sales']; ?></td>

				<th>Email Sales</th>
				<td><?php echo $row['email_sales']; ?></td>
			</tr>

			<tr>
				<th>PPN (%)</th>
				<td><?php echo $row['ppn']; ?> %</td>

				<th>Currency</th>
				<td><?php if($row['id_currency'] == 1){
	                  echo 'IDR';
	                }else if ($row['id_currency'] == 2) {
	                  echo 'SGD';
	                }else if ($row['id_currency'] == 3) {
	                  echo 'USD';
	                }else if ($row['id_currency'] == 4) {
	                  echo 'YUAN';
	                }else if ($row['id_currency'] == 5) {
	                  echo 'GBP';
	                }
	          ?>
	      </td>

	      <th>Rate</th>
				<td><?php echo $row['rate_currency']; ?></td>
			</tr>

			<tr>
				<th>Nama Item</th>
				<td><?php echo $row['nama_item']; ?></td>

				<th>&nbsp;</th>
				<td>&nbsp;</td>

				<th>Type Item</th>
				<td><?php echo $row['type_trafo']; ?></td>
			</tr>

		</table>
	</div>
</div>

<hr />

<div class="card-body">
  <div class="content">
		<section class="content-header" style="text-align: center;">
			<h3>LIST ITEM</h3>
		</section>


		<table id="example2" class="table table-bordered table-striped">
		  <thead>
		  <tr>
		    <th style="text-align: center">NO.</th>
		    <th style="text-align: center">No Sub Prospect</th>
		    <th style="text-align: center">Deskripsi</th>
		    <th style="text-align: center">Harga</th>
		    <th style="text-align: center">Quantity</th>
		    <?php if ($row['id_status'] == 3) {
		    	echo '';
		    }else{
		    	echo '<th style="text-align: center">Action</th>';
		    } ?>
		    
		  </tr>
		  </thead>
		  <tbody>
		  <?php
		  include ("koneksi.php");
		  $sql=mysqli_query($mysqli,"select a.*, b.* from transaction a inner join trx_item b ON a.noprospect = b.noprospect where b.noprospect = '$row[noprospect]' and a.transid = '$_GET[transid]' order by id asc");

		  if(mysqli_num_rows($sql) == 0){
		    echo '<tr><td colspan="6">Tidak Ada Data.</td></tr>';
		  }else{
		    $no = 1;
		    while($row = mysqli_fetch_assoc($sql)){
		 	?>
		      <tr>
		        <td style="text-align: center; width: 10%;"><?php echo $no ?></td>
		        <td style="text-align: center"><?php echo $row['nopracost'] ?></td>
		        <td style="text-align: center"><?php echo $row['detail_item'] ?></td>
		        <td style="text-align: center"><?php echo $row['harga_item'] ?></td>
		        <td style="text-align: center"><?php echo $row['qty_item'] ?></td>
		        <?php if ($row['id_status'] == 3 or $row['id_status'] == 4) {
				    	echo '';
				    }else{
				    	echo '<td style="text-align: center"><button type="button" class="btn btn-block btn-outline-primary" data-toggle="modal" data-target="#modal-xl-'.$row['id'].'"><b>Edit Item</b></button></td>';
				    } ?>
		        
		      </tr>

      <div class="modal fade" id="modal-xl-<?php echo $row['id'] ?>">
			  <div class="modal-dialog modal-xl">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h4 class="modal-title">Update Data Item</h4>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			        <form class="form-horizontal" name="update_item_form" action="index.php?page=update_item" method="post" enctype="multipart/form-data">
								<div class="card-body">
									<div class="row">
								    <div class="col-md-4">
								      <div class="form-group">
								        <label>No Quotation</label>
								        <input type="text" name="transid" class="form-control" value="<?php echo $row['transid']; ?>" readonly>  
								      </div>
								    </div>

								    <div class="col-md-4">
								      <div class="form-group">
								        <label>No Prospect</label>
								        <input type="text" name="noprospect" class="form-control" value="<?php echo $row['noprospect']; ?>" readonly>  
								      </div>
								    </div>

									    <div class="col-md-4">
									      <div class="form-group">
									        <label>No Sub Prospect</label>
									        <input type="text" name="nopracost" class="form-control" value="<?php echo $row['nopracost']; ?>" readonly>  
									      </div>
									    </div>

								  </div>

								  <div class="row">
								    <div class="col-md-12">
								        <div class="form-group">
								          <label>Deskripsi</label>
								          <input type="text" name="detail_item" class="form-control" value="<?php echo $row['detail_item']; ?>">  
								        </div>
								    </div>
								  </div>

								  <div class="row">
								    <div class="col-md-6">
								        <div class="form-group">
								          <label>Harga</label>
								          <input type="number" name="harga_item" id="harga_item" class="form-control" value="<?php echo $row['harga_item']; ?>">  
								        </div>
								    </div>

								    <div class="col-md-6">
								        <div class="form-group">
								          <label>Quantity</label>
								          <input type="number" name="qty_item" class="form-control" value="<?php echo $row['qty_item']; ?>">  
								        </div>
								    </div>
								  </div>

								</div>

					      <div class="form-group">
					        <label class="col-sm-3 control-label">&nbsp;</label>
					        <div class="col-sm-6">
					             <button type="reset" class="btn btn-danger">Reset</button>
					             <button type="submit" class="btn btn-primary">Update</button>
					        </div>
					      </div>
					   	</form>

			      </div>
			    </div>
			    <!-- /.modal-content -->
			  </div>
			  <!-- /.modal-dialog -->
			</div>
		  <?php 
		      $no++;
		    }
		  }
		  ?>
		  </tbody>    
		</table>
		

	</div>
</div>

<hr />

<div class="card-body">
  <div class="content">
		<section class="content-header" style="text-align: center;">
			<h3>Term of Payment</h3>
		</section>


		<table id="example3" class="table table-bordered table-striped" >
		  <thead>
		  <tr>
		    <th style="text-align: center; width: 10%;">NO.</th>
		    <th style="text-align: center">DESKRIPSI TOP</th>
		    <th style="text-align: center; width: 10%;">ACTION</th>
		  </tr>
		  </thead>
		  <tbody>
		  <?php
		  include ("koneksi.php");

		  $sql=mysqli_query($mysqli,"select * FROM trx_top where transid = '$_GET[transid]'");

		  if(mysqli_num_rows($sql) == 0){
		    echo '<tr><td colspan="3" style="text-align: center">Tidak Ada Data.</td></tr>';
		  }else{
		    $no = 1;
		    while($row = mysqli_fetch_assoc($sql)){
      ?>
		      <tr>
		        <td style="text-align: center"><?php echo $no ?></td>
		        <td style="text-align: center"><?php echo $row['desc_top'] ?></td>
		        <td style="text-align: center">
              <div class="btn-group">
               <button type="button" class="btn btn-default">
                  <a href="delete_top.php?id_top=<?php echo $row['id_top'] ?>&transid=<?php echo $row['transid'] ?>" title="Hapus TOP" onclick="return confirm('Yakin Ingin Hapus TOP ? Mohon Periksa kembali..')"><i class="fas fa-trash"></i></a>
                </button>
              </div>
            </td>
		      </tr>
		      <?php 	

		      $no++;
		    }
		  }
		  ?>
		  </tbody>    
		</table>
	</div>
</div>


<div class="card-body">
	  <div class="content">
			<table id="example3" class="table table-bordered table-striped" >
			  <thead>
			  <tr>
			    <th style="text-align: center; width: 10%;">NO.</th>
			    <th style="text-align: center">DESKRIPSI TOP (OTHER)</th>
			    <th style="text-align: center; width: 10%;">ACTION</th>
			  </tr>
			  </thead>
			  <tbody>
			  <?php
			  include ("koneksi.php");

			  $sql=mysqli_query($mysqli,"select * FROM trx_top_other where transid = '$_GET[transid]'");

			  if(mysqli_num_rows($sql) == 0){
			    echo '<tr><td colspan="3" style="text-align: center">Tidak Ada Data.</td></tr>';
			  }else{
			    $no = 1;
			    while($row = mysqli_fetch_assoc($sql)){
			    	$id_other = $row['id_top_other'];
			    	$id_trans = $row['transid'];
      ?>
		      <tr>
		        <td style="text-align: center"><?php echo $no ?></td>
		        <td style="text-align: center"><?php echo $row['desc_other'] ?></td>
		        <td style="text-align: center">
              <div class="btn-group">
               <button type="button" class="btn btn-default">
                  <a href="delete_top_other.php?id_top=<?php echo $row['id_top_other'] ?>&transid=<?php echo $row['transid'] ?>" title="Hapus TOP Other" onclick="return confirm('Yakin Ingin Hapus TOP Other ? Mohon Periksa kembali..')"><i class="fas fa-trash"></i></a>
                </button>
              </div>
            </td>
		      </tr>
		      <?php 	

		      $no++;
		    }
		  }
		  ?>
			  </tbody>    
			</table>
		</div>
	</div>

</div>
</section>

<script>
        $(function(){
            $('#btn-tambah').on('click', function(){
                $('#tbl-top-body').append(`
									<tr>
                    <td>
											<select id="desc_top" name="desc_top[]" class="form-control select2" data-placeholder="Select Term of Payment" style="width: 100%;">
                          <?php
												    include "koneksi.php";
												    $sql=mysqli_query($mysqli,"select * from ms_top where status_top = 1 and kode_top != 'other' order by id_top asc");
												    while ($data = mysqli_fetch_array($sql)){
												        echo '<option name="desc_top[]" value="'.$data['desc_top'].'">'.$data['desc_top'].'</option>';
											    }?>
                      </select>
                    </td>
                    <td style="text-align:center;"><button type="button" class="btn btn-danger removeItem">Remove</button></td>
                  </tr>
                `);

                $('.removeItem').on('click', function(){
                    $(this).closest("tr").remove();
                })
            })
        })
    </script>





<?php
  include("footer2.php");
?> 
