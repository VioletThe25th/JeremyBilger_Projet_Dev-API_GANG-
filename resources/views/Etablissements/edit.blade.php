@extends('layouts.app')

@section('page_title', "Edition de l'établissement")

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12">
                
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('etablissements.update', $etablissement->id) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="mb-3">
                        <label for="name" class="form-label">{{__('Nom')}}</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="{{__('Nom du etablissement')}}" value="{{$etablissement->name}}"><br>
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">{{__('Addresse')}}</label>
                        <input type="text" class="form-control" name="adress" id="adress" placeholder="{{__('Prix')}}" value="{{$etablissement->adress}}"><br>
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">{{__('Type')}}</label>
                        <input type="text" class="form-control" name="type" id="type" placeholder="{{__('Type')}}" value="{{$etablissement->type}}"><br>
                    </div>

                    <div>
                        <button class="btn btn-primary" type="submit">{{__('Save')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection