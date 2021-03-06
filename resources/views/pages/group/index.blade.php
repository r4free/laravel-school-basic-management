@extends('layouts.base')
@section('content')
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0 d-flex justify-content-between">
              <h6>Listar turmas</h6>
              <a class="btn btn-primary btn-sm mb-0 " href="{{route('admin.groups.create')}}" type="button">Nova turma</a>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Turma</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Série</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Cadastrado em</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                   @forelse($groups as $group)
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="user1">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$group->name}}</h6>
                            <p class="text-xs text-secondary mb-0"></p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$group->grade->name}}</p>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">
                          {{ $group->created_at }}
                        </span>
                      </td>
                      <td class="align-middle">
                        <a href="{{ route('admin.groups.edit', $group->id) }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
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
                {{ $groups->links() }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection