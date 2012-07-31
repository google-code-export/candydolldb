<?php

class Date
{
	private $ID;
	private $Set;
	private $DateKind = DATE_KIND_UNKNOWN;
	private $TimeStamp = -1;
	
	/**
	 * @param int $date_id
	 * @param int $date_kind
	 * @param int $date_timestamp
	 * @param int $set_id
	 * @param string $set_prefix
	 * @param string $set_name
	 * @param int $set_containswhat
	 * @param int $model_id
	 * @param string $model_firstname
	 * @param string $model_lastname
	 */
	public function __construct(
		$date_id = null, $date_kind = DATE_KIND_UNKNOWN, $date_timestamp = -1,
		$set_id = null, $set_prefix = null, $set_name = null, $set_containswhat = SET_CONTENT_NONE,
		$model_id = null, $model_firstname = null, $model_lastname = null)
	{
		$this->ID = $date_id;
		$this->DateKind = $date_kind;
		$this->TimeStamp = $date_timestamp;
		
		/* @var $m Model */
		/* @var $s Set */
		$m = new Model($model_id, $model_firstname, $model_lastname);
		$s = new Set($set_id, $set_prefix, $set_name, $set_containswhat);
		
		$s->setModel($m);
		$this->Set = $s;
	}
	
	/**
	 * @return int
	 */
	public function getID()
	{ return $this->ID; }
	
	/**
	 * @param int $ID
	 */
	public function setID($ID)
	{ $this->ID = $ID; }
	
	/**
	 * @return Set
	 */
	public function getSet()
	{ return $this->Set; }
	
	/**
	 * @param Set $Set
	 */
	public function setSet($Set)
	{ $this->Set = $Set; }
	
	/**
	 * @return int
	 */
	public function getTimeStamp()
	{ return $this->TimeStamp; }
	
	/**
	 * @param int $TimeStamp
	 */
	public function setTimeStamp($TimeStamp)
	{ $this->TimeStamp = $TimeStamp; }
	
	/**
	 * @return int
	 */
	public function getDateKind()
	{ return $this->DateKind; }
	
	/**
	 * @param int $DateKind
	 */
	public function setDateKind($DateKind)
	{ $this->DateKind = $DateKind; }
	
	
	/**
	 * Gets an array of Dates from the database, or NULL on failure.
	 * @param DateSearchParameters $SearchParameters
	 * @param string $OrderClause
	 * @param string $LimitClause
	 * @return Array(Date) | NULL
	 */
	public static function GetDates($SearchParameters = null, $OrderClause = null, $LimitClause = null)
	{
		global $dbi;
		$SearchParameters = $SearchParameters ? $SearchParameters : new DateSearchParameters();
		$OrderClause = empty($OrderClause) ? 'model_firstname ASC, model_lastname ASC, set_prefix ASC, set_name ASC, date_timestamp ASC' : $OrderClause;
		
		$q = sprintf("
			SELECT
				`date_id`, `date_kind`, `date_timestamp`,
				`set_id`, `set_prefix`, `set_name`, `set_containswhat`,
				`model_id`, `model_firstname`, `model_lastname`
			FROM
				`vw_Date`
			WHERE
				mut_deleted = -1
				%1\$s
			ORDER BY
				%2\$s
			%3\$s",
			$SearchParameters->getWhere(),
			$OrderClause,
			$LimitClause ? ' LIMIT '.$LimitClause : null
		);
		
		if(!($stmt = $dbi->prepare($q)))
		{
			$e = new SQLerror($dbi->errno, $dbi->error);
			Error::AddError($e);
			return null;
		}
		
		DBi::BindParamsToSelect($SearchParameters, $stmt);		
		
		if($stmt->execute())
		{
			$OutArray = array();
			$stmt->bind_result(
					$date_id, $date_kind, $date_timestamp,
					$set_id, $set_prefix, $set_name, $set_containswhat,
					$model_id, $model_firstname, $model_lastname);
			
			while($stmt->fetch())
			{
				$o = new self(
					$date_id, $date_kind, $date_timestamp,
					$set_id, $set_prefix, $set_name, $set_containswhat,
					$model_id, $model_firstname, $model_lastname);
				
				$OutArray[] = $o;
			}
			
			$stmt->close();
			return $OutArray;
		}
		else
		{
			$e = new SQLerror($dbi->errno, $dbi->error);
			Error::AddError($e);
			return null;
		}		
	}
	
	/**
	 * Inserts the given date into the database.
	 * @param Date $Date
	 * @param User $CurrentUser
	 * @return bool
	 */
	public static function InsertDate($Date, $CurrentUser)
	{
	    global $db;
	    
	    return $db->Insert(
		'Date',
		array(
		    $Date->getSet()->getID(),
		    $Date->getDateKind(),
		    $Date->getTimeStamp(),
		    $CurrentUser->getID(),
		    time()
		),
		'set_id, date_kind, date_timestamp, mut_id, mut_date'
	    );
	}
	
	/**
	 * Updates the databaserecord of supplied Date.
	 * 
	 * @param Date $Date
	 * @param User $CurrentUser 
	 * @return bool
	 */
	public static function UpdateDate($Date, $CurrentUser)
	{
		global $db;
		
		return $db->Update(
			'Date',
			array(
				'set_id' => $Date->getSet()->getID(),
				'date_kind' => $Date->getDateKind(),
				'date_timestamp' => $Date->getTimeStamp(),
				'mut_id' => $CurrentUser->getID(),
				'mut_date' => time()
			),
			array(
				'date_id', $Date->getID())
		);
	}
	
