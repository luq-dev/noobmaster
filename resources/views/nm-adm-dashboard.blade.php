<x-nm-app page_title="Dashboard">
<div class="page-container">
        <x-nm-admin-header/>
        <div>
            <form id="gregister" method='POST' action="/addgame" enctype="multipart/form-data">
                
            @csrf
                <input type="text" name="name" id="" placeholder="Game Name">
                
                <input type="date" name="rdate" id="">
                
                <select name="rating" id="rating" placeholder="Game Rating">
                    <option value="M">ESRB M</option>
                    <option value="10+">ESRB 10+</option>
                    <option value="T">ESRB T</option>
                    <option value="E">ESRB E</option>
                </select>
                
                <input type="file" name="gcover">
                <input type="text" name="trailer" placeholder="Trailer">
            
                <x-nm-submit-btn value="Add" id="adm-smt"/>
            </form>
            <br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
            <br>
        </div>
        <div class="game-listing">
            <table>
                <thead>
                        <td class="s-n">S/N</td>
                        <td class="gname">Name</td>
                        <td class="grdate">Release Date</td>
                        <td class="grating">Rating</td>
                        <td class="gcover">Actions</td>
                </thead>
                <tbody>
                    @foreach($games as $game)
                    <tr class="g">
                        <td class="s-n">{{ $game->id }}</td>
                        <td class="gname">{{ $game->title }}</td>
                        <td class="grdate">{{ $game->release_date }}</td>
                        <td class="grating">{{ $game->rating }}</td>
                        <td class="gcover">
                            <form method='POST' action="/deletegame/{{ $game->id }}">
                                @csrf
                                <button>delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
</x-nm-app>