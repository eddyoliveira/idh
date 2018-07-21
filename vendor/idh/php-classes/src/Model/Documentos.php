<?php

namespace idh\Model;

use \idh\DB\Sql;
use \idh\Model;
use \idh\Mailer;

class Documentos extends Model {
    
    public static function listAll()
    {
        
        $sql = new Sql();
        
        return $sql->select("SELECT * FROM documentos ORDER BY cidade");
    }
    
    public function save()
    {
        $sql = new Sql();
        
        $results = $sql->select("CALL sp_documentos_save(:id, :cidade, :periodo,  :tipo, :setor, :arquivo)", array(
            ":id"=>$this->getid(),
            ":cidade"=>$this->getcidade(),
            ":periodo"=>$this->getperiodo(),
            ":tipo"=>$this->gettipo(),
            ":setor"=>$this->getsetor(),
            ":arquivo"=>$this->getarquivo(),
        ));
        
        if(isset($results[0]) && !empty($results[0])){
        $this->setData($results[0]);
        }
    }
    
    public function get($id)
    {
        
        $sql = new Sql();
        
        $results = $sql->select("SELECT * FROM documentos WHERE id = :id", [
            ':id'=>$id
        ]);
        
        $this->setData($results[0]);
    }
    
    public function delete()
    {
        
        $sql = new Sql();
        
        $sql->query("DELETE FROM documentos WHERE id = :id", [
            ':id'=>$this->getid()
        ]);
    }
    
   /* public function checkPhoto()
    {
        if(file_exists(
        $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR .
            "res" . DIRECTORY_SEPARATOR .
            "site" . DIRECTORY_SEPARATOR .
            "upload" . DIRECTORY_SEPARATOR .
            $this->getcidade() . ".jpg"
        )) {
            
            $url = "/res/site/upload/" . $this->getcidade() . ".jpg";
        }
        
        $this->setarquivo($url);
    }*/
    
    
    
    /*public function getValues()
    {
        
        $this->chekPhoto();
        
        $values = parent::getValues();
        
        return $values;
    }*/
    
    public function setPhoto($file) 
    {
        $extension = explode('.', $file['name']);
        $extension = end($extension);
        
        switch ($extension) {
                case "jpg":
                $image = '';
            case "jpeg":
                $image = '';
                $image = imagecreatefromjpeg($file["tmp_name"]);
                break;
        }
        
        $dist = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR .
            "res" . DIRECTORY_SEPARATOR .
            "site" . DIRECTORY_SEPARATOR .
            "upload" . DIRECTORY_SEPARATOR .
            /*$this->arquivo($this->getarquivo()) . ".jpg";*/
            $file['name']  = md5(time()).".".$extension;
            
            
        
            
        
        imagejpeg($image, $dist);
        imagedestroy($image);
        
              
        
        $this->checkPhoto();
        
        return $file['name'];
    }
}

?>