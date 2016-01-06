# -*- coding: utf-8 -*-

from model.config import DBSession
from model.config import engine
from model.RawData import RawData
from spiders.BeiJing import PageItem
from spiders.BeiJing import Article
from model.Filter import Filter
from datetime import *
import time
class SeprojectPipeline(object):
    def open_spider(self, spider):
        self.session = DBSession()
        sql2 = "DELETE FROM `RawData` WHERE `spider` = '" + spider.name + "'"
        engine.execute(sql2)


    def process_item(self, item, spider):
        if(isinstance(item, Article)):
            content1 = item["content"].encode("utf-8")
            f = Filter()
            text = f.filterResult(item["title"], item["content"])

            if text:
                # print "text:"+text[1]+text[2]+text[3]
                money1 = text[2]
                org1 = text[1]
                date1 = text[3]
                date2 = date(date1[0], date1[1], date1[2])
                a = RawData(title=text[0],
                content=item["content"].encode("utf-8"),
                spider=item["spider"].encode("utf-8"),
                org=org1,
                money=money1,
                date=date2)
                self.session.add(a)
                self.session.commit()
            id1 = item["id"]
            name1 = item["spider"].encode("utf-8")
            title1 = item["title"].encode("utf-8")
            currentURL = item["currentURL"].encode("utf-8")
            sql1 = "INSERT INTO `status` (`crawler_id`, `current_title` ,`current_url`, `name`) VALUES (" + str(id1) + ",'" + title1 + "','" + currentURL +"','" + name1 +"') ON DUPLICATE KEY UPDATE `current_title`='" + title1 + "',`current_url`='" + currentURL +"',`name`='" + name1 + "',`timestamp`=NOW()"
            engine.execute(sql1)
        else:
            currentPage = item["currentPage"].encode("utf-8")
            id = item["id"]
            name = item["name"].encode("utf-8")
            sql = "INSERT INTO `status` (`crawler_id`, `current_page`) VALUES (" + str(id) + ",'" + currentPage + "') ON DUPLICATE KEY UPDATE `current_page`='" + currentPage + "'"
            engine.execute(sql)

    def close_spider(self,spider):
        self.session.close()
