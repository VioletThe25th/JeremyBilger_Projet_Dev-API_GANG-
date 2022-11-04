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
                                    {{-- <a href="{{ route('quartiers.edit', $quartier->id) }}">{{__('Editer')}}</a>
                                    <a href="{{ route('quartiers.destroy', $quartier->id) }}">{{__('Supprimer')}}</a> --}}
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