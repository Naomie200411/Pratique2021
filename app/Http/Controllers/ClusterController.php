<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClusterRequest;
use App\Models\Cluster;
use App\Models\Filiere;
use App\Models\Village;
use Illuminate\Http\Request;

class ClusterController extends Controller
{
    public function index()
    {

        $clusters = Cluster::orderBy('nom')->get();
        return view('list' , compact('clusters'));
    }

    public function create()
    {
        $filieres = Filiere::all();
        $villages = Village::all();
        //dd($filieres);
        return view('create' , compact('filieres' , 'villages') );
    }

    public function store(ClusterRequest $request)
    {
        //dd($request);
          $validatedData = $request->validated();

          if($request->validated())
          {
            $cluster = new Cluster;

            $cluster->nom = $request->input('nom');
            $cluster->filiere_id= $request->input('filiere_id');
            $cluster->village_id= $request->input('village_id');

            $cluster->save();
            return to_route('cluster.index');

          }else{
            return redirect()->back()->withErrors($validatedData)->withInput();

          }
    }

    

    public function edit(string $id)
    {
        $filieres = Filiere::all();
        $villages = Village::all();
        $cluster = Cluster::findOrfail($id);
        return view('edit', compact('filieres','villages','cluster'));


    }


    public function update(ClusterRequest $request, $id)
    {
        $cluster= Cluster::findOrFail($id);
        
        $validatedData = $request->validated();

        if($request->validated())
          {
            $cluster = new Cluster;

            $cluster->nom = $request->input('nom');
            $cluster->filiere_id= $request->input('filiere_id');
            $cluster->village_id= $request->input('village_id');

            $cluster->save();
            return to_route('cluster.index');

          }else{
            return redirect()->back()->withErrors($validatedData)->withInput();

          }

        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cluster = Cluster::findOrFail($id);
        $cluster->delete();
        return redirect()->route('cluster.index')
    ;
    }
}
