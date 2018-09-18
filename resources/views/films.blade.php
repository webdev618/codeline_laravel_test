@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($films as $film)
    <div class="row justify-content-center">
        <div class="col-md-8 mb-4">
            <div class="card">
                <img class="card-img-top" src="{{ $film->photo }}" alt="{{ $film->name }}">

                <div class="card-body">
                    <h2 class="card-title">{{ $film->name }}</h2>
                    <p class="card-text">
                        @for ($i = 0; $i < $film->rating; $i++)
                            <i class="fa fa-star"></i>
                        @endfor

                        @for ($i = $film->rating; $i < 5; $i++)
                            <i class="fa fa-star-o"></i>
                        @endfor
                    </p>
                    <p class="card-text">
                        {{ $film->description }}
                    </p>
                    <div class="card-text">
                        <div class="float-left">
                            <i class="fa fa-dollar"></i> {{ $film->ticket_price }}
                        </div>
                        <div class="float-right">
                            <i class="fa fa-tags"></i>
                            <?php
                            $genres = explode(',', $film->genre);
                            ?>
                            @for ($i = 0; $i < count($genres); $i++)
                                {{ $genres[$i] }}@if ($i != count($genres) - 1),@endif
                            @endfor
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <i class="fa fa-globe"></i> {{ $film->country}}
                    <div class="float-right"><i class="fa fa-calendar"></i> {{ $film->release_date }}</div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <div class="pagination-center">
        {{ $films->links() }}
    </div>
</div>
@endsection
