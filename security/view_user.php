<?php
require_once 'models/UserModel.php';
$userModel = new UserModel();

$user = NULL; // Add new user
$id = NULL;

// Hàm giải mã ID
function decodeId($encodedId) {
    return base64_decode($encodedId); // Giải mã ID
}

// Kiểm tra xem có ID trong URL không
if (!empty($_GET['id'])) {
    $encodedId = $_GET['id']; // Lấy ID đã mã hóa từ URL
    $id = decodeId($encodedId); // Giải mã ID
    $user = $userModel->findUserById($id); // Cập nhật thông tin người dùng
}

if (!empty($_POST['submit'])) {
    if (!empty($id)) {
        $userModel->updateUser($_POST); // Cập nhật người dùng
    } else {
        $userModel->insertUser($_POST); // Thêm người dùng mới
    }
    header('location: list_users.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>User form</title>
    <?php include 'views/meta.php'; ?>
</head>
<body>
    <?php include 'views/header.php'; ?>
    <div class="container">
        <?php if ($user || empty($id)) { ?>
            <div class="alert alert-warning" role="alert">
                User profile
            </div>
            <form method="POST">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
                <div class="form-group">
                    <label for="name">Name</label>
                    <span><?php if (!empty($user[0]['name'])) echo htmlspecialchars($user[0]['name']); ?></span>
                </div>
                <div class="form-group">
                    <label for="fullname">Fullname</label>
                    <span><?php if (!empty($user[0]['fullname'])) echo htmlspecialchars($user[0]['fullname']); ?></span>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <span><?php if (!empty($user[0]['email'])) echo htmlspecialchars($user[0]['email']); ?></span>
                </div>
            </form>
        <?php } else { ?>
            <div class="alert alert-success" role="alert">
                User not found!
            </div>
        <?php } ?>
    </div>
</body>
</html>
