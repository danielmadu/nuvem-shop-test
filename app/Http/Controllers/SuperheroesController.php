<?php

namespace App\Http\Controllers;


use App\Domains\Superheros\Superhero;
use App\Domains\Superheros\SuperheroesImage;
use App\Http\Requests\SuperheroRequest;

class SuperheroesController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $superheroes = Superhero::paginate(5);
        return view('index')->with(compact('superheroes'));
    }

    public function show($superheroId)
    {
        $superhero = Superhero::find($superheroId);
        return view('show')->with(compact('superhero'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('create');
    }

    /**
     * @param SuperheroRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(SuperheroRequest $request)
    {
        Superhero::create($request->except('images'));
        $this->saveImages($request, (int) $request->input('id'));
        return redirect(route('index'))->with('success', 'New Superhero created.');
    }

    /**
     * @param int $superheroId
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function edit(int $superheroId)
    {
        $superhero = Superhero::find($superheroId);
        return view('edit')->with(compact('superhero'));
    }

    /**
     * @param SuperheroRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(SuperheroRequest $request)
    {
        Superhero::where('id', $request->input('id'))->update($request->except('_token', 'images'));
        $this->saveImages($request, (int) $request->input('id'));
        return redirect(route('index'))->with('success', 'Superhero edited.');
    }

    /**
     * @param int $superheroId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(int $superheroId)
    {
        SuperheroesImage::where('superhero_id', $superheroId)->delete();
        Superhero::destroy($superheroId);
        return redirect(route('index'))->with('success', 'Superhero deleted.');
    }

    /**
     * @param SuperheroRequest $request
     * @param int $superheroId
     *
     * @return void
     */
    private function saveImages(SuperheroRequest $request, int $superheroId)
    {
        //Save each image and return a array with the path and the id from the superhero created
        $images = collect($request->file('images'))->map(function ($image) use ($superheroId) {
            return [
                'path' => $image->store('images', 'public'),
                'superhero_id' => $superheroId
            ];
        })->all();

        SuperheroesImage::insert($images);
    }
}