@extends('blog.personal.layouts.main')

@section('content')
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $comments_count }}</h3>

                    <p>Комментарии</p>
                </div>
                <div class="icon">
                    <i class="nav-icon fas fa-list-ul"></i>
                </div>
                <a href="{{ route('blog.personal.comment.index') }}" class="small-box-footer">Посмотреть <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $likes_count }}</h3>

                    <p>Понравившиеся посты</p>
                </div>
                <div class="icon">
                    <i class="nav-icon fas fa-list-alt"></i>
                </div>
                <a href="{{ route('blog.personal.post.index') }}" class="small-box-footer">Посмотреть <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->

    </div>
    <!-- /.row (main row) -->
@endsection
