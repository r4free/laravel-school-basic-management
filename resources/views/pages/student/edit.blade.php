@extends('layouts.base')
@section('content')
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6> Editar aluno </h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              @include('pages.student.components.form')
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection