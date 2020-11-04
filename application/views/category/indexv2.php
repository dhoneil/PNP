

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Manage
      <small>Category</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Category</li>
    </ol>
  </section>

  <section class="content">

    <div class="row">
      <div class="col-sm-3">

         <button id="btnaddnewcategory" type="button" class="btn btn-block btn-primary btn-flat margin-bottom"><i class="fa fa-plus"></i> New </button>

         <div class="box box-primary">

            <div class="box-header with-border">
               <h3 class="box-title"><i class="fa fa-search"></i> Search</h3>
            </div>

            <div class="box-body">

               <div class="form-group">
                  <label for="namesearch">Name</label>
                  <input type="text" class="form-control" id="namesearch" placeholder="Enter Category Name">
                </div>
            </div>

            <div class="box-footer">
               <button id="btnsearch" type="button" class="btn btn-block btn-flat"><i class="fa fa-search"></i> Search </button>
            </div>

         </div>

      </div>
      <div class="col-sm-9">

         <div class="box box-primary">
            <div class="box-header with-border">
               <h3 class="box-title"><i class="fa fa-list"></i> List</h3>
            </div>
            <div class="box-body" id="categorylistarea">

            </div>
            <div class="box-footer"></div>
         </div>

      </div>
    </div>

  </section>
</div>



<div class="modal fade" id="modal">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span></button>
            <h4 class="modal-title"><span id="modal-title"></span></h4>
         </div>
         <div class="modal-body">

            <div id="addarea">
               <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" id="name" placeholder="Enter Category Name">
                </div>
            </div>

            <div id="editarea">
               <input type="hidden" id="editid">
               <div class="form-group">
                  <label for="editname">Name</label>
                  <input type="text" class="form-control" id="editname" placeholder="Enter Category Name">
                </div>
            </div>

         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
            <button id="btnsave" type="button" class="btn btn-primary"><i class="fa fa-database"></i> Save</button>
            <button id="btnupdate" type="button" class="btn btn-success"><i class="fa fa-database"></i> Update</button>
         </div>
      </div>
   <!-- /.modal-content -->
   </div>
<!-- /.modal-dialog -->
</div>







<script type="text/javascript">
   $(document).ready(function(){

      search()

      function search() {
         $.ajax({
            url:"<?php echo base_url("category/search")?>",
            method:'post',
            async:true,
            data:{
               name:$('#namesearch').val().trim(),
            },
            success:function(data){
               $('#categorylistarea').html(data);
            }
         })
      }

      $('#btnsearch').click(function(){
         search()
      });

      function changestatus(id,status) {
         $.ajax({
            url:"<?php echo base_url("category/edit")?>",
            method:"post",
            async:true,
            data:{
               id:id,
               active:status,
               change_status:true,
            },
            success:function(data){
               if (data) {
                  search();
               }
               else{
                  alert('something went wrong...')
               }
            }
         })
      }

      $(document).on('click','.btnactivate',function(){
         var id = $(this).closest('tr').attr('id');
         if (confirm('Are you sure to activate this Category?')) {
            changestatus(id,1);
         }
      });

      $(document).on('click','.btndeactivate',function(){
         var id = $(this).closest('tr').attr('id');
         if (confirm('Are you sure to deactivate this Category?')) {
            changestatus(id,false);
         }
      });

      $('#btnupdate').click(function(){
         var flag = true;
         $('#editarea .form-control').each(function () {
               if ($(this).val().trim() == '') {
                  $(this).closest('div.form-group').addClass('has-error');
                  flag = false;
               } else {
                  $(this).closest('div.form-group').removeClass('has-error');
               }
         });
         if (flag) {
            if (confirm('Are you sure to update this Category?')) {
               $.ajax({
                  url:"<?php echo base_url("category/edit")?>",
                  method:"post",
                  async:true,
                  data:{
                     id:$('#editid').val(),
                     name:$('#editname').val().trim(),
                  },
                  success:function(data){
                     if (data) {
                        $('#modal').modal('hide');
                        search();
                     }
                     else{
                        alert('something went wrong...')
                     }
                  }
               })
            }
         }
      });

      $(document).on('click','.btnedit',function(){
         var id = $(this).closest('tr').attr('id');
         var name = $(this).closest('tr').attr('name');
         var active = $(this).closest('tr').attr('active');
         $('#modal').modal('show');
         $('#modal-title').text('Edit Category');
         $('#addarea').hide();
         $('#editarea').show();

         $('#btnupdate').show();
         $('#btnsave').hide();

         $('#editid').val(id);
         $('#editname').val(name);
      });

      $('#btnaddnewcategory').click(function(){
         $('#modal').modal('show');
         $('#modal-title').text('Add New Category');
         $('#addarea').show();
         $('#editarea').hide();

         $('#btnupdate').hide();
         $('#btnsave').show();
      });

      $('#btnsave').click(function(){
         var flag = true;
         $('#addarea .form-control').each(function () {
               if ($(this).val().trim() == '') {
                  $(this).closest('div.form-group').addClass('has-error');
                  flag = false;
               } else {
                  $(this).closest('div.form-group').removeClass('has-error');
               }
         });
         if (flag) {
            if (confirm('Are you sure to save this new Category?')) {
               $.ajax({
                  url:"<?php echo base_url("category/save")?>",
                  method:'post',
                  async:true,
                  data:{
                     name:$('#name').val().trim(),
                  },
                  success:function(data){
                     if (data) {
                        $('#modal').modal('hide');
                        search()
                     }else{
                        alert('something went wrong...')
                     }
                  }
               })
            }
         }
      });//end btnsave
   });
</script>


