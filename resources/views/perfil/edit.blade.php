<!--php -->

<?php   
$primeraLetra = strtoupper(substr($user->name, 0, 1));

$rutaImagen = "assets/images/fotoPerfilSmall/{$primeraLetra}.png";

?>

<!--php -->

<style>
    .card-body h1 {
        color: white; 
    }
    .card-body h5 {
        color: white;
    }

    .card-body p {
        color: white;
    }

    .card-body h3 {
        color: white;
    }

    .card-body {
        border-radius: 4px;
        border: 2px;
        border-style: solid;
    }

    #mostrarTelefono {
        width: 215px;
    }

    #mostrarDescripcion {
        width: 235px;
    }

    #superior {
        /* Permalink - use to edit and share this gradient: https://colorzilla.com/gradient-editor/#2bbfe4+0,eaecc6+100 */ background: #2bbfe4; /* Old browsers */ background: -moz-linear-gradient(left, #2bbfe4 0%, #eaecc6 100%); /* FF3.6-15 */ background: -webkit-linear-gradient(left, #2bbfe4 0%,#eaecc6 100%); /* Chrome10-25,Safari5.1-6 */ background: linear-gradient(to right, #2bbfe4 0%,#eaecc6 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */ filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#2bbfe4', endColorstr='#eaecc6',GradientType=1 ); /* IE6-9 */        padding: 20px;

    }

    #infoicons {
        margin-right: 10px;
    }

    /* ----------------------------------------------
  Generated by AnimatiSS
  Licensed under FreeBSD License
  URL: https://xsgames.co/animatiss
  Twitter: @xsgames_
---------------------------------------------- */

.shadow-drop-center{animation:shadow-drop-center 0.4s linear both} @keyframes shadow-drop-center{0%{box-shadow:0 0 0 0 transparent}100%{box-shadow:0 0 20px 0 rgba(173, 216, 230, 115)}}

/* ----------------------------------------------
  Generated by AnimatiSS
  Licensed under FreeBSD License
  URL: https://xsgames.co/animatiss
  Twitter: @xsgames_
---------------------------------------------- */

.tracking-in-expand-forward-top{animation:tracking-in-expand-forward-top 0.4s linear both} @keyframes tracking-in-expand-forward-top{0%{letter-spacing:-.2em;transform:translateZ(-700px) translateY(-100px);opacity:0}40%{opacity:.6}100%{transform:translateZ(0) translateY(0);opacity:1}}

</style>
@extends('layouts.admin')
{{-- resources/views/perfil/index.blade.php --}}


