<html>
    <body class=homepage>
<p>The answer is:</p>

<?php

require_once('db_sql.php');


if (isset($_POST['submit'])) {
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $operator = $_POST['operator'];
    $user_name_id = $_POST['id'];
    switch ($operator) {
        case "None":
            echo "Error. Please select method.";
            break;
        case "Addition":
            echo $num1 + $num2;
            break;
        case "Subtraction":
            echo $num1 - $num2;
            break;
        case "Multiplication":
            echo $num1 * $num2;
            break;
        case "Division":
            echo $num1 / $num2;
            break;
    }
}


$user_ins = "INSERT INTO calc (num1, operator, num2, user_name_id) VALUES ('$num1', '$operator', '$num2', '$user_name_id');";
$user_ins_call = mysqli_query($init, $user_ins);

?>

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