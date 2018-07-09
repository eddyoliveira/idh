<?php

namespace idh\Model;

use \idh\DB\Sql;
use \idh\Model;
use \idh\Mailer;

class Documentos extends Model {
    
    public static function listAll()
    {
        
        $sql = new Sql();
        
        return $sql->select("SELECT * FROM prestacao ORDER BY cidade");
    }
    
    public function save()
    {
        $sql = new Sql();
        
        $results = $sql->select("CALL sp_documentos_save( :cidade, :periodo, :tipo, :setor, :arquivo)", array(
            /*":id"=>$this->getid(),*/
            ":cidade"=>$this->getcidade(),
            ":periodo"=>$this->getperiodo(),
            ":tipo"=>$this->gettipo(),
            ":setor"=>$this->getsetor(),
            ":arquivo"=>$this->getarquivo('image'),
        ));
        
        $this->setData($results[0]);
    }
    
    public function get($id)
    {
        
        $sql = new Sql();
        
        $results = $sql->select("SELECT * FROM prestacao WHERE id = :id", [
            ':id'=>$id
        ]);
        
        $this->setData($results[0]);
    }
    
    public function delete()
    {
        
        $sql = new Sql();
        
        $sql->query("DELETE FROM prestacao WHERE id = :id", [
            ':id'=>$this->getid()
        ]);
    }
    
    public function getValues()
    {
        
        $values = parent::getValues();
        
        return $values;
    }
    
    public function setPhoto($file)
    {
        $dist = $$_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR .
            "res" . DIRECTORY_SEPARATOR .
            "site" . DIRECTORY_SEPARATOR .
            "upload" . DIRECTORY_SEPARATOR .
            $this->getid() . ".jpg";
        
        imagejpeg($image, $dist);
        imagedestroy($image);
    }
}

?>