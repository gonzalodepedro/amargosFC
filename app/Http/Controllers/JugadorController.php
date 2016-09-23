<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Jugador;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator as Paginator;

class JugadorController extends Controller {

	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
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
		$q = Jugador::query();
		
		if(!empty($input['apodo']))
		{
		 $q->where('apodo','like','%'.$input['apodo'].'%');
		}
		if(!empty($input['page']))
		{
		 $currentPage = $input['page'];
		}
		Paginator::currentPageResolver(function() use ($currentPage) {
		    return $currentPage;
		});
		$jugadors = $q->orderBy('id','desc')->paginate($totalPerPage);
		$count = $jugadors->count();
	
		return view('jugadors.index', compact('jugadors','count','current'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('jugadors.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$jugador = new Jugador();

		$jugador->nombre = $request->input("nombre");
        $jugador->apellido = $request->input("apellido");
        $jugador->apodo = $request->input("apodo");
        $jugador->fechaNacimiento = $request->input("fechanacimiento");

		$jugador->save();

		return redirect()->route('jugadors.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$jugador = Jugador::findOrFail($id);

		return view('jugadors.show', compact('jugador'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$jugador = Jugador::findOrFail($id);

		return view('jugadors.edit', compact('jugador'));
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
		$jugador = Jugador::findOrFail($id);

		$jugador->nombre = $request->input("nombre");
        $jugador->apellido = $request->input("apellido");
        $jugador->apodo = $request->input("apodo");
        $jugador->fechaNacimiento = $request->input("fechanacimiento");

		$jugador->save();

		return redirect()->route('jugadors.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$jugador = Jugador::findOrFail($id);
		$jugador->delete();

		return redirect()->route('jugadors.index')->with('message', 'Item deleted successfully.');
	}

}
