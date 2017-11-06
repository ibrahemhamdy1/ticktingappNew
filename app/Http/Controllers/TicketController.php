<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Http\Requests\PacketRequest;
use App\Http\Requests\TicketRequest;
use App\Notification;
use App\Packet;
use App\Ticket;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Client;

//======== add by me ============//

use App\Http\Requests\CategoryRequest;

class TicketController extends Controller
{
    //=======  request and model and view file =============//
    public function __construct(TicketRequest $request, Ticket $model)
    {


        $this->middleware('role:admin', ['only' => ['destroy']]);
        $this->middleware('role:admin|salesManager|sales', ['only' => ['create', 'store']]);
        $this->middleware('role:admin|salesManager', ['only' => ['edit', 'update']]);
        $this->middleware('role:sales|salesManager|supportManager', ['only' => ['myTicket']]);
        $this->middleware('role:admin|salesManager|supportManager|sales|supports', ['only' => ['index']]);
//        $this->middleware('role:supportManager',['only' => ['index','edit','update','show']]);
//        $this->middleware('role:sales',['only' => ['index','create','store','edit','update','show']]);
//        $this->middleware('role:supports',['only' => ['index','show']]);
//


        $this->request = $request;
        $this->model = $model;
        $this->view = 'admin/tickets/';
    }

