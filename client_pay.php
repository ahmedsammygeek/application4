<?php require 'sidebar.php'; ?>
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<img  class="box-title" src="img/credit/paypal.png" alt="">

					<h3 class="text-center">فواتير سداد العملاء</h3>  
					<div class="row">	
						<div class="col-md-8">
							
						</div>

					</div>
				</div><!-- /.box-header -->
				
				<div class="box-body table-responsive">
					<input class="btn btn-default btn-block btn-flat" type="button" value="كشف حساب عميل" onclick="window.print()" >

					<div id="example1_wrapper" class="dataTables_wrapper form-inline" role="grid">
						<div class="row">
							<div class="col-xs-6">

							</div>
							<div class="col-xs-6">
							</div>
						</div>
						<table id="example1" class="table table-bordered table-striped dataTable" aria-describedby="example1_info">
							<thead>
								<tr role="row">
									<th>المسلسل</th>
									<th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 189px;">اسم العميل</th>
									<th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 277px;">المبلغ المدفوع</th>
									<th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 248px;">المبلغ المتبقي</th>
									<th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 159px;">التاريخ</th>
								</tr>
							</thead>
							<tbody role="alert" aria-live="polite" aria-relevant="all"><tr class="odd">
								<?php
								if (isset($_GET['id'])) {
									$id=$_GET['id'];
								} 
								require 'connection.php'; 
								$sql="SELECT * FROM pay_client WHERE client_id=$id";
								$query=$conn->query($sql);
								$i=1;
								while ($result=$query->fetch(PDO::FETCH_ASSOC)) {
									extract($result);
									$query2=$conn->query("SELECT * FROM clients WHERE id=$client_id");
									$result2=$query2->fetch(PDO::FETCH_ASSOC);
									extract($result2);
									echo "<tr class='even'>
									<td>$i</td>
									<td class=''>$client_name</td>
									<td class=''>$money</td>
									<td class=''>$deserved</td>
									<td class=''>$date</td>
									</tr>";
									$i++;
								}
								?>
							</tbody>
						</table>


					</div><!-- /.box-body -->
				</div>
			</div>
		</div>
	</section>
	<?php require 'footer.php'; ?>