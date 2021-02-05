<link rel="stylesheet" href="style.css">
<style>
    .index_container {
        background-color: white;
        width: 400px;
    }
</style>
<div class="index_container">
    <?php 
    //session start
    session_start();

    if (!isset($_SESSION["uid"])) {
        header('Location: login.php');
    }
    //connect to database
    require_once('include/connectdb.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $sql = "TRUNCATE tbuser";

        if (mysqli_query($conn, $sql)) {
            $status = "RECORD cleared successfully..";
        } else {
            $status = "Error: " . $sql . "<br/>" . mysqli_error($conn); 
        }
    }
    include('viewdata.php');
    ?>
    <p>
        <br>
        <a href="createdata.php">Create/Add Data</a>
        <br>
        <a href="verify.php">Verify user data</a>
        <br>
        <a href="logout.php">Logout</a>
    </p>

    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" id="formData">
        <button id="buttonTruncate">TRUNCATE RECORD</button>
    </form>

    <script src="script.js" defer></script>

</div>


