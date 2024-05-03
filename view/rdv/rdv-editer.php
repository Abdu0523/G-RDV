<div style="height: 4vw"></div>
<div class="container">
    <div class="row">
    <h1 class="page-header">
    <?php echo $rdv->id != null ? $rdv->telephone : 'Nouvel Enregistrement'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=rdv">Rendez-vous</a></li>
  <li class="active"><?php echo $rdv->id != null ? $rdv->doctor : 'Nouveau Rendez-vous'; ?></li>
</ol>

<form id="frm-alumno" action="?c=rdv&a=Enregistrer" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $rdv->id; ?>" />
      <div class="form-group">
        <label>Doctor - Département</label>
        <select name="doctor" id="doctor" class="form-control">
                <option value="">Sélectionnez un Docteur</option>
                <option value="Dr Aicha Department 1">Dr Aicha Dentiste</option>
                <option value="Dr Moussa Department 2">Dr Moussa Pediatrie</option>
                <option value="Dr Penda Department 3">Dr Penda Cardiologie</option>
              </select>
    </div>
    
    <div class="form-group">
        <label>Prénom</label>
        <input type="text" name="prenom" value="<?php echo $rdv->prenom; ?>" class="form-control" placeholder="Prénom" required>
    </div>
    
    <div class="form-group">
        <label>Nom</label>
        <input type="text" name="nom" value="<?php echo $rdv->nom; ?>" class="form-control" placeholder="Nom" required>
    </div>
    
    <div class="form-group">
        <label>Adresse</label>
        <input type="text" name="adresse" value="<?php echo $rdv->adresse; ?>" class="form-control" placeholder="Adresse" required>
    </div>
     <div class="form-group">
        <label>Téléphone</label>
        <input type="text" name="telephone" value="<?php echo $rdv->telephone; ?>" class="form-control" placeholder="Téléphone" required>
    </div>
        
    
    <hr />
    
    <div class="text-right">
        <button class="btn btn-primary">Enregistrer</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-alumno").submit(function(){
            return $(this).validate();
        });
    })
</script>
    </div>
</div>