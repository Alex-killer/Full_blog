@extends('blog.admin.layouts.admin-master')

@section('content')
    <div class="card">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Редактирование поста</h3>
            </div>
            <form method="POST" action="{{ route('blog.admin.post.update', $post->id) }}">
                @csrf
                @method('PATCH')
                <div class="card-body">
                    <div class="form-group col-sm-6">
                        <label for="title">{{ __('Название') }}</label>
                        <input value="{{ $post->title }}" type="text" class="form-control" id="title" name="title" placeholder="Введите название" required>
                    </div>
                        <div class="form-group col-sm-6">
                            <label>{{ __('Выберите категорию') }}</label>
                            <select class="form-control" name="category_id" id="category_id">
                                @foreach($categories as $category)
                                    <option {{ $category->id == $post->category->id ? 'selected' : '' }}
                                        value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    <div class="form-group col-sm-10">
                        <label for="description">{{ __('Описание') }}</label>
                        <textarea type="text" class="form-control" id="description" name="description" placeholder="Введите описание" required>{{ $post->description }}</textarea>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="tag_id">Тэги</label>
                        <select multiple="multiple" class="select2" id="tag_ids" name="tag_ids[]" style="width: 100%;">
                            @foreach($tags as $tag)
                                <option {{ is_array( $post->tags->pluck('id')->toArray()) && in_array($tag->id, $post->tags->pluck('id')->toArray()) ? ' selected' : '' }} value="{{ $tag->id }}">
                                    {{ $tag->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Обновить</button>
                </div>
            </form>
        </div>
    </div>
@endsection
