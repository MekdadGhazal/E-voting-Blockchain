<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\EA\BlockChainController;
use App\Http\Controllers\EA\EASettingController;
use App\Http\Controllers\EA\VoteAPIController;
use App\Http\Controllers\EA\VoteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RA\BallotAPIController;
use App\Http\Controllers\RA\BallotController;
use App\Http\Controllers\RA\CandidateAPIController;
use App\Http\Controllers\RA\CandidateController;
use App\Http\Controllers\Voter\PublicAPIController;
use App\Http\Controllers\Voter\VoterController;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\EAMiddleware;
use App\Http\Middleware\GuestMiddleware;
use App\Http\Middleware\RAMiddleware;
use App\Http\Middleware\VoterMiddleware;
use App\Models\Code;
use App\Models\User;
use App\Models\VoteList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/**
 * Public Page
 */
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/vote/fail', [VoterController::class, 'getFailed'])->name('vote.fail');
Route::get('/verify/home', [VoterController::class, 'getVerifyHome'])->name('verify.home');
Route::get('/verify/now', [VoterController::class, 'getVerify'])->name('verify.now');
Route::get('/tally/home', [VoterController::class, 'getTallyHome'])->name('tally.home');
Route::get('/tally/now', [VoterController::class, 'getTally'])->name('tally.now');

Route::prefix('api')->group(function () {
    Route::get('/bitcoinaddress', [PublicAPIController::class, 'getBitcoinAddress']);
    Route::get('/publickey', [PublicAPIController::class, 'getAllPubKeys']);
    Route::get('/getcandidates', [CandidateAPIController::class, 'getCandidates']);
    Route::get('/sighash', [PublicAPIController::class, 'getSigPair']);
    Route::post('/sigpairs', [PublicAPIController::class, 'postSigPair']);
    Route::get('/eaaddress', [PublicAPIController::class, 'getEABitcoinAddress']);
});


/**
 * Public page for voters
 */

Route::get('/vote/home', [VoterController::class, 'getVote'])->middleware(\App\Http\Middleware\TallyMiddleware::class)->name('vote.home');

Route::middleware([VoterMiddleware::class])->group(function () {
    Route::get('/vote/start', [VoterController::class, 'getStarted'])->name('vote.start');
    Route::get('/vote/wait', [VoterController::class, 'getWait'])->name('vote.wait');
    Route::get('/vote/fill', [VoterController::class, 'getFillForm'])->name('vote.fill');
    Route::get('/vote/lost', [VoterController::class, 'getCandidate'])->name('vote.lost');
    Route::get('/voter/vote', [VoterController::class, 'getVoteList'])->name('voter.vote');
    Route::get('/vote/page', [VoterController::class, 'getCandidate'])->name('vote.vote');

    //API
    Route::post('/api/postpubkey', [PublicAPIController::class, 'postPubKey']);
    Route::post('/api/bitcoinkey', [PublicAPIController::class, 'getBitCoinPriv']);

});

/**
 * Public page
 */
Route::middleware([GuestMiddleware::class])->group(function () {
    Route::get('/auth/signup', [AuthController::class, 'getSignUp'])->name('auth.signup');
    Route::post('/auth/signup', [AuthController::class, 'postSignUp']);
    Route::get('/auth/signin', [AuthController::class, 'getSignIn'])->name('auth.signin');
    Route::post('/auth/signin', [AuthController::class, 'postSignIn']);
});

/**
 * Must login Page
 */
Route::middleware([AuthMiddleware::class])->group(function () {
    Route::get('/auth/signout', [AuthController::class, 'getSignOut'])->name('auth.signout');
    Route::get('/auth/password/change', [PasswordController::class, 'getChangePassword'])->name('auth.password.change');
    Route::post('/auth/password/change', [PasswordController::class, 'postChangePassword']);
    Route::post('/auth/setting', [EASettingController::class, 'postSetting']);
    Route::get('/auth/dashboard', [AuthController::class, 'getDashboard'])->name('auth.dashboard');
});

/**
 * Must login as RA
 */
Route::middleware([RAMiddleware::class])->group(function () {
    // API
    Route::get('/api/addvoter', [BallotAPIController::class, 'postAddVoter']);
    Route::get('/api/addcandidate', [CandidateAPIController::class, 'postAddCandidate']);
    Route::get('/api/updatecandidate', [CandidateAPIController::class, 'postUpdateCandidate']);
    Route::get('/api/delcandidate', [CandidateAPIController::class, 'postDelCandidate']);

    //web
    Route::get('/ra/addVoter', [BallotController::class, 'getAddVoter'])->name('ra.addVoter');
    Route::get('/ra/ballot', [BallotController::class, 'getBallot'])->name('ra.ballot');
    Route::post('/ra/ballot', [BallotController::class, 'postBallot']);

    Route::get('/ra/addcandidate', [CandidateController::class, 'getAddCandidate'])->name('ra.addCandidate');

    Route::get('/ra/dashboard', [BallotController::class, 'getDashboard'])->name('ra.dashboard');
    Route::get('/ra/candidates', [CandidateController::class, 'getCandidatesList'])->name('ra.candidates');
});

/**
 * Must login as EA
 */
Route::middleware([EAMiddleware::class])->group(function () {

    //API
    Route::get('/api/keyslist', [VoteAPIController::class, 'getKeysList']);
    Route::get('/api/togglevote', [VoteAPIController::class, 'getToggleVoting']);
    Route::get('/api/voteprofile', [VoteAPIController::class, 'getProfile']);
    Route::post('/api/updateprofile', [VoteAPIController::class, 'postProfile'])->name('profile.update');
    Route::get('/api/allbitcoinaddress', [PublicAPIController::class, 'getAllBitcoinAddress']);

    //WEB

    Route::get('/ea/vote', [VoteController::class, 'getVoteList'])->name('ea.vote');
    Route::get('/ea/addVote', [VoteController::class, 'getAddVote'])->name('ea.addVote');
    Route::post('/ea/vote', [VoteController::class, 'postVote']);

    Route::get('/ea/balance', [BlockChainController::class, 'getBalanceList'])->name('ea.balance');
    Route::get('/ea/fee', [BlockChainController::class, 'getFeeList'])->name('ea.fee');

    Route::get('/ea/dashboard', [VoteController::class, 'getDashboard'])->name('ea.dashboard');
    Route::get('/ea/setting', [EASettingController::class, 'getSetting'])->name('ea.setting');
    Route::post('/ea/setting', [EASettingController::class, 'postSetting']);
});


Route::get('/ss', function (Request $request) {
    $code = $request->query('code');
    return $code;

//    $item = Code::where('code' , $code)->first();
//    if (VoteList::find($item->item_id)->first()->is_started) return 1;
//    else return 0;
});


Route::get('/pass' , function (){
    $user = User::get();
    foreach ($user as $_user){
        $_user-> update([
            'password' => Hash::make('12345678'),
        ]);
    }
    return 'OK updated Successfully!';
});


Route::get('/a' , [BallotController::class, 'gen']);

Route::get('/vo/{id}' , function($id){
   $user = new \App\Models\UserVote() ;
   return $user->numberVoter($id);

});
