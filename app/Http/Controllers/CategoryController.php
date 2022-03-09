<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Category $category
     * @return void
     */
    public function show(Category $category)
    {
        // $category->project // no funciona pq no tiene el método links en la colección (no lo queremos y también tenemos el problema N+1 - necesitamos la relación)
        // Podríamos utilizar $category->projects->load('category') para que cargue la categoría de cada proyecto y solucionar el problema N+1
        // Pero necesitamos los proyectos paginados y no podemos hacer $category->projects->load('category')->paginate()

        // $category->projects -> objeto Collection
        // $category->projects() -> objeto HasMany

        // Vamos a utilizarlo como método para tener acceso al QueryBuilder
        // $category->projects()->with('category)->paginate()
        // ddd($category->projects()->with('category')->latest()->paginate());

        // dd($category->projects);

        return view('projects.index', [
            'category' => $category,
            'projects' => $category->projects()->with('category')->latest()->paginate()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
