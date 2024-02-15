<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected   $fillable = [
        'name',
        'role_id',
        'status',
        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    public static function permission_generator($user_id)
    {
        $permissions = [
            ['name' => 'clinics.index', 'url' => 'clinics.index', 'user_id' => $user_id],
            ['name' => 'clinics.edit', 'url' => 'clinics.edit', 'user_id' => $user_id],
            // doctor permission end
            ['name' => 'doctors.index', 'url' => 'doctors.index', 'user_id' => $user_id],
            ['name' => 'doctors.create', 'url' => 'doctors.store', 'user_id' => $user_id],
            ['name' => 'doctors.edit', 'url' => 'doctors.edit', 'user_id' => $user_id],
            ['name' => 'doctors.update', 'url' => 'doctors.update', 'user_id' => $user_id],
            ['name' => 'doctors.destroy', 'url' => 'doctors.destroy', 'user_id' => $user_id],
            ['name' => 'doctors.status', 'url' => 'doctors.status', 'user_id' => $user_id],
            // doctor permission end
            // medical-departments start
            ['name' => 'medical-departments.index', 'url' => 'medical-departments.index', 'user_id' => $user_id],
            ['name' => 'medical-departments.store', 'url' => 'medical-departments.store', 'user_id' => $user_id],
            ['name' => 'medical-departments.update', 'url' => 'medical-departments.update', 'user_id' => $user_id],
            ['name' => 'medical-departments.destroy', 'url' => 'medical-departments.destroy', 'user_id' => $user_id],
            ['name' => 'medical-departments.status', 'url' => 'medical-departments.status', 'user_id' => $user_id],
            ['name' => 'medical-departments.edit', 'url' => 'medical-departments.edit', 'user_id' => $user_id],
            // medical-departments start

            // clinic images start
            ['name' => 'clinic-images.index', 'url' => 'clinic-images.index', 'user_id' => $user_id],
            ['name' => 'clinic-images.store', 'url' => 'clinic-images.store', 'user_id' => $user_id],
            ['name' => 'clinic-images.update', 'url' => 'clinic-images.update', 'user_id' => $user_id],
            ['name' => 'clinic-images.destroy', 'url' => 'clinic-images.destroy', 'user_id' => $user_id],
            ['name' => 'clinic-images.status', 'url' => 'clinic-images.status', 'user_id' => $user_id],
            ['name' => 'clinic-images.edit', 'url' => 'clinic-images.edit', 'user_id' => $user_id],
            // clinic image end
            // clinic rating start
            ['name' => 'clinic-ratings.index', 'url' => 'clinic-ratings.index', 'user_id' => $user_id],
            ['name' => 'clinic-ratings.store', 'url' => 'clinic-ratings.store', 'user_id' => $user_id],
            ['name' => 'clinic-ratings.update', 'url' => 'clinic-ratings.update', 'user_id' => $user_id],
            ['name' => 'clinic-ratings.destroy', 'url' => 'clinic-ratings.destroy', 'user_id' => $user_id],
            ['name' => 'clinic-ratings.edit', 'url' => 'clinic-ratings.edit', 'user_id' => $user_id],
            ['name' => 'clinic-ratings.status', 'url' => 'clinic-ratings.status', 'user_id' => $user_id],
            // clinic rating end

            // department-type-images start
            ['name' => 'department-type-images.index', 'url' => 'department-type-images.index', 'user_id' => $user_id],
            ['name' => 'department-type-images.store', 'url' => 'department-type-images.store', 'user_id' => $user_id],
            ['name' => 'department-type-images.update', 'url' => 'department-type-images.update', 'user_id' => $user_id],
            ['name' => 'department-type-images.destroy', 'url' => 'department-type-images.destroy', 'user_id' => $user_id],
            ['name' => 'department-type-images.edit', 'url' => 'department-type-images.edit', 'user_id' => $user_id],
            ['name' => 'department-type-images.status', 'url' => 'department-type-images.status', 'user_id' => $user_id],
            // department-type-images end

            // department-images start
            ['name' => 'department-images.index', 'url' => 'department-images.index', 'user_id' => $user_id],
            ['name' => 'department-images.store', 'url' => 'department-images.store', 'user_id' => $user_id],
            ['name' => 'department-images.update', 'url' => 'department-images.update', 'user_id' => $user_id],
            ['name' => 'department-images.destroy', 'url' => 'department-images.destroy', 'user_id' => $user_id],
            ['name' => 'department-images.edit', 'url' => 'department-images.edit', 'user_id' => $user_id],
            ['name' => 'department-images.status', 'url' => 'department-images.status', 'user_id' => $user_id],
            // department-images end

            // medical-department-rating start
            ['name' => 'medical-department-rating.index', 'url' => 'medical-department-rating.index', 'user_id' => $user_id],
            ['name' => 'medical-department-rating.store', 'url' => 'medical-department-rating.store', 'user_id' => $user_id],
            ['name' => 'medical-department-rating.update', 'url' => 'medical-department-rating.update', 'user_id' => $user_id],
            ['name' => 'medical-department-rating.destroy', 'url' => 'medical-department-rating.destroy', 'user_id' => $user_id],
            ['name' => 'medical-department-rating.edit', 'url' => 'medical-department-rating.edit', 'user_id' => $user_id],
            ['name' => 'medical-department-rating.status', 'url' => 'medical-department-rating.status', 'user_id' => $user_id],
            // medical-department-rating end

            // doctor-slot start
            ['name' => 'doctor-slot.index', 'url' => 'doctor-slot.index', 'user_id' => $user_id],
            ['name' => 'doctor-slot.store', 'url' => 'doctor-slot.store', 'user_id' => $user_id],
            ['name' => 'doctor-slot.update', 'url' => 'doctor-slot.update', 'user_id' => $user_id],
            ['name' => 'doctor-slot.destroy', 'url' => 'doctor-slot.destroy', 'user_id' => $user_id],
            ['name' => 'doctor-slot.edit', 'url' => 'doctor-slot.edit', 'user_id' => $user_id],
            ['name' => 'doctor-slot.status', 'url' => 'doctor-slot.status', 'user_id' => $user_id],
            // medical-department-rating end

            // booking start
            ['name' => 'booking.index', 'url' => 'booking.index', 'user_id' => $user_id],
            ['name' => 'booking.store', 'url' => 'booking.store', 'user_id' => $user_id],
            ['name' => 'booking.update', 'url' => 'booking.update', 'user_id' => $user_id],
            ['name' => 'booking.destroy', 'url' => 'booking.destroy', 'user_id' => $user_id],
            ['name' => 'booking.edit', 'url' => 'booking.edit', 'user_id' => $user_id],
            ['name' => 'booking.status', 'url' => 'booking.status', 'user_id' => $user_id],
            // medical-department-rating end

            // services start
            ['name' => 'services.index', 'url' => 'services.index', 'user_id' => $user_id],
            ['name' => 'services.store', 'url' => 'services.store', 'user_id' => $user_id],
            ['name' => 'services.update', 'url' => 'services.update', 'user_id' => $user_id],
            ['name' => 'services.destroy', 'url' => 'services.destroy', 'user_id' => $user_id],
            ['name' => 'services.edit', 'url' => 'services.edit', 'user_id' => $user_id],
            ['name' => 'services.status', 'url' => 'services.status', 'user_id' => $user_id],
            // medical-department-rating end

            // some saperate permission start
            ['name' => 'clinics.service.index', 'url' => 'clinics.service.index', 'user_id' => $user_id],
            ['name' => 'clinics.doctors.index', 'url' => 'clinics.doctors.index', 'user_id' => $user_id],
            ['name' => 'clinics.images.index', 'url' => 'clinics.images.index', 'user_id' => $user_id],
            ['name' => 'clinics.rating.index', 'url' => 'clinics.rating.index', 'user_id' => $user_id],
            ['name' => 'clinics.departments.index', 'url' => 'clinics.departments.index', 'user_id' => $user_id],
            ['name' => 'department.images.index', 'url' => 'department.images.index', 'user_id' => $user_id],
            ['name' => 'doctor.slot.index', 'url' => 'doctor.slot.index', 'user_id' => $user_id],
            ['name' => 'doctor.slot', 'url' => 'doctor.slot', 'user_id' => $user_id],
            ['name' => 'department.rating.index', 'url' => 'department.rating.index', 'user_id' => $user_id],


            // some saperate permission end


        ];

        foreach ($permissions as $permission) {
            if (!isset(auth()->user()->id)) {
                $permission['created_by'] = 1;
            } else {
                $permission['created_by'] = auth()->user()->id;
            }
            Permission::create($permission);
        }
    }
}
