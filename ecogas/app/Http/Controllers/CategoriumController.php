<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Categorium;
use Illuminate\Http\Request;

class CategoriumController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$categorias = Categorium::orderBy('id', 'desc')->paginate(10);

		return view('categorias.index', compact('categorias'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('categorias.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$categorium = new Categorium();

		$categorium->name = $request->input("name");

		$categorium->save();

		return redirect()->route('categorias.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$categorium = Categorium::findOrFail($id);

		return view('categorias.show', compact('categorium'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$categorium = Categorium::findOrFail($id);

		return view('categorias.edit', compact('categorium'));
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
		$categorium = Categorium::findOrFail($id);

		$categorium->name = $request->input("name");

		$categorium->save();

		return redirect()->route('categorias.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$categorium = Categorium::findOrFail($id);
		$categorium->delete();

		return redirect()->route('categorias.index')->with('message', 'Item deleted successfully.');
	}

}
