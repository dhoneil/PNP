
<!-- FIREARM -->
<?php if($product_category == 1): ?>
   <table class="table table-condensed table-hover table-bordered">
      <thead>
         <tr>
            <th>TYPE</th>
            <th>MAKE</th>
            <th>CALIBER</th>
            <th>SERIAL</th>
            <th>DATE&nbsp;ACQUIRED</th>
            <th>COST</th>
            <th>STATUS</th>
            <th>SOURCE</th>
            <th>QUANTITY</th>
         </tr>
      </thead>
      <tbody>
         <?php foreach ($productssss as $k => $x): ?>
            <tr 
               product_id="<?php echo $x['id'] ?>"
               type="<?php echo $x['type'] ?>"
               make="<?php echo $x['make'] ?>"
               caliber="<?php echo $x['caliber'] ?>"
               serial="<?php echo $x['serial'] ?>"
               date_acquired="<?php echo $x['date_acquired'] ?>"
               cost="<?php echo $x['cost'] ?>"
               status="<?php echo $x['status'] ?>"
               source="<?php echo $x['source'] ?>"
               quantity="<?php echo $x['quantity'] ?>"
            >
               <td>
                  <div class="btn-group">
                     <a style="cursor:pointer; font-weight:bold; color:<?php echo ($x['is_active'] == true)?"":"red" ?>;;" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><?php echo $x['type'] ?></a>
                     <ul class="dropdown-menu" role="menu">
                        <li><a category="firearm" class="_btnedit" href="javascript:void(0)"><i class="fa fa-edit"></i> Edit</a></li>
                        
                        <?php if($x['is_active'] == true):?>
                           <li><a category="firearm" class="_btndeactivate" href="javascript:void(0)"><i class="fa fa-remove"></i> Deactivate</a></li>
                        <?php else:?>
                           <li><a category="firearm" class="_btnactivate" href="javascript:void(0)"><i class="fa fa-check"></i> Activate</a></li>
                        <?php endif; ?>
                     </ul>
                  </div>
               </td>
               <td><?php echo $x['make'] ?></td>
               <td><?php echo $x['caliber'] ?></td>
               <td><?php echo $x['serial'] ?></td>
               <td><?php echo $x['date_acquired'] ?></td>
               <td><?php echo $x['cost'] ?></td>
               <td><?php echo $x['status'] ?></td>
               <td><?php echo $x['source'] ?></td>
               <td><?php echo $x['quantity'] ?></td>
            </tr>
         <?php endforeach ?>
      </tbody>
   </table>
<?php endif; ?>



<!-- AMMUNITION -->
<?php if($product_category == 2): ?>
   <table class="table table-condensed table-hover table-bordered">
      <thead>
         <tr>
            <th>TYPE</th>
            <th>QUANTITY</th>
            <th>STATUS</th>
            <th>DATE&nbsp;ACQUIRED</th>
         </tr>
      </thead>
      <tbody>
         <?php foreach ($productssss as $k => $x): ?>
            <tr
               product_id="<?php echo $x['id'] ?>"
               type="<?php echo $x['type'] ?>"
               status="<?php echo $x['status'] ?>"
               quantity="<?php echo $x['quantity'] ?>"
               date_acquired="<?php echo $x['date_acquired'] ?>"
            >
               <td>
                  <div class="btn-group">
                     <a style="cursor:pointer; font-weight:bold; color:<?php echo ($x['is_active'] == true)?"":"red" ?>;;"  href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><?php echo $x['type'] ?></a>
                     <ul class="dropdown-menu" role="menu">
                        <li><a category="ammunition" class="_btnedit" href="javascript:void(0)"><i class="fa fa-edit"></i> Edit</a></li>

                        <?php if($x['is_active'] == true):?>
                           <li><a category="ammunition" class="_btndeactivate" href="javascript:void(0)"><i class="fa fa-remove"></i> Deactivate</a></li>
                        <?php else:?>
                           <li><a category="ammunition" class="_btnactivate" href="javascript:void(0)"><i class="fa fa-check"></i> Activate</a></li>
                        <?php endif; ?>
                     </ul>
                  </div>
               </td>
               <td><?php echo $x['quantity'] ?></td>
               <td><?php echo $x['status'] ?></td>
               <td><?php echo $x['date_acquired'] ?></td>
            </tr>
         <?php endforeach ?>
      </tbody>
   </table>
