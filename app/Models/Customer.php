<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    // Chỉ định bảng mà model sẽ tương tác
    protected $table = 'users';

    // Khóa chính của bảng
    protected $primaryKey = 'user_id';

    // Các thuộc tính có thể được gán một cách hàng loạt
    protected $fillable = [
        'role_id',
        'username',
        'password',
        'full_name',
        'gender',
        'address',
        'phone_number',
    ];

    // Ẩn thuộc tính password khi trả về dữ liệu
    protected $hidden = [
        'password',
    ];

    // Nếu bạn muốn sử dụng timestamp thì giữ nguyên, nếu không thì bỏ dòng này
    public $timestamps = true;
}
