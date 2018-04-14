from pymongo import MongoClient
from pprint import pprint
import sys
import random

client = MongoClient()
db = client.hitech

customername = sys.argv[1]
ordernumb = random.randint(1,5000)
price = sys.argv[2]

customerOrders = db.customerOrder


customerOrders.insert_one({
    "name": customername,
    "OrderNumb": ordernumb,
    "price": price
})

