<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;


class GameController extends Controller
{
    public function add(Request $request)
    {
        $validated = $request->validateWithBag('game',
            [
                'name'=>'required|max:255|string',
                'rating'=>'required|string',
                'rdate' => 'required',
                'gcover' => 'required',
                'trailer'=>'required'
            ]);
        $manager = new ImageManager(new Driver);

        $cover = $manager->read($request->file('gcover'));
        $encoded = $cover->encodeByMediaType('image/jpeg',progressive:true, quality:100);

        Game::create([
            'title'=>$request->name,
            'rating'=>$request->rating,
            'release_date' => $request->rdate,
            'cover' => $encoded,
            'trailer_link' => $request->trailer
        ]);

        return redirect()->back();
    }


    public function delete($id) {
        $game = Game::find($id);
        if(!$game){
            return redirect()->back()->with("error");
        }
        $game->delete();

        return redirect()->back()->with('success');
    }
    
    public function img($id){
        $game_img = Game::find($id)->cover;

        return response($game_img, 200)->header('Content-Type', 'image/jpeg');
    }

    public function home(Request $request) {
        if($request->user()->is_admin){
            return redirect()->intended('/dashboard');
        }
        return view('nm-home', ['auth_user'=>$request->user()->name,
        'games'=>$this->games($request)
    ]);
    }

    public function admin(Request $request) {
        if($request->user()->is_admin){
            return view('nm-adm-dashboard',
             ['auth_user'=>$request->user()->name,
                    'games'=>$this->games($request, ['id','title','release_date','rating'])
                ]);
        }else{
            return redirect()->intended('/');
        }
    }

    public function test_admin(Request $request) {
        if($request->user()->is_admin){
            return response($this->games($request,['cover']), 200)->header('Content-Type', 'image/jpg');
        }else{
            return redirect()->intended('/');
        }
    }

    private function games(Request $request,array $columns=['*']) {
        $yob = (int)substr($request->user()->date_of_birth, 0,4);
        $datenow = (int)date('Y');
        $age = $datenow - $yob;
        $games = null;

        if($age >= 17){
            $ratingsAllowed = ['E', '10+', 'T', 'M'];
        }else  if ($age >= 13){
            $ratingsAllowed = ['E', '10+', 'T'];
        }else if ($age >= 10){
            $ratingsAllowed = ['E', '10+'];
        }else {
            $ratingsAllowed = ['E'];
        }

        $games = Game::whereIn('rating', $ratingsAllowed)->select($columns)->get();

        return $games;
    }

}
