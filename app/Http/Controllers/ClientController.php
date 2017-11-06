<?php

namespace App\Http\Controllers;


use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClientRequest;
use App\Http\Requests\UserRequest;
use App\Client;
use Illuminate\Http\Request;
//======== add by me ============//
use Alert;


//use Auth;

use App;

class ClientController extends Controller {


 // public function autoComplete(Request $request) {
 // +        $query = $request->get('term','');
 // +        
 // +        $products=Client::where('name','LIKE','%'.$query.'%')->get();
 // +        $data=array();
 // +        foreach ($products as $product) {
 // +                $data[]=array('value'=>$product->name,'id'=>$product->id);
 // +        }
 // +        if(count($data))
 // +             return $data;
 // +        else
 // +            return ['value'=>'No Result Found','id'=>''];
 // +    }
     


 public function autoComplete(Request $request) {
        $query = $request->get('term','');
        
        $Client=Client::where('phone','LIKE','%'.$query.'%')->get();
        
        $data=array();
        foreach ($Client as $product) {
                $data[]=array('name'=>$product->name,'id'=>$product->id);
        }
        if(count($data))
             return $data;
        else
            return ['value'=>'No Result Found','id'=>''];
    }

    //=======  request and model and view file =============//
    public function __construct(ClientRequest $request, Client $model)
    {
        $this->middleware('role:admin',['only' => ['destroy']]);
        $this->middleware('role:admin|salesManager|sales',['only' => ['create','store','edit','update']]);

        $this->request = $request;
        $this->model = $model;
        $this->view = 'admin/clients/';
    }

    public function index()
    {
//        return auth()->user();
        if (is_null($this->request->value)) {//
            $rows = $this->model->paginate(20000);
        } else {

            $this->request->flash();
            $rows = $this->model->where('name', 'like', "%{$this->request->value}%")
                ->paginate(20000);
        }

//           return $rows;


        $rows->setPath('clients');

        // return response()->json(view($this->view . 'loop', compact('rows'))->render());
        if ($this->request->ajax()) {
            return response()->json(view($this->view . 'loop', compact('rows'))->render());



        }
        return View($this->view . 'index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response 
     */
    public function create()
    {
        return View($this->view . 'create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {

        
        $this->request->merge(['type' =>0]);
            $insert = $this->model->create($this->request->all());
            if ($insert) {
            
            //

            if ($this->request->ajax())
                return response()->json(array('status' => 'true', 'message' => "Add client Done Sucessfully"));
            return redirect('/controll/clients')->with('success', "Add client Done Sucessfully");


        } else {
            if ($this->request->ajax())
                return response()->json(array('status' => 'false', 'message' => trans('Error')));
            return redirect('/controll/clients');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
//        $row = $this->model->find($id);
//        if (empty($row)) {
//            abort(404);
//        }
//        return View($this->view . 'single', compact('row'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $row = $this->model->where('id', $id)->first();

        if ($row) {
            return View($this->view . 'edit', compact('row', 'users'));
        } else {
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $update = $this->model->find($id)->update($this->request->all());
        if ($update) {
            if ($this->request->ajax())
                return response()->json(array('status' => 'true', 'message' => 'Update Section Done'));
            return redirect()->back()->with('success', 'Update Section Done');
        } else {
            if ($this->request->ajax())
                return response()->json(array('status' => 'false', 'message' => 'Update Faild'));

            return redirect()->back()->with('failed', 'Update Faild');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $delete = $this->model->destroy($id);
        if ($delete) {
            if ($this->request->ajax())
                return response()->json(array('status' => 'true', 'message' => trans('lang.deletedsuccessfully')));

            return redirect()->back()->with('failed', trans('lang.deletedsuccessfully'));
        } else {
            if ($this->request->ajax())
                return response()->json(array('status' => 'false', trans('lang.deletedfailed')));
            return redirect()->back()->with('failed', trans('lang.deletedfailed'));
        }
    }
}
