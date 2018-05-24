<?php

namespace App\QueryCollections\Subday;

use App\Role;

class SubdayQuery {

    protected $type;

    public function setType($role)
    {
        $this->type = $role;
    }

	public function SubdayCollection()
	{
        $projectType = $this->type;

        $lookupArray = [
            'school_administrator' => 'SchoolAdminRoleType',
            'school_principal' => 'PrincipalRoleType',
            'school_teacher' => 'TeacherRoleType',
            'substitute_teacher' => 'SubstituteRoleType'
        ];

        if( ! array_key_exists($this->type, $lookupArray)) {
            throw new \RuntimeException('Incorrect project type');
        }
        //dd($lookupArray[$projectType]);
        $className = "App\\QueryCollections\\Subday\\" . $lookupArray[$projectType];
        //dd($className);
        return ( new $className )->SubdayCollection();
	}

}