@if (! $iglesias->isEmpty())
    <table class="w3-table-all w3-card-4">
        <!--table header-->
        <tr>
            <th>Nombre</th>
            <th>Direcci&oacute;n</th>
            <th>Tel&eacute;fono 1</th>
            <th>Tel&eacute;fono 2</th>
            <th>Tel&eacute;fono 3</th>
            <th>Email</th>
            <th>Pastor</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
        </tr>
        <!--table body-->
        @foreach($iglesias as $iglesia)
            <tr class="w3-hover-grey">
                <td>{{ $iglesia->nombre }}</td>
                <td>{{ $iglesia->direccion }}</td>
                <td>{{ $iglesia->telefono1 }}</td>
                <td>{{ $iglesia->telefono2 }}</td>
                <td>{{ $iglesia->telefono3 }}</td>
                <td>{{ $iglesia->email }}</td>
                <td>
                    @if($iglesia->pastor !== null)
                        {{ $iglesia->pastor->nombre . ' ' . $iglesia->pastor->apellido }}
                    @else @endif
                </td>

                <td>
                    {!! Form::open([
                        'method' => 'GET',
                        'route' => ['iglesias.edit', $iglesia->id]                                
                    ]) !!}
                        {!! Form::button('<i class="fa fa-pencil"></i>', ['class' => 'w3-btn w3-btn-floating w3-blue', 'type' => 'submit']) !!}
                    {!! Form::close() !!}   
                </td>
                <td>
                    <!-- trigger the modal with a button -->
                    {!! Form::button('<i class="fa fa-trash"></i>', ['id' => 'w3-open-delete', 'class' => 'w3-btn w3-btn-floating w3-red btn-delete', 'data-id' => $iglesia->id, 'data-toggle' => 'modal', 'data-target' => '#modal-delete']) !!}
                </td>
            </tr>
        @endforeach

        {{ $iglesias->render() }}
    </table>
    <p></p>
@else
    @include('partials.nocontent')
@endif