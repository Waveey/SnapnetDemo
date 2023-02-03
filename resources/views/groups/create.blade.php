@extends('layouts.app')
@section('stylesheets')
  <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />
@endsection
@section('content')
  <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-10">
            <h4><span class="fa fa-object-group" aria-hidden="true"></span>&nbsp;Create Group <small>Your Files, Anytime, Anywhere.....</small></h4>
          </div>
          <div class="col-md-2">

          </div>
        </div>
      </div>
    </header>

    <section id="breadcrumb">
      <div class="container">
        <ol class="breadcrumb">
          <li class="active">Admin/Groups/Create</li>
        </ol>
      </div>
    </section>

    <section id="main"  style="min-height:480px;">
      <div class="container">
        <div class="row">

          <div class="col-md-9">
            <!-- Website Overview -->

            @if (session('error'))
                    <div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close" ><span aria-hidden="true">&times</span> </button>
                        {{ session('error') }}
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close" ><span aria-hidden="true">&times</span> </button>
                        {{ session('success') }}
                    </div>
                @endif
            <form class="form-horizontal" method="POST" action="{{ route('groups.save') }}">
              {{ csrf_field() }}
              <div class="panel panel-default">
                <div class="panel-heading main-color-bg">
                  <h3 class="panel-title">Group Details</h3>
                </div>

                <div class="panel-body">
                  <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="">
                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                  </div>

                  <div class="form-group">
                    <label for="">Users in Group</label>
                    <select class="form-control group-multiple" name="user_id[]" multiple>
                      @forelse ($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                      @empty
                        <option value="">No Users Created</option>
                      @endforelse
                    </select>
                    <!-- <p class="help-block">Help text here.</p> -->
                  </div>
                </div>
                <div class="panel-footer">
                  <button type="submit" class="btn btn-primary">
                      Create Group
                  </button>

                </div>
                </div>
                </form>





              <!-- Latest Users -->

          </div>
        <div class="col-md-3">
          <div class="panel panel-default">
            <div class="panel-heading main-color-bg">
              <h3 class="panel-title">Groups</h3>
            </div>
            <div class="panel-body">
              <div id="data" class="demo"></div>

            </div>
            </div>
        </div>
        </div>



      </div>
    </section>
@endsection
@section('scripts')
<script src="{{asset('js/select2.min.js')}}"></script>
<script type="text/javascript">
$(document).ready(function() {
  $('.group-multiple').select2();
});
</script>
@endsection
