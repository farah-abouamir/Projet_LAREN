<?php
    
namespace App\Http\Controllers;
    
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Commission;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
class CommissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $commissions = Commission::with('users')->get();
        return view('commissions.index',compact('commissions'));
            
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $users= User::whereHas("roles", function($q) {
            $q->where("name", "commission");
            })->get();
        
        if ($users->count() == 0) {
            return   redirect()->route('users.create');
        }
        return view('commissions.create')->with('users' ,  $users);
       
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   $this->validate($request,[
        'type' =>  'required',
        'matière' =>  'required',
        'niveau_c' =>  'required',
        'users' =>  'required',
        
        ]);
        $commission=Commission::create($request->all());
        $commission->users()->attach($request->users);
        
        

        
        return redirect()->route('commissions.index')
                        ->with('success','Commission created successfully');

        
              
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {  $users= User::all();
        
        $commission = Commission::find($id);
        return view('commissions.show')->with('commission',$commission)
        ->with('users',$users);
        
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    public function edit(  $id)
    {
        $users= User::whereHas("roles", function($q) {
            $q->where("name", "commission");
            })->get();
        
        $commission = Commission::where('id' , $id )->first();
         if ($commission === null) {
            return redirect()->back() ;
        }
        return view('commissions.edit')->with('commission',$commission)
        ->with('users',$users);
    }   

    public function update(Request $request,  $id)
    {
        $commission = Commission::find( $id ) ;
        $this->validate($request,[
            'type' =>  'required',
            'matière' =>  'required',
            'niveau_c' =>  'required',
            
        
            
        ]);

     //   dd($request->all());


    
    $commission->matière = $request->matière;
    $commission->niveau_c= $request->niveau_c;
    $commission->type= $request->type;
    $commission->save();
    $commission->users()->sync($request->users);
    
    return redirect()->route('commissions.index')
                        ->with('success','commission modifiée avec succée');

    }

    public function destroy( $id)
    {
        //dd($id);
        
        Commission::find($id)->delete();
        return redirect()->route('commissions.index')
                        ->with('success','commission deleted successfully');
    }


    
}