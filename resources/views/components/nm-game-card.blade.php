@props([
        'game_title'=>'God Of War: Ragnarok',
        'game_release_year'=>2018,
        'game_rating'=>'M',
        'game_community_members'=>12000,
        'game_cover'=>'',
        'game_id'=>2,
        'game_trailer' => ''
    ])


<div class="game">
<div class="game-image">
<img src="{{ route('game.img', ['id'=> $game_id ]) }}" alt="">
</div>
<div class="game-title">
<div> {{ $game_title }} </div>
</div>
<div class="game-traits">
<div> ESRB {{ $game_rating }} </div>
<div> {{ $game_release_year }} </div>
<div> {{ $game_community_members }}</div>
</div>
<div class="game-cta">
<a href="/{{$game_trailer}}">
    <button>Watch Trailer</button>
</a>
</div>
</div>