<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Gestock</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-primary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Gestock</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              @if (Route::currentRouteName() != 'product.create')
              <li class="nav-item">
                <a class="nav-link" href="{{ route('product.create') }}">Ajout</a>
              </li>
              @endif
              @if (Route::currentRouteName() != 'product.sortie')
              <li class="nav-item">
                <a class="nav-link" href="{{ route('product.sortie')}}">Sortie</a>
              </li>
              @endif
              @if (Route::currentRouteName() != 'product.index')
              <li class="nav-item">
                <a class="nav-link" href="{{ route('product.index') }}">Stock</a>
              </li>
              @endif
              @if (Route::currentRouteName() != 'auth.login')
              <li class="nav-item">
                <a class="nav-link" href="{{ route('auth.logout') }}">Deconnexion</a>
              </li>
              @endif
            </ul>
          </div>
        </div>
      </nav>
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success mt-5">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger mt-5">
                {{ session('error') }}
            </div>
        @endif
        @yield('content')
    </div>
</body>
</html>