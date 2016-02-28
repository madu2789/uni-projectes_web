<?php
/**
 * That's a model example. It's a database request and return the results.
 *
 */
class SSHModel extends Model
{
    /**
     * Model method example.
     *
     * @return array
     */

    public function InsertTempUsuari($Nom, $Cognom, $Login, $Password, $Mail)
    {
        // It's mandatory to write the SQL queries with this format.
        $sql = <<<QUERY
INSERT INTO `tempusuaris`
(`Nom`, `Cognom`, `Login`, `Password`, `Mail`)
VALUES
('$Nom', '$Cognom', '$Login', '$Password', '$Mail')
QUERY;
        // $this->Execute( $sql ) executes all kind of queries that need write in database.
        $this->Execute($sql);
    }

    public function InsertUsuari($Nom, $Cognom, $Login, $Password, $Mail)
    {
        // It's mandatory to write the SQL queries with this format.
        $sql = <<<QUERY
INSERT INTO `usuaris`
(`Nom`, `Cognom`, `Login`, `Password`, `Mail`)
VALUES
('$Nom', '$Cognom', '$Login', '$Password', '$Mail')
QUERY;
        // $this->Execute( $sql ) executes all kind of queries that need write in database.
        $this->Execute($sql);
    }

    public function SetProducte($Titol, $Descripcio, $Preu, $Estat,$IdUsuari,$IdProducte, $tipus)
    {
        if($tipus == "crea"){
            $sql = <<<QUERY
INSERT INTO `productes`
(`TitolProducte`, `Descripcio`, `Preu`, `Estat`, `IdUsuari`,`URL`)
VALUES
('$Titol', '$Descripcio', '$Preu', '$Estat', '$IdUsuari', '$Titol')
QUERY;

        }elseif ("edita") {

            $sql = <<<QUERY
UPDATE `productes`
SET `Descripcio`= '$Descripcio',`Preu`='$Preu',`Estat`='$Estat',`TitolProducte`= '$Titol'
WHERE `IdProducte` = '$IdProducte'

QUERY;

        }

        // $this->Execute( $sql ) executes all kind of queries that need write in database.
        $this->Execute($sql);
    }

    public function ComprovaMail($Mail)
    {
        $sql = <<<QUERY
SELECT Count(Mail)
FROM  `usuaris`
WHERE  `Mail` =  '$Mail'
QUERY;
        // $this->getAll( $sql ) executes the query and return the results. It uses ADODB class internaly.
        return $this->getAll($sql);
    }

    public function ComprovaTempMail($Mail)
    {
        $sql = <<<QUERY
SELECT Count(Mail)
FROM  `tempusuaris`
WHERE  `Mail` =  '$Mail'
QUERY;
        // $this->getAll( $sql ) executes the query and return the results. It uses ADODB class internaly.
        return $this->getAll($sql);
    }

    public function ComprovaLogin($Login)
    {
        $sql = <<<QUERY
SELECT Count(Login)
FROM  `usuaris`
WHERE  `Login` =  '$Login'
QUERY;
        // $this->getAll( $sql ) executes the query and return the results. It uses ADODB class internaly.
        return $this->getAll($sql);
    }

    public function ComprovaTempLogin($Login)
    {
        $sql = <<<QUERY
SELECT Count(Login)
FROM  `tempusuaris`
WHERE  `Login` =  '$Login'
QUERY;
        // $this->getAll( $sql ) executes the query and return the results. It uses ADODB class internaly.
        return $this->getAll($sql);
    }

    public function ComprovaNom($Nom)
    {
        $sql = <<<QUERY
SELECT Count(Nom)
FROM  `usuaris`
WHERE  `Nom` =  '$Nom'
QUERY;
        // $this->getAll( $sql ) executes the query and return the results. It uses ADODB class internaly.
        return $this->getAll($sql);
    }

    public function ComprovaTempNom($Nom)
    {
        $sql = <<<QUERY
SELECT Count(Nom)
FROM  `tempusuaris`
WHERE  `Nom` =  '$Nom'
QUERY;
        // $this->getAll( $sql ) executes the query and return the results. It uses ADODB class internaly.
        return $this->getAll($sql);
    }

