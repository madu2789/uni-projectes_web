<?php
/**
 * That's a model example. It's a database request and return the results.
 *
 */
class MostraVideosModel extends Model
{
    /**
     * Model method example.
     *
     * @return array
     */
    public function getContentDocuments($id, $tipus)
    {
        $limitSuperior = $id * 3;
        $limitInferior = $limitSuperior - 3;

        // It's mandatory to write the SQL queries with this format.
        $sql = <<<QUERY
SELECT id_video, tipus
FROM  `videos`
WHERE  `tipus` =  '$tipus'
LIMIT $limitInferior , $limitSuperior
QUERY;
        // $this->getAll( $sql ) executes the query and return the results. It uses ADODB class internaly.
        return $this->getAll($sql);
    }

    public function setContentDocuments($id_video, $date, $tipus)
    {
        // It's mandatory to write the SQL queries with this format.
        $sql = <<<QUERY
INSERT INTO
	videos(id_video,data_creacio,tipus)
VALUES
    ('$id_video', '$date', '$tipus')
QUERY;
        // $this->Execute( $sql ) executes all kind of queries that need write in database.
        $this->Execute($sql);

    }

    public function EliminaVideo($id)
    {
        // It's mandatory to write the SQL queries with this format.
        $sql = <<<QUERY
DELETE
FROM `videos`
WHERE `id` = '$id'

QUERY;
        // $this->Execute( $sql ) executes all kind of queries that need write in database.
        $this->Execute($sql);
    }

    public function ActualitzaVideo($id, $id_video)
    {
        // It's mandatory to write the SQL queries with this format.
        $sql = <<<QUERY
UPDATE `videos`
SET `id_video` = '$id_video'
WHERE `id` = '$id'
QUERY;
        // $this->Execute( $sql ) executes all kind of queries that need write in database.
        $this->Execute($sql);
    }

    public function CountVideos($tipus)
    {
        // It's mandatory to write the SQL queries with this format.
        $sql = <<<QUERY
SELECT COUNT( id )
FROM  `videos`
WHERE  `tipus` = '$tipus'

QUERY;
        // $this->getAll( $sql ) executes the query and return the results. It uses ADODB class internaly.
        return $this->getAll($sql);
    }

}

?>