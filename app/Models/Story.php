<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Story extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable =[
      'title' , 'body' , 'type' , 'status'
    ];


    public function user(){
        return $this->belongsTo(\App\Models\User::class);
    }

     protected static function booted()
     {
     static::addGlobalScope('active', function (Builder $builder) {
         $builder->where('status', 1);
    });

    }

    public function getTitleAttribute($value){
        return ucfirst($value);
    }

      public function getUploadedTimeAttribute(){
        return $this->type . 'type created at ' . date('y-m-d' , strtotime($this->created_at));
      }

       public function setTitleAttribute($value){
            $this->attributes['title'] = $value;
            $this->attributes['slug'] = Str::slug($value);
       }

}