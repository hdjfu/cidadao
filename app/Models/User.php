<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable 
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];
    protected $guarded = [];
    // public function posts (){
    //     return $this->hasMany(post::class, 'user_id','id');
    // }
    public function show($id){
        $user = User::where('id', '=',$id)->get();
        return $user;
    }
    public function updatePerfil($id, $perfil, $request){
// se o usuario colocar uma foto na capa continua, e caso não tenha vai para o else
if (isset($request->capa)){
    // caso a requisições forem aquivos e for valido continua
    if($request->hasFile('capa') && $request->file('capa')->isValid()) {
        // pega o nome do arquivo
        $requestcapa = $request->capa;
        // pega a extenção da imagem
        $extension = $requestcapa->extension();
        // muda o nome do arquivo e coloca a extenção 
        $capaName = md5($requestcapa->getClientOriginalName() . strtotime("now")) . "." . $extension;
        // coloca o arquivo de imagem na pasta postagens 
        $requestcapa->move(public_path('img/postagens'), $capaName);
        // pega o nome final pra colocar no banco de dados
        $perfil['capa'] = $capaName;
        
    }
}else{
    // caso não tenha imagem coloca esse nome generico para que não apareca no front
     $perfil['capa'] = 'Não tem capa';
}
// se conecta no banco e faz um update das informações que foram passada no front
        $user= User::where('id', $id)
        ->update(['capa' => $perfil['capa'], 'sobre_voce' => $perfil['sobre_voce']]);
        return $user;
    }
}


