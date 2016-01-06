# -*- coding: utf8 -*-
import re
import string
class Filter:
    Label = "<[^>]+>"
    Title = "(招标.*)*中标.*|成交.*".decode('utf8')
    Date1 = "(中|定)标[^：:]*\\s*(：|:)\\s*((\\d+\\s*年\\s*\\d+\\s*月\\s*\\d+\\s*日)|(\\d+(-|/)\\s*\\d{1,2}\\s*(-|/)\\s*\\d{1,2}))".decode('utf8')
    Date2 = "(\\d+\\s*年\\s*\\d+\\s*月\\s*\\d+\\s*日)|(\\d+(-|/)\\s*\\d{1,2}\\s*(-|/)\\s*\\d{1,2})".decode('utf8')
    Orga = "(成交|中标)[^0-9a-zA-Z]+(人|名称|单位)\\s*(：|:)\\s*[^\\s]+".decode('utf8')
    Money = "(((人民币)|(RMB)|$|￥)\\s*\\d+\\s*((,|，)\\s*\\d+\\s*)*(\\.\\d+)*万*元*)|(\\d+\\s*((,|，)\\s*\\d+\\s*)*(\\.\\s*\\d+\\s*)*万*元)".decode('utf8')
    # 去除标签
    def filterLabel(self, content_text):
        return re.sub(self.Label, " ", content_text)
    # 去除空格
    def filterBlank(self, content_text): 
        return "".join(content_text.split())
    # 获取结果:左边参数为标题，右边参数为具体内容,返回4个字段[项目名称,项目中标单位,中标金额,[年,月,日]]
    def filterResult(self, title, content_text):
        data = [0, 0, 0, 0]
        content_text = self.filterBlank(content_text)
        content_text = self.filterLabel(content_text)
        Tag_Money = False
        Tag_Date = False
        Tag_Org = False
        Tag_Name = False
        data[0] = self.filterTitle(title)
        data[1] = self.filterOrg(content_text)
        data[2] = self.filterMoney(content_text)
        data[3] = self.filterDate(content_text)
        if data[0]:
            Tag_Name = True
        if data[1]:
            Tag_Org = True
        else :
            return []
        if data[2]:
            Tag_Money = True
        else :
            return []
        if data[3]:
            Tag_Date = True
        else :
            return []
        if Tag_Money and not Tag_Name:
            data[0] = title
        if Tag_Money and Tag_Date and Tag_Org and Tag_Name:
            return data
        return []
        
    # 返回项目名称
    def filterTitle(self, title):
#         if "候选人".decode('utf8') in title:
#             return ""
        cont = self.getSubString(self.Title, title)
        
        if cont:
            if ")" in cont:
                cont = re.sub("\\)", "\\)", cont)
            if "(" in cont:
                cont = re.sub("\\(", "\\(", cont)
            return re.sub(cont, "", title)
        return cont
    # 返回项目中标日期
    def filterDate(self, content_text):
        str = self.getSubString(self.Date1, content_text)
        if str:
            date = self.getAllSubString("\\d+".decode('utf8'), str)
            date = map(int , date)
            return date
        else:
            str = self.getSubString(self.Date2, content_text)
            if not str:
                return str
            date = self.getAllSubString("\\d+".decode('utf8'), str)
            date = map(int, date)
            return date
        # 返回项目中标单位
    def filterOrg(self, content_text):
        str = self.getSubString(self.Orga, content_text)
        if not str:
            return str
        else:
            return re.sub(".*(:|：)".decode('utf8'), "", str)
    def filterMoney(self, content_text):
        s = self.getSubString(self.Money, content_text)
        wan = False
        if not s:
            return s
#         print s
        s = self.getSubString("\\d+((,|，)\\d+)*(\\.\\d+)*万*".decode('utf8'), s)
        if not s:
            return s
        if ",".decode('utf8') in s or "，".decode('utf8') in s:
            s = re.sub(",", "", s)
            s = re.sub("，".decode('utf8'), "", s)
        if "万".decode('utf8') in s:
            wan = True
            s = re.sub("万".decode('utf8'), "", s)
        s = string.atof(s)
        if wan:
            s *= 10000
        return s
        
    # 根据正规式返回第一个子串
    def getSubString(self, regex, content):
        s = re.search(regex, content)
        if s:
            return s.group()
        else :
            return s
    # 根据正规式返回所有满足条件的子串
    def getAllSubString(self, regex, content):
        pattern = re.compile(regex)
        arr = pattern.findall(content)
        return arr
