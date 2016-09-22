<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Tweet;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator as Paginator;

class TweetController extends Controller {

	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$currentPage = 1;
		$totalPerPage = 1;

		// force current page to 5
		
		$input = $request->all();
		$q = Tweet::query();
		
		if(!empty($input['title']))
		{
		 $q->where('title','like','%'.$input['title'].'%');
		}
		if(!empty($input['page']))
		{
		 $currentPage = $input['page'];
		}
		Paginator::currentPageResolver(function() use ($currentPage) {
		    return $currentPage;
		});
		$tweets = $q->orderBy('id','desc')->paginate($totalPerPage);
		$count = $tweets->count();

		return view('tweets.index', compact('tweets','count','current'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('tweets.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, [
	     'title' => 'required|unique:tweets|max:255',
	      'body' => 'required',
	    ]);
		$tweet = new Tweet();

		$tweet->title = $request->input("title");
        $tweet->body = $request->input("body");

		$tweet->save();

		return redirect()->route('tweets.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$tweet = Tweet::findOrFail($id);

		return view('tweets.show', compact('tweet'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$tweet = Tweet::findOrFail($id);

		return view('tweets.edit', compact('tweet'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @param Request $request
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$tweet = Tweet::findOrFail($id);

		$tweet->title = $request->input("title");
        $tweet->body = $request->input("body");

		$tweet->save();

		return redirect()->route('tweets.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$tweet = Tweet::findOrFail($id);
		$tweet->delete();

		return redirect()->route('tweets.index')->with('message', 'Item deleted successfully.');
	}

}
