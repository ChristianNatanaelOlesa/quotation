<?php
  include("header2.php");
?> 

<div class="container">
	<div class="content">
		<h3><center>Detail Transaction</center></h3>
		<table class="table table-striped">
			<tr>
				<th>Quotation No.</th>
				<td><?php echo $row['transid']; ?></td>
			</tr>
			<tr>
				<th>Transaction Date</th>
				<td><?php echo $row['transdate']; ?></td>
			</tr>
			<tr>
				<th>Status</th>
				<td>
					<?php 
						if($row['id_status'] == 1){echo 'OPEN';
			            }else if ($row['id_status'] == 2) {
			              echo 'APPROVE';
			            }else if ($row['id_status'] == 3) {
			              echo 'PRINT';
			            }else if ($row['id_status'] == 4) {
			              echo 'REVISI';
			            } 
		            ?>	
            	</td>
			</tr>
			<tr>
				<th>Customer Code</th>
				<td><?php echo $row['id_cust']; ?></td>
			</tr>
			<tr>
				<th>Nama Customer</th>
				<td><?php echo $row['nama_cust']; ?></td>
			</tr>
			<tr>
				<th>Nama Perusahaan</th>
				<td><?php echo $row['perusahaan_cust']; ?></td>
			</tr>
			<tr>
				<th>Alamat Customer</th>
				<td><?php echo $row['alamat_cust']; ?></td>
			</tr>
			<tr>
				<th>Area Customer</th>
				<td><?php echo $row['area_cust']; ?></td>
			</tr>
			<tr>
				<th>Telepon Customer</th>
				<td><?php echo $row['telepon_cust']; ?></td>
			</tr>
			<tr>
				<th>Email Customer</th>
				<td><?php echo $row['email_cust']; ?></td>
			</tr>
			<tr>
				<th>CustQQ Code</th>
				<td><?php echo $row['custqq_code']; ?></td>
			</tr>
			<tr>
				<th>CustQQ Name</th>
				<td><?php echo $row['custqq_name']; ?></td>
			</tr>
			<tr>
				<th>Kode Sales</th>
				<td><?php echo $row['id_sales']; ?></td>
			</tr>
			<tr>
				<th>Nama Sales</th>
				<td><?php echo $row['nama_sales']; ?></td>
			</tr>
			<tr>
				<th>Telepon Sales</th>
				<td><?php echo $row['telepon_sales']; ?></td>
			</tr>
			<tr>
				<th>Email Sales</th>
				<td><?php echo $row['email_sales']; ?></td>
			</tr>
			<tr>
				<th>PPN (%)</th>
				<td><?php echo $row['ppn']; ?> %</td>
			</tr>
			<tr>
				<th>Currency</th>
				<td><?php echo $row['id_currency']; ?></td>
			</tr>
			<tr>
				<th>Rate</th>
				<td><?php echo $row['rate_currency']; ?></td>
			</tr>
		</table>
	</div>
</div>

<?php
  include("header2.php");
?> 
