<div class="container">
    <h1 class="text-center member-header">Add New Store</h1>
    <form class="edit" action="?do=Insert" method="POST" enctype="multipart/form-data">
        <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping">Name</span>
            <input type="text" class="form-control" placeholder="Name" autocomplete='off' name="name" required="required">
        </div>
        <div class="input-group flex-nowrap">
            <input class="btn btn-primary save" type="submit" value="Add Store" />
        </div>
    </form>
</div>