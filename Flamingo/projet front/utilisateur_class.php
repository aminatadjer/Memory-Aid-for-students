<?php

class Utilisateur 
{
    private $_id;
    private $_prenom;
    private $_tel;
    private $_pwd;
    private $_pwdConfirm;
    private $mail;
    private $_nom;

  public function __construct(array $data) {
        $this->hydrate($data);
    }
 
    public function hydrate(array $data) {
        foreach ($data AS $k => $v) {
            $methode = 'set' . ucfirst(strtolower($k));
            if (method_exists($this, $methode)) {
                $this->$method($v);
            }
        }
    }

  public function getNom() {
        return $this->nom;
    }
 
    public function getPrenom() {
        return $this->prenom;
    }
     public function getMail() {
        return $this->mail;
    }
 
    public function getTel() {
        return $this->tel;
    }
 
 public function getPwd() {
        return $this->pwd;
    }
 
    public function getPwdConfirm() {
        return $this->pwdConfirm;
    }
 
 

  }


?>
