<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaginationRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $searchRequest = $request->validate([
            'search' => 'required|string|max:255',
            'page' => 'nullable'
        ]);
        $posts = cache()->remember($request->page . 'search' . $request->search, 1500, function () use ($searchRequest) {
            return Post::where('description', 'LIKE', "%{$searchRequest['search']}%")->orWhere('h1', 'LIKE', "%{$searchRequest['search']}%")->latest()->simplePaginate(20);
        });
        return view('pages.searchResult', compact('searchRequest', 'posts'));
    }

    public function microsoft(Request $request)
    {
        $search = ['micro', 'майкро'];
        $title = 'Компания Microsoft';
        $posts = cache()->remember($request->page . 'searchMicrosoft', 1500, function () use ($search) {
            return Post::where('description', 'LIKE', "%{$search['0']}%")->orWhere('h1', 'LIKE', "%{$search['0']}%")->orWhere('description', 'LIKE', "%{$search['1']}%")->orWhere('h1', 'LIKE', "%{$search['1']}%")->latest()->simplePaginate(20);
        });
        return view('pages.companys.index', compact('posts', 'title'));
    }

    public function tesla(Request $request)
    {
        $search = ['tesla', 'тесла'];
        $title = 'Компания Tesla';
        $posts = cache()->remember($request->page . 'searchTesla', 1500, function () use ($search) {
            return Post::where('description', 'LIKE', "%{$search['0']}%")->orWhere('h1', 'LIKE', "%{$search['0']}%")->orWhere('description', 'LIKE', "%{$search['1']}%")->orWhere('h1', 'LIKE', "%{$search['1']}%")->latest()->simplePaginate(20);
        });
        return view('pages.companys.index', compact('posts', 'title'));
    }

    public function gold(Request $request)
    {
        $search = ['золот', 'gold'];
        $title = 'Золото';
        $posts = cache()->remember($request->page . 'searchGold', 1500, function () use ($search) {
            return Post::where('description', 'LIKE', "%{$search['0']}%")->orWhere('h1', 'LIKE', "%{$search['0']}%")->orWhere('description', 'LIKE', "%{$search['1']}%")->orWhere('h1', 'LIKE', "%{$search['1']}%")->latest()->simplePaginate(20);
        });
        return view('pages.companys.index', compact('posts', 'title'));
    }

    public function bitcoin(Request $request)
    {
        $search = ['битк', 'bitcoin'];
        $title = 'Bitcoin';
        $posts = cache()->remember($request->page . 'searchBitcoin', 1500, function () use ($search) {
            return Post::where('description', 'LIKE', "%{$search['0']}%")->orWhere('h1', 'LIKE', "%{$search['0']}%")->orWhere('description', 'LIKE', "%{$search['1']}%")->orWhere('h1', 'LIKE', "%{$search['1']}%")->latest()->simplePaginate(20);
        });
        return view('pages.companys.index', compact('posts', 'title'));
    }

    public function virginGalactic(Request $request)
    {
        $search = ['вирджин', 'virgin'];
        $title = 'Virgin Galactic';
        $posts = cache()->remember($request->page . 'searchVirginGalactic', 1500, function () use ($search) {
            return Post::where('description', 'LIKE', "%{$search['0']}%")->orWhere('h1', 'LIKE', "%{$search['0']}%")->orWhere('description', 'LIKE', "%{$search['1']}%")->orWhere('h1', 'LIKE', "%{$search['1']}%")->latest()->simplePaginate(20);
        });
        return view('pages.companys.index', compact('posts', 'title'));
    }

    public function China(Request $request)
    {
        $search = ['китай', 'китая'];
        $title = 'Компании Китая';
        $posts = cache()->remember($request->page . 'searchChina', 1500, function () use ($search) {
            return Post::where('description', 'LIKE', "%{$search['0']}%")->orWhere('h1', 'LIKE', "%{$search['0']}%")->orWhere('description', 'LIKE', "%{$search['1']}%")->orWhere('h1', 'LIKE', "%{$search['1']}%")->latest()->simplePaginate(20);
        });
        return view('pages.companys.index', compact('posts', 'title'));
    }

    public function sberBank(Request $request)
    {
        $search = ['сберб'];
        $title = 'Сбербанк';
        $posts = cache()->remember($request->page . 'searchSberBank', 1500, function () use ($search) {
            return Post::where('description', 'LIKE', "%{$search['0']}%")->orWhere('h1', 'LIKE', "%{$search['0']}%")->latest()->simplePaginate(20);
        });
        return view('pages.companys.index', compact('posts', 'title'));
    }
}
