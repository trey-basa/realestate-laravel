<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Listings extends Model
{
    protected $table = 'listings';
    protected $fillable = array('owner_id', 'mls_id', 'comment', 'collection_ids');
}
