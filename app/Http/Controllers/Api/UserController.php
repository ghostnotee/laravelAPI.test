<?php

namespace App\Http\Controllers\Api;


use App\Http\Requests\UserStoreRequest;
use App\Http\Resources\UserResource;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $offset = $request->has('offset') ? $request->query('offset') : 0;
        $limit = $request->has('limit') ? $request->query('limit') : 10;

        $queryBuilder = User::query();
        if ($request->has('q'))
            $queryBuilder->where('name', 'like', '%' . $request->query('q') . '%');
        if ($request->has('sortBy'))
            $queryBuilder->orderBy($request->query('sortBy'), $request->query('sort', 'DESC'));

        $data = $queryBuilder->offset($offset)->limit($limit)->get();

        $data->each->setAppends(['full_name']);

        return response($data, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserStoreRequest $request
     * @return Response
     */
    public function store(UserStoreRequest $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return response([
            'date' => $user,
            'message' => 'User created.'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param user $user
     * @return user
     */
    public function show(user $user)
    {
        return $user;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param user $user
     * @return Response
     */
    public function update(Request $request, user $user)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return response([
            'data' => $user,
            'message' => 'User updated.'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param user $user
     * @return Response
     * @throws Exception
     */
    public function destroy(user $user)
    {
        $user->delete();

        return response(['message' => 'User deleted'], 200);
    }

    public function custom1()
    {
        //$user2 = User::find(2);
        //data kapsayıcısını kaldırmak için.
        //UserResource::withoutWrapping();
        //return new UserResource($user2);

        $users = User::all();
        //return UserResource::collection($users);
        //return new UserCollection($users);

        // User Collection dosyası yerine additional ile de ek kolon ve değerler verip dönüş sağlanılabilir.
        return UserResource::collection($users)->additional([
            'meta' => [
                'total_users' => $users->count(),
                'custom' => 'value'
            ]
        ]);
    }
}
