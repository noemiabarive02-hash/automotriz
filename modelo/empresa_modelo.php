<?php

class EmpresaModel
{
    private $dbh;

    public function __construct($dbh)
    {
        $this->dbh = $dbh;
    }

    public function obtenerEmpresas()
    {
        $sql = "SELECT id_empresa, nombre_empresa FROM empresa ORDER BY nombre_empresa";
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
