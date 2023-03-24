<?php

namespace App\Models;

use CodeIgniter\Model;

class MoodModel extends Model
{
    protected $table = 'mood';

    protected $allowedFields = ['datum', 'mood','user','plekken'];

    // Zorgt ervoor dat de moods ordered zijn
    public function getMood()
    {
        $user = auth()->user();
        $db = db_connect();
        $sql = "SELECT * FROM `mood` ORDER BY datum ASC;";

        $selection =$db->query($sql);

        return $selection->getResult();

        // return $this->where(['user' => $user->id])->find();
    }
    
    // public function getAverage()
    // {
    //     $user = auth()->user();
    //     $db = db_connect();
    //     $sql = "SELECT AVG(mood) AS average FROM mood";

    //     $selection =$db->query($sql);

    //     return $selection->getResult();

    //     // return $this->where(['user' => $user->id])->find();
    // }
}