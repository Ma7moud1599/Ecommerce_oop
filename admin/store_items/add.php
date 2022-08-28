 <div class="container">
     <h1 class="text-center member-header">Add New Item In The Store</h1>
     <form class="edit" action="?do=Insert" method="POST" enctype="multipart/form-data">
         <div class="input-group flex-nowrap">
             <span class="input-group-text" id="addon-wrapping">Items</span>
             <select id="test" name="item">
                 <option value="0"> </option>
                 <?php
                    $get_data = new Manage_Comments;
                    $data =  $get_data->select_item('items', 'ID', 'Name');
                    ?>
             </select>
         </div>
         <div class="input-group flex-nowrap">
             <span class="input-group-text" id="addon-wrapping">Store</span>
             <select id="test" name="store">
                 <option value="0"> </option>
                 <?php
                    $get_data = new Manage_Comments;

                    $data =  $get_data->select_item('store', 'ID', 'Name');
                    ?>
             </select>
         </div>
         <div class="input-group flex-nowrap">
             <span class="input-group-text" id="addon-wrapping">Quantity</span>
             <input type="text" class="form-control" name="quant" placeholder="Quantity" required="required">
         </div>
         <div class="input-group flex-nowrap">
             <input class="btn btn-primary save" type="submit" value="Add Item" />
         </div>
     </form>
 </div>