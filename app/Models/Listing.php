<?php
//tags column in the database is a string column, so we can use the like operator to search for tags in the tags column.
namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Listing extends Model
{
    use HasFactory;

    //protected $fillable = ['type', 'pickup', 'dropoff', 'phone', 'datetime', 'passengers', 'tags', 'description']; //mass assignment

    //Relationship To User
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeFilter ($query, array $filters) {
        if($filters['tag'] ?? false) {
            $query->where('tags', 'like', '%' . request('tag') . '%');
        }

        if($filters['search'] ?? false) {
            $query->where('pickup', 'like', '%' . request('search') . '%') 
                ->orwhere('dropoff', 'like', '%' . request('search') . '%')
                ->orwhere('description', 'like', '%' . request('search') . '%')
                ->orwhere('tags', 'like', '%' . request('search') . '%');
        }
    }
}
