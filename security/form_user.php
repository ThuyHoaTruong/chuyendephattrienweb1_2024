<?php
// Start the session
session_start();
require_once 'models/UserModel.php';
$userModel = new UserModel();

$user = NULL; //Add new user
$_id = NULL;

// Hàm giải mã ID
function decodeId($encodedId) {
    return base64_decode($encodedId); // Giải mã ID
}


if (!empty($_GET['id'])) {
    $encodedId = $_GET['id']; // Lấy ID đã mã hóa từ URL
    $_id = decodeId($encodedId); // Giải mã ID
    $user = $userModel->findUserById($_id);//Update existing user
}




// if (!empty($_POST['submit'])) {

//     if (!empty($_id)) {
//         $userModel->updateUser($_POST);
//     } else {
//         $userModel->insertUser($_POST);
//     }
//     header('location: list_users.php');
// }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $result = $userModel->updateUser($_POST);
    
    if (is_array($result)) {
        // Có lỗi, hiển thị thông báo
        foreach ($result as $error) {
            echo "<div class='alert alert-danger'>$error</div>";
        }
    } else {
        // Không có lỗi, chuyển hướng hoặc thực hiện hành động khác
        header('Location: list_users.php');
    }
}



?>
<!DOCTYPE html>
<html>
<head>
    <title>User form</title>
    <?php include 'views/meta.php' ?>
</head>
<body>
    <?php include 'views/header.php'?>
    <div class="container">

            <?php if ($user || !isset($_id)) { ?>
                <div class="alert alert-warning" role="alert">
                    User form
                </div>
                <form method="POST" onsubmit="return validateForm()">
                    <input type="hidden" name="id" value="<?php echo $_id ?>">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control" name="name" placeholder="Name" value='<?php if (!empty($user[0]['name'])) echo $user[0]['name'] ?>'>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>

                    <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
                </form>
            <?php } else { ?>
                <div class="alert alert-success" role="alert">
                    User not found!
                </div>
            <?php } ?>
    </div>
</body>
</html>