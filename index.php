<html>

<body>
    <?php
    include_once 'db_sql.php';
    $query = "SELECT first_name, id FROM user_name;";
    $result = mysqli_query($init, $query);
    ?>
    <h2>Calculator</h2>
    <form action="calc.php" method="post">
        Person asking: <select name="user_name" value={user_name.id}>
            <?php
            while ($row = mysqli_fetch_array($result)) {
                echo "<option value=" . $row['first_name'] . ">" . $row['first_name'] . "</option>";
            }
            ?>
        </select>
        <br>
        First Number: <input type="text" name="num1">
        </select>
        <br>
        <select name="operator">
            <option>None</option>
            <option name="add">Addition</option>
            <option name="sub">Subtraction</option>
            <option name="mult">Multiplication</option>
            <option name="div">Division</option>
        </select>
        <br>
        Second Number: <input type="text" name="num2">

        <br>

        <button type="submit" name="submit" value="submit">Calculate</button>

    </form>
    <?php


    ?>
</body>

</html>