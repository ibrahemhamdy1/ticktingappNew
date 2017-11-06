@foreach($rows  as $row)
    <tr id="trow_{{ $row->id }}">
        <td class="text-center">{{ $row->id }}</td>
        <td><strong>{{  substr($row->name,0,100) }}</strong></td>
        <td><strong>{{ $row->account }}</strong></td>
        <td><strong>{{ $row->email}}</strong></td>

        {{--<td><img src="{{  asset('admin-assets/images/clients/'.$row->image) }}" width="100" height="70"/></td>--}}


        <td>
            @role(['admin','salesManager','sales'])
            <a  class="btn btn-warning btn-rounded btn-sm editclientMargin" href="{{ url('controll/clients/'.$row->id.'/edit') }}" ><span class="fa fa-pencil"></span></a>
            @endrole
            <!--
       <button class="btn btn-danger btn-rounded btn-sm" onClick="delete_row('trow_{{ $row->id }}');"><span class="fa fa-times"></span></button>-->
            @role(['admin'])
            {!! Form::open(['action'=>['ClientController@destroy',$row->id],'method'=>'delete' ,'style'=>'display: inline']) !!}
            <button type="submit" class="btn btn-danger red" onclick='return confirm("Are You sure!!")' ><span class="fa fa-times"></span></button>
            {!! Form::close() !!}
            @endrole
        </td>
    </tr>
@endforeach
