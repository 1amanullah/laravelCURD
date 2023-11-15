@extends('layouts.app')
@section('main')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-sm-8">
      <div class="card p-3 mt-5">
        <form method="POST" action="/products/{{$product->id}}/update/" enctype="multipart/form-data">
         @csrf
          <div class="form-group">
            <label>Name:</label>
            <input type="text"  name="name" value="{{old('name',$product->name)}}" class="form-control" > 
           </div>

           <div class="form-group mt-3">
            <label>Description:</label>
            <textarea name="description" class="form-control" value="{{old('description',$product->description)}}" rows="4"></textarea>  
           </div> 

            <div class="form-group mt-3">

             <label>Select Role:</label>
             <select name="role" class="form-control">
              <!-- <option value="" selected disabled hidden>Select Role</option> -->
              <option value="{{$product->role === 'HR'? 'disabled':'HR'}}">HR</option>
              <option value="{{$product->role === 'Manager'? 'disabled':'Manager'}}">Manager</option>
              <option value="{{$product->role === 'Designer'? 'disabled':'Designer'}}">Designer</option>
              <option value="{{$product->role === 'Developer'? 'disabled':'Developer'}}">Developer</option>
              <option value="{{$product->role === 'Tester'? 'disabled':'Tester'}}">Tester</option>
             </select>

            </div>     
            
           <div class="form-group mt-3">
             <label>Image:</label>
             <input type="file" name="image" value="{{old('image',$product->image)}}" class="form-control" accept="image/*">
           </div> 
          <button type="submit" class="btn btn-primary mt-3" style="width:10%;">Update</button>
        <!-- <a href="/" type="button" class="btn btn-primary mt-3" style="width:10%;">Submit</a> -->
           
        </form>
      </div>
     </div>
    </div>
  </div>
@endsection