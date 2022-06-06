@extends('layouts.base')
@section('content')
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0 d-flex justify-content-between">
              <h6>Listagem de alunos</h6>
              <a class="btn btn-primary btn-sm mb-0 " href="{{route('admin.students.create')}}" type="button">Novo aluno(a)</a>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aluno</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Turma</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Cadastrado em</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                   @forelse($students as $student)
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="user1">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$student->name}}</h6>
                            <p class="text-xs text-secondary mb-0">{{$student->email}}</p>
                          </div>
                        </div>
                      </td>
                      <td>
                        @if($student->groups->count())
                          <p class="text-xs font-weight-bold mb-0">{{ $student->group->name }}</p>
                          <p class="text-xs text-secondary mb-0">{{ $student->group->grade->name }}</p>
                        @else
                          Aluno sem turma vinculada
                        @endif
                      </td>
                      
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">
                        {{ $student->created_at }}
                        </span>
                      </td>
                      <td class="align-middle">
                        <a href="{{ route('admin.students.edit', $student->id) }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Editar aluno">
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