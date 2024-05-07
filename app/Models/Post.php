<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
    ];
    public function allData()
    {
        return $this->db->table('post');
    }
    public function create()
    {
        $this->db->table('post')
        ->insert($post);
    }
}