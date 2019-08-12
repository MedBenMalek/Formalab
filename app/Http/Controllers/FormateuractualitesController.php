<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Actualite;
use App\Admin;
use App\Formateur;
use Auth;
use Illuminate\Support\Facades\Validator;

class FormateuractualitesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:formateur');
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $actualites = Actualite::where('id_formateur',Auth::user()->id)->where('etat','active')->orderBy('id_actualite','DESC')->get();
       //$admin = Admin::where('id', $actualites['id_admin']);
       //$formateur = Formateur::where('id', $actualites['id_formateur']);
       $i = 0;
       return view('formateur.actualites.index', compact('actualites','i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $actualites = Actualite::all();
        return view('formateur.actualites.create' , compact('actualites'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $validator = Validator::make($request->all(),
          [
          'titre_actualite' => 'required|max:255',
          'description_actualite' => 'required',
          'image' => 'mimes:jpeg,png|max:10240'

          ]);

      if ($validator->fails()) {
          return redirect()->back()
              ->withErrors($validator)
              ->withInput();
          }

        $actualite = new Actualite();

        $actualite['titre_actualite'] = $request['titre_actualite'];
        $actualite['description_actualite'] = $request['description_actualite'];
        $actualite['id_formateur'] = Auth::user()->id;

        $image = $request->file('image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $request->file('image')->move("adm/assets/images/actualite/",$imageName);
        $actualite->image = $imageName;


        $actualite->save();

        return redirect()->route('actualite.index')->with('success','votre actualité a été crée avec succès!');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id_actualite
     * @return \Illuminate\Http\Response
     */
    public function edit($id_actualite)
    {
        $actualite = Actualite::find($id_actualite);
        return view('formateur.actualites.edit', compact('actualite'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id_actualite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_actualite)
    {

      $validator = Validator::make($request->all(),
          [
          'titre_actualite' => 'required|max:255',
          'description_actualite' => 'required',
          'image' => 'mimes:jpeg,png|max:10240'

          ]);

      if ($validator->fails()) {
          return redirect()->back()
              ->withErrors($validator)
              ->withInput();
          }

        $actualite = actualite::find($id_actualite);
        $actualite['titre_actualite'] = $request['titre_actualite'];
        $actualite['description_actualite'] = $request['description_actualite'];

        if(!empty($request['image'])){

            //delete image
            $imageName = $actualite['image'];
            unlink('adm/assets/images/actualite/'.$imageName);

            //update image
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();

            $request->file('image')->move("adm/assets/images/actualite/",$imageName);
            $actualite->image = $imageName;

        }


        $actualite->save();
        return redirect()->route('actualite.index')->with('success','votre actualité a été modifier avec succès!');
    }

    public function archive()
    {
        $actualites = Actualite::where('id_formateur',Auth::user()->id)->where('etat','archiver')->orderBy('id_actualite','DESC')->get();

        $i = 0;
        return view('formateur.actualites.archive', compact('actualites','i'));
    }

    public function archiver($id)
    {
        $actualites = Actualite::find($id);
        $actualites['etat'] = 'archiver';
        $actualites->save();

        return back()->with('success','Votre actualité a été archiver avec succès');
    }

    public function activer($id)
    {
        $actualites = Actualite::find($id);
        $actualites['etat'] = 'active';
        $actualites->save();

        return back()->with('success','Votre actualité a été activer avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id_actualite
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_actualite)
    {

      	$actualite = Actualite::find($id_actualite);
        $imageName = $actualite['image'];
        unlink('adm/assets/images/actualite/'.$imageName);
        $actualite->delete();

        return redirect()->route('actualite.index')->with('success','votre actualité a été supprimer avec succès!');
    }
}
