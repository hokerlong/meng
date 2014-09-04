<?php
/**
 * TOP API: taobao.simba.adgroup.catmatch.get request
 * 
 * @author auto create
 * @since 1.0, 2014-07-03 16:46:54
 */
class SimbaAdgroupCatmatchGetRequest
{
	/** 
	 * 推广组Id
	 **/
	private $adgroupId;
	
	/** 
	 * 主人昵称
	 **/
	private $nick;
	
	private $apiParas = array();
	
	public function setAdgroupId($adgroupId)
	{
		$this->adgroupId = $adgroupId;
		$this->apiParas["adgroup_id"] = $adgroupId;
	}

	public function getAdgroupId()
	{
		return $this->adgroupId;
	}

	public function setNick($nick)
	{
		$this->nick = $nick;
		$this->apiParas["nick"] = $nick;
	}

	public function getNick()
	{
		return $this->nick;
	}

	public function getApiMethodName()
	{
		return "taobao.simba.adgroup.catmatch.get";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		RequestCheckUtil::checkNotNull($this->adgroupId,"adgroupId");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
