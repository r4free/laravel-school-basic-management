<div class="container">
    <div class="row">
        <div class="col">
            <form role="form" method="POST" action="{{ isset($school) ? route('admin.schools.update', $school->id) : route('admin.schools.store') }}">
                @csrf
                
                @isset($school)
                    @method('put')
                @endisset

                <div class="mb-3">
                    <input value="@isset($school) {{ $school->name }} @endisset" name="name" class="form-control form-control-lg" placeholder="Nome" aria-label="Nome">
                </div>
                <div class="mb-3">
                    <input value="@isset($school) {{ $school->address }} @endisset" name="address" class="form-control form-control-lg" placeholder="Endereço" aria-label="Endereço">
                </div>
                <div class="text-center">
                    <a class="btn  btn-warning btn-lg mt-4 mb-0" href="{{ route('admin.schools.index') }}"> Cancelar</a>
                    <button type="submit" class="btn  btn-primary btn-lg mt-4 mb-0">Salvar</button>
                </div>
            </form>

        </div>
    </div>
</div>
