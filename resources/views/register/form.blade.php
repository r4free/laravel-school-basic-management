<form role="form" action="" method="POST">
    @csrf
    <div class="mb-3">
        <input 
        value="Escola teste"
        type="text" 
        class="form-control" 
        placeholder="Nome da escola" 
        aria-label="Nome da escola"
        name="school_name"
    >
    </div>
    <div class="mb-3">
        <input 
        value="Rua 4, 304 - passare"
        type="text" 
        class="form-control" 
        placeholder="Endereço da escola" 
        aria-label="Endereço da escola"
        name="address"
    >
    </div>
    <div class="mb-3">
        <input 
        value="rafael"
        type="text" 
        class="form-control" 
        placeholder="Nome do usuário" 
        aria-label=""
        name="name"
        >
    </div>
    <div class="mb-3">
        <input 
        value="rafael@mailhog.com"
        type="email" 
        class="form-control" 
        placeholder="Email" 
        aria-label="Email"
        name="email"
        >
    </div>
    <div class="mb-3">
        <input
        value="123123"
        type="password" 
        class="form-control" 
        placeholder="Password" 
        aria-label="Password"
        name="password"
        >
    </div>
    <div class="form-check form-check-info text-start">
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
        <label class="form-check-label" for="flexCheckDefault">
        Concordo com os <a href="javascript:;" class="text-dark font-weight-bolder">Termos e condições</a>
        </label>
    </div>
    <div class="text-center">
        <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Cadastrar</button>
    </div>
    <p class="text-sm mt-3 mb-0">Já tem uma conta? <a href="{{route('login')}}" class="text-dark font-weight-bolder">Entrar</a></p>
</form>