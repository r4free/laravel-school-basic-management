<div class="container">
    <div class="row">
        <div class="col">
            <form role="form" method="POST" action="{{ isset($group) ? route('admin.groups.update', $group->id) : route('admin.groups.store') }}">
                @csrf
                
                @isset($group)
                    @method('put')
                @endisset

                <div class="mb-3">
                    <input value="@isset($group) {{ $group->name }} @endisset" name="name" class="form-control form-control-lg" placeholder="Nome" aria-label="Nome">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlSelect1">Série</label>

                    <select class="form-control" name="grade_id">
                        @inject("grades", "\App\Models\Grade")
                        @foreach ($grades->all() as $grade )
                        <option value="{{$grade->id}}">{{$grade->name}}</option>
                        @endforeach
                    </select>
                </div>


                <div class="form-group">
                    <label for="exampleFormControlSelect1">Turno</label>
                    <select class="form-control" name="shift">
                        @foreach (collect(["manhã","tarde"]) as $shift )
                        <option value="{{$shift}}">{{$shift}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="text-center">
                    <a class="btn  btn-warning btn-lg mt-4 mb-0" href="{{ route('admin.groups.index') }}"> Cancelar</a>
                    <button type="submit" class="btn  btn-primary btn-lg mt-4 mb-0">Salvar</button>
                </div>
            </form>

        </div>
    </div>
</div>