	/**
	 * Removes the specified Date from the database.
	 * 
	 * @param Date $Date
	 * @param User $CurrentUser
	 * @return bool
	 */
	public static function DeleteDate($Date, $CurrentUser)
	{
		global $db;
		
		return $db->Update(
			'Date',
			array(
				'mut_id' => $CurrentUser->getID(),
				'mut_deleted' => time()),
			array(
				'date_id', $Date->getID())
		);
	}
	
	/**
	 * Filters an array of Dates and returns those that match the given properties.
	 * @param array $DateArray
	 * @param int $DateID
	 * @param int $ModelID
	 * @param int $SetID
	 * @param int $Kind
	 * @param int $TimeStamp
	 * @return array(Date)
	 */
	public static function FilterDates($DateArray, $DateID = null, $ModelID = null, $SetID = null, $Kind = null, $TimeStamp = null)
	{
		$OutArray = array();
			
		/* @var $Date Date */
		foreach($DateArray as $Date)
		{
			if(
				(is_null($DateID) || $Date->getID() == $DateID)							&&
				(is_null($ModelID) || $Date->getSet()->getModel()->getID() == $ModelID)	&&
				(is_null($SetID) || $Date->getSet()->getID() == $SetID)					&&
				(is_null($Kind) || $Date->getDateKind() == $Kind)						&&
				(is_null($TimeStamp) || $Date->getTimeStamp() == $TimeStamp)				
			){
				$OutArray[] = $Date;
			}
		}
		return $OutArray;
	}
	
	/**
	 * Formats the given Dates into one string 
	 * @param array(Date) $InArray
	 * @param string $DateFormat
	 * @param bool $PrefixType
	 * @param string $Glue
	 * @return string
	 */
	public static function FormatDates($InArray, $DateFormat, $PrefixType = false, $Glue = ', ')
	{
		$OutString = null;
		if(is_array($InArray) && count($InArray) > 0)
		{
			/* @var $Date Date */
			foreach ($InArray as $Date)
			{
				if($Date->getTimeStamp() > 0)
				{
					$OutString .= $PrefixType ? ($Date->getDateKind() == DATE_KIND_VIDEO ? 'V-' : 'P-') : null; 
					$OutString .= date($DateFormat, $Date->getTimeStamp()).$Glue;
				}
			}
		}
		return trim($OutString, ', ');
	}
	
	/**
	* Parses an array of strings into an array of Date objects.
	* @param array(string) $InArray
	* @param int $DateKind
	* @param Set $Set
	* @return array(Date)
	*/
	public static function ParseDates($InArray, $DateKind = DATE_KIND_UNKNOWN, $Set = null)
	{
		$OutArray = array();
		if(is_array($InArray) && count($InArray) > 0)
		{
			for ($i = 0; $i < count($InArray); $i++)
			{
				$timestamp = strtotime($InArray[$i]);
				if($timestamp !== false)
				{
					/* @var $Date Date */
					$Date = new self();
	
					$Date->setSet($Set);
					$Date->setDateKind($DateKind);
					$Date->setTimeStamp($timestamp);
	
					$OutArray[] = $Date;
				}
			}
		}
		return $OutArray;
	}
}

class DateSearchParameters extends SearchParameters
{
	private $paramtypes = '';
	private $values = array();
	private $where = '';

	public function __construct(
		$SingleID = null, $MultipleIDs = null,
		$SingleSetID = null, $MultipleSetIDs = null,
		$SingleModelID = null, $MultipleModelIDs = null,
		$DateKind = null, $FullName = null)
	{
		parent::__construct();

		if($SingleID)
		{
			$this->paramtypes .= "i";
			$this->values[] = $SingleID;
			$this->where .= " AND date_id = ?";
		}

		if($MultipleIDs)
		{
			$this->paramtypes .= str_repeat('i', count($MultipleIDs));
			$this->values = array_merge($this->values, $MultipleIDs);
			$this->where .= sprintf(" AND date_id IN ( %1s ) ",
					implode(', ', array_fill(0, count($MultipleIDs), '?'))
			);
		}

		if($SingleSetID)
		{
			$this->paramtypes .= "i";
			$this->values[] = $SingleSetID;
			$this->where .= " AND set_id = ?";
		}

		if($MultipleSetIDs)
		{
			$this->paramtypes .= str_repeat('i', count($MultipleSetIDs));
			$this->values = array_merge($this->values, $MultipleSetIDs);
			$this->where .= sprintf(" AND set_id IN ( %1s ) ",
					implode(', ', array_fill(0, count($MultipleSetIDs), '?'))
			);
		}

		if($SingleModelID)
		{
			$this->paramtypes .= "i";
			$this->values[] = $SingleModelID;
			$this->where .= " AND model_id = ?";
		}

		if($MultipleModelIDs)
		{
			$this->paramtypes .= str_repeat('i', count($MultipleModelIDs));
			$this->values = array_merge($this->values, $MultipleModelIDs);
			$this->where .= sprintf(" AND model_id IN ( %1s ) ",
					implode(', ', array_fill(0, count($MultipleModelIDs), '?'))
			);
		}
		
		if($DateKind)
		{
			$this->paramtypes .= "i";
			$this->values[] = $DateKind;
			$this->where .= " AND date_kind = ?";
		}
		
		if($FullName)
		{
			$this->paramtypes .= 's';
			$this->values[] = '%'.$FullName.'%';
			$this->where .= " AND CONCAT_WS(' ', model_firstname, model_lastname) LIKE ?";
		}
	}

	public function getWhere()
	{ return $this->where; }

	public function getValues()
	{ return $this->values; }

	public function getParamTypes()
	{ return $this->paramtypes; }
}

?>