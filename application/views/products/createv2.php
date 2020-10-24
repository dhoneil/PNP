

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Manage
      <small>Products</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Products</li>
    </ol>
  </section>
   <br>
  <div class="col-sm-3">
      <button id="btnaddnewproduct" class="btn btn-primary btn-flat btn-block margin-bottom"><i class="fa fa-plus"></i> New</button>
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



<div class="modal fade" id="modal-product" style="display: none;">
   <div class="modal-dialog modal-lg">

      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span></button>
            <h4 class="modal-title">Add New Product</h4>
         </div>
         <div class="modal-body">
            <div class="row">

               <div class="col-sm-12">
                  <div class="col-sm-12">
                     <div class="form-group ">
                        <label>Category</label>
                        <select id="product_category" class="form-control" style="width: 100%;">
                           <option value="">[ SELECT ]</option>
                           <option value="1">FIREARMS</option>
                           <option value="2">AMMUNITION</option>
                           <option value="3">EQUIPMENTS</option>
                           <option value="4">COVID-19 RESOURCES</option>
                        </select>
                     </div>
                  </div>
               </div>


               <!-- FIREARM FORM FIELDS -->
               <div class="productform" id="1">
                  <form id="firearmform" action="">
                     <div class="col-sm-12">
                        
                        <div class="form-group col-sm-4">
                           <label>Type</label>
                           <select id="firearmtype" class="form-control" style="width: 100%;">
                              <option value="">[ SELECT ]</option>
                              <option value="SHORT">SHORT</option>
                              <option value="LONG">LONG</option>
                              <option value="CREWSERVED">CREWSERVED</option>
                           </select>
                        </div>

                        <div class="form-group col-sm-4">
                           <label for="firearmmake">Make</label>
                           <input type="text" class="form-control" id="firearmmake" >
                        </div>

                        <div class="form-group col-sm-4">
                           <label for="firearmcaliber">Caliber</label>
                           <input type="text" class="form-control" id="firearmcaliber" >
                        </div>

                        <div class="form-group col-sm-4">
                           <label for="firearmserial">Serial</label>
                           <input type="text" class="form-control" id="firearmserial" >
                        </div>

                        <div class="form-group col-sm-4">
                           <label for="firearmdateacquired">Date Acquired</label>
                           <input type="date" class="form-control" id="firearmdateacquired" >
                        </div>

                        <div class="form-group col-sm-4">
                           <label for="firearmcost">Cost</label>
                           <input type="text" class="form-control numeric" id="firearmcost" >
                        </div>

                        <div class="form-group col-sm-4">
                           <label>Status</label>
                           <select id="firearmstatus" class="form-control" style="width: 100%;">
                              <option value="">[ SELECT ]</option>
                              <option value="SVC">SVC</option>
                              <option value="VNSVG">VNSVG</option>
                              <option value="BER">BER</option>
                           </select>
                        </div>

                        <div class="form-group col-sm-4">
                           <label>Source</label>
                           <select id="firearmsource" class="form-control" style="width: 100%;">
                              <option value="">[ SELECT ]</option>
                              <option value="DONATED">DONATED</option>
                              <option value="ORIGINAL">ORIGINAL</option>
                              <option value="LOAN">LOAN</option>
                           </select>
                        </div>

                        <div class="form-group col-sm-4">
                           <label for="firearmquantity">Quantity</label>
                           <input type="text" class="form-control numeric" id="firearmquantity" >
                        </div>

                        <br><br>

                        <div class="col-sm-12">
                           <button type="submit" class="btn btn-primary btn-flat btn-block"><i class="fa fa-database"></i> Submit</button>
                        </div>
                     </div>
                  </form>
               </div>
               

               <!-- AMMUNITION FORM FIELDS -->
               <div class="productform" id="2">
                  <div class="col-sm-12">
                     <form action="" id="ammunitionform">
                        <div class="form-group col-sm-6">
                           <label for="ammunitiontype">Type</label>
                           <input type="text" class="form-control" id="ammunitiontype" >
                        </div>

                        <div class="form-group col-sm-6">
                           <label for="ammunitionquantity">Quantity</label>
                           <input type="text" class="form-control numeric" id="ammunitionquantity" >
                        </div>

                        <div class="form-group col-sm-6">
                           <label for="ammunitionstatus">Status</label>
                           <input type="text" class="form-control" id="ammunitionstatus" >
                        </div>

                        <div class="form-group col-sm-6">
                           <label for="ammunitiondateacquired">Date Acquired</label>
                           <input type="date" class="form-control numeric" id="ammunitiondateacquired" >
                        </div>

                        <div class="col-sm-12">
                           <button type="submit" class="btn btn-primary btn-flat btn-block"><i class="fa fa-database"></i> Submit</button>
                        </div>

                     </form>
                  </div>
               </div>

               <div class="productform" id="3">
                  <div class="col-sm-12">
                     <form action="" id="equipmentform">

                        <div class="form-group col-sm-4">
                           <label>Type</label>
                           <select id="equipmenttype" class="form-control" style="width: 100%;">
                              <option value="">[ SELECT ]</option>
                              <option value="SHORT">SHORT</option>
                              <option value="LONG">LONG</option>
                              <option value="CREWSERVED">CREWSERVED</option>
                           </select>
                        </div>

                        <div class="form-group col-sm-4">
                           <label for="equipmentmake">Make</label>
                           <input type="text" class="form-control" id="equipmentmake" >
                        </div>

                        <div class="form-group col-sm-4">
                           <label for="equipmentserial">Serial</label>
                           <input type="text" class="form-control" id="equipmentserial" >
                        </div>

                        <div class="form-group col-sm-4">
                           <label for="equipmentdateacquired">Date Acquired</label>
                           <input type="date" class="form-control" id="equipmentdateacquired" >
                        </div>

                        <div class="form-group col-sm-4">
                           <label>Status</label>
                           <select id="equipmentstatus" class="form-control" style="width: 100%;">
                              <option value="">[ SELECT ]</option>
                              <option value="SVC">SVC</option>
                              <option value="VNSVG">VNSVG</option>
                              <option value="BER">BER</option>
                           </select>
                        </div>

                        <div class="form-group col-sm-4">
                           <label>Source</label>
                           <select id="equipmentsource" class="form-control" style="width: 100%;">
                              <option value="">[ SELECT ]</option>
                              <option value="DONATED">DONATED</option>
                              <option value="ORIGINAL">ORIGINAL</option>
                              <option value="LOAN">LOAN</option>
                           </select>
                        </div>

                        <div class="form-group col-sm-4">
                           <label for="equipmentquantity">Quantity</label>
                           <input type="text" class="form-control numeric" id="equipmentquantity" >
                        </div>

                        <div class="col-sm-8">
                           <label for="">&nbsp;</label>
                           <button type="submit" class="btn btn-primary btn-flat btn-block"><i class="fa fa-database"></i> Submit</button>
                        </div>

                     </form>
                  </div>
               </div>

               <div class="productform" id="4">
                  <div class="col-sm-12">
                     <form action="" id="covidform">
                        <div class="form-group col-sm-6">
                           <label for="coviditem">Item</label>
                           <input type="text" class="form-control" id="coviditem" >
                        </div>
                        <div class="form-group col-sm-6">
                           <label for="covidquantitty">Quantity</label>
                           <input type="text" class="form-control numeric" id="covidquantitty" >
                        </div>
                        <div class="form-group col-sm-6">
                           <label>Status</label>
                           <select id="covidstatus" class="form-control" style="width: 100%;">
                              <option value="">[ SELECT ]</option>
                              <option value="SVC">SVC</option>
                              <option value="VNSVG">VNSVG</option>
                              <option value="BER">BER</option>
                           </select>
                        </div>
                        <div class="form-group col-sm-6">
                           <label>Source</label>
                           <select id="covidsource" class="form-control" style="width: 100%;">
                              <option value="">[ SELECT ]</option>
                              <option value="DONATED">DONATED</option>
                              <option value="ORIGINAL">ORIGINAL</option>
                              <option value="LOAN">LOAN</option>
                           </select>
                        </div>
                        <br><br>
                        <div class="col-sm-12">
                           <label for="">&nbsp;</label>
                           <button type="submit" class="btn btn-primary btn-flat btn-block"><i class="fa fa-database"></i> Submit</button>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
         <div class="modal-footer">

         </div>
      </div>
   <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>


