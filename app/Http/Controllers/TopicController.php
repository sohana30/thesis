<?php

namespace App\Http\Controllers;
use App\User;
use App\Topic;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Input;
class TopicController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topics=Topic::latest()->paginate(6);
        return view('topics.index',compact('topics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('topics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'title'=>'required|min:5',
            'content'=>'required|min:10'
        ]);
        $topic=auth()->user()->topics()->create($data);
        return redirect()->route('topics.show',$topic->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function show(Topic $topic)
    {
        return view('topics.show',compact('topic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function edit(Topic $topic)
    {
        $this->authorize('update',$topic);
        return view('topics.edit',compact('topic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Topic $topic)
    {
        $data=$request->validate([
            'title'=>'required|min:5',
            'content'=>'required|min:6'
        ]);
        $topic->update($data);
        return redirect()->route('topics.show', $topic->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topic $topic)
    {
        Topic::destroy($topic->id);
        return redirect('/forum');
    }
    public function search(){
        $q = Input::get('search');
        if ($q != ''){
            $user = Topic::where('title', 'LIKE', '%' . $q . '%')
                ->orWhere('content', 'LIKE', '%' . $q . '%')
                
                ->get();
            if (count($user) > 0)
                return view('search')->withDetails($user)->withQuery($q);
            }
        return view('search')->withMessage('No users found!');
        return response()->json($result);

    }
}
