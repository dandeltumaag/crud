<link rel="stylesheet" href="style.css">

<?php 
require_once('include/connectdb.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $username = $_POST['username'];
    $password = password_hash($_POST['userpassword'], PASSWORD_DEFAULT);
    
    $sql = "INSERT INTO tbuser (username, userpass) VALUES ('" . $username . "','". $password ."')";

    if (mysqli_query($conn, $sql)) {
        $status = "New record created successfully..";
    } else {
        $status = "Error: " . $sql . "<br/>" . mysqli_error($conn); 
    }
} else {
    $status = "";
}

?>

<div class="createdata_container">
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" id="createdata_form" name="createdata_form">
        <div>
            <h3>Create Account</h3>
        </div>
        <div>
            <label for="username">Username</label>
            <input type="text" name="username" id="username">
        </div>
        <div>
            <label for="userpassword">Password</label>
            <input type="password" name="userpassword" id="userpassword">
        </div>
        <div>
            <button name="submitBtn" id="submitBtn">Submit</button>
        </div>
        <div id="errstatus">
            <?php echo $status; ?>
        </div>
    </form>
    <div>
        <a href="index.php">HOME</a>
    </div>
</div>

<script src="script.js" defer></script>
