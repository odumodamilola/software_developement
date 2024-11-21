# print("Helllo world")
# print(7)
# print(True)
# print('$#@')
#This is how to add comment in python

#how to create a multi line comment
#hello world
'''This is a multi line comment'''

# x2= 5 #we can not use a number as first cha
# y = 'apple'
# z = 3.142
# a = False
# print(x2,y,z)

# x,y,z = 5,25,60
# x=y=z = 50
# y = 5
# x = 25
# z = x-y
# print (z)
# print(type(a))
# print("the addition of x + y is = ", x+y)
# x = "Hello" 
# y = "world" # '' ""
# print(x+" "+y)

#Data Types
#1.Lists,2.tuples, 3.sets, 4.dictionaries

# list1 = ["apple", "cherry", "banana", "kiwi"]
# list2 = [5,2,55,100,1,3,80,90]
# list1.append("kiwi")
# list1.insert(1,"kiwi")
# list1.remove("Kiwi")
# list1.clear()
# list1.sort()
# list2.sort(reverse=True)
# list3 =list1 + list2.copy()
# print(list3)
# print(list2)


#Tuple
# tuple1 = ("apple", "kiwi","banana","cherry","banana", "banana")
# print(len(tuple1))
# print(type(tuple1))
# print((tuple1[1]))

# x = list(tuple1)
# # x.insert(1, "Orange")
# x.remove("kiwi")

# # x[1] = "orange"
# tuple1 = tuple(x)

# print(type(tuple1))


#sets
#A set is a collection of unordered, unchangeable values
#how to concertinate two set together
# set1 = {"apple","kiwi","banana","cherry"}
# set2 = {1,2,3}
# set3 = set1.union(set2)
# set1.update(set2)
# print(set1)
# print(len(set1))
# set1.remove("banana")
# set1.add("Orange")

#loop
# for x in set1:
#     print(x)
# print(len(set1))

#dicionary
#A dictionary is a collection which is ordered, changeale, and do not collect duplicate values
dict1 = {
    "brand": "Ford",
    "model": "Mustang",
    "year": 2024
}

# x = dict1.items()
# x = dict1.values()
# x = dict1.keys()
# print(dict1["brand"])
# print(len(dict1))
# print(type(dict1))
# print(x)

#updating values in our dictionary
# dict1.update({"year": 2025})
# print(dict1)

#adding a new item to our dictionary
# dict1["Color"] = "red"
# dict1.update({"color":"blue"})
# dict1.pop("year")
# print(dict1)


#Conditional Statement

# num = 6

# if num %2.5 == 0:
#     print("NUmber is zero")
# elif num%2 ==0:
#     print("NUmber is even")

# else:
#     print("Number is odd")


#loops in python
# There are two types of loops in python
#1.WHile LOOP
# i = 1
# while i <11:
#     print(i)
#     i+=1

# num = 15
# for x in range(11):
#     print(num * x)

# def add(num1,num2):
#    sum = num1+num2
#    return sum

# print(add(15,10))

# def greetings(name):
#     print("Hello, how are you",name)

# greetings('John')

#how to take input from the users
# def add(num1,num2):
#     sum = num1+num2
#     return sum

# num1 = int(input("Enter value 1 for addition:\n"))
# num2 = int(input("Enter value 2 for addition:\n"))
# print(add(num1,num2))

#Exception handling in python
# x = 5
# try:
#     print(x)
# except Exception as e:
#     print(e)

#FileHandling in python

# f = open("test.txt", "r")
# print(f.read())
# f.close()

#creating a new file
# f = open("test.txt", "a")
# f.write("This is a text for learning about python")
# f.close()

# import os
# # os.remove("test.txt")
# os.remove("data.txt")

import datetime
from time import sleep

while True:
    time = datetime.datetime.now()

    print(time)
    sleep(1)




