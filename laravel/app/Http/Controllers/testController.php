<?php

namespace App\Http\Controllers;

use App\Mail\testMail;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class testController extends Controller
{
    public function index()
    {
//        Mail::to(User::find(1))->send(new testMail());
//        $ids = Post::select('id')->latest()->skip(1000)->take(1000)->pluck('id');
//        return Post::whereIn('id', $ids)->delete();
    }
}
