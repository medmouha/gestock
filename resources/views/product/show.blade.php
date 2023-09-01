@extends('layout')
@section('content')
<a href="{{ route('product.index')}}" class="btn btn-primary mt-2">Retour</a>
<table class="table table-striped mt-2">
    <thead>
      <tr>
        <th scope="col">Référence</th>
        <th scope="col">Libellé</th>
        <th scope="col">Quantité</th>
        <th scope="col">Date d'enregistrement</th>
        <th scope="col">Date de modification</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>{{ $product->reference}}</td>
        <td>{{ $product->libelle}}</td>
        <td>{{ $product->quantite}}</td>
        <td>{{ $product->created_at }}</td>
        <td>{{ $product->updated_at }}</td>
      </tr>
    </tbody>    
  </table>


@endsection