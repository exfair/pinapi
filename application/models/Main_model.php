<?php

class Main_model extends CI_Model
{

    public $tableName = "menu";

    public function __construct()
    {
        parent::__construct();

    }

    public function get($where = array(),$tabloAdi)
    {
        return $this->db->where($where)->get($tabloAdi)->row();
    }

    /** Tüm Kayıtları bana getirecek olan metot.. */
    public function get_all($where = array(), $order = "id ASC",$tbName)
    {
        return $this->db->where($where)->order_by($order)->get($tbName)->result();
    }

    public function add($data = array(),$tbName)
    {
        return $this->db->insert($tbName, $data);
    }

    public function update($where = array(), $data = array(),$tbName)
    {
        return $this->db->where($where)->update($tbName, $data);
    }
    public function delete($where = array(),$tbName)
    {
        return $this->db->where($where)->delete($tbName);
    }
    public function getParentProducts($parentid)
    { 
        return $this->db->query('SELECT p.*,c.title as "category_title" FROM categories as c,products as p WHERE c.parentid = '.$parentid.' AND p.category_id = c.id GROUP BY p.id')->result();
    }
    public function getChildProducts($childid)
    { 
        return $this->db->query('SELECT p.*,c.title as "category_title" FROM categories as c,products as p WHERE c.id = '.$childid.' AND p.category_id = c.id')->result();
    }
    public function getAvailableProxies(){
        return $this->db->query('SELECT proxies.*, COUNT(account.id) as total FROM proxies, account WHERE TIMEDIFF(expireDate,CURRENT_TIMESTAMP()) > 0
        GROUP BY proxies.id')->result();

    }
}
