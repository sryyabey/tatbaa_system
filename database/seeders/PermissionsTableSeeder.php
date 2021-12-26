<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'basic_c_r_m_access',
            ],
            [
                'id'    => 18,
                'title' => 'crm_status_create',
            ],
            [
                'id'    => 19,
                'title' => 'crm_status_edit',
            ],
            [
                'id'    => 20,
                'title' => 'crm_status_show',
            ],
            [
                'id'    => 21,
                'title' => 'crm_status_delete',
            ],
            [
                'id'    => 22,
                'title' => 'crm_status_access',
            ],
            [
                'id'    => 23,
                'title' => 'crm_customer_create',
            ],
            [
                'id'    => 24,
                'title' => 'crm_customer_edit',
            ],
            [
                'id'    => 25,
                'title' => 'crm_customer_show',
            ],
            [
                'id'    => 26,
                'title' => 'crm_customer_delete',
            ],
            [
                'id'    => 27,
                'title' => 'crm_customer_access',
            ],
            [
                'id'    => 28,
                'title' => 'crm_note_create',
            ],
            [
                'id'    => 29,
                'title' => 'crm_note_edit',
            ],
            [
                'id'    => 30,
                'title' => 'crm_note_show',
            ],
            [
                'id'    => 31,
                'title' => 'crm_note_delete',
            ],
            [
                'id'    => 32,
                'title' => 'crm_note_access',
            ],
            [
                'id'    => 33,
                'title' => 'crm_document_create',
            ],
            [
                'id'    => 34,
                'title' => 'crm_document_edit',
            ],
            [
                'id'    => 35,
                'title' => 'crm_document_show',
            ],
            [
                'id'    => 36,
                'title' => 'crm_document_delete',
            ],
            [
                'id'    => 37,
                'title' => 'crm_document_access',
            ],
            [
                'id'    => 38,
                'title' => 'transaction_create',
            ],
            [
                'id'    => 39,
                'title' => 'transaction_edit',
            ],
            [
                'id'    => 40,
                'title' => 'transaction_show',
            ],
            [
                'id'    => 41,
                'title' => 'transaction_delete',
            ],
            [
                'id'    => 42,
                'title' => 'transaction_access',
            ],
            [
                'id'    => 43,
                'title' => 'tracking_create',
            ],
            [
                'id'    => 44,
                'title' => 'tracking_edit',
            ],
            [
                'id'    => 45,
                'title' => 'tracking_show',
            ],
            [
                'id'    => 46,
                'title' => 'tracking_delete',
            ],
            [
                'id'    => 47,
                'title' => 'tracking_access',
            ],
            [
                'id'    => 48,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 49,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 50,
                'title' => 'site_access',
            ],
            [
                'id'    => 51,
                'title' => 'slider_create',
            ],
            [
                'id'    => 52,
                'title' => 'slider_edit',
            ],
            [
                'id'    => 53,
                'title' => 'slider_show',
            ],
            [
                'id'    => 54,
                'title' => 'slider_delete',
            ],
            [
                'id'    => 55,
                'title' => 'slider_access',
            ],
            [
                'id'    => 56,
                'title' => 'about_us_create',
            ],
            [
                'id'    => 57,
                'title' => 'about_us_edit',
            ],
            [
                'id'    => 58,
                'title' => 'about_us_show',
            ],
            [
                'id'    => 59,
                'title' => 'about_us_delete',
            ],
            [
                'id'    => 60,
                'title' => 'about_us_access',
            ],
            [
                'id'    => 61,
                'title' => 'healty_create',
            ],
            [
                'id'    => 62,
                'title' => 'healty_edit',
            ],
            [
                'id'    => 63,
                'title' => 'healty_show',
            ],
            [
                'id'    => 64,
                'title' => 'healty_delete',
            ],
            [
                'id'    => 65,
                'title' => 'healty_access',
            ],
            [
                'id'    => 66,
                'title' => 'staff_create',
            ],
            [
                'id'    => 67,
                'title' => 'staff_edit',
            ],
            [
                'id'    => 68,
                'title' => 'staff_show',
            ],
            [
                'id'    => 69,
                'title' => 'staff_delete',
            ],
            [
                'id'    => 70,
                'title' => 'staff_access',
            ],
            [
                'id'    => 71,
                'title' => 'galery_create',
            ],
            [
                'id'    => 72,
                'title' => 'galery_edit',
            ],
            [
                'id'    => 73,
                'title' => 'galery_show',
            ],
            [
                'id'    => 74,
                'title' => 'galery_delete',
            ],
            [
                'id'    => 75,
                'title' => 'galery_access',
            ],
            [
                'id'    => 76,
                'title' => 'faq_create',
            ],
            [
                'id'    => 77,
                'title' => 'faq_edit',
            ],
            [
                'id'    => 78,
                'title' => 'faq_show',
            ],
            [
                'id'    => 79,
                'title' => 'faq_delete',
            ],
            [
                'id'    => 80,
                'title' => 'faq_access',
            ],
            [
                'id'    => 81,
                'title' => 'contact_create',
            ],
            [
                'id'    => 82,
                'title' => 'contact_edit',
            ],
            [
                'id'    => 83,
                'title' => 'contact_show',
            ],
            [
                'id'    => 84,
                'title' => 'contact_delete',
            ],
            [
                'id'    => 85,
                'title' => 'contact_access',
            ],
            [
                'id'    => 86,
                'title' => 'comment_create',
            ],
            [
                'id'    => 87,
                'title' => 'comment_edit',
            ],
            [
                'id'    => 88,
                'title' => 'comment_show',
            ],
            [
                'id'    => 89,
                'title' => 'comment_delete',
            ],
            [
                'id'    => 90,
                'title' => 'comment_access',
            ],
            [
                'id'    => 91,
                'title' => 'randevu_create',
            ],
            [
                'id'    => 92,
                'title' => 'randevu_edit',
            ],
            [
                'id'    => 93,
                'title' => 'randevu_show',
            ],
            [
                'id'    => 94,
                'title' => 'randevu_delete',
            ],
            [
                'id'    => 95,
                'title' => 'randevu_access',
            ],
            [
                'id'    => 96,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
