<?php
/**
 * TOP API: taobao.waimai.shop.close request
 * 
 * @author auto create
 * @since 1.0, 2014-07-03 16:46:54
 */
class WaimaiShopCloseRequest
{
	/** 
	 * 外卖店铺id
	 **/
	private $shopid;
	
	private $apiParas = array();
	
	public function setShopid($shopid)
	{
		$this->shopid = $shopid;
		$this->apiParas["shopid"] = $shopid;
	}

	public function getShopid()
	{
		return $this->shopid;
	}

	public function getApiMethodName()
	{
		return "taobao.waimai.shop.close";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		RequestCheckUtil::checkNotNull($this->shopid,"shopid");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
