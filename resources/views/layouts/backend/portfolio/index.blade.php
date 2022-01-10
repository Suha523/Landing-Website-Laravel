@extends('layouts.backend.master')

@section('title')
Portfolio
@endsection

@section('header')
{{ trans('backend/sidebar.Portfolio') }}
@endsection

@section('content')
<div class="col-md-12">


    <div class="card">
        <div class="card-header">
              <div class="d-flex justify-content-between">
                <h3 class="card-title m-2">Bordered Table</h3>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Add Portfolio Category
                </button>
              </div>
           @include('layouts.backend.portfolio.create')



        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                {{-- <th style="width: 10px">#</th> --}}
                <th>Name</th>
                <th>Description</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                 <tr>
                     @foreach ($portfolios as $portfolio)

                         <td>{{$portfolio->name}}</td>
                         <td>{{$portfolio->description}}</td>

                     @endforeach
                 </tr>
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
          <ul class="pagination pagination-sm m-0 float-right">
            <li class="page-item"><a class="page-link" href="#">«</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">»</a></li>
          </ul>
        </div>
      </div>
</div>
@endsection


