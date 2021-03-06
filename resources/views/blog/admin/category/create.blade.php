@extends('blog.admin.layouts.admin-master')

@section('content')
    <div class="card">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">{{ __('Создание категории') }}</h3>
            </div>
            <form method="POST" action="{{ route('blog.admin.category.store') }}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">{{ __('Название') }}</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" placeholder="Введите название" autofocus required>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">{{ __('Создать') }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