<script type="text/javascript">
  $(document).ready(function() {
    $(".select2").select2();
    $(".numeric").numeric();
    $('.productform').hide();
    

    $(document).on('change','#product_category',function(){
       var thisvalue = $(this).find(':selected').val();
       $('.productform').hide();
       $('#'+thisvalue+'').show();
    });


    $(document).on('click','#btnaddnewproduct',function(){
      $('#modal-product').modal('show');
    });

    $(document).on('click','#btnsearch',function(){
       $.ajax({
         url: "<?php echo base_url("products/searchProductByCategory");?>",
         method:'POST',
         async:true,
         data:{
            product_category_id:$('#searchcategory').find(':selected').val(),
            is_active:$('#searchstatus').find(':selected').val(),
         },
         success:function(data){
            $('#productcategorylistarea').html(data);
         }
       })//ajax end
    });

    $('#btnsearch').trigger('click');

    $(document).on('change','#searchcategory, #searchstatus',function(){
       $('#btnsearch').trigger('click');
    });

    $(document).on('submit','#firearmform',function(e){
       e.preventDefault();
      var flag = true;
       $('#firearmform .form-control').each(function () {
            if ($(this).val().trim() == '') {
               $(this).closest('div.form-group').addClass('has-error');
               flag = false;
            } else {
               $(this).closest('div.form-group').removeClass('has-error');
            }
      });

      if (flag) {
         if (confirm('Are you sure to add this Firearm?')) {
            $.ajax({
               url: "<?php echo base_url("products/saveproduct");?>",
               type:'POST',
               data:{
                  product_category_id:$('#product_category').find(':selected').val(),
                  type:$('#firearmtype').val(),
                  status:$('#firearmstatus').val(),
                  source:$('#firearmsource').val(),
                  make:$('#firearmmake').val().trim(),
                  caliber:$('#firearmcaliber').val().trim(),
                  serial:$('#firearmserial').val().trim(),
                  date_acquired:$('#firearmdateacquired').val(),
                  cost:$('#firearmcost').val().trim(),
                  quantity:$('#firearmquantity').val().trim()
               },
               success:function(data){
                  if (data) {
                     $('#firearmform')[0].reset();

                     
                     var selectedcategory = $('#product_category').find(':selected').val();
                     $('#searchcategory option[value='+selectedcategory+']').prop('selected', true);
                     $('.select2').select2();
                     $('#btnsearch').trigger('click');

                  }
                  else{
                     alert('something went wrong...')
                  }
               }
            }) // ajax end
         }

      }
      else{
         e.preventDefault();
      }
    });

    $(document).on('submit','#ammunitionform',function(e){
       e.preventDefault();
      var flag = true;
       $('#ammunitionform .form-control').each(function () {
            if ($(this).val().trim() == '') {
               $(this).closest('div.form-group').addClass('has-error');
               flag = false;
            } else {
               $(this).closest('div.form-group').removeClass('has-error');
            }
      });

      if (flag) {
         if (confirm('Are you sure to add this Ammunition?')) {
            $.ajax({
               url: "<?php echo base_url("products/saveproduct");?>",
               type:'POST',
               data:{
                  product_category_id:$('#product_category').find(':selected').val(),
                  type:$('#ammunitiontype').val().trim(),
                  quantity:$('#ammunitionquantity').val().trim(),
                  status:$('#ammunitionstatus').val(),
                  date_acquired:$('#ammunitiondateacquired').val(),
               },
               success:function(data){
                  if (data) {
                     $('#ammunitionform')[0].reset();

                     var selectedcategory = $('#product_category').find(':selected').val();
                     $('#searchcategory option[value='+selectedcategory+']').prop('selected', true);
                     $('.select2').select2();
                     $('#btnsearch').trigger('click');
                  }
                  else{
                     alert('something went wrong...')
                  }
               }
            }) // ajax end
         }
      }
      else{
         e.preventDefault();
      }
    });

    $(document).on('submit','#equipmentform',function(e){
       e.preventDefault();
      var flag = true;
       $('#equipmentform .form-control').each(function () {
            if ($(this).val().trim() == '') {
               $(this).closest('div.form-group').addClass('has-error');
               flag = false;
            } else {
               $(this).closest('div.form-group').removeClass('has-error');
            }
      });

      if (flag) {
         if (confirm('Are you sure to add this Equipment?')) {
            $.ajax({
               url: "<?php echo base_url("products/saveproduct");?>",
               type:'POST',
               data:{
                  product_category_id:$('#product_category').find(':selected').val(),
                  type:$('#equipmenttype').val(),
                  make:$('#equipmentmake').val().trim(),
                  serial:$('#equipmentserial').val().trim(),
                  date_acquired:$('#equipmentdateacquired').val(),
                  status:$('#equipmentstatus').val(),
                  source:$('#equipmentsource').val(),
                  quantity:$('#equipmentquantity').val().trim(),
               },
               success:function(data){
                  if (data) {
                     $('#equipmentform')[0].reset();

                     var selectedcategory = $('#product_category').find(':selected').val();
                     $('#searchcategory option[value='+selectedcategory+']').prop('selected', true);
                     $('.select2').select2();
                     $('#btnsearch').trigger('click');
                  }
                  else{
                     alert('something went wrong...')
                  }
               }
            }) // ajax end
         }
      }
      else{
         e.preventDefault();
      }
    });
    $(document).on('submit','#covidform',function(e){
       e.preventDefault();
      var flag = true;
       $('#covidform .form-control').each(function () {
            if ($(this).val().trim() == '') {
               $(this).closest('div.form-group').addClass('has-error');
               flag = false;
            } else {
               $(this).closest('div.form-group').removeClass('has-error');
            }
      });

      if (flag) {
         if (confirm('Are you sure to add this new COVID-19 RESOURCE ?')) {
            $.ajax({
               url: "<?php echo base_url("products/saveproduct");?>",
               type:'POST',
               data:{
                  product_category_id:$('#product_category').find(':selected').val(),
                  item:$('#coviditem').val().trim(),
                  quantity:$('#covidquantitty').val().trim(),
                  status:$('#covidstatus').val(),
                  source:$('#covidsource').val(),
               },
               success:function(data){
                  if (data) {
                     $('#covidform')[0].reset();

                     var selectedcategory = $('#product_category').find(':selected').val();
                     $('#searchcategory option[value='+selectedcategory+']').prop('selected', true);
                     $('.select2').select2();
                     $('#btnsearch').trigger('click');
                  }
                  else{
                     alert('something went wrong...')
                  }
               }
            }) // ajax end
         }
      }
      else{
         e.preventDefault();
      }
    });









   //UPDATE FUNCTIONS START
   $(document).on('click','._btnedit',function(){
      var thiss = $(this);
      var product_id = thiss.closest('tr').attr('product_id');
      var thiscategory = thiss.attr('category');
      $('#edit-modal-product').modal('show');
      $('.editproductform').hide();

      $('#'+thiscategory+'').show();

      if(thiscategory=='firearm'){
         $('#editfirearm_id').css('display','none');
         $('#editfirearm_id').val(product_id);
         $('#editfirearmtype option[value='+thiss.closest('tr').attr('type')+']').prop('selected', true);
         $('#editfirearmmake').val(thiss.closest('tr').attr('make'));
         $('#editfirearmcaliber').val(thiss.closest('tr').attr('caliber'));
         $('#editfirearmserial').val(thiss.closest('tr').attr('serial'));
         $('#editfirearmdateacquired').val(thiss.closest('tr').attr('date_acquired'));
         $('#editfirearmcost').val(thiss.closest('tr').attr('cost'));
         $('#editfirearmstatus option[value='+thiss.closest('tr').attr('status')+']').prop('selected', true);
         $('#editfirearmsource option[value='+thiss.closest('tr').attr('source')+']').prop('selected', true);
         $('#editfirearmquantity').val(thiss.closest('tr').attr('quantity'));

         $('.select2').select2();
      }

      if(thiscategory=='ammunition'){
         $('#editammunition_id').css('display','none');
         $('#editammunition_id').val(product_id);
         $('#editammunitiontype').val(thiss.closest('tr').attr('type'));
         $('#editammunitionquantity').val(thiss.closest('tr').attr('quantity'));
         $('#editammunitionstatus').val(thiss.closest('tr').attr('status'));
         $('#editammunitiondateacquired').val(thiss.closest('tr').attr('date_acquired'));
         $('.select2').select2();
      }

      if(thiscategory=='equipment'){
         $('#editequipment_id').css('display','none');
         $('#editequipment_id').val(product_id);
         $('#editequipmenttype option[value='+thiss.closest('tr').attr('type')+']').prop('selected', true);
         $('#editequipmentmake').val(thiss.closest('tr').attr('make'));
         $('#editequipmentserial').val(thiss.closest('tr').attr('serial'));
         $('#editequipmentdateacquired').val(thiss.closest('tr').attr('date_acquired'));
         $('#editequipmentstatus option[value='+thiss.closest('tr').attr('status')+']').prop('selected', true);
         $('#editequipmentsource option[value='+thiss.closest('tr').attr('source')+']').prop('selected', true);
         $('#editequipmentquantity').val(thiss.closest('tr').attr('quantity'));

         $('.select2').select2();
      }
      
      if(thiscategory=='covidresource'){
         $('#editcovidresource_id').css('display','none');
         $('#editcovidresource_id').val(product_id);
         $('#editcoviditem').val(thiss.closest('tr').attr('item'));
         $('#editcovidquantitty').val(thiss.closest('tr').attr('quantity'));
         $('#editcovidstatus option[value='+thiss.closest('tr').attr('status')+']').prop('selected', true);
         $('#editcovidsource option[value='+thiss.closest('tr').attr('source')+']').prop('selected', true);

         $('.select2').select2();
      }

   });

   $(document).on('submit','#editcovidform',function(e){
      e.preventDefault();
      var flag = true;
      $('#editcovidform .form-control').each(function () {
         if ($(this).val().trim() == '') {
            $(this).closest('div.form-group').addClass('has-error');
            flag = false;
         } else {
            $(this).closest('div.form-group').removeClass('has-error');
         }
      });

      if (flag) {
         if (confirm('Are you sure to update this COVID-19 RESOURCE?')) {
            $.ajax({
               url: "<?php echo base_url("products/updateproduct");?>",
               type:'POST',
               async:true,
               data:{
                  id:$('#editcovidresource_id').val(),
                  item:$('#editcoviditem').val(),
                  quantity:$('#editcovidquantitty').val(),
                  status:$('#editcovidstatus').find(':selected').val(),
                  source:$('#editcovidsource').find(':selected').val(),
               },
               success:function(data){
                  if (data) {
                     $('#btncloseedit-modal-product').trigger('click');
                     $('#searchcategory option[value=4]').prop('selected', true);
                     $('.select2').select2();
                     $('#btnsearch').trigger('click');
                  }
                  else{
                     alert('something went wrong...')
                  }
                  
               }
            }) // ajax end
         }
      }
      else{
         e.preventDefault();
      }
   });

   $(document).on('submit','#editequipmentform',function(e){
      e.preventDefault();
      var flag = true;
      $('#editequipmentform .form-control').each(function () {
         if ($(this).val().trim() == '') {
            $(this).closest('div.form-group').addClass('has-error');
            flag = false;
         } else {
            $(this).closest('div.form-group').removeClass('has-error');
         }
      });

      if (flag) {
         if (confirm('Are you sure to update this Equipment?')) {
            $.ajax({
               url: "<?php echo base_url("products/updateproduct");?>",
               type:'POST',
               async:true,
               data:{
                  id:$('#editequipment_id').val().trim(),
                  type:$('#editequipmenttype').find(':selected').val(),
                  make:$('#editequipmentmake').val().trim(),
                  serial:$('#editequipmentserial').val().trim(),
                  date_acquired:$('#editequipmentdateacquired').val(),
                  status:$('#editequipmentstatus').find(':selected').val(),
                  source:$('#editequipmentsource').find(':selected').val(),
                  quantity:$('#editequipmentquantity').val().trim(),
               },
               success:function(data){
                  if (data) {
                     $('#btncloseedit-modal-product').trigger('click');
                     $('#searchcategory option[value=3]').prop('selected', true);
                     $('.select2').select2();
                     $('#btnsearch').trigger('click');
                  }
                  else{
                     alert('something went wrong...')
                  }
                  
               }
            }) // ajax end
         }
      }
      else{
         e.preventDefault();
      }
   });

   $(document).on('submit','#editammunitionform',function(e){
      e.preventDefault();
      var flag = true;
      $('#editammunitionform .form-control').each(function () {
         if ($(this).val().trim() == '') {
            $(this).closest('div.form-group').addClass('has-error');
            flag = false;
         } else {
            $(this).closest('div.form-group').removeClass('has-error');
         }
      });

      if (flag) {
         if (confirm('Are you sure to update this Ammunition?')) {
            $.ajax({
               url: "<?php echo base_url("products/updateproduct");?>",
               type:'POST',
               async:true,
               data:{
                  id:$('#editammunition_id').val(),
                  type:$('#editammunitiontype').val(),
                  quantity:$('#editammunitionquantity').val(),
                  status:$('#editammunitionstatus').val(),
                  date_acquired:$('#editammunitiondateacquired').val().trim(),
               },
               success:function(data){
                  if (data) {
                     $('#btncloseedit-modal-product').trigger('click');
                     $('#searchcategory option[value=2]').prop('selected', true);
                     $('.select2').select2();
                     $('#btnsearch').trigger('click');
                  }
                  else{
                     alert('something went wrong...')
                  }
                  
               }
            }) // ajax end
         }
      }
      else{
         e.preventDefault();
      }
   });

   $(document).on('submit','#editfirearmform',function(e){
      e.preventDefault();
      var flag = true;
      $('#editfirearmform .form-control').each(function () {
            if ($(this).val().trim() == '') {
               $(this).closest('div.form-group').addClass('has-error');
               flag = false;
            } else {
               $(this).closest('div.form-group').removeClass('has-error');
            }
      });

      if (flag) {
         if (confirm('Are you sure to update this Firearm?')) {
            $.ajax({
               url: "<?php echo base_url("products/updateproduct");?>",
               type:'POST',
               async:true,
               data:{
                  id:$('#editfirearm_id').val().trim(),
                  type:$('#editfirearmtype').find(':selected').val(),
                  make:$('#editfirearmmake').val().trim(),
                  caliber:$('#editfirearmcaliber').val().trim(),
                  serial:$('#editfirearmserial').val().trim(),
                  date_acquired:$('#editfirearmdateacquired').val(),
                  cost:$('#editfirearmcost').val().trim(),
                  status:$('#editfirearmstatus').find(':selected').val(),
                  source:$('#editfirearmsource').find(':selected').val(),
                  quantity:$('#editfirearmquantity').val().trim(),
               },
               success:function(data){
                  if (data) {
                     $('#btncloseedit-modal-product').trigger('click');
                     $('#searchcategory option[value=1]').prop('selected', true);
                     $('.select2').select2();
                     $('#btnsearch').trigger('click');
                  }
                  else{
                     alert('something went wrong...')
                  }
                  
               }
            }) // ajax end
         }
      }
      else{
         e.preventDefault();
      }
   });
    //UPDATE FUNCTIONS END






   //CHANGE STATUS FUNCTIONS START

   $(document).on('click','._btnactivate',function(){
      var thiss = $(this);
      var product_id = thiss.closest('tr').attr('product_id');

      if (confirm('Are you sure to Activate this Product?')) {
         $.ajax({
            url: "<?php echo base_url("products/updateproduct");?>",
            type:'POST',
            async:true,
            data:{
               change_status:true,
               id:product_id,
               is_active:1,
            },
            success:function(data){
               if (data) {
                  $('#searchstatus option[value=1]').prop('selected', true);
                  $('.select2').select2();
                  $('#btnsearch').trigger('click');
               }
               else{
                  alert('something went wrong...')
               }
               
            }
         })// ajax end
      }
   });

   $(document).on('click','._btndeactivate',function(){
      var thiss = $(this);
      var product_id = thiss.closest('tr').attr('product_id');

      if (confirm('Are you sure to Deactivate this Product?')) {
         $.ajax({
            url: "<?php echo base_url("products/updateproduct");?>",
            type:'POST',
            async:true,
            data:{
               change_status:true,
               id:product_id,
               is_active:false,
            },
            success:function(data){
               if (data) {
                  $('#searchstatus option[value=0]').prop('selected', true);
                  $('.select2').select2();
                  $('#btnsearch').trigger('click');
               }
               else{
                  alert('something went wrong...')
               }
               
            }
         })// ajax end
      }
   });

   //CHANGE STATUS FUNCTIONS END

















  });
</script>