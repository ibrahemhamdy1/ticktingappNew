@foreach($rows  as $row)
<tr id="trow_{{ $row->id }}">
    <td class="text-center">{{ $row->id }}</td>
    <td><strong>{!! substr($row->title,0,50) !!} </strong></td>
    <td class="text-center">{{ $row->status_name }}</td>
    <td class="text-center">{{ $row->type_name }}</td>





    <td>
        <a class="btn btn-default btn-rounded btn-sm" href="{{ url('controll/tickets/'.$row->id) }}" ><span class="fa fa-pencil">view</span></a>
        {{--@role(['admin','salesManager','supportManager'])--}}
        {{--<a class="btn btn-default btn-rounded btn-sm" href="{{ url('controll/tickets/'.$row->id.'/edit') }}" ><span class="fa fa-pencil"></span></a>--}}
        {{--@endrole--}}
        <!--
       <button class="btn btn-danger btn-rounded btn-sm" onClick="delete_row('trow_{{ $row->id }}');"><span class="fa fa-times"></span></button>-->
        @role(['admin'])
        {!! Form::open(['action'=>['TicketController@destroy',$row->id],'method'=>'delete' ,'style'=>'display: inline']) !!}
        <button type="submit" class="btn btn-danger red" onclick='return confirm("Are You sure!!")' ><span class="fa fa-times"></span></button>
        {!! Form::close() !!}
        @endrole
    </td>
</tr>
@endforeach