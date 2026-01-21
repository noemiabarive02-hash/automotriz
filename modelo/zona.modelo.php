<?php

class ZonaModel
{
    private $dbh;

    public function __construct($dbh)
    {
        $this->dbh = $dbh;
    }

    public function obtenerZona()
    {
        $sql = "SELECT id_zona_localidad,descripcion FROM zona_localidad ORDER BY id_zona_localidad DESC";
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
