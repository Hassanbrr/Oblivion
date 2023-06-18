<section class="main">
    <div class="cards"></div>
    @foreach ($singers as $singer)
        <div class="card">
            <img src="{{ url('/uploads/' . $singer->image) }}" alt="">
            <div class="card-content">
                <h2>{{ $singer->title }}</h2>
                <p>{{ $singer->description }}</p>
                <a href="#">Songs</a>
            </div>
        </div>
    @endforeach
</section>
