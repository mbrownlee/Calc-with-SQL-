<html>

<body class="homepage">
    <h3>Filtered Results</h3>
    <?php
    include_once 'db_sql.php';

    $query = "SELECT calc.user_name_id, user_name.first_name, calc.num1, calc.num2, calc.operator  FROM calc INNER JOIN user_name ON calc.user_name_id = user_name.id WHERE user_name.first_name='[id]' ";
    $result = mysqli_query($init, $query);

    while ($row = mysqli_fetch_array($result)) {
        echo $row['first_name'] . " used " . $row['num1'] . " & " . $row['num2'] . " and performed " . $row['operator'] . "</br>";
    }

    ?>
</body>
<style>
    <?php include 'stylesheet.css'; ?>
</style>

</html>