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
            <div class="col-sm-3">
                <button id="btnaddnewlocation" class="btn btn-primary btn-flat btn-block margin-bottom"><i class="fa fa-plus"></i> New</button>
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Search</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                        <label>Category</label>
                        <select id="searchcategory" class="form-control " style="width: 100%;">
                            <option value="">[ SELECT ]</option>
                            <option value="1" selected="">FIREARMS</option>
                            <option value="2">AMMUNITION</option>
                            <option value="3">EQUIPMENTS</option>
                            <option value="4">COVID-19 RESOURCES</option>
                        </select>
                        </div>
                        <!-- <div class="form-group">
                        <label>Location</label>
                        <select id="searchcategory" class="form-control select2" style="width: 100%;">
                            <option value="">[ SELECT ]</option>
                            <?php foreach ($locations as $k => $v): ?>
                                 <option value="<?php echo $v['ID'] ?>"><?php echo $v['location_name'] ?></option>
                            <?php endforeach ?>
                        </select>
                        </div> -->
                        <div class="form-group">
                        <label>Status</label>
                        <select id="searchstatus" class="form-control" style="width: 100%;">
                            <option value="">[ SELECT ]</option>
                            <option value="1" selected="">ACTIVE</option>
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
    </section>
</div>

<div class="modal fade" id="addModallocation" style="display:none;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Add Location</h4>
      </div>
        <div class="modal-body">
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
            <div class="form-group">
                <label for="brand_name">Product location</label>
                <input type="text" class="form-control" id="product_location_name" name="product_location" placeholder="Enter Product location" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="active">Status</label>
                <select class="form-control" id="productstatus" name="active">
                <option value="1">Active</option>
                <option value="2">Inactive</option>
                </select>
            </div>
        </div>
        <div class="modal-footer">
        <button id="btnadd" class="btn btn-primary btn-flat btn-block"><i class="fa fa-plus"></i> Save</button>
        </div>
     
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">
    $(document).ready(function(){
        
    $(".select2").select2();
    $(".numeric").numeric();
    $('.productform').hide();
        $(document).on('click','#btnaddnewlocation',function(){
            $('#addModallocation').modal('show');
        });
       
        $(document).on('click','#btnadd',function(e){
        e.preventDefault();
        var flag = true;
        
         if (flag) {
         if (confirm('Are you sure to add this fileds?')) {
            $.ajax({
               url: "<?php echo base_url("locations/savelocation");?>",
               type:'POST',
               data:{
                  productcategory_id:$('#product_category').find(':selected').val(),
                  location_name:$('#product_location_name').val(),
                  is_active:$('#productstatus').val(),
               },
               success:function(data){
                  if (data) {

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

        $(document).on('click','#btnsearch',function(){
        $.ajax({
         url: "<?php echo base_url("locations/searchLocationByCategory");?>",
         method:'POST',
         async:true,
         data:{
            productcategory_id:$('#searchcategory').find(':selected').val(),
            is_active:$('#searchstatus').find(':selected').val(),
         },
         success:function(data){
            $('#productcategorylistarea').html(data);
         }
       })//ajax end
    });

   
 });
</script>