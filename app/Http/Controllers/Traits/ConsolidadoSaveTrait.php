<?php namespace App\Http\Controllers\Traits;

trait ConsolidadoSaveTrait {

    private function prepareToStore($validated)
    {
        return array(
            'numero'     => $validated['numero'],
            'tarimas'    => $validated['tarimas'],
            'notas'      => $validated['notas'],
            'cerrado'    => isset($validated['cerrado']) ? 1 : 0,
            'cliente_id' => $validated['cliente'],
            'created_by_user' => 1,
            'updated_by_user' => 1,
        );
    }

    private function prepareToUpdate($validated)
    {
        return array(
            'numero'     => $validated['numero'],
            'tarimas'    => $validated['tarimas'],
            'notas'      => $validated['notas'],
            'cerrado'    => isset($validated['cerrado']) ? 1 : 0,
            'cliente_id' => $validated['cliente'],
            'updated_by_user' => rand(1,10),
        );
    }

    private function routeAfterStore($option, $consolidado_id)
    {
        switch( $option )
        {
            case 2:
                return route('entradas.create', ['consolidado' => $consolidado_id]);
                break;
            case 1:
                return route('consolidados.create');
                break;
            default:
                return route('consolidados.index');
        }
    }
}