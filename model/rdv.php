<?php
class rdv
{
	private $pdo;
    
    public $id;
    public $prenom;
    public $nom;  
    public $adresse;
    public $telephone;
	public $doctor;

	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Database::StartUp();     
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Lister()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM rdv");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtenir($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM rdv WHERE id = ?");
			          

			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Supprimer($id)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM rdv WHERE id = ?");			          

			$stm->execute(array($id));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Maj($data)
	{
		try 
		{
			$sql = "UPDATE rdv SET 
						
						prenom          = ?, 
						nom        = ?,
                        adresse        = ?,
                        telephone        = ?,
						doctor      = ?
						
				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
				    	
                        $data->prenom,                        
                        $data->nom,
                        $data->adresse,
                        $data->telephone, 
						$data->doctor, 
                        $data->id
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Creer(rdv $data)
	{
		try 
		{
		$sql = "INSERT INTO rdv (prenom,nom,adresse,telephone,doctor) 
		        VALUES (?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
					
                    $data->prenom,
                    $data->nom, 
                    $data->adresse, 
                    $data->telephone,
					$data->doctor
                   
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}