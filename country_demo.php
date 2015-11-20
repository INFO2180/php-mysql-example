<?php
# connect to world database on local computer
# $db = mysql_connect("somethingelse","pigeonflight");
$host = "0.0.0.0";
$user = "pigeonflight";

check(mysql_connect($host, $user), "connecting");
check(mysql_select_db("world"), "selecting a database");


$population = 500000;
# execute a SQL query on the database
$results = mysql_query("SELECT * FROM countries WHERE population > $population;");

$counter = 0;
# loop through each country
?>
<h1>
Countries with a population of <?= $population ?> or more.
</h1>
<?php
while ($row = mysql_fetch_array($results)) {
  $counter = $counter + 1;
  ?>
  <li> <?= $row["name"] ?>, ruled by <?= $row["head_of_state"] ?> life expectancy is <?= $row["life_expectancy"] ?></li>
  <?php
}
?>
<h2> <?= $counter ?> </h2>

<?php
# makes sure result is not false/null; else prints error
function check($result, $message) {
  if (!$result) {
    die("SQL error during $message: " . mysql_error());
  }
}
?>