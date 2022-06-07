@extends('layouts.base')
@section('content')
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0 d-flex justify-content-between">
              <h6>Listagem de escolas</h6>
              <a class="btn btn-primary btn-sm mb-0 " href="{{route('admin.schools.create')}}" type="button">Nova escola</a>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nome</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Cadastrado em</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                   @forelse($schools as $school)
                    <tr>
                      <td>
                        {{ $school->name }}
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">
                        {{ $school->created_at }}
                        </span>
                      </td>
                      <td class="align-middle">
                        <a href="{{ route('admin.schools.edit', $school->id) }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Editar escola">
                          Editar
                        </a>
                      </td>
                    </tr>
                   @empty
                   <tr>
                      <td>
                        
                      </td>
                      <td>
                        
                      </td>
                      <td class="align-middle text-center text-sm">
                      </td>
                      <td class="align-middle text-center">
                      </td>
                      <td class="align-middle">
                      </td>
                    </tr>
                   @endforelse
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection