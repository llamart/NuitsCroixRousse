<?php

namespace NuitsCroixRousse\DAO;

use NuitsCroixRousse\Domain\Concert;

class ConcertDAO extends DAO
{
    /**
     * @var \GSB\DAO\FamilyDAO
     */
   // ...

    /**
     * @var \MicroCMS\DAO\UserDAO


    /**
     * Returns the list of all drugs, sorted by trade name.
     *
     * @return array The list of all drugs.
     */
    public function findAll() {
        $sql = "select * from t_concert order by conc_artist";
        $result = $this->getDb()->fetchAll($sql);
        
        // Converts query result to an array of domain objects
        $concerts = array();
        foreach ($result as $row) {
            $concertId = $row['conc_id'];
            $concerts[$concertId] = $this->buildDomainObject($row);
        }
        return $concerts;
    }

    /**
     * Returns the list of all drugs for a given family, sorted by trade name.
     *
     * @param integer $familyDd The family id.
     *
     * @return array The list of drugs.
     */
    public function findAllByGenre($genreId) {
        $sql = "select * from t_concert where gen_id=? order by trade_name";
        $result = $this->getDb()->fetchAll($sql, array($genreId));
        
        // Convert query result to an array of domain objects
        $concerts = array();
        foreach ($result as $row) {
            $concertId = $row['drug_id'];
            $concerts[$concertId] = $this->buildDomainObject($row);
        }
        return $concerts;
    }

    /**
     * Returns the drug matching a given id.
     *
     * @param integer $id The drug id.
     *
     * @return \GSB\Domain\Drug|throws an exception if no drug is found.
     */
    public function find($id) {
        $sql = "select * from t_concert where conc_id=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("No concert found for id " . $id);
    }

    /**
     * Creates a Drug instance from a DB query result row.
     *
     * @param array $row The DB query result row.
     *
     * @return \GSB\Domain\Drug
     */
    protected function buildDomainObject($row) {
        $genreId = $row['gen_id'];
        $genre = $this->GenreDAO->find($genreId);

      
        
        $concert = new Concert();
        $concert->setArtist($row['conc_artist']);
        $concert->setDate($row['conc_date']);
        $concert->setDescription($row['conc_description']);
        $concert->setGenre($row['gen_id']);
        $concert->setId($row['conc_id']);
        $concert->setPlace($row['conc_place']);
        $concert->setPrice($row['conc_price']);
        return $concert;
    }
    
}