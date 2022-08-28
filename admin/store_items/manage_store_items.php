<?php
class Manage_Store_Items
{
    public function get_store_items($id)
    {
        $database = new Database();
        $stmt = $database->con->prepare("SELECT storeitems.*, items.*, items.Name AS item_name, Quantity , storeitems.ID AS st_ID
                                        FROM storeitems
                                        INNER JOIN store ON store.ID = storeitems.store
                                        INNER JOIN items ON items.ID = storeitems.item
                                        WHERE store.ID = ?
                                        ");
        $stmt->execute(array($id));
        $rows =  $stmt->fetchAll();
        return $rows;
    }

    public function table_item_store($rows)
    {

        foreach ($rows as $row) {

            echo '<tr>';
            echo "<td class='img'><img src='layout/images/" . $row['Image'] . "'/></td>";
            echo '<td>' . $row['item_name'] . '</td>';
            echo '<td>' . $row['Quantity'] . '</td>';
            echo '<td>' . $row['Date'] . '</td>';
            echo '<td> 
                    <a href="store_items.php?do=Edit&itemid=' . $row['st_ID'] . '" class="btn btn-success edit-btn"> Edit</a>
                    <a href="store_items.php?do=Delete&itemid=' . $row['st_ID'] . '" class="btn btn-danger confirm delete-btn"> Delete</a>';
            if ($row['Reg_status'] == 0) {
                echo '<a href="items.php?do=Activate&itemid=' . $row['ID'] . '" class="btn btn-info ml-1"> Activate</a>';
            }
            '</td>';
            echo '</tr>';
        }
    }

    public function errors($item, $store)
    {

        $formsError = array();

        if (empty($item)) {
            $formsError[] = 'Item Can\'t be Empty';
        }

        if (empty($store)) {
            $formsError[] = 'Store Can\'t be Empty';
        }

        foreach ($formsError as $error) {
            $massege = '<div class="alert alert-danger">' . $error . '</div>';
            $func = new Func;
            $func->redirectToHome($massege, 3, "store_items.php?do=Add");
        }
    }

    public function add($Name, $store, $quant)
    {

        $database = new Database();
        $stmt = $database->con->prepare("INSERT INTO storeitems(item, store, Quantity) VALUES(:item, :store, :quant)");
        $stmt->execute(array(
            'item'  => $Name,
            'store'  => $store,
            'quant'  => $quant
        ));

        $success = "<div class='alert alert-success'>" . $stmt->rowCount() . " Record Inserted</div>";
        $func = new Func;
        $func->redirectToHome($success, 3, 'store.php?do=Manage');
    }

    public function edit($userid)
    {
        $database = new Database();
        $stmt = $database->con->prepare("SELECT * FROM storeitems WHERE ID = ? LIMIT 1");
        $stmt->execute(array($userid));
        return $stmt;
    }


    public function update($name, $id)
    {
        $database = new Database();
        $stmt = $database->con->prepare("UPDATE 
                                            storeitems 
                                        SET 
                                            Quantity = ? 
                                        WHERE 
                                            ID = ? ");
        $stmt->execute(array($name, $id));

        $success = "<div class='alert alert-success'>" . $stmt->rowCount() . ' Record Updated</div>';
        $fun = new Func();
        $fun->redirectToHome($success, 3, "store.php");

        return $stmt;
    }

    public function error($old, $new)
    {

        $formsError = array();

        if (strlen($old) < strlen($new)) {
            $formsError[] = 'You Can\'t Buy More Than' . $old . 'Items';
        }

        foreach ($formsError as $error) {
            $massege = '<div class="alert alert-danger">' . $error . '</div>';
            $func = new Func;
            $func->redirectToHome($massege, 3, "store.php");
        }
    }

    public function updateNewQuant($name, $item, $store)
    {
        $database = new Database();
        $stmt = $database->con->prepare("UPDATE 
                                            storeitems 
                                        SET 
                                            Quantity = ? 
                                        WHERE
                                            item = ?
                                        AND
                                            store = ? ");
        $stmt->execute(array($name, $item, $store));

        $massege =  "<div class='alert alert-success'> You Will Receive " . $stmt->rowCount() . ' Order Soon </div>';

        $func = new Func;
        $func->redirectToHome($massege, 5, "items.php");

        return $stmt;
    }

    public function delete($userid, $table, $id_bind)
    {
        $database = new Database();
        $stmt = $database->con->prepare("DELETE FROM $table WHERE ID = $id_bind");
        $stmt->bindParam($id_bind,  $userid);
        $stmt->execute();
        $massege = "<div class='alert alert-success'>" . $stmt->rowCount() . ' Record Deleted</div>';
        $fun = new Func();
        $fun->redirectToHome($massege, 3, "store.php?do=Manage");
        return $stmt;
    }


    public function Select_To_Buy($itemid)
    {
        $database = new Database();
        $stmt = $database->con->prepare("SELECT storeitems.*, items.Name AS it_name, store.Name AS st_name FROM storeitems
                                INNER JOIN items ON items.ID = storeitems.item
                                INNER JOIN store ON store.ID = storeitems.store
                                WHERE item = ?
                                ");
        $stmt->execute(array($itemid));
        return $stmt;
    }

    public function select_item($itemid)
    {
        $database = new Database();
        $stmt2 = $database->con->prepare("SELECT storeitems.store, storeitems.Quantity, store.Name AS stname FROM storeitems
                                        INNER JOIN store ON store.ID = storeitems.store
                                        WHERE item = ? ");
        $stmt2->execute(array($itemid));
        $items = $stmt2->fetchAll();

        foreach ($items as $item) {
            echo  "<option class='option' value='" . $item['store'] . "'>" . $item['stname'] . '  (Quantity = ' . $item['Quantity'] . ')' . "</option>";
        }
    }
}
