# t = int(input())
# while t:
#     t-=1
#     n = int(input())
#     ls = list(map(int, input().split()))
#     cnt = 0
#     while ls:
#         mx = max(ls)
#         max_idexes = []
#         for index, i in enumerate(ls):
#             if i == mx:
#                 max_idexes.append(index)
#         ls = ls[:max_idexes[-1]]
#         cnt += 1
#     print(cnt)

#  try 2:
# t = int(input())
# while t:
#     t -= 1
#     n = int(input())
#     a = list(map(int, input().split()))
    
#     cnt = 0
#     current_max = max(a)
#     # print(current_max)
    
#     for i in range(n-1, -1, -1):
#         print(i)
#         if current_max:
#             # current_max = a[i]
#             cnt += 1
#             a= a[ :current_max]
#             print(a)
            
#     print(cnt)




# #  try 3:
# time limit
# t = int(input())
# while t:
#     t -= 1
#     n = int(input())
#     a = list(map(int, input().split()))
    
#     cnt = 0
#     # current_max = max(a)
#     # print(current_max)

#     i = len(a) -1
    
#     while i != -1:
#         current_max = max(a)
#         if a[i] == current_max:
#             a = a[:i]
#             # print(a)
#             cnt+=1
#         i-=1

#     print(cnt)


# t = int(input())
# while t:
#     t -= 1
#     n = int(input())
#     a = list(map(int, input().split()))
    
#     cnt = 0
#     current_max = 0
    
#     for i in range(n - 1, -1, -1):
#         if a[i] > current_max:
#             current_max = a[i]
#             cnt += 1
            
#     print(cnt)

# final try:
# t = int(input())
# while t:
#     t -= 1
#     n = int(input())
#     a = list(map(int, input().split()))
    
#     cnt = 0
#     current_max = 0
    
#     for i in range(n - 1, -1, -1):
#         if a[i] >= current_max:
#             current_max = a[i]
#             cnt += 1
            
#     print(cnt)

# t = int(input())
# while t:
#     t -= 1
#     n = int(input())
#     a = list(map(int, input().split()))
    
#     cnt = 0
#     current_max = max(a)
    
#     for i in range(n - 1, -1, -1):
#         if a[i] == current_max:
#             a = a[:i]
#             cnt += 1

            
#     print(cnt)
t = int(input())

while t:
    t-=1
    n = int(input())
    a = list(map(int, input().split()))

    ans = 0
    mx = 0

    for i in a:
        if i >= mx:
            mx = i
            ans += 1

    print(ans)