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
                'label' => 'نمایش داشبورد',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'display-site',
                'label' => 'نمایش سایت',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'display-edit-profile',
                'label' => 'نمایش ویرایش پروفایل',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'display-my-courses',
                'label' => 'نمایش دوره‌های من',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'display-wallet',
                'label' => 'نمایش کیف پول',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'display-users',
                'label' => 'نمایش کاربران',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'display-tickets',
                'label' => 'نمایش تیکت‌ها',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'display-questions-answers',
                'label' => 'نمایش پرسش‌ها و پاسخ‌ها',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'display-roles-permissions',
                'label' => 'نمایش نقش‌ها و دسترسی‌ها',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'display-pages',
                'label' => 'نمایش صفحات',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'display-posts',
                'label' => 'نمایش مقالات',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'display-courses',
                'label' => 'نمایش دوره‌ها',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'display-categories',
                'label' => 'نمایش دسته بندی‌ها',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'display-tags',
                'label' => 'نمایش برچسب‌ها',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'display-comments',
                'label' => 'نمایش نظرات',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'display-contact-forms',
                'label' => 'نمایش فرم‌های تماس',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'display-newsletters',
                'label' => 'نمایش خبرنامه‌ها',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'display-alert-bars',
                'label' => 'نمایش نوارهای اطلاع‌رسانی',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'display-discounts',
                'label' => 'نمایش جشنواره و کد تخفیف',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'display-orders',
                'label' => 'نمایش لیست سفارشات',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'display-payments',
                'label' => 'نمایش لیست پرداخت‌ها',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

           [
               'name' => 'view-dashboard',
                'label' => 'مشاهده داشبورد',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
           ],

            [
                'name' => 'view-site',
                'label' => 'مشاهده سایت',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],
            //edit Profile
            [
                'name' => 'view-account-information',
                'label' => 'مشاهده اطلاعات کاربر',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'update-account-information',
                'label' => 'بروزرسانی اطلاعات کاربر',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'view-user-information',
                'label' => 'مشاهده اطلاعات فردی',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'update-user-information',
                'label' => 'برزورسانی اطلاعات فردی',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'view-user-communication',
                'label' => 'مشاهده راه‌های ارتباطی',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'update-user-communication',
                'label' => 'بروزرسانی راه‌های ارتباطی',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'view-account-password',
                'label' => 'مشاهده تغییر رمز عبور',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'update-account-password',
                'label' => 'بروزرسانی تغییر رمز عبور',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'view-activities',
                'label' => 'مشاهده اطلاعات ورود',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'delete-activities',
                'label' => 'حذف نشست کاربر',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],
            //
            [
                'name' => 'view-my-courses',
                'label' => 'مشاهده دوره‌های من',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'view-wallet',
                'label' => 'مشاهده کیف پول',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'update-wallet',
                'label' => 'پرداخت کیف پول',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'view-users',
                'label' => 'مشاهده کاربران',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'create-user',
                'label' => 'ایجاد کاربر',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'store-user',
                'label' => 'ذخیره کاربر',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'edit-users',
                'label' => 'ویرایش کاربران',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'update-users',
                'label' => 'بروزرسانی کاربران',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'delete-users',
                'label' => 'حذف کاربران',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'view-tickets',
                'label' => 'مشاهده تیکت‌ها',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'create-ticket',
                'label' => 'ایجاد تیکت',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'store-ticket',
                'label' => 'ذخیره تیکت',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'read-tickets',
                'label' => 'خواندن تیکت‌ها',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'reply-tickets',
                'label' => 'پاسخ به تیکت‌ها',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'view-questions',
                'label' => 'مشاهده پرسش‌ها',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'create-question',
                'label' => 'ایجاد پرسش',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'store-question',
                'label' => 'ذخیره پرسش',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'read-questions',
                'label' => 'خواندن پرسش‌ها',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'answer-questions',
                'label' => 'پاسخ به پرسش‌ها',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'view-roles',
                'label' => 'مشاهده نقش‌ها',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'store-role',
                'label' => 'ذخیره نقش',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'edit-roles',
                'label' => 'ویرایش نقش‌ها',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'update-roles',
                'label' => 'بروزرسانی نقش‌ها',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'delete-roles',
                'label' => 'حذف نقش‌ها',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'view-permission-role',
                'label' => 'مشاهده دسترسی نقش‌ها',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'set-permission-role',
                'label' => 'تنظیم دسترسی به نقش',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'view-permissions',
                'label' => 'مشاهده دسترسی‌ها',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'store-permission',
                'label' => 'ذخیره دسترسی',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'edit-permissions',
                'label' => 'ویرایش دسترسی‌ها',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'update-permissions',
                'label' => 'بروزرسانی دسترسی‌ها',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'delete-permissions',
                'label' => 'حذف دسترسی‌ها',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'view-pages',
                'label' => 'مشاهده صفحات',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'create-page',
                'label' => 'ایجاد صفحه',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'store-page',
                'label' => 'ذخیره صفحه',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'edit-pages',
                'label' => 'ویرایش صفحات',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'is-approved-pages',
                'label' => 'تغییر وضعیت صفحات',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'update-pages',
                'label' => 'بروزرسانی صفحات',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'delete-pages',
                'label' => 'حذف صفحات',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'view-posts',
                'label' => 'مشاهده مقالات',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'create-post',
                'label' => 'ایجاد مقاله',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'store-post',
                'label' => 'ذخیره مقاله',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'edit-posts',
                'label' => 'ویرایش مقالات',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'is-approved-posts',
                'label' => 'تغییر وضعیت مقالات',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'update-posts',
                'label' => 'بروزرسانی مقالات',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'delete-posts',
                'label' => 'حذف مقالات',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'view-courses',
                'label' => 'مشاهده دوره‌ها',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'create-course',
                'label' => 'ایجاد دوره',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'store-course',
                'label' => 'ذخیره دوره',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'edit-courses',
                'label' => 'ویرایش دوره‌ها',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'is-approved-courses',
                'label' => 'تغییر وضعیت دوره‌ها',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'update-courses',
                'label' => 'بروزرسانی دوره‌ها',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'delete-courses',
                'label' => 'حذف دوره‌ها',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'view-course-chapters',
                'label' => 'مشاهده فصل‌های دوره',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'view-course-faqs',
                'label' => 'مشاهده سوالات متداول دوره',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'view-faq-course',
                'label' => 'مشاهده دوره سوال متداول',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'view-chapter-course',
                'label' => 'مشاهده دوره فصل',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'view-chapter-episodes',
                'label' => 'مشاهده جلسات فصل',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'view-episode-chapter',
                'label' => 'مشاهده فصل جلسه',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'view-chapters',
                'label' => 'مشاهده فصل‌ها',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'create-chapter',
                'label' => 'ایجاد فصل',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'store-chapter',
                'label' => 'ذخیره فصل',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'edit-chapters',
                'label' => 'ویرایش فصل‌ها',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'update-chapters',
                'label' => 'بروزرسانی فصل‌ها',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'delete-chapters',
                'label' => 'حذف فصل‌ها',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'view-episodes',
                'label' => 'مشاهده جلسات',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'create-episode',
                'label' => 'ایجاد جلسه',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'store-episode',
                'label' => 'ذخیره جلسه',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'edit-episodes',
                'label' => 'ویرایش جلسات',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'update-episodes',
                'label' => 'بروزرسانی جلسات',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'delete-episodes',
                'label' => 'حذف جلسات',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'view-faqs',
                'label' => 'مشاهده سوالات متداول',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'create-faq',
                'label' => 'ایجاد سوال متداول',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'store-faq',
                'label' => 'ذخیره سوال متداول',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'edit-faqs',
                'label' => 'ویرایش سوالات متداول',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'update-faqs',
                'label' => 'بروزرسانی سوالات متداول',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'delete-faqs',
                'label' => 'حذف سوالات متداول',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'view-categories',
                'label' => 'مشاهده دسته بندی‌ها',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'store-category',
                'label' => 'ذخیره دسته بندی',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'edit-categories',
                'label' => 'ویرایش دسته بندی‌ها',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'update-categories',
                'label' => 'بروزرسانی دسته بندی‌ها',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'delete-categories',
                'label' => 'حذف دسته بندی‌ها',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'view-tags',
                'label' => 'مشاهده برچسب‌ها',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'store-tag',
                'label' => 'ذخیره برچسب',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'edit-tags',
                'label' => 'ویرایش برچسب‌ها',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'update-tags',
                'label' => 'بروزرسانی برچسب‌ها',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'delete-tags',
                'label' => 'حذف برچسب‌ها',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'view-comments',
                'label' => 'مشاهده نظرات',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'save-comment',
                'label' => 'ذخیره نظر',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'edit-comments',
                'label' => 'ویرایش نظرات',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'reply-comments',
                'label' => 'پاسخ به نظرات',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'update-comments',
                'label' => 'بروزرسانی نظرات',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'is-approved-comments',
                'label' => 'تغییر وضعیت نظر',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'delete-comments',
                'label' => 'حذف نظرات',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'view-contact-forms',
                'label' => 'مشاهده فرم‌های تماس',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'edit-contact-forms',
                'label' => 'ویرایش فرم‌های تماس',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'update-contact-forms',
                'label' => 'بروزرسانی فرم‌های تماس',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'reply-contact-forms',
                'label' => 'پاسخ فرم‌های تماس',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'save-contact-form',
                'label' => 'ذخیره فرم تماس',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'delete-contact-forms',
                'label' => 'حذف فرم‌های تماس',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'view-newsletters',
                'label' => 'مشاهده خبرنامه‌ها',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'edit-newsletters',
                'label' => 'ویرایش خبرنامه‌ها',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'update-newsletters',
                'label' => 'بروزرسانی خبرنامه‌ها',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'is-approved-newsletters',
                'label' => 'تغییر وضعیت خبرنامه‌ها',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'delete-newsletters',
                'label' => 'حذف خبرنامه‌ها',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'view-alert-bars',
                'label' => 'مشاهده نوارهای اطلاع‌رسانی',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'create-alert-bar',
                'label' => 'ایجاد نوار اطلاع‌رسانی',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'store-alert-bar',
                'label' => 'ذخیره نوار اطلاع‌رسانی',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'edit-alert-bars',
                'label' => 'ویرایش نوارهای اطلاع‌رسانی',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'update-alert-bars',
                'label' => 'بروزرسانی نوارهای اطلاع‌رسانی',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'is-approved-alert-bars',
                'label' => 'تغییر وضعیت نوارهای اطلاع‌رسانی',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'delete-alert-bars',
                'label' => 'حذف نوارهای اطلاع‌رسانی',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'view-coupons',
                'label' => 'مشاهده کدهای تخفیف',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'create-coupon',
                'label' => 'ایجاد کد تخفیف',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'store-coupon',
                'label' => 'ذخیره کد تخفیف',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'edit-coupons',
                'label' => 'ویرایش کدهای تخفیف',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'is-approved-coupons',
                'label' => 'تغییر وضعیت کدهای تخفیف',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'update-coupons',
                'label' => 'بروزرسانی کدهای تخفیف',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'delete-coupons',
                'label' => 'حذف کدهای تخفیف',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'view-offers',
                'label' => 'مشاهده پیشنهادات تخفیف',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'create-offer',
                'label' => 'ایجاد پیشنهاد تخفیف',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'store-offer',
                'label' => 'ذخیره پیشنهاد تخفیف',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'edit-offers',
                'label' => 'ویرایش پیشنهادات تخفیف',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'is-approved-offers',
                'label' => 'تغییر وضعیت پیشنهادات تخفیف',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'update-offers',
                'label' => 'بروزرسانی پیشنهادات تخفیف',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'delete-offers',
                'label' => 'حذف پیشنهادات تخفیف',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'view-orders',
                'label' => 'مشاهده لیست سفارشات',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'pay-orders',
                'label' => 'پرداخت سفارشات پرداخت نشده',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],

            [
                'name' => 'view-payments',
                'label' => 'مشاهده پرداخت‌ها',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],
        ]);
    }
}
