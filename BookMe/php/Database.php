
<?php

use Database as GlobalDatabase;

class Database
{

    private $db_host = "localhost";
    private $db_user = "root";
    private $db_pass = "";
    private $db_name = "bookme";

    private $db = "";


    public function __construct()
    {
        try {
            $this->db = new PDO("mysql:host=$this->db_host;dbname=$this->db_name", $this->db_user, $this->db_pass);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die($e->getMessage());
        }

    }

    // truncate table
    public function truncate($table)
    {
        try {
            $query = "TRUNCATE TABLE $table";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
        } catch (PDOException $e) {
            die($e->getMessage());
        }

    }

    //function to insert data into database
    public function insert($table, $params = array())
    {
        $columns = implode("`,`", array_keys($params));
        $placeholders = implode(", ", array_fill(0, count($params), "?"));

        try {
            $sql = "INSERT INTO `$table` (`$columns`) VALUES ($placeholders)";
            $stmt = $this->db->prepare($sql);
            $stmt->execute(array_values($params));


        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    // function to select data  

    public function select($table, $row, $where = null, $subquery = null)
    {
        $sql = "Select $row From `$table` ";
        if ($where != null) {
            $sql = $sql . " WHERE `$where`";
        }
        if ($subquery != null) {
            $sql = $sql . " WHERE $subquery";
        }
        $result = $this->db->query($sql);
        if ($result->rowCount() > 0) {
            return $result;
        }
    }

    public function update($query)
    {
        try {
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            echo "Record updated successfully";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }



}





?>