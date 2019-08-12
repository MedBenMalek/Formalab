<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Validator;
use Session;
use Mail;
use guard;
use App\Categorie;
use App\Actualite;
use App\Inscription;
use App\Photo;
use App\Formation;
use App\Formateur;
use App\tag;
use Illuminate\Support\Facades\Input;
use Carbon;
use App\Newsletter;



class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function indexVisiteur(){
        $photos = photo::all();
        $actualites = Actualite::with('formateur' ,'admin')->where('etat','active')->orderBy('created_at','desc')->take(4)->get();
        $time = Carbon\Carbon::now();
        $formations = Formation::orderBy('created_at','desc')->where('end', '>', $time)->take(8)->get();

        	return view("visiteur.index", compact('photos','actualites','formations','categories'));
    }



    public function about(){



    	return view("visiteur.about");
    }



    public function blog(){

        $actualites = Actualite::with('formateur','admin')->where('etat','active')->paginate(6);

        return view("visiteur.blog", compact('actualites'));

    }



    public function categorie($slug){

        $categories = Categorie::where('slug',$slug)->first();
        $time = Carbon\Carbon::now();
        $formations = Formation::where('id_categorie', $categories['id_categorie'] )->where('end', '>', $time)->paginate(8);

        return view("visiteur.categorie",compact('categories','formations'));
    }


    public function contact(){

    	return view("visiteur.contact");
    }


    public function formateurs(){

        $formateurs = Formateur::paginate(6);
        $i=0;

    	return view("visiteur.formateurs", compact('formateurs','i'));
    }


    public function profile_formateur($id){

        $formateurs = Formateur::find($id);

        return view("visiteur.profile_formateur", compact('formateurs'));
    }



    public function formations(){

        $categories = Categorie::paginate(4);

    	return view("visiteur.formations", compact('categories'));
    }

    public function inscription(){

        $categories = Categorie::All();
        return view("visiteur.inscription", compact('categories'));
    }


    public function ajaxformation(Request $request){

        $time = Carbon\Carbon::now();
        $data = Formation::select('title','id')->where('id_categorie',$request->id)->where('end', '>', $time)->take(100)->get();
        return response()->json($data);
    }


    public function storeInscri(Request $request){

       $validator = Validator::make($request->all(),
            [
            'nom' => 'required|max:255',
            'prenom' => 'required|max:255',
            'email' => 'required|max:255',
            'telephone' => 'required|max:255',
            'niveau_etude' => 'required|max:255',
            'id_formation' => 'required'

            ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $token = $request->input('g-recaptcha-response');

        if($token){

        $inscription = new Inscription();

        $inscription['nom'] = $request['nom'];
        $inscription['prenom'] = $request['prenom'];
        $inscription['niveau_etude'] = $request['niveau_etude'];
        $inscription['telephone'] = $request['telephone'];
        $inscription['email'] = $request['email'];
        $inscription['message'] = $request['message'];
        $inscription['id_formation'] = $request['id_formation'];

        $inscription->save();

        session::flash('success','Votre pré-inscription a été envoyée avec succès');

        }

        return back();
    }


    public function page_blog($slug){

        $actualites = Actualite::with('formateur','admin')->where('etat','active')->where('slug',$slug)->first();

        $blog = Actualite::where('etat','active')->get();

        foreach ($blog as $actualite) {

            $t[]=$actualite->id_actualite;
        }

        $test='non';
        $index = array_search($actualites->id_actualite, $t);
        if($index !== FALSE)
        {

            $max = array_search(max($t), $t);

                if ( $index == $max ) { $test='max'; }

                if ($test != 'max')
                $next = Actualite::where('etat','active')->where('id_actualite',$t[$index + 1])->first(['slug']);

                if ( $index == 0 )  { $test='min';}

                if ($test != 'min')
                $previous = Actualite::where('etat','active')->where('id_actualite',$t[$index - 1])->first(['slug']);
        }

    	return view("visiteur.page_blog",compact('actualites','next','previous','test'));
    }



    public function page_formation($slugc,$slugf){

        $time = Carbon\Carbon::now();
        $formations = Formation::where('slug',$slugf)->first();
        $categorie = Categorie::where('slug',$slugc)->first();
        $formateur = Formateur::where('id', $formations['id_formateur'] )->first();
        $autres = Formation::orderBy('start','desc')->where('id_categorie', $categorie['id_categorie'])->where('slug','!=',$slugf)->take(4)->get();
        $tags = tag::where('id_formation',$formations['id'])->get();
      

    	return view("visiteur.page_formation",compact('formations', 'categorie', 'formateur','autres','time','tags'));
    }


    public function inscri_formation(Request $request,$id_categorie,$id){

        $validator = Validator::make($request->all(),
            [
            'nom' => 'required|max:255',
            'prenom' => 'required|max:255',
            'email' => 'required|max:255',
            'telephone' => 'required|max:255',
            'niveau_etude' => 'required|max:255',
            'id_formation' => 'required'

            ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $inscription = new Inscription();

        $inscription['nom'] = $request['nom'];
        $inscription['prenom'] = $request['prenom'];
        $inscription['niveau_etude'] = $request['niveau_etude'];
        $inscription['telephone'] = $request['telephone'];
        $inscription['email'] = $request['email'];
        $inscription['message'] = $request['message'];
        $inscription['id_formation'] = $request['id_formation'];

        $inscription->save();

        session::flash('success','Votre pré-inscription a été envoyée avec succès');

        return back();

    }

    public function postcontact(Request $request){

        $this->validate($request,[
            'Email' => 'required|email',
            'Message' => 'required|min:10',
            'Objectif' => 'required',
            'Prenom' => 'required',
            'Nom' => 'required',
            'Piece' => 'mimes:jpeg,png,pdf,zip|max:10240'
            ]);

        $data = [

        'Email' => $request['Email'],
        'Nom' => $request['Nom'],
        'Prenom' => $request['Prenom'],
        'Objectif' => $request['Objectif'],
        'sujet' => $request['sujet'],
        'messageContact' => $request['Message'],
        'file' => $request->file('Piece'),

        ];

        $token = $request->input('g-recaptcha-response');

        if($token){

            Mail::send('emails.contact', $data, function($message) use ($data){

            $message->from($data['Email']);
            $message->to('benmalekchrif@gmail.com');
            $message->subject($data['sujet']);
            if(!empty($request['Piece'])){
            $message->attach( $data['file']->getRealPath(), [
                            'as' => $data['file']->getClientOriginalName(),
                            'mime' => $data['file']->getMimeType()
                  ]);
            }

        });

        session::flash('success','Votre message a été envoyée avec succès');

        } else {

            session::flash('notsuccess','Vous devez validate recaptcha');

        }

        return back();


    }


    public function calendrier(){

        return view("visiteur.calendrier");
    }

    public function postsearch(Request $request){

        $search = $request['search'];
        $actualites = Actualite::where('titre_actualite','like','%'.$search.'%')->where('etat','active')->get();
        $time = Carbon\Carbon::now();
        $formations = Formation::with('categorie')->where('title','like','%'.$search.'%')->where('end', '>', $time)->get();

        return view("visiteur.search", compact('actualites','formations'));
    }

    public function header(Request $request){
         $categories = Categorie::get();
         return View::share('visiteur.header', $categories);
    }

    public function newsletter(Request $request){

         $validator = Validator::make($request->all(),
            [
            'email' => 'required|email|unique:newsletters',
            ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->with('oups','Champ invalide ou vous êtes déjà abonné');
            }

        $newsletter = new Newsletter();
        $newsletter['email'] = $request['email'];
        $newsletter->save();

        return back();

    }


}
