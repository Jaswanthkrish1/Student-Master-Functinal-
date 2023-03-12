# Student-Master-Functinal-
Task name: master

You tell, I do

Description:

Write calculations using functions and get the results. Let's have a look at some examples:

seven(times(five())) # must return 35
four(plus(nine())) # must return 13
eight(minus(three())) # must return 5
six(divided_by(two())) # must return 3

Conditions:

There must be a function for each number from 0 ("zero") to 9 ("nine")
There must be a function for each of the following mathematical operations: plus, minus, times, divided_by
Each calculation consist of exactly one operation and two numbers
The most outer function represents the left operand, the most inner function represents the right operand
Division should be integer division. For example, this should return 2, not 2.666666...:

eight(divided_by(three()))

Application Flow:

Create an application with two user roles: Master and Students
Both Student and Master can signup and login and logout.
Master can ask the Student(input) and get the value(output)
Students should be able to view the list of activities(calculations) sought by the master in the activity log section.
