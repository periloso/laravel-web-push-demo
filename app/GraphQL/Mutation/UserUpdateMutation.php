<?php

namespace App\GraphQL\Mutation;

use App\Models\User;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\SelectFields;
use GraphQL\Type\Definition\Type;

class UserUpdateMutation extends Mutation
{
    protected $attributes = [
        'name' => 'UserUpdateMutation',
        'description' => 'Updates a user.'
    ];

    public function type()
    {
        return GraphQL::type('user');
    }

    public function args()
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int(),
//                'rules' => ['required', 'exists:users'],
            ],
            'name' => [
                'name' => 'name',
                'type' => Type::string(),
            ],
            'surname' => [
                'name' => 'surname',
                'type' => Type::string(),
            ],
            'email' => [
                'name' => 'email',
                'type' => Type::string(),
//                'rules' => ['email'],
            ],
            'password' => [
                'name' => 'password',
                'type' => Type::string(),
            ],
        ];
    }

    public function rules()
    {
        return [
//            'email' => ['email'],
//            'id' => ['required|exists:users'],
        ];
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        $user = null;

        if ( (!isset($args['id'])) && (!isset($args['email'])) ) return null;

        if (isset($args['id'])) $user = User::find($args['id']);
        if (isset($args['email'])) $user = User::where('email', $args['email'])->first();

        if (!$user) {
            return null;
        }

        if (isset($args['name']))       $user->name = $args['name'];
        if (isset($args['email']))      $user->email = $args['email'];
        if (isset($args['password']))   $user->password = $args['password'];
        $user->save();

        return $user;
    }
}
