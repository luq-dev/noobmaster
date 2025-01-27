@props(
    [
    'game_id'=>1,
    'game_title'=>'God Of War: Ragnarok',
    'game_release_year'=>2018,
    'game_rating'=>'ESRB 16+'
    ]
)

<tr class="g">
    <td class="s-n">{{ $game_id }}</td>
    <td class="gname">{{ $game_title }}</td>
    <td class="grdate">{{ $game_release_year }}</td>
    <td class="grating">{{ $game_rating }}</td>
    <td class="gcover">
        <form action="/deletegame/{{$game_id}}">
            <button>delete</button>
        </form>
    </td>
</tr>