@extends('blog.admin.layouts.admin-master')

@section('content')
    <div class="card">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">{{ __('Создание поста') }}</h3>
            </div>
            <form method="POST" action="{{ route('blog.admin.post.store') }}">
                @csrf
                <div class="card-body">
                    <div class="form-group col-sm-6">
                        <label for="title">{{ __('Название') }}</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" placeholder="Введите название" autofocus required>
                    </div>
                    <div class="form-group col-sm-6">
                        <label>{{ __('Выберите категорию') }}</label>
                        <select class="form-control" name="category_id" id="category_id">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $category->id == old('category_id') ? 'selected' : '' }}>>
                                    {{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-sm-10">
                        <label for="description">{{ __('Описание') }}</label>
                        <textarea type="text" class="form-control" id="description" name="description" placeholder="Введите описание" required>{{ old('description') }}</textarea>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="tag_id">Тэги</label>
                        <select multiple="multiple" class="select2" id="tag_ids" name="tag_ids[]" style="width: 100%;">
                            @foreach($tags as $tag)
                                <option {{ is_array( old('tag_ids')) && in_array($tag->id, old('tag_ids')) ? ' selected' : '' }} value="{{ $tag->id }}">
                                    {{ $tag->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">{{ __('Создать') }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
