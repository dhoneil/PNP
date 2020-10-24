<div class="content-wrapper">
    <section class="content-header">
        <h1>
        Manage
        <small>Maintenance</small>
        </h1>
        <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Location</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
        <div class="col-md-3">
          <div class="box box-default box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Option</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="form-group">
                  <label>Select category</label>
                  <select class="form-control">
                    <option>Firearms</option>
                    <option>Ammunition</option>
                    <option>Equipments</option>
                    <option>Covid Resources</option>
                  </select>
                </div>  
                <button type="button" class="btn btn-block btn-primary">Filter</button>
                <button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#addModal">Add Product Location</button>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        </div>
    </section>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="addModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Add Supplier</h4>
      </div>

      <form role="form" method="post" id="createForm">

        <div class="modal-body">
          <div class="form-group">
              <label for="select_category">Select Product category</label>
              <select class="form-control">
                    <option>Firearms</option>
                    <option>Ammunition</option>
                    <option>Equipments</option>
                    <option>Covid Resources</option>
              </select>
          </div>
          <div class="form-group">
            <label for="brand_name">Product location</label>
            <input type="text" class="form-control" id="product_location" name="product_location" placeholder="Enter Product location" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="brand_name">Supplier Address</label>
            <input type="text" class="form-control" id="supplier_address" name="supplier_address" placeholder="Enter Supplier address" autocomplete="off">
          </div>
          <div class="form-group">
          <div class="form-group">
            <label for="active">Status</label>
            <select class="form-control" id="active" name="active">
              <option value="1">Active</option>
              <option value="2">Inactive</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

