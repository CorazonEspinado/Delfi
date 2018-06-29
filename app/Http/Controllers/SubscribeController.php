<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sadala;
use App\Subscriber;

class SubscribeController extends Controller
{
    public function SubscribeForm() {
        
        $sadalas = sadala::all();
        return view ('users.subscribe.subscribeform')
                ->with(['sadalas' => $sadalas]);
    }
    
    public function SubscribeStore(Request $request) {
        $this->validate($request, [
            'subscriber' => 'required|max:15',
            'email' => 'required|max:30|unique:subscribers'
            ]);
        Subscriber::Create([
            'subscriber'=>$request['subscriber'],
            'email'=>$request['email']
            ]);
        $request->session()->flash('success', 'Вы только что подписались на свежие новости!');
        return redirect()->route('main');
    }
}
