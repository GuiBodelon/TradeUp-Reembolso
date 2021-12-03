<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ModelReembolso;
use Illuminate\Support\Facades\Auth;

class ReembolsoController extends Controller
{
    private $objUser;
    private $objReembolso;

    public function __construct()
    {
        $this->objUser = new User();
        $this->objReembolso = new ModelReembolso();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get the currently authenticated user...
        $user = Auth::user();
        // Get the currently authenticated user's ID...
        $id = Auth::id();

        $reembolso=ModelReembolso::orderByDesc('id')
        ->where('user_id','=',$id)
        ->paginate(10);
        return view('reembolsos', compact('reembolso'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Get the currently authenticated user...
        $user = Auth::user();
        // Get the currently authenticated user's ID...
        $id = Auth::id();
        //Get all Users
        $users=User::all();

        return view('create',compact('users','id','user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $refund = new ModelReembolso;
        $refund->type = $request->input('type');
        $refund->date = $request->input('date');
        $refund->description = $request->input('description');
        $refund->value = $request->input('value');
        $refund->user_id = $request->input('user_id');
        if($request->hasFile('refund_image'))
       {
            $file = $request->file('refund_image');
            $extension = $file->getClientOriginalExtension();
            $name = $file->getClientOriginalName();
            $filename = time().'_'.$name;
            $file->move('images/reembolsos', $filename);
            $refund->refund_image = $filename;
       }
       $refund->save();
       return redirect('/reembolsos')->with('status', 'Reembolso cadastrado com sucesso!');


     
    } 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reembolso=ModelReembolso::find($id);

        return view('visualizar', compact('reembolso'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reembolso=ModelReembolso::find($id);
        $users=ModelReembolso::find($id);

        return view('edit',compact('reembolso','users'));
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
        ModelReembolso::where(['id'=>$id])->update([
            'value'=>$request->value            
         ]);
         return redirect('/reembolsos')->with('msg', 'Reembolso editado com sucesso!'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del=ModelReembolso::destroy($id);

        return redirect('/reembolsos')->with('msg', 'Reembolso excluído com sucesso!'); 
    }
}
