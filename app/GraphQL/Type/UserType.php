<?php

namespace App\GraphQL\Type;

use GraphQL;
use App\Models\User;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\SelectFields;
use Rebing\GraphQL\Support\Type as GraphQLType;

class UserType extends GraphQLType
{
    protected $attributes = [
        'name' => 'User',
        'description' => 'A User.',
        'model' => User::class, // define model for users type
    ];

    // define field of type
    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of the user'
            ],

            'email' => [
                'type' => Type::string(),
                'description' => 'The email of user'
            ],

            'name' => [
                'type' => Type::string(),
                'description' => 'The name of the user'
            ],

            'surname' => [
                'type' => Type::string(),
                'description' => 'The surname of the user'
            ],

            // Should use the 'scopeIsMe' function on our custom User model (currently uses an accessor)
            'isMe' => [
                'type' => Type::boolean(),
                'description' => 'True, if the queried user is the current user',
                'selectable' => false, // Does not try to query this from the database
            ],

            // Uses the 'scopeIsNotMe' function on our custom User model (currently uses an accessor)
            'isNotMe' => [
                'type' => Type::boolean(),
                'description' => 'True, if the queried user is NOT the current user',
                'selectable' => false, // Does not try to query this from the database
            ],

//            'posts' => [
//                'args' => [
//                    'id' => [
//                        'type'        => Type::int(),
//                        'description' => 'Post id',
//                    ],
//                ],
//                'type'        => Type::listOf(GraphQL::type('post')),
//                'description' => 'User posts',
//            ],
        ];
    }

    public function resolveEmailField($root, $args)
    {
        return strtolower($root->email);
    }

//    public function resolvePostsField($root, $args)
//    {
//        $where = function($query) use ($args) {
//            if (isset($args['id'])) {
//                $query->where('posts.id', $args['id']);
//            }
//        };
//
//        // Otherwise, return all posts from this user
//        return $root->posts()
//            ->where($where)
//            ->paginate();
//    }

}
