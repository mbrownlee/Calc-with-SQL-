<html>

<body class="homepage">
    <h3>Filtered Results</h3>
    <?php
    include_once 'db_sql.php';

    
    $firstName = $_POST['id'];
    $sql2 = "SELECT calc.user_name_id, user_name.first_name, calc.num1, calc.num2, calc.operator  FROM calc INNER JOIN user_name ON calc.user_name_id = user_name.id WHERE calc.user_name_id ='$firstName' ";
    $result3 = mysqli_query($init, $sql2);
    
    
while ($row = mysqli_fetch_array($result3)) {
    echo $row['first_name'] . " used " . $row['num1'] . " & " . $row['num2'] . " and performed " . $row['operator'] . "</br>";
}
    ?>
<form action="index.php">
            <button type="submit" name="submit" value="submit" class="btn">Home</button>
  
</body>
<style>
    <?php include 'stylesheet.css'; ?>
</style>

</html>