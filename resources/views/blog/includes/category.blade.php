@foreach($categories as $category)
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="{{ route('blog.category.index', $category->title) }}">{{ $category->title }}</a>
    </li>
@endforeach

