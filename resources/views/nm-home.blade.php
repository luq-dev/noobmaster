<x-nm-app page_title="Home">

    <div class="page-container">
        <x-nm-header username="{{$auth_user}}"/>
        <div class="main-content-container">
            <div class="game-listing">
                @foreach ( $games as $game)
                <div class="game">
                    <div class="game-image">
                        <img src="data:image/jpeg;base64,{{ base64_encode($game->cover) }}" alt="">
                    </div>
                    <div class="game-title">
                        <div> {{ $game->title }} </div>
                    </div>
                    <div class="game-traits">
                        <div> ESRB {{ $game->rating }} </div>
                        <div> Released: {{ (int)substr($game->release_date, 0,4) }} </div>
                    </div>
                    <div class="game-cta">
                        <a href="{{ $game->trailer_link }}" target="_blank">
                            <button>Watch Trailer</button>
                        </a>
                    </div>
                    </div>
                @endforeach
            </div>
        </div>
        </div> 
    </div>
</x-nm-app>