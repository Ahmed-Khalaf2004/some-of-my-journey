t = int(input())
while(t):
    t-=1
    n = int(input())
    l = list(map(int, input().split()))

    operation_num = 0
    negative_nums = 0
    for i in l:
        if(i==1):
            pass
        elif(i == 0):
            operation_num+=1
        else:
            negative_nums+=1
    if(negative_nums%2 != 0):
        operation_num+=2
    print(operation_num)

# i will be positive hoping it will be Accepted :)