

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Reports
      <small>Sales Per Customer</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Sales</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-md-12 col-xs-12">

        <div id="messages"></div>

        <?php if($this->session->flashdata('success')): ?>
          <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $this->session->flashdata('success'); ?>
          </div>
        <?php elseif($this->session->flashdata('error')): ?>
          <div class="alert alert-error alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $this->session->flashdata('error'); ?>
          </div>
        <?php endif; ?>

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Sales Per Customer</h3>
          </div>
		  
		  
          <!-- /.box-header -->
          <div class="box-body">
		  
		  
			<div class="col-md-12" style="margin-bottom:20px;background-color:#eaeaea;padding:10px 0;">
				<form action="<?=site_url("reports/sales_search/")?>" method="post">
				<div class="col-md-6" style="margin-bottom:20px;">
					<div class="form-group">
					  <label for="gross_amount" class="col-sm-4 control-label">Orders From</label>
					<div class="col-sm-8">
					  <input type="date" class="form-control datepicker" id="from_date" name="from_date" value="<?php echo date('Y-m-d',strtotime($this->session->userdata('from_date'))) ?>" autocomplete="off">
					</div>
					</div>
				</div>
				<div class="col-md-6" style="margin-bottom:20px;">
					<div class="form-group">
					  <label for="gross_amount" class="col-sm-4 control-label">To Date</label>
					<div class="col-sm-8">
					  <input type="date" class="form-control datepicker" id="to_date" name="to_date" value="<?php echo date('Y-m-d',strtotime($this->session->userdata('to_date'))) ?>" autocomplete="off" style="margin:5px 0;">
					</div>
					</div>
				</div>
				<div style="text-align:center">
					<input type="submit" class="btn btn-primary" value="Search">&nbsp;
					<a href="<?=site_url("reports/allcustomersales")?>" class="btn btn-default">Generate Summary Report</a>&nbsp;
					<a href="<?=site_url("reports/detailcustomersales")?>" class="btn btn-default">Generate Detail Report</a>
				</div>
				</form>
			</div>
			
			<div class="col-md-12 col-xs-12 pull pull-left">
            <table id="manageTable" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Customer</th>
                <th>Address</th>
                <th>Sales Paid</th>
                <th>Sales Unpaid</th>
				<th>Total Sales</th>
                <th>Action</th>
              </tr>
              </thead>

            </table>
			</div>
			
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- col-md-12 -->
    </div>
    <!-- /.row -->
    

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script type="text/javascript">
var manageTable;
var base_url = "<?php echo base_url(); ?>";

$(document).ready(function() {

  $("#reportsNav").addClass('active');
  $("#reportSalesNav").addClass('active');

  // initialize the datatable 
  manageTable = $('#manageTable').DataTable({
    'ajax': base_url + 'reports/fetchSalesByCustomer',
    'order': []
  });

});

</script>
