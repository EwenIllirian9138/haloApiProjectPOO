<?php

namespace App\Models;

use CodeIgniter\Model;

class SuperHeroes_model extends Model
{

    protected $table = 'superhero';

    protected $primaryKey = 'IdSuperHero';

    protected $allowedFields = ['Name', 'AlterEgo', 'Aliases', 'PlaceOfBirth','FirstAppearance','Alignment','ImageLink'];

    protected $returnType    = 'App\Entities\SuperHeroes_entity';

    protected $useTimestamps = false;
}