@extends('layouts.app')
<style>
</style>
@section('content')  
   <div class="card bg-light mt-3">
      <div class="card-header">
         <h3> Update User Status </h3>
      </div>
      <div class="card-body">
        <table class="table table-bordered">
            <thead>
               <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Status</th>
               </tr> 
            </thead>
            <tbody>
               @foreach($user as $user)
                  <tr>
                     <td>{{ $user->name }}</td>
                     <td>{{ $user->email }}</td>
                     <td>
                        <input data-id="{{$user->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $user->status ? 'checked' : '' }}>
                     </td>
                  </tr>
               @endforeach
            </tbody>
        </table>
      </div>
   </div>
@endsection
