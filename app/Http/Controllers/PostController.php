<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:post_view')->only(['index', 'show']);
        $this->middleware('permission:post_create')->only(['create', 'store']);
        $this->middleware('permission:post_update')->only(['edit', 'update']);
        $this->middleware('permission:post_delete')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::query()
            ->when(
                !auth()->user()->hasRoles(['Admin', 'Super Admin']),
                function($query) {
                    $query->where('user_id', auth()->id());
                }
            )
            ->paginate(10);
        
        return view('post.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::query()->whereHas('roles', function($query) {
            $query->where('name', 'Author');
        })->get();
        return view('post.create', ['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $data = $request->validated();

        Post::query()->create($data);

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $this->authorize('update', $post);

        $users = User::query()->whereHas('roles', function($query) {
            $query->where('name', 'Author');
        })->get();
        return view('post.edit', ['post' => $post, 'users' => $users]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post)
    {
        $this->authorize('update', $post);

        $data = $request->validated();

        $post->update($data);

        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();

        return back();
    }
}