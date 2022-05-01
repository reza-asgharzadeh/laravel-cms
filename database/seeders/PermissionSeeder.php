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
        Permission::insert([
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
                'name' => 'update-profile'
            ],

            [
                'name' => 'view-activities'
            ],

            [
                'name' => 'delete-activities'
            ],

            [
                'name' => 'view-wallet'
            ],

            [
                'name' => 'view-users'
            ],

            [
                'name' => 'create-user'
            ],

            [
                'name' => 'store-user'
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
                'name' => 'create-ticket'
            ],

            [
                'name' => 'store-ticket'
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
                'name' => 'store-question'
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
                'name' => 'store-role'
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
                'name' => 'view-permission-role'
            ],

            [
                'name' => 'set-permission-role'
            ],

            [
                'name' => 'view-permissions'
            ],

            [
                'name' => 'store-permission'
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
                'name' => 'view-posts'
            ],

            [
                'name' => 'create-post'
            ],

            [
                'name' => 'store-post'
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
                'name' => 'create-course'
            ],

            [
                'name' => 'store-course'
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
                'name' => 'create-episode'
            ],

            [
                'name' => 'store-episode'
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
                'name' => 'store-category'
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
                'name' => 'store-tag'
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
                'name' => 'save-comment'
            ],

            [
                'name' => 'edit-comments'
            ],

            [
                'name' => 'reply-comments'
            ],

            [
                'name' => 'update-comments'
            ],

            [
                'name' => 'is-approved-comments'
            ],

            [
                'name' => 'delete-comments'
            ],

            [
                'name' => 'view-coupons'
            ],

            [
                'name' => 'create-coupon'
            ],

            [
                'name' => 'store-coupon'
            ],

            [
                'name' => 'edit-coupons'
            ],

            [
                'name' => 'is-approved-coupons'
            ],

            [
                'name' => 'update-coupons'
            ],

            [
                'name' => 'delete-coupons'
            ],

            [
                'name' => 'view-offers'
            ],

            [
                'name' => 'create-offer'
            ],

            [
                'name' => 'store-offer'
            ],

            [
                'name' => 'edit-offers'
            ],

            [
                'name' => 'is-approved-offers'
            ],

            [
                'name' => 'update-offers'
            ],

            [
                'name' => 'delete-offers'
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
