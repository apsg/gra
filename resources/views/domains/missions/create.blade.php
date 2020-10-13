@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Dodaj misję
                        <div class="pull-right">
                            <a href="{{ route('mission.index') }}" class="btn btn-secondary">
                                <i class="fa fa-backward"></i> Wróć
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="{{ route('mission.store') }}"
                              method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="form-check-label">Nazwa misji:</label>
                                <input type="text"
                                       name="title"
                                       required
                                       placeholder="Nazwa misji"
                                       class="form-control"
                                       value="{{ old('title') }}"
                                >
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-check-label">Plik obrazu tła:</label>
                                <input type="file"
                                       name="image"
                                       required
                                       class="form-control"
                                       accept="image/*"
                                       value="{{ old('image') }}"
                                >
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <span>{{ old('answers') }}</span>
                                <answer-inputer name="answers"></answer-inputer>
                                @error('answers')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <button class="btn btn-primary"><i class="fa fa-save"></i> Zapisz</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
