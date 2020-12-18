<html>

<body>
    <?php
    include_once 'db_sql.php';
    
    
    $query = "SELECT * FROM calc;";
    $result = mysqli_query($init, $query);
    ?>
    <h3>Nebby? Now you can see what people have calculated.</h3>

    <?php
         $query2 = "SELECT * FROM user_name;";
         $result2 = mysqli_query($init, $query2);

     while ($row = mysqli_fetch_array($result)) {
         
        echo $row['user_name_id'] . " used " . $row['num1'] . " & " . $row['num2'] . " and performed " . $row['operator'] . "</br>" ;
    }
    while ($row = mysqli_fetch_array($result2)) {
        echo $row['first_name'] . "</br>";
    }

?>
    <br>
    <br>
    <br>

    <form action="index.php">
        <button type="submit" name="submit" value="submit">Home</button>
    </form>
</body>

</html>