@section('content')
    
    @if(session('successEdit'))
                    <div id="successAlertEdit" class="alert alert-success alert-dismissible bg-success text-white alert-label-icon fade show" role="alert">
                        <i class="ri-notification-off-line label-icon"></i><strong>Éxito</strong> - Su perfil ha sido editado correctamente
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
    @endif
    @if ($user)
    <div class="row">
        <div class="col-xl-3">
            <div class="card tracking-in-expand-forward-top">
                <div class="card-body text-center" style="background-color: #405189; align-items: center;" id="superior">
                    @if (empty($user->foto))
                    {{-- Obtener la primera letra del nombre del usuario en mayúsculas --}}
                    <?php $primeraLetra = strtoupper(substr($user->name, 0, 1)); ?>
                
                    {{-- Mostrar la imagen de la letra correspondiente --}}
                    <img src="{{ asset('assets/images/fotoPerfilSmall/'.$primeraLetra.'.png') }}" alt="Letra de perfil" style="width: 140px; height: 140px; border-radius: 50%;">
                    @else
                    {{-- Mostrar la foto de perfil --}}
                    <img src="{{ asset('storage/assets/images/'.$user->foto) }}" alt="Foto de perfil" style="width: 140px; height: 140px; border-radius: 50%;">
                    @endif                    
                    <h1>{{ $user->name }}</h1>
                    <form method="POST" action="{{ route('perfil.destroy', $user->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger"><i class="fa-solid fa-circle-xmark" style="font-size: 20px;"></i></button>
                        <h5>eliminar foto de perfil</h5>
                    </form>
                </div>
            </div>
        </div>
    <div class="col-xl-6 tracking-in-expand-forward-top">
            <h1>edita tu Información</h1>
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('perfil.update', $user->id) }}" enctype="multipart/form-data" id="perfilForm">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        
                        <div class="col-md-9 tracking-in-expand-forward-top">
                            
                            <label for="name" class="form-label"><i class="fa-solid fa-user" id="infoicons"></i>Nombre completo</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" oninput="limitarCaracteres(this, 255)">
                            <br>
                        </div>
                        <div class="col-md-9 tracking-in-expand-forward-top">
                            <label for="foto" class="form-label"><i class="fa-solid fa-image" id="infoicons"></i>foto</label>
                            <input type="file" class="form-control" id="foto" name="foto" accept=".jpg;.png" value="{{ $user->foto }}">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-8 tracking-in-expand-forward-top" style="display: none;" id="contenedorTelefono">
                        </div>
    
                        <div class="col-md-8 tracking-in-expand-forward-top" style="display: none;" id="contenedorDescripcion">
                        </div>
                    </div>   
                    <button class="btn btn-primary btn-sm tracking-in-expand-forward-top" type="button" onclick="agregarCampoDescripcion()" style="outline: none;">
                        <span class="relative">
                            <path fill="currentColor" d="M450.001-450.001h-200q-12.75 0-21.375-8.628-8.625-8.629-8.625-21.384 0-12.756 8.625-21.371 8.625-8.615 21.375-8.615h200v-200q0-12.75 8.628-21.375 8.629-8.625 21.384-8.625 12.756 0 21.371 8.625 8.615 8.625 8.615 21.375v200h200q12.75 0 21.375 8.628 8.625 8.629 8.625 21.384 0 12.756-8.625 21.371-8.625 8.615-21.375 8.615h-200v200q0 12.75-8.628 21.375-8.629 8.625-21.384 8.625-12.756 0-21.371-8.625-8.615-8.625-8.615-21.375v-200Z"></path>
                        </span>
                        <div class="text-sm"> <i class="ri-add-fill"></i>  Descripción</div>
                    </button>

                    <button class="btn btn-primary btn-sm tracking-in-expand-forward-top" type="button" onclick="agregarCampoTelefono()" style="outline: none;">
                        <span class="relative">
                            <path fill="currentColor" d="M450.001-450.001h-200q-12.75 0-21.375-8.628-8.625-8.629-8.625-21.384 0-12.756 8.625-21.371 8.625-8.615 21.375-8.615h200v-200q0-12.75 8.628-21.375 8.629-8.625 21.384-8.625 12.756 0 21.371 8.625 8.615 8.625 8.615 21.375v200h200q12.75 0 21.375 8.628 8.625 8.629 8.625 21.384 0 12.756-8.625 21.371-8.625 8.615-21.375 8.615h-200v200q0 12.75-8.628 21.375-8.629 8.625-21.384 8.625-12.756 0-21.371-8.625-8.615-8.625-8.615-21.375v-200Z"></path>
                        </span>
                        <div class="text-sm"> <i class="ri-add-fill"></i>  Teléfono</div>
                    </button> <br><br>                   
                                                                          
                    <div class="row mb-3">
                        <div class="col-md-6 tracking-in-expand-forward-top">
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                            <a href="{{ route('perfil.index') }}" class="btn btn-success"><i class="ri-edit-box-line align-bottom"></i> Volver</a>    
                        </div>        
                    </div>
                </form>
            </div>
        </div>
    </div>
    @else
        <p>No se encontró perfil para este usuario.</p>
    @endif
    <script>
        var successAlertEdit = document.getElementById('successAlertEdit');
        
        if (successAlertEdit) {
            setTimeout(function () {
                successAlertEdit.classList.remove('show');
                setTimeout(function () {
                    window.location.reload();
                }, 1000);
            }, 2000);
        }
    </script>

    <!--scripts para los numeros de caracteres -->
    <script>
        function limitarCaracteres(input, maxLength) {
        if (input.value.length > maxLength) {
            input.value = input.value.slice(0, maxLength);
        }
        }
    </script>

<script>
    function agregarCampoDescripcion() {
        var contenedorDescripcion = document.getElementById('contenedorDescripcion');

        var existeDescripcion = contenedorDescripcion.querySelector('input[type="text"]');

        if (!existeDescripcion) {
            var nuevoInput = document.createElement('input');
            nuevoInput.type = 'text';
            nuevoInput.placeholder = 'Escribe tu descripcion';
            nuevoInput.value= "{{ $user->descripcion }}";
            nuevoInput.classList.add('form-control', 'mt-3');
            contenedorDescripcion.appendChild(nuevoInput);
        }
    }

    function agregarCampoTelefono() {
        var contenedorTelefono = document.getElementById('contenedorTelefono');

        var existeTelefono = contenedorTelefono.querySelector('input[type="tel"]');

        if (!existeTelefono) {
            var nuevoInput = document.createElement('input');
            nuevoInput.type = 'tel';
            nuevoInput.placeholder = 'Número de telefono';
            nuevoInput.value= "{{ $user->telefono }}";
            nuevoInput.classList.add('form-control', 'mt-3');
            contenedorTelefono.appendChild(nuevoInput);
        }
    }
</script>

    <!--scripts para los numeros de caracteres -->

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

@endsection