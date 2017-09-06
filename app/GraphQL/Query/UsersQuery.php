<?php

namespace App\GraphQL\Query;

use App\Models\User;
use GraphQL;
use GraphQL\Type\Definition\Type;
use App\GraphQL\BaseQuery as Query;
use Rebing\GraphQL\Support\SelectFields;
use GraphQL\Type\Definition\ResolveInfo;

class UsersQuery extends Query
{
    protected $attributes = [
        'name' => 'Users Query',
        'description' => 'A query of users'
    ];

    public function type()
    {
        // result of query with pagination laravel
        return GraphQL::paginate('user');
    }

    // arguments to filter query
    public function args()
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int()
            ],

            'email' => [
                'name' => 'email',
                'type' => Type::string()
            ],

            'name' => [
                'name' => 'name',
                'type' => Type::string()
            ],

            'surname' => [
                'name' => 'surname',
                'type' => Type::string()
            ],
        ];
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        $select = $fields->getSelect();
        $with = array_keys($fields->getRelations());

        $where = function($query) use ($args) {
            if (isset($args['id'])) $query->where('id', $args['id']);
            if (isset($args['email'])) $query->where('email', strtolower($args['email']));
            if (isset($args['name'])) $query->where('name', $args['name']);
            if (isset($args['surname'])) $query->where('surname', $args['surname']);
        };

        return User::select($select)
            ->with($with)
            ->where($where)
            ->paginate();
    }
}
