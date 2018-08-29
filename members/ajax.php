<?php
include("../modules/connect.php");
 
if(isset($_REQUEST["term"])){
    // Prepare a select statement
    $sql = "SELECT * FROM apps WHERE name LIKE ? LIMIT 5";
    
    if($stmt = $link->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("s", $param_term);
        
        // Set parameters
        $param_term = $_REQUEST["term"] . '%';
        
        // Attempt to execute the prepared statement
        if($stmt->execute()){
            $result = $stmt->get_result();
            echo '<br>';
            // Check number of rows in the result set
            if($result->num_rows > 0){
                // Fetch result rows as an associative array
                while($row = $result->fetch_array(MYSQLI_ASSOC)){
                    echo '<p class="dropdown-item">
                    <table>
                    <tr>
                    <td>
                    <form action="addFeed.php" method="post">
                    <input name="app" value="'.$row['id'].'" hidden/>
                    <input name="store" value="android" hidden/>
                    <button name="selectApp" type="submit" class="dropdown-item"> 
                    <img src="'.$row['iconurl'].'" width="40">
                    </button>
                    </form>
                    </td>
                    <td>
                    <form action="addFeed.php" method="post">
                    <input name="app" value="'.$row['id'].'" hidden/>
                    <input name="store" value="android" hidden/>
                    <button name="selectApp" type="submit" class="dropdown-item"> 
                    <b>'. $row['name'] .'</b>
                    <br><small><b>'.$row['publisher'].'</b></small>
                    </button>
                    </form>
                    </td>
                    </tr></table>
                    </p>';
                }
            } else{
                echo "<p>No matches found</p>";
            }
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
    }
     
    // Close statement
    $stmt->close();
}
 
// Close connection
$link->close();
?>