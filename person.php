<html>
    <body class="homepage">
<p>Want the calculator to do your math for you? Add your name to the folks asking.</p>
<form action="index.php" method="post">
    First Name: <input type="text" name="first_name">
    <br>
    Last Name: <input type="text" name="last_name">
    <br>

    <button type="submit" name="submit" value="submit" class=
"btn">Submit yo'self</button>

</form>

<?php

require_once('db_sql.php');

?>
<style>
    <?php include 'stylesheet.css'; ?>
</style>
</body>
</html>