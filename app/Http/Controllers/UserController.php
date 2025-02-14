<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;

class UserController extends Controller
{
//     protected $userRepo;

//     public function __construct(UserRepository $userRepo)
//     {
//         $this->userRepo = $userRepo;
//     }
//     public function index(Request $request)
//     {
//         $users = $this->userRepo->getAllUsers();
//         return Response::json(['message' => 'success', 'data' => $users], 200);
//     }

//     /**
//      * Search users with roles
//      * @return \Symfony\Component\HttpFoundation\Response
//      */
//     public function search(Request $request)
//     {
//         $user = User::with('roles')->where('name', 'LIKE', '%' . $request->input('q') . '%')->get();
//         return Response::json(['message' => 'success', 'data' => $user], 200);
//     }
//     /**
//      * Store users data
//      * @param string $name
//      * @param string $username
//      * @param string $email
//      * @param string $password
//      * @return \Symfony\Component\HttpFoundation\Response
//      */
//     public function store(Request $request)
//     {
//         try {
//             // if ($request->validated()) {
//                 $user = $this->userRepo->addUserInfo($request);

//                 return Response::json(['message' => "Store user info", 'data' => $user], 200);
//             // }
//             // return Response::json(['message' => "Request invalid", 'data' => null], 400);
//         } catch (\Exception $e) {
//             Log::info($e->getMessage());
//             return Response::json(['message' => $e->getMessage(), 'data' => null], 500);
//         }
//     }

//     /**
//      * Retrieve all roles
//      * @return \Symfony\Component\HttpFoundation\Response
//      */

//     public function EditUserInfo($id, Request $request)
//     {
//         try {
//             $user = $this->userRepo->editUserInfo($id, $request);
//             return $user;
//         } catch (\Throwable $th) {
//             Log::info("edit user info => ", [$th]);
//             return Response::json(['message' => 'Internal server error', 'data' => null], 500);
//         }
//     }

//     public function deleteUser($id)
//     {
//         try {
//             $user = $this->userRepo->deleteUser($id);
//             return $user;

//         } catch (\Throwable $th) {
//             Log::info("delete user info => ", [$th]);
//             return Response::json(['message' => 'Internal server error', 'data' => null], 500);
//         }

//     }

//     public function getUser($id)
//     {
//         try {
//             $user = $this->userRepo->getUser($id);
//             return $user;
//         } catch (\Throwable $th) {
//             Log::info("get user info => ", [$th]);
//             return Response::json(['message' => 'Internal server error', 'data' => null], 500);
//         }
//     }

//     public function login(Request $request)
//     {
//         try {
//             $user = $this->userRepo->login($request);
//             return Response::json(['message' => 'Login successfull', 'data' => true], 200);
//         } catch (\Throwable $th) {
//             throw $th;
//         }
//     }

}
// */
