<?php
session_start();
$pageTitle = 'Profile';
if (isset($_SESSION['Username'])) {
    include 'init.php';

    $do = isset($_GET['do']) ? $_GET['do'] : 'Edit';

    if ($do == 'Edit') {
        $userid = isset($_SESSION['ID']) && is_numeric($_SESSION['ID']) ? intval($_SESSION['ID']) : 0;
        $get = new Manage_Users();
        $stmt = $get->edit($userid);
        $row = $stmt->fetch();
        $count = $stmt->rowCount();
        if ($count > 0) {
?>
            <div class="container">
                <h1 class="text-center member-header">User Profile</h1>
                <form class="edit" action="?do=Update" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="userid" value="<?php echo $userid ?>">
                    <img src="layout/images/<?php echo $row['image'] ?>" alt="">
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping">Image</span>
                        <input value="<?php echo $row['image'] ?>" type="file" class="form-control" name="image" required="required">
                    </div>
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping">Username</span>
                        <input value="<?php echo $row['Username'] ?>" type="text" class="form-control" name="username" placeholder="Username" autocomplete='off' required="required">
                    </div>
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping">Password</span>
                        <input value="<?php echo $row['Password'] ?>" type="hidden" name="oldpassword">
                        <input type="password" class="password form-control" name="newpassword" placeholder="password" autocomplete="new-password">
                    </div>
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping">Email</span>
                        <input value="<?php echo $row['Email'] ?>" type=" text" class="form-control" name="email" placeholder="email" required="required">
                    </div>
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping">Job</span>
                        <input value="<?php echo $row['job'] ?>" type=" text" class="form-control" name="job" placeholder="User Job" required="required">
                    </div>
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping">Full Name</span>
                        <input value="<?php echo $row['Full_name'] ?>" type=" text" class="form-control" name="full" placeholder="full name" required="required">
                    </div>
                    <div class="input-group flex-nowrap">
                        <input class="btn btn-primary save" type="submit" value="Edit Profile" />
                    </div>
                </form>
            </div>
<?php
        } else {
            $error = '<div class="alert alert-danger">This Id Not Found.</div>';
            $fun = new Func();
            $fun->redirectToHome($error, 3, 'index.php');
        }
    } elseif ($do == 'Update') {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            echo  "<div class='container'>";
            echo "<h1 class='text-center member-header'>Update Profile</h1>";

            $id = $_POST['userid'];
            $user = $_POST['username'];
            $email = $_POST['email'];
            $job = $_POST['job'];
            $name = $_POST['full'];

            // password trick
            $pass = empty($_POST['newpassword']) ? $pass = $_POST['oldpassword'] : sha1($_POST['newpassword']);

            $imageName = $_FILES['image']['name'];
            $imageSize = $_FILES['image']['size'];
            $imageTmp = $_FILES['image']['tmp_name'];
            $imageType = $_FILES['image']['type'];

            $imageAllowedExtension = array('jpeg', 'jpg', 'png', 'gif');

            $imageExplode = explode('.', $imageName);

            $imageExtension = strtolower(end($imageExplode));

            $mana = new Manage_Users();
            $mana->errors($user, 'profile', $imageExtension, $imageAllowedExtension, $imageName, $imageSize);

            if (empty($formsError)) {
                $mana = new Manage_Users();
                $count = $mana->check_user_exist('users', 'Username', 'user_id', $user, $id);

                if ($count == 1) {
                    $error = '<div class="alert alert-danger">Sorry This User Is Exist. </div>';
                    $fun = new Func();
                    $fun->redirectToHome($error, 3, 'profile.php?do=Edit');
                } else {
                    $image = rand(0, 100000000) . '_' . $imageName;
                    move_uploaded_file($imageTmp, 'layout\images\\' . $image);

                    $mana = new Manage_Users();
                    $stmt = $mana->update($image, $user, $email, $name, $pass, $job, $id, 'dashboard');
                }
            }
        } else {
            $error = '<div class="alert alert-danger">You Can\'t Browse This Page. </div>';
            $fun = new Func();
            $fun->redirectToHome($error, 3, 'profile.php?do=Edit');
        }
        echo  "<div>";
    }


    include $tpl . 'footer.php';
} else {
    header('Location: index.php');
    exit();
}
