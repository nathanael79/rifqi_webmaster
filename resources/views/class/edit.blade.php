@extends('layouts.master')

@section('content')

        <div class="col-md-12 col-sm-12 col-xs-12" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Class Form</h3>
              </div>

            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="{{ route('class.update',$data->id) }}">
                      @csrf
                      @method('put')
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name <span class="required"></span>
                        </label>                        
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="name" name="name" required="required" class="form-control col-md-7 col-xs-12" value="{{ $data->name }}">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Mentor <span class="required"></span>
                        </label>
                        <div class="col-md-2">
                          <select class="form-control col-md-2" id='mentor' name='mentor'>
                            @foreach($resident2 as $r)
                              @if($r->getUser->role == 1)
                                <option value='{{$r->getUser->name}}'>{{$r->getUser->name}}</option>
                                  @foreach($user as $u)
                                    @if($u->name != $r->getUser->name)
                                      <option value='{{$u->name}}'>{{$u->name}}</option>
                                      @endif
                                  @endforeach
                              @endif
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <input type="hidden" name="name_first" value="{{$data->getResident->getUser->name}}">
            						  <button class="btn btn-primary" type="reset">Reset</button>
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
        </div>

@endsection