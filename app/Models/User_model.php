<?php

namespace App\Models;

use CodeIgniter\Model;

class User_model extends Model
{

    protected $table = 'userwiki';

    protected $primaryKey = 'IdUser';

    protected $allowedFields = ['EMail', 'UserName', 'Password'];

    protected $returnType    = 'App\Entities\User_entity';

    protected $useTimestamps = false;
}