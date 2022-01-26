@extends('layouts.backend.master')

@section('title')
  Users
@endsection

@section('header')
  {{ trans('backend/sidebar.User') }}
@endsection
@section('content')

<div class="col-md-12">


    <div class="card">
        <div class="card-header">
              <div class="d-flex justify-content-between">
                {{-- <h3 class="card-title m-2">Bordered Table</h3> --}}
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalUser">
                    {{ trans('backend/user.Add') }}
                </button>
                {{-- <div class="download">
                    <a href="{{route('portfolios.export')}}" class="btn btn-success"><i class="fas fa-file-excel mr-2"></i>Excel</a>
                    <a href="{{route('portfolios.pdf')}}" class="btn btn-danger"><i class="fas fa-file-pdf mr-2"></i>PDF</a>
                </div> --}}

              </div>
           @include('layouts.backend.user.create')
           @include('layouts.backend.user.edit')



        </div>
        <!-- /.card-header -->
        <div class="card-body">
            {{-- @if ($errors->any())
            <div class="alert alert-danger">
               <ul>
                   @foreach ($errors->any() as $error)
                      <li>{{$error}}</li>
                   @endforeach
               </ul>
            </div>
            @endif --}}

            {{-- @if (Session::has('add'))
                <div class="alert alert-success">
                     {{Session::get('add')}}
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                </div>
            @endif --}}
          <table class="table table-bordered">
            <thead>
              <tr>
                <th style="width: 10px">#</th>
                <th>{{ trans('backend/user.name') }}</th>
                <th>{{ trans('backend/user.email') }}</th>
                <th>{{ trans('backend/user.actions') }}</th>
              </tr>
            </thead>
            <tbody id="tbody">
               <!-- show the data using ajax -->



               <!-- show the data using laravel -->
                    {{-- @forelse ($portfolios as $portfolio)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$portfolio->name}}</td>
                            <td>{{$portfolio->description}}</td>
                            <td>

                                <button class="btn btn-info">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-red">No Data To Show</td>
                        </tr>
                    @endforelse --}}

            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
        {{-- <div class="card-footer clearfix">
          <ul class="pagination pagination-sm m-0 {{App::getLocale()=='en' ? 'float-right' : 'float-left'}}>
            {{$portfolios->links()}}
          </ul>
        </div> --}}
      </div>
</div>


@endsection
