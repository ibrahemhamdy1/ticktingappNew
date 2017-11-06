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
            $rows = $this->model->paginate(25);
        } else {
            
            $this->request->flash();
            $rows = $this->model->where('name', 'like', "%{$this->request->value}%")
                ->paginate(25);
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

                if ($this->request->ajax())
                    return response()->json(array('status' => 'true', 'message' => "Add category Done Sucessfully"));
                return redirect()->back()->with('success', "Add category Done Sucessfully");

        } else {
            if ($this->request->ajax())
                return response()->json(array('status' => 'false', 'message' => trans('Error')));
            return redirect()->back()->with('failed', trans('lang.Error'));
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