    public function ComprovaPassword($Mail)
    {
        $sql = <<<QUERY
SELECT `Password`, `IdUsuari`
FROM  `usuaris`
WHERE  `Mail` =  '$Mail'
QUERY;
        // $this->getAll( $sql ) executes the query and return the results. It uses ADODB class internaly.
        return $this->getAll($sql);
    }


    public function GetLastIdImage()
    {
        $sql = <<<QUERY
SELECT MAX(IdProducte)
FROM  `productes`
QUERY;
        // $this->getAll( $sql ) executes the query and return the results. It uses ADODB class internaly.
        return $this->getAll($sql);
    }

    public function GetProducteByName($TitolProducte)
    {
        $sql = <<<QUERY
SELECT *
FROM  `productes`
WHERE `TitolProducte` = '$TitolProducte'
QUERY;
        // $this->getAll( $sql ) executes the query and return the results. It uses ADODB class internaly.
        return $this->getAll($sql);
    }

    public function GetNomILoginById($IdUsuari)
    {
        $sql = <<<QUERY
SELECT `Nom`, `Login`
FROM  `usuaris`
WHERE `IdUsuari` = '$IdUsuari'
QUERY;
        // $this->getAll( $sql ) executes the query and return the results. It uses ADODB class internaly.
        return $this->getAll($sql);
    }

    public function GetProductesByUser($IdUsuari)
    {
        $sql = <<<QUERY
SELECT *
FROM  `productes`
WHERE `IdUsuari` = '$IdUsuari'
QUERY;
        // $this->getAll( $sql ) executes the query and return the results. It uses ADODB class internaly.
        return $this->getAll($sql);
    }

    public function GetProductesById($Id)
    {
        $sql = <<<QUERY
SELECT *
FROM  `productes`
WHERE `IdProducte` = '$Id'
QUERY;
        // $this->getAll( $sql ) executes the query and return the results. It uses ADODB class internaly.
        return $this->getAll($sql);
    }

    public function DeleteProducteById($IdProducte)
    {
        $sql = <<<QUERY
DELETE
FROM `productes`
WHERE `IdProducte` = '$IdProducte'
QUERY;
        // $this->getAll( $sql ) executes the query and return the results. It uses ADODB class internaly.
        return $this->getAll($sql);
    }

    public function DeleteTempUserByMail($Mail)
    {
        $sql = <<<QUERY
DELETE
FROM `tempusuaris`
WHERE `Mail` = '$Mail'
QUERY;
        // $this->getAll( $sql ) executes the query and return the results. It uses ADODB class internaly.
        $this->Execute($sql);
    }

    public function GetLastSoldProducte()
    {
        $sql = <<<QUERY
SELECT *
FROM  `productes`
GROUP BY  `DataVenta`
HAVING MAX(  `DataVenta` )
AND  `Venut` =1
ORDER BY  `DataVenta` DESC
LIMIT 1
QUERY;
        // $this->getAll( $sql ) executes the query and return the results. It uses ADODB class internaly.
        return $this->getAll($sql);
    }

    public function GetLastForSaleProductes()
    {
        $sql = <<<QUERY
SELECT *
FROM  `productes`
GROUP BY  `DataCreacio`
HAVING MIN(  `DataCreacio` )
AND  `Venut` =0
LIMIT 10
QUERY;
        // $this->getAll( $sql ) executes the query and return the results. It uses ADODB class internaly.
        return $this->getAll($sql);
    }

    public function GetProductesBySearch($Cerca)
    {
        $sql = <<<QUERY
SELECT *
FROM  `productes`
WHERE  `TitolProducte` LIKE  '%$Cerca%'
OR  `Descripcio` LIKE  '%$Cerca%'
LIMIT 0 , 10
QUERY;
        // $this->getAll( $sql ) executes the query and return the results. It uses ADODB class internaly.
        return $this->getAll($sql);
    }

    public function CompraProducte($IdProducte,$Hora)
    {
        // It's mandatory to write the SQL queries with this format.
        $sql = <<<QUERY
UPDATE `productes`
SET `Venut`='1',`DataVenta` = '$Hora'
WHERE `IdProducte` = '$IdProducte'
QUERY;
        // $this->Execute( $sql ) executes all kind of queries that need write in database.
        $this->Execute($sql);
    }

}

?>