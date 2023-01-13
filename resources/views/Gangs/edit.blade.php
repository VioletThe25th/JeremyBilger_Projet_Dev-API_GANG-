@extends('layouts.app')

@section('page_title', "Edition du gang")

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

                <form action="{{ route('gangs.update', $gang->id) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="mb-3">
                        <label for="name" class="form-label">{{__('Nom')}}</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="{{__('Nom du gang')}}" value="{{$gang->name}}"><br>
                    </div>

                    <div class="mb-3">
                        <label for="quartier" class="form-label">{{__('Quartiers possédés')}}</label>
                        @foreach ($gang->quartiers as $quartier)
                            <input type="text" class="form-control" name="quartier" id="quartier" placeholder="{{__('Quartiers possédés')}}" value="{{ $quartier->name }}"><br>
                        @endforeach
                    </div>

                    {{-- <div class="mb-3">
                        <label for="etablissement" class="form-label">{{__('Etablissement possédés')}}</label>
                        @foreach ($gang->etablissements as $etablissement)
                            <input type="text" class="form-control" name="etablissement" id="etablissement" placeholder="{{__('Etablissements possédés')}}" value="{{ $etablissement->name }}"><br>
                        @endforeach
                    </div>

                    <div class="mb-3">
                        <label for="produit" class="form-label">{{__('Produits possédés')}}</label>
                        @foreach ($gang->products as $product)
                            <input type="text" class="form-control" name="produit" id="produit" placeholder="{{__('Produits possédés')}}" value="{{ $product->name }}"><br>
                        @endforeach
                    </div> --}}

                    <div>
                        <button class="btn btn-primary" type="submit">{{__('Save')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection