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

                <h1>Liste des quartiers</h1>

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{__('Nom')}}</th>
                        <th scope="col">{{__('Actions')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($quartiers as $quartier)
                            <tr>
                                <th scope="row">{{$quartier->id}}</th>
                                <td>{{ $quartier->name }}</td>
                                <td>
                                    <a href="{{ route('quartiers.edit', $quartier->id) }}">{{__('Editer')}}</a>
                                    {{-- DELETE ACTION --}}
                                    <form action="{{ route('quartiers.destroy', $quartier->id) }}" method="POST" style="display: inline-block">
                                        @csrf
                                        @method("DELETE")
                                        <a href="#" onclick="event.preventDefault(); if(confirm('Confirmez-vous la suppression de ce quartier ?') ) {this.closest('form').submit();}"><img src="{{ asset('img/icons/remove-square.png') }}" alt="Supprimer le quartier" title="Supprimer le quartier"></a>
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