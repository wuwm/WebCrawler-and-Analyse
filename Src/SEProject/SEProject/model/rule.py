# -*- coding: utf-8 -*-
from sqlalchemy import Column, String , DateTime, Integer
from sqlalchemy.ext.declarative import declarative_base

# 创建对象的基类:
Base = declarative_base()

class Rule(Base):
    __tablename__ = 'rules'

    # 表的结构:
    id = Column(Integer, primary_key=True)
    name = Column(String)
    starturl = Column(String)
    titlerule = Column(String)
    contentrule = Column(String)
    nextpagerule = Column(String)
    articlelinkrule = Column(String)
    alloweddomain = Column(String)
    enable = Column(Integer)

