@extends('layouts.app')

@section('content')
<div class="container" ><br><br><br>
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card border-success shadow p-3 mb-5 bg-white rounded">
                <div class="card-header text-white rounded"; style="text-align: center;background: #64dd17">{{ __('Admin | Acceso Administrador') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        
                        <div class="p-2 pb-0 ">
                            <center class="mb-4">
                                <img class="img-fluid" src=" {{ asset('img\logo_catac.png') }}" style="width: 38%;" >
                            </center>
                        </div>

                        <div class="row mb-2 p-3">
                            <label for="email" class="col-md-3 col-form-label text-md-left text-muted" style="font-weight: bold">{{ __('USUARIO:') }}</label>

                            <div class="col-md-9">
                                <input id="email" type="email" class="form-control bg-white @error('email') is-invalid @enderror" placeholder="Ingrese su correo electronico" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        

                        <div class="row mb-2 p-3">
                            <label for="password" class="col-md-3 col-form-label text-md-left text-muted" style="font-weight: bold">{{ __('PASSWORD:') }}</label>

                            <div class="col-md-9">
                                <input id="password" type="password" class="form-control bg-white @error('password') is-invalid @enderror" placeholder="Ingrese su contraseña asignada" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!--
                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label text-muted" for="remember">
                                        {{ __('Recuérdame') }}
                                    </label>
                                </div>
                            </div>
                        </div> -->

                        <div class="row mb-0 p-3 pb-0 ">
                                <div class="col-md-9 offset-md-3">
                                    <button type="submit" class="btn btn-warning text-white mb-2 float-end" style="background: #64dd17;border: #64dd17">
                                        {{ __('Ingresar') }} <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"/>
                                            <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                                          </svg>
                                    </button><br>
                                </div>
                            <!--
                                <div class="col-md-12 offset-md-3">
                                @if (Route::has('password.request'))
                                <a class="btn btn-link btn text-muted" href="{{ route('password.request') }}">
                                    {{ __('¿Olvidaste tu contraseña?') }}
                                </a>
                                @endif
                                </div> -->

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
