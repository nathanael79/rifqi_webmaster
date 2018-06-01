@extends('layouts.master')

@section('content')

        <div class="col-md-12 col-sm-12 col-xs-12" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Class Form : User Add</h3>
              </div>

            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="{{url('class2/save')}}">
                      @csrf
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name <span class="required"></span>
                        </label>
                        <div class="col-md-2">
                          <label class="control-label" for="first-name">{{$data->name}}</label>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">User <span class="required"></span>
                        </label>
                        <div class="col-md-2">
                        <select class="form-control col-md-2" id='user' name='user' required>
                          <option value=''></option>
                            @foreach($user as $u)
                              @if($u->role==2)
                                <option value='{{$u->name}}'>{{$u->name}}</option>
                              @endif
                            @endforeach
                        </select>
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <input type="hidden" name="id" value="{{$data->id}}">
                          <button class="btn btn-primary" type="reset">Reset</button>
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
       </div>

@endsection