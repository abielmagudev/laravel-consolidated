<?php

namespace App;

use App\Ahex\Fake\Domain\Fakeuser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Ahex\Zkeleton\Domain\ModifiersTrait as Modifiers;
use App\Ahex\Suppliers\Slugger\Slugger;

class Etapa extends Model
{
    use SoftDeletes, Modifiers;
    
    protected $fillable = [
        'nombre',
        'slug',
        'orden',
        'realiza_medicion',
        'unica_medida_peso',
        'unica_medida_volumen',
        'created_by',
        'updated_by',
    ];

    public function zonas()
    {
        return $this->hasMany(Zona::class);
    }

    public function scopeSlug($query, $slug)
    {
        return $query->where('slug', $slug)->first();
    }

    public static function prepare($validated)
    {
        $slugger = new Slugger;

        $prepared = [
            'nombre' => $validated['nombre'],
            'slug' => $slugger->kebab($validated['nombre']),
            'orden' => $validated['orden'],
            'realiza_medicion' => $validated['realiza_medicion'] ? 1 : 0,
            'unica_medida_peso' => isset($validated['unica_medida_peso']) ? $validated['unica_medida_peso'] : null,
            'unica_medida_volumen' => isset($validated['unica_medida_volumen']) ? $validated['unica_medida_volumen'] : null,
            'updated_by' => Fakeuser::live(),
        ];

        if( request()->isMethod('post') )
            $prepared['created_by'] = Fakeuser::live();

        return $prepared;
    }
}
