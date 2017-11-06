@foreach($rows  as $row)
<tr id="trow_{{ $row->id }}">
    <td class="text-center">{{ $row->id }}</td>
    <td><strong>{{  substr($row->name,0,100) }}</strong></td>


    <td>
        <a class="mb-xs mt-xs mr-xs btn btn-warning" href="{{ url('controll/packets/'.$row->id.'/edit') }}" ><span class="fa fa-pencil"></span></a>
        <!--       
       <button class="btn btn-danger btn-rounded btn-sm" onClick="delete_row('trow_{{ $row->id }}');"><span class="fa fa-times"></span></button>-->
        {!! Form::open(['action'=>['PacketController@destroy',$row->id],'method'=>'delete' ,'style'=>'display: inline']) !!}
        <button type="submit" class="btn btn-danger red" onclick='return confirm("Are You sure!!")' ><span class="fa fa-times"></span></button>
        {!! Form::close() !!}
    </td>
</tr>
@endforeach