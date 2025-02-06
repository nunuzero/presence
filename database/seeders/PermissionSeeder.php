<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            ['name' => 'view_role', 'guard_name' => 'web'],
            ['name' => 'view_any_role', 'guard_name' => 'web'],
            ['name' => 'create_role', 'guard_name' => 'web'],
            ['name' => 'update_role', 'guard_name' => 'web'],
            ['name' => 'delete_role', 'guard_name' => 'web'],
            ['name' => 'delete_any_role', 'guard_name' => 'web'],
            ['name' => 'view_holiday', 'guard_name' => 'web'],
            ['name' => 'view_any_holiday', 'guard_name' => 'web'],
            ['name' => 'create_holiday', 'guard_name' => 'web'],
            ['name' => 'update_holiday', 'guard_name' => 'web'],
            ['name' => 'restore_holiday', 'guard_name' => 'web'],
            ['name' => 'restore_any_holiday', 'guard_name' => 'web'],
            ['name' => 'replicate_holiday', 'guard_name' => 'web'],
            ['name' => 'reorder_holiday', 'guard_name' => 'web'],
            ['name' => 'delete_holiday', 'guard_name' => 'web'],
            ['name' => 'delete_any_holiday', 'guard_name' => 'web'],
            ['name' => 'force_delete_holiday', 'guard_name' => 'web'],
            ['name' => 'force_delete_any_holiday', 'guard_name' => 'web'],
            ['name' => 'view_position', 'guard_name' => 'web'],
            ['name' => 'view_any_position', 'guard_name' => 'web'],
            ['name' => 'create_position', 'guard_name' => 'web'],
            ['name' => 'update_position', 'guard_name' => 'web'],
            ['name' => 'restore_position', 'guard_name' => 'web'],
            ['name' => 'restore_any_position', 'guard_name' => 'web'],
            ['name' => 'replicate_position', 'guard_name' => 'web'],
            ['name' => 'reorder_position', 'guard_name' => 'web'],
            ['name' => 'delete_position', 'guard_name' => 'web'],
            ['name' => 'delete_any_position', 'guard_name' => 'web'],
            ['name' => 'force_delete_position', 'guard_name' => 'web'],
            ['name' => 'force_delete_any_position', 'guard_name' => 'web'],
            ['name' => 'view_presence', 'guard_name' => 'web'],
            ['name' => 'view_any_presence', 'guard_name' => 'web'],
            ['name' => 'create_presence', 'guard_name' => 'web'],
            ['name' => 'update_presence', 'guard_name' => 'web'],
            ['name' => 'restore_presence', 'guard_name' => 'web'],
            ['name' => 'restore_any_presence', 'guard_name' => 'web'],
            ['name' => 'replicate_presence', 'guard_name' => 'web'],
            ['name' => 'reorder_presence', 'guard_name' => 'web'],
            ['name' => 'delete_presence', 'guard_name' => 'web'],
            ['name' => 'delete_any_presence', 'guard_name' => 'web'],
            ['name' => 'force_delete_presence', 'guard_name' => 'web'],
            ['name' => 'force_delete_any_presence', 'guard_name' => 'web'],
            ['name' => 'view_presence::type', 'guard_name' => 'web'],
            ['name' => 'view_any_presence::type', 'guard_name' => 'web'],
            ['name' => 'create_presence::type', 'guard_name' => 'web'],
            ['name' => 'update_presence::type', 'guard_name' => 'web'],
            ['name' => 'restore_presence::type', 'guard_name' => 'web'],
            ['name' => 'restore_any_presence::type', 'guard_name' => 'web'],
            ['name' => 'replicate_presence::type', 'guard_name' => 'web'],
            ['name' => 'reorder_presence::type', 'guard_name' => 'web'],
            ['name' => 'delete_presence::type', 'guard_name' => 'web'],
            ['name' => 'delete_any_presence::type', 'guard_name' => 'web'],
            ['name' => 'force_delete_presence::type', 'guard_name' => 'web'],
            ['name' => 'force_delete_any_presence::type', 'guard_name' => 'web'],
            ['name' => 'view_staff', 'guard_name' => 'web'],
            ['name' => 'view_any_staff', 'guard_name' => 'web'],
            ['name' => 'create_staff', 'guard_name' => 'web'],
            ['name' => 'update_staff', 'guard_name' => 'web'],
            ['name' => 'restore_staff', 'guard_name' => 'web'],
            ['name' => 'restore_any_staff', 'guard_name' => 'web'],
            ['name' => 'replicate_staff', 'guard_name' => 'web'],
            ['name' => 'reorder_staff', 'guard_name' => 'web'],
            ['name' => 'delete_staff', 'guard_name' => 'web'],
            ['name' => 'delete_any_staff', 'guard_name' => 'web'],
            ['name' => 'force_delete_staff', 'guard_name' => 'web'],
            ['name' => 'force_delete_any_staff', 'guard_name' => 'web'],
            ['name' => 'view_work::time', 'guard_name' => 'web'],
            ['name' => 'view_any_work::time', 'guard_name' => 'web'],
            ['name' => 'create_work::time', 'guard_name' => 'web'],
            ['name' => 'update_work::time', 'guard_name' => 'web'],
            ['name' => 'restore_work::time', 'guard_name' => 'web'],
            ['name' => 'restore_any_work::time', 'guard_name' => 'web'],
            ['name' => 'replicate_work::time', 'guard_name' => 'web'],
            ['name' => 'reorder_work::time', 'guard_name' => 'web'],
            ['name' => 'delete_work::time', 'guard_name' => 'web'],
            ['name' => 'delete_any_work::time', 'guard_name' => 'web'],
            ['name' => 'force_delete_work::time', 'guard_name' => 'web'],
            ['name' => 'force_delete_any_work::time', 'guard_name' => 'web'],
            ['name' => 'page_Localization', 'guard_name' => 'web'],
            ['name' => 'page_EditProfilePage', 'guard_name' => 'web'],
            ['name' => 'widget_QrScan', 'guard_name' => 'web'],
            ['name' => 'view_leave', 'guard_name' => 'web'],
            ['name' => 'view_any_leave', 'guard_name' => 'web'],
            ['name' => 'create_leave', 'guard_name' => 'web'],
            ['name' => 'update_leave', 'guard_name' => 'web'],
            ['name' => 'restore_leave', 'guard_name' => 'web'],
            ['name' => 'restore_any_leave', 'guard_name' => 'web'],
            ['name' => 'replicate_leave', 'guard_name' => 'web'],
            ['name' => 'reorder_leave', 'guard_name' => 'web'],
            ['name' => 'delete_leave', 'guard_name' => 'web'],
            ['name' => 'delete_any_leave', 'guard_name' => 'web'],
            ['name' => 'force_delete_leave', 'guard_name' => 'web'],
            ['name' => 'force_delete_any_leave', 'guard_name' => 'web'],
            ['name' => 'view_log::book', 'guard_name' => 'web'],
            ['name' => 'view_any_log::book', 'guard_name' => 'web'],
            ['name' => 'create_log::book', 'guard_name' => 'web'],
            ['name' => 'update_log::book', 'guard_name' => 'web'],
            ['name' => 'restore_log::book', 'guard_name' => 'web'],
            ['name' => 'restore_any_log::book', 'guard_name' => 'web'],
            ['name' => 'replicate_log::book', 'guard_name' => 'web'],
            ['name' => 'reorder_log::book', 'guard_name' => 'web'],
            ['name' => 'delete_log::book', 'guard_name' => 'web'],
            ['name' => 'delete_any_log::book', 'guard_name' => 'web'],
            ['name' => 'force_delete_log::book', 'guard_name' => 'web'],
            ['name' => 'force_delete_any_log::book', 'guard_name' => 'web'],
            ['name' => 'view_request', 'guard_name' => 'web'],
            ['name' => 'view_any_request', 'guard_name' => 'web'],
            ['name' => 'create_request', 'guard_name' => 'web'],
            ['name' => 'update_request', 'guard_name' => 'web'],
            ['name' => 'view_wfh::schedule', 'guard_name' => 'web'],
            ['name' => 'view_any_wfh::schedule', 'guard_name' => 'web'],
            ['name' => 'create_wfh::schedule', 'guard_name' => 'web'],
            ['name' => 'update_wfh::schedule', 'guard_name' => 'web'],
            ['name' => 'restore_wfh::schedule', 'guard_name' => 'web'],
            ['name' => 'restore_any_wfh::schedule', 'guard_name' => 'web'],
            ['name' => 'replicate_wfh::schedule', 'guard_name' => 'web'],
            ['name' => 'reorder_wfh::schedule', 'guard_name' => 'web'],
            ['name' => 'delete_wfh::schedule', 'guard_name' => 'web'],
            ['name' => 'delete_any_wfh::schedule', 'guard_name' => 'web'],
            ['name' => 'force_delete_wfh::schedule', 'guard_name' => 'web'],
            ['name' => 'force_delete_any_wfh::schedule', 'guard_name' => 'web'],
            ['name' => 'page_Image', 'guard_name' => 'web'],
            ['name' => 'widget_StatsOverview', 'guard_name' => 'web'],
            ['name' => 'widget_StatsOverview2', 'guard_name' => 'web'],
            ['name' => 'delete_any_request', 'guard_name' => 'web'],
            ['name' => 'delete_request', 'guard_name' => 'web'],
            ['name' => 'force_delete_request', 'guard_name' => 'web'],
            ['name' => 'force_delete_any_request', 'guard_name' => 'web'],
        ];

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }
    }
}
