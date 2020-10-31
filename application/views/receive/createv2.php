<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Manage
      <small>Receive Item</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Receive Item</li>
    </ol>
  </section>
   <br>
  <div class="col-sm-3">
      <button id="btnaddnewreceived" class="btn btn-primary btn-flat btn-block margin-bottom"><i class="fa fa-plus"></i> New</button>
      <div class="box box-primary">
         <div class="box-header">
            <h3 class="box-title">Search</h3>
         </div>
         <div class="box-body">

            <div class="form-group">
               <label>Category</label>
               <select id="searchcategory" class="form-control " style="width: 100%;">
                  <option value="">[ SELECT ]</option>
                  <option value="1" selected>FIREARMS</option>
                  <option value="2">AMMUNITION</option>
                  <option value="3">EQUIPMENTS</option>
                  <option value="4">COVID-19 RESOURCES</option>
               </select>
            </div>

            <div class="form-group">
               <label>Status</label>
               <select id="searchstatus" class="form-control " style="width: 100%;">
                  <option value="">[ SELECT ]</option>
                  <option value="1" selected>ACTIVE</option>
                  <option value="0">INACTIVE</option>
               </select>
            </div>

         </div>
         <div class="box-footer">
            <button id="btnsearch" class="btn btn-primary btn-flat btn-block"><i class="fa fa-search"></i> Search</button>
         </div>
      </div>
  </div>

  <div class="col-sm-9">
     <div class="box box-primary">
         <div class="box-header">
            <h3 class="box-title"><i class="fa fa-list"></i> List</h3>
         </div>
         <div class="box-body" id="productcategorylistarea">

         </div>
      </div>
  </div>
</div>

<div class="modal fade" id="addModallocation" style="display:none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Recieve Item</h4>
            </div>
            <div class="modal-body">
                <div class="box box-solid">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Supplier Name</label>
                                    <select id="product_category" class="form-control" style="width: 100%;">
                                            <option value="">[ SELECT ]</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Supplier Address</label>
                                    <input type="text" value="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Supplier Phone</label>
                                    <input type="text" value="" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Date</label>
                                    <select id="product_category" class="form-control" style="width: 100%;">
                                            <option value="">[ SELECT ]</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box box-solid">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                        <label>Select Product category</label>
                                        <select id="product_category" class="form-control" style="width: 100%;">
                                                <option value="">[ SELECT ]</option>
                                                <option value="1" selected>Firearms</option>
                                                <option value="2">Ammunition</option>
                                                <option value="3">Equipments</option>
                                                <option value="4">Covid Resources</option>
                                        </select>
                                    </div>
                                </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="brand_name">Product location</label>
                                    <input type="text" class="form-control" id="product_location_name" name="product_location" placeholder="Enter Product location" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                <button id="btnadd" class="btn btn-primary btn-flat btn-block"><i class="fa fa-plus"></i> Save</button>
                </div>
            </div>       
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script type="text/javascript">
    $(document).ready(function(){
    $(".select2").select2();

    $(document).on('click','#btnaddnewreceived',function(){
      $('#addModallocation').modal('show');
    });
    })
</script>