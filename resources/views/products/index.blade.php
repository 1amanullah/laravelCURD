@extends('layouts.app')
@section('main')
  @if($message = Session::get('success'))
  <div class="alert alert-primary" role="alert">  
    {{$message}}   
  </div>
  @endif
  <table class="table">
  <thead>
    <tr>
      <th scope="col">Srno.</th>
      <th scope="col">Name</th>
      <th scope="col">Image</th>
      <th scope="col">Role</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody class="table-striped">
    @foreach($products as $product)
    <tr>
      <th scope="row">{{$product->id}}</th>
      <td>{{$product->name}}</td>
      <td><img src="products/{{$product->image}}" style="width:50px;border-radius:5px;" alt=""> </td>
      <td>{{$product->role}}</td>
      
      <td> 
        <!-- <button class="btn btn-sm btn-primary" href="products/{{$product->id}}/edit">Edit</button> -->
        <div class="d-flex ">
        <a href="/products/{{$product->id}}/edit/"  class="btn btn-sm btn-primary">Edit</a>
       <form method="POST" action="/products/{{$product->id}}/delete/">
        @csrf
        @method('DELETE')
        <button class="btn btn-sm btn-danger" style="margin-left:3px;">Delete</button>

       </form>
       </div> 

      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
