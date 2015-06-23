<?php
namespace Application\Role;
class Role {
	protected $role;

	public function __contruct() {

	}

	public static function allow($role) {
		if(ROLE != $role) {
			throw new \Application\MeException('Me001');
		}
	}
}
?>