<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Inscription;
use App\Formation;
use App\Actualite;
use App\Categorie;
use DB;
use Analytics;
use App\Http\Requests;
use Charts;
use File;
use Response;
use Zipper;
use Carbon;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $time = Carbon\Carbon::now();
        $formations = Formation::with('inscriptions')->where('end', '>', $time)->get();
            foreach ($formations as $formation)
            {
                    $v[$formation->id] = $formation->inscriptions->where('id_formation', $formation->id)->count();
                    $id[] = $formation->id;
            }
        $formation = Formation::with('categorie')->get();

            if(isset($v))
            array_multisort($v,SORT_DESC,$id);

            $total = DB::table('inscriptions')->count();

            if ($total == 0 ){
                $total = 1;
            }

            

            $chart = Charts::database(Inscription::all(), 'bar', 'highcharts')
                        ->elementLabel("Total")
                        ->dimensions(1000, 500)
                        ->responsive(false)
                        ->height(300)
                        ->width (0)
                        ->lastByDay(30, false);
        return view('administrateur.index', compact('v','id','formation', 'total','analyticsData','chart'));
    }



    public function calendar(){

        return view("administrateur.calendrier.index");
    }

    public function certificat($id){

        $inscription = Inscription::find($id);
        $formation = Formation::where('id',$inscription['id_formation'])->first();
        $pdf = PDF::loadView('administrateur.generate.certificat',['inscription' => $inscription ,'formation' => $formation])->setPaper('A4', 'landscape');
        //$pdf->save('adm/assets/certificats/'.$inscription->nom.'_'.$inscription->prenom.'_certificat.pdf');
        //File::delete('adm/assets/certificats/certificat.pdf');
        return $pdf->download('certificat.pdf');
    }

    public function facture($id){

        $inscription = Inscription::find($id);
        $formation = Formation::where('id',$inscription['id_formation'])->first();
        $TVA = ($formation->prix_formation * 18) /100;
        $TCC = $formation->prix_formation + (($formation->prix_formation * 18) /100);
        $MT = $TCC + 0.500;
        $pdf = PDF::loadView('administrateur.generate.facture',['inscription' => $inscription ,'TVA' => $TVA , 'TCC' => $TCC ,'formation' => $formation , 'MT' => $MT])->setPaper('A4', 'portrait');
        return $pdf->download('facture.pdf');
    }

    public function indexcertificat(){

        $categories = Categorie::All();
        return view("administrateur.generate.indexcertificat", compact('categories'));
    }

    public function generateCertificats(Request $request){


        File::deleteDirectory('adm/assets/certificat');
        $id = $request['id_formation'];
        $inscription = Inscription::where('id_formation',$id)->where('etat','Accepté')->get();

        if ( $inscription->count() !== 0 ) {

            $formation = Formation::where('id',$id)->first();

            foreach($inscription as $inscri){
                $pdf = PDF::loadView('administrateur.generate.certificat',['inscription' => $inscri ,'formation' => $formation])->setPaper('A4', 'landscape');
                $pdf->save('adm/assets/certificat/'.$formation->title.'/'.$inscri->nom.'_'.$inscri->prenom.'_'.$inscri->id_inscription.'.pdf');
            }
            //create.zip
            $files = glob(public_path('adm/assets/certificat/'.$formation['title'].'/*'));
            Zipper::make('adm/assets/certificat/'.$formation['id'].'.zip')->add($files);
            Zipper::close();

            return response()->download(public_path("adm/assets/certificat/{$formation->id}.zip"));

        }
        else {
            return back()->with('warning','pas dinscription valide dans la formation selectionnée');
        }
    }

    public function indexFacture(){

        $categories = Categorie::All();
        return view("administrateur.generate.indexfacture", compact('categories'));
    }

    public function generateFacture(Request $request){

        File::deleteDirectory('adm/assets/facture');
        $id = $request['id_formation'];
        $inscription = Inscription::where('id_formation',$id)->where('etat','Accepté')->get();

        if ( $inscription->count() !== 0 ) {

            $formation = Formation::where('id',$id)->first();
            $TVA = ($formation->prix_formation * 18) /100;
            $TCC = $formation->prix_formation + (($formation->prix_formation * 18) /100);
            $MT = $TCC + 0.500;

            foreach($inscription as $inscri){
                $pdf = PDF::loadView('administrateur.generate.facture',['inscription' => $inscri ,'TVA' => $TVA , 'TCC' => $TCC ,'formation' => $formation , 'MT' => $MT])->setPaper('A4', 'portrait');
                $pdf->save('adm/assets/facture/'.$formation->title.'/'.$inscri->nom.'_'.$inscri->prenom.'_'.$inscri->id_inscription.'.pdf');
            }
            //create.zip
            $files = glob(public_path('adm/assets/facture/'.$formation['title'].'/*'));
            Zipper::make('adm/assets/facture/'.$formation['id'].'.zip')->add($files);
            Zipper::close();

            return response()->download(public_path("adm/assets/facture/{$formation->id}.zip"));

        }
    else {
        return back()->with('warning','pas dinscription valide dans la formation selectionnée');
    }

    }

}
