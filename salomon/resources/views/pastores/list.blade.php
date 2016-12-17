@if (! $pastores->isEmpty())
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
        @foreach($pastores as $pastor)
            <tr class="w3-hover-grey">
                <td>{{ $pastor->nombre }}</td>
                <td>{{ $pastor->apellido }}</td>
                <td>{{ $pastor->telefono1 }}</td>
                <td>{{ $pastor->direccion }}</td>
                <td>
                    {!! Form::open([
                        'method' => 'GET',
                        'route' => ['pastores.edit', $pastor->id]                                
                    ]) !!}
                        {!! Form::button('<i class="fa fa-pencil"></i>', ['class' => 'w3-btn w3-btn-floating w3-blue', 'type' => 'submit']) !!}
                    {!! Form::close() !!}   
                </td>
                <td>
                    <!-- trigger the modal with a button -->
                    {!! Form::button('<i class="fa fa-trash"></i>', ['id' => 'w3-open-delete', 'class' => 'w3-btn w3-btn-floating w3-red btn-delete', 'data-id' => $pastor->id, 'data-toggle' => 'modal', 'data-target' => '#modal-delete']) !!}
                </td>
            </tr>
        @endforeach

        {{ $pastores->render() }}
    </table>
    <p></p>
@else
    @include('partials.nocontent')
@endif