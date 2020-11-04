<div style="height: 580px; overflow-x: auto; overflow-y: auto;">
	<table class="table table-condensed table-hover table-bordered">
		<thead>
			<tr>
				<th>Ref No.</th>
				<th>Supplier - Phone</th>
				<th>Total Items</th>
				<th>Date Time</th>
				<th>Total Amount</th>
				<th>Status</th>
				<th><i class="fa fa-gear"></i></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($receive_list as $key => $x): ?>
				<tr
					order_id="<?php echo $x['id'] ?>"
					bill_no="<?php echo $x['bill_no'] ?>"
					supplier_id="<?php echo $x['supplier_id'] ?>"
					supplier_address="<?php echo $x['supplier_address'] ?>"
					supplier_phone="<?php echo $x['supplier_phone'] ?>"
					date_time="<?php echo $x['date_time'] ?>"
					discount="<?php echo $x['discount'] ?>"
					net_amount="<?php echo $x['net_amount'] ?>"
				>
					<td><?php echo $x['bill_no'] ?></td>
					<td><?php echo $x['supplier_name'].' - '.$x['supplier_phone'] ?></td>
					<td>
						
						<div class="btn-group">
		                  <a href="javascript:void(0)" class="dropdown-toggle btn_getItems" data-toggle="dropdown"><?php echo $this->model_receiveorders->countOrderItem($x['id']) ?></a>
		                  </button>
		                  <ul class="dropdown-menu pull-right list-unstyled ">
		                  	<div class="_itemsArea" style="max-height: 600px; overflow-x: auto; overflow-y: auto; ">

		                  	</div>
		                  </ul>
		                </div>

					</td>

					<td><?php echo $x['date_time'] ?></td>
					<td><?php echo $x['net_amount']  ?></td>
					<td><?php echo ($x['paid_status']==2)?'UNPAID':'PAID' ?></td>
					<td>
						<div class="btn-group">
		                  <button type="button" class="btn btn-xs btn-default btn-flat dropdown-toggle" data-toggle="dropdown">
		                    <span class="caret"></span>
		                    <span class="sr-only">Toggle Dropdown</span>
		                  </button>
		                  <ul class="dropdown-menu pull-right" role="menu">
		                    <li><a class="_btnprintreceive" href="javascript:void(0)"><i class="fa fa-print"></i> Print</a></li>
		                    <li><a class="_btneditreceive" href="javascript:void(0)"><i class="fa fa-edit"></i> Edit</a></li>
		                    <li><a class="_btndeletereceive" href="javascript:void(0)"><i class="fa fa-trash"></i> Delete</a></li>
		                  </ul>
		                </div>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>