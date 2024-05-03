<?php
require_once '../../model/rdv.php';

class RdvController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Rdv();
    }
    
    public function Index(){
        require_once '../../view/header.php';
        require_once '../../view/rdv/rdv.php';
        require_once '../../view/footer.php';

       
    }
    
    public function Crud(){
        $rdv = new Rdv();
        
        if(isset($_REQUEST['id'])){
            $rdv = $this->model->Obtenir($_REQUEST['id']);
        }
        
        require_once '../../view/header.php';
        require_once '../../view/rdv/rdv-editer.php';
        require_once '../../view/footer.php';

        
    }
    
    public function Enregistrer(){
        $rdv = new Rdv();
        
        $rdv->id = $_REQUEST['id'];
        $rdv->prenom = $_REQUEST['prenom'];
        $rdv->nom = $_REQUEST['nom'];
        $rdv->adresse = $_REQUEST['adresse'];  
        $rdv->telephone = $_REQUEST['telephone'];    
        $rdv->doctor = $_REQUEST['doctor'];

        $rdv->id > 0 
            ? $this->model->Maj($rdv)
            : $this->model->Creer($rdv);
        
        header('Location: index.php');
    }
    
    public function Supprimer(){
        $this->model->Supprimer($_REQUEST['id']);
        header('Location: index.php');
    }
}