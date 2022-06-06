<div class="container">
    <div class="row">
        <div class="col">
            <form role="form" method="POST" action="{{ isset($student) ? route('admin.students.update', $student->id) : route('admin.students.store') }}">
                @csrf
                
                @isset($student)
                    @method('put')
                @endisset

                <div class="mb-3">
                    <input value="@isset($student) {{ $student->name }} @endisset" name="name" class="form-control form-control-lg" placeholder="Nome" aria-label="Nome">
                </div>
                <div class="mb-3">
                    <input value="@isset($student) {{ $student->email }} @endisset" name="email" class="form-control form-control-lg" placeholder="Email" aria-label="Email">
                </div>

                <div class="form-student">
                    <label for="exampleFormControlSelect1">Turma</label>

                    <select class="form-control" name="group_id" selected="selected" value="{{isset($student) ? $student->group->id : $groups->first()->id }}">
                        @foreach ($groups as $group )
                            <option value="{{$group->id}}">{{$group->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="text-center">
                    <a class="btn  btn-warning btn-lg mt-4 mb-0" href="{{ route('admin.students.index') }}"> Cancelar</a>
                    <button type="submit" class="btn  btn-primary btn-lg mt-4 mb-0">Salvar</button>
                </div>
            </form>

        </div>
    </div>
</div>
