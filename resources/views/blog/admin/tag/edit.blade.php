@extends('blog.admin.layouts.admin-master')

@section('content')
    <div class="card">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Редактирование категории</h3>
            </div>
            <form method="POST" action="{{ route('blog.admin.tag.update', $tag->id) }}">
                @csrf
                @method('PATCH')
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">{{ __('Название') }}</label>
                        <input value="{{ $tag->title }}" type="text" class="form-control" id="title" name="title" placeholder="Введите название" required>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Обновить</button>
                </div>
            </form>
        </div>
    </div>
@endsection
