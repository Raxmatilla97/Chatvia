<?php

namespace App\Http\Controllers\Auth;

use App\Models\Role;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Repositories\AccountRepository;
use App\Repositories\UserRepository;
use App\Rules\NoSpaceContaine;
use Exception;
use Redirect;
use Hash;
// use Validator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /** @var AccountRepository */
    public $accountRepo;
    /** @var  UserRepository */
    private $userRepository;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/onlineVideoDars';

    /**
     * Create a new controller instance.
     *
     * @param  AccountRepository  $accountRepository
     * @param  UserRepository  $userRepo
     */
    public function __construct(AccountRepository $accountRepository, UserRepository $userRepo)
    {
        $this->accountRepo = $accountRepository;
        $this->userRepository = $userRepo;
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $data['name'] = htmlspecialchars($data['name']);
        // dd($data);
        
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:100'],
            'yashash_hududi' => ['required', 'string', 'max:100'],
            'ish_joyi_yok_oqishi' => ['required', 'string', 'max:100'],
            'ticher_or_student' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users', 'regex:/^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/'],
            'password' => ['required', 'string', 'min:8', 'max:30', 'confirmed', new NoSpaceContaine()],
            
        ]);
        
     
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @throws Exception
     * @return User
     */
    protected function create(array $data)
    {
        
        $user = User::create([
            'name' => htmlspecialchars($data['name']),
            'email' => $data['email'],
            'yashash_hududi' => $data['yashash_hududi'],
            'ish_joyi_yok_oqishi' => $data['ish_joyi_yok_oqishi'],
            'ticher_or_student' => $data['ticher_or_student'],
            'is_active' => '1',
            'password' => Hash::make($data['password']),
        ]);
        
        $this->userRepository->assignRoles($user, ['role_id' => Role::MEMBER_ROLE]);
        $activateCode = $this->accountRepo->generateUserActivationToken($user->id);       
        $this->accountRepo->sendConfirmEmail($user->name, $user->email, $activateCode);

        return $user;
    }
}
