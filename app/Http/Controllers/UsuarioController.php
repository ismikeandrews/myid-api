<?php


namespace App\Http\Controllers;


use App\Usuario;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class UsuarioController extends Controller
{
    /**
     * Retorna todos os usuários cadastrados
     *
     * @return Usuario[]|Collection
     */
    public function index(){
        return Usuario::all();
    }

    /**
     * Retorna um usuário específico
     * pelo código
     *
     * @param int $codUsuario
     * @return mixed
     */
    public function show(int $codUsuario){
        return Usuario::find($codUsuario);
    }

    /**
     * Adiciona um novo usuário
     *
     * @param Request $request
     * @return mixed
     * @throws ValidationException
     */
    public function store(Request $request){
        $usuario = $this->validate($request, Usuario::$rules);

        $usuario['senhaUsuario'] = password_hash($request->senha, PASSWORD_BCRYPT);
        $usuario = Usuario::create($usuario);

        return $usuario->codUsuario;
    }

    /**
     * Atualiza um usuário
     *
     * @param Request $request
     * @param int $codUsuario
     * @return JsonResponse
     * @throws ValidationException
     */
    public function update(Request $request, int $codUsuario){
        $this->validate($request, Usuario::$rules);

        $usuario = Usuario::findOrFail($codUsuario);

        $request->senhaUsuario = password_hash($request->senha, PASSWORD_BCRYPT);
        if ( property_exists($request, 'codTipoUsuario') ) {
            unset($request->codTipoUsuario);
        }

        $usuario->update($request->all());

        return response()->json(['success' => true]);
    }

    /**
     * Exclui um usuário
     *
     * @param int $codUsuario
     * @return JsonResponse
     */
    public function destroy(int $codUsuario){
        Usuario::destroy($codUsuario);

        return response()->json(['success' => true]);
    }

    /**
     * Autentica um usuário e retorna o token
     *
     * @param string $user
     * @param string $password
     * @return bool|string
     */
    public function authenticateUser(string $user, string $password){
        $usuario = $this->getUsuarioPorUser($user);

        if ( ! $usuario ) {
            return response()->json([
                'error' => 'Usuário não encontrado'
            ], 404);
        }

        if (password_verify($password, $usuario->getAttribute('senhaUsuario'))) {
            return response()->json([
                'codUsuario' => $usuario->codUsuario,
            ]);
        }

        return response()->json([
            'error' => 'Senha incorreta'
        ], 403);
    }
    public function getUsuarioPorUser(string $user) {
        return Usuario::where('loginUsuario', $user)->first();
    }

    /**
     * Recebe os dados do login e envia para
     * autenticação
     *
     * @param Request $request
     * @return bool|string
     */
    public function login(Request $request) {
        $user     = $request->loginUsuario;
        $password = $request->senhaUsuario;
        
        return $this->authenticateUser($user, $password);
    }
}
