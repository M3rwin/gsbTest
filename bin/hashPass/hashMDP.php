<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

$pdo = new PDO('mysql:host=localhost;dbname=gsb_test','userGsbTest', 'secret');
$pdo->query('SET CHARACTER SET utf8');

//Recup Visiteurs
$requete = $pdo->query('SELECT id, mdp FROM visiteur');
$requete->execute();
$lesVisiteurs = $requete->fetchAll(PDO::FETCH_OBJ);
foreach($lesVisiteurs as $unVisiteur){
    $hashMdp = password_hash($unVisiteur->mdp, PASSWORD_DEFAULT);
    $id = $unVisiteur->id;
    $requetePrepare = $pdo->prepare('UPDATE visiteur SET mdp= :hashMdp WHERE id= :unId');
    $requetePrepare->bindParam(':hashMdp', $hashMdp, PDO::PARAM_STR);
    $requetePrepare->bindParam(':unId', $id, PDO::PARAM_STR);
    $requetePrepare->execute();
}