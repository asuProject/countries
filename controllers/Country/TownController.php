<?php

namespace App\Http\Controllers\Country;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Country;
use App\Town;

class TownController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$towns = Town::all();

		return view('country.town.index', compact('towns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$countries = Country::all();

		return view('country.town.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$this->validate($request, [
			'country_id' => 'required|numeric|exists:countries,id',
			'name' => 'required|between:3,25'
		]);

		$country = Country::find($request['country_id']);

		$country->Town()->create([
			'name' => $request['name']
		]);

		return redirect()->route('country.town.index')->with('alert-class', 'alert-success')->with('message', 'Done!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$town = Town::find($id);

		return view('country.town.show', compact('town'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$countries = Country::all();
		$town = Town::find($id);

		return view('country.town.edit', compact('countries', 'town'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
		$this->validate($request, [
			'country_id' => 'required|numeric|exists:countries,id',
			'name' => 'required|between:3,25'
		]);

		$town = Town::find($id);

		if ($town)
		{
			$town->update([
				'country_id' => $request['country_id'],
				'name' => $request['name']
			]);

			return redirect()->route('country.town.index')->with('alert-class', 'alert-success')->with('message', 'Done!');
		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$town = Town::find($id);

		if ($town)
		{
			$town->delete();

			return redirect()->route('country.town.index')->with('alert-class', 'alert-success')->with('message', 'Done!');
		}
    }


    public function get_ajax_towns(Request $request)
    {
        if($request->isMethod('post')){
            $country_id = $request->get('country_id',false);
            if($country_id){
                $country = Country::find($country_id);
                if($country){
                    $towns = $country->Town()->all();
                    return compact('towns');
                }
                return abort('500','Country not Found');
            }
            return abort('500','Country not Found');
        }
        return abort('405','Method not allowed');
    }
    
}