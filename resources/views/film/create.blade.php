@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h2 class="cart-title">{{ __('Create New Film') }}</h2>
                    <form action="{{ url('films/store') }}" method="post" enctype="multipart/form-data">
                        @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            {{ __('Please input again the following fields.') }}
                        </div>
                        @endif

                        {!! csrf_field() !!}

                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">{{ __('Name') }}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control film-name @if ($errors->has('name')) is-invalid @endif" id="name" name="name" placeholder="{{ __('Name') }}" value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="slug" class="col-sm-3 col-form-label">{{ __('Slug') }}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control film-slug @if ($errors->has('slug')) is-invalid @endif" id="slug" name="slug" placeholder="{{ __('Slug') }}" value="{{ old('slug') }}">
                                @if ($errors->has('slug'))
                                    <span class="invalid-feedback">{{ $errors->first('slug') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-sm-3 col-form-label">{{ __('Description') }}</label>
                            <div class="col-sm-9">
                                <textarea class="form-control @if ($errors->has('description')) is-invalid @endif" id="description" name="description" placeholder="{{ __('Description') }}" rows="4">{{ old('description') }}</textarea>
                                @if ($errors->has('description'))
                                    <span class="invalid-feedback">{{ $errors->first('description') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="release_date" class="col-sm-3 col-form-label">{{ __('Release Date') }}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control datetimepicker @if ($errors->has('release_date')) is-invalid @endif" id="release_date" name="release_date" placeholder="{{ __('Release Date') }}" value="{{ old('release_date') }}">
                                @if ($errors->has('release_date'))
                                    <span class="invalid-feedback">{{ $errors->first('release_date') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="rating" class="col-sm-3 col-form-label">{{ __('Rating') }}</label>
                            <div class="col-sm-9">
                                <select class="form-control @if ($errors->has('rating')) is-invalid @endif" id="rating" name="rating">
                                    <option value="">{{ __('Select Rating') }}</option>
                                    @for ($i = 1; $i <= 5; $i++)
                                        <option value="{{ $i }}" @if ($i == old('rating')) selected @endif>{{ $i }}</option>
                                    @endfor
                                </select>
                                @if ($errors->has('rating'))
                                    <span class="invalid-feedback">{{ $errors->first('rating') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ticket_price" class="col-sm-3 col-form-label">{{ __('Ticket Price') }}</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control @if ($errors->has('ticket_price')) is-invalid @endif" id="ticket_price" name="ticket_price" placeholder="{{ __('Ticket Price') }}" value="{{ old('ticket_price') }}">
                                @if ($errors->has('ticket_price'))
                                    <span class="invalid-feedback">{{ $errors->first('ticket_price') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="country" class="col-sm-3 col-form-label">{{ __('Country') }}</label>
                            <div class="col-sm-9">
                                <select class="form-control select2 @if ($errors->has('country')) is-invalid @endif" id="country" name="country">
                                    <option value="">{{ __('Select Country') }}</option>
                                    @foreach ($countries as $country)
                                    <option value="{{ $country }}" @if ($country == old('country')) selected @endif>{{ $country }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('country'))
                                    <span class="invalid-feedback">{{ $errors->first('country') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="genre" class="col-sm-3 col-form-label">{{ __('Genres') }}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @if ($errors->has('genre')) is-invalid @endif" id="genre" name="genre" placeholder="{{ __('Genres') }}" value="{{ old('genre') }}">
                                @if ($errors->has('genre'))
                                    <span class="invalid-feedback">{{ $errors->first('genre') }}</span>
                                @endif
                                <small class="form-text text-muted">
                                    {{ __('Separate genres with commas') }}
                                </small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="photo" class="col-sm-3 col-form-label">{{ __('Photo') }}</label>
                            <div class="col-sm-9">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @if ($errors->has('photo')) is-invalid @endif" id="photo" name="photo">
                                    @if ($errors->has('photo'))
                                    <span class="invalid-feedback">{{ $errors->first('photo') }}</span>
                                    @endif
                                    <label class="custom-file-label" for="photo">{{ __('Choose file') }}</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
