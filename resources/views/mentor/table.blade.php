@extends('layouts.master')

@section('content')

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Employee</h2>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">


                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th class="column-title" style="width: 100px">No. </th>
                            <th class="column-title">Name </th>
                            <th class="column-title" style="width: 400px">email </th>
                            <th class="column-title no-link last" style="width: 260px"><span class="nobr">Action</span>
                            </th>
                          </tr>
                        </thead>

                        <tbody>
                          <?php $no = 0; ?>
                          @foreach($data as $d)
                          <?php $no++; ?>
                              <tr>
                                  <td>{{ $no }}</td>
                                  <td>{{ $d->name }}</td>
                                  <td>{{ $d->email }}</td>
                                  <td class=" last">
                                    <a href="{{ route('mentor.edit', $d->id) }}">
                                      <button class="btn btn-success"> Edit
                                      </button>
                                    </a>
                                    <form style="display:inline" method="POST" action="{{ route('mentor.destroy', $d->id) }}">
                                      @csrf
                                      @method('delete')
                                      <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                  </td>
                              </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
						
                  </div>
                </div>
              </div>
@endsection