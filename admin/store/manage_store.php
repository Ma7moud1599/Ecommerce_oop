<?php
class Manage_Store
{

    public function get_data($sort)
    {
        $database = new Database();

        $stmt = $database->con->prepare("SELECT * FROM store ORDER BY ID $sort");

        $stmt->execute();

        $rows =  $stmt->fetchAll();

        return $rows;
    }

    public function table($rows)
    {

        foreach ($rows as $row) {

            echo '<tr>';
            echo '<td>' . $row['ID'] . '</td>';
            echo '<td><a href="store_items.php?do=Manage&storeid=' . $row['ID'] . '">' . $row['Name'] . '</a></td>';
            echo '<td>' . $row['Date'] . '</td>';
            echo '<td> 
                                <a href="store.php?do=Edit&storeid=' . $row['ID'] . '" class="btn btn-success edit-btn"> Edit</a>
                                <a href="store.php?do=Delete&storeid=' . $row['ID'] . '" class="btn btn-danger confirm delete-btn"> Delete</a>';
            if ($row['Reg_status'] == 0) {
                echo '<a href="store.php?do=Activate&storeid=' . $row['ID'] . '" class="btn btn-info ml-1"> Activate</a>';
            }
            '</td>';
            echo '</tr>';
        }
    }

    public function errors($Name)
    {

        $formsError = array();

        if (strlen($Name) < 4) {
            $formsError[] = 'Name Can\'t be Less than 4 Character';
        }

        if (strlen($Name) > 20) {
            $formsError[] = 'Name Can\'t be More Than 20 Character';
        }

        foreach ($formsError as $error) {
            $massege = '<div class="alert alert-danger">' . $error . '</div>';
            $func = new Func;
            $func->redirectToHome($massege, 3, "store.php?do=Add");
        }
    }

    public function add($Name)
    {

        $database = new Database();
        $stmt = $database->con->prepare("INSERT INTO store(Name, Reg_status, Date)
                                                    VALUES(:name, 0, now())");
        $stmt->execute(array(
            'name'  => $Name
        ));

        $success = "<div class='alert alert-success'>" . $stmt->rowCount() . " Record Inserted</div>";
        $func = new Func;
        $func->redirectToHome($success, 3, 'store.php?do=Manage');
    }

    public function edit($storid)
    {
        $database = new Database();
        $stmt = $database->con->prepare("SELECT * FROM store WHERE ID = ? LIMIT 1");
        $stmt->execute(array($storid));
        return $stmt;
    }

    public function update($name, $id)
    {
        $database = new Database();
        $stmt = $database->con->prepare("UPDATE 
                                            store 
                                        SET 
                                            Name = ? 
                                        WHERE 
                                            ID = ? ");
        $stmt->execute(array($name, $id));

        $success = "<div class='alert alert-success'>" . $stmt->rowCount() . ' Record Updated</div>';
        $fun = new Func();
        $fun->redirectToHome($success, 3, "store.php");

        return $stmt;
    }

    public function get_store_items($id)
    {
        $database = new Database();
        $stmt = $database->con->prepare("SELECT storeitems.*, items.*, items.Name AS item_name
                                        FROM storeitems
                                        INNER JOIN store ON store.ID = storeitems.store
                                        INNER JOIN items ON items.ID = storeitems.item
                                        WHERE store.ID = ?");
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
            echo '<td>' . $row['Date'] . '</td>';
            echo '<td> 
                                <a href="items.php?do=Edit&itemid=' . $row['ID'] . '" class="btn btn-success edit-btn"> Edit</a>
                                <a href="items.php?do=Delete&itemid=' . $row['ID'] . '" class="btn btn-danger confirm delete-btn"> Delete</a>';
            if ($row['Reg_status'] == 0) {
                echo '<a href="items.php?do=Activate&itemid=' . $row['ID'] . '" class="btn btn-info ml-1"> Activate</a>';
            }
            '</td>';
            echo '</tr>';
        }
    }

    public function add_item()
    {
    }
}
