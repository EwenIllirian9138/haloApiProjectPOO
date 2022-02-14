<?php

namespace App\Models;
use CodeIgniter\Model;

class Product_model extends Model
{
    // Nom de la table à utiliser
    protected $table         = 'product';
    // Nom du champ de la clé primaire
    protected $primaryKey    = 'product_id';
    // Champs utilisables
    protected $allowedFields = ['product_name', 'product_price'];

    // Type de retour => Chemin de l'entité à utiliser
    protected $returnType    = 'App\Entities\Product_entity';

    // Utilisation ou non des dates (création / modification)
    protected $useTimestamps = false;

}