<?php

/**
 * Created by PhpStorm.
 * User: Wu
 * Date: 11/29/15
 * Time: 2:26 PM
 */
class DataBaseEngine{
    private $db;
    function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=SE;charset=utf8', 'root', 'zfAQpBluc52s');
        $this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); //禁用prepared statements的仿真效果

    }
    function query($sql)
    {
        $stmt = $this->db->query($sql);
        return $stmt;
    }
    function getRawResultData($start, $span){
        return $this->query("SELECT * FROM RawData");
    }
    function getScrawlSettings(){
        return $this->query("SELECT * FROM rules");
    }
    function  getCrawlerStatus(){
        return $this->query("SELECT * FROM status");
    }
    function  modifyCrawlSettings($id,$name,$startURL,$domain,$link,$next,$title,$content,$enable){
        $sql="UPDATE `rules` SET `name`=?,`alloweddomain`=?,`starturl`=?,`nextpagerule`=?,`articlelinkrule`=?,`titlerule`=?,`contentrule`=?,`enable`=? WHERE `id`=?";
        $stmt = $this->db->prepare($sql);
        $exeres = $stmt->execute(array($name, $domain, $startURL, $next, $link, $title, $content, $enable, $id));
    }
    function search($startdate,$enddate,$startmoney,$endmoney){
        $sql = "SELECT * FROM `RawData` WHERE date >= '$startdate' and date <= '$enddate' and money >= $startmoney and money <= $endmoney";
        return $this->query($sql);
    }
    function searchTitle($title,$startdate,$enddate,$startmoney,$endmoney){
        $sql = "SELECT * FROM `RawData` WHERE date >= '$startdate' and date <= '$enddate' and money >= $startmoney and money <= $endmoney and title like '%$title%'";
        return $this->query($sql);
    }
    function searchContent($content,$startdate,$enddate,$startmoney,$endmoney){
        $sql = "SELECT * FROM `RawData` WHERE date >= '$startdate' and date <= '$enddate' and money >= $startmoney and money <= $endmoney and content like '%$content%'";
        return $this->query($sql);
    }
    function  searchOrg($org,$startdate,$enddate,$startmoney,$endmoney){
        $sql = "SELECT * FROM `RawData` WHERE date >= '$startdate' and date <= '$enddate' and money >= $startmoney and money <= $endmoney and org like '%$org%'";
        return $this->query($sql);
    }
    function  addRule($name,$startURL,$domain,$link,$next,$title,$content,$enable){
        $sql="INSERT INTO `rules` (`name`,`alloweddomain`,`starturl`,`nextpagerule`,`articlelinkrule`,`titlerule`,`contentrule`,`enable`) VALUES (?,?,?,?,?,?,?,?)";
        $stmt = $this->db->prepare($sql);
        $exeres = $stmt->execute(array($name, $domain, $startURL, $next, $link, $title, $content, $enable));
    }
    function deleteRule($id){
        $sql = "DELETE FROM `rules` WHERE id=?";
        $stmt = $this->db->prepare($sql);
        $exeres = $stmt->execute(array($id));
    }
    function selectUser($userName){
        $sql = "SELECT * FROM `user` WHERE username = '$userName'";
        return $this->query($sql);
    }
    function addUser($userName,$password){
        $sql = "INSERT INTO `user` (`username`,`password`) VALUES (?,?)";
        $stmt = $this->db->prepare($sql);
        $exeres = $stmt->execute(array($userName,$password));
    }
    function selectByOrg($org){
        $sql = "SELECT DISTINCT(org) FROM `RawData` WHERE org LIKE '%$org%'";
        return $this->query($sql);
    }
    function selectDataByOrg($org){
        $sql = "SELECT * FROM `RawData` WHERE org = '$org' ORDER BY date ASC";
        return $this->query($sql);
    }
    function selectContentById($id){
        $sql = "SELECT * FROM `RawData` WHERE id=$id";
        return $this->query($sql);
    }
    function selectStatus1(){
        $sql = "SELECT * FROM `status` ORDER BY timestamp DESC";
        return $this->query($sql);
    }
    function modifyUserInfoById($userID,$password){
        $sql = "UPDATE `user` SET password=? WHERE id=?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array($password,$userID));
    }
    function selectSumData($startdate,$enddate){
        $sql="SELECT org,SUM(money) as summoney FROM `RawData` WHERE date >= '$startdate' and date <= '$enddate' group BY org ORDER BY summoney DESC";
        return $this->query($sql);
    }
    function selectAllUser(){
        $sql = "SELECT * FROM `user`";
        return $this->query($sql);
    }
    function modifyUser($id,$name,$type){
        $sql = "UPDATE `user` SET `username`=?,`type`=? WHERE `id`=?";
        $stmt = $this->db->prepare($sql);
        $exeres = $stmt->execute(array($name,$type,$id));
        return $stmt;
    }
}
