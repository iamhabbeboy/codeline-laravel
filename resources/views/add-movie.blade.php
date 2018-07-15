@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="" method="post">
                        <div style="margin: auto;width: 300px;height: 80px;border:1px solid #ccc;color: #666">
                            <h3 class="text-center">click to upload image</h3>
                        </div>
                        <label for="">Title </label>
                        <input type="text" class="form-control">
                        <label for="">Description</label>
                        <textarea name="" id="" class="form-control"></textarea>
                        <label for="">Rating</label>
                        <select name="rating" id="" class="form-control">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        <label for="">Ticket Price </label>
                        <input type="text" class="form-control">
                        <label for="">Country</label>
                        <input type="text" class="form-control">
                        <label for="">Genre</label>
                        <br/>
                        Comedy <input type="checkbox"> &nbsp;
                        Action <input type="checkbox"> &nbsp;
                        Adventure <input type="checkbox"> &nbsp;
                        Crime <input type="checkbox"> &nbsp;
                        Drama <input type="checkbox"> &nbsp;
                        Fantasy <input type="checkbox"> &nbsp;
                        Horror <input type="checkbox"> &nbsp;

                        <p></p>
                        <input type="submit" class="btn btn-primary btn-lg" value="Add Film">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
