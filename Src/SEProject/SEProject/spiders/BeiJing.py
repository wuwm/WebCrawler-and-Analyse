# -*- coding: utf-8 -*-
import scrapy
# from scrapy.linkextractors import LinkExtractor
from scrapy.contrib.linkextractors import LinkExtractor
from scrapy.contrib.spiders import CrawlSpider, Rule

class PageItem(scrapy.Item):
    id = scrapy.Field()
    currentPage = scrapy.Field()
    name = scrapy.Field()

class Article(scrapy.Item):
    id = scrapy.Field()
    title = scrapy.Field()
    content = scrapy.Field()
    spider = scrapy.Field()
    currentPage = scrapy.Field()
    currentURL = scrapy.Field()

class BeijingSpider(CrawlSpider):
    name = 'SEProjectCrawl'
    # allowed_domains = ['hd.bidgov.cn']
    # start_urls = ['http://www.bgpc.gov.cn/news/news/nt_id/32']
    def __init__(self, rule):
        self.rule = rule
        self.name = rule.name
        self.id = rule.id
        self.allowed_domains = rule.alloweddomain.split(",")
        # print(rule.starturl)
        self.start_urls = [rule.starturl]
        rule_list = []
        #添加`下一页`的规则
        if rule.nextpagerule:
            # nextpagerule1 = "u'%s'"%(rule.nextpagerule)
            rule_list.append(Rule(LinkExtractor(
                restrict_xpaths = rule.nextpagerule),
                callback='parse_page',
                follow=True))
        #添加抽取文章链接的规则
        rule_list.append(Rule(LinkExtractor(
            restrict_xpaths = [rule.articlelinkrule]),
            callback='parse_item'))
        self.rules = tuple(rule_list)
        super(BeijingSpider, self).__init__()



    # rules = (
    #     # 下一页
    #     Rule(LinkExtractor(restrict_xpaths = u"//a[contains(.,'\u4e0b\u4e00\u9875')]"), follow=True),
    #     Rule(LinkExtractor(restrict_xpaths = "//div[@id = 'newslist']/ul/li//a"), callback='parse_item', follow=True)
    #     # Rule(LinkExtractor(restrict_xpaths = "//div[@id='news_word']//div[@class='news_content']"), callback='parse_content', follow=False)
    #
    # )
    # def __init__(self,rule):
    #     self.rule = rule
    #     self.start_urls = rule.starturl

    def parse_page(self, response):
        p = PageItem()
        p['currentPage'] = response.url
        p['name'] = self.name
        p['id'] = self.id
        return p

    def parse_item(self, response):
        i = Article()
        # title = response.xpath("//div[@id='news_word']//h1[@class='news_title']/text()").extract()[0]
        # content = response.xpath("//div[@id='news_word']//div[@class='news_content']").extract()[0]
        i['title'] = response.xpath(self.rule.titlerule).extract()[0]
        i['content'] = response.xpath(self.rule.contentrule).extract()[0]
        i['spider'] = self.name
        i['currentURL'] = response.url
        i['id'] = self.id
        # urllib.urlopen("http://localhost/title="+title+"&&content="+content);
        #i['domain_id'] = response.xpath('//input[@id="sid"]/@value').extract()
        #i['name'] = response.xpath('//div[@id="name"]').extract()
        #i['description'] = response.xpath('//div[@id="description"]').extract()
        # print("AAAA")
        # print response.xpath("//div[@id='news_word']//h1[@class='news_title']/text()").extract()
        return i

