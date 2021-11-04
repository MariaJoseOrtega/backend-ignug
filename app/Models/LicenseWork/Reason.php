<?php

namespace  App\Models\LicenseWork;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reason extends Model
{
    use HasFactory;
    protected $table ='license_work.reasons';

    protected $fillable = [
        'name',
        'description_one',
        'description_two',
        'discountable_holidays',
        'days_min',
        'days_max',
    ];

     // Scopes
     public function scopeName($query, $name)
     {
         if ($name) {
             return $query->orWhere('name', 'ILIKE', "%$name%");
         }
     }
     public function scopeDescriptionOne($query, $description_one)
     {
         if ($description_one) {
             return $query->orWhere('description_one', 'ILIKE', "%$description_one%");
         }
     }

     public function scopeDescriptionTwo($query, $description_two)
     {
         if ($description_two) {
             return $query->orWhere('scopeDescriptionTwo', 'ILIKE', "%$description_two%");
         }
     }

     public function scopeCustomOrderBy($query, $sorts)
     {
         if (!empty($sorts[0])) {
             foreach ($sorts as $sort) {
                 $field = explode('-', $sort);
                 if (empty($field[0]) && in_array($field[1], $this->fillable)) {
                     $query = $query->orderByDesc($field[1]);
                 } else if (in_array($field[0], $this->fillable)) {
                     $query = $query->orderBy($field[0]);
                 }
             }
             return $query;
         }
     }

     public function scopeCustomSelect($query, $fields)
     {
         if (!empty($fields)) {
             $fields = explode(',', $fields);
             foreach ($fields as $field) {
                 $fieldExist = array_search(strtolower($field), $fields);
                 if ($fieldExist == false) {
                     unset($fields[$fieldExist]);
                 }
             }

             array_unshift($fields, 'id');
             return $query->select($fields);
         }
     }

}

