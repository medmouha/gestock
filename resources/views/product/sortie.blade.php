@extends('layout');

@section('content')

<h1>ENREGISTRER UNE SORTIE</h1>
<div class="card">
    <div class="card-body">
        <form action="" method="post">
            @csrf
            <div class="form-group">
                <label for="reference">Référence</label>
                <select name="reference" class="form-select">
                    <option value="">choisir</option>
                    @foreach ($products as $product)
                        <option libelle="{{ $product->libelle }}" value="{{ $product->reference }}">{{ $product->reference }} => {{ $product->libelle }}</option>
                    @endforeach
                </select>
                @error('reference')
                    {{ $message }}
                @enderror
            </div>
            <div class="form-group">
                <label for="libelle">Libellé</label>
                <input type="text" class="form-control" name="libelle" id="libelle" value="{{ old('libelle')}}" disabled>
                @error('libelle')
                    {{ $message }}
                @enderror
            </div>
            <div class="form-group">
                <label for="quantite">Quantité</label>
                <input type="number" class="form-control" name="quantite" id="quantite" value="">
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
<script>
    const select = document.querySelector('select[name="reference"]');
    let libelle;

    select.addEventListener("change", ()=>{
        const currentValue = select.selectedOptions[0];
        libelle = currentValue.getAttribute("libelle");
        
        document.querySelector("#libelle").value = libelle;
    });

</script>
@endsection