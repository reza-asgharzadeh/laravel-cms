<?php

namespace Database\Seeders;

use App\Models\Permission;
use Carbon\Carbon;
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
        $currentTime = Carbon::now()->format('Y-m-d H:i:s');

        Permission::insert([
            [
                'name' => 'display-dashboard',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'display-site',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'display-edit-profile',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'display-my-courses',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'display-wallet',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'display-users',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'display-tickets',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'display-questions-answers',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'display-roles-permissions',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'display-pages',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'display-posts',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'display-courses',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'display-categories',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'display-tags',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'display-comments',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'display-contact-form',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'display-newsletter',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'display-alert-bar',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'display-discount',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'display-orders',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'display-payments',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

           [
               'name' => 'view-dashboard',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
           ],

            [
                'name' => 'view-site',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],
            //edit Profile
            [
                'name' => 'view-account-information',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'update-account-information',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'view-user-information',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'update-user-information',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'view-user-communication',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'update-user-communication',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'view-account-password',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'update-account-password',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'view-activities',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'delete-activities',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],
            //
            [
                'name' => 'view-my-courses',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'view-wallet',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'update-wallet',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'view-users',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'create-user',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'store-user',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'edit-users',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'update-users',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'delete-users',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'view-tickets',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'create-ticket',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'store-ticket',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'read-tickets',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'reply-tickets',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'view-questions',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'create-question',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'store-question',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'read-questions',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'answer-questions',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'view-roles',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'store-role',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'edit-roles',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'update-roles',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'delete-roles',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'view-permission-role',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'set-permission-role',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'view-permissions',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'store-permission',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'edit-permissions',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'update-permissions',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'delete-permissions',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'view-pages',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'create-page',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'store-page',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'edit-pages',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'is-approved-pages',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'update-pages',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'delete-pages',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'view-posts',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'create-post',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'store-post',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'edit-posts',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'is-approved-posts',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'update-posts',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'delete-posts',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'view-courses',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'create-course',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'store-course',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'edit-courses',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'is-approved-courses',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'update-courses',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'delete-courses',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'view-course-chapters',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'view-course-faqs',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'view-faq-course',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'view-chapter-course',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'view-chapter-episodes',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'view-episode-chapter',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'view-chapters',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'create-chapter',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'store-chapter',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'edit-chapters',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'update-chapters',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'delete-chapters',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'view-episodes',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'create-episode',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'store-episode',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'edit-episodes',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'update-episodes',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'delete-episodes',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'view-faqs',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'create-faq',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'store-faq',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'edit-faqs',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'update-faqs',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'delete-faqs',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'view-categories',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'store-category',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'edit-categories',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'update-categories',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'delete-categories',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'view-tags',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'store-tag',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'edit-tags',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'update-tags',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'delete-tags',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'view-comments',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'save-comment',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'edit-comments',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'reply-comments',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'update-comments',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'is-approved-comments',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'delete-comments',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'view-contact-forms',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'edit-contact-forms',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'update-contact-forms',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'reply-contact-forms',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'save-contact-form',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'delete-contact-forms',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'view-newsletters',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'edit-newsletters',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'update-newsletters',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'is-approved-newsletters',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'delete-newsletters',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'view-alert-bars',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'create-alert-bar',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'store-alert-bar',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'edit-alert-bars',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'update-alert-bars',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'is-approved-alert-bars',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'delete-alert-bars',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'view-coupons',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'create-coupon',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'store-coupon',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'edit-coupons',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'is-approved-coupons',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'update-coupons',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'delete-coupons',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'view-offers',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'create-offer',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'store-offer',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'edit-offers',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'is-approved-offers',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'update-offers',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'delete-offers',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'view-orders',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'pay-orders',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'view-payments',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],
        ]);
    }
}
