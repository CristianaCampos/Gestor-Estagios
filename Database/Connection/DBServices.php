<?php include("DBConnection.php") ?>
<?php
class DBServices
{
    var $connection;
    var $command;

    function __construct(DBConnection $dBConnection)
    {
        $this->connection = $dBConnection;
    }

    public function runCommand($command)
    {
        $result = mysqli_query($this->connection->getConnection(), $command);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function selectCommand($command)
    {
        $result = mysqli_query($this->connection->getConnection(), $command);
        return $result;
    }
}
?>