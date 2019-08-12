<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Formation;
use App\Inscription;
use App\Categorie;
use App\Http\Controllers\Controller;
use Carbon;
use Excel;
use Illuminate\Support\Facades\Input;
use DB;
use Validator;
use Mail;

class inscriptionsCRUDController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index() 
    {
        
        $time = Carbon\Carbon::now();
    	$i = 0;
    	$formations = Formation::orderBy('start')->with('inscriptions')->where('start','>=', $time)->get();
    	return view('administrateur.inscriptions.index', compact('i', 'formations'));
        
        }

        
    
    public function archive(){

        $time = Carbon\Carbon::now();
        $i = 0;
        $formations = Formation::orderBy('start')->where('end', '<', $time)->get();
        return view('administrateur.inscriptions.archive', compact('formations','i'));
    }


    public function listInscription($id) {

        $time = Carbon\Carbon::now();
        $formations = Formation::orderBy('start')->where('end', '>', $time)->find($id);
        $inscriptions = Inscription::where('id_formation',$id)->get();
        $i = 0;
        return view('administrateur.inscriptions.listInscription', compact('formations', 'inscriptions','i'));
    }

    public function listInscription_archive($id) {

        $time = Carbon\Carbon::now();
        $formations = Formation::orderBy('start')->where('end', '<', $time)->find($id);
        $inscriptions = Inscription::where('id_formation',$id)->get();
        $i = 0;
        return view('administrateur.inscriptions.listInscription_archive', compact('formations', 'inscriptions','i'));
    }

    public function show($id ,$inscription) {

        $formations = Formation::find($id);
        $inscriptions = Inscription::where('id_inscription',$inscription)->first();
        $categorie = Categorie::where('id_categorie', $formations['id_categorie'])->first();

        return view('administrateur.inscriptions.show', compact( 'inscriptions','formations','categorie'));
    }

     public function show_archive($id ,$inscription) {

        $formations = Formation::find($id);
        $inscriptions = Inscription::where('id_inscription',$inscription)->first();
        $categorie = Categorie::where('id_categorie', $formations['id_categorie'])->first();

        return view('administrateur.inscriptions.show_archive', compact( 'inscriptions','formations','categorie'));
    }

    public function accepter(Request $request,$id) {

        $inscriptions = Inscription::find($id);
        $inscriptions['etat'] = $request['accepter'];
        $inscriptions->save();

        $data = [
        'name' => $inscriptions['nom'],
        'lastname' => $inscriptions['prenom'],
        'email' => $inscriptions['email'],
        ];

        Mail::send('emails.inscription', $data, function($message) use ($data){

            $message->from('admin@formalab.tn');
            $message->to($data['email']);
            $message->subject('Votre pré-inscription a été acceptée');

        });

        return back()->with('success','L inscription a été accepter');
    }

    public function refuser(Request $request,$id) {

        $inscriptions = Inscription::find($id);
        $inscriptions['etat'] = $request['Refuser'];
        $inscriptions->save();

        return back()->with('success','L inscription a été refuser');
    }

    public function importExcel($id)
    {

        $input = Input::all();

        $validator = Validator::make($input,
            [
            'import_file' => 'required|mimes:xlsx',
            ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
            }

        if(Input::hasFile('import_file')){
            $path = Input::file('import_file')->getRealPath();
            $data = Excel::load($path, function($reader) {
            })->get();
            if(!empty($data) && $data->count()){
                foreach ($data as $key => $value) {
                    $insert[] = ['nom' => $value->nom, 'prenom' => $value->prenom, 'niveau_etude' => $value->niveau_etude, 'telephone' => $value->telephone, 'email' => $value->email, 'id_formation'=> $id];
                }
                if(!empty($insert)){
                    DB::table('inscriptions')->insert($insert);
                }
            }
            return back();
        }
            return back()->with('success','votre fichier excel a été importé avec succée');
        
    }

    public function downloadExcel($id, $type)
    {
        $data = Inscription::get()->where('id_formation',$id)->toArray();
        return Excel::create('list_inscriptions', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
    }

   

}
