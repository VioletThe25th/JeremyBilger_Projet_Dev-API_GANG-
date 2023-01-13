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

                <h1>{{__("Liste des produits")}}</h1>
                <div class="mb-3">
                    <a href="{{ route('products.create') }}" class="btn btn-primary">{{__('Ajouter un produit')}}</a>
                </div>

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{__('Nom')}}</th>
                        <th scope="col">{{__('Prix')}}</th>
                        <th scope="col">{{__('Quantité')}}</th>
                        <th scope="col">{{__('Etablissement')}}</th>
                        <th scope="col">{{__('Gang')}}</th>
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
                                    @if ($product->etablissement)
                                        <a href="{{ route('etablissements.edit', $product->etablissement->id) }}">{{ $product->etablissement->name }}</a>
                                    @else 
                                        {{__("N'est vendu dans aucun établissement")}}
                                    @endif
                                </td>

                                <td>
                                    @if ($product->etablissement->quartier->gang)
                                        <a href="{{ route('gangs.edit', $product->etablissement->quartier->gang->id) }}">{{ $product->etablissement->quartier->gang->name }}</a>
                                    @else 
                                        {{__("N'est vendu dans aucun gang")}}
                                    @endif
                                </td>

                                <td>
                                    <a href="{{ route('products.edit', $product->id) }}">{{__('Editer')}}</a>
                                    {{-- DELETE ACTION --}}
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline-block">
                                        @csrf
                                        @method("DELETE")
                                        <a href="#" onclick="event.preventDefault(); if(confirm('Confirmez-vous la suppression de ce produit ?') ) {this.closest('form').submit();}"><img src="{{ asset('img/icons/remove-square.png') }}" alt={{__("Supprimer le produit")}} title={{__("Supprimer le produit")}}></a>
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