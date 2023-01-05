@extends('layouts.app')

@section('page_title', "Ajout d'un établissement")

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
                
                <form action="{{ route('products.store') }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="mb-3">
                        <label for="name" class="form-label">{{__('Nom')}}</label>
                        <input type="text" class="form-control" name="name" id="name"><br>
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">{{__('Prix')}}</label>
                        <input type="text" class="form-control" name="price" id="price"><br>
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">{{__('Quantité')}}</label>
                        <input type="text" class="form-control" name="quantity" id="quantity"><br>
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">{{__('Etablissement')}}</label>
                        <input type="text" class="form-control" name="etablissement" id="etablissement"><br>
                    </div>

                    <div>
                        <button class="btn btn-primary" type="submit">{{__('Save')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection