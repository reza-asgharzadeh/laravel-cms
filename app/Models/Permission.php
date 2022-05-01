<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function getPermissionName()
    {
        $message = match ($this->name) {
            'view-dashboard' => 'مشاهده داشبورد',
            'view-site' => 'مشاهده سایت',
            'edit-profile' => 'ویرایش پروفایل',
            'view-activities' => 'مشاهده فعالیت ها و نشست ها',
            'view-wallet' => 'مشاهده کیف پول',
            'view-users' => 'مشاهده کاربران',
            'create-user' => 'ایجاد کاربر',
            'edit-users' => 'ویرایش کاربران',
            'update-users' => 'بروزرسانی کاربران',
            'delete-users' => 'حذف کاربران',
            'view-tickets' => 'مشاهده تیکت ها',
            'create-ticket' => 'ایجاد تیکت',
            'read-tickets' => 'خواندن تیکت ها',
            'reply-tickets' => 'پاسخ به تیکت ها',
            'view-questions' => 'مشاهده پرسش ها',
            'create-question' => 'ایجاد پرسش',
            'read-questions' => 'خواندن پرسش ها',
            'answer-questions' => 'پاسخ به پرسش ها',
            'view-roles' => 'مشاهده نقش ها',
            'create-role' => 'ایجاد نقش',
            'edit-roles' => 'ویرایش نقش ها',
            'update-roles' => 'بروزرسانی نقش ها',
            'delete-roles' => 'حذفش نقش ها',
            'view-permissions' => 'مشاهده دسترسی ها',
            'create-permission' => 'ایجاد دسترسی',
            'edit-permissions' => 'ویرایش دسترسی',
            'update-permissions' => 'بروزرسانی دسترسی',
            'delete-permissions' => 'حذف دسترسی',
            'view-permission-role' => 'مشاهده دسترسی نقش ها',
            'set-permission-role' => 'تنظیم دسترسی به نقش',
            'view-posts' => 'مشاهده مقالات',
            'create-post' => 'ایجاد مقاله',
            'edit-posts' => 'ویرایش مقاله',
            'update-posts' => 'بروزرسانی مقاله',
            'delete-posts' => 'حذف مقالات',
            'view-courses' => 'مشاهده دوره ها',
            'create-course' => 'ایجاد دوره',
            'edit-courses' => 'ویرایش دوره ها',
            'update-courses' => 'بروزرسانی دوره ها',
            'delete-courses' => 'حذف دوره ها',
            'view-episodes' => 'مشاهده جلسات دوره',
            'create-episode' => 'ایجاد جلسه برای دوره',
            'edit-episodes' => 'ویرایش جلسات',
            'update-episodes' => 'بروزرسانی جلسات',
            'delete-episodes' => 'حذف جلسات',
            'view-categories' => 'مشاهده دسته بندی ها',
            'create-category' => 'ایجاد دسته بندی',
            'edit-categories' => 'ویرایش دسته بندی ها',
            'update-categories' => 'برزورسانی دسته بندی ها',
            'delete-categories' => 'حذف دسته بندی ها',
            'view-tags' => 'مشاهده برچسب ها',
            'create-tag' => 'ایجاد برچسب',
            'edit-tags' => 'ویرایش برچسب ها',
            'update-tags' => 'بروزرسانی برچسب ها',
            'delete-tags' => 'حذف برچسب ها',
            'view-comments' => 'مشاهده نظرات',
            'create-comment' => 'ایجاد نظر',
            'edit-comments' => 'ویرایش نظرات',
            'update-comments' => 'بروزرسانی نظرات',
            'delete-comments' => 'حذف نظرات',
            'is-approved-comments' => 'تغییر وضعیت نظر',
            'reply-comments' => 'پاسخ به نظرات',
            'save-comments' => 'بروزرسانی پاسخ به نظرات',
            'view-coupons' => 'مشاهده کدهای تخفیف',
            'create-coupon' => 'ایجاد کد تخفیف',
            'edit-coupons' => 'ویرایش کدهای تخفیف',
            'update-coupons' => 'بروزرسانی کدهای تخفیف',
            'delete-coupons' => 'حذف کدهای تخفیف',
            'is-approved-coupons' => 'تغییر وضعیت کدهای تخفیف',
            'view-offers' => 'مشاهده پیشنهادات تخفیف',
            'create-offer' => 'ایجاد پیشنهاد تخفیف',
            'edit-offers' => 'ویرایش پیشنهادات تخفیف',
            'update-offers' => 'بروزرسانی پیشنهادات تخفیف',
            'delete-offers' => 'حذف پیشنهادات تخفیف',
            'is-approved-offers' => 'تغییر وضعیت پیشنهادات تخفیف',
            'view-orders' => 'مشاهده لیست سفارشات',
            'pay-orders' => 'پرداخت سفارشات پرداخت نشده',
            'view-payments' => 'مشاهده پرداخت ها',
        };
        return $message;
    }
}
