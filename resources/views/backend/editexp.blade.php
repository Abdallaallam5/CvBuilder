@extends('backend.dashbord')
@section('main')
<main role="main" class="main-content">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-12">
          <h2 class="mb-2 page-title">Edit Eduction</h2>

          <div class="row my-4">
            <!-- Small table -->
            <div class="col-md-12">
              <div class="card shadow">
                <div class="card-body">
                  <div class="d-flex justify-content-end">
                    <a class="btn btn-danger" href="{{route('user.exp')}}">Add exp</a>


                   </div>
                  <!-- table -->
                  <table class="table datatables" id="dataTable-1">
                    <thead>
                      <tr>
                        
                        <th>#</th>
                        <th>Experience </th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Company Name</th>
                        <th>Describe Company</th>

                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        
                        <tr>
     
                            @foreach ($exp as $key => $item)
                            <td>{{$key+1}}</td>
                            <td>{{$item->exp}}</td>
                            <td>{{$item->startdate}}</td>
                            <td>{{$item->enddate}}</td>
                            <td>{{$item->comp_name}}</td>
                            <td>{{$item->comp_desc}}</td>
                            
    
                            <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="text-muted sr-only">Action</span>
                              </button>
                              <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{route('edit.experiance', $item->id)}}">Edit</a>
                                <a class="dropdown-item" id="delete" href="{{route('delete.experiance', $item->id)}}">Remove</a>
    
                              </div>
                            </td>
                          </tr>
                        @endforeach
                   








                    </tbody>
                  </table>
                </div>
              </div>
            </div> <!-- simple table -->
          </div> <!-- end section -->
        </div> <!-- .col-12 -->
      </div> <!-- .row -->
    </div> <!-- .container-fluid -->

  </main> <!-- main -->
@endsection