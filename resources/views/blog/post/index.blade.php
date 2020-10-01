@extends('layouts.app')
@section('content')
    <table>
        @foreach($items as $item)
            <tr>
                <td>id{{$item->id}}</td>
                <td>title{{$item->title}}</td>
                <td>created_at{{$item->created_at}}</td>
            </tr>
        @endforeach
    </table>
@endsection
