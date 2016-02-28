<?php
/**
 * That's a model example. It's a database request and return the results.
 *
 */
class HomeHomeModel extends Model
{
    /**
     * Model method example.
     *
     * @return array
     */
    public function getContentDocuments()
    {
        // It's mandatory to write the SQL queries with this format.
        $sql = <<<QUERY
SELECT
	id_document,
	content
FROM
	documents
WHERE
	id_document >= 1
LIMIT 5
QUERY;
        // $this->getAll( $sql ) executes the query and return the results. It uses ADODB class internaly.
        return $this->getAll($sql);
    }

    /**
     * Model method example.
     *
     * @return array
     */
    public function setContentDocuments()
    {
        // It's mandatory to write the SQL queries with this format.
        $sql = <<<QUERY
INSERT INTO
	edicio
SET
	id_marxa = 2
QUERY;
        // $this->Execute( $sql ) executes all kind of queries that need write in database.
        $this->Execute($sql);

    }
}

?>