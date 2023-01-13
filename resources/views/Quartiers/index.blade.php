@extends('layouts.app')

@section('page_title', 'Liste des quartiers')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12">

                @if (session('status') && session('message'))
                    <div class="alert alert-{{session('status')}}">
                        {{session('message')}}
                    </div>
                    
                @endif

                <h1>{{__("Liste des quartiers")}}</h1>
                <div class="mb-3">
                    <a href="{{route('quartiers.create')}}" class="btn btn-primary">{{__("Ajouter un quartier")}}</a>
                </div>

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{__('Nom')}}</th>
                        {{-- <th scope="col">{{__('Etablissements')}}</th> --}}
                        <th scope="col">{{__('Gangs')}}</th>
                        <th scope="col">{{__('Actions')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($quartiers as $quartier)
                            <tr>
                                <th scope="row">{{$quartier->id}}</th>
                                <td>{{ $quartier->name }}</td>
                                {{-- <td>
                                    @foreach ($quartier->etablissements as $etablissement)
                                        <a href="{{ route('etablissements.edit', $etablissement->id) }}">{{ $etablissement->name }}</a>
                                    @endforeach
                                </td> --}}

                                <td>
                                    @if ($quartier->gangs)
                                        <a href="{{ route('gangs.edit', $quartier->gangs->id) }}">{{ $quartier->gangs->name }}</a>
                                    @else 
                                        {{__("N'est possédé par aucun gang")}}                                        
                                    @endif
                                </td>

                                <td>
                                    <a href="{{ route('quartiers.edit', $quartier->id) }}">{{__('Editer')}}</a>
                                    {{-- DELETE ACTION --}}
                                    <form action="{{ route('quartiers.destroy', $quartier->id) }}" method="POST" style="display: inline-block">
                                        @csrf
                                        @method("DELETE")
                                        <a href="#" onclick="event.preventDefault(); if(confirm('Are you sure ?') ) {this.closest('form').submit();}"><img src="{{ asset('img/icons/remove-square.png') }}" alt={{__("Supprimer le quartier")}} title={{__("Supprimer le quartier")}}></a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div>
                    {{ $quartiers->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection