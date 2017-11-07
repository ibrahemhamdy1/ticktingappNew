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
                    \Session::flash('flash_message','clients add successfully added.'); //<--FLASH MESSAGE
           
            return redirect('/controll/clients');


        } else {
             \Session::flash('flash_message','clients Not add successfully added there is a problem '); //<--FLASH MESSAGE
           
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
                    \Session::flash('flash_message','clients Updated successfully '); //<--FLASH MESSAGE

            return redirect('/controll/clients');
        } else {
            \Session::flash('flash_message','clients was not Updated successfully '); //<--FLASH MESSAGE
            return redirect()->back();
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
            
                    \Session::flash('flash_message','clients destroyed successfully .'); //<--FLASH MESSAGE

            return redirect()->back();
        } else {
            \Session::flash('flash_message','clients was not destroyed successfully.'); //<--FLASH MESSAGE
            return redirect()->back()->with('failed', trans('lang.deletedfailed'));
        }
    }

    // Here  we  get  the  client by the phone 
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
}
