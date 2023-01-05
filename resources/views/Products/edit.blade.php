@extends('layouts.app')

@section('page_title', "Edition du produit")

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

                <form action="{{ route('products.update', $product->id) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="mb-3">
                        <label for="name" class="form-label">{{__('Nom')}}</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="{{__('Nom du product')}}" value="{{$product->name}}"><br>
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">{{__('Prix')}}</label>
                        <input type="text" class="form-control" name="price" id="price" placeholder="{{__('Prix')}}" value="{{$product->price}}"><br>
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">{{__('Quantité')}}</label>
                        <input type="text" class="form-control" name="quantity" id="quantity" placeholder="{{__('Quantité')}}" value="{{$product->quantity}}"><br>
                    </div>

                    <div class="mb-3">
                        <label for="etablissement" class="form-label">{{__('Etablissement')}}</label>
                        @if ($product->etablissement)
                            <input type="text" class="form-control" name="etablissement" id="etablissement" placeholder="{{__('etablissement')}}" value="{{$product->etablissement->name}}"><br>  
                        @else
                            <input type="text" class="form-control" name="etablissement" id="etablissement" placeholder="{{__('etablissement')}}" value=""><br>
                        @endif
                    </div>

                    <div>
                        <button class="btn btn-primary" type="submit">{{__('Save')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection