<?php
// Start the session
session_start();
require_once 'models/UserModel.php';
$userModel = new UserModel();

$user = NULL; 
$_id = NULL;

if (!empty($_GET['id'])) {
    $encodedId = $_GET['id']; // Lấy ID đã mã hóa từ URL
    $_id = decodeId($encodedId); 
    $user = $userModel->findUserById($_id);//Update existing user
}

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
function encodeId($id) {
    return base64_encode($id);
}

function decodeId($encodedId) {
    return base64_decode($encodedId);
}

if (!empty($_POST['submit'])) {
    $errors = [];

    // Validate Name
    if (empty($_POST['name'])) {
        $errors[] = "Name is required.";
    } elseif (!preg_match('/^[A-Za-z0-9]{5,15}$/', $_POST['name'])) {
        $errors[] = "Name must be between 5 and 15 characters and contain only letters and numbers.";
    }

    // Validate Password
    if (empty($_POST['password'])) {
        $errors[] = "Password is required.";
    } elseif (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[~!@#$%^&*()]).{5,10}$/', $_POST['password'])) {
        $errors[] = "Password must be 5 to 10 characters long and include at least one lowercase letter, one uppercase letter, one number, and one special character.";
    }

    
    if (empty($errors)) {
        if (!empty($_id)) {
            $userModel->updateUser($_POST);
        } else {
            $userModel->insertUser($_POST);
        }
        header('location: list_users.php');
        exit;
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
<script>
function validateForm() {
    let name = document.forms["updateForm"]["name"].value;
    let password = document.forms["updateForm"]["password"].value;

    // Validate name
    const nameRegex = /^[a-zA-Z0-9]{5,15}$/;
    if (name === "") {
        alert("Name is required.");
        return false;
    }
    if (!nameRegex.test(name)) {
        alert("Name must be 5-15 characters long and can only contain letters and numbers.");
        return false;
    }

    // Validate password
    const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[~!@#$%^&*()])[A-Za-z\d~!@#$%^&*()]{5,10}$/;
    if (password === "") {
        alert("Password is required.");
        return false;
    }
    if (!passwordRegex.test(password)) {
        alert("Password must be 5-10 characters long, contain lowercase, uppercase, number, and special character.");
        return false;
    }

    return true; // Allow form submission if all validation passes
}
</script>
</html>