@extends('blog.personal.layouts.main')

@section('content')
    <div class="card">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">{{ __('Редактирование Комментария') }}</h3>
            </div>
            <form method="POST" action="{{ route('blog.personal.comment.update', $comment->id) }}">
                @csrf
                @method('PATCH')
                <div class="card-body">
                    <div class="form-group col-sm-10">
                        <label for="description">{{ __('Комментарий') }}</label>
                        <textarea type="text" class="form-control" id="description" name="description" placeholder="Введите описание" required>{{ $comment->description }}</textarea>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">{{ __('Обновить') }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
