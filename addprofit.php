<?php 
$start=$_POST['start'];
$end=$_POST['end'];

if (empty($start)) {
	header("location: profit.php?msg=empty_data");die();
}

require 'sidebar.php'; ?>
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">المبيعات وصافى الارباح</h3>                                    
				</div><!-- /.box-header -->
				<div class="box-body table-responsive">
					<div id="example1_wrapper" class="dataTables_wrapper form-inline" role="grid">
						<div class="row">
							<div class="col-xs-12">
								<table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>المسلسل</th>
											<th>اسم المنتج </th>
											<th>سعر الشراء</th>
											<th>سعر البيع</th>
											<th>الكمية</th>
											<th>الربح</th>
											<th>التاريخ</th>
										</tr>
									</thead>


									

									<tbody>
										
										<?php require 'connection.php'; 
										$sql="SELECT * FROM bills WHERE time  BETWEEN '$start' AND '$end' ";
										$query=$conn->query($sql);
										$i=1;
										$total_profit = 0;
										while ($result=$query->fetch(PDO::FETCH_ASSOC)) {
											extract($result);
											$query2=$conn->query("SELECT product_name,original_price FROM products WHERE id=$product_id");
											$result2=$query2->fetch(PDO::FETCH_ASSOC);
											extract($result2);
											$reb7 = bcsub($price , $original_price);
											$profit1=bcmul($reb7, $quantity);

											$total_profit += $profit1;
											echo "<tr class='even'>
											<td>$i</td>
											<td class='sorting_1'>$product_name</td>
											<td class=''>$original_price</td>
											<td class=''>$price</td>
											<td class=''>$quantity</td>
											<td class=''>$profit1</td>
											<td class=''>$time</td>
											</tr>";
											$i++;
										}
										?>

									</tbody>
								</table>

			
							<?php echo '<blockquote class="pull-right">
                                        <p>صافى الارباح لهذاة الفترة هيا : '.$total_profit.' جنية</p>
                                        
                                    </blockquote>'; ?>
							</div>
						</div>
					</div><!-- /.box-body -->
				</div>
			</div>
		</div>
	</section>
	<?php require 'footer.php'; ?>
