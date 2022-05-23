@extends('blog.admin.layouts.admin-master')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Категории</h3>
        </div>
        <a class="btn btn-primary btn-sm" href="{{ route('blog.admin.category.create') }}" role="button">Создать</a>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Название</th>
                    <th>Дата создания</th>
                    <th style="width: 30px">Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->title }}</td>
                        <td>{{ $category->created_at }}</td>
                        <td>
                            <a href="{{ route('blog.admin.category.edit', $category->id) }}"><i class="fas fa-pen"></i></a>
                            <a href=""><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            @if(count($categories))
                {{ $categories->links() }}
            @endif
        </div>
    </div>
@endsection
