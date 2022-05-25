@extends('blog.admin.layouts.admin-master')

@section('content')
    <div class="card">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">{{ __('Редактирование пользователя') }}</h3>
            </div>
            <form method="POST" action="{{ route('blog.admin.user.update', $user->name) }}">
                @csrf
                @method('PATCH')
                <div class="card-body">
                    <div class="card-body">
                        <div class="form-group col-sm-6">
                            <label for="name">{{ __('Имя') }}</label>
                            <input value="{{ $user->name }}" type="text" class="form-control" id="name" name="name" placeholder="Введите имя" required>
                            @error('name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="email">{{ __('Email') }}</label>
                            <input value="{{ $user->email }}" type="email" class="form-control" id="email" name="email" placeholder="Введите email" required>
                            @error('email')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-sm-6">
                            <label>{{ __('Выберите роль') }}</label>
                            <select class="form-control" name="role_id" id="role_id">
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}"
                                        {{ $role->id == $user->role_id ? 'selected' : '' }}>
                                        {{ $role->title }}</option>
                                @endforeach
                            </select>
                        </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">{{ __('Обновить') }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
