

<?php if ($edit): ?>
	<table id="tblitemsEdit" class="table table-bordered table-condensed table-hover">
        <thead>
            <tr>
                <th>Location</th>
                <th>Product</th>
                <th>Rate</th>
                <th>Qty</th>
                <th></th>
            </tr>
        </thead>
        <tbody id="tbodyaddnewitemEdit">
            <?php foreach ($items as $key => $x): ?>
				<tr>
					<td>
						<div class="form-group">
	                        <select class="form-control select2 locationEdit" style="width: 100%;">
	                          <option value="">[ SELECT ]</option>
	                          <?php foreach($this->model_locations->getActiveProduct_Location() as $key => $loc): ?>
	                            <option <?php echo ($x['location_id']==$loc['ID'])?"selected":""  ?> prod_cat_id="<?php echo $loc["productcategory_id"] ?>" value="<?php echo $loc["ID"] ?>"><?php echo $loc["location_name"] ?></option>
	                          <?php endforeach ?>
	                        </select>
	                    </div>
					</td>
					<td>
						<div class="form-group">
	                        <select class="form-control select2 productEdit" style="width: 100%;">
	                          <option value="">[ SELECT ]</option>
	                          <?php foreach($this->model_products->getActiveProductDatav2() as $key => $prod): ?>
	                            <option <?php echo ($x['product_id']==$prod['id'])?"selected":""  ?> value="<?php echo $prod["id"] ?>"><?php echo $prod["item"] ?></option>
	                          <?php endforeach ?>
	                        </select>
	                    </div>
					</td>
					<td>
	                    <div class="form-group">
	                        <input type="text" class="form-control numeric rateEdit rowrateEdit" placeholder="Enter Rate" value="<?php echo $x['rate'] ?>">
	                    </div>
	                </td>
	                <td>
	                    <div class="form-group">
	                        <input type="text" class="form-control numeric qtyEdit rowqtyEdit" placeholder="Enter Qty" value="<?php echo $x['qty'] ?>">
	                    </div>
	                </td>
					<td>
						<button class="btn btn-xs btn-danger btnremoverowEdit"> <i class="fa fa-remove"></i></button>
					</td>
				</tr>
			<?php endforeach ?>
        </tbody>
    </table>	

<?php else: ?>
	<table class="table table-condensed table-bordered table-hover" style="color:black; background-color: #ebe8e8;">
		<thead>
			<tr>
				<th>CATEGORY</th>
				<th>ITEM</th>
				<th>LOCATION</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($items as $key => $x): ?>
				<tr>
					<td><?php echo $x['category_name'] ?></td>
					<td><?php echo $x['item_name'] ?></td>
					<td><?php echo $x['location_name'] ?></td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
<?php endif ?>




<script type="text/javascript">
	$(document).ready(function(){
		$('.select2').select2();

		function calculateAllEdit() {
            var totalrate = 0;
            $('.rateEdit').each(function (i, e) {
                var rate = $(this).val()-0;
                var thisqty = $(this).closest('tr').find('.qtyEdit').val().trim();
                var rowtotal = Number(rate)*Number(thisqty);
                totalrate+=rowtotal;
            });
            var discount = $('#discountEdit').val().trim();
            totalrate-=Number(discount);
            $('#netamountEdit').val(totalrate.toFixed(2));
        }

        $(document).on('keyup','.rateEdit,.qtyEdit,#discountEdit',function(){
            calculateAllEdit();
        });

        $(document).on('change','.productEdit',function(){
            var thiss = $(this);
            var product_id = thiss.find(':selected').val();
            $.ajax({
                url:'<?php echo base_url(); ?>/receive/GetProductInfoById',
                method:'post',
                async:true,
                data:{
                    product_id:product_id,
                },
                success:function(data){
                    thiss.closest('tr').find('.rateEdit').val(data.replace(/[^0-9]/g, ''));
                    calculateAllEdit();
                }
            })
        });

        $(document).on('change','.locationEdit',function(){
            var thiss = $(this);
            var prod_cat_id = $(this).find(':selected').attr('prod_cat_id');
            $.ajax({
                url:'<?php echo base_url(); ?>/receive/GetProductsByLocations_productcategory_id',
                method:'post',
                async:true,
                data:{
                    prod_cat_id:prod_cat_id,
                },
                success:function(data){
                    thiss.closest('tr').find('.productEdit').html(data);
                    $('.select2').select2();
                }
            })
        });


	});
</script>