<?php endif; ?>



<!-- EQUIPMENTS -->
<?php if($product_category == 3): ?>
   <table class="table table-condensed table-hover table-bordered">
      <thead>
         <tr>
            <th>TYPE</th>
            <th>MAKE</th>
            <th>SERIAL</th>
            <th>DATE&nbsp;ACQUIRED</th>
            <th>STATUS</th>
            <th>SOURCE</th>
            <th>QUANTITY</th>
         </tr>
      </thead>
      <tbody>
         <?php foreach ($productssss as $k => $x): ?>
            <tr 
               product_id="<?php echo $x['id'] ?>"
               type="<?php echo $x['type'] ?>"
               make="<?php echo $x['make'] ?>"
               serial="<?php echo $x['serial'] ?>"
               date_acquired="<?php echo $x['date_acquired'] ?>"
               status="<?php echo $x['status'] ?>"
               source="<?php echo $x['source'] ?>"
               quantity="<?php echo $x['quantity'] ?>"
            >
               <td>
                  <div class="btn-group">
                     <a style="cursor:pointer; font-weight:bold; color:<?php echo ($x['is_active'] == true)?"":"red" ?>;;" href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><?php echo $x['type'] ?></a>
                     <ul class="dropdown-menu" role="menu">
                        <li><a category="equipment" class="_btnedit" href="javascript:void(0)"><i class="fa fa-edit"></i> Edit</a></li>
                        
                        <?php if($x['is_active'] == true):?>
                           <li><a category="equipment" class="_btndeactivate" href="javascript:void(0)"><i class="fa fa-remove"></i> Deactivate</a></li>
                        <?php else:?>
                           <li><a category="equipment" class="_btnactivate" href="javascript:void(0)"><i class="fa fa-check"></i> Activate</a></li>
                        <?php endif; ?>
                     </ul>
                  </div>
               </td>
               <td><?php echo $x['make'] ?></td>
               <td><?php echo $x['serial'] ?></td>
               <td><?php echo $x['date_acquired'] ?></td>
               <td><?php echo $x['status'] ?></td>
               <td><?php echo $x['source'] ?></td>
               <td><?php echo $x['quantity'] ?></td>
            </tr>
         <?php endforeach ?>
      </tbody>
   </table>
<?php endif; ?>




<!-- COVID-19 RESOURCES -->
<?php if($product_category == 4): ?>
   <table class="table table-condensed table-hover table-bordered">
      <thead>
         <tr>
            <th>ITEM</th>
            <th>STATUS</th>
            <th>SOURCE</th>
            <th>QUANTITY</th>
         </tr>
      </thead>
      <tbody>
         <?php foreach ($productssss as $k => $x): ?>
            <tr 
               product_id="<?php echo $x['id'] ?>"
               item="<?php echo $x['item'] ?>"
               status="<?php echo $x['status'] ?>"
               source="<?php echo $x['source'] ?>"
               quantity="<?php echo $x['quantity'] ?>"
            >
               <td>
                  <div class="btn-group">
                     <a style="cursor:pointer; font-weight:bold; color:<?php echo ($x['is_active'] == true)?"":"red" ?>;;" href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><?php echo $x['item'] ?></a>
                     <ul class="dropdown-menu" role="menu">
                        <li><a category="covidresource" class="_btnedit" href="javascript:void(0)"><i class="fa fa-edit"></i> Edit</a></li>
                        
                        <?php if($x['is_active'] == true):?>
                           <li><a category="covidresource" class="_btndeactivate" href="javascript:void(0)"><i class="fa fa-remove"></i> Deactivate</a></li>
                        <?php else:?>
                           <li><a category="covidresource" class="_btnactivate" href="javascript:void(0)"><i class="fa fa-check"></i> Activate</a></li>
                        <?php endif; ?>
                     </ul>
                  </div>
               </td>
               <td><?php echo $x['status'] ?></td>
               <td><?php echo $x['source'] ?></td>
               <td><?php echo $x['quantity'] ?></td>
            </tr>
         <?php endforeach ?>
      </tbody>
   </table>
