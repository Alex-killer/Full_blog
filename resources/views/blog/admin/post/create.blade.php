@extends('blog.admin.layouts.admin-master')

@section('content')
    <div class="card">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">{{ __('Создание поста') }}</h3>
            </div>
            <form method="POST" action="{{ route('blog.admin.post.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group col-sm-6">
                        <label for="title">{{ __('Название') }}</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" placeholder="Введите название" autofocus>
                        @error('title')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-sm-6">
                        <label>{{ __('Выберите категорию') }}</label>
                        <select class="form-control" name="category_id" id="category_id">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $category->id == old('category_id') ? 'selected' : '' }}>
                                    {{ $category->title }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-sm-10">
                        <label for="description">{{ __('Описание') }}</label>
                        <textarea type="text" class="form-control" id="description" name="description" placeholder="Введите описание">{{ old('description') }}</textarea>
                        @error('description')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-sm-10">
                        <label for="exampleInputFile">{{ __('Добавьте изобраение') }}</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="exampleInputFile" name="preview_image">
                                <label class="custom-file-label">{{ __('Выберите файл') }}</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">{{ __('Загрузка') }}</span>
                            </div>
                        </div>
                        @error('preview_image')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
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
