<?php 
require_once('include/connectdb.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $username = $_POST['username'];
    $password = $_POST['userpassword'];
    
    $sql = "SELECT * FROM tbuser WHERE username = '$username' ";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $isPasswordCorrect = password_verify($password, $row["userpass"]);
        if($isPasswordCorrect){
            $status = "id: " . $row["userid"] ."-" . $row["userpass"];
        } else {
            $status = "Invalid password for username ". $username;
        }

      }
    } else {
        $status = "0 results for username " . $username;
    }
    $conn->close();
} else {
    $status = "";
}
?>

<div class="createdata_container">
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" id="createdata_form" name="createdata_form">
        <div>
            <h3>Verify Account</h3>
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


