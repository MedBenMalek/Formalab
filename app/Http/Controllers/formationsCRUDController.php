<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Formateur;
use App\Formation;
use App\Categorie;
use App\Tag;
use Illuminate\Support\Facades\Input;
use Carbon;
use Purifier;
use MetaTag;

class formationsCRUDController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       $time = Carbon\Carbon::now();
       $formations = Formation::orderBy('start')->where('end', '>', $time)->get();

       $i = 0;
       return view('administrateur.formationsCRUD.index', compact('formations','i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categorie::all();
        $formateurs = Formateur::all();
        return view('administrateur.formationsCRUD.create' , compact('categories', 'formateurs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $this->validate($request,[
          'title' => 'required|max:255',
          'start' => 'required|Date|After:today',
          'end' => 'required|Date|After:start',
          'duree_formation' => 'required|max:255',
          'prerequis_formation' => 'required|max:255',
          'prix_formation' => 'required|max:255',
          'objectif_formation' => 'required',
          'programme_formation' => 'required',
          'image' => 'mimes:jpeg,png|max:10240'

          ]);

        
        $start = Carbon\Carbon::parse($request['start'])->format('Y-m-d H:i:s');
        $end = Carbon\Carbon::parse($request['end'])->format('Y-m-d H:i:s');


        $formation = new Formation();

        $formation['title'] = $request['title'];
        $formation['id_formateur'] = $request['id_formateur'];
        $formation['id_categorie'] = $request['id_categorie'];
        $formation['start'] = $start;
        $formation['end'] = $end;
        $formation['duree_formation'] = $request['duree_formation'];
        $formation['prerequis_formation'] = $request['prerequis_formation'];
        $formation['prix_formation'] = $request['prix_formation'];
        $formation['objectif_formation'] = $request['objectif_formation'];
        $formation['programme_formation'] = Purifier::clean($request['programme_formation']);
        $formation['color'] = $request['color'];


        //uploade image
        $image = $request->file('image_formation');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $request->file('image_formation')->move("adm/assets/images/formation/",$imageName);
        $formation->image_formation = $imageName;


        $formation->save();

        $categorieSlug = Categorie::where('id_categorie',$request['id_categorie'])->first();

        $formation['url'] = url('formations/'.$categorieSlug['slug'].'/'.$formation['slug']);
        $formation->save();


        $time = Carbon\Carbon::now();
        $formationTag = Formation::where('end', '>', $time)->where('objectif_formation', $request['objectif_formation'])->where('start', $start)->first();

        $taggles=Input::get('taggles');

        foreach ( $taggles as $t ) {

            $tags = new Tag();
            $tags['name'] = $t;
            $tags['id_formation'] = $formationTag['id'];
            $tags->save();

        }



        return redirect()->route('formations.index')
                        ->with('success','Votre formation a été crée avec succès');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Categorie::all();
        $formateurs =Formateur::all();
        $formation = Formation::find($id);
        return view('administrateur.formationsCRUD.edit', compact('categories','formation', 'formateurs'));
    }

     public function archive(){

        $time = Carbon\Carbon::now();
        $formations = Formation::orderBy('start')->where('end', '<', $time)->get();
        $i = 0;
        return view('administrateur.formationsCRUD.archive', compact('formations','i'));
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

      $this->validate($request,[
          'title' => 'required|max:255',
          'start' => 'required|Date|After:today',
          'end' => 'required|Date|After:start',
          'duree_formation' => 'required|max:255',
          'prerequis_formation' => 'required|max:255',
          'prix_formation' => 'required|max:255',
          'objectif_formation' => 'required',
          'programme_formation' => 'required',
          'image' => 'mimes:jpeg,png|max:10240'

          ]);

        $formation = Formation::find($id);
        $formation['title'] = $request['title'];
        $formation['id_categorie'] = $request['id_categorie'];
        $formation['id_formateur'] = $request['id_formateur'];
        $formation['start'] = $request['start'];
        $formation['end'] = $request['end'];
        $formation['duree_formation'] = $request['duree_formation'];
        $formation['prerequis_formation'] = $request['prerequis_formation'];
        $formation['prix_formation'] = $request['prix_formation'];
        $formation['objectif_formation'] = $request['objectif_formation'];
        $formation['programme_formation'] = Purifier::clean($request['programme_formation']);
        $formation['color'] = $request['color'];

    if(!empty($request['image_formation'])){

        //delete image
        $imageName = $formation['image_formation'];
        unlink('adm/assets/images/formation/'.$imageName);

        //update image
        $image = $request->file('image_formation');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $formation->image_formation = $imageName;

        $request->file('image_formation')->move("adm/assets/images/formation/",$imageName);

    }

        $formation->save();
        return redirect()->route('formations.index')
                         ->with('success','Votre formation a été modiflier avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $formation = Formation::find($id);
        $imageName = $formation['image_formation'];
        unlink('adm/assets/images/formation/'.$imageName);
        $formation->delete();
        $tags = tag::where('id_formation',$id)->get();
        foreach ( $tags as $tag ) {
            $tag->delete();
        }


        return redirect()->route('formations.index')
        				->with('success','Votre formation a été supprimer avec succès');
    }
}
