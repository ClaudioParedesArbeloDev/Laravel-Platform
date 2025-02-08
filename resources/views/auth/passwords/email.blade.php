@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{asset('sass/auth/email/email.css')}}">

    <div class="container">
        <h2>{{ __('Restablecer Contraseña') }}</h2>
        <form action="{{ route('password.email') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">{{ __('Correo Electrónico') }}</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn">{{ __('Enviar enlace de restablecimiento') }}</button>
        </form>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
        document.getElementById("resetPasswordForm").addEventListener("submit", function(event) {
            event.preventDefault(); // Evita que el formulario se recargue
        
            let formData = new FormData(this);
        
            fetch("{{ route('password.email') }}", {
                method: "POST",
                body: formData,
                headers: {
                    "X-Requested-With": "XMLHttpRequest", // Indica que es una petición AJAX
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        icon: "success",
                        title: "¡Correo enviado!",
                        text: data.message,
                        confirmButtonText: "Aceptar"
                    });
                } else {
                    Swal.fire({
                        icon: "error",
                        title: "Error",
                        text: data.message,
                        confirmButtonText: "Intentar de nuevo"
                    });
                }
            })
            .catch(error => {
                console.error("Error:", error);
                Swal.fire({
                    icon: "error",
                    title: "Error inesperado",
                    text: "Ocurrió un problema. Inténtalo más tarde.",
                    confirmButtonText: "Cerrar"
                });
            });
        });
        </script>
    </div>
@endsection