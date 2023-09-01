@extends('layout')

@section('content')

<h2>STOCK</h2>
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Référence</th>
        <th scope="col">Libellé</th>
        <th scope="col">Quantité</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
      <tr>
        <td>{{ $product->reference}}</td>
        <td>{{ $product->libelle}}</td>
        <td>{{ $product->quantite}}</td>
        <td><a href="{{ route('product.edit', $product->id) }}"><i class="fa-solid fa-pen-to-square fa-2xl"></i></a>
            <a href="{{ route('product.delete', $product->id) }}"><i class="fa-solid fa-trash-can fa-2xl" style="color: #ec2222;"></i></a>
            <a href="{{ route('product.show', $product->id) }}"><i class="fa-solid fa-info-circle fa-2xl" style="color: green;"></i></a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {{ $products->links() }}


@endsection