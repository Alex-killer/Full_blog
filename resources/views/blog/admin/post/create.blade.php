@extends('blog.admin.layouts.admin-master')

@section('content')
    <div class="card">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Создание поста</h3>
            </div>
            <form method="POST" action="{{ route('blog.admin.post.store') }}">
                @csrf
                <div class="card-body">
                    <div class="form-group col-sm-6">
                        <label for="title">{{ __('Название') }}</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Введите название">
                    </div>
                        <div class="form-group col-sm-6">
                            <label>{{ __('Выберите категорию') }}</label>
                            <select class="form-control" name="category_id" id="category_id">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">
                                        {{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    <div class="form-group col-sm-10">
                        <label for="description">{{ __('Описание') }}</label>
                        <input type="text" class="form-control" id="summernote" name="description" placeholder="Введите описание">
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Создать</button>
                </div>
            </form>
        </div>
    </div>
@endsection
