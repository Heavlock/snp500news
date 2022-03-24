<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaginationRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(PaginationRequest $request)
    {
        $currentPage = $request->page;
        $posts =
            cache()->remember('postIndex' . $currentPage, 1000, function () {
                return
                    Post::latest()->simplePaginate(15);
            });

        return view('pages.post.index', compact('posts', 'currentPage'));
    }

    public function create()
    {
        abort(403);
    }

    public function store(Request $request)
    {
        abort(403);
    }


    public function show($slug)
    {
        $flag = 0;
        if (is_int(strpos($slug, '_indid_'))) {
            $uri = explode('_indid_', $slug);
            $slug = $uri[0];
            $flag = 1;
        }
        $data = cache()->remember($slug, 10000, function () use ($slug) {
            $post = Post::where('slug', $slug)->get()->first();
            $body = '';
            $bodyArr = json_decode($post->body, 1);
            foreach ($bodyArr as $key => $paragraph) {
                $body .= '<p>' . $paragraph . '</p>' . PHP_EOL;
                if ($key == 5) {
                    $body .= '<!-- Yandex.RTB R-A-1285108-2 -->
                                <div id="yandex_rtb_R-A-1285108-2"></div>
                                <script>window.yaContextCb.push(()=>{
                                  Ya.Context.AdvManager.render({
                                    renderTo: "yandex_rtb_R-A-1285108-2",
                                    blockId: "R-A-1285108-2"
                                  })
                                })</script>';
                }
            }
            $body .= '<p class="font-weight-bold">Дата Обновления поста: ' . $post->updated_at . '</p>';
            $body .= '<!-- Yandex.RTB R-A-1285108-3 -->
<div id="yandex_rtb_R-A-1285108-3"></div>
<script>window.yaContextCb.push(()=>{
  Ya.Context.AdvManager.render({
    renderTo: "yandex_rtb_R-A-1285108-3",
    blockId: "R-A-1285108-3"
  })
})</script>';
            return ['post' => $post, 'body' => $body];
        });
        $post = $data['post'];
        $body = $data['body'];
        if (!$flag && !empty($post->index)) return redirect('/posts/' . $slug . '_indid_' . $post->index);
        return view('pages.post.show', compact('post', 'body'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function home(Request $request)
    {
        $currentPage = $request->page;
        $posts =
            cache()->remember('postHome' . $currentPage, 500, function () {
                return Post::latest()->simplePaginate(20);
            });
        return view('home', compact('posts', 'currentPage'));
    }
}