<?php endif; ?>



<div class="modal" id="edit-modal-product" style="display: none;">
   <div class="modal-dialog modal-lg">

      <div class="modal-content">
         <div class="modal-header">
            <button id="btncloseedit-modal-product" type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span></button>
            <h4 class="modal-title">Edit Product</h4>
         </div>
         <div class="modal-body">
            <div class="row">


               <!-- FIREARM FORM FIELDS -->
               <div class="editproductform" id="firearm">
                  <form id="editfirearmform" action="">
                     <input type="text" id="editfirearm_id">
                     <div class="col-sm-12">
                        
                        <div class="form-group col-sm-4">
                           <label>Type</label>
                           <select id="editfirearmtype" class="form-control" style="width: 100%;">
                              <option value="">[ SELECT ]</option>
                              <option value="SHORT">SHORT</option>
                              <option value="LONG">LONG</option>
                              <option value="CREWSERVED">CREWSERVED</option>
                           </select>
                        </div>

                        <div class="form-group col-sm-4">
                           <label for="firearmmake">Make</label>
                           <input type="text" class="form-control" id="editfirearmmake" >
                        </div>

                        <div class="form-group col-sm-4">
                           <label for="firearmcaliber">Caliber</label>
                           <input type="text" class="form-control" id="editfirearmcaliber" >
                        </div>

                        <div class="form-group col-sm-4">
                           <label for="firearmserial">Serial</label>
                           <input type="text" class="form-control" id="editfirearmserial" >
                        </div>

                        <div class="form-group col-sm-4">
                           <label for="firearmdateacquired">Date Acquired</label>
                           <input type="date" class="form-control" id="editfirearmdateacquired" >
                        </div>

                        <div class="form-group col-sm-4">
                           <label for="firearmcost">Cost</label>
                           <input type="text" class="form-control numeric" id="editfirearmcost" >
                        </div>

                        <div class="form-group col-sm-4">
                           <label>Status</label>
                           <select id="editfirearmstatus" class="form-control" style="width: 100%;">
                              <option value="">[ SELECT ]</option>
                              <option value="SVC">SVC</option>
                              <option value="VNSVG">VNSVG</option>
                              <option value="BER">BER</option>
                           </select>
                        </div>

                        <div class="form-group col-sm-4">
                           <label>Source</label>
                           <select id="editfirearmsource" class="form-control" style="width: 100%;">
                              <option value="">[ SELECT ]</option>
                              <option value="DONATED">DONATED</option>
                              <option value="ORIGINAL">ORIGINAL</option>
                              <option value="LOAN">LOAN</option>
                           </select>
                        </div>

                        <div class="form-group col-sm-4">
                           <label for="firearmquantity">Quantity</label>
                           <input type="text" class="form-control numeric" id="editfirearmquantity" >
                        </div>

                        <br><br>

                        <div class="col-sm-12">
                           <button type="submit" class="btn btn-primary btn-flat btn-block"><i class="fa fa-database"></i> Submit</button>
                        </div>
                     </div>
                  </form>
               </div>
               

               <!-- AMMUNITION FORM FIELDS -->
               <div class="editproductform" id="ammunition">
                  <input type="text" id="editammunition_id">
                  <div class="col-sm-12">
                     <form action="" id="editammunitionform">
                        <div class="form-group col-sm-6">
                           <label for="ammunitiontype">Type</label>
                           <input type="text" class="form-control" id="editammunitiontype" >
                        </div>

                        <div class="form-group col-sm-6">
                           <label for="ammunitionquantity">Quantity</label>
                           <input type="text" class="form-control numeric" id="editammunitionquantity" >
                        </div>

                        <div class="form-group col-sm-6">
                           <label for="ammunitionstatus">Status</label>
                           <input type="text" class="form-control" id="editammunitionstatus" >
                        </div>

                        <div class="form-group col-sm-6">
                           <label for="ammunitiondateacquired">Date Acquired</label>
                           <input type="date" class="form-control numeric" id="editammunitiondateacquired" >
                        </div>

                        <div class="col-sm-12">
                           <button type="submit" class="btn btn-primary btn-flat btn-block"><i class="fa fa-database"></i> Submit</button>
                        </div>

                     </form>
                  </div>
               </div>

               <!-- EQUIPMENT FORM FIELDS -->
               <div class="editproductform" id="equipment">
                  <input type="text" id="editequipment_id">
                  <div class="col-sm-12">
                     <form action="" id="editequipmentform">

                        <div class="form-group col-sm-4">
                           <label>Type</label>
                           <select id="editequipmenttype" class="form-control" style="width: 100%;">
                              <option value="">[ SELECT ]</option>
                              <option value="SHORT">SHORT</option>
                              <option value="LONG">LONG</option>
                              <option value="CREWSERVED">CREWSERVED</option>
                           </select>
                        </div>

                        <div class="form-group col-sm-4">
                           <label for="equipmentmake">Make</label>
                           <input type="text" class="form-control" id="editequipmentmake" >
                        </div>

                        <div class="form-group col-sm-4">
                           <label for="equipmentserial">Serial</label>
                           <input type="text" class="form-control" id="editequipmentserial" >
                        </div>

                        <div class="form-group col-sm-4">
                           <label for="equipmentdateacquired">Date Acquired</label>
                           <input type="date" class="form-control" id="editequipmentdateacquired" >
                        </div>

                        <div class="form-group col-sm-4">
                           <label>Status</label>
                           <select id="editequipmentstatus" class="form-control" style="width: 100%;">
                              <option value="">[ SELECT ]</option>
                              <option value="SVC">SVC</option>
                              <option value="VNSVG">VNSVG</option>
                              <option value="BER">BER</option>
                           </select>
                        </div>

                        <div class="form-group col-sm-4">
                           <label>Source</label>
                           <select id="editequipmentsource" class="form-control" style="width: 100%;">
                              <option value="">[ SELECT ]</option>
                              <option value="DONATED">DONATED</option>
                              <option value="ORIGINAL">ORIGINAL</option>
                              <option value="LOAN">LOAN</option>
                           </select>
                        </div>

                        <div class="form-group col-sm-4">
                           <label for="equipmentquantity">Quantity</label>
                           <input type="text" class="form-control numeric" id="editequipmentquantity" >
                        </div>

                        <div class="col-sm-8">
                           <label for="">&nbsp;</label>
                           <button type="submit" class="btn btn-primary btn-flat btn-block"><i class="fa fa-database"></i> Submit</button>
                        </div>

                     </form>
                  </div>
               </div>

               <!-- COVID RESOURCE FORM FIELDS -->
               <div class="editproductform" id="covidresource">
                  <input type="text" id="editcovidresource_id">
                  <div class="col-sm-12">
                     <form action="" id="editcovidform">
                        <div class="form-group col-sm-6">
                           <label for="coviditem">Item</label>
                           <input type="text" class="form-control" id="editcoviditem" >
                        </div>
                        <div class="form-group col-sm-6">
                           <label for="covidquantitty">Quantity</label>
                           <input type="text" class="form-control numeric" id="editcovidquantitty" >
                        </div>
                        <div class="form-group col-sm-6">
                           <label>Status</label>
                           <select id="editcovidstatus" class="form-control" style="width: 100%;">
                              <option value="">[ SELECT ]</option>
                              <option value="SVC">SVC</option>
                              <option value="VNSVG">VNSVG</option>
                              <option value="BER">BER</option>
                           </select>
                        </div>
                        <div class="form-group col-sm-6">
                           <label>Source</label>
                           <select id="editcovidsource" class="form-control" style="width: 100%;">
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
   
</script>
