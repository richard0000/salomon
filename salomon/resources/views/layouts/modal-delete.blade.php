<div id="modal-delete" class="w3-modal w3-animate-opacity">
    <div class="w3-modal-content w3-card-8">
        <header class="w3-container w3-teal"> 
            <span id="w3-close-delete" class="w3-closebtn">&times;</span>
            <h2>Usted est&aacute; a punto de eliminar contenido</h2>
        </header>
        <div class="w3-container">
            <p>Confirma que desea eliminar el contenido seleccionado?</p>
            @yield('modal-delete-content')
        </div>
    </div>
</div>