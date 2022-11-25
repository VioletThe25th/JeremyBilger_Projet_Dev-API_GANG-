@extends('layouts.app')

@section('page_title', "Edition du quartier")

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

                <form action="{{ route('quartiers.update', $quartier->id) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="mb-3">
                        <label for="name" class="form-label">{{__('Nom')}}</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="{{__('Nom du quartier')}}" value="{{$quartier->name}}"><br>
                    </div>

                    <div>
                        <button class="btn btn-primary" type="submit">{{__('Save')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection