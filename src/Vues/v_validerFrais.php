<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
echo 'ça marche valider frais mon pote';
?>
        <link href="./styles/bootstrap/bootstrap-comptable.css" rel="stylesheet" type="text/css"/>

<hr>

<div class="row">
    
    <div class="col-md-4">
        <form action="index.php?uc=etatFrais&action=voirEtatFrais" 
              method="post" role="form">
            <div class="form-group">
                <label for="lstMois" accesskey="n">Choisir le visiteur : </label>
                <select id="lstMois" name="lstMois" class="form-control">
                    <?php
                    foreach ($visiteur as $idVisiteur) {
                        
                        if ($visiteur == $VisiteurASelectionner) {
                            ?>
                            <option selected value="<?php echo $visiteur ?>">
                                <?php echo $nomvisiteur . $prenomvisiteur ?> </option>
                            <?php
                        } else {
                            
                        }
                    }
                    ?>    

                </select>
            </div>

            <div class="form-group">
                <label for="lstMois" accesskey="n">Mois : </label>
                <select id="lstMois" name="lstMois" class="form-control">
                    <?php
                    foreach ($lesMois as $unMois) {
                        $mois = $unMois['mois'];
                        $numAnnee = $unMois['numAnnee'];
                        $numMois = $unMois['numMois'];
                        if ($mois == $moisASelectionner) {
                            ?>
                            <option selected value="<?php echo $mois ?>">
                                <?php echo $numMois . '/' . $numAnnee ?> </option>
                            <?php
                        } else {
                            ?>
                            <option value="<?php echo $mois ?>">
                                <?php echo $numMois . '/' . $numAnnee ?> </option>
                            <?php
                        }
                    }
                    ?>    

                </select>
            </div>
           
        </form>
        
    </div>
    
</div>

<div class="panel panel-info">
        <div class="panel-heading">Descriptif des éléments hors forfait</div>
        <table class="table table-bordered table-responsive">
            <thead>
                <tr>
                    <th class="date">Date</th>
                    <th class="libelle">Libellé</th>  
                    <th class="montant">Montant</th>  
                    <th class="action">&nbsp;</th> 
                </tr>
            </thead>  
            <tbody>
            <?php
            foreach ($lesFraisHorsForfait as $unFraisHorsForfait) {
                $libelle = htmlspecialchars($unFraisHorsForfait['libelle']);
                $date = $unFraisHorsForfait['date'];
                $montant = $unFraisHorsForfait['montant'];
                $id = $unFraisHorsForfait['id']; ?>           
                <tr>
                    <td> <?php echo $date ?></td>
                    <td> <?php echo $libelle ?></td>
                    <td><?php echo $montant ?></td>
                    <td>
                        <button class="btn btn-success" type="submit">Corriger</button>
                <button class="btn btn-danger" type="reset">Réinitialiser</button> 
                        
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>  
        </table>
    </div>


<!--
<div class="panel panel-info">
    <div class="panel-heading" style="color: white; background-color: #df6900 ">Descriptif des éléments hors forfait 
    <table class="table table-bordered table-responsive" style="color : black; background-color: white;">
        <tr>
            <th class="date">Date</th>
            <th class="libelle">Libellé</th>
            <th class='montant'>Montant</th>                
        </tr>
        <?php
        foreach ($lesFraisHorsForfait as $unFraisHorsForfait) {
            $date = $unFraisHorsForfait['date'];
            $libelle = htmlspecialchars($unFraisHorsForfait['libelle']);
            $montant = $unFraisHorsForfait['montant']; ?>
            <tr>
                <td><?php echo $date ?></td>
                <td><?php echo $libelle ?></td>
                <td><?php echo $montant ?></td>
            </tr>
            <?php
        }
        ?>
    </table>
</div> 
-->