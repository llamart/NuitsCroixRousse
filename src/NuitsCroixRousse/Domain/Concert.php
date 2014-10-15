<?php 


namespace NuitsCroixRousse\Domain;

class Concert
{
      /**
     * Concert id.
     *
     * @var integer
     */
    private $id;
    
        /**
     * Drug id.
     *
     * @var integer
     */
    private $artist;

    /**
     * Drug id.
     *
     * @var integer
     */
    private $date;
    /**
     * Drug id.
     *
     * @var integer
     */
    private $place;
    /**
     * Drug id.
     *
     * @var integer
     */
    private $description;
    /**
     * Drug id.
     *
     * @var integer
     */
    private $price;
        /**
     * Drug id.
     *
     * @var integer
     */
    private $genre;

  
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function getArtist(){
        return $this->artist;
    }
    public function setArtist($artist){
        $this->artist = $artist;
    }
    public function getDate(){
        return $this->date;
    }
    public function setDate($date){
        $this->date =$date;
    }
    public function getPlace(){
        return $this->place;
    }
    public function setPlace($place){
        $this->place = $place;
    }
    public function getDescription(){
        return $this->description;
    }
    public function setDescription($description){
        $this->description =$description;
    }
    public function getPrice(){
        return $this->price;
    }
    public function setPrice($price){
        $this->price=$price;
    }
    public function getGenre(){
        return $this->genre;
    }
    public function setGenre($genre){
        $this->genre = $genre;
    }
}