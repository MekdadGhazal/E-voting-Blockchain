namespace App\Auth;

use Illuminate\Support\Facades\Auth;
use App\Models\Code;

/**
* Class Auth
* @author Yifan Wu
* The container includes this when EA or RA login or try to login or logout
* @package App\Auth
*/
class Auth
{
/**
* @return object or string of the user's information if he is signed in, else return null
*/
public function user()
{
return Auth::user();
}

/**
* @return bool if the user is signed in
*/
public function check()
{
return Auth::check();
}

/**
* @param string $code the ballot code
* @return Code object if the code is validated else return false
*/
public function checkCode($code)
{
$query = new Code();
return $query->validateCode($code);
}

/**
* Attempt log in
* @param $username
* @param $password
* @return bool
*/
public function attempt($username, $password)
{
return Auth::attempt(['username' => $username, 'password' => $password]);
}

/**
* Log out
*/
public function logout()
{
Auth::logout();
}
}
