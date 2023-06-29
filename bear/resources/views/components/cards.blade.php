<section class="main">

    @foreach ($singers as $singer)
        <div class="card">
            <img src="{{ url('/uploads/' . $singer->image) }}" alt="">
            <div class="card-content">
                <h2>{{ $singer->title }}</h2>
                <p>{{ $singer->description }}</p>
                <a href="#">Songs</a>
                @if (Auth::user() != null && Auth::user()['role'] == 2)
                    <div class="crud">
                        <a href="edit/{{ $singer->id }}"><i class="fa fa-pencil btn-crud" aria-hidden="true"></i>

                        </a>

                        <a href="#" onclick="destroyItem({{ $singer->id }})"
                            style="color:lightcoral;"><i class="fa fa-ban btn-crud"
                            aria-hidden="true"></i></a>
                        <form id="delete-singer-{{ $singer->id }}" action="destroy/{{$singer->id}}"
                            method="POST">
                            @csrf
                            @method('DELETE')

                        </form>
                    </div>
                @endif
            </div>
        </div>
    @endforeach
    @if (Auth::user() != null && Auth::user()['role'] == 2)
        <div class="">
            <a href="{{ route('create') }}" class="create"><i class="fa fa-plus btn-crud" aria-hidden="true"></i>

            </a>
        </div>
    @endif
    <script>
        function destroyItem(id) {
            document.querySelector("#delete-singer-" + id).submit()
        }
    </script>
</section>
