<html>

<body class="homepage">
    <h3>Filtered Results</h3>
    <?php
    include_once 'db_sql.php';

    
    $date = $_POST['created_date'];
    $sql = "SELECT calc.user_name_id, user_name.first_name, calc.num1, calc.num2, calc.operator, calc.created_date FROM calc INNER JOIN user_name ON calc.user_name_id = user_name.id WHERE calc.created_date ='$date' ";
    $result = mysqli_query($init, $sql);
  
    
    
while ($row = mysqli_fetch_array($result)) {
    echo "On " . $row['created_date'] . " " . $row['first_name'] . " used " . $row['num1'] . " & " . $row['num2'] . " and performed " . $row['operator'] . "</br>";
}
    ?>
<form action="index.php">
            <button type="submit" name="submit" value="submit" class="btn">Home</button>
  
</body>
<style>
    <?php include 'stylesheet.css'; ?>
</style>

</html>