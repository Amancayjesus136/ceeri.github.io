<!-- PHP -->

<!-- Estilos CSS -->
<style>
    
    body {
        background-color: #4174a7; /* Color de fondo */
    }

    .card-body h1, .card-body h5, .card-body p, .card-body h3 {
        color: #343a40; /* Color de texto */
    }

    .card-body {
        margin-bottom: 20px;
    }

    #superior {
        /* Permalink - use to edit and share this gradient: https://colorzilla.com/gradient-editor/#2bbfe4+0,eaecc6+100 */ background: #2bbfe4; /* Old browsers */ background: -moz-linear-gradient(left, #2bbfe4 0%, #eaecc6 100%); /* FF3.6-15 */ background: -webkit-linear-gradient(left, #2bbfe4 0%,#eaecc6 100%); /* Chrome10-25,Safari5.1-6 */ background: linear-gradient(to right, #2bbfe4 0%,#eaecc6 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */ filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#2bbfe4', endColorstr='#eaecc6',GradientType=1 ); /* IE6-9 */        padding: 20px;
    }

    .card {
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Sombra de la tarjeta */
        
    }

    .row {
        margin: 20px 0;
    }

    #successAlertEdit {
        margin-top: 20px;
    }


    #infoicons {
        margin-right: 10px;
    }

    .avatar {
	width: 150px;
	height: 150px;
	box-sizing: border-box;
	border: 5px white solid;
	border-radius: 50%;
	overflow: hidden;
	box-shadow: 0 5px 15px 0px rgba(0,0,0,0.6);
	transform: translatey(0px);
	animation: float 6s ease-in-out infinite;
	img { width: 100%; height: auto; }
    }

    @keyframes float {
	0% {
		box-shadow: 0 5px 15px 0px rgba(0,0,0,0.6);
		transform: translatey(0px);
	}
	50% {
		box-shadow: 0 25px 15px 0px rgba(0,0,0,0.2);
		transform: translatey(-20px);
	}
	100% {
		box-shadow: 0 5px 15px 0px rgba(0,0,0,0.6);
		transform: translatey(0px);
	}   
}
    ul {
        list-style: none;
    }

/* ----------------------------------------------
  Generated by AnimatiSS
  Licensed under FreeBSD License
  URL: https://xsgames.co/animatiss
  Twitter: @xsgames_
---------------------------------------------- */

.scale-up-top{animation:scale-up-top 0.4s; } @keyframes scale-up-top{0%{transform:scale(.5);transform-origin:center top}100%{transform:scale(1);transform-origin:center top}}

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

@section('content')
    @if(session('successEdit'))
        <div id="successAlertEdit" class="alert alert-success alert-dismissible bg-success text-white alert-label-icon fade show" role="alert">
            <i class="ri-notification-off-line label-icon"></i><strong>Éxito</strong> - Su perfil ha sido editado correctamente
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($user)
        <div class="row">
            <div class="col-12">
            <!-- Información del usuario -->
                <div class="card mt-12 shadow-drop-center ">
                    <div class="card-body d-flex tracking-in-expand-forward-top align-items-center" id="superior">
                            <!-- Imagen -->
                            <div class="row">
                                <div class="col-6">
                                    @if (empty(Auth::user()->foto))
                                        <?php $primeraLetra = strtoupper(substr($user->name, 0, 1)); ?>
                                        <div class="avatar">
                                            <img src="{{ asset('assets/images/fotoPerfilSmall/'.$primeraLetra.'.png') }}" alt="Letra de perfil" style="width: 140px; height: 140px; border-radius: 50%;">
                                        </div>
                                    @else
                                        <div class="avatar">
                                            <img src="{{ asset('storage/assets/images/'.$user->foto) }}" alt="Foto de perfil" style="width: 140px; height: 140px; border-radius: 50%;">
                                        </div>
                                    @endif
                                </div>        
                            </div>
                    
                            <!-- H1 y Lista -->
                            <div class="ms-3">
                                <h1 class="card-title">{{ $user->name }}</h1>
                                <ul class="list-unstyled d-flex flex-row">  
                                    <li class="me-3"><p class="card-text">Empleado y administrador medio del sistema</p></li>
                                    <li><h5 class="card-text">Cede: Villa el Salvador</h5></li> 
                                </ul>                                
                            </div>
                    
                        <div class="ms-auto">
                            <a href="{{ route('perfil.edit', ['perfil' => $user->id]) }}" class="btn btn-success">
                                <i class="ri-edit-box-line align-bottom"></i> Editar
                            </a>
                        </div>
                    </div>                    
                </div>
            </div>
                <div class="row">
                    <!-- Información adicional -->
                        <div class="card shadow-drop-center col-4 ">
                            <div class="card-body tracking-in-expand-forward-top">
                                <h3>INFORMACION</h3><br>
                                <h5><i class="fa-solid fa-user" id="infoicons"></i> Nombre completo: {{ $user->name }}</h5><br>
                                <h5><i class="fa-solid fa-envelope" id="infoicons"></i> Email: {{ $user->email }}</h5><br>
                                @if($user->telefono)
                                <h5><i class="fa-solid fa-phone" id="infoicons"></i>Teléfono: {{ $user->telefono }}</h5><br>
                                @endif
                                <h5><i class="fa-solid fa-handshake" id="infoicons"></i>Se unió el: {{ Illuminate\Support\Str::limit($user->created_at, $limit = 10, $end = '...') }}</h5><br>
                            </div>
                        </div>
                        
                        @if($user->descripcion)
                            <div class="card shadow-drop-center col-7 " style="margin-left: 10px;">
                                <div class="card-body tracking-in-expand-forward-top">
                                    <h3>DESCRIPCION:</h3><br>
                                    <p>{{ $user->descripcion }}</p>
                                </div>
                            </div>
                        @else
                            <p class="card shadow-drop-center col-7 text-center" style="margin-left: 10px; padding-top: 100px;">Sin descripción de usuario</p>
                        @endif
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

    <!-- Scripts para limitar caracteres -->
    <script>
        function limitarCaracteres(input, maxLength) {
            if (input.value.length > maxLength) {
                input.value = input.value.slice(0, maxLength);
            }
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
@endsection
