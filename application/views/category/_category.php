


<table class="table table-condensed table-bordered table-hover">
   <thead>
      <tr>
         <th>Category</th>
      </tr>
   </thead>
   <tbody>
      <?php if(count($categories) > 0): ?>
         <?php foreach($categories as $k => $x): ?>
            <tr
               id="<?php echo $x['id'] ?>"
               name="<?php echo $x['name'] ?>"
               active="<?php echo $x['active'] ?>"
            >
               <td>
                  
                  <div class="btn-group">
                     <a style="font-weight:bold; color:<?php echo ($x['active']==false)?"red;":"" ?>" class="dropdown-toggle" data-toggle="dropdown" href="javascript:void(0)"><?php echo $x['name'] ?></a>
                     <ul class="dropdown-menu" role="menu">
                        <li><a class="btnedit" href="javascript:void(0)"><i class="fa fa-edit"></i> Edit</a></li>
                        <?php if( $x['active'] == true): ?>
                           <li><a class="btndeactivate" href="javascript:void(0)"><i class="fa fa-remove"></i> Deactivate</a></li>
                        <?php else: ?>
                           <li><a class="btnactivate" href="javascript:void(0)"><i class="fa fa-check"></i> Activate</a></li>
                        <?php endif; ?>
                     </ul>
                  </div>

               </td>
            </tr>
         <?php endforeach?>
      <?php else: ?>
         <tr>
            <td colspan="10">no data found...</td>
         </tr>
      <?php endif; ?>
   </tbody>
</table>