<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
           [
               'name' => 'view-dashboard'
           ],

            [
                'name' => 'view-site'
            ],

            [
                'name' => 'edit-profile'
            ],

            [
                'name' => 'view-activities'
            ],

            [
                'name' => 'view-wallet'
            ],

            [
                'name' => 'view-users'
            ],

            [
                'name' => 'create-users'
            ],

            [
                'name' => 'edit-users'
            ],

            [
                'name' => 'update-users'
            ],

            [
                'name' => 'delete-users'
            ],

            [
                'name' => 'view-tickets'
            ],

            [
                'name' => 'create-tickets'
            ],

            [
                'name' => 'read-tickets'
            ],

            [
                'name' => 'reply-tickets'
            ],

            [
                'name' => 'view-questions'
            ],

            [
                'name' => 'create-question'
            ],

            [
                'name' => 'read-questions'
            ],

            [
                'name' => 'answer-questions'
            ],

            [
                'name' => 'view-roles'
            ],

            [
                'name' => 'create-roles'
            ],

            [
                'name' => 'edit-roles'
            ],

            [
                'name' => 'update-roles'
            ],

            [
                'name' => 'delete-roles'
            ],

            [
                'name' => 'view-permissions'
            ],

            [
                'name' => 'create-permissions'
            ],

            [
                'name' => 'edit-permissions'
            ],

            [
                'name' => 'update-permissions'
            ],

            [
                'name' => 'delete-permissions'
            ],

            [
                'name' => 'view-permission-role'
            ],

            [
                'name' => 'set-permission-role'
            ],

            [
                'name' => 'view-posts'
            ],

            [
                'name' => 'create-posts'
            ],

            [
                'name' => 'edit-posts'
            ],

            [
                'name' => 'update-posts'
            ],

            [
                'name' => 'delete-posts'
            ],

            [
                'name' => 'view-courses'
            ],

            [
                'name' => 'create-courses'
            ],

            [
                'name' => 'edit-courses'
            ],

            [
                'name' => 'update-courses'
            ],

            [
                'name' => 'delete-courses'
            ],

            [
                'name' => 'view-episodes'
            ],

            [
                'name' => 'create-episodes'
            ],

            [
                'name' => 'edit-episodes'
            ],

            [
                'name' => 'update-episodes'
            ],

            [
                'name' => 'delete-episodes'
            ],

            [
                'name' => 'view-categories'
            ],

            [
                'name' => 'create-categories'
            ],

            [
                'name' => 'edit-categories'
            ],

            [
                'name' => 'update-categories'
            ],

            [
                'name' => 'delete-categories'
            ],

            [
                'name' => 'view-tags'
            ],

            [
                'name' => 'create-tags'
            ],

            [
                'name' => 'edit-tags'
            ],

            [
                'name' => 'update-tags'
            ],

            [
                'name' => 'delete-tags'
            ],

            [
                'name' => 'view-comments'
            ],

            [
                'name' => 'create-comments'
            ],

            [
                'name' => 'edit-comments'
            ],

            [
                'name' => 'update-comments'
            ],

            [
                'name' => 'delete-comments'
            ],

            [
                'name' => 'is-approved-comments'
            ],

            [
                'name' => 'reply-comments'
            ],

            [
                'name' => 'save-comments'
            ],

            [
                'name' => 'view-coupons'
            ],

            [
                'name' => 'create-coupons'
            ],

            [
                'name' => 'edit-coupons'
            ],

            [
                'name' => 'update-coupons'
            ],

            [
                'name' => 'delete-coupons'
            ],

            [
                'name' => 'is-approved-coupons'
            ],

            [
                'name' => 'view-offers'
            ],

            [
                'name' => 'create-offers'
            ],

            [
                'name' => 'edit-offers'
            ],

            [
                'name' => 'update-offers'
            ],

            [
                'name' => 'delete-offers'
            ],

            [
                'name' => 'is-approved-offers'
            ],

            [
                'name' => 'view-orders'
            ],

            [
                'name' => 'pay-orders'
            ],

            [
                'name' => 'view-payments'
            ],
        ]);
    }
}
