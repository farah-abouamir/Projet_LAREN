<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Demande;
use App\Models\User;
use App\Models\Commission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile; 
use Validator,Redirect,File;

class DemandeController extends Controller{
    

     // Create Condidature Form
     public function createForm(Request $request) {
        
        return view('form');
      }
  
      // Store Form data
      public function storeForm(Request $request) {
  
          // Form validation
          $this->validate($request, [
              'nom' => 'required',
              'adresse' => 'required',
              'email' => 'required|email',
              'nomProd'=>'required',
              'filePath'=>'required|mimes:pdf',
              'matiere' => 'required',
              'niveau'=>'required',
              'type'=>'required',
              'guide'=>'required',
              'lien'=>'required',
              
              
              
           ]);
          
            $file_demande=$this->saveFile($request->file('filePath'),'files/demandes');
            $file_guide= $this->saveFile($request->file('guide'),'files/guides');
            //$file_rapport=$this->saveFile($request->file('rapport'),'files/rapports');
      
            $demande = Demande::create([
             'user_id' =>  Auth::id(),
             'nom'=>$request->input('nom'),
             'adresse' =>$request->input('adresse'),
             'email'=>$request->input('email'),
             'nomProd'=>$request->input('nomProd'),
             'filePath'=>$file_demande,
             'matiere'=>$request->matiere,
             'niveau'=>$request->niveau,
             'type'=>$request->type,
             'guide'=>$file_guide,
             'lien'=>$request->lien,
             'etape'=>$request->etape="1",
             
            ]);
            $demande->save();
           
            
          // show data 
  
          return back()->with('success', 'Votre condidature a été enregistré avec succés.');
      }

      public function saveFile($file,$folder){
          // save files in folder
          $file_extension=$file->getClientOriginalExtension();
          $file_name=time().'.'.$file_extension;
          $path=$folder;
          $file->move($path,$file_name);
          return $file_name;
      }

     //afficher liste des demandes
      public function index($etape){
        
        $user_id=Auth::id();
        $user=User::find($user_id);
        if($user->hasRole('commission')){
          $commission_id=DB::table('commission_user')->select('commission_id')->where('user_id',$user_id)->get();
          $array = json_decode(json_encode($commission_id),true);
          
          $demandes=array();
          foreach($array as $value){
            $com=Commission::find($value['commission_id']);
            
            $demande_id=DB::table('commission_demande')->select('demande_id')->where('commission_id',$com->id)->get();
            $array1 = json_decode(json_encode($demande_id),true);
            foreach($array1 as $value1){
              $demande=Demande::find($value1['demande_id']);
              array_push($demandes,$demande->id);
            }

          }
          if($etape != 1){ 
          $listDemandes=Demande::where('etape', $etape)->whereIn('id',$demandes)->get();
          return view('etapes.secondEtape', ['demandes'=>$listDemandes]);
          }
        }
        else{
          if($etape == 1){  
            $listDemandes=Demande::where('etape', $etape)->get();
            return view('etapes.listeDemandes', ['demandes'=>$listDemandes]);
           }
          else{
            $listDemandes=Demande::where('etape', $etape)->get();
            return view('etapes.secondEtape', ['demandes'=>$listDemandes]);
          }
        }
        // $listDemandes= Demande::all();
        
      }

        public function show(request $request){
        
          
          $listDemandes=Demande::all();
          return view('etapes.listeDemandes', ['demandes'=>$listDemandes]);
       
        // $listDemandes= Demande::all();
        
      }

      public function edit($id){

        $demande = Demande::where('id' , $id )->first();
        return view('editForm')->with('demande',$demande);
      }


      

      public function update (Request $request,$id){

      $demande=Demande::find($id);
      $this->validate($request, [
        'nom' => 'required',
        'adresse' => 'required',
        'email' => 'required|email',
        'nomProd'=>'required',
        'filePath'=>'required|mimes:pdf',
        'matiere' => 'required',
        'niveau'=>'required',
        'type'=>'required',
        'guide'=>'required',
        'lien'=>'required',
        
        
        
     ]);

      $file_demande=$this->saveFile($request->file('filePath'),'files/demandes');
      $file_guide= $this->saveFile($request->file('guide'),'files/guides'); 

      
      $demande->user_id = Auth::id();
      $demande->nom=$request->nom;
      $demande->adresse =$request->adresse;
      $demande->email=$request->email;
      $demande->nomProd=$request->nomProd;
      $demande->filePath=$file_demande;
      $demande->matiere=$request->matiere;
      $demande->niveau=$request->niveau;
      $demande->type=$request->type;
      $demande->guide=$file_guide;
      $demande->lien=$request->lien;
      // $demande->etape=$request->etape="1";
      
       $demande->save();
      
       return back()->with('success', 'Votre condidature a été enregistré avec succés.');
  
  
      }

      
       public function showDetails($id,$etape,Request $request){
        
         if($etape==1){
          $demande=Demande::findOrFail($id);
          return view('etapes.detailsFrstEtape',  ['demande'=>$demande])   ; 

         }
         else{
          $commissions=Commission::all();  
          $demande=Demande::find($id);
          return view('etapes.details',  ['demande'=>$demande,'commissions'=>$commissions])   ; 
        
         
        }
       }    
       
       public function suivi($user_id){

        $demande=Demande::where('user_id' , $user_id )->first();

        return view('etapes.suivi' , ['demande'=>$demande]);
      }

      public function validerEtape($id)
      {
       Demande::find($id)->increment('etape');
       return back()->with('success', 'etape validée');  
      }

      
      public function rejeterEtape($id)
      {
       Demande::find($id)->decrement('etape');
       return back()->with('success', 'etape rejetée');  
      }

      public function choisir($id){
        $demande = Demande::where('id' , $id )->first();
        $commissions = Commission::all();
        return view('affectCommission')->with('demande',$demande)->with('commissions',$commissions);
      }
  
      public function affecter (Request $request,$id){
      
        $this->validate($request, [
          'commissions' => 'required', 
       ]);
       //   dd($request->all());
       
       $input=DB::table('commission_demande')->insert(
        ['commission_id' => $request->commissions[0], 'demande_id' => $id]
        
      );
      $demande= Demande::find($id);
     
     
       return redirect()->back() 
                          ->with('success','Commission est affectée avec succès');
  
        } 
 
        public function deprap($id){

          $demande = Demande::where('id' , $id )->first();
          return view('etapes.depot_rapport')->with('demande',$demande);
        }
      
}





