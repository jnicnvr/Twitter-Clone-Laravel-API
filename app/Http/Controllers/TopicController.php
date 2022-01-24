<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTopicRequest;
use App\Http\Requests\UpdateTopicRequest;
use App\Http\Resources\TopicResource;
use App\Models\Post;
use App\Models\Topic;
use App\Policies\TopicPolicy;

// use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function index()
    {
        $topic = Topic::latestFirst()->paginate(5);
        return TopicResource::collection($topic);
    }
    public function store(StoreTopicRequest $request)
    {
        $topic = new Topic;
        $topic->title = $request->title;
        $topic->user()->associate($request->user());

        $post = new Post;
        $post->body = $request->body;
        $post->user()->associate($request->user());
        
        $topic->save();
        $topic->posts()->save($post);

        return new TopicResource($topic);
    }
    public function show(Topic $topic)
    {
        return new TopicResource($topic);
    }
    public function update(Topic $topic, UpdateTopicRequest $request)
    {
        $this->authorize('update', $topic);
        $topic->title = $request->get('title', $request->title);
        $topic->save();

        return new TopicResource($topic);
    }

    public function destroy(Topic $topic)
    {       
        $this->authorize('destroy', $topic);
        $topic->delete();
        return response(null,204);
    }
}
