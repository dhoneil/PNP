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

<div class="modal fade" id="addModallocation" style="display:none;" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="width:100%;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Recieve Item</h4>
            </div>
            <div class="modal-body">
                <div class="box box-solid">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Supplier Name</label>
                                    <select id="product_supplier" class="form-control" style="width: 100%;">
                                            <?php foreach ($suppliersss as $k => $x): ?>
                                            <option data-info="<?php echo $x['supplier_address'] ?>"  data-infos="<?php echo $x['supplier_phone'] ?>" value="<?php echo $x['id'] ?>" selected><?php echo $x['supplier_name']?></option>
                                            <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">        
                                <div class="form-group">
                                    <label>Supplier Address</label>
                                    <input id="supplieraddress" type="text" value="<?php echo $x['supplier_address']?>" class="form-control data" readonly>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Supplier Phone</label>
                                    <input id="supplierphone" type="text" value="<?php echo $x['supplier_phone']?>" class="form-control data" readonly>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="dateofcreation">Date</label>
                                    <input type="date" class="form-control" id="dateofcreation" >
                                </div>              
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box box-solid">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label>Category</label>
                                    <select id="product_category" class="form-control" style="width: 100%;">
                                            <option value="">[ SELECT ]</option>
                                            <option value="1" selected>Firearms</option>
                                            <option value="2">Ammunition</option>
                                            <option value="3">Equipments</option>
                                            <option value="4">Covid Resources</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="brand_name">Location</label>
                                    <select name="" id="" class="form-control">
                                      <option value="">[ SELECT ]</option>
                                      <?php foreach ($locationdata as $k => $x): ?>
                                        <option value="<?php echo $x['productcategory_id'] ?>" productcategory_id="<?php echo $x['productcategory_id']  ?>" location_id="<?php echo $x['ID']  ?>"><?php echo $x['location_name'] ?></option>
                                      <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="brand_name">Product</label>
                                    <select name="" id="" class="form-control">
                                      <option value="">[ SELECT ]</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-1">
                                <div class="form-group">
                                    <label>Quantity</label>
                                    <input id="supplieraddress" type="text" value="" class="form-control data" readonly>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label>Rate</label>
                                    <input id="supplieraddress" type="text" value="" class="form-control data" readonly>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label>Amount</label>
                                    <input id="supplieraddress" type="text" value="" class="form-control data" readonly>
                                </div>               
                            </div>
                            <div class="col-lg-1">
                                <div class="btn-group">
                                    <label>Option</label>
                                    <button class="btn btn-default">Add</button>
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

        $('#product_supplier').change(function(){
            $('#supplieraddress').val( $(this).find('option:selected').data('info'));
            $('#supplierphone').val( $(this).find('option:selected').data('infos')); 
        });
        
        $('#product_supplier').change(function(){
            $('#supplieraddress').val( $(this).find('option:selected').data('info'));
            $('#supplierphone').val( $(this).find('option:selected').data('infos')); 
        });
    })
</script>