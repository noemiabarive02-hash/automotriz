<?php

class companiaModel
{
    private $dbh;

    public function __construct($dbh)
    {
        $this->dbh = $dbh;
    }

    public function obtenerCompania()
    {
        $sql = "SELECT id_compania,descripcion FROM companias ORDER BY id_compania DESC";
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}