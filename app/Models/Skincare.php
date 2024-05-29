<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use OpenApi\Annotations as OA;

/** 
 * Class Skincare.
 * 
 * @author Willy <willy.422023024@civitas.ukrida.ac.id>
 * 
 * @OA\Schema(
 *     description="Skincare model",
 *     title="Skincare model",
 *     required={"nama", "brand"},
 *     @OA\Xml(
 *         name="Skincare"
 *     )
 * )
 */
class Skincare extends Model
{
    // use HasFactory;
    use SoftDeletes;
    protected $table='skincare';
    protected $fillable=[
        'nama',
        'brand',
        'category',
        'price',
        'stock',
        'description',
        'images',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
        'deleted_at',
        'deleted_by',
    ];
    
    public function data_adder(){
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}