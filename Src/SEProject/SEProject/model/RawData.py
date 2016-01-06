# -*- coding: utf-8 -*-
from sqlalchemy import Column, String , Integer , Date
from sqlalchemy.ext.declarative import declarative_base

Base = declarative_base()

class RawData(Base):
    __tablename__ = 'RawData'

    id = Column(Integer, primary_key=True)
    title = Column(String)
    content = Column(String)
    spider = Column(String)
    org = Column(String)
    money = Column(Integer)
    date = Column(Date)