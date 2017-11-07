<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests;

//======== add by me ============//

use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    //=======  request and model and view file =============//
    public function __construct(CategoryRequest $request, Category $model)
    {
        $this->middleware('role:admin', ['only' => ['index','create','store','edit','update','destroy']]);
        $this->request = $request;
        $this->model = $model;
        $this->view = 'admin/categories/';
    }

    public function index()
    {

        if (is_null($this->request->value)) {//
            $rows = $this->model->paginate(20000);
        } else {
            
            $this->request->flash();
            $rows = $this->model->where('name', 'like', "%{$this->request->value}%")
                ->paginate(20000);
        }

//           return $rows;


        $rows->setPath('categories');//after
//        return $rows;

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
//        $this->request->merge(['slug' => $this->request->name_en]);

            $insert = $this->model->create($this->request->all());
            if ($insert) {
//Insert Blog Gallary
            \Session::flash('flash_message','categorie add successfully added.'); //<--FLASH MESSAGE
                
                return redirect('/controll/categories');

        } else {
             \Session::flash('flash_message','clients Not  add successfully added.'); //<--FLASH MESSAGE
                
            return redirect()->back();
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
            return View($this->view . 'edit', compact('row', 'cats'));
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
            \Session::flash('flash_message','categories update successfully added.'); //<--FLASH MESSAGE
            return redirect('/controll/categories');
        } else {
            
                \Session::flash('flash_message','clients Faild update successfully added.'); //<--FLASH MESSAGE
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
             \Session::flash('flash_message','categorie destroyed successfully'); //<--FLASH MESSAGE
                
                
            return redirect()->back();
        } else {
            \Session::flash('flash_message','categorie Not destroyed successfully'); //<--FLASH MESSAGE
            return redirect()->back();
        }
    }
}
