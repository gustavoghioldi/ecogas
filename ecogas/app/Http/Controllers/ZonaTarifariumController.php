<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\ZonaTarifarium;
use Illuminate\Http\Request;

class ZonaTarifariumController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$zona_tarifarias = ZonaTarifarium::orderBy('id', 'desc')->paginate(10);

		return view('zona_tarifarias.index', compact('zona_tarifarias'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('zona_tarifarias.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$zona_tarifarium = new ZonaTarifarium();

		$zona_tarifarium->zona = $request->input("zona");
        $zona_tarifarium->valor = $request->input("valor");

		$zona_tarifarium->save();

		return redirect()->route('zona_tarifarias.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$zona_tarifarium = ZonaTarifarium::findOrFail($id);

		return view('zona_tarifarias.show', compact('zona_tarifarium'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$zona_tarifarium = ZonaTarifarium::findOrFail($id);

		return view('zona_tarifarias.edit', compact('zona_tarifarium'));
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
		$zona_tarifarium = ZonaTarifarium::findOrFail($id);

		$zona_tarifarium->zona = $request->input("zona");
        $zona_tarifarium->valor = $request->input("valor");

		$zona_tarifarium->save();

		return redirect()->route('zona_tarifarias.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$zona_tarifarium = ZonaTarifarium::findOrFail($id);
		$zona_tarifarium->delete();

		return redirect()->route('zona_tarifarias.index')->with('message', 'Item deleted successfully.');
	}

}
