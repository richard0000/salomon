@if (! $diezmos->isEmpty())
    <table class="w3-table-all w3-card-4">
        <!--table header-->
        <tr>
            <th>Fecha</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Tel&eacute;fono</th>
            <th>Importe</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
        </tr>
        <!--table body-->
        @foreach($diezmos as $diezmo)
            <tr class="w3-hover-grey">
                <td>{{ $diezmo->fecha->diffForHumans() .  ' (' . $diezmo->fecha->format('d-m-Y') . ')' }}</td>
                <td>{{ $diezmo->persona['nombre'] }}</td>
                <td>{{ $diezmo->persona['apellido'] }}</td>
                <td>{{ $diezmo->persona['telefono1'] }}</td>
                <td>{{ $diezmo->importe }}</td>
                <td>
                    {!! Form::open([
                        'method' => 'GET',
                        'route' => ['diezmos.edit', $diezmo->id]                                
                    ]) !!}
                        {!! Form::button('<i class="fa fa-pencil"></i>', ['class' => 'w3-btn w3-btn-floating w3-blue', 'type' => 'submit']) !!}
                    {!! Form::close() !!}   
                </td>
                <td>
                    <!-- trigger the modal with a button -->
                    {!! Form::button('<i class="fa fa-trash"></i>', ['id' => 'w3-open-delete', 'class' => 'w3-btn w3-btn-floating w3-red btn-delete', 'data-id' => $diezmo->id, 'data-toggle' => 'modal', 'data-target' => '#modal-delete']) !!}
                </td>
            </tr>
        @endforeach

        {{ $diezmos->render() }}
    </table>
    <p></p>
@else
    @include('partials.nocontent')
@endif