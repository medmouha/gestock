@extends('layout');

@section('content')

<h1>NOUVEAU PRODUIT</h1>
<div class="card">
    <div class="card-body">
        <form action="" method="post">
            @csrf
            <div class="form-group">
                <label for="reference">Référence</label>
                <input type="text" class="form-control" name="reference" id="reference" value="{{ old('reference') }}">
                @error('reference')
                    {{ $message }}
                @enderror
            </div>
            <div class="form-group">
                <label for="libelle">Libellé</label>
                <input type="text" class="form-control" name="libelle" id="libelle" value="{{ old('libelle') }}">
                @error('libelle')
                    {{ $message }}
                @enderror
            </div>
            <div class="form-group">
                <label for="quantite">Quantité</label>
                <input type="number" class="form-control" name="quantite" id="quantite" value="{{ old('quantite') }}">
                @error('quantite')
                    {{ $message }}
                @enderror
            </div>
            <br>
            <button class="btn btn-primary">enregistrer</button>
            <a href="{{route('product.index')}}" class="btn btn-primary">annuler</a>
        </form>
    </div>
</div>
    
@endsection