@extends('components.layouts.home')
@section('home')
    <section id="hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="card-lg mb-4 mb-lg-0">
                        <h2>{{$homepagesetting->discount_percent}}%</h2>
                        <h4>{{$homepagesetting->discount_heading}}</h4>
                        <p>{{$homepagesetting->discount_subheading}}</p>
                        @php
                            $image1 = App\Models\ProductImage::where('product_id',$homepagesetting->discountedProduct->id)->get();
                        @endphp
                        <div class="float-item">
                            @foreach($image1 as $item)
                                @if($item->product_id == $homepagesetting->discountedProduct->id)
                                    <img src="{{asset('storage/' . $item->image_path)}}" alt="failed">
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="card-sm purple mb-3">
                        <!-- product image -->
                        @php
                            $image2 = App\Models\ProductImage::where('product_id',$homepagesetting->featuredProduct1->id)->get();
                        @endphp
                        <div class="product">
                            @foreach($image2 as $item)
                                @if($item->product_id == $homepagesetting->featuredProduct1->id)
                                    <img src="{{asset('storage/' . $item->image_path)}}" alt="failed">
                                @endif
                            @endforeach
                        </div>

                        <div>
                            <h2>{{$homepagesetting->featuredProduct1->product_name}}</h2>
                            <p>{{$homepagesetting->featuredProduct1->category->category_name}}</p>
                        </div>
                    </div>

                    <div class="card-sm sky">
                        <div>
                            <h2>{{$homepagesetting->featuredProduct2->product_name}}</h2>
                            <p>{{$homepagesetting->featuredProduct2->category->category_name}}</p>
                        </div>

                        <!-- product image -->
                        @php
                            $image3 = App\Models\ProductImage::where('product_id',$homepagesetting->featuredProduct2->id)->get();
                        @endphp
                        <div class="product">
                            @foreach($image3 as $item)
                                @if($item->product_id == $homepagesetting->featuredProduct2->id)
                                    <img src="{{asset('storage/' . $item->image_path)}}" alt="failed">
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @livewire('HomeProductFilterComponent')
@endsection
