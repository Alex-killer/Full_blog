@extends('blog.admin.layouts.admin-master')

@section('content')
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $categories_count }}</h3>

                        <p>Категории</p>
                    </div>
                    <div class="icon">
                        <i class="nav-icon fas fa-list-ul"></i>
                    </div>
                    <a href="{{ route('blog.admin.category.index') }}" class="small-box-footer">Посмотреть <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $posts_count }}</h3>

                        <p>Посты</p>
                    </div>
                    <div class="icon">
                        <i class="nav-icon fas fa-list-alt"></i>
                    </div>
                    <a href="{{ route('blog.admin.post.index') }}" class="small-box-footer">Посмотреть <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->

            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>65</h3>

                        <p>Теги</p>
                    </div>
                    <div class="icon">
                        <i class="nav-icon fas fa-tag"></i>
                    </div>
                    <a href="#" class="small-box-footer">Посмотреть <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $user_count }}</h3>

                        <p>Пользователи</p>
                    </div>
                    <div class="icon">
                        <i class="nav-icon fas fa-users"></i>
                    </div>
                    <a href="#" class="small-box-footer">Посмотреть <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row (main row) -->
@endsection
