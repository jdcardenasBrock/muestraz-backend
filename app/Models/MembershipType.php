<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MembershipType extends Model
{
        protected $table = 'membershiptypes';

        protected $fillable = [

                'id',
                'type',
                'value',
                'quantitysamples',
                'quantitymonths',
                'memberType',
                'image_path',
                'target',
        ];

        public function memberships()
        {
                return $this->hasMany(\App\Models\Membership::class, 'membershiptype_id', 'id');
        }
}
