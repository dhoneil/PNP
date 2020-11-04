
   <table class="table table-condensed table-hover table-bordered">
      <thead>
         <tr>
            <th style="">LOCATION NAME</th>
            <th style="">STATUS</th>
            <th style="">OPTION</th>
         </tr>
      </thead>
      <tbody>
         <?php foreach ($locationss as $k => $x): ?>
            <tr 
               location_id="<?php echo $x['ID'] ?>"
               location_name="<?php echo $x['location_name'] ?>"
               is_active="<?php echo $x['is_active'] ?>"
            >
              <td style=""> <?php echo $x['location_name'] ?></td>
               <?php if($x['is_active']==1):?>
                  <td style="">ACTIVE</td>
               <?php else:?>
                    <td style="">INACTIVE</td>
                <?php endif; ?>
               <td style="">
                    <button type="button" class="btn btn-default editlocation"  style="margin:5px;">Edit</button> 
                    <button type="button" class="btn btn-warning" style="margin:5px;">Remove</button>
               </td>
            </tr>
         <?php endforeach ?>
      </tbody>
   </table>

<div class="modal fade" id="addModallocation" style="display:none;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" id="btncloseedit-modal-location" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Add Location</h4>
      </div>
        <div class="modal-body">
         <input id="editlocationid" type="hidden">
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
        <button id="btnupdate" class="btn btn-primary btn-flat btn-block"><i class="fa fa-plus"></i> Update</button>
      </div>
     
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

