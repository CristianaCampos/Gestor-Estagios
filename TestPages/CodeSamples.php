<?php include("../Database/Connection/DBServices.php") ?>
<?php
echo 'Current PHP version: ' . phpversion();
echo "<br>";

$connection = new DBConnection();
$connection->open();
$services = new DBServices($connection);


// $queryInsert = "INSERT INTO cursos(nome) VALUES ('teste')";
// $queryResult = $services->runCommand($query);
// if ($queryResult) {
//     echo 'Sucesso!';
// }

// $querySelect = "SELECT * FROM cursos";
// $queryResult = $services->selectCommand($querySelect);

// loadCursos($queryResult);

// function loadCursos($queryResult)
// {
//     if (mysqli_num_rows($queryResult) > 0) {
//         while ($row = mysqli_fetch_assoc($queryResult)) {
//             echo "<br>" . $row["nome"];
//         }
//     }
// }

?>