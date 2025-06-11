@extends('mainlayout')

@section('title', 'Login')

@section('maincontent')
<div class="container mt-5"> 
    
    <h2 class="text-center mb-4 text-white">Login</h2> 

    @if($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif
        
    <div class="row justify-content-center"> 
        <div class="col-md-6"> 
            <form action="{{ url('login') }}" method="POST" class="p-4 border rounded" style="background-color: rgba(255, 255, 255, 0.8);"> 
                @csrf
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
</div>
@endsection