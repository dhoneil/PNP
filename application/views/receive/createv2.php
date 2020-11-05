<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Receive Item
    </h1>
    <ol class="breadcrumb">
      <li><a href="javascriot:void(0)"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Receive Item</li>
    </ol>
  </section>

  <section class="content">
    <div class="col-sm-3">
        <button id="btnaddnewreceive" type="button" class="btn btn-block btn-primary btn-flat margin-bottom"><i class="fa fa-plus"></i> New</button>
        <button style="display: none;" id="btnsearch" type="button" class="btn btn-block btn-success btn-flat margin-bottom"><i class="fa fa-search"></i> Search</button>
    </div>
    <div class="col-sm-12">
        <div class="box box-primary">
            <div class="box-header"></div>
            <div class="box-body" id="receive_list_area"></div>
            <div class="box-footer"></div>
        </div>
    </div>
  </section>

</div>

<!-- MODAL -->
<div class="modal fade" id="modalreceive">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="width:100%;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title"><span id="modalreceivetitle"></span></h4>
            </div>
            <div class="modal-body">
                <div class="row" id="AddNewOrderArea">

                    <div class="col-sm-8">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h2 class="box-title">Supplier</h2>
                            </div>
                            <div class="box-body">
                                <table id="" class="table table-bordered table-condensed table-hover">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>Phone&nbsp;No.</th>
                                        </tr>
                                    </thead>
                                    <tbody id="">
                                        <tr >
                                            <td>
                                                <div class="form-group">
                                                    <select id="supplier" class="form-control select2" style="width: 100%;">
                                                      <option value="">[ SELECT ]</option>
                                                      <?php foreach($suppliers as $key => $supp): ?>
                                                        <option value="<?php echo $supp["id"] ?>"><?php echo $supp["supplier_name"] ?></option>
                                                      <?php endforeach ?>
                                                    </select>
                                                </div>
                                            </td>
                                            <td class="supplieraddress">

                                            </td>
                                            <td class="supplierphone">

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h2 class="box-title">Date</h2>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Date</label>
                                    <input id="date" type="date" class="form-control" name="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-8">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h2 class="box-title">Items</h2>
                                <button id="btnadditem" type="button" class="btn btn-xs btn-primary btn-flat pull-right"><i class="fa fa-plus"></i></button>
                            </div>
                            <div class="box-body">
                                <table id="tblitems" class="table table-bordered table-condensed table-hover">
                                    <thead>
                                        <tr>
                                            <th>Location</th>
                                            <th>Product</th>
                                            <th>Rate</th>
                                            <th>Qty</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbodyaddnewitem">
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h2 class="box-title">Computation</h2>
                            </div>
                            <div class="box-body">

                                <div class="form-group">
                                  <label for="discount">Discount</label>
                                  <input type="text" class="form-control numeric" id="discount" placeholder="Enter Discount">
                                </div>

                                <div class="form-group">
                                  <label for="netamount">Total</label>
                                  <input type="text" class="form-control numeric" id="netamount" disabled="">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row" id="EditOrderArea">
                    <input type="hidden" name="" id="receive_id_Edit">
                    <div class="col-sm-8">
                        <div class="box box-success">
                            <div class="box-header with-border">
                                <h2 class="box-title">Supplier</h2>
                            </div>
                            <div class="box-body">
                                <table id="" class="table table-bordered table-condensed table-hover">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>Phone&nbsp;No.</th>
                                        </tr>
                                    </thead>
                                    <tbody id="">
                                        <tr >
                                            <td>
                                                <div class="form-group">
                                                    <select id="supplierEdit" class="form-control select2" style="width: 100%;">
                                                      <option value="">[ SELECT ]</option>
                                                      <?php foreach($suppliers as $key => $supp): ?>
                                                        <option value="<?php echo $supp["id"] ?>"><?php echo $supp["supplier_name"] ?></option>
                                                      <?php endforeach ?>
                                                    </select>
                                                </div>
                                            </td>
                                            <td class="supplieraddress">

                                            </td>
                                            <td class="supplierphone">

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="box box-success">
                            <div class="box-header with-border">
                                <h2 class="box-title">Date</h2>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Date</label>
                                    <input id="dateEdit" type="date" class="form-control" name="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-8">
                        <div class="box box-success">
                            <div class="box-header with-border">
                                <h2 class="box-title">Items</h2>
                                <button id="btnadditemEdit" type="button" class="btn btn-xs btn-success btn-flat pull-right"><i class="fa fa-plus"></i></button>
                            </div>
                            <div class="box-body" id="OrderedItemsEdit">
                                
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="box box-success">
                            <div class="box-header with-border">
                                <h2 class="box-title">Computation</h2>
                            </div>
                            <div class="box-body">

                                <div class="form-group">
                                  <label for="discount">Discount</label>
                                  <input type="text" class="form-control numeric" id="discountEdit" placeholder="Enter Discount">
                                </div>

                                <div class="form-group">
                                  <label for="netamount">Total</label>
                                  <input type="text" class="form-control numeric" id="netamountEdit" disabled="">
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button id="btnsave" type="button" class="btn btn-primary"><i class="fa fa-database"></i> Save</button>
                <button id="btnupdate" type="button" class="btn btn-success"><i class="fa fa-database"></i> Update</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>



