@component('components.modal-confirm-delete', [
    'action' => route('entradas.destroy', $entrada),
    'button_text'  => 'Si, eliminar entrada',
    'trigger_text' => 'Eliminar entrada',
])
    @slot('warning')
    <p>Deseas eliminar entrada <b>{{ $entrada->numero }}</b>?</p>
    @endslot
@endcomponent