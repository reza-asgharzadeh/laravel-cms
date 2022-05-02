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
            'display-dashboard' => 'نمایش داشبورد',
            'display-site' => 'نمایش سایت',
            'display-edit-profile' => 'نمایش ویرایش پروفایل',
            'display-activities' => 'نمایش فعالیت‌ها و نشست‌ها',
            'display-wallet' => 'نمایش کیف پول',
            'display-users' => 'نمایش کاربران',
            'display-tickets' => 'نمایش تیکت‌ها',
            'display-questions-answers' => 'نمایش پرسش‌ها و پاسخ‌ها',
            'display-roles-permissions' => 'نمایش نقش‌ها و دسترسی‌ها',
            'display-posts' => 'نمایش مقالات',
            'display-courses' => 'نمایش دوره‌ها',
            'display-episodes' => 'نمایش جلسات دوره',
            'display-categories' => 'نمایش دسته بندی‌ها',
            'display-tags' => 'نمایش برچسب‌ها',
            'display-comments' => 'نمایش نظرات',
            'display-coupons' => 'نمایش کدهای تخفیف',
            'display-offers' => 'نمایش پیشنهادات تخفیف',
            'display-orders' => 'نمایش سفارشات',
            'display-payments' => 'نمایش پرداخت‌ها',
            'view-dashboard' => 'مشاهده داشبورد',
            'view-site' => 'مشاهده سایت',
            'edit-profile' => 'ویرایش پروفایل',
            'update-profile' => 'بروزرسانی پروفایل',
            'view-activities' => 'مشاهده فعالیت‌ها و نشست‌ها',
            'delete-activities' => 'حذف نشست‌ها',
            'view-wallet' => 'مشاهده کیف پول',
            'view-users' => 'مشاهده کاربران',
            'create-user' => 'ایجاد کاربر',
            'store-user' => 'ذخیره کاربر',
            'edit-users' => 'ویرایش کاربران',
            'update-users' => 'بروزرسانی کاربران',
            'delete-users' => 'حذف کاربران',
            'view-tickets' => 'مشاهده تیکت‌ها',
            'create-ticket' => 'ایجاد تیکت',
            'store-ticket' => 'ذخیره تیکت',
            'read-tickets' => 'خواندن تیکت‌ها',
            'reply-tickets' => 'پاسخ به تیکت‌ها',
            'view-questions' => 'مشاهده پرسش‌ها',
            'create-question' => 'ایجاد پرسش',
            'store-question' => 'ذخیره پرسش',
            'read-questions' => 'خواندن پرسش‌ها',
            'answer-questions' => 'پاسخ به پرسش‌ها',
            'view-roles' => 'مشاهده نقش‌ها',
            'store-role' => 'ذخیره نقش',
            'edit-roles' => 'ویرایش نقش‌ها',
            'update-roles' => 'بروزرسانی نقش‌ها',
            'delete-roles' => 'حذفش نقش‌ها',
            'view-permission-role' => 'مشاهده دسترسی نقش‌ها',
            'set-permission-role' => 'تنظیم دسترسی به نقش',
            'view-permissions' => 'مشاهده دسترسی‌ها',
            'store-permission' => 'ذخیره دسترسی',
            'edit-permissions' => 'ویرایش دسترسی',
            'update-permissions' => 'بروزرسانی دسترسی',
            'delete-permissions' => 'حذف دسترسی',
            'view-posts' => 'مشاهده مقالات',
            'create-post' => 'ایجاد مقاله',
            'store-post' => 'ذخیره مقاله',
            'edit-posts' => 'ویرایش مقاله',
            'update-posts' => 'بروزرسانی مقاله',
            'delete-posts' => 'حذف مقالات',
            'view-courses' => 'مشاهده دوره‌ها',
            'create-course' => 'ایجاد دوره',
            'store-course' => 'ذخیره دوره',
            'edit-courses' => 'ویرایش دوره‌ها',
            'update-courses' => 'بروزرسانی دوره‌ها',
            'delete-courses' => 'حذف دوره‌ها',
            'view-episodes' => 'مشاهده جلسات دوره',
            'create-episode' => 'ایجاد جلسه برای دوره',
            'store-episode' => 'ذخیره جلسه برای دوره',
            'edit-episodes' => 'ویرایش جلسات',
            'update-episodes' => 'بروزرسانی جلسات',
            'delete-episodes' => 'حذف جلسات',
            'view-categories' => 'مشاهده دسته بندی‌ها',
            'store-category' => 'ذخیره دسته بندی',
            'edit-categories' => 'ویرایش دسته بندی‌ها',
            'update-categories' => 'برزورسانی دسته بندی‌ها',
            'delete-categories' => 'حذف دسته بندی‌ها',
            'view-tags' => 'مشاهده برچسب‌ها',
            'store-tag' => 'ذخیره برچسب',
            'edit-tags' => 'ویرایش برچسب‌ها',
            'update-tags' => 'بروزرسانی برچسب‌ها',
            'delete-tags' => 'حذف برچسب‌ها',
            'view-comments' => 'مشاهده نظرات',
            'save-comment' => 'ذخیره نظر',
            'edit-comments' => 'ویرایش نظرات',
            'reply-comments' => 'پاسخ به نظرات',
            'update-comments' => 'بروزرسانی نظرات',
            'is-approved-comments' => 'تغییر وضعیت نظر',
            'delete-comments' => 'حذف نظرات',
            'view-coupons' => 'مشاهده کدهای تخفیف',
            'create-coupon' => 'ایجاد کد تخفیف',
            'store-coupon' => 'ذخیره کد تخفیف',
            'edit-coupons' => 'ویرایش کدهای تخفیف',
            'is-approved-coupons' => 'تغییر وضعیت کدهای تخفیف',
            'update-coupons' => 'بروزرسانی کدهای تخفیف',
            'delete-coupons' => 'حذف کدهای تخفیف',
            'view-offers' => 'مشاهده پیشنهادات تخفیف',
            'create-offer' => 'ایجاد پیشنهاد تخفیف',
            'store-offer' => 'ذخیره پیشنهاد تخفیف',
            'edit-offers' => 'ویرایش پیشنهادات تخفیف',
            'is-approved-offers' => 'تغییر وضعیت پیشنهادات تخفیف',
            'update-offers' => 'بروزرسانی پیشنهادات تخفیف',
            'delete-offers' => 'حذف پیشنهادات تخفیف',
            'view-orders' => 'مشاهده لیست سفارشات',
            'pay-orders' => 'پرداخت سفارشات پرداخت نشده',
            'view-payments' => 'مشاهده پرداخت‌ها',
        };
        return $message;
    }
}
