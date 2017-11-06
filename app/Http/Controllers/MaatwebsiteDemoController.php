<?php

namespace App\Http\Controllers;


use App\Client;
use App\Contact;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClientRequest;
use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;
//======== add by me ============//
use Alert;


//use Auth;

use App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Maatwebsite\Excel\Facades\Excel;

class MaatwebsiteDemoController extends Controller {


    public function importExport()

    {

        return view('admin.clients.importExport');

    }

    public function downloadExcel($type)

    {

        $data =Client::get()->toArray();

        return Excel::create('ticket', function($excel) use ($data) {

            $excel->sheet('mySheet', function($sheet) use ($data)

            {

                $sheet->fromArray($data);

            });

        })->download($type);

    }

//    ====================================================================
//
    public function Excel()

    {

        if(Input::hasFile('import_file')){

            $path = Input::file('import_file')->getRealPath();

            $data = Excel::load($path, function($reader) {

            })->get();
//            return   $data;

            if(!empty($data) && $data->count()){

                foreach ($data as $key => $value) {

                    $insert[] = [






                        'name' => $value->name,
                        'email' => $value->email,
                        'phone' => $value->phone,
                        'mobile' => $value->mobile,
                        'address' => $value->address,
                        'packet_id' => $value->packet_id,
                        'network_id' => $value->network_id,
                        'start_date' => $value->start_date,
                        'account' => $value->account,
                        'user_name' => $value->user_name,
                        'customer_id' => $value->customer_id,
                        'order_status' => $value->order_status,







                    ];

                }


                if(!empty($insert)){

                    DB::table('clients')->insert($insert);

                    dd('Insert Record successfully.');

                }

            }

        }

        return back();

    }
//==========================================================================

    public function importExcel()
    {

        if (Input::hasFile('import_file')) {

            $path = Input::file('import_file')->getRealPath();

            $data = Excel::load($path, function ($reader) {

            })->get();
//            return   $data;

            if (!empty($data) && $data->count()) {

                foreach ($data as $key => $value) {
                    $check = Client::where('email', $value->email)->first();
                    if (!$check) {
                        $client = new Client();
                        $client->name = $value->name;
                        $client->email = $value->email;
                        $client->phone = $value->phone;
                        $client->mobile = $value->mobile;
                        $client->address = $value->address;
                        $client->packet_id = $value->packet_id;
                        $client->network_id = $value->network_id;
                        $client->start_date = $value->start_date;
                        $client->account = $value->account;
                        $client->user_name = $value->user_name;
                        $client->customer_id = $value->customer_id;
                        $client->order_status = $value->order_status;
                        $client->save();


                    }
                }


            }


        }
        if (!empty($insert)) {

            DB::table('clients')->insert($insert);

            dd('Insert Record successfully.');


        }
    }

}
