<?php require 'sidebar.php'; ?>
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">فواتير العملاء</h3>                                    
				</div><!-- /.box-header -->
				<?php 
				if (isset($_GET['msg'])) {
					switch ($_GET['msg']) {
						case 'data_inserted':
						echo "<div class='alert alert-success alert-dismissable'>
						<i class='fa fa-check'></i>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
						<b>Alert!</b> تم ادخال البينات بنجاح.
						</div>";
						break;
						case 'error_data':
						echo "<div class='alert alert-danger alert-dismissable'>
						<i class='fa fa-ban'></i>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
						<b>Alert!</b> من فضلك حاول مرة اخرى او توجه الى الدعم.
						</div>";
						break;
						case 'data_deleted':
						echo "<div class='alert alert-success alert-dismissable'>
						<i class='fa fa-check'></i>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
						<b>Alert!</b> تم حذف البينات بنجاح.
						</div>";
						break;
						case 'data_updated':
						echo "<div class='alert alert-success alert-dismissable'>
						<i class='fa fa-check'></i>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
						<b>Alert!</b> تم تعديل البيانات بنجاح.
						</div>";
						break;
						default:
							# code...
						break;
					}
				}
				?>
				<div class="box-body table-responsive">
					<div id="example1_wrapper" class="dataTables_wrapper form-inline" role="grid">
						<div class="row">
							<div class="col-xs-6">
								</div>
					<div class="col-xs-6">
				</div>
						</div>
						<table  class="table table-bordered table-striped dataTable" aria-describedby="example1_info">
							<thead>
								<tr role="row">
									<th>المسلسل</th>
									<th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 189px;">اسم العميل</th>
									<th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 277px;">المنتج</th>
									<th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 248px;">الكمية</th>
									<th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 159px;">السعر</th>
									<th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 115px;">الاجمالى</th>
									<th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 115px;">رقم الفانورة</th>
									<th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 159px;">التاريخ</th>
									<th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 115px;">خيارات</th>
								</tr>
							</thead>
							<tbody role="alert" aria-live="polite" aria-relevant="all"><tr class="odd">
								<?php require 'connection.php'; 
								$sql="SELECT * FROM bills";
								$query=$conn->query($sql);
								$i=1;
								while ($result=$query->fetch(PDO::FETCH_ASSOC)) {
									extract($result);
									$query2=$conn->query("SELECT client_name FROM clients WHERE id=$client_id");
									$result2=$query2->fetch(PDO::FETCH_ASSOC);
									extract($result2);
									$query3=$conn->query("SELECT product_name FROM products WHERE id=$product_id");
									$result3=$query3->fetch(PDO::FETCH_ASSOC);
									extract($result3);
									echo "<tr class='even'>
									<td>$i</td>
									<td class=''><a href='client_bill.php?id=$client_id'>$client_name</a></td>
									<td class=''>$product_name</td>
									<td class=''>$quantity</td>
									<td class=''>$price</td>
									<td class=''>$total</td>
									<td class=''><a href='printbill.php?id=$bill_num'>$bill_num</a></td>
									<td class=''>$time</td>
									<td class=''><a href='deletebill.php?id=$id'><button class='btn btn-danger btn-sm'>حذف</button></a>
									</td>
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