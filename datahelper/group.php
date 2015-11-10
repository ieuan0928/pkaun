<?php

class GroupHelper {
	
	private function GetSelectSQL() {
		return "SELECT \n"
			. " baseentity.entityId AS entityId,\n"
 			. " entity_group.groupId AS groupId,\n"
			. " baseentity.entityName AS entityName,\n"
			. " baseentity.displayName AS displayName,\n"
			. " baseentity.description AS description,\n"
			. " entity_group.parentGroupId AS parentGroupId\n"
			. "FROM entity_group\n"
			. "	INNER JOIN baseentity ON baseentity.entityId = entity_group.baseEntityId\n"
			. "WHERE baseentity.isActive = 1\n"
			. "ORDER BY entity_group.parentGroupId, baseentity.displayName\n"
			. "\n"
			. "";
	}
}

?>