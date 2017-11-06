<?php

namespace App\Http\Controllers;


use App\Contact;
use App\Http\Requests\ContactRequest;

use Illuminate\Http\Request;
use App\Http\Requests;

//======== add by me ============//

use App\Http\Requests\CategoryRequest;

class ContactController extends Controller
{
    //=======  request and model and view file =============//
    public function __construct(ContactRequest $request, Contact $model)
    {
        $this->request = $request;
        $this->model = $model;
        $this->view = 'admin/contacts/';
    }

    public function index()
    {

        if (is_null($this->request->value)) {//
            $rows = $this->model->paginate(25);
        } else {

            $this->request->flash();
            $rows = $this->model->where('first_name', 'like', "%{$this->request->value}%")
                ->paginate(25);
        }

//           return $rows;


        $rows->setPath('contacts');

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

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $m = $this->model->where('id', $id)->first();
        if (!empty($m)) {
            $m->seen = 1;
            $m->save();
            return View($this->view . 'message', compact('m'));
        } else {
            abort(404);
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {

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
