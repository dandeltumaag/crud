<?php
//Start Session
session_start();
$_SESSION['uid'] = '';

//connect to database
include_once('include/connectdb.php');

$username = $password = '';

if($_SERVER['REQUEST_METHOD'] === 'POST' ){
    //get form value
    $username = $_POST['login-txt_username'];
    $password = $_POST['login-txt_password'];

    //create sql statement to check username if found
    $sql = "SELECT * FROM tbuser WHERE username = '$username' ";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        //check if inputed password is equal to hashed password from database
        $isPasswordCorrect = password_verify($password, $row["userpass"]);
        if($isPasswordCorrect){
            //$status = "id: " . $row["userid"] ."-" . $row["userpass"];
            $_SESSION['uid'] = $row["userid"];
            header('Location: index.php');
        } else {
            $status = "<span class='error'>Invalid password for username ". $username ."</span";
        }

      }
    } else {
        $status = "<span class='error'>" . $username . "&nbsp not found</span>";
    }
    $conn->close();
} else {
    $status = "";
}    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
</head>
<body>
    <div class="login_container">
        <div class="header">
            <h2>Login Account</h2>
        </div>
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" id="login_form" name="login_form" class="login_form">
            <div class="form_control">
                <label for="login-txt_username">Username</label>
                <input type="text" id="login-txt_username" name="login-txt_username" placeholder="username">
                <i class="fa fa-check-circle"></i>
                <i class="fa fa-exclamation-circle"></i>
                <small>error message</small>
            </div>
            <div class="form_control">
                <label for="login-txt_password">Password</label>
                <input type="password" id="login-txt_password" name="login-txt_password" placeholder="password">
                <i class="fa fa-check-circle"></i>
                <i class="fa fa-exclamation-circle"></i>
                <small>error message</small>
            </div>

            <button id="btn_submit" class="btn_submit">submit</button>
            <div class="errorMsg">
                <?php echo $status; ?>
            </div>
        </form>
    </div>    
</body>
</html>