    public function index()
    {


        $role = auth()->user()->roles()->first()->name;


        if ($role == "admin") {
            $rows = $this->model->paginate(25);
        } elseif ($role == "salesManager") {
            $rows = $this->model->paginate(25);
        } elseif ($role == "supportManager") {
            $rows = $this->model->paginate(25);
        } elseif ($role == "sales") {

            $rows = $this->model->where('status', '!=', 3)->paginate(25);


        } elseif ($role == "supports") {

            $rows = $this->model->where('employee_id', auth()->user()->id)->where('type', 1)->where('status', '!=', 3)->paginate(25);


        }


        $rows->setpath('tickets');
        if ($this->request->ajax()) {

            return response()->json(view($this->view . 'loop', compact('rows'))->render());

        }
        return view($this->view . 'index', compact('rows'));

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
        $this->request->merge(['user_id' => auth()->user()->id]);
        $this->request->merge(['status' => 0]);
        $this->request->merge(['periority' => 0]);
        $this->request->merge(['seen' => 0]);

        $Clients =  Client::where('id',$this->request['client_id'])->get();
        //   dd($Clients);
        // foreach ($Clients as $client_id ) {
         
        //             $this->request->merge(['client_id' => $client_id['id']]);

        // }
        //dd($this->request['client_id']);
      
        $insert = $this->model->create($this->request->all());
        if ($insert) {
//Insert Blog Gallary

            if ($this->request->ajax())
                return response()->json(array('status' => 'true', 'message' => "Add ticket Done Sucessfully"));
            return redirect()->back()->withFlashMessage("Add category Done Sucessfully");

        } else {
            if ($this->request->ajax())
                return response()->json(array('status' => 'false', 'message' => trans('Error')));
            return redirect()->back()->withFlashMessage('failed', trans('lang.Error'));
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

        $role = auth()->user()->roles()->first()->name;
//        return $role;
        $m = $this->model->where('id', $id)->first();


//        return $m;

        if (!empty($m)) {
            $m->views = $m->views + 1;
            $m->save();
//            $m->seen = 1;
//            $m->save();return
            $notify = Notification::where('ticket_id', $id)->where('user_id', auth()->user()->id)->first();
            if ($notify) {
                $notify->seen = 1;
                $notify->save();
            }
//            return $m->status;
            if ($role == "admin") {

                return View($this->view . 'show_ticket_admin', compact('m'));
            } elseif ($role == "salesManager") {
                return View($this->view . 'show_ticket_sales_manager', compact('m'));
            } elseif ($role == "supportManager") {
                return View($this->view . 'show_ticket_support_manager', compact('m'));
            } elseif ($role == "sales") {
//                return  $m->status;
                return View($this->view . 'show_ticket_sales', compact('m'));
            } elseif ($role == "supports") {
                return View($this->view . 'show_ticket_supports', compact('m'));


            }


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


    public function saveTicket(Request $request)
    {
        $role = auth()->user()->roles()->first()->name;
        $roles=[

            'comment' => 'required',
//            'employee_id' => 'required',


        ];
        if($role== "salesManager" or $role=="supportManager" ){
        $roles['employee_id']= 'required';
        }
//        return $roles;

        $this->validate($request, $roles);

//        return $role;
        $request->merge(['user_id' => auth()->user()->id]);
            
        Comment::create($request->except('status'));

        $ticket = Ticket::findOrFail($request->ticket_id);
//        return "aaa";
        if ($role == "sales" or $role == "supports") {
            $ticket->status = 1;
        }
        if ($ticket->status == 0 and $role == "salesManager") {
            $ticket->employee_id = $request->employee_id;
            $notify = new Notification();
            $notify->message = "new ticket : " . substr($ticket->title, 0, 40);
            $notify->ticket_id = $ticket->id;
            $notify->user_id = $request->employee_id;
            $notify->seen = 0;
            $notify->save();
        }
        if ($ticket->status == 0 and $role == "supportManager") {
            $ticket->employee_id = $request->employee_id;
            $notify = new Notification();
            $notify->message = "new ticket : " . substr($ticket->title, 0, 40);
            $notify->ticket_id = $ticket->id;
            $notify->user_id = $request->employee_id;
            $notify->seen = 0;
            $notify->save();
        }
        $ticket->save();
//        return  $ticket;


        return redirect('controll/tickets');
    }


    public function changeType(Request $request)
    {
        $ticket = Ticket::findOrFail($request->ticket_id);
        $ticket->type = $request->type;
        $ticket->save();


        return redirect('controll/tickets');
    }

    public function changeStatus(Request $request)
    {

        $ticket = Ticket::findOrFail($request->ticket_id);

        if ($ticket->status == 2) {

            $ticket->closed_date = date("Y-m-d");
            $ticket->close_by = auth()->user()->id;
        }
        if ($ticket->status == 0) {

            $ticket->open_date = date("Y-m-d");
            $ticket->open_by = auth()->user()->id;
        }


        $ticket->status = $request->status;
        $ticket->save();

        if( $ticket->status ==2){

            $users=User::whereHas('roles', function ($query) {
                $query->whereIn('id', [1, 3, 5]);
            })->get();
            foreach($users as $user){
                $notify = new Notification();
                $notify->message = "ticket solved : " . substr($ticket->title, 0, 40);
                $notify->ticket_id = $ticket->id;
                $notify->user_id = $user->id;
                $notify->seen = 0;
                $notify->save();
            }
        }

        return redirect('controll/tickets');
    }



    public function myTicket()
    {


        $role = auth()->user()->roles()->first()->name;


        if ($role == "admin") {
            $rows = $this->model->paginate(25);
        } elseif ($role == "salesManager") {
            $rows = $this->model->where('type', 0)->paginate(25);
        } elseif ($role == "supportManager") {
            $rows = $this->model->where('type', 1)->paginate(25);
        } elseif ($role == "sales") {

            $rows = $this->model->where('employee_id', auth()->user()->id)->where('type', 0)->where('status', '!=', 3)->paginate(25);


        } elseif ($role == "supports") {

            $rows = $this->model->where('employee_id', auth()->user()->id)->where('type', 1)->where('status', '!=', 3)->paginate(25);

        }


        $rows->setpath('tickets');
        if ($this->request->ajax()) {

            return response()->json(view($this->view . 'loop_my_ticket', compact('rows'))->render());

        }
        return view($this->view . 'index_my_ticket', compact('rows'));

    }


}
