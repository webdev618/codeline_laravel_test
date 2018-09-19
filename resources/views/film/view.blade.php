@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (isset($film_created))
                <div class="alert alert-success" role="alert">
                    {{ __('Successfully created new film!') }}
                </div>
            @endif

            @if (isset($comment_created))
            <div class="alert alert-success" role="alert">
                {{ __('Successfully leaved a new comment!') }}
            </div>
            @endif

            <div class="card mb-4">
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

            @foreach ($film->comments as $comment)
                <div class="card mb-3">
                    <div class="card-body">
                        <blockquote class="mb-0">
                            <p>
                                <em>
                                    {{ $comment->comment }}
                                </em>
                            </p>
                            <small class="float-right">{{ $comment->name }}</small>
                        </blockquote>
                    </div>
                </div>
            @endforeach

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ __('Leave a Comment') }}</h4>

                    <form action="{{ url('films/' . $film->slug . '/comment') }}" method="post">
                        @if ($errors->any())
                            <div class="alert alert-danger" role="alert">
                                {{ __('Please input again the following fields.') }}
                            </div>
                        @endif

                        {!! csrf_field() !!}

                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">{{ __('Name') }}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @if ($errors->has('name')) is-invalid @endif" id="name" name="name" placeholder="{{ __('Name') }}" value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                <span class="invalid-feedback">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="comment" class="col-sm-3 col-form-label">{{ __('Comment') }}</label>
                            <div class="col-sm-9">
                                <textarea class="form-control @if ($errors->has('comment')) is-invalid @endif" id="comment" name="comment" placeholder="{{ __('Comment') }}" rows="4">{{ old('comment') }}</textarea>
                                @if ($errors->has('comment'))
                                <span class="invalid-feedback">{{ $errors->first('comment') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-primary">{{ __('Leave') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
