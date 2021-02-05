<?php 
    $sql = "SELECT userid, username, userpass FROM tbuser";
    $result = $conn->query($sql);
?>
<table>
<tr>
    <th>ID</th>
    <th>USERNAME</th>
</tr>
<?php
    if ($result->num_rows > 0) {
    // output data of each row ?
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td> " . $row["userid"]. "</td><td> " . $row["username"] . "</td>";
            echo "</tr>";
        }
    } else {
    echo "0 results";
    }
?>    
    </table>
<?php
    $conn->close();
?>