@extends('backend.dashbord')
@section('main')
<main role="main" class="main-content">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-12">

          <div class="row">

            <div class="col-md-6">
              <div class="card shadow mb-4">
                <div class="card-header">
                  <strong class="card-title">EXPERIANCE DETAILS</strong>
                </div>
                <div class="card-body">
                  <form class="needs-validation" method="POST" action="{{route('update.exp')}}" novalidate>
                    @csrf
                    <input type="hidden" name="id" value="{{$exp->id}}">

                    <div class="form-group mb-3">
                      <label for="address-wpalaceholder">Experience</label>
                      <input type="text" value="{{$exp->exp}}" name="exp" id="address-wpalaceholder" class="form-control"
                        placeholder="Enter ..">

                    </div>

                    <div class="form-row">
                      <div class="col-md-8 mb-3">
                        <label for="exampleInputEmail2">Start date</label>
                        <input type="text" value="{{$exp->startdate}}" class="form-control drgpicker" name="startdate" id="date-input1" value="04/24/2020" aria-describedby="button-addon2">

                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="custom-phone">end date</label>
                        <input type="text" value="{{$exp->enddate}}" class="form-control drgpicker" name="enddate" id="date-input1" value="04/24/2020" aria-describedby="button-addon2">

                      </div>
                    </div> <!-- /.form-row -->

                    <div class="form-group mb-3">
                      <label for="address-wpalaceholder">Company Name</label>
                      <input type="text" value="{{$exp->comp_name}}" name="comp_name" id="address-wpalaceholder" class="form-control"
                        placeholder="Enter ..">

                    </div>

                    <div class="form-group mb-3">
                      <label for="address-wpalaceholder">Describe Company</label>
                      <input type="text" value="{{$exp->comp_desc}}" name="comp_desc" id="address-wpalaceholder" class="form-control" placeholder="Enter ..">

                    </div>


                   





                    <button class="btn btn-primary" type="submit">Save</button>
                  </form>
                </div> <!-- /.card-body -->
              </div> <!-- /.card -->
            </div> <!-- /.col -->
          </div> <!-- end section -->
        </div> <!-- /.col-12 col-lg-10 col-xl-10 -->
      </div> <!-- .row -->
    </div> <!-- .container-fluid -->

  </main> <!-- main -->
@endsection