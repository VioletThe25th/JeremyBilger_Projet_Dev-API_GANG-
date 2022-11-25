@extends('layouts.app')

@section('page_title', 'Liste des établissements')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12">

                @if (session('status') && session('message'))
                    <div class="alert alert-{{session('status')}}">
                        {{session('message')}}
                    </div>
                    
                @endif

                <h1>Liste des établissements</h1>

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{__('Nom')}}</th>
                        <th scope="col">{{__('Addresse')}}</th>
                        <th scope="col">{{__('Type')}}</th>
                        <th scope="col">{{__('Actions')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($etablissements as $etablissement)
                            <tr>
                                <th scope="row">{{$etablissement->id}}</th>
                                <td>{{ $etablissement->name }}</td>
                                <td>{{ $etablissement->adress }}</td>
                                <td>{{ $etablissement->type }}</td>
                                <td>
                                    <a href="{{ route('etablissements.edit', $etablissement->id) }}">{{__('Editer')}}</a>
                                    {{-- DELETE ACTION --}}
                                    <form action="{{ route('etablissements.destroy', $etablissement->id) }}" method="POST" style="display: inline-block">
                                        @csrf
                                        @method("DELETE")
                                        <a href="#" onclick="event.preventDefault(); if(confirm('Confirmez-vous la suppression de cet établissement ?') ) {this.closest('form').submit();}"><img src="{{ asset('img/icons/remove-square.png') }}" alt="Supprimer l'établissement" title="Supprimer l'établissement"></a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div>
                    {{ $etablissements->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection