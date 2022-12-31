<?php 

namespace MF\Model;

class Model {

    protected $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }


}

?>