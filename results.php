<html>

<body class="homepage">
    <h3>Nebby? Now you can see what people have calculated.</h3>
    <?php
    include_once 'db_sql.php';

    $sql = "SELECT COUNT(*) FROM calc";
    $result2 = mysqli_query($init, $sql) or trigger_error("SQL", E_USER_ERROR);
    $r = mysqli_fetch_row($result2);

    $numrows = $r[0];
    $rowsperpage = 5;
    $totalpages = ceil($numrows / $rowsperpage);


    if (isset($_GET['currentpage']) && is_numeric($_GET['currentpage'])) {
        $currentpage = (int) $_GET['currentpage'];
    } else {
        $currentpage = 1;
    }

    if ($currentpage > $totalpages) {
        $currentpage = $totalpages;
    }

    if ($currentpage < 1) {
        $currentpage = 1;
    }

    $offset = ($currentpage - 1) * $rowsperpage;

    $query = "SELECT calc.user_name_id, user_name.first_name, calc.num1, calc.num2, calc.operator  FROM calc INNER JOIN user_name ON calc.user_name_id = user_name.id LIMIT $offset, $rowsperpage;";

    $result = mysqli_query($init, $query);

    while ($row = mysqli_fetch_array($result)) {
        echo $row['first_name'] . " used " . $row['num1'] . " & " . $row['num2'] . " and performed " . $row['operator'] . "</br>";
    }


    $range = 3;

    if ($currentpage > 1) {
        echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=1'><<</a> ";

        $prevpage = $currentpage - 1;

        echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$prevpage'><</a> ";
    }

    for ($x = ($currentpage - $range); $x < (($currentpage + $range) + 1); $x++) {
        if (($x > 0) && ($x <= $totalpages)) {
            if ($x == $currentpage) {
                echo " [<b>$x</b>] ";
            } else {
                echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$x'>$x</a> ";
            }
        }
    }


    ?>
    <br>
    <br>
    <p>Want to filter results by who asked?</p>
    <?php
    $query3 = "SELECT first_name, id FROM user_name;";
    $result3 = mysqli_query($init, $query3);
    ?>
    <form action="filteredResults.php" method="post">
        Filter by person: <select name="id" value=$row[id]>
            <?php
            while ($row = mysqli_fetch_array($result3)) {
                echo "<option value=" . $row['id'] . ">" . $row['first_name'] . "</option>";
            }
            ?>
        </select>
        <button type="submit" name="submit" value="submit" class="btn">Filter</button>
    </form>
        <br>
        <br>
        <form action="filteredDateResults.php" method="post">
        Filter by date calculated: <input type="date" name="created_date" >
        <button type="submit" name="submit" value="submit" class="btn">Date Filter</button>
        </form>
        <br>
        <br>
        <br>
        <form action="index.php">
            <button type="submit" name="submit" value="submit" class="btn">Home</button>
        </form>
        <style>
            <?php include 'stylesheet.css'; ?>
        </style>
</body>

</html>

