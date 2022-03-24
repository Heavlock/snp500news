<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaginationRequest;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TagController extends Controller
{

    public function index(PaginationRequest $request)
    {
//        $request->validatePagination();
        $currentPage = $request->page;
        $tags = cache()->remember('tagIndex' . $currentPage, 1000, function () {
            return Tag::latest()->simplePaginate(20);
        });
        return view('pages.tag.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function show(Tag $tag, Request $request)
    {
        $currentPage = $request->page;
        $posts = cache()->remember($currentPage . 'tag' . $tag->slug, 3600, function () use ($tag) {
            return $tag->posts()->latest()->simplePaginate(20);
        });
        return view('pages.tag.show', compact('tag', 'posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        //
    }
}
