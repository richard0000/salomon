@if (! $idiomas->isEmpty())
    <table class="w3-table-all w3-card-4">
        <!--table header-->
        <tr>
            <th>Nombre</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
        </tr>
        <!--table body-->
        @foreach($idiomas as $idioma)
            <tr class="w3-hover-grey">
                <td>{{ $idioma->descripcion }}</td>
                <td>
                    <!-- trigger the modal with a button -->
                    {!! Form::button('<i class="fa fa-pencil"></i>', ['id' => 'w3-open-edit', 'class' => 'w3-btn w3-btn-floating w3-blue btn-edit', 'data-id' => $idioma->id, 'data-toggle' => 'modal', 'data-target' => '#modal-edit']) !!}   
                </td>
                <td>
                    <!-- trigger the modal with a button -->
                    {!! Form::button('<i class="fa fa-trash"></i>', ['id' => 'w3-open-delete', 'class' => 'w3-btn w3-btn-floating w3-red btn-delete', 'data-id' => $idioma->id, 'data-toggle' => 'modal', 'data-target' => '#modal-delete']) !!}
                </td>
            </tr>
        @endforeach

        {{ $idiomas->render() }}
    </table>
    <p></p>
@else
    @include('partials.nocontent')
@endif