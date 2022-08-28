<div class="container latest">
    <div class="row mt-5">
        <div class="col-md-6 mt-5">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Latest <?php echo $latestUsersLimit; ?> Registerd Users
                </div>
                <div class="table-responsive">
                    <table class="main-table text-center table table-bordered">
                        <tr>
                            <td>Image</td>
                            <td>Username</td>
                            <td>Control</td>
                        </tr>
                        <?php
                        foreach ($thaLatestUsers as $row) {
                            echo '<tr>';
                            echo "<td class='img'><img src='layout/images/" . $row['image'] . "'/></td>";
                            echo '<td>' . $row['Username'] . '</td>';
                            echo '<td> 
                                <a href="users.php?do=Edit&userid=' . $row['user_id'] . '" class="btn btn-success edit-btn"> Edit</a>
                                <a href="users.php?do=Delete&userid=' . $row['user_id'] . '" class="btn btn-danger confirm delete-btn"> Delete</a>';
                            if ($row['Reg_status'] == 0) {
                                echo '<a href="users.php?do=Activate&userid=' . $row['user_id'] . '" class="btn btn-info ml-1"> Activate</a>';
                            }
                            '</td>';
                            echo '</tr>';
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6 mt-5">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Latest <?php echo $latestCategoriesLimit; ?> Categories
                </div>
                <div class="table-responsive">
                    <table class="main-table text-center table table-bordered">
                        <tr>
                            <td>Image</td>
                            <td>Name</td>
                            <td>Control</td>
                        </tr>
                        <?php
                        foreach ($thaLatestCategories as $category) {
                            echo '<tr>';
                            echo "<td class='img'><img src='layout/images/" . $category['image'] . "'/></td>";
                            echo '<td>' . $category['Name'] . '</td>';
                            echo '<td> 
                                <a href="categories.php?do=Edit&cateid=' . $category['ID'] . '" class="btn btn-success edit-btn"> Edit</a>
                                <a href="categories.php?do=Delete&cateid=' . $category['ID'] . '" class="btn btn-danger confirm delete-btn"> Delete</a>';
                            if ($category['Reg_status'] == 0) {
                                echo '<a href="categories.php?do=Activate&cateid=' . $category['ID'] . '" class="btn btn-info add-btn"> Activate</a>';
                            }
                            '</td>';
                            echo '</tr>';
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5 mb-5">
        <div class="col-md-12 mt-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Latest <?php echo $latestItemLimit; ?> Items
                </div>
                <div class="table-responsive">

                    <table class="main-table text-center table table-bordered">
                        <tr>
                            <td>Image</td>
                            <td>Name</td>
                            <td>Date</td>
                            <td>Control</td>
                        </tr>
                        <?php
                        foreach ($thaLatestItems as $row) {
                            echo '<tr>';
                            echo "<td class='img'><img src='layout/images/" . $row['Image'] . "'/></td>";
                            echo '<td>' . $row['Name'] . '</td>';
                            echo '<td>' . $row['Date'] . '</td>';
                            echo '<td> 
                                <a href="items.php?do=Edit&itemid=' . $row['ID'] . '" class="btn btn-success edit-btn"> Edit</a>
                                <a href="items.php?do=Delete&itemid=' . $row['ID'] . '" class="btn btn-danger confirm delete-btn"> Delete</a>';
                            if ($row['Reg_status'] == 0) {
                                echo '<a href="items.php?do=Activate&itemid=' . $row['ID'] . '" class="btn btn-info m-1"> Activate</a>';
                            }
                            '</td>';
                            echo '</tr>';
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5 mb-5">
        <div class="col-md-12 mt-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Latest <?php echo $latestCommentLimit; ?> Comments
                </div>
                <div class="table-responsive">

                    <table class="main-table text-center table table-bordered">
                        <tr>
                            <td>Comment</td>
                            <td>Date</td>
                            <td>Control</td>
                        </tr>
                        <?php
                        foreach ($thaLatestComments as $row) {
                            echo '<tr>';
                            echo '<td>' . $row['Comment'] . '</td>';
                            echo '<td>' . $row['Date'] . '</td>';
                            echo '<td>
                            <a href="comments.php?do=Edit&comid=' . $row['Comment_ID'] . '" class="btn btn-success edit-btn"> Edit</a>
                            <a href="comments.php?do=Delete&comid=' . $row['Comment_ID'] . '" class="btn btn-danger confirm delete-btn"> Delete</a>';
                            if ($row['Reg_status'] == 0) {
                                echo '<a href="comments.php?do=Activate&comid=' . $row['Comment_ID'] . '" class="btn btn-info add-btn"> Activate</a>';
                            }
                            '</td>';
                            echo '</tr>';
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>