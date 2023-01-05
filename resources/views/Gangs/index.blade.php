@extends('layouts.app')

@section('page_title', 'Liste des gangs')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12">

                @if (session('status') && session('message'))
                    <div class="alert alert-{{session('status')}}">
                        {{session('message')}}
                    </div>
                    
                @endif

                <h1>Liste des gangs</h1>
                <div class="mb-3">
                    <a href="{{ route('gangs.create') }}" class="btn btn-primary">{{__('Ajouter un gang')}}</a>
                </div>

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{__('Nom')}}</th>
                        <th scope="col">{{__('Quartiers')}}</th>
                        {{-- <th scope="col">{{__('Etablissements')}}</th>
                        <th scope="col">{{__('Products')}}</th> --}}
                        <th scope="col">{{__('Actions')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($gangs as $gang)
                            <tr>
                                <th scope="row">{{$gang->id}}</th>
                                <td>{{ $gang->name }}</td>
                                <td>
                                    @foreach ($gang->quartiers as $quartier)
                                        @if ($gang->quartiers)
                                            <a href="{{ route('quartiers.edit', $quartier->id) }}">{{ $quartier->name }}</a>
                                        @else 
                                            {{__("N'est possédé par aucun gang")}}
                                        @endif
                                    @endforeach
                                </td>
                                {{-- <td>
                                    @foreach ($gang->etablissements as $etablissement)
                                        <a href="{{ route('etablissements.edit', $etablissement->id) }}">{{ $etablissement->name }}</a>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($gang->products as $product)
                                        <a href="{{ route('products.edit', $product->id) }}">{{ $product->name }}</a>
                                    @endforeach
                                </td> --}}
                                <td>
                                    <a href="{{ route('gangs.edit', $gang->id) }}">{{__('Editer')}}</a>
                                    {{-- DELETE ACTION --}}
                                    <form action="{{ route('gangs.destroy', $gang->id) }}" method="POST" style="display: inline-block">
                                        @csrf
                                        @method("DELETE")
                                        <a href="#" onclick="event.preventDefault(); if(confirm('Confirmez-vous la suppression de ce gang ?') ) {this.closest('form').submit();}"><img src="{{ asset('img/icons/remove-square.png') }}" alt="Supprimer le gang" title="Supprimer le gang"></a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div>
                    {{ $gangs->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection