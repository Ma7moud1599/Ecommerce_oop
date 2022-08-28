    <div class="container">
        <h1 class="text-center member-header">Add New Item</h1>
        <form class="edit" action="?do=Insert" method="POST" enctype="multipart/form-data">
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Image</span>
                <input type="file" class="form-control" name="Image" required="required">
            </div>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Name</span>
                <input type="text" class="form-control" name="name" placeholder="Name" aria-label="Name" aria-describedby="addon-wrapping" autocomplete='off' required="required">
            </div>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Price</span>
                <input type="text" class="form-control" name="price" placeholder="Price" aria-label="Price" aria-describedby="addon-wrapping" autocomplete="off" required="required">
            </div>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Description</span>
                <input type="text" class="form-control" name="desc" placeholder="Description" aria-label="Description" aria-describedby="addon-wrapping" autocomplete="off" required="required">
            </div>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Country</span>
                <input type="text" class="form-control" name="country" placeholder="Country" aria-label="Country" aria-describedby="addon-wrapping" autocomplete="off" required="required">
            </div>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Status</span>
                <select id="test" name="status" required="required">
                    <option value="0"></option>
                    <option value="New">New</option>
                    <option value="Like New">Like New</option>
                    <option value="Used">Used</option>
                    <option value="Old">Old</option>
                </select>
            </div>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">User</span>
                <select id="test" name="user" required="required">
                    <option value="0"> </option>
                    <?php
                    $get_data = new Manage_Comments;

                    $data =  $get_data->select_item('users', 'user_id', 'Username');
                    ?>
                </select>
            </div>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Category</span>
                <select id="test" name="category" required="required">
                    <option value="0"> </option>
                    <?php
                    $get_data = new Manage_Comments;

                    $data =  $get_data->select_item('categories', 'ID', 'Name');
                    ?>
                </select>
            </div>
            <div class="input-group flex-nowrap">
                <input class="btn btn-primary save" type="submit" value="Add Item" />
            </div>
        </form>
    </div>