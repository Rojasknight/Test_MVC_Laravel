<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Laracasts\Flash\Flash;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    } 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::all();
        return view('products.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data  = new Products();
        $query = Categories::all('id', 'name');

        #echo $query;

        foreach ($query as $item) {
            if ($item->name == $request->transporte) {
                $id = $item->id;
            }
        }
        $data->name        = $request->nombre;
        $data->description = $request->descripcion;
        $data->tax         = $request->iva;
        $data->price       = $request->precio;
        $data->stock       = $request->unidades;
        $data->category_id = $id;
        $data->user_id     = \Auth::user()->id;

        $data->save();

        flash($request->nombre . ' creado con exito', 'success');

        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($name, $id)
    {
        $products = Products::where('category_id', $id)->paginate(5);
        return view('products.index', ['products' => $products,
            'nameCategory'                            => $name]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $user = User::find($id);


        return view('edit',
            [   
                'id'      => $user->id,
                'name'    => $user->name,
                'email'   => $user->email,
            ]);

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

        $user = User::findOrFail($id);
        $user->update($request->all());

        if ($user) {
            flash($request->nombre . ' Ha sido editado con exito', 'success');
            return redirect('/usuarios');
        }
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


        $vari = User::find($id);

        $delete = User::destroy($id);

        if ($delete) {

            return redirect()->action('HomeController@index');
        } else {
            return 'error';
        }
    }
}
