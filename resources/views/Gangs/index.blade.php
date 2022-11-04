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

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{__('Nom')}}</th>
                        <th scope="col">{{__('Actions')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($gangs as $gang)
                            <tr>
                                <th scope="row">{{$gang->id}}</th>
                                <td>{{ $gang->name }}</td>
                                <td>
                                    {{-- <a href="{{ route('gangs.edit', $gang->id) }}">{{__('Editer')}}</a>
                                    <a href="{{ route('gangs.destroy', $gang->id) }}">{{__('Supprimer')}}</a> --}}
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