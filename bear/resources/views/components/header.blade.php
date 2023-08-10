<header>
    <div class="navig">
        <h1>Oblivion</h1>
        <nav class="navi">
            <ul>
                <li><a href="#">About</a></li>
                <li><a href="#">Gallery</a></li>
                <li><a href="#">Music</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Contact</a></li>

            </ul>
        </nav>
       
       @if (Auth::user() != null)
         @foreach ($users as $user)
         <div class="user-profile">
            <img src="{{ url('/profile-user/' . $user->image) }}" alt="">
            <h3>{{$user->name}}</h3>
            {{-- <i>{{}}</i> --}}
           </div>
         @endforeach
       @else
           
       @endif
       
    </div>
    <section class="hero">
        <div class="intro">
            <h2>Oblivion</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis vitae ullam in praesentium totam est
                facere iusto mollitia veritatis optio!</p>
        </div>

    </section>
</header>
