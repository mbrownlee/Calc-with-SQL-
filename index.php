<html>

<body class=homepage>
    <?php
    include_once 'db_sql.php';
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];

    $user_ins = "INSERT INTO user_name (first_name, last_name) VALUES ('$first_name', '$last_name');";
    $user_ins_call = mysqli_query($init, $user_ins);
    ?>
    <form action="person.php">
        <button type="submit" name="submit" value="submit" class="btn">Add New Person</button>
    </form>
    <?php



    $query = "SELECT first_name, id FROM user_name;";
    $result = mysqli_query($init, $query);
    ?>
    <h2>Calculator</h2>

    <form action="calc.php" method="post">
        Person asking: <select name="id" value=$row[id]>
            <?php
            while ($row = mysqli_fetch_array($result)) {
                echo "<option value=" . $row['id'] . ">" . $row['first_name'] . "</option>";
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

        <button type="submit" name="submit" value="submit" class="btn">Calculate</button>

    </form>
    <br>
    <br>
    <br>
    <form action="results.php">
        <button type="submit" name="submit" value="submit" class="btn">Past Calculations</button>
    </form>


</body>
<style>
    <?php include 'stylesheet.css'; ?>
</style>

</html>