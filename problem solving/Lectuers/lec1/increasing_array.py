# 1.input: array. 
# 2.proccess: 
    # compare the i with preveise elements, 
    # if (i is grater than previes):
    #   pass 
    # else
    #   ans += prev - i
    #   i   += prev - i
# 3.output 

n = int(input())
ls = list(map(int, input().split()))
index = 1
ans = 0
for i in ls:
    if(index == len(ls) -1):
        if(i > ls[index]):
                ans += i - ls[index]
                ls[index] = i
        break
    if(i > ls[index]):
        ans += i - ls[index]
        ls[index] = i
    index+=1
print(ans)
    
