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
                  <strong class="card-title">EDUCTION DETAILS</strong>
                </div>
                <div class="card-body">
                  <form class="needs-validation" method="POST" action="{{route('update.edu')}}" novalidate>
                    @csrf
                    <input type="hidden" name="id" value="{{$edu->id}}">

                    <div class="form-group mb-3">
                      <label for="address-wpalaceholder">Universty/School/Institute</label>
                      <input type="text" value="{{$edu->eduname}}" name="eduname" id="address-wpalaceholder" class="form-control"
                        placeholder="Enter ..">

                    </div>

                    <div class="form-row">
                      <div class="col-md-8 mb-3">
                        <label for="exampleInputEmail2">Start date</label>
                        <input type="text" value="{{$edu->startdate}}" class="form-control drgpicker" name="startdate" id="date-input1" value="04/24/2020" aria-describedby="button-addon2">

                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="custom-phone">end date</label>
                        <input type="text" value="{{$edu->enddate}}" class="form-control drgpicker" name="enddate" id="date-input1" value="04/24/2020" aria-describedby="button-addon2">

                      </div>
                    </div> <!-- /.form-row -->
                    <div class="form-group mb-3">
                      <label for="address-wpalaceholder">Kind of date</label>
                      <select class="form-control" name="level_id" id="example-select">
                        @foreach ($level as $item)
                        <option value="{{$item->id}}" {{$item->id ==$edu->level_id ? 'selected': ''}}>{{$item->levelname}}</option>  
                        @endforeach
                        

                      </select>

                    </div>

                    <div class="form-group mb-3">
                      <label for="address-wpalaceholder">Field/Possition</label>
                      <input type="text" value="{{$edu->field}}" name="field" id="address-wpalaceholder" class="form-control"
                        placeholder="Enter ..">

                    </div>

                    <div class="form-group mb-3">
                      <label for="address-wpalaceholder">describe what you have got</label>
                      <input type="text" value="{{$edu->desc}}" name="desc" id="address-wpalaceholder" class="form-control" placeholder="Enter ..">

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