@extends('layouts.app')

@section('page_title', 'Liste des produits')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12">

                @if (session('status') && session('message'))
                    <div class="alert alert-{{session('status')}}">
                        {{session('message')}}
                    </div>
                    
                @endif

                <h1>Liste des produits</h1>

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{__('Nom')}}</th>
                        <th scope="col">{{__('Prix')}}</th>
                        <th scope="col">{{__('Quantity')}}</th>
                        <th scope="col">{{__('Actions')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <th scope="row">{{$product->id}}</th>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>
                                    <a href="{{ route('products.edit', $product->id) }}">{{__('Editer')}}</a>
                                    {{-- DELETE ACTION --}}
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline-block">
                                        @csrf
                                        @method("DELETE")
                                        <a href="#" onclick="event.preventDefault(); if(confirm('Confirmez-vous la suppression de ce produit ?') ) {this.closest('form').submit();}"><img src="{{ asset('img/icons/remove-square.png') }}" alt="Supprimer le produit" title="Supprimer le produit"></a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div>
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection