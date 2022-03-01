<?php

class Service {

    private PDO $db;
    
    private string $host = '';
    private string $dbname = '';
    private string $user = '';
    private string $pass = '';
    private array $opt = [];

    public final function __construct($host, $dbname, $user, $pass, $opt)
    {
        $this->host = $host;
        $this->dbname = $dbname;
        $this->user = $user;
        $this->pass = $pass;
        $this->opt = $opt;

        try {
            $this->db = new PDO("mysql:dbname=$this->dbname;host=$this->host", $this->user, $this->pass, $this->opt);
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }

    function fetch_all(string $table_name, callable $func) {
    
        $query = $this->db->query("SELECT * FROM $table_name");
        $table = $query->fetchall(PDO::FETCH_ASSOC);
    
        $rows = array();
    
        foreach ($table as $row) {
            array_push($rows, $func($row));
        }
    
        return $rows;
    }

    function insert(string $table_name, array $values) {

        $columns = array_keys($values);

        $query = [];

        $query[] = "INSERT INTO $table_name";
        $query[] = "(".join(", ", $columns).")";
        $query[] = "VALUES";
        $query[] = "(:".join(", :", $columns).")";

        
        $stmt = $this->db->prepare(join(" ", $query));
        return $stmt->execute($values);
    }

    
}

?>