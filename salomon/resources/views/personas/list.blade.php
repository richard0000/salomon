@if (! $personas->isEmpty())
    <table class="w3-table-all w3-card-4">
        <!--table header-->
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Tel&eacute;fono</th>
            <th>Direcci&oacute;n</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
        </tr>
        <!--table body-->
        @foreach($personas as $persona)
            <tr class="w3-hover-grey">
                <td>{{ $persona->nombre }}</td>
                <td>{{ $persona->apellido }}</td>
                <td>{{ $persona->telefono1 }}</td>
                <td>{{ $persona->direccion }}</td>
                <td>
                    {!! Form::open([
                        'method' => 'GET',
                        'route' => ['personas.edit', $persona->id]                                
                    ]) !!}
                        {!! Form::button('<i class="fa fa-pencil"></i>', ['class' => 'w3-btn w3-btn-floating w3-blue', 'type' => 'submit']) !!}
                    {!! Form::close() !!}   
                </td>
                <td>
                    <!-- trigger the modal with a button -->
                    {!! Form::button('<i class="fa fa-trash"></i>', ['id' => 'w3-open-delete', 'class' => 'w3-btn w3-btn-floating w3-red btn-delete', 'data-id' => $persona->id, 'data-toggle' => 'modal', 'data-target' => '#modal-delete']) !!}
                </td>
            </tr>
        @endforeach

        {{ $personas->render() }}
    </table>
    <p></p>
@else
    @include('partials.nocontent')
@endif