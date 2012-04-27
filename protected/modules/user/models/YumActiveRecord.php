<?php
/**
 * Base class for all active records
 * @author tomasz.suchanek
 * @since 0.6
 * @package Yum.core
 *
 */
abstract class YumActiveRecord extends CActiveRecord {
	protected $_tableName;

	/**
	 * Adds the CAdvancedArBehavior and, if enabled, the LoggableBehavior to
	 * every YUM Active Record model
	 * @return array
	 */
	public function behaviors() {
		$behaviors = array( 'CAdvancedArBehavior' );
		if(Yum::module()->enableAuditTrail)
			$behaviors = array_merge($behaviors, array( 
						'LoggableBehavior' => 'application.modules.auditTrail.behaviors.LoggableBehavior')
					);

		return $behaviors;
	}	

	/**
	 * @return CActiveRecordMetaData the meta for this AR class.
	 */	
	public function getMetaData( )
	{
		$md = parent::getMetaData( );
		if($this->getScenario()==='search')
		{
			$md->attributeDefaults  = array ();
		}

		return $md;
	}

}
?>