<style type="text/css">
    .box{
        box-shadow: 5px 10px 18px #dbd7d7;
    }
</style>

<script type="text/javascript">

    $(document).ready(function(){
        const base_url = "<?php echo base_url(); ?>";
        $('.numeric').numeric();
        getAll()

        function getAll() {
            $.ajax({
                url:base_url+'/receive/search',
                method:'get',
                async:true,
                success:function(data){
                    $('#receive_list_area').html(data)
                }
            })
        }

        

        $(document).on('click','._btneditreceive',function(){
            var thiss = $(this);
            var order_id = thiss.closest('tr').attr('order_id')
            var bill_no = thiss.closest('tr').attr('bill_no')
            var supplier_id = thiss.closest('tr').attr('supplier_id')
            var supplier_address = thiss.closest('tr').attr('supplier_address')
            var supplier_phone = thiss.closest('tr').attr('supplier_phone')
            var date_time = thiss.closest('tr').attr('date_time')
            var discount = thiss.closest('tr').attr('discount')
            var net_amount = thiss.closest('tr').attr('net_amount')

            $('#modalreceive').modal('show');
            $('#modalreceivetitle').text('Edit Receive');
            $('#AddNewOrderArea').hide();
            $('#EditOrderArea').show();

            $('#btnsave').hide();
            $('#btnupdate').show();
            $('#receive_id_Edit').val(order_id);
            $('#supplierEdit option[value='+supplier_id+']').prop('selected', true);
            $('#supplierEdit').closest('tr').find('.supplieraddress').text(supplier_address);
            $('#supplierEdit').closest('tr').find('.supplierphone').text(supplier_phone);
            $('#dateEdit').val(date_time);
            $('#discountEdit').val(discount);
            $('#netamountEdit').val(net_amount);

            $('.select2').select2();
            
            $.ajax({
                url:base_url+'/receive/getitems',
                method:'post',
                async:true,
                data:{
                    edit : true,
                    receive_id : order_id,
                    bill_no : bill_no,
                },
                success:function(data){
                    $('#OrderedItemsEdit').html(data);
                }
            })

        });

        

        $(document).on('click','._btndeletereceive',function(){
            var thiss = $(this);
            var order_id = thiss.closest('tr').attr('order_id')
            if (confirm('Are you sure to delete this transaction?')) {
                $.ajax({
                    url:base_url+'/receive/deleteReceive',
                    method:'post',
                    async:true,
                    dataType:'JSON',
                    data:{
                        receive_id : order_id
                    },
                    success:function(data){
                        if (data.status==true) {
                            getAll();
                        }else{
                            alert('Something went wrong...')
                        }
                    }
                })
            }
        });
        
        $(document).on('click','.btn_getItems',function(){
            var thiss = $(this);
            var order_id = thiss.closest('tr').attr('order_id')
            $.ajax({
                url:base_url+'/receive/getitems',
                method:'post',
                async:true,
                data:{
                    receive_id : order_id
                },
                success:function(data){
                    thiss.closest('tr').find('._itemsArea').html(data);
                }

            })
        });

        $('#btnsearch').click(function(){
            getAll()
        });

        $('#btnsave').click(function(){
            var tbody = $("#tblitems tbody");
            var rowCount = $('#tbodyaddnewitem tr').length;

            var flag = true;
            $('#tbodyaddnewitem .form-control').each(function () {
                if ($(this).val().trim() == '') {
                    $(this).closest('div.form-group').addClass('has-error');
                    flag = false;
                } else {
                    $(this).closest('div.form-group').removeClass('has-error');
                }
            });

            if ($('#supplier').find(':selected').val() == '') {
                $('#supplier').closest('div.form-group').addClass('has-error');
                flag = false;
            } else {
                $('#supplier').closest('div.form-group').removeClass('has-error');
            }

            if ($('#date').val() == '') {
                $('#date').closest('div.form-group').addClass('has-error');
                flag = false;
            } else {
                $('#date').closest('div.form-group').removeClass('has-error');
            }

            if (flag) {
                if (rowCount > 0){
                    if (confirm('Are you sure to save this receive transaction? Please review before submitting')) {
                        //INSERT DATA
                        var table_data = [];

                        $('#tblitems > tbody  > tr').each(function() {
                            var thiss = $(this);
                            var sub = {
                                'location_id':thiss.find('.location').find(':selected').val(),
                                'product_id':thiss.find('.product').find(':selected').val(),
                                'rate':thiss.find('.rate').val().trim(),
                                'quantity':thiss.find('.qty').val().trim(),
                            };
                            table_data.push(sub);
                        });
                        // /console.log(table_data);
                        $.ajax({
                            url:base_url+'/receive/save',
                            method:'post',
                            async:true,
                            dataType: 'JSON',
                            data:{
                                supplier_id:$('#supplier').find(':selected').val(),
                                date_time:$('#date').val(),
                                discount:$('#discount').val().trim(),
                                net_amount:$('#netamount').val().trim(),
                                item_table:table_data,
                            },
                            success:function(data){
                                if (data.status=='success') {
                                    $('.btnremoverow').trigger('click');
                                    $('#modalreceive').modal('hide');
                                    $('#btnsearch').trigger('click');
                                }else{
                                    alert('Something went wrong...')
                                }
                            }
                        })
                    }
                }else{
                    alert('Please select item(s) first...')
                }
            }
        });

        function calculateAll() {
            var totalrate = 0;
            $('.rate').each(function (i, e) {
                var rate = $(this).val()-0;
                var thisqty = $(this).closest('tr').find('.qty').val().trim();
                var rowtotal = Number(rate)*Number(thisqty);
                totalrate+=rowtotal;
            });
            var discount = $('#discount').val().trim();
            totalrate-=Number(discount);
            $('#netamount').val(totalrate.toFixed(2));
        }

        
        $(document).on('click','.btnremoverow',function(){
            $(this).closest('tr').remove();
            calculateAll();
        });

        $(document).on('keyup','.rate,.qty,#discount',function(){
            calculateAll();
        });

        $(document).on('change','.product',function(){
            var thiss = $(this);
            var product_id = thiss.find(':selected').val();
            $.ajax({
                url:base_url+'/receive/GetProductInfoById',
                method:'post',
                async:true,
                data:{
                    product_id:product_id,
                },
                success:function(data){
                    thiss.closest('tr').find('.rate').val(data.replace(/[^0-9]/g, ''));
                    calculateAll();
                }
            })
        });

        $(document).on('change','.location',function(){
            var thiss = $(this);
            var prod_cat_id = $(this).find(':selected').attr('prod_cat_id');
            $.ajax({
                url:base_url+'/receive/GetProductsByLocations_productcategory_id',
                method:'post',
                async:true,
                data:{
                    prod_cat_id:prod_cat_id,
                },
                success:function(data){
                    thiss.closest('tr').find('.product').html(data);
                }
            })
        });

        $(document).on('change','#supplier,#supplierEdit',function(){
            var thiss = $(this);
            var supplier_id = thiss.find(':selected').val();
            $.ajax({
                url:base_url+'/receive/getsupplierdata',
                method:'post',
                async:true,
                dataType: 'JSON',
                data:{
                    supplier_id:supplier_id,
                },
                success:function(data){
                    thiss.closest('tr').find('.supplieraddress').text(data.address);
                    thiss.closest('tr').find('.supplierphone').text(data.phone);
                }
            })
        });

        $('#btnaddnewreceive').click(function(){
            $('#modalreceive').modal('show');
            $('#modalreceivetitle').text('Add New Receive');
            $('#AddNewOrderArea').show();
            $('#EditOrderArea').hide();

            $('#btnsave').show();
            $('#btnupdate').hide();
        });

        $('#btnadditem').click(function(){
            $('#tblitems').find('tbody').append('<tr>'+

                '<td>'+
                    '<div class="form-group">'+
                        '<select class="form-control select2 location" style="width: 100%;">'+
                          '<option value="">[ SELECT ]</option>'+
                          <?php foreach($locations as $key => $loc): ?>
                            '<option prod_cat_id="<?php echo $loc["productcategory_id"] ?>" value="<?php echo $loc["ID"] ?>"><?php echo $loc["location_name"] ?></option>'+
                          <?php endforeach ?>
                        '</select>'+
                    '</div>'+
                '</td>'+

                '<td>'+
                    '<div class="form-group">'+
                        '<select class="form-control select2 product" style="width: 100%;">'+
                          '<option value="">[ SELECT ]</option>'+

                        '</select>'+
                    '</div>'+
                '</td>'+

                '<td>'+
                    '<div class="form-group">'+
                        '<input type="text" class="form-control numeric rate" id="rowrate" placeholder="Enter Rate" value="">'+
                    '</div>'+
                '</td>'+

                '<td>'+
                    '<div class="form-group">'+
                        '<input type="text" class="form-control numeric qty" id="rowqty" placeholder="Enter Qty" value="1">'+
                    '</div>'+
                '</td>'+

                '<td>'+
                    '<div class="form-group">'+
                        '<button class="btn btn-xs btn-danger btnremoverow"> <i class="fa fa-remove"></i></button>'+
                    '</div>'+
                '</td>'

            +'</tr>');
        });

    });
</script>