<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    use HasFactory;

    protected $table = 'vacancy';
    protected $fillable = ['title', 'position', 'status_id', 'company_name', 'created_at', 'updated_at', 'status_assigned_at'];
    protected $dates = ['status_assigned_at'];

    public function status() {
        return $this->belongsTo(Status::class);
    }
}
