

<?php require 'sidebar.php'; ?>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<!-- general form elements -->
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">اضف فاتورة مورد جديدة </h3>
				</div><!-- /.box-header -->
				<?php 
				if (isset($_GET['msg'])) {
					switch ($_GET['msg']) {
						case 'empty_data':
						echo "<div class='alert alert-danger alert-dismissable'>
						<i class='fa fa-ban'></i>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
						<b>Alert!</b> من فضلك ادخل جميع البيانات.
						</div>";
						break;
						case 'error_data':
						echo "<div class='alert alert-danger alert-dismissable'>
						<i class='fa fa-ban'></i>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
						<b>Alert!</b> من فضلك حاول مرة اخرى او توجه الى الدعم.
						</div>";
						break;
						default:
						# code...
						break;
					}
				}
				?>
				<!-- form start -->
				<form role="form" action="addsupplierbill.php" method="post" >
					<div class="box-body">
							<button  name="add_more" value="dd" class="btn btn-sucess pull-right">اضافة جديد</button>
							<label for="exampleInputPassword1">المورد :</label>
							<div class="form-group">		
								<select name="supplier" id="" class="btn btn-default dropdown-toggle">
									<?php require 'connection.php';
									$sql="SELECT * FROM suppliers";
									$query=$conn->query($sql);
									while ($result=$query->fetch(PDO::FETCH_ASSOC)) {
										extract($result);
										echo "<option value='$id'>$supplier_name</option>";
									} ?>

								</select>
							</div>
							
							<div class="copy row">
								<div class="form-group col-md-4">
								<label >الكمية</label>
								<input type="number" name="quantity[]" class="form-control"  placeholder="الكمية المستلمة">
							</div>
							<div class="form-group col-md-4">
								<label for="exampleInputPassword1">السعر</label>
								<input type="text" name="price[]" class="form-control"  placeholder="سعر الشراء">
							</div>
							<label >المنتج :</label>
							<div class="form-group col-md-4">	
								<select name="products[]"  class="produtcs  form-control">
									<?php 
									$sql="SELECT * FROM products";
									$query=$conn->query($sql);
									while ($result=$query->fetch(PDO::FETCH_ASSOC)) {
										extract($result);
										echo "<option value=''></option>";
										echo "<option value='$id'>$product_name</option>";
									} ?>

								</select>
							</div>
							</div>


						


						
					</div><!-- /.box-body -->

					<div class="box-footer">

						<button type="submit" name="submit" value="dd" class="btn btn-primary">اضف الفاتورة الموردة</button>
					</div>
				</form>
			</div><!-- /.box -->

			<!-- Form Element sizes -->

		</div>
	</div>
</section>

<?php require 'footer.php'; ?>
