<div class="container">
    <div class="row">
        <div class="col">
            <form role="form" method="POST" action="{{ route('admin.groups.store') }}">
                @csrf

                <div class="mb-3">
                    <input value="" name="name" class="form-control form-control-lg" placeholder="Nome" aria-label="Nome">
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
                    <button type="submit" class="btn  btn-primary btn-lg mt-4 mb-0">Salvar</button>
                </div>
            </form>

        </div>
    </div>
</div>
