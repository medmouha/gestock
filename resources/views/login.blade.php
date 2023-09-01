@extends('layout');

@section('content')

<h1>CONNEXION</h1>
<div class="card">
    <div class="card-body">
        <form action="{{route('auth.login')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}">
                @error('email')
                    {{ $message }}
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" class="form-control" name="password" id="password">
                @error('password')
                    {{ $message }}
                @enderror
            </div>
            <br>
            <button class="btn btn-primary">se connecter</button>
        </form>
    </div>
</div>
    
@endsection