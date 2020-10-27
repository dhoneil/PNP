
   <table class="table table-condensed table-hover table-bordered">
      <thead>
         <tr>
            <th>LOCATION NAME</th>
            <th>STATUS</th>
            <th>OPTION</th>
         </tr>
      </thead>
      <tbody>
         <?php foreach ($locationss as $k => $x): ?>
            <tr 
               location_id="<?php echo $x['ID'] ?>"
               location_name="<?php echo $x['location_name'] ?>"
               is_active="<?php echo $x['is_active'] ?>"
            >
                <td><?php echo $x['location_name'] ?></td>
               <td><?php echo $x['is_active'] ?></td>
               <td>
                  <div class="btn-group">
                    <button type="button" class="btn btn-left btn-default">Edit</button> 
                    <button type="button" class="btn btn-right btn-warning">Remove</button>
                  </div>
               </td>
            </tr>
         <?php endforeach ?>
      </tbody>
   </table>
