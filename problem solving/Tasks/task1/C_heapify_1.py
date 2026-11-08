# input: nums list
# proccess: (check if max less than n) & (all element is distinct)
# output: YES or NO

# absolute faild:
# t = int(input())
# while t:
#     t-=1
#     n = int(input())
#     l = list(map(int, input().split()))
#     # 1 2 3 4 5 6 7
#     if(len(l) != n or len(l) != len(set(l))):
#         print("NO")
#         continue
#     i = int(n / 2) + 1
#     # or ceil(n / 2)
#     for i in l:
#         if((l[i*2] == l[i] * 2) and (i*2 > n / 2)):
#             if(l[i*2] >  l[i]):
#                 tmp = l[i*2]
#                 l[i*2] = l[i]
#                 l[i] = tmp
#     if(l == sorted(l)):
#         print("yes")
#     else:
#         print("no")

# try 2: faild 
# t = int(input())
# while t:
#     t -= 1
#     n = int(input())
#     l = list(map(int, input().split()))

#     if len(l) != n or len(l) != len(set(l)):
#         print("NO")
#         continue
#         # 1 4 3 2 5
#     for index, val in enumerate(l):
#         i = index + 1
#         target = 2 * i - 1
#         if target < n:
#             if l[target] < l[index]:
#                 l[target], l[index] = l[index], l[target]

#     if l == sorted(l):
#         print("YES")
#     else:
#         print("NO")

# try 3: solve the try 2 problem (cheack the list once at first and dont cheack after changes) but this will increase the complexity
t = int(input())
while t:
    t -= 1
    n = int(input())
    l = list(map(int, input().split()))

    changed = True
    while changed:
        changed = False
        for i in range(n):
            target = 2 * i + 1
            if target < n:
                if l[target] < l[i]:
                    l[target], l[i] = l[i], l[target]
                    changed = True

    if l == sorted(l):
        print("YES")
    else:
        print("NO")

# if this will not Accepted, i will work on new idea: split the list into two lists, then compare between them but there is no time and i need to see the next quations