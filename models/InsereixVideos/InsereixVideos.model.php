<?php
/**
 * That's a model example. It's a database request and return the results.
 *
 */
class InsereixVideosModel extends Model
{
    /**
     * Model method example.
     *
     * @return array
     */
    public function setContentDocuments($id_video, $date)
    {
        // It's mandatory to write the SQL queries with this format.
        $sql = <<<QUERY
INSERT INTO
	videos(id_video,data_creacio)
VALUES
    ('$id_video', '$date')
QUERY;
        // $this->Execute( $sql ) executes all kind of queries that need write in database.
        $this->Execute($sql);

    }
}

?>