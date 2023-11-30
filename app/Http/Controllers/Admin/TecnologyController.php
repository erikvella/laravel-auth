<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tecnology;
use Illuminate\Support\Str;

class TecnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tecnologies = Tecnology::all();
        return view('admin.tecnologies.index' , compact('tecnologies'));
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
        // prima di creare una nuova tecnologia verifichiamo se esiste già
        // se esiste non creo la nuova tecnologia ma ritorno alla index
        $exist = Tecnology::where('name' , $request->name)->first();
        if($exist){
            return redirect()->route('admin.tecnologies.index')->with('error' , 'Questa tecnologia esiste già!');
        }else{
            $new_tecnology = new Tecnology();
            $new_tecnology->name = $request->name;
            $new_tecnology->slug = Str::slug($request->name , '-');
            $new_tecnology->save();
            return redirect()->route('admin.tecnologies.index')->with('success' , 'Nuova tecnologia inserita correttamente');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, Tecnology $tecnology)
    {
    //  1 validare il dato
    // 2 generare lo slug
    // 3 effettuare l'update
    // 4 reindirizzare all'index
    dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tecnology $tecnology)
    {
        $tecnology->delete();
         return redirect()->route('admin.tecnologies.index')->with('success' , 'Tecnologia eliminata correttamente');
    }
}
